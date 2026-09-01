@extends('errors::minimal')

@section('title', __('Server Error'))
@section('main')
    <div class="flex justify-center mb-6">
        <img src="{{ asset('images/500.webp') }}" alt="Server Error" class="w-48 md:w-56 h-auto">
    </div>

    <h1 class="text-3xl md:text-4xl font-bold text-[#2D5016]">
        500
    </h1>

    <h2 class="mt-3 text-2xl md:text-3xl font-bold text-[#2D5016]">
        Terjadi Kesalahan
    </h2>

    <p class="mt-4 text-base md:text-lg text-gray-400">
        Terjadi kesalahan pada server. Silakan coba lagi beberapa saat kemudian.
    </p>

    <button onclick="window.location.reload()" class="mt-5 inline-flex items-center justify-center min-w-[130px] px-6 py-3 bg-[#2E7D32] hover:bg-[#256B29] hover:scale-105 active:scale-95 text-white text-sm font-semibold rounded-md transition duration-200">
        Coba Lagi
    </button>
@endsection
