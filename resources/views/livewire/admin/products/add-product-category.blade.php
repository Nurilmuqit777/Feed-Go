<div>
    @if ($open)
        <div class="fixed inset-0 z-50 flex items-center justify-center" wire:ignore.self>

            <div class="fixed inset-0 bg-black/40 dark:bg-black/60" wire:click="close"></div>

            <div class="relative z-10 w-full max-w-md rounded-2xl p-6 bg-white dark:bg-neutral-800 shadow-xl">

                <h2 class="text-lg font-semibold mb-5 text-gray-900 dark:text-white">
                    Tambah Produk Kategori
                </h2>

                <div class="mb-5">

                    <h3 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Kategori yang tersedia
                    </h3>

                    <div class="max-h-48 overflow-y-auto space-y-2 pr-1">

                        @forelse ($categories as $item)

                            <div wire:key="product-category-{{ $item->id }}" class="flex items-center justify-between gap-3 px-3 py-2.5 rounded-lg bg-gray-50 dark:bg-neutral-700 border border-gray-200 dark:border-neutral-600">

                                @if ($categoryToDelete !== $item->id)

                                    <span class="text-sm text-gray-800 dark:text-white truncate">
                                        {{ $item->category }}
                                    </span>

                                    <button
                                        type="button"
                                        wire:click="confirmDelete({{ $item->id }})"
                                        class="p-1.5 rounded-lg text-red-500 hover:bg-red-50 dark:hover:bg-red-500/10 transition"
                                        title="Hapus kategori">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-4 h-4" >
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 7h12M9 7V5a1 1 0 011-1h4a1 1 0 011 1v2m2 0v12a1 1 0 01-1 1H8a1 1 0 01-1-1V7m3 4v6m4-6v6" />
                                        </svg>
                                    </button>

                                @else

                                    <div class="flex items-start gap-2 min-w-0 flex-1">

                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-red-500 shrink-0 mt-0.5" >
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v4m0 4h.01M10.29 3.86l-8.82 15a2 2 0 001.71 2.14h17.64a2 2 0 001.71-2.14l-8.82-15a2 2 0 00-3.42 0z" />
                                        </svg>

                                        <span class="text-sm text-gray-700 dark:text-gray-200 leading-relaxed">
                                            Hapus "{{ $item->category }}"? Menghapus kategori akan menghapus semua produk yang terkait.
                                        </span>

                                    </div>

                                    <div class="flex items-center gap-1 shrink-0">

                                        <button
                                            type="button"
                                            wire:click="deleteCategory"
                                            wire:loading.attr="disabled"
                                            wire:target="deleteCategory"
                                            class="px-2 py-1 text-xs rounded-md bg-red-600 hover:bg-red-700 text-white transition disabled:opacity-50">
                                            <span wire:loading.remove wire:target="deleteCategory">
                                                Hapus
                                            </span>

                                            <span wire:loading wire:target="deleteCategory">
                                                ...
                                            </span>
                                        </button>
                                        
                                        <button
                                            type="button"
                                            wire:click="cancelDelete"
                                            class="px-2 py-1 text-xs rounded-md text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-neutral-600 transition">
                                            Batal
                                        </button>


                                    </div>

                                @endif

                            </div>

                        @empty

                            <div class="py-5 text-center text-sm text-gray-500 dark:text-gray-400 border border-dashed border-gray-300 dark:border-neutral-600 rounded-lg">
                                Belum ada kategori.
                            </div>

                        @endforelse

                    </div>
                </div>

                <div class="border-t border-gray-200 dark:border-neutral-700 mb-5"></div>

                <div>

                    <h3 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Tambah kategori
                    </h3>

                    <input
                        wire:model.defer="category"
                        type="text"
                        class="w-full rounded-lg p-2 border border-gray-300 dark:border-neutral-600 bg-white dark:bg-neutral-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-green-500 focus:outline-none"
                        placeholder="Nama produk kategori"/>

                    @error('category')
                        <p class="text-red-500 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                <div class="flex justify-end gap-3 mt-6">

                    <button
                        type="button"
                        wire:click="close"
                        class="px-4 py-2 rounded-lg bg-[#D00000] hover:bg-red-500 text-white font-medium transition">
                        Batal
                    </button>

                    <button
                        type="button"
                        wire:click="save"
                        wire:loading.attr="disabled"
                        wire:target="save"
                        class="px-4 py-2 rounded-lg bg-green-600 hover:bg-green-700 text-white font-medium transition disabled:opacity-50">
                        <span wire:loading.remove wire:target="save">
                            Simpan
                        </span>

                        <span wire:loading wire:target="save">
                            Menyimpan...
                        </span>
                    </button>

                </div>

            </div>
        </div>
    @endif
</div>
