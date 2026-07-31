@extends('app')

@section('title', $blog->title)

@section('content')

@section('header-content')
<div class="max-w-6xl mx-auto px-6 py-6 items-center text-center justify-center">

    <div class="flex items-center gap-2 text-sm text-white/80 mb-6">
        <a href="{{ route('artikel') }}" class="hover:text-white flex font-semibold gap-1 text-xl items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="31" height="15" viewBox="0 0 31 15" fill="currentColor">
                <path d="M0.292891 6.65685C-0.0976334 7.04737 -0.0976334 7.68054 0.292891 8.07106L6.65685 14.435C7.04738 14.8255 7.68054 14.8255 8.07107 14.435C8.46159 14.0445 8.46159 13.4113 8.07107 13.0208L2.41421 7.36395L8.07107 1.7071C8.46159 1.31657 8.46159 0.683409 8.07107 0.292885C7.68054 -0.0976396 7.04738 -0.0976396 6.65685 0.292885L0.292891 6.65685ZM31 7.36395V6.36395L0.999998 6.36395V7.36395V8.36395L31 8.36395V7.36395Z"/>
            </svg>
            Artikel
        </a>
    </div>

    <div class="max-w-4xl text-center items-center mx-auto text-white">
        <h1 class="text-4xl font-bold mb-4">{{ $blog->title }}</h1>
        <p class="text-base px-20">{{ $blog->short_description }}</p>
        <div class="flex justify-center gap-6 mt-6">

            <div class="flex items-center gap-2 text-sm text-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="51" height="51" viewBox="0 0 51 51" fill="none">
                    <path d="M18.0625 29.75C18.767 29.75 19.4426 29.4701 19.9408 28.972C20.4389 28.4739 20.7188 27.7982 20.7188 27.0938C20.7188 26.3893 20.4389 25.7136 19.9408 25.2155C19.4426 24.7174 18.767 24.4375 18.0625 24.4375C17.358 24.4375 16.6824 24.7174 16.1842 25.2155C15.6861 25.7136 15.4062 26.3893 15.4062 27.0938C15.4062 27.7982 15.6861 28.4739 16.1842 28.972C16.6824 29.4701 17.358 29.75 18.0625 29.75ZM18.0625 37.1875C18.767 37.1875 19.4426 36.9076 19.9408 36.4095C20.4389 35.9114 20.7188 35.2357 20.7188 34.5312C20.7188 33.8268 20.4389 33.1511 19.9408 32.653C19.4426 32.1549 18.767 31.875 18.0625 31.875C17.358 31.875 16.6824 32.1549 16.1842 32.653C15.6861 33.1511 15.4062 33.8268 15.4062 34.5312C15.4062 35.2357 15.6861 35.9114 16.1842 36.4095C16.6824 36.9076 17.358 37.1875 18.0625 37.1875ZM28.1562 27.0938C28.1562 27.7982 27.8764 28.4739 27.3783 28.972C26.8801 29.4701 26.2045 29.75 25.5 29.75C24.7955 29.75 24.1199 29.4701 23.6217 28.972C23.1236 28.4739 22.8438 27.7982 22.8438 27.0938C22.8438 26.3893 23.1236 25.7136 23.6217 25.2155C24.1199 24.7174 24.7955 24.4375 25.5 24.4375C26.2045 24.4375 26.8801 24.7174 27.3783 25.2155C27.8764 25.7136 28.1562 26.3893 28.1562 27.0938ZM25.5 37.1875C26.2045 37.1875 26.8801 36.9076 27.3783 36.4095C27.8764 35.9114 28.1562 35.2357 28.1562 34.5312C28.1562 33.8268 27.8764 33.1511 27.3783 32.653C26.8801 32.1549 26.2045 31.875 25.5 31.875C24.7955 31.875 24.1199 32.1549 23.6217 32.653C23.1236 33.1511 22.8438 33.8268 22.8438 34.5312C22.8438 35.2357 23.1236 35.9114 23.6217 36.4095C24.1199 36.9076 24.7955 37.1875 25.5 37.1875ZM35.5938 27.0938C35.5938 27.7982 35.3139 28.4739 34.8158 28.972C34.3176 29.4701 33.642 29.75 32.9375 29.75C32.233 29.75 31.5574 29.4701 31.0592 28.972C30.5611 28.4739 30.2812 27.7982 30.2812 27.0938C30.2812 26.3893 30.5611 25.7136 31.0592 25.2155C31.5574 24.7174 32.233 24.4375 32.9375 24.4375C33.642 24.4375 34.3176 24.7174 34.8158 25.2155C35.3139 25.7136 35.5938 26.3893 35.5938 27.0938Z" fill="white"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M17 6.90625C17.4227 6.90625 17.8281 7.07416 18.127 7.37305C18.4258 7.67193 18.5938 8.07731 18.5938 8.5V10.0938H32.4062V8.5C32.4062 8.07731 32.5742 7.67193 32.873 7.37305C33.1719 7.07416 33.5773 6.90625 34 6.90625C34.4227 6.90625 34.8281 7.07416 35.127 7.37305C35.4258 7.67193 35.5938 8.07731 35.5938 8.5V10.1107C35.9167 10.1192 36.2178 10.1348 36.4969 10.1575C37.3044 10.2213 38.0609 10.3658 38.777 10.7313C39.8768 11.2916 40.771 12.1857 41.3313 13.2855C41.6968 14.0016 41.8412 14.7581 41.905 15.5656C41.9688 16.3412 41.9688 17.2869 41.9688 18.4237V34.7013C41.9688 35.8381 41.9688 36.7837 41.905 37.5594C41.8412 38.3669 41.6968 39.1234 41.3313 39.8395C40.7715 40.939 39.8781 41.8331 38.7791 42.3938C38.0609 42.7593 37.3044 42.9037 36.4969 42.9675C35.7212 43.0312 34.7756 43.0312 33.6409 43.0312H17.3612C16.2244 43.0312 15.2787 43.0312 14.5031 42.9675C13.6956 42.9037 12.9391 42.7593 12.223 42.3938C11.1238 41.8346 10.2298 40.942 9.66875 39.8438C9.30325 39.1255 9.15875 38.369 9.095 37.5615C9.03125 36.7859 9.03125 35.8403 9.03125 34.7055V18.4237C9.03125 17.2869 9.03125 16.3412 9.095 15.5656C9.15875 14.7581 9.30325 14.0016 9.66875 13.2855C10.2291 12.1857 11.1232 11.2916 12.223 10.7313C12.9391 10.3658 13.6956 10.2213 14.5031 10.1575C14.7822 10.1348 15.0833 10.1192 15.4062 10.1107V8.5C15.4062 8.29071 15.4475 8.08346 15.5276 7.8901C15.6077 7.69674 15.7251 7.52104 15.873 7.37305C16.021 7.22506 16.1967 7.10766 16.3901 7.02757C16.5835 6.94747 16.7907 6.90625 17 6.90625ZM38.7812 21.7812H12.2188V34.6375C12.2188 35.853 12.2188 36.6711 12.2719 37.298C12.3208 37.91 12.41 38.2011 12.5078 38.3924C12.7628 38.8939 13.1686 39.2998 13.6701 39.5548C13.8614 39.6525 14.1525 39.7418 14.7624 39.7906C15.3914 39.8416 16.2074 39.8438 17.425 39.8438H33.575C34.7905 39.8438 35.6086 39.8438 36.2355 39.7906C36.8475 39.7418 37.1386 39.6525 37.3299 39.5548C37.8305 39.2999 38.2374 38.893 38.4923 38.3924C38.59 38.2011 38.6793 37.91 38.7281 37.298C38.7791 36.6711 38.7812 35.853 38.7812 34.6375V21.7812ZM22.3125 14.875C21.8898 14.875 21.4844 15.0429 21.1855 15.3418C20.8867 15.6407 20.7188 16.0461 20.7188 16.4688C20.7188 16.8914 20.8867 17.2968 21.1855 17.5957C21.4844 17.8946 21.8898 18.0625 22.3125 18.0625H28.6875C29.1102 18.0625 29.5156 17.8946 29.8145 17.5957C30.1133 17.2968 30.2812 16.8914 30.2812 16.4688C30.2812 16.0461 30.1133 15.6407 29.8145 15.3418C29.5156 15.0429 29.1102 14.875 28.6875 14.875H22.3125Z" fill="white"/>
                </svg>
                <span class="text-lg font-base">{{ $blog->created_at->format('d M Y') }}</span>
            </div>

            <div class="flex items-center gap-2 text-sm text-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 38 38" fill="none">
                    <path d="M8.74438 14.3799L17.4888 0L26.2353 14.3841L8.74438 14.3799ZM29.1763 37.7549C26.9563 37.7549 25.08 36.9892 23.5471 35.4578C22.0143 33.9263 21.2479 32.05 21.2479 29.8286C21.2479 27.6073 22.0143 25.7309 23.5471 24.1995C25.08 22.6681 26.9563 21.9017 29.1763 21.9003C31.3962 21.8988 33.2725 22.6653 34.8054 24.1995C36.3382 25.7338 37.1046 27.6101 37.1046 29.8286C37.1046 32.0471 36.3382 33.9235 34.8054 35.4578C33.2725 36.992 31.3962 37.7584 29.1763 37.757M0 36.6945V22.9628H13.7275V36.6945H0ZM29.1763 35.632C30.7998 35.632 32.1732 35.071 33.2966 33.949C34.42 32.827 34.981 31.4535 34.9796 29.8286C34.9782 28.2037 34.4172 26.8303 33.2966 25.7083C32.176 24.5863 30.8026 24.0253 29.1763 24.0253C27.5499 24.0253 26.1765 24.5863 25.0559 25.7083C23.9353 26.8303 23.3743 28.2037 23.3729 29.8286C23.3715 31.4535 23.9325 32.827 25.0559 33.949C26.1793 35.071 27.5528 35.632 29.1763 35.632ZM2.125 34.5695H11.6025V25.0878H2.125V34.5695ZM12.4461 12.257H22.5314L17.4888 4.1735L12.4461 12.257Z" fill="white"/>
                </svg>
                <span class="text-lg font-base">{{ $blog->category->category }}</span>
            </div>
        </div>
    </div>

    <img src="{{ asset('storage/' . $blog->thumbnail) }}" alt="{{ $blog->title }}" class="w-6xl mx-auto mt-8 rounded-lg shadow-lg max-h-96 object-cover"/>

    <div class="text-justify trix-content max-w-6xl mx-auto text-white text-lg mt-10 mb-20 [&_ul]:list-disc [&_ul]:pl-6 [&_ul]:ml-4 [&_ol]:list-decimal [&_ol]:pl-6 [&_li]:mb-1">
        {!! $blog->content !!}
    </div>

    <div>
        <p class="text-[#EAAA00] font-semibold text-lg">Untuk informasi lebih lanjut, silakan jelajahi artikel dan produk FeedGo.</p>
        <p class="text-[#EAAA00] font-semibold text-lg">“Pakan Inovatif, Hasil Produktif.”</p>
    </div>

    <div class="flex items-center justify-center gap-4 mt-10 mb-10">

        <div class="w-12 h-12 rounded-full bg-white flex items-center justify-center">
            <img src="{{ asset('images/FeedGo.webp') }}" alt="FeedGo" class="w-8 h-8 object-contain"/>
        </div>

        <div class="text-white text-start leading-tight">
            <h1 class="text-xl md:text-2xl font-semibold">
                Tim Riset FeedGo
            </h1>
            <p class="text-sm md:text-base text-white/80">
                Pengembangan nutrisi ternak berbasis riset &amp; uji lapangan
            </p>
        </div>
    </div>

</div>
@endsection
<div class="max-w-6xl mx-auto px-6 py-6 items-center text-center justify-center">

    <h1 class="text-[#2E7D32] text-3xl font-semibold mb-6">
        Artikel Terkait
    </h1>

    <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-10 p-10">
        @forelse($relatedArticles as $article)
        @php
        $badgeColor = match(strtoupper($article->category->category)) {
            'INFORMASI' => 'bg-[#2563EB]',
            'TIPS' => 'bg-[#EAAA00]',
            'EDUKASI' => 'bg-[#2E7D32]',
            default => 'bg-gray-500'
        };
        @endphp
        <a href="{{ route('article.show', $article->slug) }}" class="bg-white rounded-xl overflow-hidden border shadow-sm row-span-2 hover:shadow-lg transition transform hover:-translate-y-1 duration-300">
            <div class="relative h-72">
                <img src="{{ asset('storage/' . $article->thumbnail) }}" class="w-full h-full object-cover">
                <span class="absolute top-3 left-3 {{ $badgeColor }} text-white text-xs px-3 py-1 rounded-full">
                    {{ strtoupper($article->category->category) }}
                </span>
            </div>

            <div class="p-5">
                <h3 class="font-semibold text-gray-800 mb-2">
                    {{ $article->title }}
                </h3>

                <p class="text-sm text-gray-600 mb-4">
                    {{ $article->short_description }}
                </p>

                <div class="flex items-center justify-between text-sm text-gray-500">
                    <span>{{ $article->created_at->format('d M Y') }}</span>
                    <span  class="text-[#F4B000] font-medium">Baca Artikel →</span>
                </div>
            </div>
        </a>
        @empty
        <div class="col-span-full text-center py-10 text-gray-400">
            Tidak ada artikel terkait.
        </div>
        @endforelse

    </div>

    <div class="flex justify-end mt-6">
        <a href="{{ route('artikel') }}"
           class="inline-flex items-center gap-3 px-6 py-3 rounded-full border border-gray-300 text-[#2D5016] font-semibold hover:bg-gray-50 transition">
            <span>Lihat Artikel Lainnya</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 16 16" fill="currentColor">
                <path d="M5 3l6 5-6 5V3z"/>
            </svg>
        </a>
    </div>
</div>
@endsection
