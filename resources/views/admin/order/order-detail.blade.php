@php
    $statusConfig = match($order->status) {
        'pending' => ['label' => 'Menunggu Pembayaran', 'class' => 'bg-yellow-100 text-yellow-700 border border-yellow-300', 'paymentStatus' => 'pending'],
        'processing' => ['label' => 'Diproses', 'class' => 'bg-blue-100 text-blue-700 border border-blue-300', 'paymentStatus' => 'paid'],
        'delivered' => ['label' => 'Dikirim', 'class' => 'bg-purple-100 text-purple-700 border border-purple-300', 'paymentStatus' => 'paid'],
        'completed' => ['label' => 'Selesai', 'class' => 'bg-green-100 text-green-700 border border-green-300', 'paymentStatus' => 'paid'],
        'cancelled' => ['label' => 'Dibatalkan', 'class' => 'bg-red-100 text-red-700 border border-red-300', 'paymentStatus' => 'expired'],
        default => ['label' => ucfirst($order->status), 'class' => 'bg-gray-100 text-gray-600 border border-gray-300', 'paymentStatus' => 'pending'],
    };
@endphp

@section('title', 'detail pesanan')

<x-layouts.app :title="__('detail pesanan')">

    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div>
            <h1 class="font-semibold text-3xl">Detail Pesanan FeedGo</h1>
            <span class="font-light">Kelola seluruh produk pakan FeedGo</span>
            <p class="text-[#20222480] dark:text-white text-sm"><span class="text-[#EAAA00]">Pesanan</span> / Detail pesanan </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-[2fr_1fr] gap-6">

            <div class="space-y-6">

                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                            Nomor Pesanan #{{ $order->invoice_number }}
                        </h1>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                            Pesanan Dibuat: {{ $order->created_at->translatedFormat('d F Y') }} • {{ $order->created_at->format('H:i') }} WITA
                        </p>
                        @if ($statusConfig)
                            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                                Pesanan {{ $statusConfig['label'] }}: {{ $order->updated_at->translatedFormat('d F Y') }} • {{ $order->updated_at->format('H:i') }} WITA
                            </p>
                        @endif
                    </div>

                    <span class="inline-flex items-center px-4 py-1.5 rounded-full text-sm font-medium {{ $statusConfig['class'] }}">
                        {{ $statusConfig['label'] }}
                    </span>
                </div>

                <div class="bg-white dark:bg-neutral-800 rounded-2xl border border-gray-200 dark:border-neutral-700 overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm min-w-[700px]">
                            <thead class="border-b border-gray-200 dark:border-neutral-700">
                                <tr>
                                    <th class="px-6 py-4 text-left font-semibold text-gray-800 dark:text-gray-200">Produk</th>
                                    <th class="px-6 py-4 text-left font-semibold text-gray-800 dark:text-gray-200">Harga</th>
                                    <th class="px-6 py-4 text-left font-semibold text-gray-800 dark:text-gray-200">Diskon</th>
                                    <th class="px-6 py-4 text-left font-semibold text-gray-800 dark:text-gray-200">Total</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 dark:divide-neutral-700">
                                @foreach($order->orderDetails as $item)
                                <tr>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-4">
                                            <div class="w-12 h-16 rounded-xl bg-gradient-to-br from-[#CDEAC0] to-[#6C9D50] flex items-center justify-center shrink-0">
                                                <img
                                                    src="{{ asset('storage/' . $item->product->product_image1) }}"
                                                    alt="{{ $item->product->product_name }}"
                                                    class="w-10 h-14 object-contain"
                                                />
                                            </div>
                                            <div>
                                                <p class="font-medium text-gray-800 dark:text-gray-200">
                                                    {{ $item->product->product_name }} - {{ \Illuminate\Support\Str::title($item->product->category->category) }}
                                                </p>
                                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">
                                                    x {{ $item->quantity_ordered }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-6 py-4 text-gray-700 dark:text-gray-300">
                                        Rp {{ number_format($item->original_subtotal, 0, ',', '.') }}
                                    </td>

                                    <td class="px-6 py-4">
                                        @if($item->product->product_discount_price)
                                            <span class="text-red-500">
                                                -Rp {{ number_format($order->total_discount, 0, ',', '.') }}
                                            </span>
                                        @else
                                            <span class="text-gray-400">-</span>
                                        @endif
                                    </td>

                                    <td class="px-6 py-4 font-bold text-gray-900 dark:text-white">
                                        Rp {{ number_format($item->sub_total, 0, ',', '.') }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="bg-white dark:bg-neutral-800 rounded-2xl border border-gray-200 dark:border-neutral-700 p-6">
                    <h2 class="text-lg font-bold text-gray-900 dark:text-white mb-4">Informasi Pelanggan</h2>

                    <div class="divide-y divide-gray-300 dark:divide-neutral-700 font-semibold">
                        @foreach([
                            ['label' => 'Nama', 'value' => $order->orderAddress->recipient_name],
                            ['label' => 'Email', 'value' => $order->orderAddress->email],
                            ['label' => 'Nomor HP', 'value' => $order->orderAddress->recipient_phone ?? '-'],
                            ['label' => 'Catatan', 'value' => $order->orderAddress->note ?? '-'],
                        ] as $info)
                        <div class="flex items-center gap-4 py-3">
                            <span class="w-36 text-black dark:text-white text-sm shrink-0">{{ $info['label'] }}</span>
                            <span class="text-black dark:text-white text-sm shrink-0">:</span>
                            <span class="text-black dark:text-white text-sm">{{ $info['value'] }}</span>
                        </div>
                        @endforeach

                        <div class="flex items-center gap-4 py-3">
                            <span class="w-36 text-black dark:text-white text-sm shrink-0">Status Pembayaran</span>
                            <span class="text-black dark:text-white text-sm shrink-0">:</span>
                            <div class="flex items-center gap-2 text-sm flex-wrap">
                                <span class="{{ $statusConfig['paymentStatus'] === 'pending' ? 'text-[#2D5016] dark:text-green-400 font-bold' : 'text-gray-400' }}">Menunggu Pembayaran</span>
                                <span class="text-gray-300 dark:text-neutral-600">/</span>
                                <span class="{{ $statusConfig['paymentStatus'] === 'paid' ? 'text-[#2D5016] dark:text-green-400 font-bold' : 'text-gray-400' }}">Lunas</span>
                                <span class="text-gray-300 dark:text-neutral-600">/</span>
                                <span class="{{ $statusConfig['paymentStatus'] === 'expired' ? 'text-[#2D5016] dark:text-green-400 font-bold' : 'text-gray-400' }}">Kadaluarsa</span>
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
                    <h2 class="text-lg font-bold text-gray-900 dark:text-white mb-4">Ringkasan pemesanan</h2>

                    <div class="space-y-3 text-sm font-semibold">
                        @foreach([
                            ['label' => 'Pesanan dibuat', 'value' => $order->created_at->translatedFormat('d F Y')],
                            ['label' => 'Waktu pesanan', 'value' => $order->created_at->format('H:i') . ' WITA'],
                            ['label' => 'Total Produk', 'value' => 'Rp ' . number_format($order->total_product, 0, ',', '.')],
                            ['label' => 'Biaya Pengiriman', 'value' => 'Rp ' . number_format($order->orderAddress->shipping->cost, 0, ',', '.')],
                        ] as $item)
                        <div class="flex items-start gap-3">
                            <span class="text-black dark:text-white w-32 shrink-0">{{ $item['label'] }}</span>
                            <span class="text-black dark:text-white shrink-0">:</span>
                            <span class="text-black dark:text-white font-medium">{{ $item['value'] }}</span>
                        </div>
                        @endforeach
                    </div>

                    <div class="border-t border-gray-200 dark:border-neutral-700 mt-4 pt-4">
                        <div class="flex items-start gap-3 text-sm">
                            <span class="font-bold text-gray-900 dark:text-white w-32 shrink-0">Total</span>
                            <span class="text-gray-400 dark:text-neutral-500 shrink-0">:</span>
                            <span class="font-bold text-xl text-[#388E3C] text-base">
                                Rp {{ number_format($order->total_price, 0, ',', '.') }}
                            </span>
                        </div>
                        <div class="flex items-start gap-3 text-sm mt-1">
                            <span class="w-32 shrink-0"></span>
                            <span class="shrink-0 opacity-0">:</span>
                            <span class="text-black dark:text-white font-semibold">
                                Pembayaran {{ Str::title($order->payments->payment_method ?? 'tidak ditemukan') }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-neutral-800 rounded-2xl border border-gray-200 dark:border-neutral-700 p-5">
                    <h2 class="text-lg font-bold text-gray-900 dark:text-white mb-4">Alamat Pengiriman</h2>

                    <div class="space-y-3 text-sm">
                        @foreach([
                            ['label' => 'Provinsi', 'value' => $order->orderAddress->province ?? '-'],
                            ['label' => 'Kecamatan', 'value' => $order->orderAddress->district ?? '-'],
                            ['label' => 'Desa/Kelurahan', 'value' => $order->orderAddress->village ?? '-'],
                            ['label' => 'Alamat Lengkap', 'value' => $order->orderAddress->full_address ?? '-'],
                            ['label' => 'Kode Pos', 'value' => $order->orderAddress->postal_code ?? '-'],
                        ] as $item)
                        <div class="flex items-start gap-3">
                            <span class="text-gray-500 dark:text-gray-400 w-32 shrink-0">{{ $item['label'] }}</span>
                            <span class="text-gray-400 dark:text-neutral-500 shrink-0">:</span>
                            <span class="text-gray-800 dark:text-gray-200">{{ Str::title($item['value']) }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
                @if($order->status === 'processing' || $order->status === 'delivered')
                <a  href="{{ route('admin.order-shipping', $order->invoice_number) }}" class="flex items-center justify-center bg-[#F4D993] hover:bg-[#EFC965] hover:scale-105 active:scale-95 transition shadow-lg rounded-xl text-black text-sm font-medium px-4 py-2 w-fit border border-[#909090]">
                    Kelola Pengiriman
                </a>
                @elseif ($order->status === 'completed')
                <div class="flex items-center justify-center text-sm bg-[#E3EDDF] rounded-xl font-medium transition text-black px-4 py-2 border-[#909090] w-fit border-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12 21C13.6259 21.0001 15.2214 20.5598 16.6171 19.7259C18.0128 18.8919 19.1566 17.6955 19.9268 16.2636C20.697 14.8318 21.065 13.218 20.9916 11.5938C20.9182 9.96956 20.4062 8.39556 19.51 7.039L12.355 14.989C12.0208 15.3604 11.5597 15.5933 11.0624 15.6418C10.5651 15.6903 10.0677 15.5509 9.668 15.251L6.40001 12.8C6.18783 12.6409 6.04756 12.404 6.01006 12.1414C5.97255 11.8789 6.04087 11.6122 6.2 11.4C6.35913 11.1878 6.59603 11.0476 6.85858 11.0101C7.12113 10.9725 7.38783 11.0409 7.6 11.2L10.868 13.651L18.214 5.49C17.1498 4.47411 15.8528 3.7346 14.4365 3.33622C13.0202 2.93784 11.5279 2.89274 10.0901 3.20487C8.65238 3.517 7.31308 4.17684 6.18948 5.12661C5.06588 6.07639 4.19225 7.28713 3.64508 8.65284C3.09792 10.0185 2.8939 11.4976 3.0509 12.9604C3.2079 14.4233 3.72113 15.8253 4.54564 17.0438C5.37016 18.2623 6.48082 19.2601 7.78038 19.9498C9.07994 20.6395 10.5288 21.0001 12 21Z" fill="#388E3C"/>
                    </svg>
                    <p class="text-sm text-[#388E3C] font-semibold text-center">
                        Pesanan Selesai
                    </p>
                </div>
                @endif
            </div>
        </div>
    </div>


</x-layouts.app>
