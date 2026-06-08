@php
  $headerCompact = $headerCompact ?? false;
@endphp


<header class="p-6">
{{-- header --}}
  <div class="bg-linear-to-tl from-[#6C9D50] to-[#1B601E] rounded-4xl relative overflow-hidden {{ $headerCompact ? 'pb-64' : 'pb-0' }}">

    <div class="flex items-center justify-between mb-2">

      {{-- logo --}}
      <div class="text-2xl font-bold text-green-300 px-6">
        <img src="{{ asset('images/FeedGo.webp') }}" alt="Feed-Go" class="h-8 inline-block mr-2" />
      </div>

      {{-- navbar --}}
      <nav class="hidden md:flex gap-8 text-white font-bold">
        <a href="{{ route('beranda') }}" class="{{ request()->routeIs('beranda')
            ? 'text-[#EAAA00]'
            : 'hover:text-yellow-300' }}">Beranda</a>
        <a href="{{ route('produk') }}" class="{{ request()->routeIs('produk')
            ? 'text-[#EAAA00]'
            : 'hover:text-yellow-300' }}">Produk</a>
        <a href="{{ route('tentangkami') }}" class="{{ request()->routeIs('tentangkami')
            ? 'text-[#EAAA00]'
            : 'hover:text-yellow-300' }}">Tentang Kami</a>
        <a href="{{ route('artikel') }}" class="{{ request()->routeIs('artikel')
            ? 'text-[#EAAA00]'
            : 'hover:text-yellow-300' }}">Artikel</a>
      </nav>

      {{-- auth --}}
      <div class="flex items-center gap-4 p-5">
        @auth
          @if (in_array(auth()->user()->role, ['admin', 'superadmin']))

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

            <a href="{{ route('user.cart') }}" class="inline-flex items-center text-sm gap-2 text-white rounded-full font-semibold hover:text-yellow-300">
                <svg class="" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 34 34" fill="currentColor">
                    <path d="M10 26.6667C8.16667 26.6667 6.68333 28.1667 6.68333 30C6.68333 31.8333 8.16667 33.3333 10 33.3333C11.8333 33.3333 13.3333 31.8333 13.3333 30C13.3333 28.1667 11.8333 26.6667 10 26.6667ZM0 0V3.33333H3.33333L9.33333 15.9833L7.08333 20.0667C6.81667 20.5333 6.66667 21.0833 6.66667 21.6667C6.66667 23.5 8.16667 25 10 25H30V21.6667H10.7C10.4667 21.6667 10.2833 21.4833 10.2833 21.25L10.3333 21.05L11.8333 18.3333H24.25C25.5 18.3333 26.6 17.65 27.1667 16.6167L33.1333 5.8C33.2667 5.56667 33.3333 5.28333 33.3333 5C33.3333 4.08333 32.5833 3.33333 31.6667 3.33333H7.01667L5.45 0H0ZM26.6667 26.6667C24.8333 26.6667 23.35 28.1667 23.35 30C23.35 31.8333 24.8333 33.3333 26.6667 33.3333C28.5 33.3333 30 31.8333 30 30C30 28.1667 28.5 26.6667 26.6667 26.6667Z"/>
                </svg>
                Keranjang
            </a>
          @endif
        @else
        <a href="{{ route('register') }}" class="text-white text-sm hover:text-yellow-200">Daftar Sekarang</a>
        <a href="{{ route('login') }}" class="bg-[#E9A900] text-green-800 px-4 py-2 rounded-full text-sm font-semibold hover:bg-yellow-300">
          Masuk</a>
        @endauth
      </div>
    </div>

    {{ $slot ?? '' }}
    @yield('header-content')
  </div>
</header>
