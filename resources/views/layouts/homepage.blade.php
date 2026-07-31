@extends('app')

@section('title', 'Beranda')

@section('content')

@section('header-content')
{{-- search bar --}}
<div class="flex justify-center mb-6">

    <div class="relative w-full max-w-md">
        <livewire:user.product-search />
    </div>

</div>

{{-- main content --}}
<div class="grid md:grid-cols-2 gap-5 items-center font-[Inter]">

  <div class="text-white px-4 md:px-20">
    <h1 class="text-3xl md:text-4xl font-bold leading-snug mb-4">
      Inovasi <span class="text-yellow-400">Pakan Ternak</span> Berbasis Riset
      untuk Masa Depan Agrikultur Indonesia
    </h1>
    <p class="text-green-100 mb-6 max-w-lg">
      Pakan efisien, ramah lingkungan, dan terjangkau—dikembangkan melalui riset
      Universitas Hasanuddin bersama sektor industri.
    </p>
    <a href="{{ route('produk') }}" class="inline-flex items-center gap-2 bg-[#EAAA00] text-white px-6 py-3 rounded-full font-semibold mb-6 hover:bg-[#D68A2D] transition duration-300 shadow-md hover:shadow-lg hover:scale-105">
      <svg class="" xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 34 34" fill="none">
      <path d="M10 26.6667C8.16667 26.6667 6.68333 28.1667 6.68333 30C6.68333 31.8333 8.16667 33.3333 10 33.3333C11.8333 33.3333 13.3333 31.8333 13.3333 30C13.3333 28.1667 11.8333 26.6667 10 26.6667ZM0 0V3.33333H3.33333L9.33333 15.9833L7.08333 20.0667C6.81667 20.5333 6.66667 21.0833 6.66667 21.6667C6.66667 23.5 8.16667 25 10 25H30V21.6667H10.7C10.4667 21.6667 10.2833 21.4833 10.2833 21.25L10.3333 21.05L11.8333 18.3333H24.25C25.5 18.3333 26.6 17.65 27.1667 16.6167L33.1333 5.8C33.2667 5.56667 33.3333 5.28333 33.3333 5C33.3333 4.08333 32.5833 3.33333 31.6667 3.33333H7.01667L5.45 0H0ZM26.6667 26.6667C24.8333 26.6667 23.35 28.1667 23.35 30C23.35 31.8333 24.8333 33.3333 26.6667 33.3333C28.5 33.3333 30 31.8333 30 30C30 28.1667 28.5 26.6667 26.6667 26.6667Z" fill="white"/>
      </svg>
      Pesan Sekarang
    </a>
    <ul class="space-y-2 text-sm text-white font-bold">
      <li>• Berbasis riset universitas</li>
      <li>• Ramah lingkungan</li>
      <li>• Efisien & terjangkau</li>
    </ul>
  </div>
  <div class="relative">
    <img
      src="{{ asset('images/Pakan.png') }}"
      alt="Pakan Ternak"
      class="w-full h-full"
    />
  </div>
</div>
@endsection

{{-- Why FeedGo --}}
<section class="relative flex flex-col items-center justify-center py-18 overflow-hidden">

  <div class="absolute inset-0 flex items-center justify-center">
    <div
      class="w-[1000px] h-[500px] rounded-full
             bg-radial from-[#1D6220] from-30% to-[#F5F5F5]
             blur-3xl opacity-80">
    </div>
  </div>

  <div class="relative z-10 text-center mb-12">
    <span class="inline-block bg-[#6C9D50] text-white text-md px-7 py-1 rounded-full mb-3">
      Nilai Kami
    </span>
    <h2 class="text-4xl font-bold text-[#388E3C]">
      Mengapa FeedGo?
    </h2>
  </div>

  <div class="relative z-10 w-[1040px] h-[820px]">

    <div class="absolute inset-0 flex items-center justify-center">
      <img src="{{ asset('images/FeedGo.webp') }}" alt="Logo FeedGo" class="h-48" />
    </div>

    <div class="absolute top-0 left-1/2 -translate-x-1/2">
      <div
        class="w-[240px] h-[240px] rounded-full
               bg-gradient-to-b from-[#388E3C] to-[#EAAA00]
               flex items-center justify-center
               text-white font-semibold shadow-xl">
        Riset
      </div>
    </div>

    <div class="absolute left-0 top-1/2 -translate-y-1/2">
      <div
        class="w-[240px] h-[240px] rounded-full
               bg-gradient-to-r from-[#388E3C] to-[#EAAA00]
               flex items-center justify-center
               text-white font-semibold shadow-xl">
        Lokal
      </div>
    </div>

    <div class="absolute right-0 top-1/2 -translate-y-1/2">
      <div
        class="w-[240px] h-[240px] rounded-full
               bg-gradient-to-l from-[#388E3C] to-[#EAAA00]
               flex items-center justify-center
               text-white font-semibold shadow-xl">
        Efisien
      </div>
    </div>

    <div class="absolute bottom-0 left-[18%]">
      <div
        class="w-[240px] h-[240px] rounded-full
               bg-gradient-to-tr from-[#388E3C] to-[#EAAA00]
               flex items-center justify-center
               text-white font-semibold shadow-xl">
        Produktif
      </div>
    </div>

    <div class="absolute bottom-0 right-[18%]">
      <div
        class="w-[240px] h-[240px] rounded-full
               bg-gradient-to-tl from-[#388E3C] to-[#EAAA00]
               flex items-center justify-center
               text-white font-semibold shadow-xl text-center px-2">
        Berkelanjutan
      </div>
    </div>

  </div>

</section>

{{-- Product --}}
<section class="relative py-12 overflow-visible">

  <img src="{{ asset('images/Daun.webp') }}"
       class="absolute top-0 right-0 w-50 pointer-events-none" />
  <img src="{{ asset('images/Daun2.webp') }}"
       class="absolute -bottom-1 left-0 w-40 pointer-events-none" />

  <div class="text-center mb-8">
    <h2 class="text-4xl font-bold text-green-700 mb-4">
      Produk
    </h2>

    <span class="inline-block bg-[#92BD79] text-white
                 px-6 py-2 rounded-full font-semibold text-sm">
      Pakan Udang
    </span>
  </div>

  <div class="flex justify-center gap-32">

    <div class="flex flex-col items-center">
      <div class="relative pt-[180px]">

        <img
          src="{{ asset('images/Produk1.png') }}"
          alt="Pakan Udang FeedGo"
          class="absolute top-5 left-1/2 -translate-x-1/2
                 w-[380px] object-contain z-20
                 drop-shadow-[0_35px_40px_rgba(0,0,0,0.3)]
                 hover:scale-105 transition-transform duration-300"
        />

        <div
          class="relative bg-gradient-to-b from-[#BBDFA6] to-[#6C9D50]
                 rounded-3xl w-80 h-62
                 shadow-xl overflow-hidden">
        </div>

      </div>
    </div>

    <div class="flex flex-col items-center">
      <div class="relative pt-[180px]">

        <img
          src="{{ asset('images/Produk2.png') }}"
          alt="Pakan Udang FeedGo"
          class="absolute top-14 left-1/2 -translate-x-1/2
                 w-[380px] object-contain z-20
                 drop-shadow-[0_35px_40px_rgba(0,0,0,0.3)]
                 hover:scale-105 transition-transform duration-300"
        />

        <div
          class="relative bg-gradient-to-b from-[#BBDFA6] to-[#6C9D50]
                 rounded-3xl w-80 h-62
                 shadow-xl overflow-hidden">
        </div>

      </div>
    </div>

  </div>

  <div class="flex justify-center gap-6 mt-20 mb-10">

    <span class="px-8 py-3 rounded-full text-white font-semibold
                 bg-[#E3B600] shadow-md hover:shadow-lg
                 hover:scale-105 transition-all duration-300 cursor-pointer">
      Nutrisi
    </span>

    <span class="px-8 py-3 rounded-full text-white font-semibold
                 bg-[#D68A2D] shadow-md hover:shadow-lg
                 hover:scale-105 transition-all duration-300 cursor-pointer">
      Efisiensi
    </span>

    <span class="px-8 py-3 rounded-full text-white font-semibold
                 bg-[#5AB1C5] shadow-md hover:shadow-lg
                 hover:scale-105 transition-all duration-300 cursor-pointer">
      Pertumbuhan
    </span>

  </div>

</section>

<section class="relative bg-gradient-to-b from-[#1B601E] to-[#6C9D50] py-40 overflow-hidden">

        <div class="container mx-auto px-4 text-center">
            <h1 class="text-5xl md:text-6xl font-bold text-yellow-400 mb-6">
                "Pakan Inovatif, Hasil Produktif."
            </h1>
            <p class="text-xl md:text-2xl text-white/80 font-light">
                Dikembangkan melalui riset nutrisi terukur
            </p>
        </div>
</section>

<section class="relative -mt-20 pb-24">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto bg-white rounded-3xl shadow-2xl p-12 md:p-16">

            <h2 class="text-2xl md:text-3xl font-bold text-[#388E3C] text-center mb-4">
                Update Riset & Inovasi FeedGo
            </h2>

            <p class="text-center text-[#0B460E] text-lg mb-10">
                Dapatkan informasi terbaru seputar pengembangan pakan ternak berbasis riset dan teknologi.
            </p>

            <form class="max-w-2xl mx-auto">
              <div
                  class="flex items-center border-2 border-gray-200 rounded-full
                         focus-within:border-green-500 transition"
              >

                  <input
                      type="email"
                      placeholder="Email"
                      class="flex-1 pl-4 py-3 bg-transparent
                             focus:outline-none text-gray-700
                             placeholder:text-gray-400"
                      required
                  />

                  <button
                      type="submit"
                      class="bg-[#1B601E] hover:bg-green-600 text-white font-semibold
                             px-6 py-3 rounded-full transition duration-300
                             shadow-md whitespace-nowrap">
                      Ikuti FeedGo
                  </button>

              </div>
            </form>
        </div>
    </div>
</section>
@endsection
