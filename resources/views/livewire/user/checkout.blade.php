<div class="grid grid-cols-1 lg:grid-cols-2 gap-12">

    <div class="space-y-10">

        <div>
            <h2 class="text-2xl text-start font-bold text-[#2E7D32] mb-1">Data Pelanggan</h2>
            <p class="text-sm text-gray-500 mb-6 text-start">Data ini digunakan untuk keperluan pemesanan dan konfirmasi.</p>

            <div class="space-y-5">

                <div>
                    <label class="block text-sm font-semibold text-[#2D5016] mb-2">Nama Lengkap</label>
                    <input
                        wire:model.live ="recipient_name"
                        type="text"
                        class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-[#2D5016] focus:ring-2 focus:ring-[#2D5016]/20 transition-all"
                        placeholder=""
                    />
                    @error('recipient_name')
                        <p class="text-sm text-red-500 mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-[#2D5016] mb-2">Email</label>
                    <input
                        wire:model.live ="email"
                        type="email"
                        class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-[#2D5016] focus:ring-2 focus:ring-[#2D5016]/20 transition-all"
                        placeholder=""
                    />
                    @error('email')
                        <p class="text-sm text-red-500 mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-[#2D5016] mb-2">Nomor HP / Whatsapp</label>
                    <input
                        wire:model.live ="recipient_phone"
                        type="tel"
                        class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-[#2D5016] focus:ring-2 focus:ring-[#2D5016]/20 transition-all"
                        placeholder=""
                    />
                    @error('recipient_phone')
                        <p class="text-sm text-red-500 mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-[#2D5016] mb-2">Catatan Untuk Penjual</label>
                    <textarea
                        wire:model.live="note"
                        rows="3"
                        class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-[#2D5016] focus:ring-2 focus:ring-[#2D5016]/20 transition-all resize-none"
                        placeholder=""
                    ></textarea>
                </div>
            </div>
        </div>

        <div>
            <h2 class="text-2xl font-bold text-[#2E7D32] mb-1">Alamat Pengiriman</h2>
            <p class="text-sm text-gray-500 mb-6">Data ini digunakan untuk keperluan pemesanan dan konfirmasi.</p>

            <div class="space-y-5">

                <div x-data="{open: false, selected: @entangle('province')}" class="relative">
                    <label class="block text-sm font-semibold text-[#2D5016] mb-2">
                        Provinsi
                    </label>

                    <button
                        type="button"
                        @click="open = !open"
                        class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 flex items-center justify-between hover:border-[#2D5016] transition"
                    >
                        <span class="text-sm text-gray-700">
                            @if($province)
                                {{ collect($provinces)->firstWhere('id', $province)['name'] ?? 'Pilih Provinsi' }}
                            @else
                                Pilih Provinsi
                            @endif
                        </span>

                        <svg class="w-5 h-5 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    <div
                        x-show="open"
                        @click.away="open = false"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 scale-95 -translate-y-2"
                        x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-95"
                        class="absolute z-50 mt-2 w-full bg-white border border-gray-200 rounded-xl shadow-xl overflow-hidden"
                        style="display: none;"
                    >

                        <div class="max-h-64 overflow-y-auto">

                            @foreach($provinces as $provinceItem)
                                <button
                                    type="button"
                                    @click="
                                        selected = '{{ $provinceItem['id'] }}';
                                        $wire.set('province', '{{ $provinceItem['id'] }}');
                                        open = false;
                                    "
                                    class="w-full text-left px-4 py-3 text-sm hover:bg-[#2D5016] hover:text-white transition"
                                >
                                    {{ $provinceItem['name'] }}
                                </button>
                            @endforeach
                        </div>
                    </div>
                    @error('province')
                        <p class="text-sm text-red-500 mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div x-data="{open: false, selected: @entangle('city')}" class="relative">
                    <label class="block text-sm font-semibold text-[#2D5016] mb-2">
                        Kabupaten/Kota
                    </label>

                    <button
                        type="button"
                        @click="open = !open"
                        class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 flex items-center justify-between hover:border-[#2D5016] transition"
                    >
                        <span class="text-sm text-gray-700">
                            @if(!$province)
                                Pilih Provinsi terlebih dahulu
                            @elseif($city)
                                {{ collect($cities)->firstWhere('id', $city)['name'] ?? 'Pilih Kabupaten/Kota' }}
                            @else
                                Pilih Kabupaten/Kota
                            @endif
                        </span>

                        <svg class="w-5 h-5 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    <div
                        x-show="open"
                        @click.away="open = false"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 scale-95 -translate-y-2"
                        x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-95"
                        class="absolute z-50 mt-2 w-full bg-white border border-gray-200 rounded-xl shadow-xl overflow-hidden"
                        style="display: none;"
                    >

                        <div class="max-h-64 overflow-y-auto">

                            @foreach($cities as $cityItem)
                                <button
                                    type="button"
                                    @click="
                                        selected = '{{ $cityItem['id'] }}';
                                        $wire.set('city', '{{ $cityItem['id'] }}');
                                        open = false;
                                    "
                                    class="w-full text-left px-4 py-3 text-sm hover:bg-[#2D5016] hover:text-white transition"
                                >
                                    {{ $cityItem['name'] }}
                                </button>
                            @endforeach
                        </div>
                    </div>
                    @error('city')
                        <p class="text-sm text-red-500 mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div x-data="{open: false, selected: @entangle('district')}" class="relative">
                    <label class="block text-sm font-semibold text-[#2D5016] mb-2">
                        Kecamatan
                    </label>

                    <button
                        type="button"
                        @click="open = !open"
                        class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 flex items-center justify-between hover:border-[#2D5016] transition"
                    >
                        <span class="text-sm text-gray-700">
                            @if(!$city)
                                Pilih Kabupaten/Kota terlebih dahulu
                            @elseif($district)
                                {{ collect($districts)->firstWhere('id', $district)['name'] ?? 'Pilih Kecamatan' }}
                            @else
                                Pilih Kecamatan
                            @endif
                        </span>

                        <svg class="w-5 h-5 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    <div
                        x-show="open"
                        @click.away="open = false"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 scale-95 -translate-y-2"
                        x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-95"
                        class="absolute z-50 mt-2 w-full bg-white border border-gray-200 rounded-xl shadow-xl overflow-hidden"
                        style="display: none;"
                    >

                        <div class="max-h-64 overflow-y-auto">

                            @foreach($districts as $districtItem)
                                <button
                                    type="button"
                                    @click="
                                        selected = '{{ $districtItem['id'] }}';
                                        $wire.set('district', '{{ $districtItem['id'] }}');
                                        open = false;
                                    "
                                    class="w-full text-left px-4 py-3 text-sm hover:bg-[#2D5016] hover:text-white transition"
                                >
                                    {{ $districtItem['name'] }}
                                </button>
                            @endforeach
                        </div>
                    </div>
                    @error('district')
                        <p class="text-sm text-red-500 mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div x-data="{open: false, selected: @entangle('subdistrict')}" class="relative">
                    <label class="block text-sm font-semibold text-[#2D5016] mb-2">
                        Desa/Kelurahan
                    </label>

                    <button
                        type="button"
                        @click="open = !open"
                        class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 flex items-center justify-between hover:border-[#2D5016] transition"
                    >
                        <span class="text-sm text-gray-700">
                            @if(!$district)
                                Pilih Kecamatan terlebih dahulu
                            @elseif($subdistrict)
                                {{ collect($subdistricts)->firstWhere('id', $subdistrict)['name'] ?? 'Pilih Desa/Kelurahan' }}
                            @else
                                Pilih Desa/Kelurahan
                            @endif
                        </span>

                        <svg class="w-5 h-5 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    <div
                        x-show="open"
                        @click.away="open = false"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 scale-95 -translate-y-2"
                        x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-95"
                        class="absolute z-50 mt-2 w-full bg-white border border-gray-200 rounded-xl shadow-xl overflow-hidden"
                        style="display: none;"
                    >

                        <div class="max-h-64 overflow-y-auto">

                            @foreach($subdistricts as $subdistrictItem)
                                <button
                                    type="button"
                                    @click="
                                        selected = '{{ $subdistrictItem['id'] }}';
                                        $wire.set('subdistrict', '{{ $subdistrictItem['id'] }}');
                                        open = false;
                                    "
                                    class="w-full text-left px-4 py-3 text-sm hover:bg-[#2D5016] hover:text-white transition"
                                >
                                    {{ $subdistrictItem['name'] }}
                                </button>
                            @endforeach
                        </div>
                    </div>
                    @error('subdistrict')
                        <p class="text-sm text-red-500 mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-[#2D5016] mb-2">Alamat Lengkap</label>
                    <textarea
                        wire:model.live="full_address"
                        rows="3"
                        class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-[#2D5016] focus:ring-2 focus:ring-[#2D5016]/20 transition-all resize-none"
                        placeholder="Nama jalan, nomor rumah, RT/RW..."
                    ></textarea>
                    @error('full_address')
                        <p class="text-sm text-red-500 mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-[#2D5016] mb-2">Kode Pos</label>
                    <input
                        wire:model.live="postal_code"
                        type="text"
                        class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-[#2D5016] focus:ring-2 focus:ring-[#2D5016]/20 transition-all"
                        placeholder=""
                    />
                    @error('postal_code')
                        <p class="text-sm text-red-500 mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="space-y-10">

        <div>
            <h2 class="text-2xl font-bold text-[#2E7D32] mb-1">Metode Pengiriman</h2>
            <p class="text-sm text-gray-500 mb-6">Data ini digunakan untuk keperluan pemesanan dan konfirmasi.</p>

            <div class="space-y-3">
                @if (!$subdistrict)

                    <div class="border-2 border-gray-200 rounded-2xl p-4 text-sm text-gray-500">
                        Silakan pilih Desa/Kelurahan terlebih dahulu.
                    </div>

                @elseif (empty($shippingOptions))

                    <div class="border-2 border-gray-200 rounded-2xl p-4 text-sm text-gray-500">
                        Belum ada pilihan pengiriman.
                    </div>

                @else

                    @foreach ($shippingOptions as $shipping)

                        <label
                            class="flex items-center gap-4 border-2 border-gray-200 rounded-2xl p-4 cursor-pointer hover:border-[#2D5016] transition-all has-[:checked]:border-[#2D5016] has-[:checked]:bg-green-50"
                        >

                            <input
                                type="radio"
                                name="shipping"
                                value="{{ $shipping['code'] }}|{{ $shipping['service'] }}"
                                wire:model.live="selectedShipping"
                                class="w-5 h-5 accent-[#2D5016]"
                            />

                            <div class="w-10 h-10 bg-[#EAAA00] rounded-xl flex items-center justify-center shrink-0">
                                <span class="text-xs font-bold text-white uppercase">
                                    {{ strtoupper($shipping['code']) }}
                                </span>
                            </div>

                            <div class="flex-1">

                                <p class="font-semibold text-black text-sm">
                                    {{ strtoupper($shipping['code']) }}
                                    {{ $shipping['service'] }}
                                </p>

                                <p class="text-xs text-[#6B7280]">
                                    {{ $shipping['description'] ?? 'Layanan pengiriman' }}
                                </p>

                                @if (!empty($shipping['etd']))
                                    <p class="text-xs text-[#6B7280] mt-1">
                                        Estimasi {{ $shipping['etd'] }}
                                    </p>
                                @endif

                            </div>

                            <span class="text-sm font-semibold text-gray-700">
                                Rp {{ number_format($shipping['cost'], 0, ',', '.') }}
                            </span>

                        </label>

                    @endforeach

                @endif
                @error('selectedShipping')
                    <p class="text-sm text-red-500 mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>
        </div>

        <div class="bg-[#BBDFA6] rounded-3xl p-6 space-y-4">

            <h2 class="text-2xl font-bold text-[#2E7D32]">Ringkasan Produk</h2>

            @foreach ($carts as $cart)
                <div class="border-2 border-[#2D5016A6] rounded-2xl p-4 flex items-center gap-4">
                    <div class="w-14 h-14 rounded-xl bg-[#FFFFFF] flex items-center justify-center shrink-0">
                        <img
                        src="{{ asset('storage/'.$cart->product->product_image1) }}"
                        alt="Produk"
                        class="w-10 h-auto object-contain"
                    />
                </div>
                <div>
                    <p class="font-medium text-[#2D5016] text-sm">{{ $cart->product->product_name }} - {{\Illuminate\Support\Str::title($cart->product->category->category)}}</p>
                    <p class="text-xs text-[#2D5016] mt-0.5">Jumlah: {{ $cart->quantity }}</p>
                </div>
            </div>
            @endforeach

            <div class="space-y-3">

                <div class="flex justify-between">
                    <span class="font-bold text-gray-800 text-lg">Produk</span>
                    <span class="font-bold text-gray-800 text-lg">Ringkasan Biaya</span>
                </div>

                @foreach ($carts as $cart)
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-[#2D5016]">
                            {{ $cart->product->product_name }} - {{\Illuminate\Support\Str::title($cart->product->category->category)}}
                            <span class="text-black">x {{ $cart->quantity }}</span>
                        </span>
                        <span class="text-sm text-gray-700 shrink-0 ml-4">Rp {{ number_format($cart->total_price, 0, ',', '.') }}</span>
                    </div>
                @endforeach


                <div class="flex justify-between items-center">
                    <span class="text-sm text-[#2D5016]">
                        Potongan Harga
                    </span>
                    <span class="text-sm text-[#E81010] shrink-0 ml-4t">- <span class=" line-through">Rp {{ number_format($carts->sum('total_price') - $carts->sum('total_discount_price'), 0, ',', '.') }}</span></span>
                </div>

                <div class="border-t border-[#2D5016A6]"></div>

                <div class="flex justify-between items-center">
                    <span class="text-sm text-black">Subtotal</span>
                    <span class="text-sm text-gray-700 shrink-0 ml-4">Rp {{ number_format($carts->sum('total_discount_price'), 0, ',', '.') }}</span>
                </div>

                <div class="flex justify-between items-center">
                    <div class="flex items-center gap-2">
                        <span class="text-sm text-black">Pengiriman</span>
                        @if($selectedShipping)
                        <div class="flex items-center gap-1.5 bg-[#EAAA00] rounded-full px-2 py-0.5">
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17" fill="none">
                                <path d="M1.36214 2.04304V1.53223C1.22666 1.53223 1.09673 1.58604 1.00093 1.68184C0.905136 1.77764 0.851318 1.90757 0.851318 2.04304H1.36214ZM8.85412 2.04304H9.36494C9.36494 1.90757 9.31112 1.77764 9.21532 1.68184C9.11953 1.58604 8.9896 1.53223 8.85412 1.53223V2.04304ZM8.85412 6.12958V5.61876C8.71864 5.61876 8.58872 5.67258 8.49292 5.76838C8.39712 5.86418 8.3433 5.9941 8.3433 6.12958H8.85412ZM1.36214 2.55386H8.85412V1.53223H1.36214V2.55386ZM8.3433 2.04304V12.9405H9.36494V2.04304H8.3433ZM1.87295 11.5783V2.04304H0.851318V11.5783H1.87295ZM8.85412 6.6404H12.2596V5.61876H8.85412V6.6404ZM14.4731 8.85394V11.5783H15.4947V8.85394H14.4731ZM9.36494 12.9405V6.12958H8.3433V12.9405H9.36494ZM12.8617 13.5426C12.7826 13.6216 12.6887 13.6844 12.5854 13.7272C12.4821 13.77 12.3714 13.792 12.2596 13.792C12.1477 13.792 12.037 13.77 11.9337 13.7272C11.8304 13.6844 11.7365 13.6216 11.6575 13.5426L10.9355 14.2645C11.2868 14.6158 11.7632 14.8131 12.2599 14.8131C12.7566 14.8131 13.233 14.6158 13.5843 14.2645L12.8617 13.5426ZM11.6575 12.3384C11.7365 12.2593 11.8304 12.1966 11.9337 12.1538C12.037 12.111 12.1477 12.089 12.2596 12.089C12.3714 12.089 12.4821 12.111 12.5854 12.1538C12.6887 12.1966 12.7826 12.2593 12.8617 12.3384L13.5836 11.6164C13.2324 11.2652 12.756 11.0679 12.2592 11.0679C11.7625 11.0679 11.2861 11.2652 10.9349 11.6164L11.6575 12.3384ZM4.68858 13.5426C4.60952 13.6216 4.51565 13.6844 4.41235 13.7272C4.30904 13.77 4.19832 13.792 4.08649 13.792C3.97467 13.792 3.86395 13.77 3.76064 13.7272C3.65733 13.6844 3.56347 13.6216 3.48441 13.5426L2.76246 14.2645C3.11371 14.6158 3.5901 14.8131 4.08683 14.8131C4.58357 14.8131 5.05996 14.6158 5.41121 14.2645L4.68858 13.5426ZM3.48441 12.3384C3.56347 12.2593 3.65733 12.1966 3.76064 12.1538C3.86395 12.111 3.97467 12.089 4.08649 12.089C4.19832 12.089 4.30904 12.111 4.41235 12.1538C4.51565 12.1966 4.60952 12.2593 4.68858 12.3384L5.41053 11.6164C5.05928 11.2652 4.58289 11.0679 4.08615 11.0679C3.58942 11.0679 3.11303 11.2652 2.76177 11.6164L3.48441 12.3384ZM12.8617 12.3384C13.0278 12.5046 13.1109 12.7218 13.1109 12.9405H14.1326C14.1326 12.4617 13.9494 11.9815 13.5843 11.6158L12.8617 12.3384ZM13.1109 12.9405C13.1109 13.1591 13.0278 13.3764 12.8617 13.5426L13.5843 14.2645C13.7585 14.0909 13.8961 13.8845 13.9903 13.6573C14.0845 13.4301 14.1328 13.1865 14.1326 12.9405H13.1109ZM10.8974 12.4297H8.85412V13.4513H10.8974V12.4297ZM11.6575 13.5426C11.5781 13.4637 11.5152 13.3699 11.4724 13.2665C11.4296 13.1632 11.4078 13.0523 11.4082 12.9405H10.3866C10.3866 13.4193 10.5698 13.8995 10.9349 14.2652L11.6575 13.5426ZM11.4082 12.9405C11.4082 12.7218 11.4913 12.5046 11.6575 12.3384L10.9349 11.6164C10.7606 11.7901 10.6231 11.9964 10.5289 12.2237C10.4347 12.4509 10.3863 12.6945 10.3866 12.9405H11.4082ZM3.48441 13.5426C3.40506 13.4637 3.34216 13.3699 3.29936 13.2665C3.25657 13.1632 3.23474 13.0523 3.23513 12.9405H2.2135C2.2135 13.4193 2.39671 13.8995 2.76177 14.2652L3.48441 13.5426ZM3.23513 12.9405C3.23513 12.7218 3.31823 12.5046 3.48441 12.3384L2.76246 11.6164C2.58821 11.7901 2.45 11.9964 2.35579 12.2237C2.26158 12.4509 2.21322 12.6945 2.2135 12.9405H3.23513ZM8.85412 12.4297H5.44867V13.4513H8.85412V12.4297ZM4.68858 12.3384C4.85476 12.5046 4.93786 12.7218 4.93786 12.9405H5.95949C5.95949 12.4617 5.77628 11.9815 5.41121 11.6158L4.68858 12.3384ZM4.93786 12.9405C4.93786 13.1591 4.85476 13.3764 4.68858 13.5426L5.41053 14.2645C5.58478 14.0909 5.72298 13.8845 5.8172 13.6573C5.91141 13.4301 5.95977 13.1865 5.95949 12.9405H4.93786ZM14.4731 11.5783C14.4731 12.0483 14.0917 12.4297 13.6217 12.4297V13.4513C14.1185 13.4513 14.5949 13.254 14.9462 12.9027C15.2974 12.5515 15.4947 12.075 15.4947 11.5783H14.4731ZM12.2596 6.6404C12.8466 6.6404 13.4097 6.87361 13.8248 7.28873C14.2399 7.70385 14.4731 8.26687 14.4731 8.85394H15.4947C15.4947 7.99592 15.1539 7.17304 14.5472 6.56633C13.9405 5.95961 13.1176 5.61876 12.2596 5.61876V6.6404ZM0.851318 11.5783C0.851318 12.075 1.04865 12.5515 1.39991 12.9027C1.75116 13.254 2.22757 13.4513 2.72431 13.4513V12.4297C2.25436 12.4297 1.87295 12.0483 1.87295 11.5783H0.851318Z" fill="white"/>
                            </svg>
                        </div>
                        <span class="text-black text-xs font-medium">{{ $selectedShipping }}</span>
                        @endif
                    </div>
                    <span class="text-sm text-gray-700 shrink-0 ml-4">
                        @if ($shippingCost > 0)
                            Rp {{ number_format($shippingCost, 0, ',', '.') }}
                        @else
                            -
                        @endif
                    </span>
                </div>

                <div class="text-sm text-gray-600">
                    Berat total:
                    <span class="font-semibold">
                        {{ number_format($total_weight / 1000, 2, ',', '.') }} kg
                    </span>
                </div>

                <div class="flex justify-between items-start">
                    <span class="font-bold text-black text-sm">Total Tagihan</span>
                    <div class="text-right">
                        <p class="text-xl font-bold text-[#2E7D32]">Rp {{ number_format($grandTotal , 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>

            <div class="border-t border-[#2D5016A6]"></div>

            <div x-data="{ confirmed: false }">

                <label class="flex items-start gap-3 cursor-pointer group">
                    <input
                        type="checkbox"
                        x-model="confirmed"
                        class="mt-0.5 w-4 h-4 accent-[#2D5016] cursor-pointer shrink-0"
                    />

                    <span class="text-sm text-[#2D5016] group-hover:text-gray-900 transition-colors leading-relaxed">
                        Saya memastikan data pesanan dan alamat pengiriman sudah benar.
                    </span>
                </label>

                <button
                    type="button"
                    wire:click="checkout"
                    wire:loading.attr="disabled"
                    wire:target="checkout"
                    :disabled="!confirmed"
                    :class="confirmed
                        ? 'bg-[#EAAA00] text-white hover:bg-yellow-500 cursor-pointer hover:scale-105 active:scale-95'
                        : 'bg-gray-200 text-gray-500 cursor-not-allowed'"
                    class="w-full py-4 rounded-2xl text-base font-medium transition-all duration-300 mt-4"
                >
                        <span wire:loading.remove wire:target="checkout">
                            Lanjutkan Pembayaran
                        </span>
                        <span wire:loading wire:target="checkout">
                             Memproses...
                        </span>
                </button>

            </div>
        </div>
    </div>

</div>

