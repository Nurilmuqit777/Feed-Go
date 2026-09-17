<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="overflow-hidden h-screen bg-white dark:bg-zinc-800 font-[Poppins]">
        <style>
            [x-cloak] { display: none !important; }
        </style>
        <div class="flex h-full w-full">

        @if (auth()->user()->role === 'admin' || auth()->user()->role === 'superadmin')
            <flux:sidebar stashable class="lg:relative lg:translate-x-0 sticky top-0 h-screen w-64 shrink-0 border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
                <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

                <a href="{{ route('admin.dashboard') }}" class=" flex items-center justify-center" wire:navigate>
                    <img src="{{ asset('images/FeedGo.webp') }}" alt="" class="h-18">
                </a>

                <flux:navlist variant="outline">
                    <flux:navlist.group class="grid">
                        <flux:navlist.item
                            class="flux-box {{ request()->routeIs('admin.dashboard') ? 'is-current' : '' }}"
                            href="{{ route('admin.dashboard') }}"
                            wire:navigate
                        >
                            <x-slot:icon>
                                <x-svg.dashboard-icon class="w-5 h-5" />
                            </x-slot:icon>

                            {{ __('Dashboard') }}

                        </flux:navlist.item>

                        <flux:navlist.item
                            class="flux-box {{ request()->routeIs('admin.product') ? 'is-current' : '' }}"
                            href="{{ route('admin.product') }}"
                            wire:navigate
                        >
                            <x-slot:icon>
                                <x-svg.product-icon class="w-5 h-5" />
                            </x-slot:icon>

                            {{ __('Produk') }}
                        </flux:navlist.item>

                        <flux:navlist.item
                            class="flux-box {{ request()->routeIs('admin.order') ? 'is-current' : '' }}"
                            href="{{ route('admin.order') }}"
                            wire:navigate
                        >
                            <x-slot:icon>
                                <x-svg.order-icon class="w-5 h-5" />
                            </x-slot:icon>

                            {{ __('Pesanan') }}
                        </flux:navlist.item>

                        <flux:navlist.item
                            class="flux-box {{ request()->routeIs('admin.delivery') ? 'is-current' : '' }}"
                            href="{{ route('admin.delivery') }}"
                            wire:navigate
                        >
                            <x-slot:icon>
                                <x-svg.delivery-icon class="w-5 h-5" />
                            </x-slot:icon>

                            {{ __('Pengiriman') }}
                        </flux:navlist.item>

                        <flux:navlist.item
                            class="flux-box {{ request()->routeIs('admin.userprofile') ? 'is-current' : '' }}"
                            href="{{ route('admin.userprofile') }}"
                            wire:navigate
                        >
                            <x-slot:icon>
                                <x-svg.user-icon class="w-5 h-5" />
                            </x-slot:icon>

                            {{ __('Data Pelanggan') }}
                        </flux:navlist.item>

                        <flux:navlist.item
                            class="flux-box {{ request()->routeIs('admin.report') ? 'is-current' : '' }}"
                            href="{{ route('admin.report') }}"
                            wire:navigate
                        >
                            <x-slot:icon>
                                <x-svg.report-icon class="w-5 h-5" />
                            </x-slot:icon>

                            {{ __('Laporan') }}
                        </flux:navlist.item>

                        <flux:navlist.item
                            class="flux-box {{ request()->routeIs('admin.article') ? 'is-current' : '' }}"
                            href="{{ route('admin.article') }}"
                            wire:navigate
                        >
                            <x-slot:icon>
                                <x-svg.article-icon class="w-5 h-5" />
                            </x-slot:icon>

                            {{ __('Artikel') }}
                        </flux:navlist.item>
                    </flux:navlist.group>
                </flux:navlist>

                <flux:spacer />

                <!-- Desktop User Menu -->
                <flux:dropdown class="hidden lg:block" position="bottom" align="start">
                    <flux:profile
                        :name="auth()->user()->name"
                        :initials="auth()->user()->initials()"
                        icon:trailing="chevrons-up-down"
                    />

                    <flux:menu class="w-[220px]">
                        <flux:menu.radio.group>
                            <div class="p-0 text-sm font-normal">
                                <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                    <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                        <span
                                            class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
                                        >
                                            {{ auth()->user()->initials() }}
                                        </span>
                                    </span>

                                    <div class="grid flex-1 text-start text-sm leading-tight">
                                        <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                        <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                    </div>
                                </div>
                            </div>
                        </flux:menu.radio.group>

                        <flux:menu.separator />

                        <flux:menu.radio.group>
                            <flux:menu.item :href="route('profile.edit')" icon="cog" wire:navigate>{{ __('Pengaturan') }}</flux:menu.item>
                        </flux:menu.radio.group>

                        <flux:menu.separator />

                        <form method="POST" action="{{ route('logout') }}" class="w-full">
                            @csrf
                            <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                                {{ __('Keluar') }}
                            </flux:menu.item>
                        </form>
                    </flux:menu>
                </flux:dropdown>
            </flux:sidebar>

            <div class="flex flex-1 flex-col h-full w-full">

                <!-- Mobile User Menu -->
                <flux:header class="lg:hidden">
                    <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

                    <flux:spacer />

                    <flux:dropdown position="top" align="end">
                        <flux:profile
                            :initials="auth()->user()->initials()"
                            icon-trailing="chevron-down"
                        />

                        <flux:menu>
                            <flux:menu.radio.group>
                                <div class="p-0 text-sm font-normal">
                                    <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                        <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                            <span
                                                class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
                                            >
                                                {{ auth()->user()->initials() }}
                                            </span>
                                        </span>

                                        <div class="grid flex-1 text-start text-sm leading-tight">
                                            <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                            <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                        </div>
                                    </div>
                                </div>
                            </flux:menu.radio.group>

                            <flux:menu.separator />

                            <flux:menu.radio.group>
                                <flux:menu.item :href="route('profile.edit')" icon="cog" wire:navigate>{{ __('Pengaturan') }}</flux:menu.item>
                            </flux:menu.radio.group>

                            <flux:menu.separator />

                            <form method="POST" action="{{ route('logout') }}" class="w-full">
                                @csrf
                                <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                                    {{ __('Keluar') }}
                                </flux:menu.item>
                            </form>
                        </flux:menu>
                    </flux:dropdown>
                </flux:header>
                @endif

                {{ $slot }}
            </div>

        </div>
        @fluxScripts
        @livewireScripts
    </body>
</html>
