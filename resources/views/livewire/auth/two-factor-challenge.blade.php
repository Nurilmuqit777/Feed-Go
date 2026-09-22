@section('title', 'Verifikasi Dua Langkah')

<x-layouts.auth>
    <div
        class="flex flex-col lg:flex-row justify-between w-full"
        x-cloak
        x-data="{
            showRecoveryInput: @js($errors->has('recovery_code')),
            code: '',
            recovery_code: '',
            toggleInput() {
                this.showRecoveryInput = !this.showRecoveryInput;
                this.code = '';
                this.recovery_code = '';
                $dispatch('clear-2fa-auth-code');
                $nextTick(() => {
                    this.showRecoveryInput
                        ? this.$refs.recovery_code?.focus()
                        : $dispatch('focus-2fa-auth-code');
                });
            },
        }"
    >
    <section x-show="!showRecoveryInput" class="w-full lg:w-1/2 flex flex-col justify-start px-6 sm:px-10 lg:pl-20 lg:pr-10 pt-10 sm:pt-16 lg:pt-32 text-white space-y-3">
        <p class="text-2xl sm:text-3xl lg:text-4xl font-bold mb-0 leading-tight">
            Kode Autentikasi
        </p>

        <p class="text-base sm:text-lg lg:text-xl mb-0 leading-relaxed max-w-xl">
            Masukkan kode autentikasi yang diberikan oleh aplikasi autentikator anda.
        </p>
    </section>

    <section x-show="showRecoveryInput" class="w-full lg:w-1/2 flex flex-col justify-start px-6 sm:px-10 lg:pl-20 lg:pr-10 pt-10 sm:pt-16 lg:pt-32 text-white space-y-3">
        <p class="text-2xl sm:text-3xl lg:text-4xl font-bold mb-0 leading-tight">
            Kode Pemulihan
        </p>

        <p class="text-base sm:text-lg lg:text-xl mb-0 leading-relaxed max-w-xl">
            Masukkan salah satu kode pemulihan yang diberikan saat mengaktifkan 2FA.
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

                <form method="POST" action="{{ route('two-factor.login.store') }}">
                    @csrf
                    <div class="space-y-5 text-center">

                        <div x-show="!showRecoveryInput">
                            <div class="flex items-center justify-center my-5 overflow-x-auto">
                                <flux:otp x-model="code" length="6" name="code" class="dark shrink-0" />
                            </div>
                        </div>

                        <div x-show="showRecoveryInput">
                            <div class="my-5">
                                <flux:input
                                    type="text"
                                    name="recovery_code"
                                    x-ref="recovery_code"
                                    x-bind:required="showRecoveryInput"
                                    autocomplete="one-time-code"
                                    x-model="recovery_code"
                                    class="dark w-full"
                                />
                            </div>
                            @error('recovery_code')
                                <flux:text color="red">
                                    {{ $message }}
                                </flux:text>
                            @enderror
                        </div>

                        <flux:button
                            variant="primary"
                            type="submit"
                            class="w-full text-white bg-yellow-400 hover:bg-yellow-500"
                        >
                            {{ __('Masuk') }}
                        </flux:button>
                    </div>
                    <div class="mt-5 space-x-0.5 text-sm leading-5 text-center">
                        <span class="text-white/50">{{ __('atau') }}</span>
                        <div class="inline font-medium underline cursor-pointer text-white/80 hover:text-white transition">
                            <span x-show="!showRecoveryInput" @click="toggleInput()">{{ __('masuk dengan kode pemulihan') }}</span>
                            <span x-show="showRecoveryInput" @click="toggleInput()">{{ __('masuk dengan kode autentikasi') }}</span>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
</x-layouts.auth>
