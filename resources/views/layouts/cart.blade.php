@extends('app')

@section('title', 'Keranjang')

@section('content')

@section('header-content')
<div class="relative w-full h-[400px] overflow-hidden">

    <img
        src="{{ asset('images/Sawah.webp') }}"
        alt="image"
        class="absolute inset-0 w-full h-full object-cover blur-sm"
    >

    <div class="absolute inset-0 flex flex-col items-center justify-center gap-3 text-center px-4">

        <h1 class="text-3xl md:text-4xl font-semibold text-white text-shadow-lg drop-shadow-lg">
            Keranjang FeedGo
        </h1>

        <h2 class="text-white text-sm font-light">
            Keranjang Belanja FeedGo
        </h2>

    </div>

</div>
@endsection
<section class="max-w-6xl mx-auto bg-[#F5F5F5] rounded-3xl -mt-20 relative z-20 p-10 text-center">
    <h1 class="text-3xl text-[#2E7D32] font-bold mb-6">Pastikan jumlah dan produk sudah sesuai sebelum melanjutkan ke pembayaran</h1>

    <livewire:user.carts/>
</section>

@endsection
