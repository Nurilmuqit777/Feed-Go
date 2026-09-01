@section('title', 'lupa kata sandi')

<x-layouts.auth>
    <div class="flex justify-between w-full">
        {{-- <x-auth-header :title="__('Forgot password')" :description="__('Enter your email to receive a password reset link')" /> --}}

        <section class="w-1/2 flex flex-col justify-start pl-20 text-white space-y-3 pt-32">
            <p class="text-4xl font-bold mb-0">
                Lupa kata sandi?
            </p>

            <p class="text-xl mb-0">
                Jangan khawatir, kami akan mengirimkan tautan pemulihan jika email terdaftar.
            </p>

            @if (session('status'))
                <flux:text class="font-medium !text-green-600 dark:!text-green-400">
                    {{ __('Tautan untuk mengatur ulang kata sandi telah dikirimkan ke alamat email Anda.') }}
                </flux:text>
            @endif
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

                <form method="POST" action="{{ route('password.email') }}" class="flex flex-col gap-6">
                    @csrf

                    {{-- Email Address --}}
                    <div class="flex items-center gap-3 rounded-xl">
                        <flux:icon.envelope class="text-white w-5 h-5" />
                        <flux:input
                            name="email"
                            {{-- :label="__('Email Address')" --}}
                            type="email"
                            required
                            autofocus
                            placeholder="Masukkan email anda"
                            class="dark"
                        />
                    </div>

                    <flux:button variant="primary" type="submit" class="w-full text-white bg-yellow-400 hover:bg-yellow-500" data-test="email-password-reset-link-button">
                        Dapatkan tautan
                    </flux:button>
                </form>
                <div class="space-x-1 rtl:space-x-reverse text-sm text-zinc-400">
                    <span>Kembali ke</span>
                    <flux:link class="text-yellow-400 dark" :href="route('login')" wire:navigate>masuk</flux:link>
                </div>
            </div>
        </section>


    </div>
</x-layouts.auth>
