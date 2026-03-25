<div class="space-y-3">

    <div class="relative flex items-center justify-center px-5 py-8">
        <h1 class="text-3xl font-semibold text-[#2D5016] text-center">Artikel Terbaru</h1>

        <div class="absolute right-5" x-data="{ open: false }">
            <button
                @click="open = !open"
                class="flex items-center gap-2 px-6 py-2.5 border border-gray-300 rounded-full bg-white hover:bg-gray-50 transition text-sm font-medium text-[#2D5016]">
                <span>
                    @if($selectedCategory)
                        {{ $categories->find($selectedCategory)->category }}
                    @else
                        Cari Kategori
                    @endif
                </span>
                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="11" viewBox="0 0 13 11" fill="none" class="transition-transform" :class="open ? 'rotate-180' : ''">
                    <path d="M7.025 9.67494C6.925 9.82494 6.8 9.93728 6.65 10.0119C6.5 10.0866 6.34167 10.1246 6.175 10.1259C6.00833 10.1273 5.85 10.0896 5.7 10.0129C5.55 9.93628 5.425 9.82394 5.325 9.67594L0.15 1.52594C0.1 1.44261 0.0626668 1.35494 0.0380001 1.26294C0.0133334 1.17094 0.000666667 1.08328 0 0.999943C0 0.733276 0.0960001 0.499943 0.288 0.299943C0.48 0.0999432 0.717333 -5.72205e-05 1 -5.72205e-05H11.35C11.6333 -5.72205e-05 11.871 0.0999432 12.063 0.299943C12.255 0.499943 12.3507 0.733276 12.35 0.999943C12.35 1.08328 12.3373 1.17061 12.312 1.26194C12.2867 1.35328 12.2493 1.44094 12.2 1.52494L7.025 9.67494Z" fill="#2D5016"/>
                </svg>
            </button>

            <div
                x-show="open"
                @click.away="open = false"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95"
                class="absolute right-0 mt-2 w-56 bg-white rounded-lg shadow-lg border border-gray-200 z-50"
                style="display: none;">

                <div class="py-2">

                    <button
                        wire:click="clearFilter"
                        @click="open = false"
                        class="w-full text-left px-4 py-2.5 text-sm hover:bg-gray-100 transition
                               {{ $selectedCategory === null ? 'bg-green-50 text-[#2D5016] font-semibold' : 'text-gray-700' }}">
                        Semua Kategori
                    </button>

                    <div class="border-t border-gray-100 my-2"></div>

                    @foreach($categories as $category)

                    <button
                        wire:click="selectCategory({{ $category->id }})"
                        @click="open = false"
                        class="w-full text-left px-4 py-2.5 text-sm hover:bg-gray-100 transition flex items-center gap-2
                               {{ $selectedCategory == $category->id ? 'bg-green-50 font-semibold' : 'text-gray-700' }}">

                        <span class="{{ $selectedCategory == $category->id ? 'text-[#2D5016]' : '' }}">
                            {{ $category->category }}
                        </span>

                        @if($selectedCategory == $category->id)
                        <svg class="w-4 h-4 ml-auto text-[#2D5016]" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                        @endif
                    </button>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-6 px-5 pb-6">
        @forelse($articles as $article)
        @php
            $badgeColor = match(strtoupper($article->category->category)) {
                'INFORMASI' => '#2563EB',
                'TIPS' => '#EAAA00',
                'EDUKASI' => '#2E7D32',
                default => '#6B7280'
            };
        @endphp
        <a href="{{ route('article.show', $article->slug) }}" class="bg-white rounded-xl overflow-hidden border shadow-sm hover:shadow-lg transition transform hover:-translate-y-1 duration-300">
            <div class="relative h-72">
                <img src="{{ asset('storage/'. $article->thumbnail) }}" class="w-full h-full object-cover" alt="{{ $article->title }}">
                <span class="absolute top-3 left-3 text-white text-xs px-3 py-1 rounded-full" style="background-color: {{ $badgeColor }}">
                    {{ $article->category->category }}
                </span>
            </div>

            <div class="p-5">
                <h3 class="font-semibold text-[#2D5016] text-left mb-2 line-clamp-3 hover:text-[#2D5016] transition">
                    {{ $article->title }}
                </h3>

                <p class="text-sm text-[#6B7280] text-left mb-4 line-clamp-3">
                    {{ $article->short_description }}
                </p>

                <div class="flex items-center justify-between text-sm text-gray-500">
                    <span class="text-[#2D5016]"> <x-svg.calendar-icon class="w-4 h-4 inline mr-1 text-[#2D5016]" /> {{ $article->created_at->format('d M Y') }}</span>
                    <span class="text-[#2D5016] font-medium">Baca Artikel →</span>
                </div>
            </div>
        </a>
        @empty
        <div class="col-span-full flex flex-col items-center justify-center py-16">
            <svg class="w-24 h-24 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
            <h3 class="text-xl font-semibold text-gray-700 mb-2">Tidak Ada Artikel</h3>
            <p class="text-gray-500 text-center">
                @if($selectedCategory)
                    Belum ada artikel untuk kategori ini.
                @else
                    Belum ada artikel terbaru yang dipublikasikan.
                @endif
            </p>
        </div>
        @endforelse
    </div>
    <div class="mt-4 mb-18">
        {{ $articles->links() }}
    </div>
</div>
