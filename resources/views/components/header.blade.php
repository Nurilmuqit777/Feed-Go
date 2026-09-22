@php
  $headerCompact = $headerCompact ?? false;
@endphp


<header class="p-3 sm:p-4 md:p-6">
{{-- header --}}
  <div x-data="{ mobileMenu: false }" class="bg-linear-to-tl from-[#6C9D50] to-[#1B601E] rounded-4xl relative overflow-hidden {{ $headerCompact ? 'pb-40 sm:pb-52 md:pb-64' : 'pb-0' }}">

    <div class="flex items-center justify-between px-4 py-4 sm:px-5 sm:py-5 md:px-6 md:py-3">

      {{-- logo --}}
        <div class="shrink-0">
            <a href="{{ route('beranda') }}">
                <img src="{{ asset('images/FeedGo.webp') }}" alt="Feed-Go" class="h-7 w-auto sm:h-8"/>
            </a>
        </div>

      {{-- navbar --}}
      <nav class="hidden lg:flex xl:gap-8 gap-6 items-center text-white font-bold">
        <a href="{{ route('beranda') }}" class="{{ request()->routeIs('beranda')
            ? 'text-[#EAAA00]'
            : 'hover:text-yellow-300' }} transition-colors">Beranda</a>
        <a href="{{ route('produk') }}" class="{{ request()->routeIs('produk')
            ? 'text-[#EAAA00]'
            : 'hover:text-yellow-300' }} transition-colors">Produk</a>
        <a href="{{ route('tentangkami') }}" class="{{ request()->routeIs('tentangkami')
            ? 'text-[#EAAA00]'
            : 'hover:text-yellow-300' }} transition-colors">Tentang Kami</a>
        <a href="{{ route('artikel') }}" class="{{ request()->routeIs('artikel')
            ? 'text-[#EAAA00]'
            : 'hover:text-yellow-300' }} transition-colors">Artikel</a>
      </nav>

      {{-- auth --}}
      <div class="hidden items-center gap-3 lg:flex">
        @auth
          @if (auth()->user()->role === 'admin')

            <a href="{{ route('admin.dashboard') }}"
               class="bg-yellow-400 text-green-800 px-4 py-2 rounded-full
                      text-sm font-semibold hover:bg-yellow-300">
                Dashboard
            </a>

          @else

            <livewire:dropdown
                :label="explode(' ', auth()->user()->name)[0]"
                :items="[
                    ['label' => 'Profil', 'route' => 'profile.edit'],
                    ['label' => 'Pesanan Saya', 'route' => 'user.orders'],
                    ['label' => 'Keluar', 'action' => 'logout'],
                ]"
                buttonClass="px-4 py-2 rounded-full text-sm bg-yellow-400 text-green-800 font-semibold flex items-center gap-2"
                menuClass="absolute mt-2 w-48 bg-white rounded-xl shadow-lg overflow-hidden z-50"
                itemClass="block px-4 py-2 text-green-800 text-sm font-semibold hover:bg-yellow-400"
                svgClass="text-green-800"
                :showGreeting="true"
            />

            <livewire:actions.cart-badge/>
          @endif
        @else
        <a href="{{ route('register') }}" class="text-white text-sm hover:text-yellow-200">Daftar Sekarang</a>
        <a href="{{ route('login') }}" class="bg-[#E9A900] text-green-800 px-4 py-2 rounded-full text-sm font-semibold hover:bg-yellow-300">
          Masuk</a>
        @endauth
      </div>
        <button
            type="button"
            @click="mobileMenu = !mobileMenu"
            class="flex h-10 w-10 items-center justify-center rounded-full bg-white/10 text-white transition hover:bg-white/20 lg:hidden"
            aria-label="Buka menu"
        >

            <svg x-show="!mobileMenu" x-cloak class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>

            <svg x-show="mobileMenu" x-cloak class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 6l12 12M18 6L6 18"/>
            </svg>
        </button>
    </div>

    <div
        x-show="mobileMenu"
        x-cloak
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        @click.outside="mobileMenu = false"
        class="border-t border-white/10 px-4 pb-4 pt-3 lg:hidden"
    >

        <nav class="flex flex-col gap-1">
            <a href="{{ route('beranda') }}" class="rounded-xl px-4 py-3 text-sm font-semibold text-white transition hover:bg-white/10 {{ request()->routeIs('beranda') ? 'bg-white/10 text-[#EAAA00]' : '' }}">
                Beranda
            </a>
            <a href="{{ route('produk') }}" class="rounded-xl px-4 py-3 text-sm font-semibold text-white transition hover:bg-white/10 {{ request()->routeIs('produk') ? 'bg-white/10 text-[#EAAA00]' : '' }}">
                Produk
            </a>
            <a href="{{ route('tentangkami') }}" class="rounded-xl px-4 py-3 text-sm font-semibold text-white transition hover:bg-white/10 {{ request()->routeIs('tentangkami') ? 'bg-white/10 text-[#EAAA00]' : '' }}">
                Tentang Kami
            </a>
            <a href="{{ route('artikel') }}" class="rounded-xl px-4 py-3 text-sm font-semibold text-white transition hover:bg-white/10 {{ request()->routeIs('artikel') ? 'bg-white/10 text-[#EAAA00]' : '' }}">
                Artikel
            </a>
        </nav>

        <div class="mt-3 border-t border-white/10 pt-3">
            @auth
                @if (auth()->user()->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}" class="block rounded-xl bg-yellow-400 px-4 py-3 text-center text-sm font-semibold text-green-800 transition hover:bg-yellow-300">
                        Dashboard
                    </a>
                @else
                    <div class="flex items-center gap-2">
                        <livewire:dropdown
                            :label="explode(' ', auth()->user()->name)[0]"
                            :items="[
                                ['label' => 'Profil', 'route' => 'profile.edit'],
                                ['label' => 'Pesanan Saya', 'route' => 'user.orders'],
                                ['label' => 'Keluar', 'action' => 'logout'],
                            ]"
                            buttonClass="w-full px-4 py-3 rounded-xl text-sm bg-yellow-400 text-green-800 font-semibold flex items-center justify-between gap-2"
                            menuClass="absolute left-0 right-0 mt-2 bg-white rounded-xl shadow-lg overflow-hidden z-50"
                            itemClass="block px-4 py-3 text-green-800 text-sm font-semibold hover:bg-yellow-400"
                            svgClass="text-green-800"
                            :showGreeting="true"
                        />
                        <livewire:actions.cart-badge />
                    </div>
                @endif
            @else
                <div class="flex items-center gap-2">
                    <a href="{{ route('register') }}" class="flex-1 rounded-xl border border-white/30 px-4 py-3 text-center text-sm font-semibold text-white transition hover:bg-white/10">
                        Daftar
                    </a>
                    <a href="{{ route('login') }}" class="flex-1 rounded-xl bg-[#E9A900] px-4 py-3 text-center text-sm font-semibold text-green-800 transition hover:bg-yellow-300">
                        Masuk
                    </a>
                </div>
            @endauth
        </div>
    </div>

    {{ $slot ?? '' }}
    @yield('header-content')
  </div>
</header>
