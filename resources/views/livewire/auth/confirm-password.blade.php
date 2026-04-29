@section('title', 'Konfirmasi Password')

<x-layouts.auth>
    <div class="flex justify-between w-full">
        {{-- <x-auth-header
            :title="__('Confirm password')"
            :description="__('This is a secure area of the application. Please confirm your password before continuing.')"
        /> --}}

        <x-auth-session-status class="text-center" :status="session('status')" />

        <section class="w-1/2 flex flex-col justify-start pl-20 text-white space-y-3 pt-32">
            <p class="text-4xl font-bold mb-0">
                Konfirmasi Password
            </p>

            <p class="text-xl mb-0">
                Ini adalah area yang aman dari aplikasi. Harap konfirmasi kata sandi Anda sebelum melanjutkan.
            </p>
        </section>

        <section class="w-1/2 flex items-start justify-end pr-30 pt-32">
            <div class="w-[350px] space-y-6">
                <form method="POST" action="{{ route('password.confirm.store') }}" class="flex flex-col gap-6">
                    @csrf

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

                    <div class="flex items-center justify-end">
                        <flux:button variant="primary" type="submit" class="w-full text-white bg-yellow-400 hover:bg-yellow-500" data-test="confirm-password-button">
                            {{ __('Konfirmasi') }}
                        </flux:button>
                    </div>
                </form>
            </div>
        </section>
    </div>
</x-layouts.auth>
