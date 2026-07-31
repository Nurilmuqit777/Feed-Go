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
    <div class="overflow-hidden shadow-sm">

        <div class="p-6">
            <div class="flex flex-col md:flex-row gap-6">

                <div class="flex-1 space-y-3">

                    <div class="flex items-center gap-2">
                        @php
                            $statusConfig = match($order->status) {
                                'selesai' => ['icon' => '✅', 'text' => 'Selesai', 'color' => 'text-[#2D5016]'],
                                'diproses' => ['icon' => '🔄', 'text' => 'Diproses', 'color' => 'text-blue-600'],
                                'dikirim' => ['icon' => '🚚', 'text' => 'Dikirim', 'color' => 'text-orange-500'],
                                'dibatalkan' => ['icon' => '❌', 'text' => 'Dibatalkan', 'color' => 'text-red-600'],
                                'menunggu' => ['icon' => '⏳', 'text' => 'Menunggu', 'color' => 'text-yellow-600'],
                                default => ['icon' => '📦', 'text' => ucfirst($order->status), 'color' => 'text-gray-600'],
                            };
                        @endphp
                        <span class="text-xl">{{ $statusConfig['icon'] }}</span>
                        <h3 class="text-xl font-bold {{ $statusConfig['color'] }}">
                            Status : {{ $statusConfig['text'] }}
                        </h3>
                    </div>

                    <p class="text-gray-500 text-sm">FeedGo</p>

                    @foreach($order->items as $item)
                    <div class="space-y-1">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-gray-800 text-sm">{{ $item->product->product_name }}</p>
                                <p class="text-gray-500 text-sm">x {{ $item->quantity }}</p>
                            </div>
                            <div class="text-right shrink-0 ml-4">
                                @if($item->product->product_discount_price)
                                <p class="text-gray-400 text-sm line-through">
                                    Rp {{ number_format($item->product->product_price, 0, ',', '.') }}
                                </p>
                                @endif
                                <p class="text-[#2D5016] font-semibold text-sm">
                                    Rp {{ number_format($item->product->product_discount_price ?? $item->product->product_price, 0, ',', '.') }}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <div class="flex justify-between items-center">
                        <p class="text-gray-700 text-sm">
                            Pengiriman: {{ $order->shipping_method }} ({{ $order->shipping_duration }})
                        </p>
                        <p class="text-[#2D5016] font-semibold text-sm shrink-0 ml-4">
                            Rp {{ number_format($order->shipping_cost, 0, ',', '.') }}
                        </p>
                    </div>
                </div>

                <div class="shrink-0">
                    @if($order->items->first())
                    <div class="relative w-full md:w-48 h-48 rounded-2xl overflow-hidden bg-[#6C9D50]">
                        <img
                            src="{{ asset('storage/' . $order->items->first()->product->product_image1) }}"
                            alt="{{ $order->items->first()->product->product_name }}"
                            class="w-full h-full object-cover"
                        />
                        <div class="absolute bottom-2 left-2 bg-black/50 text-white text-xs px-2 py-0.5 rounded-full">
                            Berat: {{ $order->items->first()->product->product_weight }}{{ $order->items->first()->product->product_unit }}
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="border-t border-gray-100"></div>

        <div class="px-6 py-4 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">

            <div class="space-y-2">

                <p class="font-bold text-gray-800 text-sm">
                    No. Pesanan:
                    <span class="text-[#2D5016]">#{{ str_pad($order->id, 4, '0', STR_PAD_LEFT) }}</span>
                </p>

                @if($order->status === 'selesai')
                <div class="flex items-center gap-2">
                    <span class="text-yellow-500">⭐</span>
                    <p class="text-sm text-gray-700">Pesanan telah tiba di alamat tujuan</p>
                </div>
                <div class="flex items-center gap-4">
                    <div class="flex items-center gap-1">
                        <span class="text-yellow-500 text-sm">⭐</span>
                        <button class="text-sm text-[#2D5016] font-medium hover:underline transition">
                            Nilai Produk
                        </button>
                    </div>
                    <button class="text-sm text-[#2D5016] font-medium hover:underline transition">
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
                    @if($order->status === 'selesai')

                        <button class="px-5 py-2.5 bg-red-500 hover:bg-red-600 text-white text-sm font-semibold rounded-xl transition-all duration-300 transform hover:scale-105 active:scale-95">
                            Komplain
                        </button>

                        <button class="px-5 py-2.5 bg-[#2D5016] hover:bg-[#1B5E20] text-white text-sm font-semibold rounded-xl transition-all duration-300 transform hover:scale-105 active:scale-95">
                            Beli Lagi
                        </button>

                        <a
                            href="{{ route('user.order.detail', $order->id) }}"
                            class="flex items-center justify-center px-5 py-2.5 bg-[#EAAA00] hover:bg-yellow-500 text-white text-sm font-semibold rounded-xl transition-all duration-300 transform hover:scale-105 active:scale-95">
                            Lihat Pesanan
                        </a>

                    @elseif($order->status === 'menunggu')

                        <a
                            href="{{ route('user.payment', $order->id) }}"
                            class="flex items-center justify-center px-5 py-2.5 bg-[#EAAA00] hover:bg-yellow-500 text-white text-sm font-semibold rounded-xl transition-all duration-300 transform hover:scale-105 active:scale-95">
                            Bayar Sekarang
                        </a>

                        <button
                            wire:click="cancelOrder({{ $order->id }})"
                            wire:confirm="Apakah Anda yakin ingin membatalkan pesanan ini?"
                            class="px-5 py-2.5 bg-red-500 hover:bg-red-600 text-white text-sm font-semibold rounded-xl transition-all duration-300 transform hover:scale-105 active:scale-95">
                            Batalkan
                        </button>

                    @elseif($order->status === 'dikirim')

                        <button
                            wire:click="confirmOrder({{ $order->id }})"
                            wire:confirm="Konfirmasi pesanan sudah diterima?"
                            class="px-5 py-2.5 bg-[#2D5016] hover:bg-[#1B5E20] text-white text-sm font-semibold rounded-xl transition-all duration-300 transform hover:scale-105 active:scale-95">
                            Konfirmasi Diterima
                        </button>

                        <a
                            href="{{ route('user.order.detail', $order->id) }}"
                            class="flex items-center justify-center px-5 py-2.5 bg-[#EAAA00] hover:bg-yellow-500 text-white text-sm font-semibold rounded-xl transition-all duration-300 transform hover:scale-105 active:scale-95">
                            Lihat Pesanan
                        </a>

                    @else

                        <a
                            href="{{ route('user.order.detail', $order->id) }}"
                            class="flex items-center justify-center px-5 py-2.5 bg-[#EAAA00] hover:bg-yellow-500 text-white text-sm font-semibold rounded-xl transition-all duration-300 transform hover:scale-105 active:scale-95">
                            Lihat Pesanan
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
