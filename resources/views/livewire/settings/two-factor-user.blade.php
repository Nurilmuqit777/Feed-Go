@section('title', 'Verifikasi Dua Langkah')

<div class="w-full max-w-4xl mx-auto mt-5 sm:mt-10 px-4 sm:px-6 lg:px-0 mb-5">

    <div class="bg-white rounded-2xl p-4 sm:p-6 lg:p-8 shadow-sm">

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6 lg:gap-8">

            @include('components.settings.layout-user')

            <div class="col-span-1 lg:col-span-3">

                <div class="border rounded-xl p-4 sm:p-6">

                    <h2 class="text-xl font-semibold text-gray-800">
                        Verifikasi Dua Langkah
                    </h2>

                    <p class="text-sm text-gray-500 mb-4">
                        Kelola pengaturan verifikasi dua langkah anda
                    </p>

                    <hr class="mb-4">

                    <div class="space-y-5">

                        <span class="inline-block text-sm px-4 py-1 rounded-md text-white
                            {{ $twoFactorEnabled ? 'bg-[#2E7D32]' : 'bg-[#E81010]' }}">
                            {{ $twoFactorEnabled ? 'Aktif' : 'Dinonaktifkan' }}
                        </span>

                        <p class="text-sm text-gray-500 leading-relaxed max-w-lg">
                            Saat 2FA aktif, Anda akan diminta memasukkan kode verifikasi setiap kali login.
                            Kode dapat diperoleh dari aplikasi autentikator seperti Google Authenticator.
                        </p>

                        @if(!$twoFactorEnabled)

                            <button
                                wire:click="enable"
                                class="bg-green-700 text-white px-5 py-2 rounded hover:bg-green-800 hover:scale-103 active:scale-95 transition">
                                Aktifkan 2FA
                            </button>

                        @else

                            <livewire:settings.two-factor.recovery-codes :$requiresConfirmation />

                            <button
                                wire:click="disable"
                                class="bg-red-600 text-white px-5 py-2 rounded hover:bg-red-700 hover:scale-103 active:scale-95 transition">
                                Nonaktifkan 2FA
                            </button>

                        @endif

                    </div>

                </div>

            </div>

        </div>

    </div>

    @if($showModal)

        <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm px-4 py-6 overflow-y-auto" x-data x-transition>

            <div class="bg-white rounded-2xl p-4 sm:p-6 w-full max-w-md space-y-6 shadow-xl my-auto" @click.away="$wire.closeModal()" @keydown.escape.window="$wire.closeModal()">

                <div class="text-center space-y-1">

                    <h2 class="text-lg font-semibold text-gray-800">
                        {{ $this->modalConfig['title'] }}
                    </h2>

                    <p class="text-sm text-gray-500">
                        {{ $this->modalConfig['description'] }}
                    </p>

                </div>

                @if(!$showVerificationStep)

                    <div class="flex justify-center overflow-hidden">

                        <div class="bg-white p-3 sm:p-4 rounded-lg border max-w-full overflow-auto">

                            @if($qrCodeSvg)

                                <div class="max-w-full">
                                    {!! $qrCodeSvg !!}
                                </div>

                            @else

                                <div class="w-40 h-40 flex items-center justify-center text-gray-400">
                                    Loading...
                                </div>

                            @endif

                        </div>

                    </div>

                    <button wire:click="showVerificationIfNecessary" class="w-full bg-green-700 hover:bg-green-800 text-white py-2 rounded-lg transition hover:scale-103 active:scale-95">
                        Lanjut
                    </button>

                    <div class="space-y-4">

                        <div class="relative flex items-center justify-center w-full">

                            <div class="absolute inset-0 w-full h-px top-1/2 bg-gray-200"></div>

                            <span class="relative px-3 text-xs sm:text-sm bg-white text-gray-500 text-center">
                                atau masukkan kode secara manual
                            </span>

                        </div>

                        <div
                            class="flex items-center space-x-2"
                            x-data="{
                                copied: false,
                                async copy() {
                                    try {
                                        await navigator.clipboard.writeText('{{ $manualSetupKey }}')

                                        this.copied = true

                                        setTimeout(() => {
                                            this.copied = false
                                        }, 1500)

                                    } catch (e) {
                                        console.warn('Copy gagal')
                                    }
                                }
                            }">

                            <div class="flex items-stretch w-full border rounded-xl border-gray-200 overflow-hidden">

                                @empty($manualSetupKey)

                                    <div class="flex items-center justify-center w-full p-3 bg-gray-100 text-sm text-gray-400">
                                        Loading...
                                    </div>

                                @else

                                    <input type="text" readonly value="{{ $manualSetupKey }}" class="min-w-0 w-full p-3 bg-white outline-none text-gray-800 text-sm" />

                                    <button
                                        type="button"
                                        @click="copy()"
                                        class="shrink-0 px-3 sm:px-4 border-l border-gray-200 hover:bg-gray-100 transition">

                                        <svg x-show="!copied" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 10h6a2 2 0 002-2v-8a2 2 0 00-2-2h-6a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                        </svg>

                                        <svg x-show="copied" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>

                                    </button>

                                @endempty

                            </div>

                        </div>

                    </div>

                @endif

                @if($showVerificationStep)

                    <div class="space-y-4 text-center">

                        <input type="text" wire:model="code" maxlength="6"
                            class="w-full border rounded-lg px-4 py-2 text-center text-lg tracking-widest focus:ring-2 focus:ring-green-600 outline-none"
                            placeholder="contoh: 123456"
                            inputmode="numeric">

                        @error('code')
                            <p class="text-red-500 text-xs">
                                {{ $message }}
                            </p>
                        @enderror


                        <div class="flex flex-col sm:flex-row gap-2">

                            <button
                                wire:click="resetVerification"
                                class="flex-1 border rounded-lg py-2 hover:bg-gray-100 hover:scale-103 active:scale-95">
                                Kembali
                            </button>

                            <button
                                wire:click="confirmTwoFactor"
                                class="flex-1 bg-green-700 text-white rounded-lg py-2 hover:bg-green-800 hover:scale-103 active:scale-95">
                                Konfirmasi
                            </button>

                        </div>

                    </div>

                @endif

                <button
                    wire:click="closeModal"
                    class="text-xs text-gray-500 hover:underline w-full">
                    Tutup
                </button>

            </div>

        </div>

    @endif

</div>
