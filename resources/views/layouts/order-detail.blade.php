@extends('app')

@section('title', 'Detail Pesanan')

@php
    $headerCompact = true;
@endphp

@section('content')

@if ($order->status != 'pending' && $order->status != 'cancelled')
<section class="max-w-6xl mx-auto bg-[#F5F5F5] rounded-3xl -mt-50 relative z-20 p-10 px-25">
    <livewire:user.order.order-detail :order="$order"/>
</section>

@else
<section class="max-w-6xl mx-auto bg-[#F5F5F5] rounded-3xl -mt-50 relative z-20 p-10 px-25">

    @if ($order->status === 'pending')
    <h1 class="text-[#2E7D32] text-3xl font-bold text-center">Pesanan akan diproses setelah pembayaran berhasil diverifikasi.</h1>

    <div class="flex justify-center mt-10">
        <div class="inline-flex items-center gap-2 bg-[#BBDFA6] rounded-lg px-4 py-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M12 1.5C14.7848 1.5 17.4555 2.60625 19.4246 4.57538C21.3938 6.54451 22.5 9.21523 22.5 12C22.5 14.7848 21.3938 17.4555 19.4246 19.4246C17.4555 21.3938 14.7848 22.5 12 22.5C9.21523 22.5 6.54451 21.3938 4.57538 19.4246C2.60625 17.4555 1.5 14.7848 1.5 12C1.5 9.21523 2.60625 6.54451 4.57538 4.57538C6.54451 2.60625 9.21523 1.5 12 1.5ZM12 6C11.8096 5.99983 11.6212 6.03938 11.4469 6.11613C11.2726 6.19288 11.1162 6.30514 10.9878 6.44573C10.8593 6.58633 10.7616 6.75217 10.7008 6.93267C10.6401 7.11317 10.6177 7.30435 10.635 7.494L11.1825 13.503C11.2037 13.705 11.299 13.892 11.45 14.028C11.6009 14.1639 11.7969 14.2391 12 14.2391C12.2031 14.2391 12.3991 14.1639 12.55 14.028C12.701 13.892 12.7963 13.705 12.8175 13.503L13.3635 7.494C13.3808 7.30447 13.3584 7.11342 13.2978 6.93303C13.2371 6.75263 13.1395 6.58686 13.0112 6.44629C12.8829 6.30572 12.7268 6.19343 12.5526 6.11659C12.3785 6.03975 12.1903 6.00004 12 6ZM12 18C12.3183 18 12.6235 17.8736 12.8485 17.6485C13.0736 17.4235 13.2 17.1183 13.2 16.8C13.2 16.4817 13.0736 16.1765 12.8485 15.9515C12.6235 15.7264 12.3183 15.6 12 15.6C11.6817 15.6 11.3765 15.7264 11.1515 15.9515C10.9264 16.1765 10.8 16.4817 10.8 16.8C10.8 17.1183 10.9264 17.4235 11.1515 17.6485C11.3765 17.8736 11.6817 18 12 18Z" fill="#E81010"/>
            </svg>
            <h2 class="text-[#2D5016] text-sm font-semibold">Mohon pastikan data pesanan sudah benar, karena pesanan yang telah dibayar tidak dapat dibatalkan.</h2>
        </div>
    </div>

    @elseif ($order->status === 'cancelled')
    <div class="flex items-center gap-4 text-center justify-center">
    <h1 class="text-[#2E7D32] text-3xl font-bold">Pembelian dibatalkan</h1>
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 17 17" fill="none">
        <path d="M5.33333 12.5L8.33333 9.5L11.3333 12.5L12.5 11.3333L9.5 8.33333L12.5 5.33333L11.3333 4.16667L8.33333 7.16667L5.33333 4.16667L4.16667 5.33333L7.16667 8.33333L4.16667 11.3333L5.33333 12.5ZM8.33333 16.6667C7.18056 16.6667 6.09722 16.4478 5.08333 16.01C4.06945 15.5722 3.1875 14.9786 2.4375 14.2292C1.6875 13.4797 1.09389 12.5978 0.656668 11.5833C0.219446 10.5689 0.00055661 9.48556 1.05485e-06 8.33333C-0.000554501 7.18111 0.218334 6.09778 0.656668 5.08333C1.095 4.06889 1.68861 3.18694 2.4375 2.4375C3.18639 1.68806 4.06833 1.09444 5.08333 0.656667C6.09833 0.218889 7.18167 0 8.33333 0C9.485 0 10.5683 0.218889 11.5833 0.656667C12.5983 1.09444 13.4803 1.68806 14.2292 2.4375C14.9781 3.18694 15.5719 4.06889 16.0108 5.08333C16.4497 6.09778 16.6683 7.18111 16.6667 8.33333C16.665 9.48556 16.4461 10.5689 16.01 11.5833C15.5739 12.5978 14.9803 13.4797 14.2292 14.2292C13.4781 14.9786 12.5961 15.5725 11.5833 16.0108C10.5706 16.4492 9.48722 16.6678 8.33333 16.6667Z" fill="#EB0004"/>
    </svg>
    </div>

    <h2 class="text-[#2E7D32] text-3xl font-bold text-center">Lakukan pemesanan ulang</h2>
    @endif

    <div class="mt-10 space-y-6">

        <div class="grid lg:grid-cols-2 gap-6 items-start">
            <div class="bg-[#BBDFA6] rounded-xl p-6">

                <h2 class="text-3xl font-semibold text-[#2D5016] mb-6">
                    Informasi Pesanan
                </h2>
                @if ($order->status == 'pending')
                <div class="space-y-3 text-[#2D5016] font-semibold">

                    <p>
                        <span class="font-bold">Tanggal Pesanan:</span>
                        {{ $order->created_at->translatedFormat('d F Y . H:i') }} WITA
                    </p>

                    <p class="flex items-center gap-2">
                        <span class="font-bold">Status Pembayaran:</span>

                        {{ ucfirst($order->payments->status) }}

                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 25 25" fill="none">
                            <path d="M12.5 0C10.8585 0 9.23303 0.323322 7.71646 0.951506C6.19989 1.57969 4.8219 2.50043 3.66117 3.66117C1.31696 6.00537 0 9.18479 0 12.5C0 15.8152 1.31696 18.9946 3.66117 21.3388C4.8219 22.4996 6.19989 23.4203 7.71646 24.0485C9.23303 24.6767 10.8585 25 12.5 25C15.8152 25 18.9946 23.683 21.3388 21.3388C23.683 18.9946 25 15.8152 25 12.5C25 10.8585 24.6767 9.23303 24.0485 7.71646C23.4203 6.19989 22.4996 4.8219 21.3388 3.66117C20.1781 2.50043 18.8001 1.57969 17.2835 0.951506C15.767 0.323322 14.1415 0 12.5 0ZM17.75 17.75L11.25 13.75V6.25H13.125V12.75L18.75 16.125L17.75 17.75Z" fill="#2D5016"/>
                        </svg>
                    </p>

                    <p>
                        <span class="font-bold">Nomor Pesanan:</span>
                        #{{ $order->invoice_number }}
                    </p>
                    <div
    x-data="countdown('{{ $order->expired_at }}')"
    x-init="start()"
>
    <p class="text-sm text-red-600 font-medium">
        Selesaikan pembayaran dalam
    </p>

    <h2
        x-text="time"
        class="text-3xl font-bold text-red-600"
    ></h2>
</div>

                </div>

                @elseif ($order->status === 'cancelled')
                                    <div class="space-y-3 text-[#2D5016] font-semibold">

                    <p>
                        <span class="font-bold">Tanggal Pesanan:</span>
                        {{ $order->created_at->translatedFormat('d F Y . H:i') }} WITA
                    </p>

                    <p class="flex items-center gap-2">
                        <span class="font-bold">Status Pembayaran:</span>

                        {{ ucfirst($order->payments->status) }}

                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 25 25" fill="none">
                            <path d="M12.5 0C10.8585 0 9.23303 0.323322 7.71646 0.951506C6.19989 1.57969 4.8219 2.50043 3.66117 3.66117C1.31696 6.00537 0 9.18479 0 12.5C0 15.8152 1.31696 18.9946 3.66117 21.3388C4.8219 22.4996 6.19989 23.4203 7.71646 24.0485C9.23303 24.6767 10.8585 25 12.5 25C15.8152 25 18.9946 23.683 21.3388 21.3388C23.683 18.9946 25 15.8152 25 12.5C25 10.8585 24.6767 9.23303 24.0485 7.71646C23.4203 6.19989 22.4996 4.8219 21.3388 3.66117C20.1781 2.50043 18.8001 1.57969 17.2835 0.951506C15.767 0.323322 14.1415 0 12.5 0ZM17.75 17.75L11.25 13.75V6.25H13.125V12.75L18.75 16.125L17.75 17.75Z" fill="#2D5016"/>
                        </svg>
                    </p>

                    <p>
                        <span class="font-bold">Nomor Pesanan:</span>
                        #{{ $order->invoice_number }}
                    </p>

                </div>
                @endif

            </div>

            <div class="bg-[#BBDFA6] rounded-xl p-6">

                <h2 class="text-3xl font-semibold text-[#2D5016] mb-6">
                    Ringkasan Produk
                </h2>

                @foreach ($order->orderDetails as $detail)

                <div class="border-2 border-[#2D5016A6] rounded-2xl p-4 flex items-center gap-4 mt-2">
                    <div class="w-14 h-14 rounded-xl bg-[#FFFFFF] flex items-center justify-center shrink-0">
                        <img
                        src="{{ asset('storage/'.$detail->product->product_image1) }}"
                        alt="Produk"
                        class="w-10 h-auto object-contain"
                    />
                    </div>
                    <div>
                        <p class="font-medium text-[#2D5016] text-sm">{{ $detail->product->product_name }} - {{ \Illuminate\Support\Str::title($detail->product->category->category) }}</p>
                        <p class="text-xs text-[#2D5016] mt-0.5">Jumlah: {{ $detail->quantity_ordered }}</p>
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
                            @if ($order->shipping)

                            <div class="flex items-center gap-1.5 bg-[#EAAA00] rounded-full px-2 py-0.5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17" fill="none">
                                    <path d="M1.36214 2.04304V1.53223C1.22666 1.53223 1.09673 1.58604 1.00093 1.68184C0.905136 1.77764 0.851318 1.90757 0.851318 2.04304H1.36214ZM8.85412 2.04304H9.36494C9.36494 1.90757 9.31112 1.77764 9.21532 1.68184C9.11953 1.58604 8.9896 1.53223 8.85412 1.53223V2.04304ZM8.85412 6.12958V5.61876C8.71864 5.61876 8.58872 5.67258 8.49292 5.76838C8.39712 5.86418 8.3433 5.9941 8.3433 6.12958H8.85412ZM1.36214 2.55386H8.85412V1.53223H1.36214V2.55386ZM8.3433 2.04304V12.9405H9.36494V2.04304H8.3433ZM1.87295 11.5783V2.04304H0.851318V11.5783H1.87295ZM8.85412 6.6404H12.2596V5.61876H8.85412V6.6404ZM14.4731 8.85394V11.5783H15.4947V8.85394H14.4731ZM9.36494 12.9405V6.12958H8.3433V12.9405H9.36494ZM12.8617 13.5426C12.7826 13.6216 12.6887 13.6844 12.5854 13.7272C12.4821 13.77 12.3714 13.792 12.2596 13.792C12.1477 13.792 12.037 13.77 11.9337 13.7272C11.8304 13.6844 11.7365 13.6216 11.6575 13.5426L10.9355 14.2645C11.2868 14.6158 11.7632 14.8131 12.2599 14.8131C12.7566 14.8131 13.233 14.6158 13.5843 14.2645L12.8617 13.5426ZM11.6575 12.3384C11.7365 12.2593 11.8304 12.1966 11.9337 12.1538C12.037 12.111 12.1477 12.089 12.2596 12.089C12.3714 12.089 12.4821 12.111 12.5854 12.1538C12.6887 12.1966 12.7826 12.2593 12.8617 12.3384L13.5836 11.6164C13.2324 11.2652 12.756 11.0679 12.2592 11.0679C11.7625 11.0679 11.2861 11.2652 10.9349 11.6164L11.6575 12.3384ZM4.68858 13.5426C4.60952 13.6216 4.51565 13.6844 4.41235 13.7272C4.30904 13.77 4.19832 13.792 4.08649 13.792C3.97467 13.792 3.86395 13.77 3.76064 13.7272C3.65733 13.6844 3.56347 13.6216 3.48441 13.5426L2.76246 14.2645C3.11371 14.6158 3.5901 14.8131 4.08683 14.8131C4.58357 14.8131 5.05996 14.6158 5.41121 14.2645L4.68858 13.5426ZM3.48441 12.3384C3.56347 12.2593 3.65733 12.1966 3.76064 12.1538C3.86395 12.111 3.97467 12.089 4.08649 12.089C4.19832 12.089 4.30904 12.111 4.41235 12.1538C4.51565 12.1966 4.60952 12.2593 4.68858 12.3384L5.41053 11.6164C5.05928 11.2652 4.58289 11.0679 4.08615 11.0679C3.58942 11.0679 3.11303 11.2652 2.76177 11.6164L3.48441 12.3384ZM12.8617 12.3384C13.0278 12.5046 13.1109 12.7218 13.1109 12.9405H14.1326C14.1326 12.4617 13.9494 11.9815 13.5843 11.6158L12.8617 12.3384ZM13.1109 12.9405C13.1109 13.1591 13.0278 13.3764 12.8617 13.5426L13.5843 14.2645C13.7585 14.0909 13.8961 13.8845 13.9903 13.6573C14.0845 13.4301 14.1328 13.1865 14.1326 12.9405H13.1109ZM10.8974 12.4297H8.85412V13.4513H10.8974V12.4297ZM11.6575 13.5426C11.5781 13.4637 11.5152 13.3699 11.4724 13.2665C11.4296 13.1632 11.4078 13.0523 11.4082 12.9405H10.3866C10.3866 13.4193 10.5698 13.8995 10.9349 14.2652L11.6575 13.5426ZM11.4082 12.9405C11.4082 12.7218 11.4913 12.5046 11.6575 12.3384L10.9349 11.6164C10.7606 11.7901 10.6231 11.9964 10.5289 12.2237C10.4347 12.4509 10.3863 12.6945 10.3866 12.9405H11.4082ZM3.48441 13.5426C3.40506 13.4637 3.34216 13.3699 3.29936 13.2665C3.25657 13.1632 3.23474 13.0523 3.23513 12.9405H2.2135C2.2135 13.4193 2.39671 13.8995 2.76177 14.2652L3.48441 13.5426ZM3.23513 12.9405C3.23513 12.7218 3.31823 12.5046 3.48441 12.3384L2.76246 11.6164C2.58821 11.7901 2.45 11.9964 2.35579 12.2237C2.26158 12.4509 2.21322 12.6945 2.2135 12.9405H3.23513ZM8.85412 12.4297H5.44867V13.4513H8.85412V12.4297ZM4.68858 12.3384C4.85476 12.5046 4.93786 12.7218 4.93786 12.9405H5.95949C5.95949 12.4617 5.77628 11.9815 5.41121 11.6158L4.68858 12.3384ZM4.93786 12.9405C4.93786 13.1591 4.85476 13.3764 4.68858 13.5426L5.41053 14.2645C5.58478 14.0909 5.72298 13.8845 5.8172 13.6573C5.91141 13.4301 5.95977 13.1865 5.95949 12.9405H4.93786ZM14.4731 11.5783C14.4731 12.0483 14.0917 12.4297 13.6217 12.4297V13.4513C14.1185 13.4513 14.5949 13.254 14.9462 12.9027C15.2974 12.5515 15.4947 12.075 15.4947 11.5783H14.4731ZM12.2596 6.6404C12.8466 6.6404 13.4097 6.87361 13.8248 7.28873C14.2399 7.70385 14.4731 8.26687 14.4731 8.85394H15.4947C15.4947 7.99592 15.1539 7.17304 14.5472 6.56633C13.9405 5.95961 13.1176 5.61876 12.2596 5.61876V6.6404ZM0.851318 11.5783C0.851318 12.075 1.04865 12.5515 1.39991 12.9027C1.75116 13.254 2.22757 13.4513 2.72431 13.4513V12.4297C2.25436 12.4297 1.87295 12.0483 1.87295 11.5783H0.851318Z" fill="white"/>
                                </svg>
                            </div>
                            <span class="text-black text-md font-medium">
                                {{ $order->shipping->courier }} | {{ $order->shipping->service }}
                            </span>
                            @endif
                        </div>
                        <span class="text-md text-gray-700 shrink-0 ml-4">
                            @if ($order->shipping)
                                Rp {{ number_format($order->shipping->cost, 0, ',', '.') }}
                            @else
                            -
                            @endif
                        </span>
                    </div>
                </div>

                <div class="border-t border-[#2D5016A6] my-4"></div>

                <div class="flex justify-between items-center">
                    <span class="text-md text-black font-semibold">Total </span>
                    <span class="text-2xl text-[#2E7D32] shrink-0 ml-4 font-semibold">Rp {{ number_format($order->total_price, 0, ',', '.') }}</span>
                </div>

                <div class="border-t border-[#2D5016A6] my-4"></div>

                <div class ="flex items-center">
                    @if ($order->status === 'pending')
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none">
                        <path d="M1 21L12 2L23 21H1ZM12 18C12.2833 18 12.521 17.904 12.713 17.712C12.905 17.52 13.0007 17.2827 13 17C12.9993 16.7173 12.9033 16.48 12.712 16.288C12.5207 16.096 12.2833 16 12 16C11.7167 16 11.4793 16.096 11.288 16.288C11.0967 16.48 11.0007 16.7173 11 17C10.9993 17.2827 11.0953 17.5203 11.288 17.713C11.4807 17.9057 11.718 18.0013 12 18ZM11 15H13V10H11V15Z" fill="#CA2C31"/>
                    </svg>
                    <h2 class="text-[#2D5016] text-md ml-2">
                        Pastikan nominal pembayaran sama persis dengan total pesanan
                    </h2>

                    @elseif ($order->status === 'cancelled')
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 17 17" fill="none">
                        <path d="M5.33333 12.5L8.33333 9.5L11.3333 12.5L12.5 11.3333L9.5 8.33333L12.5 5.33333L11.3333 4.16667L8.33333 7.16667L5.33333 4.16667L4.16667 5.33333L7.16667 8.33333L4.16667 11.3333L5.33333 12.5ZM8.33333 16.6667C7.18056 16.6667 6.09722 16.4478 5.08333 16.01C4.06945 15.5722 3.1875 14.9786 2.4375 14.2292C1.6875 13.4797 1.09389 12.5978 0.656668 11.5833C0.219446 10.5689 0.00055661 9.48556 1.05485e-06 8.33333C-0.000554501 7.18111 0.218334 6.09778 0.656668 5.08333C1.095 4.06889 1.68861 3.18694 2.4375 2.4375C3.18639 1.68806 4.06833 1.09444 5.08333 0.656667C6.09833 0.218889 7.18167 0 8.33333 0C9.485 0 10.5683 0.218889 11.5833 0.656667C12.5983 1.09444 13.4803 1.68806 14.2292 2.4375C14.9781 3.18694 15.5719 4.06889 16.0108 5.08333C16.4497 6.09778 16.6683 7.18111 16.6667 8.33333C16.665 9.48556 16.4461 10.5689 16.01 11.5833C15.5739 12.5978 14.9803 13.4797 14.2292 14.2292C13.4781 14.9786 12.5961 15.5725 11.5833 16.0108C10.5706 16.4492 9.48722 16.6678 8.33333 16.6667Z" fill="#EB0004"/>
                    </svg>
                    <h2 class="text-[#2D5016] text-md ml-2">
                        Pembelian dibatalkan, silakan lakukan pemesanan ulang
                    </h2>
                    @endif

                </div>
            </div>
        </div>


        <div class="bg-[#BBDFA6] rounded-xl p-6">

            <h2 class="text-3xl font-bold text-[#2E7D32] mb-8">
                Informasi Pemesan & Pengiriman
            </h2>

            <div class="grid md:grid-cols-2 gap-16">
                <div>
                    <h3 class="text-2xl font-semibold text-[#2D5016] mb-6">
                        Data Pemesan
                    </h3>

                    <div class="text-[#2D5016]">

                        <div class="grid grid-cols-[140px_20px_1fr]">
                            <span>Nama</span>
                            <span>:</span>
                            <span>{{ $order->orderAddress->recipient_name }}</span>
                        </div>

                        <div class="grid grid-cols-[140px_20px_1fr]">
                            <span>Email</span>
                            <span>:</span>
                            <span>{{ $order->orderAddress->email }}</span>
                        </div>

                        <div class="grid grid-cols-[140px_20px_1fr]">
                            <span>No. HP</span>
                            <span>:</span>
                            <span>{{ $order->orderAddress->recipient_phone }}</span>
                        </div>

                        <div class="grid grid-cols-[140px_20px_1fr]">
                            <span>Catatan Untuk Penjual</span>
                            <span>:</span>
                            <span>{{ $order->orderAddress->note ?? '-' }}</span>
                        </div>

                    </div>
                </div>

                <div>
                    <h3 class="text-2xl font-semibold text-[#2D5016] mb-6">
                        Alamat Pengiriman
                    </h3>

                    <div class="text-[#2D5016]">

                        <div class="grid grid-cols-[160px_20px_1fr]">
                            <span>Provinsi</span>
                            <span>:</span>
                            <span>{{ $order->orderAddress->province }}</span>
                        </div>

                        <div class="grid grid-cols-[160px_20px_1fr]">
                            <span>Kabupaten/Kota</span>
                            <span>:</span>
                            <span>{{ $order->orderAddress->regency }}</span>
                        </div>

                        <div class="grid grid-cols-[160px_20px_1fr]">
                            <span>Kecamatan</span>
                            <span>:</span>
                            <span>{{ $order->orderAddress->district }}</span>
                        </div>

                        <div class="grid grid-cols-[160px_20px_1fr]">
                            <span>Desa/Kelurahan</span>
                            <span>:</span>
                            <span>{{ $order->orderAddress->village ?? '-' }}</span>
                        </div>

                        <div class="grid grid-cols-[160px_20px_1fr]">
                            <span>Alamat Lengkap</span>
                            <span>:</span>
                            <span>{{ $order->orderAddress->full_address }}</span>
                        </div>

                        <div class="grid grid-cols-[160px_20px_1fr]">
                            <span>Kode Pos</span>
                            <span>:</span>
                            <span>{{ $order->orderAddress->postal_code ?? '-' }}</span>
                        </div>

                    </div>
                </div>
            </div>

            @if($order->payments->status == 'pending')
            <div class="flex justify-end mt-20 space-x-4">
                <button
                    id="pay-button"
                    class="bg-[#2E7D32] hover:bg-green-600 hover:scale-103 text-white font-semibold rounded-xl px-8 py-4 transition"
                >
                    Lakukan Pembayaran
                </button>
            </div>

            @else
            <div class="flex justify-start mt-20">
                <p class="text-[#2D5016BF] text-sm font-semibold"> Butuh bantuan ? Hubungi Whatsapp Admin</p>
            </div>
            @endif

        </div>
    </div>
</section>

<script
src="https://app.sandbox.midtrans.com/snap/snap.js"
data-client-key="{{ config('midtrans.clientKey') }}">
</script>

<script>
document
.getElementById('pay-button')
.addEventListener('click', function () {

    snap.pay(
        "{{ $order->payments->snap_token }}",
        {

            onSuccess(result){
                window.location.reload();
            },

            onPending(result){
                window.location.reload();
            },

            onError(result){
                window.location.reload();
            },

            onClose(){
                location.reload();
            }

        }
    );

});
</script>
<script>
function countdown(expiredAt) {

    return {

        time: '',

        start() {

            const timer = setInterval(() => {

                const end = new Date(expiredAt).getTime();
                const now = new Date().getTime();

                let distance = end - now;

                if (distance <= 0) {

                    this.time = "00:00";

                    clearInterval(timer);

                    location.reload();

                    return;
                }

                const minutes = Math.floor(distance / 1000 / 60);
                const seconds = Math.floor(distance / 1000 % 60);

                this.time =
                    String(minutes).padStart(2,'0')
                    + ':' +
                    String(seconds).padStart(2,'0');

            },1000);

        }

    }

}
</script>
@endif
<x-layouts.app.superiority/>
@endsection
