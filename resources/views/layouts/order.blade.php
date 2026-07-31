@extends('app')

@section('title', 'Pesanan')

@php
    $headerCompact = true;
@endphp

@section('content')

<section class="max-w-7xl mx-auto bg-[#F5F5F5] rounded-3xl -mt-50 relative z-20 p-10 px-20 text-black">
    <div x-data="{ tab: 'all' }" class="mx-auto px-6 py-6 items-center overflow-x-auto">

        <div class="flex gap-8 md:gap-20 justify-start md:justify-center items-center mb-10 min-w-max">
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
                @click="tab = 'returned'"
                :class="tab === 'returned' ? 'border-b-2 border-[#2D5016] text-[#2E7D32]' : 'text-gray-500'"
                class="text-sm md:text-lg font-medium pb-2 whitespace-nowrap transition-colors duration-300"
            >
                Pengembalian
            </button>
        </div>

        <div x-show="tab === 'all'">
            <livewire:user.order.all-order />
        </div>

        <div x-show="tab === 'pending'">
            <livewire:user.order.waiting-payment />
        </div>

        <div x-show="tab === 'processing'">
            <livewire:user.order.processing-order />
        </div>

        <div x-show="tab === 'shipped'">
            <livewire:user.order.shipped-order />
        </div>

        <div x-show="tab === 'completed'">
            <livewire:user.order.completed-order />
        </div>

        <div x-show="tab === 'returned'">
            <livewire:user.order.returned-order />
        </div>



    </div>
</section>

@endsection
