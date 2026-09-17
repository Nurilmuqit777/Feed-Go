@section('title', 'Produk')

<x-layouts.app :title="__('Produk')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div>
            <h1 class="font-semibold text-3xl">Produk FeedGo</h1>
            <span class="font-light">Kelola seluruh produk pakan FeedGo</span>
        </div>
        <div class="relative flex flex-col rounded-xl border border-neutral-200 dark:border-neutral-700">

            <livewire:admin.products.products />
            <livewire:admin.products.edit-product />
            <livewire:admin.products.delete-product />
            <livewire:admin.products.add-product-category />
            <livewire:admin.products.add-product />

        </div>
    </div>
<script>
document.addEventListener('trix-change', function (event) {
    Livewire.dispatch('trix-updated-product_description', event.target.value)
})
</script>
</x-layouts.app>
