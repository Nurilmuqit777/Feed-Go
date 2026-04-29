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
                      // ['label' => 'Pesanan Saya', 'route' => 'user.orders'],
                      ['label' => 'Keluar', 'action' => 'logout'],
                  ]"
                  buttonClass="px-4 py-2 rounded-full text-sm bg-yellow-400 text-green-800 font-semibold flex items-center gap-2"
                  menuClass="absolute mt-2 w-48 bg-white rounded-xl shadow-lg overflow-hidden z-50"
                  itemClass="block px-4 py-2 text-green-800 text-sm font-semibold hover:bg-yellow-400"
                  svgClass="text-green-800"
                  :showGreeting="true"
              />
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
