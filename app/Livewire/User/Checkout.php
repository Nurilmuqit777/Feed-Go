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
use App\Models\Shipping;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Cache;
use App\Models\Product;
use App\Models\User;

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

        $this->provinces = Cache::remember(
            'rajaongkir.provinces',
            now()->addDay(),
            function () {
                $response = Http::withHeaders([
                    'key' => config('services.rajaongkir.key_check'),
                ])->get(
                    'https://rajaongkir.komerce.id/api/v1/destination/province'
                );

                return $response->successful()
                    ? $response->json('data', [])
                    : [];
            }
        );
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
            'selectedShipping'=> 'required|string'
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

        $this->cities = Cache::remember(
            "rajaongkir.cities.{$provinceId}",
            now()->addDay(),
            function () use ($provinceId) {

                $response = Http::withHeaders([
                    'key' => config('services.rajaongkir.key_check'),
                ])->get(
                    "https://rajaongkir.komerce.id/api/v1/destination/city/{$provinceId}"
                );

                return $response->successful()
                    ? $response->json('data', [])
                    : [];
            }
        );
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

        $this->districts = Cache::remember(
            "rajaongkir.districts.{$cityId}",
            now()->addDay(),
            function () use ($cityId) {

                $response = Http::withHeaders([
                    'key' => config('services.rajaongkir.key_check'),
                ])->get(
                    "https://rajaongkir.komerce.id/api/v1/destination/district/{$cityId}"
                );

                return $response->successful()
                    ? $response->json('data', [])
                    : [];
            }
        );
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

        $this->subdistricts = Cache::remember(
            "rajaongkir.subdistricts.{$districtId}",
            now()->addDay(),
            function () use ($districtId) {

                $response = Http::withHeaders([
                    'key' => config('services.rajaongkir.key_check'),
                ])->get(
                    "https://rajaongkir.komerce.id/api/v1/destination/sub-district/{$districtId}"
                );

                return $response->successful()
                    ? $response->json('data', [])
                    : [];
            }
        );
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

    protected function messages()
    {
        return [
            'recipient_name.required' => 'Nama penerima wajib diisi.',
            'recipient_phone.required' => 'Nomor telepon wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',

            'province.required' => 'Provinsi wajib dipilih.',
            'city.required' => 'Kota/Kabupaten wajib dipilih.',
            'district.required' => 'Kecamatan wajib dipilih.',
            'subdistrict.required' => 'Kelurahan/Desa wajib dipilih.',

            'full_address.required' => 'Alamat lengkap wajib diisi.',
            'postal_code.required' => 'Kode pos wajib diisi.',

            'selectedShipping.required' => 'Metode pengiriman wajib dipilih.',
        ];
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

        $cacheKey = 'shipping.' . md5(
            config('services.rajaongkir.origin')
            . '|' . $this->subdistrict
            . '|' . $weight
            . '|' . $this->courier
        );

        $this->shippingOptions = Cache::remember(
            $cacheKey,
            now()->addMinutes(10),
            function () use ($weight) {

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

                return $response->successful()
                    ? $response->json('data', [])
                    : [];
            }
        );
    }

    public function updatedSelectedShipping($value)
    {
        $shipping = collect($this->shippingOptions)
            ->first(function ($item) use ($value) {
                return $item['code'] . '|' . $item['service'] === $value;
            });

        if (!$shipping) {
            $this->shippingCost = 0;
            return;
        }

        $this->shippingCost = (int) $shipping['cost'];
    }

    public function checkout()
    {
        $userId = auth()->guard('web')->id();

        $lock = Cache::lock('checkout:user:' . $userId, 30);

        if (! $lock->get()) {
            $this->dispatch('toast', [
                'type' => 'error',
                'title' => 'Checkout Sedang Diproses',
                'message' => 'Pesanan Anda sedang diproses. Silakan tunggu.',
            ]);

            return;
        }

        try {

            $this->validate();

            Config::$serverKey = config('midtrans.serverKey');
            Config::$isProduction = config('midtrans.isProduction');
            Config::$isSanitized = config('midtrans.isSanitized');
            Config::$is3ds = config('midtrans.is3ds');

            $regions = $this->getSelectedRegionNames();

            $shipping = collect($this->shippingOptions)
                ->first(function ($item) {
                    return $item['code'] . '|' . $item['service'] === $this->selectedShipping;
                });

            if (! $shipping) {
                session()->flash( 'error', 'Metode pengiriman tidak valid. Silakan pilih kembali.' );

                return;
            }

            $shippingCost = (int) $shipping['cost'];

            $carts = Cart::with('product')
                ->where('user_id', $userId)
                ->get();

            if ($carts->isEmpty()) {
                session()->flash('error','Keranjang belanja kosong.');

                return;
            }

            $result = DB::transaction(function () use ( $userId, $regions, $shipping, $shippingCost )
            {

                User::whereKey($userId)
                    ->lockForUpdate()
                    ->firstOrFail();

                $cartItems = Cart::where('user_id', $userId)
                    ->get();

                if ($cartItems->isEmpty()) {
                    throw ValidationException::withMessages([
                        'checkout' => 'Keranjang belanja kosong.',
                    ]);
                }

                $products = [];

                foreach ($cartItems as $cart) {

                    $product = Product::lockForUpdate()
                        ->find($cart->product_id);

                    if (! $product) {
                        throw ValidationException::withMessages([
                            'checkout' => 'Produk tidak ditemukan.',
                        ]);
                    }

                    if ($product->product_status !== 'available') {
                        throw ValidationException::withMessages([
                            'checkout' => "{$product->product_name} sedang tidak tersedia.",
                        ]);
                    }

                    if ($cart->quantity > $product->product_stock) {
                        throw ValidationException::withMessages([
                            'checkout' => "Stok {$product->product_name} tidak mencukupi.",
                        ]);
                    }

                    $products[$product->id] = $product;
                }

                $subTotal = 0;

                foreach ($cartItems as $cart) {
                    $product = $products[$cart->product_id];
                    $price = $product->product_discount_price ?? $product->product_price;
                    $subTotal += $price * $cart->quantity;
                }

                $total = $subTotal + $shippingCost;

                $invoice = 'FG-' . now()->format('YmdHisv');

                $order = Order::create([
                    'user_id' => $userId,
                    'invoice_number' => $invoice,
                    'status' => 'pending',
                    'total_price' => $total,
                    'expired_at' => now()->addMinutes(15),
                ]);

                $orderAddress = OrderAddress::create([
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

                foreach ($cartItems as $cart) {

                    $product = $products[$cart->product_id];

                    $price = $product->product_discount_price ?? $product->product_price;

                    $subtotal = $price * $cart->quantity;

                    OrderDetail::create([
                        'order_id' => $order->id,
                        'product_id' => $product->id,
                        'quantity_ordered' => $cart->quantity,
                        'price_at_purchase' => $product->product_price,
                        'discount_price_at_purchase' => $product->product_discount_price,
                        'sub_total' => $subtotal,
                    ]);

                    $product->decrement(
                        'product_stock',
                        $cart->quantity
                    );
                }

                Shipping::create([
                    'order_address_id' => $orderAddress->id,
                    'courier' => $shipping['code'],
                    'service' => $shipping['service'],
                    'cost' => $shippingCost,
                    'estimate' => $shipping['etd'] ?? '-',
                    'status' => 'submitted',
                ]);

                $payment = Payment::create([
                    'order_id' => $order->id,
                    'amount' => $total,
                    'status' => 'pending',
                ]);

                Cart::where('user_id', $userId)->delete();

                return [
                    'order' => $order,
                    'payment' => $payment,
                    'total' => $total,
                    'invoice' => $invoice,
                    'cart_items' => $cartItems,
                ];
            });

            $itemDetails = [];

            foreach ($result['order']->orderDetails()->with('product')->get() as $detail) {

                $price = $detail->discount_price_at_purchase
                    ?? $detail->price_at_purchase;

                $itemDetails[] = [
                    'id' => (string) $detail->product_id,
                    'price' => (int) $price,
                    'quantity' => $detail->quantity_ordered,
                    'name' => $detail->product->product_name,
                ];
            }

            $itemDetails[] = [
                'id' => 'SHIPPING',
                'price' => $shippingCost,
                'quantity' => 1,
                'name' =>
                    'Ongkos Kirim - '
                    . strtoupper($shipping['code'])
                    . ' '
                    . $shipping['service'],
            ];

            $params = [
                'transaction_details' => [
                    'order_id' => $result['invoice'],
                    'gross_amount' => $result['total'],
                ],

                'item_details' => $itemDetails,

                'customer_details' => [
                    'first_name' => $this->recipient_name,
                    'email' => $this->email,
                    'phone' => $this->recipient_phone,
                ],
            ];

            $snapToken = Snap::getSnapToken($params);

            $result['payment']->update([
                'snap_token' => $snapToken,
            ]);

            return redirect()->route(
                'user.order-detail',
                $result['order']->invoice_number
            );

        } catch (ValidationException $e) {

            $this->setErrorBag($e->validator->errors());

            $this->dispatch('toast', [
                'type' => 'error',
                'title' => 'Data Belum Lengkap',
                'message' => 'Silakan lengkapi data checkout terlebih dahulu.',
            ]);

            return;

        } catch (\Exception $e) {

            try {

                if (isset($result['order'])) {

                    DB::transaction(function () use ($result) {

                        $order = Order::with('orderDetails')
                            ->lockForUpdate()
                            ->find($result['order']->id);

                        if ( $order && $order->status === 'pending')
                        {

                            foreach ($order->orderDetails as $detail) {

                                $product = Product::lockForUpdate()->find($detail->product_id);

                                if ($product) {$product->increment('product_stock', $detail->quantity_ordered);}
                            }

                            $order->update([
                                'status' => 'cancelled',
                            ]);
                        }
                    });
                }

            } catch (\Exception $rollbackException) {
                report($rollbackException);
            }

            $this->dispatch('toast', [
                'type' => 'error',
                'title' => 'Checkout Gagal',
                'message' => 'Terjadi kesalahan saat memproses checkout.',
            ]);

            report($e);

            return;

        } finally {

            optional($lock)->release();
        }
    }

    public function render()
    {
        $carts = Cart::with('product')
            ->where('user_id', auth()->guard('web')->id())
            ->get();

        $this->total_weight = $this->getTotalWeight($carts);
        $subTotal = $carts->sum->total_discount_price;
        $grandTotal = $subTotal + $this->shippingCost;

        return view('livewire.user.checkout',[
            'carts' => $carts,
            'subTotal' => $subTotal,
            'grandTotal' => $grandTotal,
            'shippingCost' => $this->shippingCost,
        ]);
    }
}
