@extends('app')

@section('title', $product->product_name)

@section('content')

@section('header-content')
<div class="max-w-6xl mx-auto px-6 py-6 items-center">

    <div class="grid md:grid-cols-2 gap-10 items-center">

        <div x-data="{ activeImage: '{{ asset('storage/'.$product->product_image1) }}' }" class="flex gap-4 items-stretch">

        <div class="flex flex-col gap-3">
            <img
                src="{{ asset('storage/'.$product->product_image1) }}"
                @click="activeImage = '{{ asset('storage/'.$product->product_image1) }}'"
                :class="activeImage === '{{ asset('storage/'.$product->product_image1) }}'
                        ? 'ring-2 ring-[#EAAA00]'
                        : ''"
                class="w-20 h-20 rounded-lg bg-white object-contain p-2 cursor-pointer"
            >

            @if($product->product_image2)
            <img
                src="{{ asset('storage/'.$product->product_image2) }}"
                @click="activeImage = '{{ asset('storage/'.$product->product_image2) }}'"
                :class="activeImage === '{{ asset('storage/'.$product->product_image2) }}'
                        ? 'ring-2 ring-[#EAAA00]'
                        : ''"
                class="w-20 h-20 rounded-lg bg-white object-contain p-2 cursor-pointer"
            >
            @endif

            @if($product->product_image3)
            <img
                src="{{ asset('storage/'.$product->product_image3) }}"
                @click="activeImage = '{{ asset('storage/'.$product->product_image3) }}'"
                :class="activeImage === '{{ asset('storage/'.$product->product_image3) }}'
                        ? 'ring-2 ring-[#EAAA00]'
                        : ''"
                class="w-20 h-20 rounded-lg bg-white object-contain p-2 cursor-pointer"
            >
            @endif

            @if($product->product_image4)
            <img
                src="{{ asset('storage/'.$product->product_image4) }}"
                @click="activeImage = '{{ asset('storage/'.$product->product_image4) }}'"
                :class="activeImage === '{{ asset('storage/'.$product->product_image4) }}'
                        ? 'ring-2 ring-[#EAAA00]'
                        : ''"
                class="w-20 h-20 rounded-lg bg-white object-contain p-2 cursor-pointer"
            >
            @endif
        </div>

            <div class="bg-white h-[355px] flex items-center justify-center rounded-xl relative p-6 px-10">
                <img :src="activeImage" class="max-h-full object-contain transition-all duration-300">
                    <div class="absolute bottom-3 left-3 text-xs font-semibold text-[#6B7280] px-3 py-1 rounded-full">
                        Berat: {{ $product->product_weight }}{{ $product->product_unit }}
                    </div>

                    <div class="absolute bottom-3 right-3 text-xs text-[#388E3C] font-semibold px-3 py-1 rounded-full">
                        &#9679; {{ $product->product_status === 'available' ? 'Tersedia' : 'Tidak tersedia' }} {{ $product->product_stock }}
                    </div>
            </div>
        </div>

        <div class="space-y-4">
            <h1 class="text-2xl md:text-3xl font-semibold text-white">
                {{ $product->product_name }} - <span class="text-[#EAAA00]"> {{ Str::title($product->category->category) }} </span>
            </h1>

            <div class="flex items-center gap-3">
                <span class="text-2xl font-bold text-[#CDCDCD]">
                    Rp {{ number_format($product->product_discount_price ?? $product->product_price, 0, ',', '.') }}
                </span>
                @if($product->product_discount_price)
                    <span class="line-through font-semibold text-[#2D5016B2] text-2xl">
                        Rp {{ number_format($product->product_price, 0, ',', '.') }}
                    </span>
                    <span class="bg-[#E81010] text-white text-xs px-3 py-1 rounded-full">
                        {{ $product->discountPercentage }} %
                    </span>
                @endif
            </div>

            <div class="flex items-center gap-2 text-sm text-white/80">
                <span class="text-yellow-400">★★★★★</span>
                <span class="text-[#2D5016]">4.5/5</span>
                <span class="text-[#2D5016]">| 5 customer Reviews</span>
            </div>

            <div class="flex items-center gap-4 pt-2">
                <div class="flex items-center overflow-hidden">
                    <button class="px-3 bg-white text-green-700 font-bold">−</button>
                    <span class="px-4 text-white font-medium">2</span>
                    <button class="px-3 bg-white text-green-700 font-bold">+</button>
                </div>
                <button
                    class="bg-[#EAAA00] hover:bg-yellow-500
                           text-white font-semibold
                           px-6 py-2 rounded-full transition">
                    Keranjang
                </button>
            </div>

        </div>
    </div>
</div>
@endsection
<div x-data="{ tab: 'description' }" class="max-w-6xl mx-auto px-6">

    <div class="border-b border-gray-200">
        <div class="flex justify-center gap-10">
            <button
                @click="tab = 'description'"
                class="px-12 py-4 font-semibold"
                :class="tab === 'description'
                    ? 'text-[#388E3C] border-b-2 border-black'
                    : 'text-gray-500'"
            >
                Deskripsi
            </button>

            <button
                @click="tab = 'review'"
                class="px-12 py-4 font-semibold"
                :class="tab === 'review'
                    ? 'text-[#388E3C] border-b-2 border-black'
                    : 'text-gray-500'"
            >
                Ulasan
            </button>
        </div>
    </div>

    <div x-show="tab === 'description'" x-transition class="py-8 [&_ul]:list-disc [&_ul]:pl-6 [&_ul]:ml-4 [&_ol]:list-decimal [&_ol]:pl-6 [&_li]:mb-1">
        <h1 class="text-xl font-bold text-[#2D5016] mb-4">Deskripsi Produk</h1>
        {!! $product->product_description ?? '<p class="text-gray-600">Tidak ada deskripsi untuk produk ini.</p>' !!}
    </div>

    <div x-show="tab === 'review'" x-transition class="py-8">
        Belum ada ulasan.
    </div>

</div>
@endsection
