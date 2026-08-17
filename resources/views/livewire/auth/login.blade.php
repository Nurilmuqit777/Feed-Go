@section('title', 'Masuk')

<x-layouts.auth>
    <div class="flex justify-between w-full">
        {{-- <x-auth-header :title="__('Log in to your account')" :description="__('Enter your email and password below to log in')" /> --}}

        <section class="w-1/2 flex flex-col justify-start pl-20 text-white space-y-3 pt-32">
            <p class="text-4xl font-bold mb-0">
                Masuk ke <span class="text-yellow-400">Akun FeedGo</span>
            </p>

            <p class="text-2xl font-bold mb-0">
                Akses layanan FeedGo dengan akun anda.
            </p>

            <p class="text-sm text-gray-300 mb-0 mt-3">Solusi pakan ternak berbasis riset untuk produktivitas berkelanjutan</p>
            <ul class="flex gap-6 text-sm text-gray-300 mt-0">
                <li>• Teruji</li>
                <li>• Aman</li>
                <li>• Berbasis Riset</li>
            </ul>
            <x-auth-session-status class="text-center" :status="session('status')" />
        </section>

        <section class="w-1/2 flex items-start justify-end pr-30 pt-32">
            <div class="w-[350px] space-y-6">

                @if ($errors->any())
                <div class="rounded-xl bg-red-500/10 border border-red-400/30 p-3">
                    @foreach ($errors->all() as $error)
                        <p class="text-sm text-red-400">
                            {{ $error }}
                        </p>
                    @endforeach
                </div>
                @endif
                <form method="POST" action="{{ route('login.store') }}" class="flex flex-col gap-6">
                    @csrf

                    {{-- Email --}}
                    <div class="flex items-center gap-3 rounded-xl">
                        <flux:icon.envelope class="text-white w-5 h-5 bg" />
                        <flux:input
                            name="email"
                            {{-- :label="__('Email address')" --}}
                            :value="old('email')"
                            type="email"
                            required
                            autofocus
                            autocomplete="email"
                            placeholder="Masukkan email anda"
                        />
                    </div>

                    {{-- Password --}}
                    <div class="flex items-center gap-3 rounded-xl">
                        <flux:icon.lock-closed class="text-white w-5 h-5" />
                            <flux:input
                                name="password"
                                {{-- :label="__('Password')" --}}
                                type="password"
                                required
                                autocomplete="current-password"
                                :placeholder="__('Masukkan sandi anda')"
                                viewable
                            />
                    </div>

                    <div class=" flex items-center justify-between text-sm">
                        <flux:checkbox  name="remember" :label="__('Ingat saya')" />

                        @if (Route::has('password.request'))
                            <flux:link class="text-yellow-300 hover:underline" :href="route('password.request')" wire:navigate>
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
                    <div class="space-x-1 text-sm text-center rtl:space-x-reverse text-zinc-600 dark:text-zinc-400">
                        <span>Belum punya akun?</span>
                        <flux:link class="text-yellow-400 hover:text-yellow-200" :href="route('register')" wire:navigate>Daftar</flux:link>
                    </div>
                @endif
            </div>
        </section>

    </div>
</x-layouts.auth>
