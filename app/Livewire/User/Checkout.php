<?php

namespace App\Livewire\User;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Midtrans\Config;
use Midtrans\Snap;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderAddress;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;

class Checkout extends Component
{
    public $provinces = [];
    public $regencies = [];
    public $districts = [];
    public $villages = [];

    public $province = '';
    public $regency = '';
    public $district = '';
    public $villagesCode = '';

    public $recipient_name;
    public $recipient_phone;
    public $email;
    public $full_address;
    public $postal_code;
    public $note;

    public function mount()
    {
        $user = auth()->guard('web')->user();
        $this->recipient_name = $user->name ?? '';
        $this->email = $user->email ?? '';

        $response = Http::get('https://wilayah.id/api/provinces.json');
        $this->provinces = $response->json()['data'] ?? [];
    }

    protected function rules()
    {
        return [
            'recipient_name' => 'required|string|max:255',
            'recipient_phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'province' => 'required|string|max:255',
            'regency' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'villagesCode' => 'required|string|max:255',
            'full_address' => 'required|string|max:500',
            'postal_code' => 'required|string|max:10',
            'note' => 'nullable|string|max:500',
        ];
    }

    private function getNameByCode(array $items, ?string $code): ?string
    {
        $item = collect($items)->firstWhere('code', $code);

        return $item['name'] ?? null;
    }

    private function getSelectedRegionNames(): array
    {
        return [
            'province' => $this->getNameByCode($this->provinces, $this->province),
            'regency' => $this->getNameByCode($this->regencies, $this->regency),
            'district' => $this->getNameByCode($this->districts, $this->district),
            'village' => $this->getNameByCode($this->villages, $this->villagesCode),
        ];
    }

    public function updatedProvince($province_code)
    {
        $this->reset(['regency', 'district', 'villagesCode', 'districts', 'villages']);

        if (!$province_code){
            $this->regencies =[];
            return;
        }

        $response = Http::get(
            "https://wilayah.id/api/regencies/{$province_code}.json"
        );

        $this->regencies = $response->json()['data'] ?? [];
    }

    public function updatedRegency($regency_code)
    {
        $this->reset([
            'district',
            'villagesCode',
            'villages',
        ]);

        if (!$regency_code) {
            $this->districts = [];
            return;
        }

        $response = Http::get(
            "https://wilayah.id/api/districts/{$regency_code}.json"
        );

        $this->districts = $response->json()['data'] ?? [];
    }

    public function updatedDistrict($district_code)
    {
        $this->reset([
            'villagesCode',
        ]);

        if (!$district_code) {
            $this->villages = [];
            return;
        }

        $response = Http::get(
            "https://wilayah.id/api/villages/{$district_code}.json"
        );

        $this->villages = $response->json()['data'] ?? [];
    }

    public function checkout()
    {
        $this->validate();
        Config::$serverKey = config('midtrans.serverKey');
        Config::$isProduction = config('midtrans.isProduction');
        Config::$isSanitized = config('midtrans.isSanitized');
        Config::$is3ds = config('midtrans.is3ds');

        $existingOrder = Order::with('payments')
            ->where('user_id', auth()->guard('web')->id())
            ->where('status', 'pending')
            ->latest()
            ->first();

        if (
            $existingOrder &&
            $existingOrder->payment &&
            $existingOrder->payment->status === 'pending'
        ) {
            return redirect()->route(
                'user.orders.show',
                $existingOrder->invoice_number
            );
        }

        $regions = $this->getSelectedRegionNames();

        $carts = Cart::with('product')
            ->where('user_id', auth()->guard('web')->id())
            ->get();

        if ($carts->isEmpty()) {
            session()->flash('error', 'Keranjang belanja kosong.');
            return;
        }

        foreach ($carts as $cart) {
            if ($cart->product->product_status !== 'available') {
                session()->flash(
                    'error',
                    "{$cart->product->product_name} sedang tidak tersedia."
                );
                return;
            }

            if ($cart->quantity > $cart->product->product_stock) {
                session()->flash(
                    'error',
                    "Stok {$cart->product->product_name} tidak mencukupi."
                );
                return;
            }
        }

        $order = null;

        try{
            DB::transaction(function () use ($carts, $regions, &$order) {

                $invoice = 'FG-' . now()->format('YmdHisv');

                $total = $carts->sum(fn($cart) => $cart->total_discount_price);

                $order = Order::create([
                    'user_id' => auth()->guard('web')->id(),
                    'invoice_number' => $invoice,
                    'status' => 'pending',
                    'total_price' => $total,
                ]);

                OrderAddress::create([
                    'order_id' => $order->id,
                    'recipient_name' => $this->recipient_name,
                    'recipient_phone' => $this->recipient_phone,
                    'email' => $this->email,
                    'note' => $this->note,

                    'province' => $regions['province'],
                    'regency' => $regions['regency'],
                    'district' => $regions['district'],
                    'village' => $regions['village'],

                    'full_address' => $this->full_address,
                    'postal_code' => $this->postal_code,
                ]);

                foreach ($carts as $cart) {

                    OrderDetail::create([
                        'order_id' => $order->id,
                        'product_id' => $cart->product_id,
                        'quantity_ordered' => $cart->quantity,
                        'price_at_purchase' => $cart->product->product_price,
                        'discount_price_at_purchase' => $cart->product->product_discount_price,
                        'sub_total' => $cart->total_discount_price,
                    ]);
                }

                $payment = Payment::create([
                    'order_id' => $order->id,
                    'amount' => $total,
                    'status' => 'pending',
                ]);

                $params = [
                    'transaction_details' => [
                        'order_id' => $invoice,
                        'gross_amount' => $total,
                    ],
                    'customer_details' => [
                        'first_name' => $this->recipient_name,
                        'email' => $this->email,
                        'phone' => $this->recipient_phone,
                    ],
                ];

                $payment->update([
                    'snap_token' => Snap::getSnapToken($params),
                ]);

            });
        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi kesalahan saat memproses checkout: ' . $e->getMessage());
            return;
        }

        if (! $order) {
            session()->flash('error', 'Terjadi kesalahan saat membuat pesanan.');
            return;
        }

        return redirect()->route(
            'user.order-detail',
            $order->invoice_number
        );
    }

    public function render()
    {
        $carts = Cart::with('product')
            ->where('user_id', auth()->guard('web')->id())
            ->get();

        $subTotal = $carts ->sum->discount_total_price;

        return view('livewire.user.checkout',[
            'carts' => $carts,
            'subTotal' => $subTotal,
        ]);
    }
}
