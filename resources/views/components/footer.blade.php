<footer class="px-6 md:px-16 py-16 mt-16">

  <div class="grid grid-cols-1 md:grid-cols-4 gap-12 ">

    <div class="justify-center">
      <img  class="h-15 inline-block ml-15" src="{{ asset('images/FeedGo.webp') }}" alt="">
      <p class="text-sm text-gray-700 text-justify leading-relaxed tracking-tight hyphens-auto max-w-sm mb-6">
        Menjadi hub pakan inovatif berbasis riset dan teknologi yang terhubung dengan industri, guna mendorong
        kemajuan peternakan dan perikanan nasional yang berkelanjutan.
      </p>

    </div>

    <div class="ml-10">
      <h4 class="font-semibold mb-4 text-black">Navigasi</h4>
      <ul class="space-y-3 text-sm text-gray-700">
        <li><a href="{{ route('beranda') }}" class="hover:underline">Beranda</a></li>
        <li><a href="{{ route('produk') }}" class="hover:underline">Produk</a></li>
        <li><a href="{{ route('tentangkami') }}" class="hover:underline">Tentang kami</a></li>
        <li><a href="{{ route('artikel') }}" class="hover:underline">Blog</a></li>
      </ul>
    </div>

    <div class="ml-10">
      <h4 class="font-semibold mb-4 text-black">Informasi</h4>
      <ul class="space-y-3 text-sm text-gray-700">
        <li><a href="#" class="hover:underline">Produk Unggulan</a></li>
        <li><a href="#" class="hover:underline">Ulasan</a></li>
        <li><a href="{{ route('artikel') }}" class="hover:underline">Artikel</a></li>
        <li><a href="{{ route('contact') }}" class="hover:underline">Kontak & Lokasi</a></li>
      </ul>
    </div>

    <div class="ml-10">
      <h4 class="font-semibold mb-4 text-black">Akun</h4>
      <ul class="space-y-3 text-sm text-gray-700">
        <li><a href="{{ route('login') }}" class="hover:underline">Masuk</a></li>
        <li><a href="{{ route('register') }}" class="hover:underline">Daftar</a></li>
        <li><a href="{{ route('user.cart') }}" class="hover:underline">Keranjang</a></li>
        <li><a href="{{ route('user.orders') }}" class="hover:underline">Pesanan Saya</a></li>
      </ul>
    </div>
  </div>

  <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-6 mt-10">
    <div class="flex gap-3">
      <a href="#" class="w-9 h-9 bg-white rounded-full flex items-center justify-center shadow shadow-xl"><svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
          <path fill-rule="evenodd" d="M13.135 6H15V3h-1.865a4.147 4.147 0 0 0-4.142 4.142V9H7v3h2v9.938h3V12h2.021l.592-3H12V6.591A.6.6 0 0 1 12.592 6h.543Z" clip-rule="evenodd"/>
          </svg>
      </a>
      <a href="#" class="w-9 h-9 bg-white rounded-full flex items-center justify-center shadow shadow-xl"><svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
          <path d="M13.795 10.533 20.68 2h-3.073l-5.255 6.517L7.69 2H1l7.806 10.91L1.47 22h3.074l5.705-7.07L15.31 22H22l-8.205-11.467Zm-2.38 2.95L9.97 11.464 4.36 3.627h2.31l4.528 6.317 1.443 2.02 6.018 8.409h-2.31l-4.934-6.89Z"/>
          </svg>
      </a>
      <a href="#" class="w-9 h-9 bg-white rounded-full flex items-center justify-center shadow shadow-xl"><svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
          <path fill="currentColor" fill-rule="evenodd" d="M3 8a5 5 0 0 1 5-5h8a5 5 0 0 1 5 5v8a5 5 0 0 1-5 5H8a5 5 0 0 1-5-5V8Zm5-3a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V8a3 3 0 0 0-3-3H8Zm7.597 2.214a1 1 0 0 1 1-1h.01a1 1 0 1 1 0 2h-.01a1 1 0 0 1-1-1ZM12 9a3 3 0 1 0 0 6 3 3 0 0 0 0-6Zm-5 3a5 5 0 1 1 10 0 5 5 0 0 1-10 0Z" clip-rule="evenodd"/>
          </svg>
      </a>
    </div>

  </div>

  <div class="border-t border-gray-300 my-10"></div>

  <div class="flex flex-col md:flex-row justify-between items-center text-sm text-gray-700 gap-4">
    <p>©2026 FeedGo. All rights reserved</p>
    <div class="flex gap-6">
      <a href="{{ route('privacy.policy') }}" class="hover:underline">Kebijakan Privasi</a>
      <a href="{{ route('terms.conditions') }}" class="hover:underline">Syarat & Ketentuan</a>
    </div>
  </div>
</footer>
