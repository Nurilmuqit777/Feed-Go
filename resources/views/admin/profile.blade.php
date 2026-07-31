@section('title', 'Profil')

<x-layouts.app :title="__('Profil')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div>
            <h1 class="font-semibold text-3xl">Profil</h1>
            <span class="font-light">Kelola informasi profil Pelanggan</span>
        </div>
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <div class="justify-center flex relative overflow-hidden rounded-xl p-5 border border-neutral-200 dark:border-neutral-700">
                {{-- <livewire:admin.message.nav-table /> --}}
            </div>
            <div class="relative flex justify-center overflow-hidden rounded-xl border col-span-2 border-neutral-200 dark:border-neutral-700">

            </div>
        </div>
    </div>
</x-layouts.app>
