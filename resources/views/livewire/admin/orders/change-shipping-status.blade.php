<div>
    @if ($open)
        <div class="fixed inset-0 z-50 flex items-center justify-center" wire:ignore.self>

            <div
                class="fixed inset-0 bg-black/40 dark:bg-black/60"
                wire:click="close"
            ></div>

            <div
                class="relative z-10 w-full max-w-md rounded-2xl p-6 bg-white dark:bg-neutral-800 shadow-xl">

                <h2 class="text-lg font-semibold mb-4 text-black dark:text-white text-center">
                    Ubah Status Pengiriman
                </h2>

                @if ($status === 'shipped')

                    <p class="text-sm text-black dark:text-white font-semibold mb-4">
                        Apakah Anda yakin ingin mengubah status pengiriman menjadi
                        <span class="text-[#388E3C] dark:text-[#4CAF50]">
                            Dikirim
                        </span>?
                    </p>

                    <p class="text-sm text-black dark:text-white mb-4">
                        Pastikan pesanan telah diserahkan kepada jasa pengiriman
                        dan nomor resi telah diperoleh. Masukkan nomor resi untuk
                        melanjutkan perubahan status pengiriman.
                    </p>

                    <input
                        wire:model.defer="tracking_number"
                        class="w-full rounded-lg p-2 border border-gray-300 dark:border-neutral-600 bg-white dark:bg-neutral-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-green-500 focus:outline-none"
                        placeholder="Masukkan Nomor Resi"
                    />

                    @error('tracking_number')
                        <p class="text-red-500 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                @elseif ($status === 'finished')

                    <p class="text-sm text-black dark:text-white font-semibold mb-4">
                        Apakah Anda yakin ingin mengubah status pengiriman menjadi
                        <span class="text-[#388E3C] dark:text-[#4CAF50]">
                            Selesai
                        </span>?
                    </p>

                    <p class="text-sm text-black dark:text-white mb-4">
                        Status pengiriman yang telah diubah tidak dapat dikembalikan kembali.
                    </p>

                @endif

                <div class="flex justify-center gap-3 mt-6">
                    <button
                        type="button"
                        wire:click="close"
                        class="px-4 py-2 rounded-lg border border-gray-300 dark:border-neutral-600 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-neutral-700"
                    >
                        Batal
                    </button>

                    <button
                        type="button"
                        wire:click="save"
                        class="px-4 py-2 rounded-lg bg-green-600 hover:bg-green-700 text-white font-medium"
                    >
                        Simpan
                    </button>
                </div>

            </div>
        </div>
    @endif
</div>
