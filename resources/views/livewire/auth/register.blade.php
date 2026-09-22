@section('title', 'Registrasi')

<x-layouts.auth>
    <div class="flex flex-col lg:flex-row justify-between w-full">

        {{-- Session Status --}}
        <x-auth-session-status class="text-center" :status="session('status')" />

        <section class="w-full lg:w-1/2 flex flex-col justify-start px-6 sm:px-10 lg:pl-20 lg:pr-10 pt-10 sm:pt-16 lg:pt-32 text-white space-y-3">
            <p class="text-2xl sm:text-3xl lg:text-4xl font-bold mb-0 leading-tight">
                Daftar ke <span class="text-yellow-400">Akun FeedGo</span>
            </p>

            <p class="text-lg sm:text-xl lg:text-2xl font-bold mb-0 leading-snug">
                Mulai akses layanan FeedGo dengan membuat akun baru.
            </p>

            <p class="text-sm text-gray-300 mb-0 mt-3 leading-relaxed max-w-xl">Solusi pakan ternak berbasis riset untuk produktivitas berkelanjutan</p>
            <ul class="flex flex-wrap gap-x-4 sm:gap-6 gap-y-1 text-sm text-gray-300 mt-0">
                <li>• Teruji</li>
                <li>• Aman</li>
                <li>• Berbasis Riset</li>
            </ul>
        </section>

        <section class="w-full lg:w-1/2 flex items-start justify-center lg:justify-end px-6 sm:px-10 lg:pr-30 pt-8 sm:pt-10 lg:pt-32 pb-10 lg:pb-0">

            <div class="w-full max-w-[350px] space-y-6">
                @if ($errors->any())
                    <div class="rounded-xl bg-red-500/10 border border-red-400/30 p-3">
                        <p class="text-sm text-red-400">
                            {{ $errors->first() }}
                        </p>
                    </div>
                @endif

                <form method="POST" action="{{ route('register.store') }}" class="flex flex-col gap-5 sm:gap-6">
                @csrf

                    {{-- name --}}
                    <div class="flex items-center gap-3 rounded-xl">

                        <flux:icon.user class="text-white w-5 h-5 shrink-0" />

                        <flux:input
                            name="name"
                            :value="old('name')"
                            type="text"
                            required
                            autocomplete="name"
                            placeholder="Masukkan nama anda"
                            class="dark w-full"
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
                            class="dark w-full"
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
                            class="dark w-full"
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
                            class="dark w-full"
                        />
                    </div>

                    <div class="flex items-center justify-end">
                    <flux:button type="submit" variant="primary" class="w-full text-white bg-yellow-400 hover:bg-yellow-500" data-test="register-button">
                            Daftar
                        </flux:button>
                   </div>
                </form>

                <div class="space-x-1 rtl:space-x-reverse text-center text-sm text-zinc-400">
                    <span>Sudah punya akun?</span>
                    <flux:link class="text-yellow-400 dark" :href="route('login')" wire:navigate>Masuk</flux:link>
                </div>
            </div>

        </section>

    </div>
</x-layouts.auth>
