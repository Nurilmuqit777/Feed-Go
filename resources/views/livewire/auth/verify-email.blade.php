@section('title', 'Verifikasi Email')

<x-layouts.auth>

    <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between w-full">

        <section class="w-full lg:w-1/2 flex flex-col justify-start px-6 sm:px-10 lg:pl-20 lg:pr-10 pt-10 sm:pt-16 lg:pt-32 text-white">
            <div class="max-w-xl space-y-3 sm:space-y-4">

                <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold leading-tight">
                    Verifikasi Email
                </h1>

                <p class="text-base sm:text-lg lg:text-xl leading-relaxed">
                    Verifikasi email Anda melalui tautan yang telah
                    dikirimkan ke alamat email yang Anda gunakan saat
                    mendaftar.
                </p>

                @if (session('status') == 'verification-link-sent')
                    <flux:text class="font-medium !dark:text-green-400 !text-green-600">
                        {{ __('Tautan verifikasi baru telah dikirimkan ke alamat email Anda.') }}
                    </flux:text>
                @endif

            </div>
        </section>

        <section class="w-full lg:w-1/2 flex items-start justify-center lg:justify-end px-6 sm:px-10 lg:pr-30 pt-8 sm:pt-10 lg:pt-32 pb-10 lg:pb-0">

            <div class="w-full max-w-[350px] space-y-6">

                <form
                    method="POST"
                    action="{{ route('verification.send') }}"
                    class="flex flex-col gap-5 sm:gap-6"
                >
                    @csrf

                    <div class="flex items-center gap-3 min-w-0">
                        <flux:icon.envelope
                            class="text-white w-5 h-5 shrink-0"
                        />

                        <flux:input
                            type="email"
                            value="{{ auth()->user()->email }}"
                            disabled
                            class="w-full dark"
                        />
                    </div>

                    <flux:button
                        type="submit"
                        variant="primary"
                        class="w-full text-white bg-yellow-400 hover:bg-yellow-500"
                    >
                        Kirim ulang verifikasi email
                    </flux:button>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <flux:button
                        variant="ghost"
                        type="submit"
                        class="w-full text-white text-sm cursor-pointer dark"
                    >
                        Keluar
                    </flux:button>
                </form>

            </div>

        </section>

    </div>

</x-layouts.auth>
