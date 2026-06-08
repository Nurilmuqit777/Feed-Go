<div
    class="mt-6 py-6 border rounded-xl shadow-sm border-gray-200"
    wire:cloak
    x-data="{ showRecoveryCodes: false }"
>

    <div class="px-6 space-y-2">
        <div class="flex items-center gap-2">

            <svg class="w-6 h-6 text-gray-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14v3m-3-6V7a3 3 0 1 1 6 0v4m-8 0h10a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1v-7a1 1 0 0 1 1-1Z"/>
            </svg>


            <h3 class="text-lg font-semibold text-gray-800">
                Kode Pemulihan 2FA
            </h3>
        </div>

        <p class="text-sm text-gray-500">
            Kode pemulihan digunakan jika Anda kehilangan akses ke aplikasi autentikator.
            Simpan kode ini di tempat aman.
        </p>
    </div>

    <div class="px-6 mt-4">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center">

            <button
                x-show="!showRecoveryCodes"
                @click="showRecoveryCodes = true"
                class="bg-[#2E7D32] text-white px-4 py-2 rounded-lg hover:bg-green-800 transition"
            >
                Lihat Kode Pemulihan
            </button>

            <button
                x-show="showRecoveryCodes"
                @click="showRecoveryCodes = false"
                class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition"
            >
                Sembunyikan
            </button>

            @if (filled($recoveryCodes))
                <button
                    x-show="showRecoveryCodes"
                    wire:click="regenerateRecoveryCodes"
                    class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition"
                >
                    Regenerasi Kode
                </button>
            @endif

        </div>
    </div>

    <div
        x-show="showRecoveryCodes"
        x-transition
        class="px-6 mt-4"
    >

        @error('recoveryCodes')
            <div class="bg-red-100 text-red-600 px-4 py-3 rounded-lg text-sm">
                {{ $message }}
            </div>
        @enderror

        @if (filled($recoveryCodes))
            <div class="grid gap-2 p-4 font-mono text-sm rounded-lg bg-gray-100">
                @foreach($recoveryCodes as $code)
                    <div
                        class="select-text px-2 py-1 rounded "
                        wire:loading.class="opacity-50 animate-pulse"
                    >
                        {{ $code }}
                    </div>
                @endforeach
            </div>

            <p class="text-xs text-gray-500 mt-3">
                Setiap kode pemulihan hanya dapat digunakan satu kali.
            </p>
        @endif

    </div>

</div>
