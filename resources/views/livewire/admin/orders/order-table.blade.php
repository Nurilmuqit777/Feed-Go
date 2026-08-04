<div class="space-y-4">

    <div class="flex flex-wrap items-center gap-3 bg-gray-50 dark:bg-neutral-700/50 p-4 rounded-lg">

        <div class="flex flex-wrap items-center gap-3">
            <div class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600 dark:text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                </svg>
                <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Filter By</span>
            </div>

            <button
                wire:click="sortByColumn('created_at')"
                class="flex items-center gap-2 px-4 py-2 text-sm border border-gray-300 dark:border-neutral-600
                       rounded-lg bg-white dark:bg-neutral-800 text-gray-700 dark:text-gray-300
                       hover:bg-gray-50 dark:hover:bg-neutral-700 transition
                       {{ $sortBy === 'created_at' ? 'ring-2 ring-blue-500 border-blue-500' : '' }}">
                <span>Tanggal</span>
                @if($sortBy === 'created_at')
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        @if($sortDirection === 'asc')
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                        @else
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        @endif
                    </svg>
                @endif
            </button>

            <button
                wire:click="sortByColumn('id')"
                class="flex items-center gap-2 px-4 py-2 text-sm border border-gray-300 dark:border-neutral-600
                       rounded-lg bg-white dark:bg-neutral-800 text-gray-700 dark:text-gray-300
                       hover:bg-gray-50 dark:hover:bg-neutral-700 transition
                       {{ $sortBy === 'id' ? 'ring-2 ring-blue-500 border-blue-500' : '' }}">
                <span>ID Pesanan</span>
                @if($sortBy === 'id')
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        @if($sortDirection === 'asc')
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                        @else
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        @endif
                    </svg>
                @endif
            </button>

            <select wire:model.live="filterStatus"
                    class="px-4 py-2 text-sm border border-gray-300 dark:border-neutral-600
                           rounded-lg bg-white dark:bg-neutral-800 text-gray-700 dark:text-gray-300
                           focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <option value="">Status Pesanan</option>
                <option value="pending">Tertunda</option>
                <option value="processing">Diproses</option>
                <option value="completed">Selesai</option>
                <option value="cancelled">Dibatalkan</option>
            </select>

            @if($search || $filterStatus )
            <button wire:click="resetFilters"
                    class="flex items-center gap-2 px-4 py-2 text-sm text-red-600 dark:text-red-400
                           hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
                Reset filter
            </button>
            @endif
        </div>

        <div class=" w-full md:w-auto ml-auto">
            <div class="relative max-w-md">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <input type="text"
                wire:model.live.debounce.300ms="search"
                placeholder="Cari ID Pesanan / Nama Pemesan"
                class="px-4 pl-10 py-2 text-sm border border-gray-300 dark:border-neutral-600
                       rounded-lg bg-white dark:bg-neutral-800 text-gray-700 dark:text-gray-300
                       focus:ring-2 focus:ring-blue-500 focus:border-transparent
                       placeholder:text-gray-400"/>
            </div>
        </div>

    </div>

    <div class="overflow-x-auto bg-white dark:bg-neutral-800 rounded-xl shadow-sm">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 dark:bg-neutral-700/50 border-b border-gray-200 dark:border-neutral-700">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                        No.
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                        ID Pesanan
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                        Tanggal
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                        Pembeli
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                        Total
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                        Status
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                @forelse ($orders as $index => $order)
                <tr class="hover:bg-gray-50 dark:hover:bg-neutral-700/50 transition">
                    <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-100">
                        {{ ($orders->currentPage() - 1) * $orders->perPage() + $index + 1 }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900 dark:text-gray-100">
                        {{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-gray-600 dark:text-gray-400">
                        {{ $order->created_at->format('d M Y') }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-100">
                        {{ $order->user->name }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap font-semibold text-gray-900 dark:text-gray-100">
                        {{ $order->total_price_formatted }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold
                            {{ $order->status === 'pending' ? 'bg-yellow-100 text-yellow-700 dark:bg-yellow-900/30 dark:text-yellow-400' : '' }}
                            {{ $order->status === 'processing' ? 'bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400' : '' }}
                            {{ $order->status === 'completed' ? 'bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400' : '' }}
                            {{ $order->status === 'cancelled' ? 'bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-400' : '' }}">
                            <span class="w-1.5 h-1.5 rounded-full
                                {{ $order->status === 'pending' ? 'bg-yellow-600' : '' }}
                                {{ $order->status === 'processing' ? 'bg-blue-600' : '' }}
                                {{ $order->status === 'completed' ? 'bg-green-600' : '' }}
                                {{ $order->status === 'cancelled' ? 'bg-red-600' : '' }}">
                            </span>
                            {{ $order->status_label }}
                        </span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-10 text-center text-gray-400 dark:text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                        </svg>
                        Belum ada pesanan
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

        @if($orders->hasPages())
        <div class="px-6 py-4 border-t border-gray-200 dark:border-neutral-700">
            {{ $orders->links() }}
        </div>
        @endif
    </div>
</div>
