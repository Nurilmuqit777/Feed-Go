<div class="space-y-4"">

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
                           {{ $filterCourier ? 'ring-2 ring-green-500 border-green-500' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="20" viewBox="0 0 22 20" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M1.41163e-07 1C1.41163e-07 0.734784 0.105357 0.48043 0.292893 0.292893C0.48043 0.105357 0.734784 0 1 0H12C12.2652 0 12.5196 0.105357 12.7071 0.292893C12.8946 0.48043 13 0.734784 13 1V6H17C17.6566 6 18.3068 6.12933 18.9134 6.3806C19.52 6.63188 20.0712 7.00017 20.5355 7.46447C20.9998 7.92876 21.3681 8.47996 21.6194 9.08658C21.8707 9.69321 22 10.3434 22 11V15C22.0003 15.6438 21.7934 16.2706 21.41 16.7878C21.0266 17.305 20.4871 17.6851 19.871 17.872C19.6876 18.477 19.3178 19.0086 18.8143 19.3909C18.3108 19.7732 17.6994 19.9867 17.0674 20.0009C16.4353 20.0151 15.815 19.8293 15.2948 19.4699C14.7747 19.1106 14.3814 18.5962 14.171 18H7.83C7.61962 18.5962 7.22629 19.1106 6.70616 19.4699C6.18602 19.8293 5.56566 20.0151 4.93363 20.0009C4.3016 19.9867 3.69021 19.7732 3.18673 19.3909C2.68324 19.0086 2.3134 18.477 2.13 17.872C1.51376 17.6853 0.973947 17.3052 0.590369 16.788C0.206792 16.2708 -0.000197331 15.6439 1.41163e-07 15V11H6C6.26522 11 6.51957 10.8946 6.70711 10.7071C6.89464 10.5196 7 10.2652 7 10C7 9.73478 6.89464 9.48043 6.70711 9.29289C6.51957 9.10536 6.26522 9 6 9H1.41163e-07V7H4C4.26522 7 4.51957 6.89464 4.70711 6.70711C4.89464 6.51957 5 6.26522 5 6C5 5.73478 4.89464 5.48043 4.70711 5.29289C4.51957 5.10536 4.26522 5 4 5H1.41163e-07V1ZM13 16H14.171C14.3687 15.4404 14.7279 14.9521 15.2032 14.5967C15.6785 14.2414 16.2485 14.0349 16.8411 14.0036C17.4337 13.9722 18.0223 14.1173 18.5325 14.4205C19.0426 14.7237 19.4513 15.1714 19.707 15.707C19.8946 15.5195 19.9999 15.2652 20 15V11C20 10.2044 19.6839 9.44129 19.1213 8.87868C18.5587 8.31607 17.7956 8 17 8H13V16ZM6 17C6 16.7348 5.89464 16.4804 5.70711 16.2929C5.51957 16.1054 5.26522 16 5 16C4.73478 16 4.48043 16.1054 4.29289 16.2929C4.10536 16.4804 4 16.7348 4 17C4 17.2652 4.10536 17.5196 4.29289 17.7071C4.48043 17.8946 4.73478 18 5 18C5.26522 18 5.51957 17.8946 5.70711 17.7071C5.89464 17.5196 6 17.2652 6 17ZM16.293 16.293C16.1054 16.4805 16.0001 16.7348 16 17C16 17.2314 16.0801 17.4556 16.2269 17.6344C16.3736 17.8133 16.5778 17.9358 16.8047 17.981C17.0316 18.0261 17.2672 17.9912 17.4712 17.8822C17.6753 17.7732 17.8352 17.5968 17.9238 17.3831C18.0124 17.1693 18.0241 16.9315 17.957 16.7101C17.8899 16.4887 17.7481 16.2974 17.5557 16.1688C17.3634 16.0403 17.1324 15.9824 16.9021 16.005C16.6719 16.0277 16.4566 16.1294 16.293 16.293Z" fill="currentColor" fill-opacity="0.8"/>
                    </svg>
                    <span>
                        @switch($filterCourier)
                            @case('jne') JNE @break
                            @case('jnt') JNT @break
                            @case('sicepat') SICEPAT @break
                            @default Kurir
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
                            '' => ['label' => 'Semua Kurir', 'active' => 'text-green-600 dark:text-green-400 bg-green-50 dark:bg-green-900/20'],
                            'jne' => ['label' => 'JNE', 'active' => 'text-yellow-600 dark:text-yellow-400 bg-yellow-50 dark:bg-yellow-900/20'],
                            'jnt' => ['label' => 'JNT', 'active' => 'text-blue-600 dark:text-blue-400 bg-blue-50 dark:bg-blue-900/20'],
                            'sicepat' => ['label' => 'SICEPAT', 'active' => 'text-purple-600 dark:text-purple-400 bg-purple-50 dark:bg-purple-900/20'],
                        ] as $value => $config)

                        @if($value === 'jne')
                        <div class="border-t border-gray-100 dark:border-neutral-700 my-1"></div>
                        @endif

                        <button
                            wire:click="$set('filterCourier', '{{ $value }}')"
                            @click="open = false"
                            class="w-full text-left px-4 py-2.5 text-sm flex items-center gap-3 transition
                                   hover:bg-gray-50 dark:hover:bg-neutral-700
                                   {{ $filterCourier === $value ? $config['active'] . ' font-semibold' : 'text-gray-700 dark:text-gray-300' }}">
                            {{ $config['label'] }}
                            @if($filterCourier === $value)
                            <svg class="w-4 h-4 ml-auto" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            @endif
                        </button>
                        @endforeach
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
                            @case('submitted') Menunggu @break
                            @case('picked_up') Diproses @break
                            @case('shipped') Dikirim @break
                            @case('finished') Selesai @break
                            @case('cancelled') Dibatalkan @break
                            @default Status Pengiriman
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
                            'submitted' => ['label' => 'Menunggu', 'dot' => 'bg-yellow-500', 'active' => 'text-yellow-600 dark:text-yellow-400 bg-yellow-50 dark:bg-yellow-900/20'],
                            'picked_up' => ['label' => 'Diproses', 'dot' => 'bg-blue-500', 'active' => 'text-blue-600 dark:text-blue-400 bg-blue-50 dark:bg-blue-900/20'],
                            'shipped' => ['label' => 'Dikirim', 'dot' => 'bg-purple-500', 'active' => 'text-purple-600 dark:text-purple-400 bg-purple-50 dark:bg-purple-900/20'],
                            'finished' => ['label' => 'Selesai', 'dot' => 'bg-green-500', 'active' => 'text-green-600 dark:text-green-400 bg-green-50 dark:bg-green-900/20'],
                            'cancelled' => ['label' => 'Dibatalkan', 'dot' => 'bg-red-500', 'active' => 'text-red-600 dark:text-red-400 bg-red-50 dark:bg-red-900/20'],
                        ] as $value => $config)

                        @if($value === 'submitted')
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

            @if($search || $filterStatus || $startDate || $endDate || $filterCourier)
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
                placeholder="No Transaksi/Nama Pembeli/resi"
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
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">No. Transaksi</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Pembeli</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Kurir</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">No. Resi</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Tanggal & Waktu</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                @forelse ($shippings as $index => $shipping)
                <tr wire:key="shipping-{{ $shipping->id }}" onclick="window.location='{{ route('admin.order-shipping', $shipping->orderAddress->order->invoice_number) }}'"" class="hover:bg-gray-50 dark:hover:bg-neutral-700/50 hover:scale-101 active:scale-99 transition">
                    <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900 dark:text-gray-100">
                        {{ $shipping->orderAddress->order->invoice_number }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900 dark:text-gray-100">
                        {{ $shipping->orderAddress->recipient_name }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-100">
                        {{ $shipping->courier }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap font-semibold text-gray-900 dark:text-gray-100">
                        {{ $shipping->tracking_number ?? '-' }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @php
                            $statusConfig = match($shipping->status) {
                                'submitted' => ['dot' => 'bg-yellow-500', 'badge' => 'bg-yellow-100 text-yellow-700 dark:bg-yellow-900/30 dark:text-yellow-400'],
                                'picked_up' => ['dot' => 'bg-blue-500', 'badge' => 'bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400'],
                                'shipped' => ['dot' => 'bg-purple-500', 'badge' => 'bg-purple-100 text-purple-700 dark:bg-purple-900/30 dark:text-purple-400'],
                                'finished' => ['dot' => 'bg-green-500', 'badge' => 'bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400'],
                                'cancelled' => ['dot' => 'bg-red-500', 'badge' => 'bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-400'],
                                default => ['dot' => 'bg-gray-400', 'badge' => 'bg-gray-100 text-gray-600'],
                            };
                        @endphp
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold {{ $statusConfig['badge'] }}">
                            <span class="w-1.5 h-1.5 rounded-full {{ $statusConfig['dot'] }}"></span>
                            {{ $shipping->status_label }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap font-semibold text-gray-900 dark:text-gray-100">
                        {{ $shipping->created_at->translatedFormat('d M Y ') }}, {{ $shipping->created_at->format('H:i') }}
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
    @if($shippings->hasPages())
    <div class="px-6 py-4 border-t border-gray-200 dark:border-neutral-700">
        {{ $shippings->links() }}
    </div>
    @endif
</div>
