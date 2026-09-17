@section('title', 'pengiriman pesanan ')

<x-layouts.app :title="__('Pengiriman Pesanan')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">

        <div>
            <h1 class="font-semibold text-3xl">Detail Pengiriman FeedGo</h1>
            <span class="font-light">Kelola status pengiriman pesanan pelanggan</span>
            <p class="text-[#20222480] dark:text-white text-sm"><span class="text-[#EAAA00]">Pengiriman</span> / Detail pengiriman </p>
        </div>

        <livewire:admin.orders.order-shipping-detail :invoice-number="$invoice_number"/>
        <livewire:admin.orders.change-shipping-status/>

    </div>
</x-layouts.app>
