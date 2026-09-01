<div class="space-y-4">

    <div class="flex flex-col md:flex-row gap-3 bg-gray-50 dark:bg-neutral-700/50 p-4 rounded-lg">

        <div class="flex flex-wrap items-center gap-3 flex-1">

            <div class="relative" x-data="{
                open: false,
                startDate: @entangle('startDate'),
                endDate: @entangle('endDate')
            }">
                <button
                    type="button"
                    @click="open = !open"
                    class="flex items-center justify-center gap-2 px-4 py-2 text-sm
                           border border-gray-300 dark:border-neutral-600
                           rounded-lg bg-white dark:bg-neutral-800
                           text-gray-700 dark:text-gray-300
                           hover:bg-gray-50 dark:hover:bg-neutral-700
                           transition h-[38px]"
                    :class="startDate || endDate ? 'ring-2 ring-green-500 border-green-500 text-green-600 dark:text-green-400' : ''">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <span x-text="startDate && endDate ? `${startDate} - ${endDate}` : startDate ? startDate : 'Tanggal'"></span>
                    <svg class="w-4 h-4 transition-transform duration-300" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>

                <div
                    x-show="open"
                    @click.outside="open = false"
                    x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 scale-95 -translate-y-2"
                    x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                    x-transition:leave-end="opacity-0 scale-95 -translate-y-2"
                    x-cloak
                    class="absolute left-0 mt-2 w-72 bg-white dark:bg-neutral-800
                           border border-gray-200 dark:border-neutral-700
                           rounded-xl shadow-xl z-50 p-4 space-y-4">

                    <div>
                        <label class="block text-xs font-medium text-gray-500 dark:text-gray-400 mb-1">Dari</label>
                        <input type="date" wire:model.live="startDate"
                            class="w-full h-[38px] px-3 text-sm border border-gray-300 dark:border-neutral-600
                                   rounded-lg bg-white dark:bg-neutral-900 text-gray-700 dark:text-gray-300
                                   focus:ring-2 focus:ring-green-500 focus:outline-none"/>
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-gray-500 dark:text-gray-400 mb-1">Sampai</label>
                        <input type="date" wire:model.live="endDate"
                            class="w-full h-[38px] px-3 text-sm border border-gray-300 dark:border-neutral-600
                                   rounded-lg bg-white dark:bg-neutral-900 text-gray-700 dark:text-gray-300
                                   focus:ring-2 focus:ring-green-500 focus:outline-none"/>
                    </div>

                    <div class="border-t border-gray-200 dark:border-neutral-700 pt-3">
                        <p class="text-xs font-medium text-gray-500 dark:text-gray-400 mb-2">Pilihan cepat</p>
                        <div class="flex flex-wrap gap-2">
                            <button type="button"
                                @click="const t = new Date().toISOString().split('T')[0]; startDate = t; endDate = t; $wire.set('startDate', startDate); $wire.set('endDate', endDate);"
                                class="px-3 py-1.5 text-xs rounded-lg bg-gray-100 dark:bg-neutral-700 hover:bg-gray-200 dark:hover:bg-neutral-600 transition">
                                Hari ini
                            </button>
                            <button type="button"
                                @click="const e = new Date(); const s = new Date(); s.setDate(s.getDate()-6); startDate = s.toISOString().split('T')[0]; endDate = e.toISOString().split('T')[0]; $wire.set('startDate', startDate); $wire.set('endDate', endDate);"
                                class="px-3 py-1.5 text-xs rounded-lg bg-gray-100 dark:bg-neutral-700 hover:bg-gray-200 dark:hover:bg-neutral-600 transition">
                                7 hari terakhir
                            </button>
                            <button type="button"
                                @click="const n = new Date(); const s = new Date(n.getFullYear(), n.getMonth(), 1); startDate = s.toISOString().split('T')[0]; endDate = n.toISOString().split('T')[0]; $wire.set('startDate', startDate); $wire.set('endDate', endDate);"
                                class="px-3 py-1.5 text-xs rounded-lg bg-gray-100 dark:bg-neutral-700 hover:bg-gray-200 dark:hover:bg-neutral-600 transition">
                                Bulan ini
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open"
                    class="flex items-center justify-center gap-2 px-4 py-2 text-sm border border-gray-300 dark:border-neutral-600
                           rounded-lg bg-white dark:bg-neutral-800 text-gray-700 dark:text-gray-300
                           hover:bg-gray-50 dark:hover:bg-neutral-700 transition h-[38px]
                           {{ $filterStatus ? 'ring-2 ring-green-500 border-green-500' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="19" stroke="currentColor" viewBox="0 0 16 19" fill="none">
                        <path d="M12.75 0.75H2.75C1.64543 0.75 0.75 1.64543 0.75 2.75V15.75C0.75 16.8546 1.64543 17.75 2.75 17.75H12.75C13.8546 17.75 14.75 16.8546 14.75 15.75V2.75C14.75 1.64543 13.8546 0.75 12.75 0.75Z" stroke-width="1.5"/>
                        <path d="M4.75 5.75H10.75M4.75 9.75H10.75M4.75 13.75H8.75" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                    <span>
                        @switch($filterStatus)
                            @case('pending') Tertunda @break
                            @case('processing') Diproses @break
                            @case('delivered') Dikirim @break
                            @case('completed') Selesai @break
                            @case('cancelled') Dibatalkan @break
                            @default Status Pesanan
                        @endswitch
                    </span>
                    <svg class="w-4 h-4 transition-transform duration-300" :class="open ? 'rotate-180' : ''"
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>

                <div x-show="open" @click.away="open = false"
                    x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 scale-95 -translate-y-2"
                    x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                    x-transition:leave-end="opacity-0 scale-95 -translate-y-2"
                    x-cloak
                    class="absolute left-0 mt-2 w-48 bg-white dark:bg-neutral-800
                           border border-gray-200 dark:border-neutral-700
                           rounded-xl shadow-lg z-50 overflow-hidden">
                    <div class="py-1">
                        @foreach([
                            '' => ['label' => 'Semua Status', 'dot' => 'bg-gray-400', 'active' => 'text-green-600 dark:text-green-400 bg-green-50 dark:bg-green-900/20'],
                            'pending' => ['label' => 'Tertunda', 'dot' => 'bg-yellow-500', 'active' => 'text-yellow-600 dark:text-yellow-400 bg-yellow-50 dark:bg-yellow-900/20'],
                            'processing' => ['label' => 'Diproses', 'dot' => 'bg-blue-500', 'active' => 'text-blue-600 dark:text-blue-400 bg-blue-50 dark:bg-blue-900/20'],
                            'delivered' => ['label' => 'Dikirim', 'dot' => 'bg-purple-500', 'active' => 'text-purple-600 dark:text-purple-400 bg-purple-50 dark:bg-purple-900/20'],
                            'completed' => ['label' => 'Selesai', 'dot' => 'bg-green-500', 'active' => 'text-green-600 dark:text-green-400 bg-green-50 dark:bg-green-900/20'],
                            'cancelled' => ['label' => 'Dibatalkan', 'dot' => 'bg-red-500', 'active' => 'text-red-600 dark:text-red-400 bg-red-50 dark:bg-red-900/20'],
                        ] as $value => $config)

                        @if($value === 'pending')
                        <div class="border-t border-gray-100 dark:border-neutral-700 my-1"></div>
                        @endif

                        <button
                            wire:click="$set('filterStatus', '{{ $value }}')"
                            @click="open = false"
                            class="w-full text-left px-4 py-2.5 text-sm flex items-center gap-3 transition
                                   hover:bg-gray-50 dark:hover:bg-neutral-700
                                   {{ $filterStatus === $value ? $config['active'] . ' font-semibold' : 'text-gray-700 dark:text-gray-300' }}">
                            <span class="w-2 h-2 rounded-full {{ $config['dot'] }}"></span>
                            {{ $config['label'] }}
                            @if($filterStatus === $value)
                            <svg class="w-4 h-4 ml-auto" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            @endif
                        </button>
                        @endforeach
                    </div>
                </div>
            </div>

            <button
                wire:click="sortByColumn('created_at')"
                class="relative p-2 border rounded-lg transition-all duration-300 overflow-hidden
                       hover:bg-gray-100 dark:hover:bg-neutral-600
                       dark:border-neutral-600 text-gray-700 dark:text-white
                       {{ $sortDirection === 'asc'
                           ? 'bg-white dark:bg-neutral-700'
                           : 'bg-gray-100 dark:bg-neutral-600' }}"
                title="{{ $sortDirection === 'asc' ? 'Naik (Tanggal, 1-9)' : 'Turun (Tanggal, 9-1)' }}"
                x-data
                x-tooltip="'{{ $sortDirection === 'asc' ? 'Naik' : 'Turun' }}'">

                <span class="flex items-center gap-1 transition-all duration-300 {{ $sortDirection === 'asc' ? 'opacity-100 scale-100' : 'opacity-0 scale-75 absolute inset-0 flex items-center justify-center' }}">
                    <svg class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7"/>
                    </svg>
                </span>

                <span class="flex items-center gap-1 transition-all duration-300 {{ $sortDirection === 'desc' ? 'opacity-100 scale-100' : 'opacity-0 scale-75 absolute inset-0 flex items-center justify-center' }}">
                    <svg class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                    </svg>
                </span>
            </button>

            @if($search || $filterStatus || $startDate || $endDate)
            <button wire:click="resetFilters"
                class="flex items-center gap-2 px-4 py-2 text-sm text-red-600 dark:text-red-400
                       border border-red-200 dark:border-red-900/50
                       hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg transition h-[38px]">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
                Reset
            </button>
            @endif
        </div>

        <div class="relative w-full md:w-72">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </div>
            <input type="text" wire:model.live.debounce.300ms="search"
                placeholder="No Transaksi/Nama Pembeli"
                class="w-full h-[38px] pl-10 py-2 text-sm border border-gray-300 dark:border-neutral-600
                       rounded-lg bg-white dark:bg-neutral-800 text-gray-700 dark:text-gray-300
                       focus:ring-2 focus:ring-green-500 focus:border-green-500 focus:outline-none
                       placeholder:text-gray-400 transition"/>
            <div wire:loading wire:target="search" class="absolute right-3 top-1/2 transform -translate-y-1/2">
                <svg class="w-4 h-4 animate-spin text-[#5EB661]" viewBox="0 0 24 24" fill="none">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
            </div>
        </div>
    </div>

    <div class="overflow-x-auto bg-white dark:bg-neutral-800 rounded-xl shadow-sm">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 dark:bg-neutral-700/50 border-b border-gray-200 dark:border-neutral-700">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">No.</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">No. Transaksi</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Tanggal</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Pembeli</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Total</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                @forelse ($orders as $index => $order)
                <tr wire:key="order-{{ $order->id }}" onclick="window.location='{{ route('admin.order-detail', $order->invoice_number) }}'"" class="hover:bg-gray-50 dark:hover:bg-neutral-700/50 hover:scale-101 active:scale-99 transition">
                    <td class="px-6 py-4 whitespace-nowrap text-gray-500 dark:text-gray-400">
                        {{ ($orders->currentPage() - 1) * $orders->perPage() + $index + 1 }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900 dark:text-gray-100">
                        {{ $order->invoice_number }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-gray-600 dark:text-gray-400">
                        {{ $order->created_at->translatedFormat('d F Y') }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-100">
                        {{ $order->orderAddress->recipient_name }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap font-semibold text-gray-900 dark:text-gray-100">
                        Rp {{ number_format($order->total_price, 0, ',', '.') }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @php
                            $statusConfig = match($order->status) {
                                'pending' => ['dot' => 'bg-yellow-500', 'badge' => 'bg-yellow-100 text-yellow-700 dark:bg-yellow-900/30 dark:text-yellow-400'],
                                'processing' => ['dot' => 'bg-blue-500', 'badge' => 'bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400'],
                                'delivered' => ['dot' => 'bg-purple-500', 'badge' => 'bg-purple-100 text-purple-700 dark:bg-purple-900/30 dark:text-purple-400'],
                                'completed' => ['dot' => 'bg-green-500', 'badge' => 'bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400'],
                                'cancelled' => ['dot' => 'bg-red-500', 'badge' => 'bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-400'],
                                default => ['dot' => 'bg-gray-400', 'badge' => 'bg-gray-100 text-gray-600'],
                            };
                        @endphp
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold {{ $statusConfig['badge'] }}">
                            <span class="w-1.5 h-1.5 rounded-full {{ $statusConfig['dot'] }}"></span>
                            {{ $order->status_label }}
                        </span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-16 text-center text-gray-400 dark:text-gray-500">
                        <div class="flex flex-col items-center gap-2">
                            <svg class="mx-auto h-12 w-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                            </svg>
                            <p class="text-sm">Belum ada pesanan</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

    </div>
    @if($orders->hasPages())
    <div class="px-6 py-4 border-t border-gray-200 dark:border-neutral-700">
        {{ $orders->links() }}
    </div>
    @endif
</div>
