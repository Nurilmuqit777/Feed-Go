<div>
    <div
        class="shrink-0 rounded-t-xl bg-white dark:bg-neutral-700 shadow-sm
               p-4 flex flex-col gap-4
               md:flex-row md:items-center md:justify-between">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:gap-4">

            <div class="flex items-center gap-4">
                <input
                    type="checkbox"
                    class="w-5 h-5 rounded border-gray-300 text-green-600 focus:ring-green-500"
                />

                <div class="flex items-center gap-2 font-medium">
                    <span class="text-sm text-black dark:text-white">Daftar Produk</span>
                    <span class="text-xs text-gray-400">{{ $this->products->total() }} produk</span>
                </div>
            </div>

            <div class="relative w-full md:w-60">
                <svg
                    class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor"
                >
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
            </div>
        </div>

        <div class="flex flex-wrap items-center gap-3 justify-end">

            <button
                onclick="window.dispatchEvent(new CustomEvent('open-add-product-category'))"
                class="flex items-center gap-2 text-sm bg-green-600 hover:bg-green-700
                       text-white px-4 py-2 rounded-xl font-medium transition"
            >
                <span class="text-xl leading-none">+</span>
                <span class="hidden sm:inline">Tambahkan Kategori</span>
            </button>
            <button
                onclick="window.dispatchEvent(new CustomEvent('open-add-product'))"
                class="flex items-center gap-2 text-sm bg-green-600 hover:bg-green-700
                       text-white px-4 py-2 rounded-xl font-medium transition"
            >
                <span class="text-xl leading-none">+</span>
                <span class="hidden sm:inline">Tambahkan produk</span>
            </button>

            <select
                wire:model.live="sortBy"
                class="border rounded-lg px-3 py-2 text-sm text-black dark:text-white
                       dark:bg-neutral-700 dark:hover:bg-neutral-600 hover:bg-gray-100 dark:border-neutral-600 transition"
            >
                <option value="product_name">Nama Produk</option>
                <option value="created_at">Tanggal</option>
                <option value="product_price">Harga</option>
                <option value="product_stock">Stok</option>
            </select>

            <button
                wire:click="toggleSortDirection"
                class="p-2 border rounded-lg hover:bg-gray-100 dark:hover:bg-neutral-600
                       dark:border-neutral-600 text-gray-700 dark:text-white transition"
                title="Urutan: {{ $sortDirection === 'asc' ? 'Naik (A-Z, 1-9)' : 'Turun (Z-A, 9-1)' }}"
            >
                @if($sortDirection === 'asc')
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M5 15l7-7 7 7"/>
                    </svg>
                @else
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M19 9l-7 7-7-7"/>
                    </svg>
                @endif
            </button>

        </div>

    </div>

    <div class="overflow-x-auto bg-white dark:bg-neutral-800 rounded-xl shadow-sm">

        <table class="w-full text-sm border-separate border-spacing-y-2">
            <thead class="text-gray-400">
                <tr>
                    <th class="px-4 py-3"><input type="checkbox"></th>
                    <th class="px-4 py-3">No.</th>
                    <th class="px-4 py-3">Nama Produk</th>
                    <th class="px-4 py-3">Kategori</th>
                    <th class="px-4 py-3">Harga</th>
                    <th class="px-4 py-3">Stok</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Update terakhir</th>
                    <th class="px-4 py-3">Deskripsi</th>
                    <th class="px-4 py-3 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody class="text-center">
                @forelse ($this->products as $index => $product)
                    <tr class="bg-white dark:bg-neutral-700 rounded-xl shadow-sm">

                        <td class="px-4 py-4">
                            <input type="checkbox" class="rounded border-gray-300">
                        </td>

                        <td class="px-4 py-4 font-medium">
                            {{ ($this->products->currentPage() - 1) * $this->products->perPage() + $index + 1 }}
                        </td>

                        <td class="px-4 py-4">
                            <div class="flex items-center gap-3">
                                <img
                                    loading="lazy"
                                    src="{{ asset('storage/'.$product->product_image1) }}"
                                    class="w-10 h-14 object-cover rounded-md"
                                >
                                <span class="font-semibold">
                                    {{ $product->product_name }}
                                </span>
                            </div>
                        </td>

                        <td class="px-4 py-4">
                            {{ $product->category->category ?? '-' }}
                        </td>

                        <td class="px-4 py-4 font-semibold whitespace-nowrap align-middle">
                            @if($product->product_discount_price)
                            Rp {{ number_format($product->product_discount_price, 0, ',', '.') }}
                            @else
                            Rp {{ number_format($product->product_price, 0, ',', '.') }}
                            @endif
                        </td>

                        <td class="px-4 py-4">
                            {{ $product->product_stock }}
                        </td>

                        <td class="px-4 py-4">
                            <span
                                class="inline-flex items-center justify-center
                                       px-3 py-1 rounded-full text-xs font-semibold
                                       whitespace-nowrap
                                       {{ $product->product_status === 'available'
                                            ? 'bg-green-100 text-green-700'
                                            : 'bg-red-100 text-red-700' }}">
                                {{ $product->product_status === 'available'
                                    ? 'Tersedia'
                                    : 'Tidak Tersedia' }}
                            </span>
                        </td>

                        <td class="px-4 py-4 text-gray-500">
                            {{ $product->updated_at->format('d/m/Y') }}
                        </td>

                        <td class="px-4 py-4 max-w-xs truncate text-gray-500">
                            {{ Str::limit(strip_tags($product->product_description), 10, '...') }}
                        </td>

                        <td class="px-4 py-4">
                            <div class="flex justify-center gap-2">
                                <button
                                    wire:click="$dispatch('open-edit-product', { id: {{ $product->id }} })"
                                    class="p-2 rounded-lg bg-blue-100 text-blue-600 hover:bg-blue-200 transition">
                                    <x-svg.edit-icon/>
                                </button>

                                <button
                                    wire:click="$dispatch('open-delete-product', { id: {{ $product->id }} })"
                                    class="p-2 rounded-lg bg-red-100 text-red-600 hover:bg-red-200 transition">
                                    <x-svg.delete-icon/>
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10" class="text-center py-10 text-gray-400">
                            Produk belum tersedia
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="m-6">
        {{ $this->products->links() }}
        </div>
    </div>

</div>
