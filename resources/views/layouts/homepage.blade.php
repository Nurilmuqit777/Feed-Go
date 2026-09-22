@extends('app')

@section('title', 'Beranda')

@section('content')

@section('header-content')
<div class="px-4 sm:px-6">
    {{-- search bar --}}
    <div class="flex justify-center mb-6">

        <div class="relative w-full max-w-md">
            <livewire:user.product-search />
        </div>

    </div>

    {{-- main content --}}
    <div class="grid md:grid-cols-2 gap-6 md:gap-8 items-center font-[Inter]">

      <div class="px-2 text-white sm:px-4 md:px-8 lg:px-16">

        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold leading-snug mb-4">
          Inovasi <span class="text-yellow-400">Pakan Ternak</span> Berbasis Riset
          untuk Masa Depan Agrikultur Indonesia
        </h1>

        <p class="text-green-100 mb-6 max-w-lg sm:text-base text-sm">
          Pakan efisien, ramah lingkungan, dan terjangkau—dikembangkan melalui riset
          Universitas Hasanuddin bersama sektor industri.
        </p>

        <a href="{{ route('produk') }}" class="inline-flex items-center gap-2 bg-[#EAAA00] text-white px-5 py-2.5 rounded-full text-sm font-semibold mb-6 hover:bg-[#D68A2D] transition duration-300 shadow-md hover:shadow-lg hover:scale-105 sm:px-6 sm:py-3 sm:text-base">
          <svg class="h-6 w-6 sm:h-7 sm:w-7" xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 34 34" fill="none">
          <path d="M10 26.6667C8.16667 26.6667 6.68333 28.1667 6.68333 30C6.68333 31.8333 8.16667 33.3333 10 33.3333C11.8333 33.3333 13.3333 31.8333 13.3333 30C13.3333 28.1667 11.8333 26.6667 10 26.6667ZM0 0V3.33333H3.33333L9.33333 15.9833L7.08333 20.0667C6.81667 20.5333 6.66667 21.0833 6.66667 21.6667C6.66667 23.5 8.16667 25 10 25H30V21.6667H10.7C10.4667 21.6667 10.2833 21.4833 10.2833 21.25L10.3333 21.05L11.8333 18.3333H24.25C25.5 18.3333 26.6 17.65 27.1667 16.6167L33.1333 5.8C33.2667 5.56667 33.3333 5.28333 33.3333 5C33.3333 4.08333 32.5833 3.33333 31.6667 3.33333H7.01667L5.45 0H0ZM26.6667 26.6667C24.8333 26.6667 23.35 28.1667 23.35 30C23.35 31.8333 24.8333 33.3333 26.6667 33.3333C28.5 33.3333 30 31.8333 30 30C30 28.1667 28.5 26.6667 26.6667 26.6667Z" fill="white"/>
          </svg>
          Pesan Sekarang
        </a>

        <ul class="space-y-2 text-sm text-white font-bold sm:text-base">
          <li>• Berbasis riset universitas</li>
          <li>• Ramah lingkungan</li>
          <li>• Efisien & terjangkau</li>
        </ul>

      </div>

      <div class="relative flex justify-center md:justify-end">
        <img src="{{ asset('images/Pakan.png') }}" alt="Pakan Ternak" class="w-full max-w-[420px] object-contain sm:max-w-[500px] md:max-w-none" />
      </div>
    </div>
@endsection

    {{-- Why FeedGo --}}
    <section class="relative flex flex-col items-center justify-center py-14 sm:py-18 lg:py-20 overflow-hidden">

        <div class="absolute inset-0 flex items-center justify-center">
          <div class="h-[350px] w-[650px] rounded-full bg-radial from-[#1D6220] from-30% to-[#F5F5F5] opacity-80 blur-3xl sm:h-[450px] sm:w-[850px] lg:h-[500px] lg:w-[1000px]">
          </div>
        </div>

        <div class="relative z-10 text-center mb-10 sm:mb-12 px-4">
          <span class="inline-block bg-[#6C9D50] text-white text-sm px-5 sm:px-7 py-1 rounded-full mb-3">
            Nilai Kami
          </span>
          <h2 class="text-3xl sm:text-4xl font-bold text-[#388E3C]">
            Mengapa FeedGo?
          </h2>
        </div>

        <div class="relative z-10 flex w-full flex-col items-center gap-4 px-5 sm:hidden">

            <img src="{{ asset('images/FeedGo.webp') }}" alt="Logo FeedGo" class="mb-4 h-28"/>

            <div class="flex h-36 w-36 items-center justify-center rounded-full bg-gradient-to-b from-[#388E3C] to-[#EAAA00] text-lg font-semibold text-white shadow-xl">
                Riset
            </div>

            <div class="flex h-36 w-36 items-center justify-center rounded-full bg-gradient-to-r from-[#388E3C] to-[#EAAA00] text-lg font-semibold text-white shadow-xl">
                Lokal
            </div>

            <div class="flex h-36 w-36 items-center justify-center rounded-full bg-gradient-to-l from-[#388E3C] to-[#EAAA00] text-lg font-semibold text-white shadow-xl">
                Efisien
            </div>

            <div class="flex h-36 w-36 items-center justify-center rounded-full bg-gradient-to-tr from-[#388E3C] to-[#EAAA00] text-lg font-semibold text-white shadow-xl">
                Produktif
            </div>

            <div class="flex h-36 w-36 items-center justify-center rounded-full bg-gradient-to-tl from-[#388E3C] to-[#EAAA00] px-3 text-center text-lg font-semibold text-white shadow-xl">
                Berkelanjutan
            </div>

        </div>

        <div class="relative z-10 hidden h-[700px] w-full max-w-[1040px] sm:block lg:h-[820px]">

            <div class="absolute inset-0 flex items-center justify-center">
                <img src="{{ asset('images/FeedGo.webp') }}" alt="Logo FeedGo" class="h-32 md:h-40 lg:h-48" />
            </div>

            <div class="absolute left-1/2 top-0 -translate-x-1/2">
                <div class="flex h-40 w-40 items-center justify-center rounded-full bg-gradient-to-b from-[#388E3C] to-[#EAAA00] font-semibold text-white shadow-xl md:h-52 md:w-52 lg:h-60 lg:w-60">
                    Riset
                </div>
            </div>

            <div class="absolute left-0 top-1/2 -translate-y-1/2">
                <div class="flex h-40 w-40 items-center justify-center rounded-full bg-gradient-to-r from-[#388E3C] to-[#EAAA00] font-semibold text-white shadow-xl md:h-52 md:w-52 lg:h-60 lg:w-60">
                    Lokal
                </div>
            </div>

            <div class="absolute right-0 top-1/2 -translate-y-1/2">
                <div class="flex h-40 w-40 items-center justify-center rounded-full bg-gradient-to-l from-[#388E3C] to-[#EAAA00] font-semibold text-white shadow-xl md:h-52 md:w-52 lg:h-60 lg:w-60">
                    Efisien
                </div>
            </div>

            <div class="absolute bottom-0 left-[18%]">
                <div class="flex h-40 w-40 items-center justify-center rounded-full bg-gradient-to-tr from-[#388E3C] to-[#EAAA00] font-semibold text-white shadow-xl md:h-52 md:w-52 lg:h-60 lg:w-60">
                    Produktif
                </div>
            </div>

            <div class="absolute bottom-0 right-[18%]">
                <div class="flex h-40 w-40 items-center justify-center rounded-full bg-gradient-to-tl from-[#388E3C] to-[#EAAA00] px-2 text-center font-semibold text-white shadow-xl md:h-52 md:w-52 lg:h-60 lg:w-60">
                    Berkelanjutan
                </div>
            </div>

        </div>

    </section>

    <section class="relative overflow-visible py-12 sm:py-16">

        <img src="{{ asset('images/Daun.webp') }}" class="pointer-events-none absolute right-0 top-0 w-24 sm:w-32 lg:w-50" alt=""/>

        <img src="{{ asset('images/Daun2.webp') }}" class="pointer-events-none absolute bottom-0 left-0 w-24 sm:w-32 lg:w-40" alt=""/>

        <div class="relative z-10 mb-10 px-4 text-center">

            <h2 class="mb-4 text-3xl font-bold text-green-700 sm:text-4xl">
                Produk
            </h2>

            <span class="inline-block rounded-full bg-[#92BD79] px-5 py-2 text-sm font-semibold text-white sm:px-6">
                Pakan Udang
            </span>

        </div>

        <div class="relative z-10 mx-auto grid max-w-5xl grid-cols-1 gap-12 px-5 md:grid-cols-2 md:gap-10 lg:gap-24">

            <div class="flex justify-center">

                <div class="relative w-full max-w-[320px] pt-[150px] sm:max-w-[350px]">

                    <img src="{{ asset('images/Produk1.png') }}" alt="Pakan Udang FeedGo" class="absolute left-1/2 top-0 z-20 w-[280px] -translate-x-1/2 object-contain drop-shadow-[0_25px_30px_rgba(0,0,0,0.3)] transition-transform duration-300 hover:scale-105 sm:w-[340px]"/>

                    <div class="relative h-52 w-full overflow-hidden rounded-3xl bg-gradient-to-b from-[#BBDFA6] to-[#6C9D50] shadow-xl sm:h-60"></div>

                </div>

            </div>

            <div class="flex justify-center">

                <div class="relative w-full max-w-[320px] pt-[150px] sm:max-w-[350px]">

                    <img src="{{ asset('images/Produk2.png') }}" alt="Pakan Udang FeedGo" class="absolute left-1/2 top-5 z-20 w-[280px] -translate-x-1/2 object-contain drop-shadow-[0_25px_30px_rgba(0,0,0,0.3)] transition-transform duration-300 hover:scale-105 sm:w-[340px]"/>

                    <div class="relative h-52 w-full overflow-hidden rounded-3xl bg-gradient-to-b from-[#BBDFA6] to-[#6C9D50] shadow-xl sm:h-60"></div>

                </div>

            </div>

        </div>

        <div class="relative z-10 mt-12 mb-10 flex flex-wrap justify-center gap-3 px-4 sm:gap-5">

            <span class="cursor-pointer rounded-full bg-[#E3B600] px-6 py-2.5 text-sm font-semibold text-white shadow-md transition-all duration-300 hover:scale-105 hover:shadow-lg sm:px-8 sm:py-3">
                Nutrisi
            </span>

            <span class="cursor-pointer rounded-full bg-[#D68A2D] px-6 py-2.5 text-sm font-semibold text-white shadow-md transition-all duration-300 hover:scale-105 hover:shadow-lg sm:px-8 sm:py-3">
                Efisiensi
            </span>

            <span class="cursor-pointer rounded-full bg-[#5AB1C5] px-6 py-2.5 text-sm font-semibold text-white shadow-md transition-all duration-300 hover:scale-105 hover:shadow-lg sm:px-8 sm:py-3">
                Pertumbuhan
            </span>

        </div>

    </section>

    <section class="relative overflow-hidden bg-gradient-to-b from-[#1B601E] to-[#6C9D50] py-24 sm:py-32 lg:py-40">

        <div class="container mx-auto px-5 text-center">

            <h1 class="mb-5 text-3xl font-bold text-yellow-400 sm:text-4xl md:text-5xl lg:text-6xl">
                "Pakan Inovatif, Hasil Produktif."
            </h1>

            <p class="text-base font-light text-white/80 sm:text-lg md:text-xl lg:text-2xl">
                Dikembangkan melalui riset nutrisi terukur
            </p>

        </div>

    </section>

    <section class="relative -mt-12 pb-16 sm:-mt-16 sm:pb-20 lg:-mt-20 lg:pb-24">

        <div class="container mx-auto px-4">

            <div class="mx-auto max-w-4xl rounded-3xl bg-white p-6 shadow-2xl sm:p-10 md:p-12 lg:p-16">

                <h2 class="mb-4 text-center text-2xl font-bold text-[#388E3C] sm:text-3xl">
                    Update Riset & Inovasi FeedGo
                </h2>

                <p class="mb-8 text-center text-base text-[#0B460E] sm:mb-10 sm:text-lg">
                    Dapatkan informasi terbaru seputar pengembangan pakan ternak berbasis riset dan teknologi.
                </p>


                <form class="mx-auto max-w-2xl">

                    <div class="flex flex-col gap-2 rounded-2xl border-2 border-gray-200 p-1 transition focus-within:border-green-500 sm:flex-row sm:items-center sm:rounded-full sm:p-1">

                        <input
                            type="email"
                            placeholder="Email"
                            class="min-w-0 flex-1 rounded-xl bg-transparent px-4 py-3 text-gray-700 outline-none placeholder:text-gray-400 sm:rounded-full"
                            required
                        />

                        <button
                            type="submit"
                            class="w-full rounded-xl bg-[#1B601E] px-6 py-3 text-sm font-semibold text-white shadow-md transition duration-300 hover:bg-green-600 sm:w-auto sm:rounded-full">
                            Ikuti FeedGo
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </section>
@endsection
</div>
