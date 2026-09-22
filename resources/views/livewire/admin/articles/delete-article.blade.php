<div>
    @if($open)
    <div class="fixed inset-0 z-50 flex items-center justify-center">

        <div class="fixed inset-0 bg-black/40" wire:click="close"></div>

        <div class="relative bg-white dark:bg-neutral-800 rounded-2xl p-6 w-full max-w-md z-10">

            <div class="flex justify-center mb-4">
                <div class="w-16 h-16 rounded-full bg-red-100 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
            </div>

            <h2 class="text-lg font-semibold text-center mb-2">
                Hapus Artikel
            </h2>

            <p class="text-sm text-gray-300 text-center mb-6">
                Apakah kamu yakin ingin menghapus artikel ini?
                Tindakan ini tidak dapat dibatalkan.
            </p>

            <div class="flex gap-3">
                <button wire:click="close" class="flex-1 px-4 py-2 rounded-lg bg-gray-200 dark:bg-neutral-700 text-gray-800 dark:text-white font-medium hover:bg-gray-300 dark:hover:bg-neutral-600 transition">
                    BATAL
                </button>

                <button wire:click="delete" class="flex-1 px-4 py-2 rounded-lg bg-red-600 text-white font-medium hover:bg-red-700 transition">
                    HAPUS
                </button>
            </div>
        </div>
    </div>
    @endif

</div>
