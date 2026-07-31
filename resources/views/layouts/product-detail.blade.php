@extends('app')

@section('title', $product->product_name)

@section('content')

@section('header-content')
<div class="max-w-6xl mx-auto px-6 py-6 items-center">

    <livewire:user.products.product-detail :product="$product" />

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
