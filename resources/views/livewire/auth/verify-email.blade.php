@section('title', 'Verifikasi Email')

<x-layouts.auth>

    <div class="flex items-center justify-between w-full">

        <section class="w-1/2 flex flex-col justify-start pl-20 text-white space-y-3 pt-32">
            <div class="max-w-xl space-y-4">

                <h1 class="text-4xl font-bold">
                    Verifikasi Email
                </h1>

                <p class="text-xl leading-relaxed">
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

        <section class="w-1/2 flex items-start justify-end pr-30 pt-32">

            <div class="w-full max-w-[350px] space-y-6">

                <form
                    method="POST"
                    action="{{ route('verification.send') }}"
                    class="flex flex-col gap-6"
                >
                    @csrf

                    <div class="flex items-center gap-3">
                        <flux:icon.envelope
                            class="text-white w-5 h-5 shrink-0"
                        />

                        <flux:input
                            type="email"
                            value="{{ auth()->user()->email }}"
                            disabled
                            class="flex-1"
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
                        class="w-full text-white text-sm cursor-pointer"
                    >
                        Keluar
                    </flux:button>
                </form>

            </div>

        </section>

    </div>

</x-layouts.auth>
