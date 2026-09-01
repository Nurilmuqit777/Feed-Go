@section('title', 'Pesanan')

<x-layouts.app :title="__('Pesanan')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">

        <div>
            <h1 class="font-semibold text-3xl">Pesanan FeedGo</h1>
            <span class="font-light">Kelola seluruh pesanan pakan FeedGo</span>
        </div>

        <div class="bg-white dark:bg-neutral-800 rounded-xl border border-neutral-200 dark:border-neutral-700 p-6">
            <livewire:admin.orders.order-table />
        </div>

    </div>
</x-layouts.app>
