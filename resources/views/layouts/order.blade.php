@extends('app')

@section('title', 'Pesanan')

@php
    $headerCompact = true;
@endphp

@section('content')

<section class="w-full max-w-7xl mx-auto bg-[#F5F5F5] rounded-2xl sm:rounded-3xl -mt-32 sm:-mt-40 md:-mt-50 relative z-20 p-4 sm:p-6 md:p-8 lg:p-10 lg:px-20 text-black">
    <div x-data="{ tab: 'all' }" class="mx-auto py-4 sm:py-6">

        <div class="overflow-x-auto scrollbar-hide mb-8 sm:mb-10">

            <div class="flex gap-6 sm:gap-8 md:gap-16 lg:gap-20 justify-start md:justify-center items-center min-w-max px-2">
                <button
                    @click="tab = 'all'"
                    :class="tab === 'all' ? 'border-b-2 border-[#2D5016] text-[#2E7D32]' : 'text-gray-500'"
                    class="text-sm md:text-lg font-medium pb-2 whitespace-nowrap transition-colors duration-300"
                >
                    Semua
                </button>
                <button
                    @click="tab = 'pending'"
                    :class="tab === 'pending' ? 'border-b-2 border-[#2D5016] text-[#2E7D32]' : 'text-gray-500'"
                    class="text-sm md:text-lg font-medium pb-2 whitespace-nowrap transition-colors duration-300"
                >
                    Menunggu Pembayaran
                </button>
                <button
                    @click="tab = 'processing'"
                    :class="tab === 'processing' ? 'border-b-2 border-[#2D5016] text-[#2E7D32]' : 'text-gray-500'"
                    class="text-sm md:text-lg font-medium pb-2 whitespace-nowrap transition-colors duration-300"
                >
                    Diproses
                </button>
                <button
                    @click="tab = 'shipped'"
                    :class="tab === 'shipped' ? 'border-b-2 border-[#2D5016] text-[#2E7D32]' : 'text-gray-500'"
                    class="text-sm md:text-lg font-medium pb-2 whitespace-nowrap transition-colors duration-300"
                >
                    Dikirim
                </button>
                <button
                    @click="tab = 'completed'"
                    :class="tab === 'completed' ? 'border-b-2 border-[#2D5016] text-[#2E7D32]' : 'text-gray-500'"
                    class="text-sm md:text-lg font-medium pb-2 whitespace-nowrap transition-colors duration-300"
                >
                    Selesai
                </button>
                <button
                    @click="tab = 'cancelled'"
                    :class="tab === 'cancelled' ? 'border-b-2 border-[#2D5016] text-[#2E7D32]' : 'text-gray-500'"
                    class="text-sm md:text-lg font-medium pb-2 whitespace-nowrap transition-colors duration-300"
                >
                    Dibatalkan
                </button>
            </div>

        </div>

        <div x-show="tab === 'all'">
            <livewire:user.order.all-order />
        </div>

        <div x-show="tab === 'pending'">
            <livewire:user.order.all-order status="pending" />
        </div>

        <div x-show="tab === 'processing'">
            <livewire:user.order.all-order status="processing" />
        </div>

        <div x-show="tab === 'shipped'">
            <livewire:user.order.all-order status="shipped" />
        </div>

        <div x-show="tab === 'completed'">
            <livewire:user.order.all-order status="completed" />
        </div>

        <div x-show="tab === 'cancelled'">
            <livewire:user.order.all-order status="cancelled" />
        </div>

        <livewire:user.reviews />

    </div>
</section>

<x-layouts.app.superiority/>

@endsection
