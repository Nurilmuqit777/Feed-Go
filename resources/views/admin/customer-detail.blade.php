@section('title', 'Data Pelanggan')

<x-layouts.app :title="__('data Pelanggan')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">

        <div>
            <h1 class="font-semibold text-3xl">Detail Pelanggan FeedGo</h1>
            <span class="font-light">Kelola informasi akun dan riwayat aktivitas pelanggan FeedGo</span>
            <p class="text-[#20222480] dark:text-white text-sm"><span class="text-[#EAAA00]">Pelanggan</span> / Detail pelanggan </p>
        </div>

        <livewire:admin.customer.customer-detail :id="$id"/>

    </div>
</x-layouts.app>
