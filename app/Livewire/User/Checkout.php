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
    public $cities = [];
    public $districts = [];
    public $subdistricts = [];

    public $province = '';
    public $city = '';
    public $district = '';
    public $subdistrict = '';

    public $courier = 'jne:jnt:sicepat';
    public $shippingOptions = [];
    public $selectedShipping = null;
    public $shippingCost = 0;

    public $recipient_name;
    public $recipient_phone;
    public $email;
    public $full_address;
    public $postal_code;
    public $note;

    public $total_weight = 0;

    public function mount()
    {
        $user = auth()->guard('web')->user();
        $this->recipient_name = $user->name ?? '';
        $this->email = $user->email ?? '';

        $response = Http::withHeaders([
            'key' => config('services.rajaongkir.key_check'),
        ])->get(
            'https://rajaongkir.komerce.id/api/v1/destination/province'
        );

        if ($response->successful()) {
            $this->provinces = $response->json('data', []);
        }
    }

    protected function rules()
    {
        return [
            'recipient_name' => 'required|string|max:255',
            'recipient_phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'province' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'subdistrict' => 'required|string|max:255',
            'full_address' => 'required|string|max:500',
            'postal_code' => 'required|string|max:10',
            'note' => 'nullable|string|max:500',
        ];
    }

    public function updatedProvince($provinceId)
    {
        $this->reset([
            'city',
            'district',
            'subdistrict',
            'districts',
            'subdistricts',
        ]);

        if (!$provinceId) {
            $this->cities = [];
            return;
        }

        $response = Http::withHeaders([
            'key' => config('services.rajaongkir.key_check'),
        ])->get(
            "https://rajaongkir.komerce.id/api/v1/destination/city/{$provinceId}"
        );

        if ($response->successful()) {
            $this->cities = $response->json('data', []);
        }
    }

    public function updatedCity($cityId)
    {
        $this->reset([
            'district',
            'subdistrict',
            'subdistricts',
        ]);

        if (!$cityId) {
            $this->districts = [];
            return;
        }

        $response = Http::withHeaders([
            'key' => config('services.rajaongkir.key_check'),
        ])->get(
            "https://rajaongkir.komerce.id/api/v1/destination/district/{$cityId}"
        );

        if ($response->successful()) {
            $this->districts = $response->json('data', []);
        }
    }

    public function updatedDistrict($districtId)
    {
        $this->reset([
            'subdistrict',
        ]);

        if (!$districtId) {
            $this->subdistricts = [];
            return;
        }

        $response = Http::withHeaders([
            'key' => config('services.rajaongkir.key_check'),
        ])->get(
            "https://rajaongkir.komerce.id/api/v1/destination/sub-district/{$districtId}"
        );

        if ($response->successful()) {
            $this->subdistricts = $response->json('data', []);
        }
    }

    public function updatedSubDistrict($subdistrictId)
    {
        if (!$subdistrictId) {
            $this->shippingOptions = [];
            $this->selectedShipping = null;
            $this->shippingCost = 0;

            return;
        }

        $this->calculateShipping();
    }

    private function getSelectedRegionNames(): array
    {
        $province = collect($this->provinces)
            ->firstWhere('id', $this->province);

        $city = collect($this->cities)
            ->firstWhere('id', $this->city);

        $district = collect($this->districts)
            ->firstWhere('id', $this->district);

        $subdistrict = collect($this->subdistricts)
            ->firstWhere('id', $this->subdistrict);

        return [
            'province' => $province['name'] ?? null,
            'city' => $city['name'] ?? null,
            'district' => $district['name'] ?? null,
            'subdistrict' => $subdistrict['name'] ?? null,
            'postal_code' => $subdistrict['zip_code'] ?? null,
        ];
    }

    private function getTotalWeight($carts): int
    {
        return (int) $carts->sum(function ($cart){
            $weight = $cart->product->product_weight;
            if ($cart->product->product_unit === 'kg') {
            $weight *= 1000;
            }

            return $weight * $cart->quantity;
        });
    }

    public function calculateShipping()
    {
        if (!$this->subdistrict) {
            $this->shippingOptions = [];
            $this->selectedShipping = null;
            $this->shippingCost = 0;

            return;
        }

        $carts = Cart::with('product')
            ->where('user_id', auth()->guard('web')->id())
            ->get();

        if ($carts->isEmpty()) {
            $this->shippingOptions = [];
            $this->selectedShipping = null;
            $this->shippingCost = 0;

            return;
        }

        $weight = $this->getTotalWeight($carts);

        if ($weight <= 0) {
            $this->shippingOptions = [];
            $this->selectedShipping = null;
            $this->shippingCost = 0;

            return;
        }

        $response = Http::withHeaders([
            'key' => config('services.rajaongkir.key_check'),
        ])->asForm()->post(
            'https://rajaongkir.komerce.id/api/v1/calculate/domestic-cost',
            [
                'origin' => config('services.rajaongkir.origin'),
                'destination' => $this->subdistrict,
                'weight' => $weight,
                'courier' => $this->courier,
                'price' => 'lowest',
            ]
        );

        if ($response->successful()) {

            $this->shippingOptions = $response->json('data', []);

        } else {

            $this->shippingOptions = [];
            $this->selectedShipping = null;
            $this->shippingCost = 0;
        }
    }
    
    public function updatedSelectedShipping($value)
    {
        $shipping = collect($this->shippingOptions)
            ->first(function ($item) use ($value) {
                return $item['code'] . ':' . $item['service'] === $value;
            });

        $this->shippingCost = $shipping['cost'] ?? 0;
    }

    public function checkout()
    {
        try {

            $this->validate();

            Config::$serverKey = config('midtrans.serverKey');
            Config::$isProduction = config('midtrans.isProduction');
            Config::$isSanitized = config('midtrans.isSanitized');
            Config::$is3ds = config('midtrans.is3ds');

            $regions = $this->getSelectedRegionNames();

            $carts = Cart::with('product')
                ->where('user_id', auth()->guard('web')->id())
                ->get();

            $this->total_weight = $this->getTotalWeight($carts);

            if ($carts->isEmpty()) {
                session()->flash('error', 'Keranjang belanja kosong.');
                return;
            }

            foreach ($carts as $cart) {

                if (! $cart->product || $cart->product->product_status !== 'available') {
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

            $order = DB::transaction(function () use ($carts, $regions, &$order) {

                $invoice = 'FG-' . now()->format('YmdHisv');

                $total = $carts->sum(fn ($cart) => $cart->total_discount_price);

                $order = Order::create([
                    'user_id' => auth()->guard('web')->id(),
                    'invoice_number' => $invoice,
                    'status' => 'pending',
                    'total_price' => $total,
                    'expired_at' => now()->addMinutes(15),
                ]);

                OrderAddress::create([
                    'order_id' => $order->id,
                    'recipient_name' => $this->recipient_name,
                    'recipient_phone' => $this->recipient_phone,
                    'email' => $this->email,
                    'note' => $this->note,
                    'province' => $regions['province'],
                    'regency' => $regions['city'],
                    'district' => $regions['district'],
                    'village' => $regions['subdistrict'],
                    'full_address' => $this->full_address,
                    'postal_code' => $this->postal_code ?: $regions['postal_code'],
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
                return [
                    'order' => $order,
                    'payment' => $payment,
                    'total' => $total,
                    'invoice' => $invoice,
                ];

            });

            $params = [
                'transaction_details' => [
                    'order_id' => $order['invoice'],
                    'gross_amount' => $order['total'],
                ],
                'customer_details' => [
                    'first_name' => $this->recipient_name,
                    'email' => $this->email,
                    'phone' => $this->recipient_phone,
                ],
            ];

            $snapToken = Snap::getSnapToken($params);

            $order['payment']->update([
                'snap_token' => $snapToken,
            ]);

            Cart::where('user_id', auth()->guard('web')->id())->delete();

            if (! $order) {
                session()->flash('error', 'Terjadi kesalahan saat membuat pesanan.');
                return;
            }

            return redirect()->route(
                'user.order-detail',
                $order['order']->invoice_number
            );

        } catch (\Exception $e) {
            session()->flash(
                'error',
                'Terjadi kesalahan saat memproses checkout: ' . $e->getMessage()
            );

            return;

        }

    }

    public function render()
    {
        $carts = Cart::with('product')
            ->where('user_id', auth()->guard('web')->id())
            ->get();

        $this->total_weight = $this->getTotalWeight($carts);
        $subTotal = $carts ->sum->discount_total_price;

        return view('livewire.user.checkout',[
            'carts' => $carts,
            'subTotal' => $subTotal,
        ]);
    }
}
