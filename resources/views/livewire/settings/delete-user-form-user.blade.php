<section class="mt-2 rounded-xl p-6">

    <div class="mb-5">
        <h3 class="text-md font-semibold text-gray-800 mb-2">
            Hapus akun
        </h3>

        <p class="text-xs text-gray-500 leading-relaxed">
            Menghapus akun akan menghilangkan seluruh data akun Anda secara permanen.
        </p>
    </div>

    <div x-data="{ showDeleteModal: false }">

        <button
            @click="showDeleteModal = true"
            class="bg-red-600 hover:bg-red-800 text-white text-sm px-5 py-2 rounded transition"
        >
            Hapus Akun
        </button>

        <div
            x-show="showDeleteModal"
            x-transition
            @keydown.escape.window="showDeleteModal = false"
            class="fixed inset-0 z-50 flex items-center justify-center bg-black/10"
            style="display: none;"
        >

            <div
                @click.away="showDeleteModal = false"
                class="bg-white rounded-2xl shadow-xl w-full max-w-lg p-6 space-y-6"
            >

                <div>
                    <h2 class="text-lg font-semibold text-gray-800">
                        Apakah Anda yakin ingin menghapus akun?
                    </h2>

                    <p class="text-sm text-gray-500 mt-2 leading-relaxed">
                        Setelah akun dihapus, seluruh data akan dihapus permanen.
                        Masukkan kata sandi Anda untuk mengonfirmasi.
                    </p>
                </div>

                <form wire:submit="deleteUser" class="space-y-4">

                    <div>
                        <label class="block text-sm text-gray-600 mb-2">
                            Password
                        </label>

                        <input
                            type="password"
                            wire:model="password"
                            class="w-full border rounded-lg px-4 py-2 text-sm focus:ring-2 focus:ring-red-500 outline-none"
                            placeholder="Masukkan password"
                        >

                        @error('password')
                            <p class="text-red-500 text-xs mt-2">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="flex justify-end gap-2">

                        <button
                            type="button"
                            @click="showDeleteModal = false"
                            class="px-4 py-2 rounded-lg border text-gray-600 hover:bg-gray-100 transition"
                        >
                            Batal
                        </button>

                        <button
                            type="submit"
                            class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg transition"
                        >
                            Hapus Akun
                        </button>

                    </div>

                </form>

            </div>
        </div>

    </div>

</section>
