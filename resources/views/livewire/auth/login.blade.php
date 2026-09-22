@section('title', 'Masuk')

<x-layouts.auth>
    <div class="flex flex-col lg:flex-row justify-between w-full">

        <section class="w-full lg:w-1/2 flex flex-col justify-start px-6 sm:px-10 lg:pl-20 lg:pr-10 pt-10 sm:pt-16 lg:pt-32 text-white space-y-3">
            <p class="text-2xl sm:text-3xl lg:text-4xl font-bold mb-0 leading-tight">
                Masuk ke <span class="text-yellow-400">Akun FeedGo</span>
            </p>

            <p class="text-lg sm:text-xl lg:text-2xl font-bold mb-0 leading-snug">
                Akses layanan FeedGo dengan akun anda.
            </p>

            <p class="text-sm text-gray-300 mb-0 mt-3 leading-relaxed max-w-xl">Solusi pakan ternak berbasis riset untuk produktivitas berkelanjutan</p>
            <ul class="flex flex-wrap gap-x-4 sm:gap-6 gap-y-1 text-sm text-gray-300 mt-0">
                <li>• Teruji</li>
                <li>• Aman</li>
                <li>• Berbasis Riset</li>
            </ul>
            <x-auth-session-status class="text-center" :status="session('status')" />
        </section>

        <section class="w-full lg:w-1/2 flex items-start justify-center lg:justify-end px-6 sm:px-10 lg:pr-30 pt-8 sm:pt-10 lg:pt-32 pb-10 lg:pb-0">
            <div class="w-full max-w-[350px] space-y-6">

                @if ($errors->any())
                <div class="rounded-xl bg-red-500/10 border border-red-400/30 p-3">
                    @foreach ($errors->all() as $error)
                        <p class="text-sm text-red-400">
                            {{ $error }}
                        </p>
                    @endforeach
                </div>
                @endif
                <form method="POST" action="{{ route('login.store') }}" class="flex flex-col gap-5 sm:gap-6">
                    @csrf

                    {{-- Email --}}
                    <div class="flex items-center gap-3 rounded-xl">
                        <flux:icon.envelope class="text-white w-5 h-5 shrink-0" />
                        <flux:input
                            name="email"
                            {{-- :label="__('Email address')" --}}
                            :value="old('email')"
                            type="email"
                            required
                            autofocus
                            autocomplete="email"
                            placeholder="Masukkan email anda"
                            class="dark w-full"
                        />
                    </div>

                    {{-- Password --}}
                    <div class="flex items-center gap-3 rounded-xl">
                        <flux:icon.lock-closed class="text-white w-5 h-5 shrink-0" />
                            <flux:input
                                name="password"
                                {{-- :label="__('Password')" --}}
                                type="password"
                                required
                                autocomplete="current-password"
                                :placeholder="__('Masukkan sandi anda')"
                                viewable
                                class="dark w-full"
                            />
                    </div>

                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 text-sm">
                        <div class="[&_ui-label]:!text-white">
                            <flux:checkbox name="remember" class="dark" :label="__('Ingat saya')" />
                        </div>

                        @if (Route::has('password.request'))
                            <flux:link class="text-yellow-300 dark" :href="route('password.request')" wire:navigate>
                                Lupa kata sandi?
                            </flux:link>
                        @endif
                    </div>

                    <div class="flex items-center justify-end">
                        <flux:button variant="primary" type="submit" class="w-full text-white bg-yellow-400 hover:bg-yellow-500" data-test="login-button">
                            Masuk
                        </flux:button>
                    </div>
                </form>

                @if (Route::has('register'))
                    <div class="space-x-1 text-sm text-center rtl:space-x-reverse text-zinc-400">
                        <span>Belum punya akun?</span>
                        <flux:link class="text-yellow-400 dark" :href="route('register')" wire:navigate>Daftar</flux:link>
                    </div>
                @endif
            </div>
        </section>

    </div>
</x-layouts.auth>
