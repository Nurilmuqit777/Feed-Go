<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>

    <body class="font-[poppins] min-h-screen antialiased bg-[radial-gradient(circle_at_35%_30%,#2E7D32_8%,#084A0B_75%)]">

        <div x-data="{ open: false }" class="relative mb-6 p-4 sm:p-5">
            {{-- Header --}}
            <div class="relative flex items-center justify-between">
                {{-- Logo --}}
                <div class="text-2xl font-bold text-green-300 px-0 sm:px-2 md:px-6">
                    <a href="{{ route('beranda') }}">
                        <img src="{{ asset('images/FeedGo.webp') }}" alt="Feed-Go" class="h-9 sm:h-10 md:h-12 w-auto inline-block"/>
                    </a>
                </div>

                {{-- Navbar Desktop --}}
                <nav class="hidden md:flex absolute left-1/2 -translate-x-1/2 items-center gap-6 lg:gap-8 text-base lg:text-lg text-white whitespace-nowrap">
                    <a href="{{ route('beranda') }}" class="hover:text-yellow-300 transition">
                        Beranda
                    </a>

                    <a href="{{ route('produk') }}" class="hover:text-yellow-300 transition">
                        Produk
                    </a>

                    <a href="{{ route('tentangkami') }}" class="hover:text-yellow-300 transition">
                        Tentang Kami
                    </a>

                    <a href="{{ route('artikel') }}" class="hover:text-yellow-300 transition">
                        Artikel
                    </a>
                </nav>

                {{-- Hamburger Mobile --}}
                <button type="button" @click="open = !open" class="md:hidden text-white p-2 rounded-lg hover:bg-white/10 transition" aria-label="Toggle navigation">
                    <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>

                    <svg x-show="open" x-cloak xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>

            </div>

            {{-- Navbar Mobile --}}
            <nav x-show="open" x-cloak x-transition @click.outside="open = false" class="md:hidden mt-4 rounded-2xl bg-black/20 backdrop-blur-sm border border-white/10 p-4 space-y-1">
                <a href="{{ route('beranda') }}" class="block px-4 py-3 rounded-lg text-white hover:bg-white/10 hover:text-yellow-300 transition">
                    Beranda
                </a>

                <a href="{{ route('produk') }}" class="block px-4 py-3 rounded-lg text-white hover:bg-white/10 hover:text-yellow-300 transition">
                    Produk
                </a>

                <a href="{{ route('tentangkami') }}" class="block px-4 py-3 rounded-lg text-white hover:bg-white/10 hover:text-yellow-300 transition">
                    Tentang Kami
                </a>

                <a href="{{ route('artikel') }}" class="block px-4 py-3 rounded-lg text-white hover:bg-white/10 hover:text-yellow-300 transition">
                    Artikel
                </a>
            </nav>

        </div>

        <div>
            {{ $slot }}
        </div>

        @fluxScripts
    </body>
</html>
