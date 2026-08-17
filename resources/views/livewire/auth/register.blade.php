@section('title', 'Registrasi')

<x-layouts.auth>
    <div class="flex justify-between w-full">
        {{-- <x-auth-header :title="__('Create an account')" :description="__('Enter your details below to create your account')" /> --}}

        <!-- Session Status -->
        <x-auth-session-status class="text-center" :status="session('status')" />

        <section class="w-1/2 flex flex-col justify-start pl-20 text-white space-y-3 pt-32">
            <p class="text-4xl font-bold mb-0">
                Daftar ke <span class="text-yellow-400">Akun FeedGo</span>
            </p>

            <p class="text-2xl font-bold mb-0">
                Mulai akses layanan FeedGo dengan membuat akun baru.
            </p>

            <p class="text-sm text-gray-300 mb-0 mt-3">Solusi pakan ternak berbasis riset untuk produktivitas berkelanjutan</p>
            <ul class="flex gap-6 text-sm text-gray-300 mt-0">
                <li>• Teruji</li>
                <li>• Aman</li>
                <li>• Berbasis Riset</li>
            </ul>
        </section>

        <section class="w-1/2 flex items-start justify-end pr-30 pt-32">

            <div class="w-[350px] space-y-6">
                @if ($errors->any())
                    <div class="rounded-xl bg-red-500/10 border border-red-400/30 p-3">
                        <p class="text-sm text-red-400">
                            {{ $errors->first() }}
                        </p>
                    </div>
                @endif

                <form method="POST" action="{{ route('register.store') }}" class="flex flex-col gap-6">
                @csrf

                    {{-- name --}}
                    <div class="flex items-center gap-3 rounded-xl">

                        <flux:icon.user class="text-white w-5 h-5" />

                        <flux:input
                            name="name"
                            :value="old('name')"
                            type="text"
                            required
                            autocomplete="name"
                            placeholder="Masukkan nama anda"
                            class="flex-1 bg-transparent border-none shadow-none outline-none px-0"
                        />

                    </div>

                    {{-- Email --}}
                    <div class="flex items-center gap-3 rounded-xl">
                        <flux:icon.envelope class="text-white w-5 h-5" />

                        <flux:input
                            name="email"
                            {{-- :label="__('Email address')" --}}
                            :value="old('email')"
                            type="email"
                            required
                            autocomplete="email"
                            placeholder="masukkan email anda"
                        />
                    </div>

                    {{-- Password --}}
                    <div class="flex items-center gap-3 rounded-xl">
                        <flux:icon.lock-open class="text-white w-5 h-5" />
                        <flux:input
                            name="password"
                            {{-- :label="__('Password')" --}}
                            type="password"
                            required
                            autocomplete="new-password"
                            :placeholder="__('Masukkan sandi anda')"
                            viewable
                        />
                    </div>

                    {{-- Confirm Password --}}
                    <div class="flex items-center gap-3 rounded-xl">
                        <flux:icon.lock-closed class="text-white w-5 h-5" />
                        <flux:input
                            name="password_confirmation"
                            {{-- :label="__('Confirm password')" --}}
                            type="password"
                            required
                            autocomplete="new-password"
                            :placeholder="__('Konfirmasi sandi anda')"
                            viewable
                        />
                    </div>

                    <div class="flex items-center justify-end">
                    <flux:button type="submit" variant="primary" class="w-full text-white bg-yellow-400 hover:bg-yellow-500" data-test="register-button">
                            Daftar
                        </flux:button>
                   </div>
                </form>

                <div class="space-x-1 rtl:space-x-reverse text-center text-sm text-zinc-600 dark:text-zinc-400">
                    <span>Sudah punya akun?</span>
                    <flux:link class="text-yellow-400 hover:text-yellow-200" :href="route('login')" wire:navigate>Masuk</flux:link>
                </div>
            </div>

        </section>

    </div>
</x-layouts.auth>
