<div>
@if ($open)
<div class="fixed inset-0 z-50 flex items-center justify-center" wire:ignore.self>

    <div class="fixed inset-0 bg-black/40" wire:click="close"></div>

    <div class="relative z-10 bg-white dark:bg-neutral-800 rounded-2xl
                w-full max-w-5xl p-6">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <div class="space-y-4">

                @if (!empty($product_images) && is_array($product_images))
                <div class="grid grid-cols-2 gap-3">
                    @foreach ($product_images as $index => $image)
                        <div class="relative group">
                            <img
                                src="{{ is_string($image)
                                    ? asset('storage/' . $image)
                                    : $image->temporaryUrl() }}"
                                class="h-32 w-full object-contain rounded-lg border"
                            />

                            <button
                                type="button"
                                wire:click="removeImage({{ $index }})"
                                class="absolute top-1 right-1
                                       bg-red-600 text-white text-xs
                                       rounded-full w-6 h-6
                                       flex items-center justify-center
                                       opacity-0 group-hover:opacity-100
                                       transition"
                                title="Hapus gambar"
                            >
                                ✕
                            </button>
                        </div>
                    @endforeach
                </div>
                @else
                    <div class="h-32 flex items-center justify-center
                                border rounded-lg bg-gray-50 text-gray-400 text-sm">
                        Belum ada gambar
                    </div>
                @endif

                <label
                    for="imageUpload"
                    class="border-2 border-dashed rounded-xl p-6 cursor-pointer
                           hover:bg-neutral-700 transition
                           flex flex-col items-center justify-center space-y-2"
                >
                    <input type="file" wire:model="new_image" class="hidden" id="imageUpload">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         width="40" height="40" fill="none" viewBox="0 0 24 24"
                         class="text-blue-600">
                        <path d="M12 16V8M8 12h8"
                              stroke="currentColor" stroke-width="2"
                              stroke-linecap="round"/>
                    </svg>

                    <p class="text-sm font-medium">Upload Gambar Produk</p>
                    <p class="text-xs text-gray-400">JPEG / PNG / WEBP • Max 512 KB • Maksimal 4 gambar</p>
                </label>

                @error('product_images')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror

                @error('product_images.*')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="space-y-4">

                <div>
                    <label class="text-sm font-medium text-gray-700 dark:text-gray-300">Nama Produk</label>
                    <input wire:model.defer="product_name"
                           class="w-full rounded-lg border p-2" placeholder="Ketik nama produk di sini">
                    @error('product_name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="text-sm font-medium text-gray-700 dark:text-gray-300">
                        Kategori
                    </label>

                    <select
                        wire:model.defer="category_id"
                        class="w-full rounded-lg border p-2
                               bg-white dark:bg-neutral-700
                               border-gray-300 dark:border-neutral-600
                               text-gray-900 dark:text-white"
                    >
                        <option value="">Pilih kategori</option>

                        @if (!empty($categories) && is_iterable($categories))
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->category }}
                                </option>
                            @endforeach
                        @endif
                    </select>

                    @error('category_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="text-sm font-medium">Harga</label>
                        <input type="number" wire:model.defer="product_price"
                               class="w-full rounded-lg border p-2" placeholder="Ketik harga di sini">
                         @error('product_price') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="text-sm font-medium">Harga Diskon</label>
                        <input type="number"
                               wire:model.defer="product_discount_price"
                               class="w-full rounded-lg border p-2"
                               placeholder="Opsional">
                        @error('product_discount_price') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="text-sm font-medium">Berat</label>
                        <input type="number" step="0.01"
                               wire:model.defer="product_weight"
                               class="w-full rounded-lg border p-2"
                               placeholder="Contoh: 2">
                        @error('product_weight') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="text-sm font-medium">Satuan</label>
                        <select wire:model.defer="product_unit"
                                class="w-full rounded-lg border p-2
                               bg-white dark:bg-neutral-700
                               border-gray-300 dark:border-neutral-600
                               text-gray-900 dark:text-white">
                            <option value="">Pilih satuan</option>
                            <option value="kg">Kg</option>
                            <option value="gr">Gram</option>
                        </select>
                        @error('product_unit') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="text-sm font-medium">Stok</label>
                        <input type="number"
                               wire:model.defer="product_stock"
                               class="w-full rounded-lg border p-2"
                               placeholder="Jumlah stok">
                        @error('product_stock') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="text-sm font-medium">Status Produk</label>
                        <select wire:model.defer="product_status"
                                class="w-full rounded-lg border p-2
                               bg-white dark:bg-neutral-700
                               border-gray-300 dark:border-neutral-600
                               text-gray-900 dark:text-white">
                            <option value="">Pilih status</option>
                            <option value="available">Tampilkan</option>
                            <option value="unavailable">Sembunyikan</option>
                        </select>
                        @error('product_status') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div wire:ignore>
                    <label class="text-sm font-medium text-gray-700 dark:text-gray-300">Deskripsi</label>
                    <input id="product_description" type="hidden" name="product_description" wire:model.defer="product_description">
                    <trix-editor input="product_description"
                        class="trix-content mt-1 border rounded-md min-h-[120px] max-h-[160px] overflow-y-auto"></trix-editor>
                </div>

                <div class="flex justify-end gap-3 pt-4">
                    <button wire:click="close"
                            class="px-4 py-2 rounded-lg bg-[#D00000] text-white font-semibold hover:bg-red-500 transition">
                        KEMBALI
                    </button>
                    <button wire:click="save"
                            class="px-4 py-2 rounded-lg bg-[#0163FF] text-white font-semibold hover:bg-[#004BB5] transition">
                        PERBARUI
                    </button>
                </div>

            </div>
        </div>
    </div>
</div>
@endif
<script>
document.addEventListener('trix-load', function (e) {
    const editor = document.querySelector('trix-editor')
    if (editor) {
        editor.editor.loadHTML(e.detail.content ?? '')
    }
})
</script>
</div>

