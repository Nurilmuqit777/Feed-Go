@section('title', 'Konfirmasi Password')

<x-layouts.auth>
    <div class="flex flex-col lg:flex-row justify-between w-full">

        <x-auth-session-status class="text-center" :status="session('status')" />

        <section class="w-full lg:w-1/2 flex flex-col justify-start px-6 sm:px-10 lg:pl-20 lg:pr-10 pt-10 sm:pt-16 lg:pt-32 text-white space-y-3">
            <p class="text-2xl sm:text-3xl lg:text-4xl font-bold mb-0 leading-tight">
                Konfirmasi Password
            </p>

            <p class="text-base sm:text-lg lg:text-xl mb-0 leading-relaxed max-w-xl">
                Ini adalah area yang aman dari aplikasi. Harap konfirmasi kata sandi Anda sebelum melanjutkan.
            </p>
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

                <form method="POST" action="{{ route('password.confirm.store') }}" class="flex flex-col gap-5 sm:gap-6">
                    @csrf

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
