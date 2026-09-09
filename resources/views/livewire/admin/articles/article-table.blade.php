<div>
    <div class="shrink-0 rounded-t-xl bg-white dark:bg-neutral-700 shadow-sm
               p-4 flex flex-col gap-4
               md:flex-row md:items-center md:justify-between">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:gap-4">
            <div class="flex items-center gap-2 font-medium">
                <span class="text-sm text-black dark:text-white">Daftar Artikel</span>
                <span class="text-xs text-gray-400 bg-gray-100 dark:bg-neutral-600 px-2 py-0.5 rounded-full">
                    {{ $articles->total() }} artikel
                </span>
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
                onclick="window.dispatchEvent(new CustomEvent('open-add-article-category'))"
                class="flex items-center gap-2 text-sm bg-green-600 hover:bg-green-700
                       text-white px-4 py-2 rounded-xl font-medium transition"
            >
                <span class="text-xl leading-none">+</span>
                <span class="hidden sm:inline">Kelola Kategori</span>
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

    <div class="overflow-x-auto bg-white dark:bg-neutral-800 rounded-b-xl shadow-sm">
        <table class="w-full text-sm border-separate border-spacing-y-2">
            <thead class="text-gray-400">
                <tr>
                    <th class="px-4 py-3 text-center font-medium">Gambar</th>
                    <th class="px-4 py-3 text-left font-medium">Judul Artikel</th>
                    <th class="px-4 py-3 text-center font-medium">Kategori</th>
                    <th class="px-4 py-3 text-center font-medium">Status</th>
                    <th class="px-4 py-3 text-center font-medium">Penulis</th>
                    <th class="px-4 py-3 text-center font-medium">Tanggal</th>
                    <th class="px-4 py-3 text-center font-medium">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($articles as $article)
                <tr wire:key="article-{{ $article->id }}"
                    class="bg-white dark:bg-neutral-700 hover:bg-gray-50 dark:hover:bg-neutral-600 transition-colors">

                    <td class="px-4 py-3 text-center">
                        <img
                            loading="lazy"
                            src="{{ asset('storage/'.$article->thumbnail) }}"
                            class="w-10 h-14 object-cover rounded-md mx-auto"
                            alt="{{ $article->title }}"
                        >
                    </td>

                    <td class="px-4 py-3 text-left">
                        <p class="font-semibold text-gray-800 dark:text-white line-clamp-2 max-w-xs">
                            {{ $article->title }}
                        </p>
                    </td>

                    <td class="px-4 py-3 text-center">
                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium
                                     bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400">
                            {{ Str::title($article->category->category ?? '-') }}
                        </span>
                    </td>

                    <td class="px-4 py-3 text-center">
                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold
                            {{ $article->status === 'published'
                                ? 'bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400'
                                : 'bg-gray-100 text-gray-600 dark:bg-neutral-600 dark:text-gray-300' }}">
                            {{ $article->status === 'published' ? 'Published' : 'Draft' }}
                        </span>
                    </td>

                    <td class="px-4 py-3 text-center text-gray-600 dark:text-gray-300">
                        {{ $article->user->name ?? 'Admin' }}
                    </td>

                    <td class="px-4 py-3 text-center text-gray-500 dark:text-gray-400 whitespace-nowrap">
                        {{ $article->created_at->translatedFormat('d M Y') }}
                    </td>

                    <td class="px-4 py-3 text-center">
                        <div class="flex justify-center gap-2">

                            <div x-data="{ open: false }" class="relative">
                                <button
                                    @click="open = !open"
                                    class="px-3 py-1.5 flex items-center gap-1.5 dark:hover:bg-neutral-600 hover:bg-neutral-100 rounded-lg text-sm text-gray-700 dark:text-gray-300 transition"
                                >
                                    <x-svg.detail-icon />
                                    Aksi
                                </button>

                                <div
                                    x-show="open"
                                    @click.outside="open = false"
                                    x-transition:enter="transition ease-out duration-100"
                                    x-transition:enter-start="opacity-0 scale-95"
                                    x-transition:enter-end="opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-75"
                                    x-transition:leave-start="opacity-100 scale-100"
                                    x-transition:leave-end="opacity-0 scale-95"
                                    x-cloak
                                    class="absolute right-0 mt-2 w-44
                                            bg-white dark:bg-neutral-800
                                            border border-gray-200 dark:border-neutral-700
                                            rounded-xl shadow-lg z-50 overflow-hidden"
                                >
                                    <button
                                        wire:click="updateStatus({{ $article->id }}, 'published')"
                                        @click="open = false"
                                        @if($article->status === 'published') disabled @endif
                                        class="flex items-center gap-2 w-full text-left px-4 py-2.5 text-sm hover:bg-gray-50 dark:hover:bg-neutral-700 disabled:opacity-40 disabled:cursor-not-allowed transition">
                                        <span class="w-2 h-2 rounded-full bg-blue-500"></span>
                                        Publikasikan
                                    </button>

                                    <button
                                        wire:click="updateStatus({{ $article->id }}, 'draft')"
                                        @click="open = false"
                                        @if($article->status === 'draft') disabled @endif
                                        class="flex items-center gap-2 w-full text-left px-4 py-2.5 text-sm hover:bg-gray-50 dark:hover:bg-neutral-700 disabled:opacity-40 disabled:cursor-not-allowed transition">
                                        <span class="w-2 h-2 rounded-full bg-gray-400"></span>
                                        Jadikan Draft
                                    </button>

                                    <div class="border-t border-gray-100 dark:border-neutral-700"></div>

                                    <button
                                        @click="open = false"
                                        wire:click="$dispatch('open-delete-article', { id: {{ $article->id }} })"
                                        class="flex items-center gap-2 w-full text-left px-4 py-2.5 text-sm text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20 transition">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                        Hapus
                                    </button>
                                </div>
                            </div>

                            <button
                                wire:click="$dispatch('open-edit-article', { id: {{ $article->id }} })"
                                class="px-3 py-1.5 flex items-center gap-1.5 dark:hover:bg-neutral-600 hover:bg-neutral-100 rounded-lg text-sm text-gray-700 dark:text-gray-300 transition"
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
                    <td colspan="7" class="text-center py-16 text-gray-400">
                        <div class="flex flex-col items-center gap-2">
                            <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            <p class="text-sm">Artikel belum tersedia</p>
                        </div>
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
