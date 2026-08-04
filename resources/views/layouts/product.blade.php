@extends('app')

@section('title', 'Product')

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
            Produk Pakan FeedGo
        </h1>

        <h2 class="text-white text-sm font-light">
          Solusi Pakan Berbasis Riset untuk Produktivitas Ternak
        </h2>

    </div>

</div>
@endsection

{{-- produk --}}
<section id="products-section" class="max-w-6xl mx-auto bg-[#F5F5F5] rounded-3xl -mt-20 relative z-20 p-10 text-center">
  <livewire:user.products.product-list />
</section>

{{-- keunggulan --}}
<x-layouts.app.superiority/>

@endsection
