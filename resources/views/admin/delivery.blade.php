@section('title', 'Pengiriman')

<x-layouts.app :title="__('Pengiriman')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">

        <div>
            <h1 class="font-semibold text-3xl">Pengiriman FeedGo</h1>
            <span class="font-light">Kelola status pengiriman pesanan pelanggan</span>
        </div>

        <div class="bg-white dark:bg-neutral-800 rounded-xl border border-neutral-200 dark:border-neutral-700 p-6">
            <livewire:admin.orders.order-shipping />
        </div>

    </div>
</x-layouts.app>
