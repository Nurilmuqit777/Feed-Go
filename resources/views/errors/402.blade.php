@extends('errors::minimal')

@section('title', __('Payment Required'))
@section('main')
    <div class="flex justify-center mb-6">
        <img src="{{ asset('images/402.webp') }}" alt="Unauthorized" class="w-48 md:w-56 h-auto">
    </div>

    <h1 class="text-3xl md:text-4xl font-bold text-[#2D5016]">
        402
    </h1>

    <h2 class="mt-3 text-2xl md:text-3xl font-bold text-[#2D5016]">
        Pembayaran Diperlukan
    </h2>

    <p class="mt-4 text-base md:text-lg text-gray-400">
        Pembayaran diperlukan untuk melanjutkan proses ini.
    </p>

    <a href="{{route('beranda')}}" class="mt-5 inline-flex items-center justify-center min-w-[130px] px-6 py-3 bg-[#2E7D32] hover:bg-[#256B29] hover:scale-105 active:scale-95 text-white text-sm font-semibold rounded-md transition duration-200">
        Lanjutkan Pembayaran
    </a>
@endsection
