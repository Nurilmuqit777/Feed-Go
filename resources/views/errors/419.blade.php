@extends('errors::minimal')

@section('title', __('Page Expired'))
@section('main')
    <div class="flex justify-center mb-6">
        <img src="{{ asset('images/419.webp') }}" alt="Not Found" class="w-48 md:w-56 h-auto">
    </div>

    <h1 class="text-3xl md:text-4xl font-bold text-[#2D5016]">
        419
    </h1>

    <h2 class="mt-3 text-2xl md:text-3xl font-bold text-[#2D5016]">
        Halaman Telah Kedaluwarsa
    </h2>

    <p class="mt-4 text-base md:text-lg text-gray-400">
        Halaman ini telah kedaluwarsa. Silakan muat ulang halaman atau coba kembali.
    </p>

    <button onclick="window.location.reload()" class="mt-5 inline-flex items-center justify-center min-w-[130px] px-6 py-3 bg-[#2E7D32] hover:bg-[#256B29] hover:scale-105 active:scale-95 text-white text-sm font-semibold rounded-md transition duration-200">
        Coba Lagi
    </button>
@endsection
