@extends('app')

@section('title', 'Artikel')

@section('content')

@section('header-content')
<div class="relative w-full h-[400px] overflow-hidden">

    <img
        src="{{ asset('images/Sawah.webp') }}"
        alt="image"
        class="absolute inset-0 w-full h-full object-cover blur-sm"
    >

    <div class="absolute inset-0 flex flex-col items-center justify-center gap-3 text-center px-4">

        <h1 class="text-3xl md:text-4xl font-semibold text-white text-shadow-lg drop-shadow-lg">
            Artikel FeedGo
        </h1>

        <h2 class="text-white text-sm font-light">
            Wawasan pakan ternak berbasis riset untuk peternak Indonesia.
        </h2>

    </div>

</div>
@endsection
<section class="max-w-6xl mx-auto bg-[#F5F5F5] rounded-3xl -mt-20 relative z-20 p-10 text-center">
    <div class="mx-auto grid lg:grid-cols-2 grid-cols-1 gap-12 items-center">

        <div class="text-left lg:text-left text-center md:items-center">
            <h2 class="text-3xl lg:text-4xl font-semibold text-[#2D5016] leading-snug mb-4">
                Artikel FeedGo<br>
                edukasi pakan<br>
                berbasis riset untuk<br>
                peternak.
            </h2>

            <p class="text-[#6B7280] text-sm leading-relaxed mb-6 max-w-md mx-auto lg:mx-0">
                Artikel edukasi, tips, dan informasi seputar pakan udang dan
                pakan kambing untuk mendukung produktivitas dan
                keberlanjutan peternakan.
            </p>

            <p class="text-sm text-[#4D4D4D] mb-3 font-semibold">
                Cari artikel atau topik pakan ternak yang Anda butuhkan
            </p>

            <livewire:user.article-search />
        </div>

        <div class="grid grid-cols-2 gap-4">
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
                {{ $index == 0 ? 'h-60 w-50 place-self-end' : '' }}
                {{ $index == 1 ? 'h-40 w-60 place-self-start self-end' : '' }}
                {{ $index == 2 ? 'h-40 w-60 place-self-end self-start' : '' }}
                {{ $index == 3 ? 'h-60 w-50 place-self-start' : '' }}">
                <img src="{{ asset('storage/' . $article->thumbnail) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" alt="{{ $article->title }}"/>
                <div class="absolute inset-0 bg-black/40 group-hover:bg-black/50 transition-colors duration-300"></div>
                <div class="absolute top-3 left-3 right-3 text-left space-y-2">

                    <span class="{{ $badgeColor }} inline-block text-white text-xs px-3 py-1 rounded-full">
                        {{ $article->category->category }}
                    </span>

                    <p class="text-white text-sm font-semibold leading-snug">
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

<section class="relative bg-linear-to-tl from-[#6C9D50] to-[#1B601E] items-center text-center pb-15 z-10">
    <h1 class="text-white text-3xl font-medium p-5">
        Artikel Populer untuk Perternak
    </h1>

    <div class="max-w-6xl mx-auto bg-[#F5F5F5] rounded-3xl relative z-20 p-10 text-center grid lg:grid-cols-3 grid-cols-1 gap-8 items-sretch">

        <div class="lg:col-span-2 grid md:grid-cols-2 auto-rows-min gap-6">
            @forelse($popularArticles as $index => $article)
            @php
                $badgeColor = match(strtoupper($article->category->category)) {
                    'INFORMASI' => 'bg-[#2563EB]',
                    'TIPS' => 'bg-[#EAAA00]',
                    'EDUKASI' => 'bg-[#2E7D32]',
                    default => 'bg-gray-500'
                };
            @endphp

            <a href="{{ route('article.show', $article->slug) }}"
               class="bg-white rounded-xl overflow-hidden border shadow-sm hover:shadow-lg transition transform hover:-translate-y-1 duration-300
                      {{ $index == 0 ? 'row-span-2' : '' }}">

                <div class="relative {{ $index == 0 ? 'h-72' : 'h-52' }}">
                    <img src="{{ asset('storage/' . $article->thumbnail) }}"
                         class="w-full h-full object-cover"
                         alt="{{ $article->title }}">

                    <span class="absolute top-3 left-3 {{ $badgeColor }} text-white text-xs px-3 py-1 rounded-full">
                        {{ strtoupper($article->category->category) }}
                    </span>
                </div>

                <div class="p-5">
                    <h3 class="font-semibold text-[#2D5016] mb-2 line-clamp-3 text-left">
                        {{ $article->title }}
                    </h3>

                    <p class="text-sm text-[#6B7280] mb-4 line-clamp-3 text-left">
                        {{ $article->short_description }}
                    </p>

                    <div class="flex items-center justify-between text-sm text-gray-500">
                        <span class="flex text-[#2D5016] items-center gap-2"> <x-svg.calendar-icon class="text-[#2D5016] w-5 h-5"/> {{ $article->created_at->format('d M Y') }} </span>
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

            <div class="bg-[#D2EAC4] rounded-xl p-5">
                <h4 class="font-semibold text-[#2D5016] mb-4">
                    Topik Artikel Saat Ini
                </h4>

                <div class="space-y-4">
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
                        <div class="text-left flex-1">
                            <p class="text-xs font-medium text-[#6B7280]">
                                {{ $article->title }}
                            </p>
                            <span class="text-xs text-[#2D5016] flex items-center gap-1">
                                <x-svg.calendar-icon class="text-[#515A6CB2] w-4 h-4"/> <span class="text-[#515A6CB2]">{{ $article->created_at->format('d M Y') }}</span> | Lihat Artikel →
                            </span>
                        </div>
                        <div class="relative">
                            <img src="{{ asset('storage/' . $article->thumbnail) }}" class="w-14 h-14 rounded-lg object-cover">
                            <span class="absolute -top-2 left-0 text-[9px] text-white px-2 py-0.5 rounded-full z-10" style="background-color: {{ $badgeColor }}">{{ strtoupper($article->category->category) }}</span>
                        </div>
                    </a>
                    @empty
                    <p class="text-sm text-gray-500 text-center py-4">Belum ada artikel trending</p>
                    @endforelse
                </div>
            </div>

            <a href="{{ route('produk') }}" class="mt-auto w-full bg-[#F4B000] text-white font-semibold py-3 rounded-lg flex items-center justify-center gap-2 hover:bg-[#EAAA00] transition">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 34 34" fill="none">
                    <path d="M10 26.6667C8.16667 26.6667 6.68333 28.1667 6.68333 30C6.68333 31.8333 8.16667 33.3333 10 33.3333C11.8333 33.3333 13.3333 31.8333 13.3333 30C13.3333 28.1667 11.8333 26.6667 10 26.6667ZM0 0V3.33333H3.33333L9.33333 15.9833L7.08333 20.0667C6.81667 20.5333 6.66667 21.0833 6.66667 21.6667C6.66667 23.5 8.16667 25 10 25H30V21.6667H10.7C10.4667 21.6667 10.2833 21.4833 10.2833 21.25L10.3333 21.05L11.8333 18.3333H24.25C25.5 18.3333 26.6 17.65 27.1667 16.6167L33.1333 5.8C33.2667 5.56667 33.3333 5.28333 33.3333 5C33.3333 4.08333 32.5833 3.33333 31.6667 3.33333H7.01667L5.45 0H0ZM26.6667 26.6667C24.8333 26.6667 23.35 28.1667 23.35 30C23.35 31.8333 24.8333 33.3333 26.6667 33.3333C28.5 33.3333 30 31.8333 30 30C30 28.1667 28.5 26.6667 26.6667 26.6667Z" fill="white"/>
                </svg> Lihat Produk FeedGo
            </a>

        </div>
    </div>
</section>

<section class="max-w-6xl mx-auto items-center text-center">
    <livewire:user.new-article />
</section>

<section class="relative w-full h-[400px]">
    <img
        src="{{ asset('images/Tentang2.webp') }}"
        alt="image"
        class="absolute inset-0 w-full h-full object-cover"
    >

    <div class="absolute inset-0 flex flex-col items-center justify-center gap-3 text-center px-4">

        <h1 class="text-3xl md:text-4xl font-semibold text-white text-shadow-lg drop-shadow-lg">
            Ikuti Perkembangan Riset FeedGo
        </h1>

        <h2 class="text-white text-sm font-light">
            Dapatkan insight, artikel edukasi, dan update riset pakan ternak yang dibagikan langsung oleh tim FeedGo.
        </h2>

        <form class="max-w-3xl mx-auto">
            <div
                class="flex items-center border-2 border-gray-200 rounded-full
                             focus-within:border-green-500 transition bg-white">

                <input
                    type="email"
                    placeholder="Email"
                    class="flex-1 pl-4 py-3 bg-transparent
                        focus:outline-none text-gray-700
                        placeholder:text-gray-400"
                        required/>

                <button
                    type="submit"
                    class="bg-[#1B601E] hover:bg-green-600 text-white font-semibold
                           px-6 py-3 rounded-full transition duration-300
                           shadow-md whitespace-nowrap flex items-center gap-2">
                    Ikuti FeedGo
                    <svg xmlns="http://www.w3.org/2000/svg" width="31" height="31" viewBox="0 0 31 31" fill="none">
                        <path d="M28.0938 15.5C28.0938 8.54498 22.455 2.90625 15.5 2.90625C8.54498 2.90625 2.90625 8.54498 2.90625 15.5C2.90625 22.455 8.54498 28.0938 15.5 28.0938C22.455 28.0938 28.0938 22.455 28.0938 15.5ZM15.2185 21.0316C15.1281 20.942 15.0563 20.8354 15.0071 20.7181C14.958 20.6007 14.9324 20.4748 14.9319 20.3476C14.9314 20.2204 14.956 20.0943 15.0042 19.9765C15.0524 19.8588 15.1234 19.7517 15.213 19.6614L18.3808 16.4688H10.293C10.036 16.4688 9.78963 16.3667 9.60796 16.185C9.42628 16.0033 9.32422 15.7569 9.32422 15.5C9.32422 15.2431 9.42628 14.9967 9.60796 14.815C9.78963 14.6333 10.036 14.5312 10.293 14.5312H18.3808L15.213 11.3386C15.1234 11.2482 15.0525 11.141 15.0043 11.0232C14.9561 10.9054 14.9316 10.7793 14.9321 10.652C14.9327 10.5247 14.9583 10.3987 15.0076 10.2814C15.0568 10.164 15.1287 10.0574 15.2191 9.96783C15.3095 9.87822 15.4166 9.8073 15.5345 9.75911C15.6523 9.71091 15.7784 9.6864 15.9057 9.68696C16.033 9.68752 16.1589 9.71315 16.2763 9.76238C16.3937 9.81161 16.5002 9.88348 16.5898 9.97389L21.3967 14.8176C21.5767 14.9991 21.6778 15.2444 21.6778 15.5C21.6778 15.7556 21.5767 16.0009 21.3967 16.1824L16.5898 21.0261C16.5002 21.1166 16.3936 21.1886 16.2762 21.2379C16.1587 21.2871 16.0327 21.3128 15.9053 21.3133C15.7779 21.3138 15.6517 21.2892 15.5338 21.2408C15.416 21.1925 15.3088 21.1214 15.2185 21.0316Z" fill="#E3B600"/>
                    </svg>
                </button>

            </div>
        </form>
    </div>

</section>
@endsection
