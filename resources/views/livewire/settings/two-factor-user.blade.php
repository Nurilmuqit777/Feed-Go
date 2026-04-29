@section('title', 'Verifikasi Dua Langkah')

<div class="max-w-4xl mx-auto mt-10 bg-white rounded-2xl p-8 shadow-sm m-10">
    <div class="grid grid-cols-4 gap-8">

        @include('components.settings.layout-user')

        <div class="col-span-3">
            <div class="border rounded-xl p-6">

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
                    <button wire:click="enable"
                        class="bg-green-700 text-white px-5 py-2 rounded hover:bg-green-800 transition">
                        Aktifkan 2FA
                    </button>
                    @else
                    <button wire:click="disable"
                        class="bg-red-600 text-white px-5 py-2 rounded hover:bg-red-700 transition">
                        Nonaktifkan 2FA
                    </button>
                    @endif

                </div>

            </div>
        </div>

    </div>

    @if($showModal)
    <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm" x-data x-transition>

        <div class="bg-white rounded-2xl p-6 w-full max-w-md space-y-6 shadow-xl" @click.away="$wire.closeModal()" @keydown.escape.window="$wire.closeModal()">

            <div class="text-center space-y-1">
                <h2 class="text-lg font-semibold text-gray-800">
                    {{ $this->modalConfig['title'] }}
                </h2>
                <p class="text-sm text-gray-500">
                    {{ $this->modalConfig['description'] }}
                </p>
            </div>

            @if(!$showVerificationStep)
                <div class="flex justify-center">
                    <div class="bg-white p-4 rounded-lg border">
                        @if($qrCodeSvg)
                        {!! $qrCodeSvg !!}
                        @else
                            <div class="w-40 h-40 flex items-center justify-center text-gray-400">
                                Loading...
                            </div>
                        @endif
                    </div>
                </div>

                <button
                    wire:click="showVerificationIfNecessary"
                    class="w-full bg-green-700 hover:bg-green-800 text-white py-2 rounded-lg transition"
                >
                    Lanjut
                </button>
            @endif

            @if($showVerificationStep)
                <div class="space-y-4 text-center">

                    <input type="text" wire:model="code" maxlength="6" class="w-full border rounded-lg px-4 py-2 text-center text-lg tracking-widest focus:ring-2 focus:ring-green-600 outline-none"
                    placeholder="123456">

                    @error('code')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror

                    <div class="flex gap-2">
                        <button
                            wire:click="resetVerification"
                            class="flex-1 border rounded-lg py-2 hover:bg-gray-100"
                        >
                            Kembali
                        </button>

                        <button
                            wire:click="confirmTwoFactor"
                            class="flex-1 bg-green-700 text-white rounded-lg py-2 hover:bg-green-800"
                        >
                            Konfirmasi
                        </button>
                    </div>

                </div>
            @endif

            <button
                wire:click="closeModal"
                class="text-xs text-gray-500 underline w-full"
            >
                Tutup
            </button>

        </div>
    </div>
    @endif
</div>
