@php
    $statuses = array_keys($steps);
    $current = array_search($order->status, $statuses);
@endphp

@php
    $statusConfig = match($order->status) {
        'processing' => ['icon' => 'processing', 'text' => 'Diproses', 'message'=> 'Pesanan sedang diproses dan disiapkan oleh penjual.'],
        'delivered' => ['icon' => 'delivered', 'text' => 'Dikirim', 'message'=> 'Pesanan sedang dalam proses pengiriman ke alamat tujuan.'],
        'completed' => ['icon' => 'completed', 'text' => 'Selesai', 'message'=> 'Pesanan telah diterima oleh pelanggan dan transaksi telah selesai.'],
    };
@endphp

<div class="space-y-6">
    <div class="flex items-center gap-2 text-sm text-[#B0B0B0]">
        <a href="{{ route('user.orders') }}" class="hover:text-gray-700 flex font-semibold gap-1 text-xl items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="31" height="15" viewBox="0 0 31 15" fill="currentColor">
                <path d="M0.292891 6.65685C-0.0976334 7.04737 -0.0976334 7.68054 0.292891 8.07106L6.65685 14.435C7.04738 14.8255 7.68054 14.8255 8.07107 14.435C8.46159 14.0445 8.46159 13.4113 8.07107 13.0208L2.41421 7.36395L8.07107 1.7071C8.46159 1.31657 8.46159 0.683409 8.07107 0.292885C7.68054 -0.0976396 7.04738 -0.0976396 6.65685 0.292885L0.292891 6.65685ZM31 7.36395V6.36395L0.999998 6.36395V7.36395V8.36395L31 8.36395V7.36395Z"/>
            </svg>
            KEMBALI
        </a>
    </div>

    <div class="flex items-start w-full">
        @foreach($steps as $status => $label)
            @php
                $active = $loop->index <= $current;
                $lineActive = $loop->index < $current;
            @endphp

            <div class="flex-1 relative">

                @unless($loop->last)
                    <div
                        class="absolute top-4 left-1/2 w-full h-1
                        {{ $lineActive ? 'bg-[#2E7D32]' : 'bg-gray-300' }}">
                    </div>
                @endunless

                <div class="relative z-10 flex flex-col items-center">
                    <div
                        class="w-8 h-8 rounded-full flex items-center justify-center
                        {{ $active ? 'bg-[#2E7D32]' : 'bg-gray-300' }}">

                        @if($active)
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                            </svg>
                        @endif

                    </div>

                    <span class="mt-3 text-center text-sm font-medium">
                        {{ $label }}
                    </span>

                </div>

            </div>
        @endforeach
    </div>

    <div class="items-center space-y-1 text-black">
        <h1 class="text-3xl font-medium">
        Detail Pesanan
        </h1>
        <div class="flex gap-3">
            @switch($statusConfig['icon'])

                @case('pending')
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26" fill="none">
                        <circle cx="13" cy="13" r="13" fill="#FFC633"/>
                    </svg>
                    @break

                @case('processing')
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26" fill="none">
                        <circle cx="13" cy="13" r="13" fill="#2563EB"/>
                    </svg>
                    @break

                @case('delivered')
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26" fill="none">
                        <circle cx="13" cy="13" r="13" fill="#7C3AED"/>
                    </svg>
                    @break

                @case('completed')
                    <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 34 34" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M17.0002 29.75C19.3035 29.7502 21.5639 29.1264 23.5411 27.945C25.5184 26.7636 27.1387 25.0686 28.2298 23.0401C29.321 21.0117 29.8423 18.7255 29.7383 16.4245C29.6344 14.1235 28.909 11.8937 27.6394 9.97192L17.5031 21.2344C17.0297 21.7606 16.3764 22.0905 15.6719 22.1592C14.9674 22.2279 14.2627 22.0304 13.6965 21.6056L9.06688 18.1333C8.7663 17.9079 8.56758 17.5723 8.51445 17.2003C8.46131 16.8284 8.55811 16.4506 8.78354 16.15C9.00898 15.8494 9.34458 15.6507 9.71653 15.5976C10.0885 15.5444 10.4663 15.6412 10.7669 15.8667L15.3965 19.3389L25.8034 7.7775C24.2958 6.33832 22.4583 5.29068 20.4519 4.72631C18.4455 4.16195 16.3314 4.09805 14.2946 4.54024C12.2577 4.98242 10.3604 5.91719 8.76863 7.2627C7.17686 8.60821 5.93922 10.3234 5.16407 12.2582C4.38892 14.1929 4.0999 16.2882 4.32232 18.3606C4.54474 20.4329 5.2718 22.4192 6.43987 24.1454C7.60793 25.8716 9.18136 27.2851 11.0224 28.2622C12.8634 29.2393 14.916 29.7501 17.0002 29.75Z" fill="#388E3C"/>
                    </svg>
                    @break

            @endswitch

            <h3>
                Status: {{ $statusConfig['text'] }}
            </h3>
        </div>

        <p>
            {{ $statusConfig['message'] }}
        </p>

    </div>

    <div class="bg-white border border-gray-200 rounded-xl overflow-hidden">

        <div class="gap-8 p-8">

            <div>
                <h2 class="text-4xl font-semibold text-black mb-1">
                    Detail Produk
                </h2>

                <p class="text-xl text-gray-700 mb-8">
                    FeedGo
                </p>

                @foreach ($order->orderDetails as $detail)

                <div class="border border-2 rounded-2xl p-4 flex items-center gap-4 mt-2">
                    <div class="w-14 h-14 rounded-xl bg-[#FFFFFF] flex items-center justify-center shrink-0">
                        <img
                        src="{{ asset('storage/'.$detail->product->product_image1) }}"
                        alt="Produk"
                        class="w-10 h-auto object-contain"
                    />
                    </div>
                    <div>
                        <p class="font-medium text-[#2D5016] text-lg">{{ $detail->product->product_name }} - {{ \Illuminate\Support\Str::title($detail->product->category->category) }}</p>
                        <p class="text-lg text-[#2D5016] mt-0.5">Jumlah: {{ $detail->quantity_ordered }}</p>
                    </div>
                </div>
                @endforeach

                <div class="space-y-3 mt-6">
                    <div class="flex justify-between">
                        <span class="font-bold text-gray-800 text-2xl">Produk</span>
                        <span class="font-bold text-gray-800 text-2xl">Ringkasan Biaya</span>
                    </div>

                    @foreach ($order->orderDetails as $detail)
                    <div class="flex justify-between items-center">
                        <span class="text-md text-[#2D5016]">
                            {{ $detail->product->product_name }} - {{ \Illuminate\Support\Str::title($detail->product->category->category) }}
                            <span class="text-black">x {{ $detail->quantity_ordered }}</span>
                        </span>
                        <span class="text-md text-gray-700 shrink-0 ml-4">Rp {{ number_format($detail->original_subtotal, 0, ',', '.') }}</span>
                    </div>
                    @endforeach

                    <div class="flex justify-between items-center">
                        <span class="text-md text-black">
                            Potongan Harga
                        </span>
                        <span class="text-md text-[#E81010] shrink-0 ml-4t">- <span class=" line-through">Rp {{ number_format($order->total_discount, 0, ',', '.') }}</span></span>
                    </div>
                </div>

                <div class="border-t border-[#2D5016A6] my-4"></div>

                <div class="space-y-3 mt-6">

                    <div class="flex justify-between items-center">
                        <span class="text-md text-black">Total Produk</span>
                        <span class="text-md text-gray-700 shrink-0 ml-4">Rp {{ number_format($order->total_product, 0, ',', '.') }}</span>
                    </div>

                    <div class="flex justify-between items-center">
                        <div class="flex items-center gap-2">
                            <span class="text-md text-black">Pengiriman</span>
                            <div class="flex items-center gap-1.5 bg-[#EAAA00] rounded-full px-2 py-0.5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17" fill="none">
                                    <path d="M1.36214 2.04304V1.53223C1.22666 1.53223 1.09673 1.58604 1.00093 1.68184C0.905136 1.77764 0.851318 1.90757 0.851318 2.04304H1.36214ZM8.85412 2.04304H9.36494C9.36494 1.90757 9.31112 1.77764 9.21532 1.68184C9.11953 1.58604 8.9896 1.53223 8.85412 1.53223V2.04304ZM8.85412 6.12958V5.61876C8.71864 5.61876 8.58872 5.67258 8.49292 5.76838C8.39712 5.86418 8.3433 5.9941 8.3433 6.12958H8.85412ZM1.36214 2.55386H8.85412V1.53223H1.36214V2.55386ZM8.3433 2.04304V12.9405H9.36494V2.04304H8.3433ZM1.87295 11.5783V2.04304H0.851318V11.5783H1.87295ZM8.85412 6.6404H12.2596V5.61876H8.85412V6.6404ZM14.4731 8.85394V11.5783H15.4947V8.85394H14.4731ZM9.36494 12.9405V6.12958H8.3433V12.9405H9.36494ZM12.8617 13.5426C12.7826 13.6216 12.6887 13.6844 12.5854 13.7272C12.4821 13.77 12.3714 13.792 12.2596 13.792C12.1477 13.792 12.037 13.77 11.9337 13.7272C11.8304 13.6844 11.7365 13.6216 11.6575 13.5426L10.9355 14.2645C11.2868 14.6158 11.7632 14.8131 12.2599 14.8131C12.7566 14.8131 13.233 14.6158 13.5843 14.2645L12.8617 13.5426ZM11.6575 12.3384C11.7365 12.2593 11.8304 12.1966 11.9337 12.1538C12.037 12.111 12.1477 12.089 12.2596 12.089C12.3714 12.089 12.4821 12.111 12.5854 12.1538C12.6887 12.1966 12.7826 12.2593 12.8617 12.3384L13.5836 11.6164C13.2324 11.2652 12.756 11.0679 12.2592 11.0679C11.7625 11.0679 11.2861 11.2652 10.9349 11.6164L11.6575 12.3384ZM4.68858 13.5426C4.60952 13.6216 4.51565 13.6844 4.41235 13.7272C4.30904 13.77 4.19832 13.792 4.08649 13.792C3.97467 13.792 3.86395 13.77 3.76064 13.7272C3.65733 13.6844 3.56347 13.6216 3.48441 13.5426L2.76246 14.2645C3.11371 14.6158 3.5901 14.8131 4.08683 14.8131C4.58357 14.8131 5.05996 14.6158 5.41121 14.2645L4.68858 13.5426ZM3.48441 12.3384C3.56347 12.2593 3.65733 12.1966 3.76064 12.1538C3.86395 12.111 3.97467 12.089 4.08649 12.089C4.19832 12.089 4.30904 12.111 4.41235 12.1538C4.51565 12.1966 4.60952 12.2593 4.68858 12.3384L5.41053 11.6164C5.05928 11.2652 4.58289 11.0679 4.08615 11.0679C3.58942 11.0679 3.11303 11.2652 2.76177 11.6164L3.48441 12.3384ZM12.8617 12.3384C13.0278 12.5046 13.1109 12.7218 13.1109 12.9405H14.1326C14.1326 12.4617 13.9494 11.9815 13.5843 11.6158L12.8617 12.3384ZM13.1109 12.9405C13.1109 13.1591 13.0278 13.3764 12.8617 13.5426L13.5843 14.2645C13.7585 14.0909 13.8961 13.8845 13.9903 13.6573C14.0845 13.4301 14.1328 13.1865 14.1326 12.9405H13.1109ZM10.8974 12.4297H8.85412V13.4513H10.8974V12.4297ZM11.6575 13.5426C11.5781 13.4637 11.5152 13.3699 11.4724 13.2665C11.4296 13.1632 11.4078 13.0523 11.4082 12.9405H10.3866C10.3866 13.4193 10.5698 13.8995 10.9349 14.2652L11.6575 13.5426ZM11.4082 12.9405C11.4082 12.7218 11.4913 12.5046 11.6575 12.3384L10.9349 11.6164C10.7606 11.7901 10.6231 11.9964 10.5289 12.2237C10.4347 12.4509 10.3863 12.6945 10.3866 12.9405H11.4082ZM3.48441 13.5426C3.40506 13.4637 3.34216 13.3699 3.29936 13.2665C3.25657 13.1632 3.23474 13.0523 3.23513 12.9405H2.2135C2.2135 13.4193 2.39671 13.8995 2.76177 14.2652L3.48441 13.5426ZM3.23513 12.9405C3.23513 12.7218 3.31823 12.5046 3.48441 12.3384L2.76246 11.6164C2.58821 11.7901 2.45 11.9964 2.35579 12.2237C2.26158 12.4509 2.21322 12.6945 2.2135 12.9405H3.23513ZM8.85412 12.4297H5.44867V13.4513H8.85412V12.4297ZM4.68858 12.3384C4.85476 12.5046 4.93786 12.7218 4.93786 12.9405H5.95949C5.95949 12.4617 5.77628 11.9815 5.41121 11.6158L4.68858 12.3384ZM4.93786 12.9405C4.93786 13.1591 4.85476 13.3764 4.68858 13.5426L5.41053 14.2645C5.58478 14.0909 5.72298 13.8845 5.8172 13.6573C5.91141 13.4301 5.95977 13.1865 5.95949 12.9405H4.93786ZM14.4731 11.5783C14.4731 12.0483 14.0917 12.4297 13.6217 12.4297V13.4513C14.1185 13.4513 14.5949 13.254 14.9462 12.9027C15.2974 12.5515 15.4947 12.075 15.4947 11.5783H14.4731ZM12.2596 6.6404C12.8466 6.6404 13.4097 6.87361 13.8248 7.28873C14.2399 7.70385 14.4731 8.26687 14.4731 8.85394H15.4947C15.4947 7.99592 15.1539 7.17304 14.5472 6.56633C13.9405 5.95961 13.1176 5.61876 12.2596 5.61876V6.6404ZM0.851318 11.5783C0.851318 12.075 1.04865 12.5515 1.39991 12.9027C1.75116 13.254 2.22757 13.4513 2.72431 13.4513V12.4297C2.25436 12.4297 1.87295 12.0483 1.87295 11.5783H0.851318Z" fill="white"/>
                                </svg>
                            </div>
                            <span class="text-black text-md font-medium">{{ $order->orderAddress->shipping->courier }} | {{ $order->orderAddress->shipping->service }}</span>
                        </div>
                        <span class="text-md text-gray-700 shrink-0 ml-4">Rp {{ number_format($order->orderAddress->shipping->cost, 0, ',', '.') }}</span>
                    </div>
                </div>

                <div class="border-t border-[#2D5016A6] my-4"></div>

                <div class="flex justify-between items-center">
                    <span class="text-md text-black font-semibold">Total </span>
                    <span class="text-2xl text-[#2E7D32] shrink-0 ml-4 font-semibold">Rp {{ number_format($order->total_price, 0, ',', '.') }}</span>
                </div>

            </div>

        </div>

        <div class="border-t border-gray-300"></div>

        <div class="grid lg:grid-cols-2">

            <div class="p-3 border-r border-gray-300">

                <h2 class="text-3xl font-semibold mb-8">
                    Informasi Pesanan
                </h2>

                <div class="space-y-3 text-lg">

                    <div class="grid grid-cols-[200px_20px_1fr]">
                        <span>No. Pesanan</span>
                        <span>:</span>
                        <span>{{ $order->invoice_number }}</span>
                    </div>

                    <div class="grid grid-cols-[200px_20px_1fr]">
                        <span>Tanggal Pesanan</span>
                        <span>:</span>
                        <span>{{ $order->created_at->translatedFormat('d F Y') }}</span>
                    </div>

                    <div class="grid grid-cols-[200px_20px_1fr]">
                        <span>Metode Pembayaran</span>
                        <span>:</span>
                        <span>{{ $order->payments->payment_method }}</span>
                    </div>

                    <div class="grid grid-cols-[200px_20px_1fr]">
                        <span>Nama</span>
                        <span>:</span>
                        <span>{{ $order->orderAddress->recipient_name }}</span>
                    </div>

                    <div class="grid grid-cols-[200px_20px_1fr]">
                        <span>Email</span>
                        <span>:</span>
                        <span class="break-all">
                            {{ $order->orderAddress->email }}
                        </span>
                    </div>

                    <div class="grid grid-cols-[200px_20px_1fr]">
                        <span>No.HP</span>
                        <span>:</span>
                        <span>{{ $order->orderAddress->recipient_phone }}</span>
                    </div>

                    <div class="grid grid-cols-[200px_20px_1fr]">
                        <span>Catatan Untuk Penjual</span>
                        <span>:</span>
                        <span>{{ $order->orderAddress->note }}</span>
                    </div>

                </div>

            </div>

            <div class="p-3">

                <h2 class="text-3xl font-semibold mb-8">
                    Informasi Pengiriman
                </h2>

                <div class="space-y-3 text-lg">

                    <div class="grid grid-cols-[160px_20px_1fr]">
                        <span>Kurir</span>
                        <span>:</span>
                        <span>{{ $order->orderAddress->shipping->courier }}</span>
                    </div>

                    <div class="grid grid-cols-[160px_20px_1fr]">
                        <span>layanan</span>
                        <span>:</span>
                        <span>{{ $order->orderAddress->shipping->service }}</span>
                    </div>

                    @if ($order->status === 'delivered' || $order->status === 'completed')
                    <div class="grid grid-cols-[160px_20px_1fr]">
                        <span>No.Resi</span>
                        <span>:</span>
                        <span>{{ $order->orderAddress->shipping->tracking_number }}</span>
                    </div>

                    <div class="grid grid-cols-[160px_20px_1fr]">
                        <span>Tanggal Kirim</span>
                        <span>:</span>
                        <span>{{ !empty($order->orderAddress->shipping->shipped_at) ? $order->orderAddress->shipping->shipped_at->translatedFormat('d F Y') : '-' }}</span>
                    </div>

                    <div class="grid grid-cols-[160px_20px_1fr]">
                        <span>Estimasi Tiba</span>
                        <span>:</span>
                        <span>{{ !empty($order->orderAddress->shipping->estimate) ? str_replace('day', 'hari', $order->orderAddress->shipping->estimate) : '-' }}</span>
                    </div>
                    @endif

                    <div class="grid grid-cols-[160px_20px_1fr]">
                        <span>Alamat Lengkap</span>
                        <span>:</span>
                        <span>{{ $order->orderAddress->full_address }}</span>
                    </div>

                    <div class="grid grid-cols-[160px_20px_1fr]">
                        <span>Kelurahan/desa</span>
                        <span>:</span>
                        <span>{{ $order->orderAddress->village }}</span>
                    </div>

                    <div class="grid grid-cols-[160px_20px_1fr]">
                        <span>Kecamatan</span>
                        <span>:</span>
                        <span>{{ $order->orderAddress->district }}</span>
                    </div>

                    <div class="grid grid-cols-[160px_20px_1fr]">
                        <span>Kabupaten/kota</span>
                        <span>:</span>
                        <span>{{ $order->orderAddress->regency }}</span>
                    </div>

                    <div class="grid grid-cols-[160px_20px_1fr]">
                        <span>Provinsi</span>
                        <span>:</span>
                        <span>{{ $order->orderAddress->province }}</span>
                    </div>

                    <div class="grid grid-cols-[160px_20px_1fr]">
                        <span>Kode Pos</span>
                        <span>:</span>
                        <span>{{ $order->orderAddress->postal_code }}</span>
                    </div>

                </div>

            </div>

        </div>

    </div>
</div>
