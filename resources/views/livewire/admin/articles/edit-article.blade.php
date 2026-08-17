<div>
@if($open)
<div class="fixed inset-0 z-50 flex items-center justify-center" wire:ignore.self>

    <div class="fixed inset-0 bg-black/40" wire:click="close"></div>

    <div class="relative z-10 bg-white dark:bg-neutral-800 rounded-2xl w-full max-w-5xl p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-4">
                <div class="rounded-xl p-4 flex justify-center">
                    @if ($thumbnail)
                        <div class="relative">
                            <img src="{{ $thumbnail->temporaryUrl() }}"
                                 class="h-60 w-full object-contain rounded-lg border">

                            <button
                                type="button"
                                wire:click="removeImage"
                                class="absolute top-1 right-1
                                       bg-red-600 text-white text-xs
                                       rounded-full w-6 h-6
                                       flex items-center justify-center
                                       hover:bg-red-700
                                       transition shadow-lg"
                                title="Hapus gambar"
                            >
                                ✕
                            </button>
                        </div>
                    @elseif ($old_thumbnail)
                        <img src="{{ asset('storage/'.$old_thumbnail) }}"
                             class="h-60 w-full object-contain">
                    @else
                        <div class="h-60 w-full flex items-center justify-center
                                    rounded-lg bg-gray-50 text-gray-400 text-sm">
                            Belum ada gambar
                        </div>
                    @endif
                </div>

                <label
                    for="imageUploadEdit"
                    class="border-2 border-dashed rounded-xl p-6 cursor-pointer
                           hover:bg-neutral-700 transition
                           flex flex-col items-center justify-center space-y-2"
                >
                    <input type="file" wire:model="thumbnail" class="hidden" id="imageUploadEdit">

                    <svg xmlns="http://www.w3.org/2000/svg" width="51" height="43" viewBox="0 0 51 43" fill="none">
                        <path d="M47.5 0H3.5C2.57174 0 1.6815 0.368749 1.02513 1.02513C0.368749 1.6815 0 2.57174 0 3.5V39.5C0 40.4283 0.368749 41.3185 1.02513 41.9749C1.6815 42.6312 2.57174 43 3.5 43H47.5C48.4283 43 49.3185 42.6312 49.9749 41.9749C50.6312 41.3185 51 40.4283 51 39.5V3.5C51 2.57174 50.6312 1.6815 49.9749 1.02513C49.3185 0.368749 48.4283 0 47.5 0ZM3.5 3H47.5C47.6326 3 47.7598 3.05268 47.8536 3.14645C47.9473 3.24021 48 3.36739 48 3.5V31.875L39.975 23.85C39.3154 23.1996 38.4263 22.835 37.5 22.835C36.5737 22.835 35.6846 23.1996 35.025 23.85L29.85 29.025C29.8055 29.0735 29.7514 29.1122 29.6912 29.1387C29.6309 29.1652 29.5658 29.1789 29.5 29.1789C29.4342 29.1789 29.3691 29.1652 29.3088 29.1387C29.2486 29.1122 29.1945 29.0735 29.15 29.025L17.975 17.85C17.3154 17.1996 16.4263 16.835 15.5 16.835C14.5737 16.835 13.6846 17.1996 13.025 17.85L3 27.875V3.5C3 3.36739 3.05268 3.24021 3.14645 3.14645C3.24021 3.05268 3.36739 3 3.5 3ZM47.5 40H3.5C3.36739 40 3.24021 39.9473 3.14645 39.8536C3.05268 39.7598 3 39.6326 3 39.5V32.125L15.15 19.975C15.1945 19.9265 15.2486 19.8878 15.3088 19.8613C15.3691 19.8348 15.4342 19.8211 15.5 19.8211C15.5658 19.8211 15.6309 19.8348 15.6912 19.8613C15.7514 19.8878 15.8055 19.9265 15.85 19.975L27.025 31.15C27.6846 31.8004 28.5737 32.165 29.5 32.165C30.4263 32.165 31.3154 31.8004 31.975 31.15L37.15 25.975C37.1945 25.9265 37.2486 25.8878 37.3088 25.8613C37.3691 25.8348 37.4342 25.8211 37.5 25.8211C37.5658 25.8211 37.6309 25.8348 37.6912 25.8613C37.7514 25.8878 37.8055 25.9265 37.85 25.975L48 36.125V39.5C48 39.6326 47.9473 39.7598 47.8536 39.8536C47.7598 39.9473 47.6326 40 47.5 40ZM30.725 16.275C30.4922 16.0422 30.3081 15.7653 30.1836 15.4606C30.0591 15.1558 29.9967 14.8292 30 14.5C30 13.837 30.2634 13.2011 30.7322 12.7322C31.2011 12.2634 31.837 12 32.5 12C33.163 12 33.7989 12.2634 34.2678 12.7322C34.7366 13.2011 35 13.837 35 14.5C35 15.163 34.7366 15.7989 34.2678 16.2678C33.7989 16.7366 33.163 17 32.5 17C32.1708 17.0033 31.8442 16.9409 31.5394 16.8164C31.2347 16.6919 30.9578 16.5078 30.725 16.275Z" fill="#4A69E2"/>
                    </svg>

                    <p class="text-sm font-medium">Upload Gambar Artikel</p>
                    <p class="text-xs text-gray-400">JPEG / PNG / WEBP • Max 512 KB</p>
                </label>

                @error('thumbnail')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="space-y-4">

                <div>
                    <label class="text-sm font-medium text-gray-700 dark:text-gray-300">Judul Artikel</label>
                    <input wire:model.defer="title"
                           class="w-full rounded-lg border p-2" placeholder="Ketik judul artikel di sini">
                    @error('title') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
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

                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->category }}
                            </option>
                        @endforeach
                    </select>

                    @error('category_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    
                    <label class="text-sm font-medium text-gray-700 dark:text-gray-300">
                        Status
                    </label>

                    <select
                        wire:model.defer="status"
                        class="w-full rounded-lg border p-2
                               bg-white dark:bg-neutral-700
                               border-gray-300 dark:border-neutral-600
                               text-gray-900 dark:text-white"
                    >
                        <option value="">Pilih status</option>

                        @foreach (['draft', 'published'] as $status)
                            <option value="{{ $status }}">
                                {{ ucfirst($status) }}
                            </option>
                        @endforeach
                    </select>

                    @error('status')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>


                <div class="flex items-center gap-3">
                    <input
                        type="checkbox"
                        wire:model.defer="is_featured"
                        id="is_featured"
                        class="w-4 h-4 text-[#2E7D32] bg-gray-100 border-gray-300 rounded focus:ring-[#2E7D32]"
                    >
                    <label for="is_featured" class="text-sm font-medium text-gray-700 dark:text-gray-300">
                        Tandai sebagai Artikel Featured (Maks. 4 artikel)
                    </label>
                </div>
                @error('is_featured') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror

                <div>
                    <label class="text-sm font-medium text-gray-700 dark:text-gray-300">
                        Deskripsi Pendek
                    </label>
                    <textarea wire:model.defer="short_description"
                              class="w-full rounded-lg border p-2"
                              placeholder="Ketik deskripsi pendek di sini"
                              rows="3"></textarea>
                    @error('short_description') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                <div wire:ignore>
                    <label class="text-sm font-medium text-gray-700 dark:text-gray-300">
                        Deskripsi Artikel
                    </label>
                    <input id="content" type="hidden" name="content" wire:model.defer="content">
                    <trix-editor input="content"
                        class="trix-content mt-1 border border-biru rounded-md h-30 overflow-y-auto"></trix-editor>
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
