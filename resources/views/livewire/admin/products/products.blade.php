<div>
    <div class="shrink-0 rounded-t-xl bg-white dark:bg-neutral-700 shadow-sm
               p-4 flex flex-col gap-4
               md:flex-row md:items-center md:justify-between">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:gap-4">

            <div class="flex items-center gap-2 font-medium">
                <span class="text-sm text-black dark:text-white">Daftar Produk</span>
                <span class="text-xs text-gray-400 bg-gray-100 dark:bg-neutral-600 px-2 py-0.5 rounded-full">
                    {{ $products->total() }} produk
                </span>
            </div>

            <div class="relative w-full md:w-60">
                <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1010.5 18a7.5 7.5 0 006.15-3.35z"/>
                </svg>
                <input
                    type="text"
                    placeholder="Cari Produk"
                    wire:model.live.debounce.500ms="search"
                    class="w-full pl-10 pr-4 py-2 text-sm rounded-full
                           bg-gray-100 dark:bg-neutral-600
                           focus:bg-white dark:focus:bg-neutral-500
                           border border-transparent focus:border-green-500 focus:outline-none"
                />
                <div wire:loading wire:target="search" class="absolute right-3 top-1/2 transform -translate-y-1/2">
                    <svg class="w-4 h-4 animate-spin text-[#5EB661]" viewBox="0 0 24 24" fill="none">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="flex flex-wrap items-center gap-3 justify-end">
            <button
                onclick="window.dispatchEvent(new CustomEvent('open-add-product-category'))"
                class="flex items-center gap-2 text-sm bg-green-600 hover:bg-green-700
                       text-white px-4 py-2 rounded-xl font-medium transition">
                <span class="text-xl leading-none">+</span>
                <span class="hidden sm:inline">Kelola Kategori</span>
            </button>

            <button
                onclick="window.dispatchEvent(new CustomEvent('open-add-product'))"
                class="flex items-center gap-2 text-sm bg-green-600 hover:bg-green-700
                       text-white px-4 py-2 rounded-xl font-medium transition">
                <span class="text-xl leading-none">+</span>
                <span class="hidden sm:inline">Tambahkan Produk</span>
            </button>

            <div class="relative" x-data="{ open: false }">
                <button
                    @click="open = !open"
                    class="flex items-center gap-2 border rounded-lg px-3 py-2 text-sm
                           text-black dark:text-white bg-neutral-100 dark:bg-neutral-700
                           hover:bg-gray-200 dark:hover:bg-neutral-600
                           dark:border-neutral-600 transition-all duration-200">

                    <span>
                        @switch($sortBy)
                            @case('product_name') Nama Produk @break
                            @case('created_at') Tanggal @break
                            @case('product_price') Harga @break
                            @case('product_stock') Stok @break
                            @default Urutkan
                        @endswitch
                    </span>

                    <svg class="w-4 h-4 text-gray-500 transition-transform duration-300"
                         :class="open ? 'rotate-180' : ''"
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                    x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                    x-transition:leave-end="opacity-0 scale-95 -translate-y-2"
                    x-cloak
                    class="absolute right-0 mt-2 w-48 bg-white dark:bg-neutral-800
                           border border-gray-200 dark:border-neutral-700
                           rounded-xl shadow-lg z-50 overflow-hidden">

                    <div class="py-1">
                        <button
                            wire:click="$set('sortBy', 'product_name')"
                            @click="open = false"
                            class="w-full text-left px-4 py-2.5 text-sm flex items-center gap-3 transition
                                   hover:bg-gray-50 dark:hover:bg-neutral-700
                                   {{ $sortBy === 'product_name' ? 'text-green-600 dark:text-green-400 font-semibold bg-green-50 dark:bg-green-900/20' : 'text-gray-700 dark:text-gray-300' }}">
                            Nama Produk
                            @if($sortBy === 'product_name')
                            <svg class="w-4 h-4 ml-auto text-green-600 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            @endif
                        </button>

                        <button
                            wire:click="$set('sortBy', 'created_at')"
                            @click="open = false"
                            class="w-full text-left px-4 py-2.5 text-sm flex items-center gap-3 transition
                                   hover:bg-gray-50 dark:hover:bg-neutral-700
                                   {{ $sortBy === 'created_at' ? 'text-green-600 dark:text-green-400 font-semibold bg-green-50 dark:bg-green-900/20' : 'text-gray-700 dark:text-gray-300' }}">
                            Tanggal
                            @if($sortBy === 'created_at')
                            <svg class="w-4 h-4 ml-auto text-green-600 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            @endif
                        </button>

                        <button
                            wire:click="$set('sortBy', 'product_price')"
                            @click="open = false"
                            class="w-full text-left px-4 py-2.5 text-sm flex items-center gap-3 transition
                                   hover:bg-gray-50 dark:hover:bg-neutral-700
                                   {{ $sortBy === 'product_price' ? 'text-green-600 dark:text-green-400 font-semibold bg-green-50 dark:bg-green-900/20' : 'text-gray-700 dark:text-gray-300' }}">
                            Harga
                            @if($sortBy === 'product_price')
                            <svg class="w-4 h-4 ml-auto text-green-600 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            @endif
                        </button>

                        <button
                            wire:click="$set('sortBy', 'product_stock')"
                            @click="open = false"
                            class="w-full text-left px-4 py-2.5 text-sm flex items-center gap-3 transition
                                   hover:bg-gray-50 dark:hover:bg-neutral-700
                                   {{ $sortBy === 'product_stock' ? 'text-green-600 dark:text-green-400 font-semibold bg-green-50 dark:bg-green-900/20' : 'text-gray-700 dark:text-gray-300' }}">
                            Stok
                            @if($sortBy === 'product_stock')
                            <svg class="w-4 h-4 ml-auto text-green-600 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            @endif
                        </button>
                    </div>
                </div>
            </div>

            <button
                wire:click="toggleSortDirection"
                class="relative p-2 border rounded-lg transition-all duration-300 overflow-hidden
                       hover:bg-gray-100 dark:hover:bg-neutral-600
                       dark:border-neutral-600 text-gray-700 dark:text-white
                       {{ $sortDirection === 'asc'
                           ? 'bg-white dark:bg-neutral-700'
                           : 'bg-gray-100 dark:bg-neutral-600' }}"
                title="{{ $sortDirection === 'asc' ? 'Naik (A-Z, 1-9)' : 'Turun (Z-A, 9-1)' }}"
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

        </div>
    </div>

    <div class="overflow-x-auto bg-white dark:bg-neutral-800 rounded-b-xl shadow-sm">
        <table class="w-full text-sm border-separate border-spacing-y-2">
            <thead class="text-gray-400">
                <tr>
                    <th class="px-4 py-3 text-center font-medium">No.</th>
                    <th class="px-4 py-3 text-left font-medium">Nama Produk</th>
                    <th class="px-4 py-3 text-center font-medium">Kategori</th>
                    <th class="px-4 py-3 text-center font-medium">Harga</th>
                    <th class="px-4 py-3 text-center font-medium">Stok</th>
                    <th class="px-4 py-3 text-center font-medium">Status</th>
                    <th class="px-4 py-3 text-center font-medium">Update Terakhir</th>
                    <th class="px-4 py-3 text-left font-medium">Deskripsi</th>
                    <th class="px-4 py-3 text-center font-medium">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($products as $index => $product)
                <tr wire:key="product-{{ $product->id }}"
                    class="bg-white dark:bg-neutral-700 hover:bg-gray-50 dark:hover:bg-neutral-600 transition-colors">

                    <td class="px-4 py-3 text-center font-medium text-gray-500">
                        {{ ($products->currentPage() - 1) * $products->perPage() + $index + 1 }}
                    </td>

                    <td class="px-4 py-3">
                        <div class="flex items-center gap-3">
                            <img
                                loading="lazy"
                                src="{{ asset('storage/'.$product->product_image1) }}"
                                class="w-10 h-14 object-cover rounded-md shrink-0"
                                alt="{{ $product->product_name }}"
                            >
                            <span class="font-semibold text-gray-800 dark:text-white line-clamp-2">
                                {{ $product->product_name }}
                            </span>
                        </div>
                    </td>

                    <td class="px-4 py-3 text-center">
                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium
                                     bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400">
                            {{ Str::title($product->category->category ?? '-') }}
                        </span>
                    </td>

                    <td class="px-4 py-3 text-center">
                        <div class="flex flex-col items-center">
                            <span class="font-semibold text-gray-800 dark:text-white whitespace-nowrap">
                                Rp {{ number_format($product->product_discount_price ?? $product->product_price, 0, ',', '.') }}
                            </span>
                            @if($product->product_discount_price)
                            <span class="text-xs text-gray-400 line-through whitespace-nowrap">
                                Rp {{ number_format($product->product_price, 0, ',', '.') }}
                            </span>
                            @endif
                        </div>
                    </td>

                    <td class="px-4 py-3 text-center">
                        <span class="{{ $product->product_stock <= 5 ? 'text-red-600 font-semibold' : 'text-gray-700 dark:text-gray-300' }}">
                            {{ $product->product_stock }}
                            @if($product->product_stock <= 5 && $product->product_stock > 0)
                                <span class="text-xs block text-red-500">Hampir Habis</span>
                            @elseif($product->product_stock == 0)
                                <span class="text-xs block text-red-500">Habis</span>
                            @endif
                        </span>
                    </td>

                    <td class="px-4 py-3 text-center">
                        <span class="inline-flex items-center justify-center px-3 py-1 rounded-full text-xs font-semibold whitespace-nowrap
                            {{ $product->product_status === 'available'
                                ? 'bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400'
                                : 'bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-400' }}">
                            {{ $product->product_status === 'available' ? 'Tampilkan' : 'Sembunyikan' }}
                        </span>
                    </td>

                    <td class="px-4 py-3 text-center text-gray-500 dark:text-gray-400 whitespace-nowrap">
                        {{ $product->updated_at->format('d/m/Y') }}
                    </td>

                    <td class="px-4 py-3 text-left max-w-xs">
                        <p class="text-gray-500 dark:text-gray-400 truncate max-w-[200px]">
                            {{ Str::limit(strip_tags($product->product_description), 50, '...') }}
                        </p>
                    </td>

                    <td class="px-4 py-3 text-center">
                        <div class="flex justify-center gap-2">
                            <button
                                wire:click="$dispatch('open-edit-product', { id: {{ $product->id }} })"
                                class="p-2 rounded-lg bg-blue-100 text-blue-600 hover:bg-blue-200 dark:bg-blue-900/30 dark:text-blue-400 dark:hover:bg-blue-900/50 transition"
                                title="Edit Produk">
                                <x-svg.edit-icon/>
                            </button>

                            <button
                                wire:click="$dispatch('open-delete-product', { id: {{ $product->id }} })"
                                class="p-2 rounded-lg bg-red-100 text-red-600 hover:bg-red-200 dark:bg-red-900/30 dark:text-red-400 dark:hover:bg-red-900/50 transition"
                                title="Hapus Produk">
                                <x-svg.delete-icon/>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="text-center py-16 text-gray-400">
                        <div class="flex flex-col items-center gap-2">
                            <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                            <p class="text-sm">Produk belum tersedia</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="m-6">
        {{ $products->links() }}
    </div>
</div>
