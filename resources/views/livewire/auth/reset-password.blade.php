@section('title', 'Reset Password')

<x-layouts.auth>
    <div class="flex justify-between w-full">
        {{-- <x-auth-header :title="__('Reset password')" :description="__('Please enter your new password below')" /> --}}

        <!-- Session Status -->
        <x-auth-session-status class="text-center" :status="session('status')" />

        <section class="w-1/2 flex flex-col justify-start pl-20 text-white space-y-3 pt-32">
            <p class="text-4xl font-bold mb-0">
                Ubah Kata Sandi
            </p>

            <p class="text-2xl font-bold mb-0">
                Mohon masukkan kata sandi baru anda
            </p>
        </section>

        <section class="w-1/2 flex items-start justify-end pr-30 pt-32">

            <div class="w-[350px] space-y-6">

                <form method="POST" action="{{ route('password.update') }}" class="flex flex-col gap-6">
                    @csrf
                    {{-- Token --}}
                    <input type="hidden" name="token" value="{{ request()->route('token') }}">

                    {{-- Email Address --}}
                    <div class="flex items-center gap-3 rounded-xl">
                        <flux:icon.envelope class="text-white w-5 h-5" />
                        <flux:input
                            name="email"
                            value="{{ request('email') }}"
                            {{-- :label="__('Email')" --}}
                            type="email"
                            required
                            autocomplete="email"
                            :placeholder="__('Masukkan email anda')"
                            class="flex-1 bg-transparent border-none shadow-none outline-none px-0"
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
                            :placeholder="__('Masukkan sandi baru anda')"
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
                            :placeholder="__('Konfirmasi sandi baru anda')"
                            viewable
                        />
                    </div>

                    <div class="flex items-center justify-end">
                        <flux:button type="submit" variant="primary" class="w-full text-white bg-yellow-400 hover:bg-yellow-500" data-test="reset-password-button">
                            {{ __('Ubah Kata Sandi') }}
                        </flux:button>
                    </div>
                </form>
            </div>

        </section>

    </div>
</x-layouts.auth>
