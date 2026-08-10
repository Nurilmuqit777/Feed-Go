<div class="space-y-6">

    <div class="flex items-center gap-3 border-2 border-gray-200 rounded-lg px-5 py-3 max-w-lg focus-within:border-[#2D5016] focus-within:ring-2 focus-within:ring-[#2D5016]/20 transition-all bg-[#D9D9D9]">
        <svg class="w-5 h-5 text-gray-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
        </svg>
        <input
            type="text"
            wire:model.live.debounce.300ms="search"
            placeholder="Cari berdasarkan Nomor Pesanan atau Nama Produk"
            class="text-sm w-full  outline-none text-gray-700 placeholder-gray-400"
        />

        <div wire:loading wire:target="search">
            <svg class="w-4 h-4 animate-spin text-[#2D5016]" viewBox="0 0 24 24" fill="none">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
        </div>

        @if($search)
        <button wire:click="$set('search', '')" class="text-gray-400 hover:text-gray-600 transition shrink-0">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
        @endif
    </div>

    @forelse($orders as $order)
    <div class="overflow-hidden hover:scale-101 hover:shadow-md transition rounded-2xl border border-gray-200 bg-white">

        <div class="p-6">
            <div class="flex flex-col md:flex-row gap-6">

                <div class="flex-1 space-y-3">

                    <div class="flex items-center gap-2">
                        @php
                            $statusConfig = match($order->status) {
                                'pending' => ['icon' => 'pending', 'text' => 'Menunggu pembayaran'],
                                'processing' => ['icon' => 'processing', 'text' => 'Diproses'],
                                'delivered' => ['icon' => 'delivered', 'text' => 'Dikirim'],
                                'completed' => ['icon' => 'completed', 'text' => 'Selesai'],
                                'cancelled' => ['icon' => 'cancelled', 'text' => 'Dibatalkan'],
                            };
                        @endphp

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

                            @case('cancelled')
                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26" fill="none">
                                    <circle cx="13" cy="13" r="13" fill="#E81010"/>
                                </svg>
                                @break
                        @endswitch
                        <h3 class="text-xl font-bold text-black">
                            Status: {{ $statusConfig['text'] }}
                        </h3>
                    </div>

                    @foreach($order->orderDetails as $detail)
                    <div class="space-y-1">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-gray-800 text-md">{{ $detail->product->product_name }} - {{ \Illuminate\Support\Str::title($detail->product->category->category) }}</p>
                                <p class="text-gray-500 text-md">x {{ $detail->quantity_ordered }}</p>
                            </div>
                            <div class="text-right shrink-0 ml-4">
                                @if($detail->discount_price_at_purchase)
                                <p class="text-gray-400 text-md line-through">
                                    Rp {{ number_format($detail->price_at_purchase, 0, ',', '.') }}
                                </p>
                                @endif
                                <p class="text-[#2D5016] font-semibold text-md">
                                    Rp {{ number_format($detail->discount_price_at_purchase ?? $detail->price_at_purchase, 0, ',', '.') }}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    {{-- <div class="flex justify-between items-center">
                        <p class="text-gray-700 text-sm">
                            Pengiriman: {{ $order->shipping_method }} ({{ $order->shipping_duration }})
                        </p>
                        <p class="text-[#2D5016] font-semibold text-sm shrink-0 ml-4">
                            Rp {{ number_format($order->shipping_cost, 0, ',', '.') }}
                        </p>
                    </div> --}}
                </div>

                <div class="shrink-0">
                    @if($order->orderDetails->first())
                    <div class="relative w-full md:w-48 h-48 rounded-2xl overflow-hidden bg-[#6C9D50]">
                        <img
                            src="{{ asset('storage/' . $order->orderDetails->first()->product->product_image1) }}"
                            alt="{{ $order->orderDetails->first()->product->product_name }}"
                            class="w-full h-full object-cover p-5"
                        />
                        <div class="absolute bottom-2 left-2 text-white text-xs px-2 py-0.5 rounded-full">
                            Berat: {{ $order->orderDetails->first()->product->product_weight }}{{ $order->orderDetails->first()->product->product_unit }}
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="border-t border-[#CDCDCD80]"></div>

        <div class="px-6 py-4 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">

            <div class="space-y-2">

                <p class="font-bold text-gray-800 text-md">
                    No. Pesanan:
                    <span class="text-[#2D5016]">#{{ ($order->invoice_number) }}</span>
                </p>


                @if($order->status === 'completed')
                <div class="flex items-center gap-2">
                    <span class="text-yellow-500"><x-svg.pin-icon /></span>
                    <p class="text-sm text-gray-700">Pesanan telah tiba di alamat tujuan</p>
                </div>
                <div class="flex items-center gap-4">
                    <div class="flex items-center gap-1">
                        <span class="text-yellow-500 text-sm"><x-svg.star-icon /></span>
                        <button class="text-sm text-[#2D5016] font-medium hover:underline transition">
                            Nilai Produk
                        </button>
                    </div>
                    <button class="text-sm text-[#2E7D32] font-medium hover:underline transition">
                        Hubungi FeedGo
                    </button>
                </div>

                @elseif ($order->status === 'pending')
                <div class="flex items-center gap-2">
                    <span class="text-yellow-500"><x-svg.pin-icon /></span>
                    <p class="text-sm text-gray-700">Pesanan otomatis dibatalkan jika waktu habis</p>
                </div>
                <div class="flex items-center gap-4">
                    <button class="text-sm text-[#2E7D32] font-medium hover:underline transition">
                        Hubungi FeedGo
                    </button>
                </div>

                @elseif ($order->status === 'delivered')
                <div class="flex items-center gap-2">
                    <span class="text-yellow-500"><x-svg.pin-icon /></span>
                    <p class="text-sm text-gray-700">Estimasi tiba: 30 - 31 maret 2026</p>
                </div>
                <div class="flex items-center gap-4">
                    <button class="text-sm text-[#2E7D32] font-medium hover:underline transition">
                        Hubungi FeedGo
                    </button>
                </div>

                @elseif ($order->status === 'cancelled')
                <div class="flex items-center gap-2">
                    <span class="text-yellow-500"><x-svg.pin-icon /></span>
                    <p class="text-sm text-gray-700">Pesanan dibatalkan</p>
                </div>
                <div class="flex items-center gap-4">
                    <button class="text-sm text-[#2E7D32] font-medium hover:underline transition">
                        Hubungi FeedGo
                    </button>
                </div>

                @elseif ($order->status === 'processing')
                <div class="flex items-center gap-2">
                    <span class="text-yellow-500"><x-svg.pin-icon /></span>
                    <p class="text-sm text-gray-700">Nomor resi akan dikirim setelah pesanan dikemas</p>
                </div>
                <div class="flex items-center gap-4">
                    <button class="text-sm text-[#2E7D32] font-medium hover:underline transition">
                        Hubungi FeedGo
                    </button>
                </div>
                @endif
            </div>

            <div class="flex flex-col sm:items-end gap-3 w-full sm:w-auto">

                <p class="text-sm font-bold text-gray-800">
                    Total Pesanan:
                    <span class="text-[#2D5016] text-xl font-bold">
                        Rp {{ number_format($order->total_price, 0, ',', '.') }}
                    </span>
                </p>

                <div class="flex flex-wrap gap-2">
                    @if($order->status === 'completed')

                        <button class="px-5 py-2.5 bg-red-500 hover:bg-red-600 text-white text-sm font-semibold rounded-xl transition-all duration-300 transform hover:scale-105 active:scale-95">
                            Komplain
                        </button>

                        <button class="px-5 py-2.5 bg-[#2D5016] hover:bg-[#1B5E20] text-white text-sm font-semibold rounded-xl transition-all duration-300 transform hover:scale-105 active:scale-95">
                            Beli Lagi
                        </button>

                        <a
                            href="{{ route('user.order-detail', $order->invoice_number) }}"
                            class="flex items-center justify-center px-5 py-2.5 bg-[#EAAA00] hover:bg-yellow-500 text-white text-sm font-semibold rounded-xl transition-all duration-300 transform hover:scale-105 active:scale-95">
                            Lihat Pesanan
                        </a>

                    @elseif($order->status === 'pending')

                        <a
                            href="{{ route('user.order-detail', $order->invoice_number) }}"
                            class="flex items-center justify-center px-5 py-2.5 bg-[#EAAA00] hover:bg-yellow-500 text-white text-sm font-semibold rounded-xl transition-all duration-300 transform hover:scale-105 active:scale-95">
                            Lanjutkan Pembayaran
                        </a>

                    @elseif($order->status === 'delivered')

                        <button
                            wire:click="confirmOrder({{ $order->id }})"
                            wire:confirm="Konfirmasi pesanan sudah diterima?"
                            class="px-5 py-2.5 bg-[#2D5016] hover:bg-[#1B5E20] text-white text-sm font-semibold rounded-xl transition-all duration-300 transform hover:scale-105 active:scale-95">
                            Konfirmasi Diterima
                        </button>

                        <a
                            href="{{ route('user.order-detail', $order->invoice_number) }}"
                            class="flex items-center justify-center px-5 py-2.5 bg-[#EAAA00] hover:bg-yellow-500 text-white text-sm font-semibold rounded-xl transition-all duration-300 transform hover:scale-105 active:scale-95">
                            Lihat Pesanan
                        </a>

                    @elseif($order->status === 'processing')

                        <a
                            href="{{ route('user.order-detail', $order->invoice_number) }}"
                            class="flex items-center justify-center px-5 py-2.5 bg-[#EAAA00] hover:bg-yellow-500 text-white text-sm font-semibold rounded-xl transition-all duration-300 transform hover:scale-105 active:scale-95">
                            Lihat Detail
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @empty

    <div class="flex flex-col items-center justify-center py-20 rounded-2xl border-3 border-gray-200">
        <svg class="w-24 h-24 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
        </svg>
        <h3 class="text-xl font-semibold text-gray-700 mb-2">Belum Ada Pesanan</h3>
        <p class="text-gray-500 text-center mb-6">
            @if($search)
                Tidak ada pesanan yang sesuai dengan pencarian "{{ $search }}"
            @else
                Anda belum memiliki riwayat pesanan
            @endif
        </p>
        @if($search)
            <button wire:click="$set('search', '')" class="px-6 py-3 bg-[#2D5016] text-white rounded-xl hover:bg-[#1B5E20] transition">
                Reset Pencarian
            </button>
        @else
            <a href="{{ route('produk') }}" class="px-6 py-3 bg-[#2D5016] text-white rounded-xl hover:bg-[#1B5E20] transition">
                Mulai Belanja
            </a>
        @endif
    </div>
    @endforelse

    @if($orders->hasPages())
    <div class="mt-6 flex justify-between items-center">
        <div class="text-sm text-gray-500">
            Menampilkan {{ $orders->firstItem() }}-{{ $orders->lastItem() }} dari {{ $orders->total() }} pesanan
        </div>
        <div class="inline-flex gap-2">
            <button
                wire:click="previousPage"
                @if($orders->onFirstPage()) disabled @endif
                class="px-4 py-2 text-sm font-medium rounded-lg transition
                       {{ $orders->onFirstPage()
                          ? 'bg-gray-100 text-gray-400 cursor-not-allowed'
                          : 'bg-white text-[#2D5016] border border-[#2D5016] hover:bg-green-50' }}">
                ← Sebelumnya
            </button>
            <button
                wire:click="nextPage"
                @if(!$orders->hasMorePages()) disabled @endif
                class="px-4 py-2 text-sm font-medium rounded-lg transition
                       {{ !$orders->hasMorePages()
                          ? 'bg-gray-100 text-gray-400 cursor-not-allowed'
                          : 'bg-white text-[#2D5016] border border-[#2D5016] hover:bg-green-50' }}">
                Selanjutnya →
            </button>
        </div>
    </div>
    @endif
</div>
