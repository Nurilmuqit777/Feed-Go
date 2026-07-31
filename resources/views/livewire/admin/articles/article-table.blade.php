<div>
    <div class="shrink-0 rounded-t-xl bg-white dark:bg-neutral-700 shadow-sm
               p-4 flex flex-col gap-4
               md:flex-row md:items-center md:justify-between">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:gap-4">
            <div class="flex items-center gap-4">
                <input
                    type="checkbox"
                    class="w-5 h-5 rounded border-gray-300 text-green-600 focus:ring-green-500"
                />
                <div class="flex items-center gap-2 font-medium">
                    <span class="text-sm text-black dark:text-white">Daftar Artikel</span>
                    <span class="text-xs text-gray-400">{{ $articles->count() }} artikel</span>
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
                    placeholder="Cari Artikel"
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
                onclick="window.dispatchEvent(new CustomEvent('open-add-article-category'))"
                class="flex items-center gap-2 text-sm bg-green-600 hover:bg-green-700
                       text-white px-4 py-2 rounded-xl font-medium transition"
            >
                <span class="text-xl leading-none">+</span>
                <span class="hidden sm:inline">Tambahkan Kategori</span>
            </button>
            <button
                onclick="window.dispatchEvent(new CustomEvent('open-add-article'))"
                class="flex items-center gap-2 text-sm bg-green-600 hover:bg-green-700
                       text-white px-4 py-2 rounded-xl font-medium transition"
            >
                <span class="text-xl leading-none">+</span>
                <span class="hidden sm:inline">Tambahkan Artikel</span>
            </button>
        </div>
    </div>

    <div class="overflow-x-auto bg-white dark:bg-neutral-800 rounded-xl shadow-sm">

        <table class="w-full text-sm border-separate border-spacing-y-2">
            <thead class="text-gray-400">
                <tr>
                    <th class="px-4 py-3"><input type="checkbox"></th>
                    <th class="px-4 py-3">Gambar</th>
                    <th class="px-4 py-3">Judul Artikel</th>
                    <th class="px-4 py-3">Kategori</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Penulis</th>
                    <th class="px-4 py-3">Tanggal</th>
                    <th class="px-4 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @forelse ($articles as $article)

                    <tr wire:key="article-{{ $article->id }}" class="bg-white dark:bg-neutral-700 rounded-xl shadow-sm">

                        <td class="px-4 py-4">
                            <input type="checkbox" class="rounded border-gray-300">
                        </td>

                        <td class="px-4 py-4 flex justify-center">
                            <img
                                loading="lazy"
                                src="{{ asset('storage/'.$article->thumbnail) }}"
                                class="w-10 h-14 object-cover rounded-md"
                            >
                        </td>

                        <td class="px-4 py-4 font-semibold">
                            {{ $article->title }}
                        </td>

                        <td class="px-4 py-4">
                            {{ $article->category->category ?? '-' }}
                        </td>

                        <td class="px-4 py-4">
                            {{ $article->status }}
                        </td>

                        <td class="px-4 py-4">
                            {{ $article->user->name ?? 'Admin' }}
                        </td>

                        <td class="px-4 py-4">
                            {{ $article->created_at->format('d F Y') }}
                        </td>

                        <td class="px-4 py-4">
                            <div class="flex justify-center gap-2">
                                <div x-data="{ open: false }" class="relative">
                                    <button
                                        @click="open = !open"
                                        class="px-3 py-1 flex items-center gap-2 dark:hover:bg-neutral-600 hover:bg-neutral-200 rounded-lg text-sm"
                                    >
                                    <x-svg.detail-icon />
                                        Aksi
                                    </button>

                                    <div
                                        x-show="open"
                                        @click.outside="open = false"
                                        x-transition
                                        x-cloak
                                        class="absolute right-0 mt-2 w-44
                                                bg-white dark:bg-neutral-800
                                                border border-gray-200 dark:border-neutral-700
                                                rounded-xl shadow-lg z-50"
                                    >
                                        <button
                                            wire:click="updateStatus({{ $article->id }}, 'published')"
                                            @if($article->status === 'published') disabled @endif
                                            class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-100 dark:hover:bg-neutral-700 disabled:opacity-50 disabled:cursor-not-allowed"
                                        >
                                            Publikasikan
                                        </button>

                                        <button
                                            wire:click="updateStatus({{ $article->id }}, 'draft')"
                                            @if($article->status === 'draft') disabled @endif
                                            class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-100 dark:hover:bg-neutral-700 disabled:opacity-50 disabled:cursor-not-allowed"
                                        >
                                            Jadikan Draft
                                        </button>

                                        <button
                                            @click="open = false"
                                            wire:click="$dispatch('open-delete-article', { id: {{ $article->id }} })"
                                            class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-100 dark:hover:bg-red-900/30"
                                        >
                                             Hapus
                                        </button>

                                    </div>
                                </div>
                                <button
                                    wire:click="$dispatch('open-edit-article', { id: {{ $article->id }} })"
                                    class="px-3 py-1 flex gap-2 dark:hover:bg-neutral-600 hover:bg-neutral-200 rounded-lg text-sm"
                                >
                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="18" viewBox="0 0 17 18" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.32 3.1748H2C0.895 3.1748 0 4.1238 0 5.2928V15.8808C0 17.0508 0.895 17.9988 2 17.9988H13C14.105 17.9988 15 17.0508 15 15.8808V8.1308L11.086 12.2748C10.7442 12.6403 10.2991 12.8929 9.81 12.9988L7.129 13.5668C5.379 13.9368 3.837 12.3038 4.187 10.4518L4.723 7.6128C4.82 7.1008 5.058 6.6298 5.407 6.2608L8.32 3.1748Z" fill="#0163FF"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.8459 1.31704C16.7448 1.06107 16.5966 0.826345 16.4089 0.625042C16.2244 0.428171 16.0019 0.270677 15.7549 0.162042C15.5116 0.0551784 15.2487 0 14.9829 0C14.7172 0 14.4543 0.0551784 14.2109 0.162042C13.9639 0.270677 13.7415 0.428171 13.5569 0.625042L13.0109 1.20304L15.8629 4.22304L16.4089 3.64404C16.5986 3.44427 16.7471 3.20914 16.8459 2.95204C17.0519 2.42651 17.0519 1.84257 16.8459 1.31704ZM14.4499 5.72004L11.5969 2.69904L6.81994 7.75904C6.74946 7.83414 6.70193 7.92782 6.68294 8.02904L6.14694 10.869C6.07694 11.239 6.38594 11.565 6.73494 11.491L9.41694 10.924C9.51453 10.9023 9.60335 10.8518 9.67194 10.779L14.4499 5.72004Z" fill="#0163FF"/>
                                </svg>
                                    Edit
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="10" class="text-center py-10 text-gray-400">
                            Artikel belum tersedia
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="m-6">
        {{ $articles->links() }}
    </div>
</div>
