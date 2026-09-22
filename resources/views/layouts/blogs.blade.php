@extends('app')

@section('title', 'Artikel')

@section('content')

@section('header-content')
<div class="relative h-[280px] w-full overflow-hidden sm:h-[340px] lg:h-[400px]">

    <img
        src="{{ asset('images/Sawah.webp') }}"
        alt="image"
        class="absolute inset-0 w-full h-full object-cover blur-sm"
    >

    <div class="absolute inset-0 flex flex-col items-center justify-center gap-2 px-5 text-center sm:gap-3">

        <h1 class="text-3xl font-semibold text-white drop-shadow-lg text-shadow-lg sm:text-4xl">
            Artikel FeedGo
        </h1>

        <h2 class="max-w-xl text-sm font-light text-white sm:text-base">
            Wawasan pakan ternak berbasis riset untuk peternak Indonesia.
        </h2>

    </div>

</div>
@endsection

<section class="relative z-20 mx-auto -mt-12 max-w-6xl rounded-3xl bg-[#F5F5F5] p-5 text-center sm:-mt-16 sm:p-7 md:-mt-20 md:p-10">
    <div class="mx-auto grid grid-cols-1 items-center gap-8 lg:grid-cols-2 lg:gap-12">

        <div class="text-center lg:text-left">
            <h2 class="mb-4 text-3xl font-semibold leading-snug text-[#2D5016] sm:text-4xl">
                Artikel FeedGo<br>
                edukasi pakan<br>
                berbasis riset untuk<br>
                peternak.
            </h2>

            <p class="mx-auto mb-6 max-w-md text-sm leading-relaxed text-[#6B7280] lg:mx-0">
                Artikel edukasi, tips, dan informasi seputar pakan udang dan
                pakan kambing untuk mendukung produktivitas dan
                keberlanjutan peternakan.
            </p>

            <p class="mb-3 text-sm font-semibold text-[#4D4D4D]">
                Cari artikel atau topik pakan ternak yang Anda butuhkan
            </p>

            <livewire:user.article-search />
        </div>

        <div class="grid grid-cols-2 gap-3 sm:gap-4">
            @forelse($featuredArticles as $index => $article)
            @php
                $badgeColor = match(strtoupper($article->category->category)) {
                    'INFORMASI' => 'bg-[#2563EB]',
                    'TIPS' => 'bg-[#EAAA00]',
                    'EDUKASI' => 'bg-[#2E7D32]',
                    default => 'bg-gray-500'
                };
            @endphp
            <a href="{{ route ('article.show', $article->slug) }}" class="relative rounded-xl overflow-hidden group
                {{ $index == 0 ? 'h-48 w-full sm:h-52 sm:w-44 md:h-60 md:w-50 place-self-end' : '' }}
                {{ $index == 1 ? 'h-36 w-full sm:h-36 sm:w-52 md:h-40 md:w-60 place-self-start self-end' : '' }}
                {{ $index == 2 ? 'h-36 w-full sm:h-36 sm:w-52 md:h-40 md:w-60 place-self-end self-start' : '' }}
                {{ $index == 3 ? 'h-48 w-full sm:h-52 sm:w-44 md:h-60 md:w-50 place-self-start' : '' }}">
                <img src="{{ asset('storage/' . $article->thumbnail) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" alt="{{ $article->title }}"/>
                <div class="absolute inset-0 bg-black/40 group-hover:bg-black/50 transition-colors duration-300"></div>
                <div class="absolute left-2 right-2 top-2 space-y-1.5 text-left sm:left-3 sm:right-3 sm:top-3 sm:space-y-2">

                    <span class="{{ $badgeColor }} inline-block rounded-full px-2 py-0.5 text-[9px] text-white sm:px-3 sm:py-1 sm:text-xs">
                        {{ $article->category->category }}
                    </span>

                    <p class="line-clamp-3 text-xs font-semibold leading-snug text-white sm:text-sm">
                        {{ $article->title }}
                    </p>

                </div>
            </a>
            @empty
            <div class="col-span-2 text-center py-10 text-gray-500">
                <p>Belum ada artikel</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<section class="relative z-10 bg-linear-to-tl from-[#6C9D50] to-[#1B601E] pb-12 pt-10 sm:pb-15 sm:pt-12">
    <h1 class="px-4 pb-5 text-center text-2xl font-medium text-white sm:text-3xl">
        Artikel Populer untuk Perternak
    </h1>

    <div class="mx-auto grid max-w-6xl grid-cols-1 items-stretch gap-6 rounded-3xl bg-[#F5F5F5] p-5 sm:p-7 lg:grid-cols-3 lg:p-10">

        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:col-span-2">
            @forelse($popularArticles as $index => $article)
            @php
                $badgeColor = match(strtoupper($article->category->category)) {
                    'INFORMASI' => 'bg-[#2563EB]',
                    'TIPS' => 'bg-[#EAAA00]',
                    'EDUKASI' => 'bg-[#2E7D32]',
                    default => 'bg-gray-500'
                };
            @endphp

            <a href="{{ route('article.show', $article->slug) }}" class="group overflow-hidden rounded-xl border bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg {{ $index == 0 ? 'sm:row-span-2' : '' }}">

                <div class="relative {{ $index == 0 ? 'h-60 sm:h-72' : 'h-48 sm:h-52' }}">
                    <img src="{{ asset('storage/' . $article->thumbnail) }}"
                         class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
                         alt="{{ $article->title }}">

                    <span class="absolute left-3 top-3 {{ $badgeColor }} rounded-full px-3 py-1 text-xs text-white">
                        {{ strtoupper($article->category->category) }}
                    </span>
                </div>

                <div class="p-4 sm:p-5">
                    <h3 class="font-semibold text-[#2D5016] mb-2 line-clamp-3 text-left">
                        {{ $article->title }}
                    </h3>

                    <p class="text-sm text-[#6B7280] mb-4 line-clamp-3 text-left">
                        {{ $article->short_description }}
                    </p>

                    <div class="flex flex-col gap-2 text-xs text-gray-500 sm:flex-row sm:items-center sm:justify-between sm:text-sm">
                        <span class="flex text-[#2D5016] items-center gap-2"> <x-svg.calendar-icon class="h-4 w-4 text-[#2D5016] sm:h-5 sm:w-5"/> {{ $article->created_at->format('d M Y') }} </span>
                        <span class="text-[#2D5016] font-medium">Baca Artikel →</span>
                    </div>
                </div>
            </a>
            @empty
            <div class="col-span-full flex items-center justify-center py-12">
                <p class="text-lg text-gray-500">
                    Belum ada artikel populer
                </p>
            </div>
            @endforelse
        </div>

        <div class="flex flex-col h-full">

            <div class="bg-[#D2EAC4] rounded-xl p-4 sm:p-5">
                <h4 class="font-semibold text-[#2D5016] mb-4">
                    Topik Artikel Saat Ini
                </h4>

                <div class="space-y-3 sm:space-y-4">
                    @forelse($trendingArticles as $article)
                        @php
                            $badgeColor = match(strtoupper($article->category->category)) {
                                'INFORMASI' => '#2563EB',
                                'TIPS' => '#EAAA00',
                                'EDUKASI' => '#2E7D32',
                                default => '#6B7280'
                            };
                        @endphp
                    <a href="{{ route('article.show', $article->slug) }}" class="flex gap-3 hover:bg-white/50 p-2 rounded-lg transition">

                        <div class="min-w-0 flex-1 text-left">
                            <p class="line-clamp-2 text-xs font-medium text-[#6B7280]">
                                {{ $article->title }}
                            </p>
                            <span class="mt-1 flex flex-wrap items-center gap-1 text-xs text-[#515A6CB2]">
                                <x-svg.calendar-icon class="text-[#515A6CB2] w-4 h-4"/> {{ $article->created_at->format('d M Y') }} <span>|</span> <span class="text-[#2D5016]"> Lihat Artikel → </span>
                            </span>
                        </div>

                        <div class="relative shrink-0">
                            <img src="{{ asset('storage/' . $article->thumbnail) }}" class="h-14 w-14 rounded-lg object-cover sm:h-16 sm:w-16" alt="{{ $article->title }}">
                            <span class="absolute -left-1 -top-2 z-10 rounded-full px-2 py-0.5 text-[8px] text-white" style="background-color: {{ $badgeColor }}">{{ strtoupper($article->category->category) }}</span>
                        </div>

                    </a>
                    @empty
                    <p class="text-sm text-gray-500 text-center py-4">Belum ada artikel trending</p>
                    @endforelse
                </div>
            </div>

            <a href="{{ route('produk') }}" class="mt-4 flex w-full items-center justify-center gap-2 rounded-lg bg-[#F4B000] py-3 font-semibold text-white transition hover:scale-[1.02] hover:bg-[#EAAA00] hover:shadow-lg lg:mt-auto">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 sm:h-7 sm:w-7" width="30" height="30" viewBox="0 0 34 34" fill="none">
                    <path d="M10 26.6667C8.16667 26.6667 6.68333 28.1667 6.68333 30C6.68333 31.8333 8.16667 33.3333 10 33.3333C11.8333 33.3333 13.3333 31.8333 13.3333 30C13.3333 28.1667 11.8333 26.6667 10 26.6667ZM0 0V3.33333H3.33333L9.33333 15.9833L7.08333 20.0667C6.81667 20.5333 6.66667 21.0833 6.66667 21.6667C6.66667 23.5 8.16667 25 10 25H30V21.6667H10.7C10.4667 21.6667 10.2833 21.4833 10.2833 21.25L10.3333 21.05L11.8333 18.3333H24.25C25.5 18.3333 26.6 17.65 27.1667 16.6167L33.1333 5.8C33.2667 5.56667 33.3333 5.28333 33.3333 5C33.3333 4.08333 32.5833 3.33333 31.6667 3.33333H7.01667L5.45 0H0ZM26.6667 26.6667C24.8333 26.6667 23.35 28.1667 23.35 30C23.35 31.8333 24.8333 33.3333 26.6667 33.3333C28.5 33.3333 30 31.8333 30 30C30 28.1667 28.5 26.6667 26.6667 26.6667Z" fill="white"/>
                </svg> Lihat Produk FeedGo
            </a>

        </div>
    </div>
</section>

<section class="mx-auto max-w-6xl px-4 py-8 sm:py-10">
    <livewire:user.new-article />
</section>

<section class="relative h-[350px] w-full overflow-hidden sm:h-[400px]">
    <img
        src="{{ asset('images/Tentang2.webp') }}"
        alt="image"
        class="absolute inset-0 w-full h-full object-cover"
    >

    <div class="absolute inset-0 flex flex-col items-center justify-center gap-3 text-center px-5">

        <h1 class="text-2xl font-semibold text-white drop-shadow-lg sm:text-3xl md:text-4xl">
            Ikuti Perkembangan Riset FeedGo
        </h1>

        <h2 class="max-w-2xl text-sm font-light text-white sm:text-base">
            Dapatkan insight, artikel edukasi, dan update riset pakan ternak yang dibagikan langsung oleh tim FeedGo.
        </h2>

        <form class="mt-3 w-full max-w-3xl">
            <div class="flex flex-col gap-2 rounded-2xl border-2 border-gray-200 bg-white p-1 transition focus-within:border-green-500 sm:flex-row sm:items-center sm:rounded-full">

                <input
                    type="email"
                    placeholder="Email"
                    class="min-w-0 flex-1 rounded-xl bg-transparent px-4 py-3 text-gray-700 outline-none placeholder:text-gray-400 sm:rounded-full"
                    required/>

                <button
                    type="submit"
                    class="flex w-full items-center justify-center gap-2 rounded-xl bg-[#1B601E] px-5 py-3 font-semibold text-white shadow-md transition duration-300 hover:bg-green-600 sm:w-auto sm:rounded-full sm:px-6">
                    Ikuti FeedGo
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" width="31" height="31" viewBox="0 0 31 31" fill="none">
                        <path d="M28.0938 15.5C28.0938 8.54498 22.455 2.90625 15.5 2.90625C8.54498 2.90625 2.90625 8.54498 2.90625 15.5C2.90625 22.455 8.54498 28.0938 15.5 28.0938C22.455 28.0938 28.0938 22.455 28.0938 15.5ZM15.2185 21.0316C15.1281 20.942 15.0563 20.8354 15.0071 20.7181C14.958 20.6007 14.9324 20.4748 14.9319 20.3476C14.9314 20.2204 14.956 20.0943 15.0042 19.9765C15.0524 19.8588 15.1234 19.7517 15.213 19.6614L18.3808 16.4688H10.293C10.036 16.4688 9.78963 16.3667 9.60796 16.185C9.42628 16.0033 9.32422 15.7569 9.32422 15.5C9.32422 15.2431 9.42628 14.9967 9.60796 14.815C9.78963 14.6333 10.036 14.5312 10.293 14.5312H18.3808L15.213 11.3386C15.1234 11.2482 15.0525 11.141 15.0043 11.0232C14.9561 10.9054 14.9316 10.7793 14.9321 10.652C14.9327 10.5247 14.9583 10.3987 15.0076 10.2814C15.0568 10.164 15.1287 10.0574 15.2191 9.96783C15.3095 9.87822 15.4166 9.8073 15.5345 9.75911C15.6523 9.71091 15.7784 9.6864 15.9057 9.68696C16.033 9.68752 16.1589 9.71315 16.2763 9.76238C16.3937 9.81161 16.5002 9.88348 16.5898 9.97389L21.3967 14.8176C21.5767 14.9991 21.6778 15.2444 21.6778 15.5C21.6778 15.7556 21.5767 16.0009 21.3967 16.1824L16.5898 21.0261C16.5002 21.1166 16.3936 21.1886 16.2762 21.2379C16.1587 21.2871 16.0327 21.3128 15.9053 21.3133C15.7779 21.3138 15.6517 21.2892 15.5338 21.2408C15.416 21.1925 15.3088 21.1214 15.2185 21.0316Z" fill="#E3B600"/>
                    </svg>
                </button>

            </div>
        </form>
    </div>

</section>
@endsection
