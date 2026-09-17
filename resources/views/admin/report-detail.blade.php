@php
    $statusConfig = match($order->status) {
        'pending' => ['label' => 'Menunggu Pembayaran', 'class' => 'bg-yellow-100 text-yellow-700 border border-yellow-300', 'paymentStatus' => 'pending'],
        'processing' => ['label' => 'Diproses', 'class' => 'bg-blue-100 text-blue-700 border border-blue-300', 'paymentStatus' => 'paid'],
        'delivered' => ['label' => 'Dikirim', 'class' => 'bg-purple-100 text-purple-700 border border-purple-300', 'paymentStatus' => 'paid'],
        'completed' => ['label' => 'Selesai', 'class' => 'bg-green-100 text-green-700 border border-green-300', 'paymentStatus' => 'paid'],
        'cancelled' => ['label' => 'Gagal', 'class' => 'bg-[#EB0004] text-white border border-red-300', 'paymentStatus' => 'expired'],
        default => ['label' => ucfirst($order->status), 'class' => 'bg-gray-100 text-gray-600 border border-gray-300', 'paymentStatus' => 'pending'],
    };

    $paymentStatus = match($order->payments->status) {
        'paid' => ['label' => 'Lunas', 'class' => 'bg-green-100 text-green-700 border border-green-300',],
        'expired' => ['label' => 'Gagal', 'class' => 'bg-[#EB0004] text-white border border-red-300',],
        default => ['label' => ucfirst($order->payments->status), 'class' => 'bg-gray-100 text-gray-600 border border-gray-300',],
    };

    $shippingStatus = match($order->orderAddress->shipping->status) {
        'submitted'=>['label'=>'Menunggu diserahkan ke pengiriman'],
        'shipped'=>['label'=>'Dalam Perjalanan'],
        'cancelled'=>['label'=>'Pesanan dibatalkan'],
        'finished'=>['label'=>'Sudah diterima'],
    }
@endphp

@section('title', 'Detail Laporan')

<x-layouts.app :title="__('Detail Laporan')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div>
            <h1 class="font-semibold text-3xl">Detail Pesanan FeedGo</h1>
            <span class="font-light">Kelola detail laporan pesanan pelanggan FeedGo</span>
            <p class="text-[#20222480] dark:text-white text-sm"><span class="text-[#EAAA00]">Laporan</span> / Detail pesanan </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-[2fr_1fr] gap-6 items-start">
            <div class="rounded-xl border border-gray-200 dark:border-neutral-700 p-4">

                <div class="flex items-start justify-between gap-4">
                    <div>
                        <h2 class="text-[21px] font-bold leading-tight dark:text-white text-black">
                            Nomor Pesanan #{{ $order->invoice_number }}
                        </h2>

                        <p class="mt-1 text-[14px] text-gray-600 dark:text-gray-400">
                            Dibuat: {{ $order->created_at->format('d F Y H:i') }}
                        </p>
                    </div>
                    <span class="inline-flex items-center px-4 py-1.5 rounded-full text-sm font-medium {{ $statusConfig['class'] }}">
                        {{ $statusConfig['label'] }}
                    </span>
                </div>

                <div class="mt-6">

                    <div class="grid grid-cols-[1fr_100px] border-b border-gray-200 dark:border-neutral-700 pb-1.5">
                        <h3 class="text-sm font-bold text-gray-800 dark:text-gray-200">
                            Produk
                        </h3>

                        <h3 class="text-sm font-bold text-gray-800 dark:text-gray-200">
                            Total Produk
                        </h3>
                    </div>

                    @foreach($order->orderdetails as $item)
                    <div class="flex min-h-[56px] items-center justify-between gap-4 border-b border-gray-200 dark:border-neutral-700 py-2">

                        <div class="flex min-w-0 items-center gap-3">

                            <div class="flex h-16 w-12 shrink-0 items-center bg-gradient-to-br from-[#CDEAC0] to-[#6C9D50] rounded-xl justify-center">
                                <img src="{{ asset('storage/' . $item->product->product_image1) }}" alt="FeedGo NutriGrow" class="h-11 w-11 object-contain">
                            </div>

                            <div class="flex min-w-0 items-center gap-3">
                                <span class="truncate text-[14px] font-medium text-gray-800 dark:text-gray-200">
                                    {{$item->product->product_name}} – {{ \Illuminate\Support\Str::title($item->product->category->category) }}
                                </span>

                                <span class="shrink-0 text-[10px] text-gray-500 dark:text-gray-400">
                                    x {{ $item->quantity_ordered }}
                                </span>
                            </div>
                        </div>


                        <div class="shrink-0 text-sm font-bold text-gray-700 dark:text-gray-300">
                            Rp {{ number_format($item->sub_total, 0, ',', '.') }}
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="mt-3 ">

                    <h3 class="mb-2 text-base font-bold text-gray-800 dark:text-gray-200">
                        Informasi Pelanggan
                    </h3>

                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">

                        <div class="space-y-2.5 md:border-r md:border-gray-200 dark:md:border-neutral-700 md:pr-5">

                            <div class="flex items-start gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 20 20" fill="none">
                                    <path d="M11.3394 7.73358C10.9148 7.90947 10.4596 8 10 8C9.07174 8 8.1815 7.63125 7.52513 6.97487C6.86875 6.3185 6.5 5.42826 6.5 4.5C6.5 3.57174 6.86875 2.6815 7.52513 2.02513C8.1815 1.36875 9.07174 1 10 1C10.4596 1 10.9148 1.09053 11.3394 1.26642C11.764 1.44231 12.1499 1.70012 12.4749 2.02513C12.7999 2.35013 13.0577 2.73597 13.2336 3.16061C13.4095 3.58525 13.5 4.04037 13.5 4.5C13.5 4.95963 13.4095 5.41475 13.2336 5.83939C13.0577 6.26403 12.7999 6.64987 12.4749 6.97487C12.1499 7.29988 11.764 7.55769 11.3394 7.73358Z" stroke="currentColor" stroke-opacity="0.75" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M1 19V18.4C1 16.16 1 15.04 1.436 14.184C1.81949 13.4314 2.43139 12.8195 3.184 12.436C4.04 12 5.16 12 7.4 12H12.6C14.84 12 15.96 12 16.816 12.436C17.5686 12.8195 18.1805 13.4314 18.564 14.184C19 15.04 19 16.16 19 18.4V19H1Z" stroke="currentColor" stroke-opacity="0.75" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <span class="text-[14px] text-gray-700 dark:text-gray-300">
                                    {{ $order->orderAddress->recipient_name }}
                                </span>
                            </div>

                            <div class="flex items-start gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none">
                                    <path d="M22 6C22 4.9 21.1 4 20 4H4C2.9 4 2 4.9 2 6V18C2 19.1 2.9 20 4 20H20C21.1 20 22 19.1 22 18V6ZM20 6L12 11L4 6H20ZM20 18H4V8L12 13L20 8V18Z" fill="currentColor" fill-opacity="0.75"/>
                                </svg>

                                <span class="text-[14px] text-gray-700 dark:text-gray-300">
                                    {{ $order->orderAddress->email }}
                                </span>
                            </div>

                            <div class="flex items-start gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none">
                                    <path d="M15.6 14.5221C13.205 17.0421 7.09603 10.9881 9.50003 8.45811C10.968 6.91311 9.31003 5.14811 8.39203 3.84911C6.66903 1.41411 2.88803 4.77611 3.00203 6.91511C3.36503 13.6611 10.662 21.6551 17.728 20.9571C19.938 20.7391 22.478 16.7471 19.943 15.2881C18.675 14.5581 16.934 13.1181 15.6 14.5211" stroke="currentColor" stroke-opacity="0.75" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>

                                <span class="text-[14px] text-gray-700 dark:text-gray-300">
                                    {{ $order->orderAddress->recipient_phone }}
                                </span>
                            </div>

                            <div class="flex items-start gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none">
                                    <path d="M16 10C16 7.79 14.21 6 12 6C9.79 6 8 7.79 8 10C8 12.21 9.79 14 12 14C14.21 14 16 12.21 16 10ZM10 10C10 8.9 10.9 8 12 8C13.1 8 14 8.9 14 10C14 11.1 13.1 12 12 12C10.9 12 10 11.1 10 10Z" fill="currentColor" fill-opacity="0.75"/>
                                    <path d="M11.4201 21.8102C11.5901 21.9302 11.8001 22.0002 12.0001 22.0002C12.2001 22.0002 12.4101 21.9402 12.5801 21.8102C12.8801 21.5902 20.0301 16.4402 20.0001 9.99023C20.0001 5.58023 16.4101 1.99023 12.0001 1.99023C7.59009 1.99023 4.00009 5.58023 4.00009 9.99023C3.97009 16.4302 11.1201 21.5902 11.4201 21.8102ZM12.0001 4.00023C15.3101 4.00023 18.0001 6.69023 18.0001 10.0002C18.0201 14.4402 13.6101 18.4302 12.0001 19.7402C10.3901 18.4302 5.98009 14.4502 6.00009 10.0002C6.00009 6.69023 8.69009 4.00023 12.0001 4.00023Z" fill="currentColor" fill-opacity="0.75"/>
                                </svg>
                                <span class="text-[14px] leading-4 text-gray-700 dark:text-gray-300">
                                    {{ $order->orderAddress->full_address }}, {{ \Illuminate\Support\Str::title($order->orderAddress->district) }}, {{ \Illuminate\Support\Str::title($order->orderAddress->regency) }}, {{ \Illuminate\Support\Str::title($order->orderAddress->province) }}
                                </span>
                            </div>

                        </div>

                        <div class="space-y-2.5 md:pl-1">

                            <h4 class="text-[14px] font-semibold text-gray-800 dark:text-gray-200">
                                Status Pengiriman
                            </h4>

                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="15" viewBox="0 0 16 20" fill="none">
                                    <path opacity="0.75" fill-rule="evenodd" clip-rule="evenodd" d="M0.65925 0.65925C-6.70552e-08 1.3185 0 2.37825 0 4.5V14.625C0 16.7467 -6.70552e-08 17.8065 0.65925 18.4657C1.3185 19.125 2.37825 19.125 4.5 19.125H11.25C13.3717 19.125 14.4315 19.125 15.0907 18.4657C15.75 17.8065 15.75 16.7467 15.75 14.625V4.5C15.75 2.37825 15.75 1.3185 15.0907 0.65925C14.4315 -6.70552e-08 13.3717 0 11.25 0H4.5C2.37825 0 1.3185 -6.70552e-08 0.65925 0.65925ZM4.5 4.5C4.20163 4.5 3.91548 4.61853 3.7045 4.8295C3.49353 5.04048 3.375 5.32663 3.375 5.625C3.375 5.92337 3.49353 6.20952 3.7045 6.4205C3.91548 6.63147 4.20163 6.75 4.5 6.75H11.25C11.5484 6.75 11.8345 6.63147 12.0455 6.4205C12.2565 6.20952 12.375 5.92337 12.375 5.625C12.375 5.32663 12.2565 5.04048 12.0455 4.8295C11.8345 4.61853 11.5484 4.5 11.25 4.5H4.5ZM4.5 9C4.20163 9 3.91548 9.11853 3.7045 9.3295C3.49353 9.54048 3.375 9.82663 3.375 10.125C3.375 10.4234 3.49353 10.7095 3.7045 10.9205C3.91548 11.1315 4.20163 11.25 4.5 11.25H11.25C11.5484 11.25 11.8345 11.1315 12.0455 10.9205C12.2565 10.7095 12.375 10.4234 12.375 10.125C12.375 9.82663 12.2565 9.54048 12.0455 9.3295C11.8345 9.11853 11.5484 9 11.25 9H4.5ZM4.5 13.5C4.20163 13.5 3.91548 13.6185 3.7045 13.8295C3.49353 14.0405 3.375 14.3266 3.375 14.625C3.375 14.9234 3.49353 15.2095 3.7045 15.4205C3.91548 15.6315 4.20163 15.75 4.5 15.75H9C9.29837 15.75 9.58452 15.6315 9.7955 15.4205C10.0065 15.2095 10.125 14.9234 10.125 14.625C10.125 14.3266 10.0065 14.0405 9.7955 13.8295C9.58452 13.6185 9.29837 13.5 9 13.5H4.5Z" fill="currentColor"/>
                                </svg>

                                <span class="text-[14px] text-gray-700 dark:text-gray-200">
                                    {{ $order->orderAddress->shipping->tracking_number ?? 'Nomor Resi Belum Ada' }}
                                </span>
                            </div>

                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="14" viewBox="0 0 25 24" fill="none">
                                    <g opacity="0.7">
                                        <path d="M8.65991 21.8999C8.65991 22.2977 8.81795 22.6793 9.09925 22.9606C9.38056 23.2419 9.76209 23.3999 10.1599 23.3999C10.5577 23.3999 10.9393 23.2419 11.2206 22.9606C11.5019 22.6793 11.6599 22.2977 11.6599 21.8999C11.6599 21.5021 11.5019 21.1205 11.2206 20.8392C10.9393 20.5579 10.5577 20.3999 10.1599 20.3999C9.76209 20.3999 9.38056 20.5579 9.09925 20.8392C8.81795 21.1205 8.65991 21.5021 8.65991 21.8999Z" fill="currentColor"/>
                                        <path d="M22.1 13.3599C21.9839 12.9456 21.7373 12.5798 21.3968 12.3168C21.0564 12.0538 20.6401 11.9076 20.21 11.8999H17.72C17.6577 11.8979 17.5981 11.8736 17.5522 11.8314C17.5063 11.7892 17.4771 11.7318 17.47 11.6699C17.3948 11.2443 17.1723 10.8588 16.8413 10.5809C16.5104 10.3029 16.0921 10.1504 15.66 10.1499H13.26C13.2142 10.1518 13.1698 10.1657 13.1312 10.1903C13.0925 10.2149 13.0611 10.2493 13.04 10.2899C12.414 11.5361 11.4543 12.5839 10.2678 13.3167C9.08123 14.0494 7.71453 14.4383 6.31998 14.4399H5.68998C5.61702 14.4381 5.54591 14.463 5.48998 14.5099C5.46415 14.5321 5.44357 14.5598 5.42974 14.5909C5.4159 14.622 5.40915 14.6558 5.40998 14.6899V19.8999C5.40998 20.364 5.59435 20.8092 5.92254 21.1373C6.25073 21.4655 6.69585 21.6499 7.15998 21.6499H7.46998C7.52847 21.6511 7.58552 21.6317 7.63119 21.5952C7.67687 21.5586 7.70829 21.5072 7.71998 21.4499C7.81804 20.8724 8.11734 20.3483 8.56486 19.9703C9.01238 19.5924 9.57923 19.3851 10.165 19.3851C10.7507 19.3851 11.3176 19.5924 11.7651 19.9703C12.2126 20.3483 12.5119 20.8724 12.61 21.4499C12.6193 21.5074 12.6483 21.5598 12.6921 21.5981C12.736 21.6365 12.7918 21.6583 12.85 21.6599H17C17.0594 21.6587 17.1166 21.6372 17.1621 21.599C17.2075 21.5608 17.2386 21.5082 17.25 21.4499C17.348 20.8724 17.6473 20.3483 18.0949 19.9703C18.5424 19.5924 19.1092 19.3851 19.695 19.3851C20.2807 19.3851 20.8476 19.5924 21.2951 19.9703C21.7426 20.3483 22.0419 20.8724 22.14 21.4499C22.1493 21.4958 22.1745 21.5369 22.211 21.5661C22.2476 21.5954 22.2932 21.6108 22.34 21.6099C22.6229 21.5952 22.8979 21.5108 23.1404 21.3643C23.3829 21.2178 23.5854 21.0136 23.73 20.7699C23.8811 20.524 23.9773 20.2483 24.0118 19.9618C24.0463 19.6753 24.0184 19.3846 23.93 19.1099L22.1 13.3599ZM20 13.8899C20.0528 13.8892 20.1045 13.9053 20.1476 13.9359C20.1907 13.9664 20.2231 14.0098 20.24 14.0599C20.31 14.2599 20.45 14.6899 20.73 15.5799C20.7468 15.6141 20.7555 15.6518 20.7555 15.6899C20.7555 15.728 20.7468 15.7657 20.73 15.7999C20.7086 15.8329 20.6788 15.8596 20.6436 15.8772C20.6085 15.8948 20.5692 15.9026 20.53 15.8999H17.67C17.6037 15.8999 17.5401 15.8736 17.4932 15.8267C17.4463 15.7798 17.42 15.7162 17.42 15.6499V14.1499C17.4199 14.0853 17.4449 14.0232 17.4896 13.9766C17.5344 13.93 17.5954 13.9025 17.66 13.8999L20 13.8899Z" fill="currentColor"/>
                                        <path d="M18.16 21.8998C18.16 22.2977 18.318 22.6792 18.5993 22.9605C18.8806 23.2418 19.2622 23.3998 19.66 23.3998C20.0578 23.3998 20.4394 23.2418 20.7207 22.9605C21.002 22.6792 21.16 22.2977 21.16 21.8998C21.16 21.502 21.002 21.1205 20.7207 20.8392C20.4394 20.5579 20.0578 20.3998 19.66 20.3998C19.2622 20.3998 18.8806 20.5579 18.5993 20.8392C18.318 21.1205 18.16 21.502 18.16 21.8998ZM6.32 13.2098C7.56757 13.2079 8.78656 12.8361 9.82292 12.1416C10.8593 11.447 11.6665 10.4608 12.1425 9.30765C12.6186 8.15448 12.7421 6.88606 12.4975 5.6627C12.2529 4.43934 11.6512 3.31594 10.7683 2.43447C9.88544 1.553 8.76109 0.953025 7.53735 0.710362C6.3136 0.467699 5.04538 0.59324 3.89296 1.07112C2.74054 1.549 1.75565 2.35778 1.06274 3.39523C0.369826 4.43269 1.56668e-06 5.65227 0 6.89984C-1.04164e-06 7.72932 0.163543 8.55067 0.481275 9.31688C0.799007 10.0831 1.26469 10.7792 1.85169 11.3652C2.43869 11.9513 3.13548 12.4159 3.9022 12.7324C4.66892 13.0489 5.49052 13.2112 6.32 13.2098ZM10.62 6.89984C10.622 7.75312 10.3706 8.5878 9.8978 9.2981C9.42497 10.0084 8.75195 10.5624 7.96399 10.8898C7.17603 11.2173 6.30861 11.3035 5.47162 11.1375C4.63463 10.9715 3.86575 10.5608 3.26238 9.95746C2.65902 9.35409 2.24832 8.58521 2.08234 7.74822C1.91636 6.91123 2.00255 6.04381 2.33 5.25585C2.65746 4.46789 3.21143 3.79486 3.92174 3.32204C4.63204 2.84921 5.46671 2.59786 6.32 2.59984C7.45962 2.60248 8.55181 3.05636 9.35764 3.8622C10.1635 4.66803 10.6174 5.76022 10.62 6.89984Z" fill="currentColor"/>
                                        <path d="M6.32007 7.9001H8.16007C8.42528 7.9001 8.67964 7.79474 8.86717 7.6072C9.05471 7.41967 9.16007 7.16531 9.16007 6.9001C9.16007 6.63488 9.05471 6.38053 8.86717 6.19299C8.67964 6.00545 8.42528 5.9001 8.16007 5.9001H7.57007C7.50376 5.9001 7.44018 5.87376 7.39329 5.82687C7.34641 5.77999 7.32007 5.7164 7.32007 5.6501V4.6001C7.32007 4.33488 7.21471 4.08053 7.02717 3.89299C6.83964 3.70545 6.58528 3.6001 6.32007 3.6001C6.05485 3.6001 5.8005 3.70545 5.61296 3.89299C5.42542 4.08053 5.32007 4.33488 5.32007 4.6001V6.9001C5.32007 7.16531 5.42542 7.41967 5.61296 7.6072C5.8005 7.79474 6.05485 7.9001 6.32007 7.9001Z" fill="currentColor"/>
                                    </g>
                                </svg>

                                <span class="text-[14px] text-gray-700 dark:text-gray-200">
                                    {{ str_replace('day', 'hari', $order->orderAddress->shipping->estimate) ?? 'Estimasi Pengiriman Tidak Ada' }}
                                </span>
                            </div>

                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" fill="none">
                                    <g opacity="0.7">
                                        <path d="M9.5 0C10.3721 0 11.2132 0.111328 12.0234 0.333984C12.8337 0.556641 13.5882 0.878255 14.2871 1.29883C14.986 1.7194 15.6261 2.21419 16.2075 2.7832C16.7889 3.35221 17.2868 3.99235 17.7012 4.70361C18.1156 5.41488 18.4341 6.17253 18.6567 6.97656C18.8794 7.7806 18.9938 8.62175 19 9.5C19 10.3721 18.8887 11.2132 18.666 12.0234C18.4434 12.8337 18.1217 13.5882 17.7012 14.2871C17.2806 14.986 16.7858 15.6261 16.2168 16.2075C15.6478 16.7889 15.0076 17.2868 14.2964 17.7012C13.5851 18.1156 12.8275 18.4341 12.0234 18.6567C11.2194 18.8794 10.3783 18.9938 9.5 19C8.62793 19 7.78678 18.8887 6.97656 18.666C6.16634 18.4434 5.41178 18.1217 4.71289 17.7012C4.014 17.2806 3.37386 16.7858 2.79248 16.2168C2.2111 15.6478 1.71322 15.0076 1.29883 14.2964C0.88444 13.5851 0.565918 12.8275 0.343262 12.0234C0.120605 11.2194 0.0061849 10.3783 0 9.5C0 8.62793 0.111328 7.78678 0.333984 6.97656C0.556641 6.16634 0.878255 5.41178 1.29883 4.71289C1.7194 4.014 2.21419 3.37386 2.7832 2.79248C3.35221 2.2111 3.99235 1.71322 4.70361 1.29883C5.41488 0.88444 6.17253 0.565918 6.97656 0.343262C7.7806 0.120605 8.62175 0.0061849 9.5 0ZM14.25 9.5H9.5V3.5625H8.3125V10.6875H14.25V9.5Z" fill="currentColor"/>
                                    </g>
                                </svg>

                                <span class="text-[14px] text-gray-700 dark:text-gray-200">
                                    {{ $shippingStatus['label'] }}
                                </span>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="grid grid-cols-1 gap-4 md:grid-cols-2 border-t border-gray-200 dark:border-neutral-700 mt-4 pt-2.5">
                    <div>

                        <h3 class="mb-2 text-base font-bold text-gray-800 dark:text-gray-200">
                            Ringkasan Pemesanan
                        </h3>

                        <div class="space-y-1.5 text-[14px]">

                            <div class="grid grid-cols-[145px_15px_1fr]">
                                <span>Pesanan dibuat</span>
                                <span>:</span>
                                <span>{{ $order->created_at->translatedFormat('d F Y') }}</span>
                            </div>

                            <div class="grid grid-cols-[145px_15px_1fr]">
                                <span>Waktu pemesanan</span>
                                <span>:</span>
                                <span>{{ $order->created_at->format('H:i') }} WITA</span>
                            </div>

                            <div class="grid grid-cols-[145px_15px_1fr]">
                                <span>Total Produk</span>
                                <span>:</span>
                                <span>Rp {{ number_format($order->total_product, 0, ',', '.') }}</span>
                            </div>

                            <div class="grid grid-cols-[145px_15px_1fr]">
                                <span>Biaya Pengiriman</span>
                                <span>:</span>
                                <span>Rp {{ number_format($order->orderAddress->shipping->cost, 0, ',', '.') }}</span>
                            </div>

                        </div>
                    </div>

                    <div>

                        <h3 class="mb-2 text-base font-bold text-gray-800 dark:text-gray-200">
                            Rincian Pembayaran
                        </h3>

                        <div class="space-y-1.5 text-[14px]">

                            <div class="grid grid-cols-[145px_15px_1fr]">
                                <span>Produk</span>
                                <span>:</span>
                                <span>{{ number_format($order->original_total, 0, ',', '.') }}</span>
                            </div>

                            <div class="grid grid-cols-[145px_15px_1fr]">
                                <span>Diskon</span>
                                <span>:</span>
                                <span>-Rp {{ number_format($order->total_discount, 0, ',', '.') }}</span>
                            </div>

                            <div class="grid grid-cols-[145px_15px_1fr]">
                                <span>Biaya pengiriman</span>
                                <span>:</span>
                                <span>Rp {{ number_format($order->orderAddress->shipping->cost, 0, ',', '.') }}</span>
                            </div>

                            <div class="grid grid-cols-[145px_15px_1fr]">
                                <span>Total Pembayaran</span>
                                <span>:</span>
                                <span>Rp {{ number_format($order->total_price, 0, ',', '.') }}</span>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

            <div class="space-y-4">

                <div class="bg-white dark:bg-neutral-800 rounded-2xl border border-gray-200 dark:border-neutral-700 p-5">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-lg font-bold text-gray-900 dark:text-white">Pembeli</h2>
                        <a href="https://wa.me/62{{ $order->orderAddress->recipient_phone }}" target="_blank"
                           class="flex items-center gap-2 px-4 py-2 bg-[#202224] dark:bg-[#50565a] dark:hover:bg-[#383c3f] hover:bg-[#50565a] hover:scale-105 active:scale-95 text-white text-sm font-medium rounded-xl transition">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="25" viewBox="0 0 32 25" fill="none">
                                <path d="M4.77842 5.02992C5.91774 4.94935 7.35869 4.94935 9.29462 4.94935H11.9985C15.7843 4.94935 17.6772 4.94935 19.1232 5.55185C20.3951 6.08182 21.4292 6.92746 22.0773 7.96759C22.8141 9.15005 22.8141 10.698 22.8141 13.7938V16.7776C22.8141 17.0867 22.8141 17.2413 22.8065 17.3719C22.6883 19.4137 21.2226 21.1627 19.1188 22.0386L21.2042 23.2488C22.5654 24.0387 24.3541 22.8979 23.7329 21.6361C23.2928 20.7423 24.103 19.77 25.288 19.77H26.2032C29.3714 19.77 31.9397 17.6835 31.9397 15.1097V9.88501C31.9397 6.42493 31.9397 4.69489 31.1108 3.37332C30.3817 2.21083 29.2184 1.26569 27.7875 0.673376C26.1607 0 24.0312 0 19.7722 0H16.7303C12.4713 0 10.3418 0 8.71504 0.673376C7.28413 1.26569 6.12076 2.21083 5.39167 3.37332C5.09192 3.85126 4.90057 4.38263 4.77842 5.02992Z" fill="white"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M20.6485 8.84984C21.2931 9.89319 21.2931 11.259 21.2931 13.9906V16.6234C21.2931 16.8961 21.2931 17.0325 21.2865 17.1478C21.1423 19.6602 18.7048 21.6702 15.6581 21.7892C15.5183 21.7946 15.3338 21.7946 14.9648 21.7946L14.8701 21.7947C13.6632 21.8011 12.4875 22.1118 11.5009 22.685L11.4382 22.7219L8.34984 24.541C7.29112 25.1646 5.89988 24.264 6.38309 23.2678C6.72538 22.5622 6.09517 21.7946 5.17353 21.7946H4.46169C1.99757 21.7946 0 20.1474 0 18.1154V13.9906C0 11.259 0 9.89319 0.64467 8.84984C1.21174 7.93208 2.11658 7.18593 3.22951 6.71831C4.49475 6.18669 6.15104 6.18669 9.46361 6.18669H11.8295C15.1421 6.18669 16.7984 6.18669 18.0636 6.71831C19.1765 7.18593 20.0814 7.93208 20.6485 8.84984ZM6.08375 16.0854C6.92374 16.0854 7.60469 15.5314 7.60469 14.8481C7.60469 14.1647 6.92374 13.6107 6.08375 13.6107C5.24376 13.6107 4.56281 14.1647 4.56281 14.8481C4.56281 15.5314 5.24376 16.0854 6.08375 16.0854ZM12.1675 14.8481C12.1675 15.5314 11.4866 16.0854 10.6466 16.0854C9.80657 16.0854 9.12563 15.5314 9.12563 14.8481C9.12563 14.1647 9.80657 13.6107 10.6466 13.6107C11.4866 13.6107 12.1675 14.1647 12.1675 14.8481ZM15.2094 16.0854C16.0494 16.0854 16.7303 15.5314 16.7303 14.8481C16.7303 14.1647 16.0494 13.6107 15.2094 13.6107C14.3694 13.6107 13.6884 14.1647 13.6884 14.8481C13.6884 15.5314 14.3694 16.0854 15.2094 16.0854Z" fill="white"/>
                            </svg>
                            Hubungi Pembeli
                        </a>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-gray-200 dark:bg-neutral-600 flex items-center justify-center shrink-0">
                            <svg class="w-6 h-6 text-gray-500" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z"/>
                            </svg>
                        </div>
                        <span class="font-medium text-gray-800 dark:text-gray-200">{{ $order->orderAddress->recipient_name }}</span>
                    </div>
                </div>

                <div class="bg-white dark:bg-neutral-800 rounded-2xl border border-gray-200 dark:border-neutral-700 p-5">
                    <div class="flex justify-between text-center items-center">
                        <h2 class="text-lg font-bold text-gray-900 dark:text-white mb-4">Total Pembayaran</h2>
                        <p class="inline-flex items-center px-4 py-1.5 rounded-full text-sm font-medium {{ $paymentStatus['class'] }}">
                            {{ $paymentStatus['label'] }}
                        </p>
                    </div>
                    <div class="gap-3 text-sm">
                        <p class="text-lg font-semibold text-gray-900 dark:text-white w-32 shrink-0">Rp {{ number_format($order->total_price, 0, ',', '.') }}</p>
                        <p class="text-black dark:text-white font-medium text-xs">
                            Pembayaran {{ Str::title($order->payments->payment_method ?? 'tidak ditemukan') }}
                        </p>
                    </div>
                </div>

                <div class="bg-white dark:bg-neutral-800 rounded-2xl border border-gray-200 dark:border-neutral-700 p-5">
                    @if($order->status === 'processing' || $order->status === 'delivered')
                    <h2 class="text-lg font-bold text-gray-900 dark:text-white mb-4">Info Pengiriman</h2>
                    <a  href="{{ route('admin.order-shipping', $order->invoice_number) }}" class="flex items-center justify-center bg-[#388E3C] hover:bg-[#46b34b] hover:scale-105 active:scale-95 transition shadow-lg rounded-xl text-white text-sm font-medium px-4 py-2 w-fit border border-[#909090]">
                        Lihat Pengiriman
                    </a>
                    @elseif ($order->status === 'completed')
                    <h2 class="text-lg font-bold text-gray-900 dark:text-white mb-4">Status Pesanan</h2>
                    <div class="flex items-center justify-center text-sm bg-[#388E3C] gap-3 rounded-xl font-medium transition text-black px-4 py-2 border-[#909090] w-fit border-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path d="M8.6 14.6L15.65 7.55L14.25 6.15L8.6 11.8L5.75 8.95L4.35 10.35L8.6 14.6ZM10 20C8.61667 20 7.31667 19.7375 6.1 19.2125C4.88333 18.6875 3.825 17.975 2.925 17.075C2.025 16.175 1.3125 15.1167 0.7875 13.9C0.2625 12.6833 0 11.3833 0 10C0 8.61667 0.2625 7.31667 0.7875 6.1C1.3125 4.88333 2.025 3.825 2.925 2.925C3.825 2.025 4.88333 1.3125 6.1 0.7875C7.31667 0.2625 8.61667 0 10 0C11.3833 0 12.6833 0.2625 13.9 0.7875C15.1167 1.3125 16.175 2.025 17.075 2.925C17.975 3.825 18.6875 4.88333 19.2125 6.1C19.7375 7.31667 20 8.61667 20 10C20 11.3833 19.7375 12.6833 19.2125 13.9C18.6875 15.1167 17.975 16.175 17.075 17.075C16.175 17.975 15.1167 18.6875 13.9 19.2125C12.6833 19.7375 11.3833 20 10 20ZM10 18C12.2333 18 14.125 17.225 15.675 15.675C17.225 14.125 18 12.2333 18 10C18 7.76667 17.225 5.875 15.675 4.325C14.125 2.775 12.2333 2 10 2C7.76667 2 5.875 2.775 4.325 4.325C2.775 5.875 2 7.76667 2 10C2 12.2333 2.775 14.125 4.325 15.675C5.875 17.225 7.76667 18 10 18Z" fill="white"/>
                        </svg>
                        <p class="text-sm text-white font-semibold text-center">
                            Pesanan telah diterima oleh pelanggan
                        </p>
                    </div>
                    @elseif ($order->status === 'cancelled')
                    <div class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M4.126 20.0001C3.97 20.0001 3.832 19.9631 3.712 19.8891C3.592 19.8151 3.49867 19.7174 3.432 19.5961C3.36 19.4768 3.32 19.3478 3.312 19.2091C3.30534 19.0698 3.34467 18.9294 3.43 18.7881L11.3 5.21211C11.3853 5.07077 11.488 4.96811 11.608 4.90411C11.728 4.84011 11.8587 4.80811 12 4.80811C12.1413 4.80811 12.2717 4.84011 12.391 4.90411C12.5103 4.96811 12.613 5.07077 12.699 5.21211L20.57 18.7881C20.6553 18.9294 20.6937 19.0684 20.685 19.2051C20.6763 19.3418 20.637 19.4721 20.567 19.5961C20.497 19.7201 20.403 19.8184 20.285 19.8911C20.167 19.9638 20.0303 20.0001 19.875 20.0001H4.126ZM12.434 17.4341C12.5553 17.3128 12.616 17.1681 12.616 17.0001C12.616 16.8321 12.5553 16.6874 12.434 16.5661C12.3127 16.4448 12.168 16.3844 12 16.3851C11.832 16.3858 11.6873 16.4461 11.566 16.5661C11.4447 16.6861 11.384 16.8308 11.384 17.0001C11.384 17.1694 11.4447 17.3141 11.566 17.4341C11.6873 17.5541 11.832 17.6144 12 17.6151C12.168 17.6158 12.3127 17.5554 12.434 17.4341ZM12.357 15.2411C12.4523 15.1451 12.5 15.0264 12.5 14.8851V10.8851C12.5 10.7431 12.452 10.6241 12.356 10.5281C12.26 10.4321 12.141 10.3844 11.999 10.3851C11.857 10.3858 11.7383 10.4334 11.643 10.5281C11.5477 10.6228 11.5 10.7418 11.5 10.8851V14.8851C11.5 15.0264 11.548 15.1451 11.644 15.2411C11.74 15.3371 11.859 15.3851 12.001 15.3851C12.143 15.3851 12.2617 15.3371 12.357 15.2411Z" fill="#EB0004"/>
                        </svg>
                        <h2 class="text-lg font-bold text-gray-900 dark:text-white mb-4">Penyebab Kegagalan</h2>
                    </div>
                    <p class="text-dark-800 dark:text-dark-300 text-sm">
                        Pembayaran tidak berhasil diverifikasi karena batas waktu pembayaran telah berakhir.
                    </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
