@section('title', 'Verifikasi Dua Langkah')

<x-layouts.auth>
    <div
        class="flex justify-between w-full"
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
        <div class="w-1/2 flex flex-col justify-start pl-20 text-white space-y-3 pt-32" x-show="!showRecoveryInput">
            <p class="text-4xl font-bold mb-0">
                Kode Autentikasi
            </p>

            <p class="text-xl mb-0">
                Masukkan kode autentikasi yang diberikan oleh aplikasi autentikator anda.
            </p>
        </div>

        <div class="w-1/2 flex flex-col justify-start pl-20 text-white space-y-3 pt-32" x-show="showRecoveryInput">
            <p class="text-4xl font-bold mb-0">
                Kode Pemulihan
            </p>

            <p class="text-xl mb-0">
                Masukkan salah satu kode pemulihan yang diberikan saat mengaktifkan 2FA.
            </p>
        </div>

        <div class="w-1/2 flex items-start justify-end pr-30 pt-32">
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

                <form method="POST" action="{{ route('two-factor.login.store') }}">
                    @csrf
                    <div class="space-y-5 text-center">
                        <div x-show="!showRecoveryInput">
                            <div class="flex items-center justify-center my-5">
                                <flux:otp x-model="code" length="6" name="code" class="dark" />
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
                                    class="dark"
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
        </div>
    </div>
</x-layouts.auth>
