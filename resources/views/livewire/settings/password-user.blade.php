@section('title', 'Kata Sandi')

<div class="w-full max-w-4xl mx-auto mt-5 sm:mt-10 px-4 sm:px-6 lg:px-0 mb-5">
    <div class="bg-white rounded-2xl p-4 sm:p-6 lg:p-8 shadow-sm">

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6 lg:gap-8">

            @include('components.settings.layout-user')

            <div class="col-span-1 lg:col-span-3">

                <div class="border rounded-xl p-4 sm:p-6">

                    <h2 class="text-xl font-semibold text-gray-800">
                        Perbarui Kata Sandi
                    </h2>

                    <p class="text-sm text-gray-500 mb-4">
                        Perbarui kata sandi untuk menjaga keamanan akun Anda.
                    </p>

                    <hr class="mb-4">

                    <form method="POST" wire:submit="updatePassword" class="space-y-5">

                        <div class="grid grid-cols-1 sm:grid-cols-3 sm:items-center gap-2 sm:gap-4">

                            <span class="text-sm text-gray-500">
                                Kata Sandi Saat Ini
                            </span>

                            <input wire:model="current_password" type="password" autocomplete="current-password"
                                class="w-full sm:col-span-2 border rounded px-3 py-2 text-sm focus:ring-2 focus:ring-green-600 outline-none"
                                required>

                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-3 sm:items-center gap-2 sm:gap-4">

                            <span class="text-sm text-gray-500">
                                Kata Sandi Baru
                            </span>

                            <input wire:model="password" type="password" autocomplete="new-password"
                                class="w-full sm:col-span-2 border rounded px-3 py-2 text-sm focus:ring-2 focus:ring-green-600 outline-none"
                                required>

                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-3 sm:items-center gap-2 sm:gap-4">

                            <span class="text-sm text-gray-500">
                                Konfirmasi Kata Sandi
                            </span>

                            <input
                                wire:model="password_confirmation"
                                type="password"
                                autocomplete="new-password"
                                class="w-full sm:col-span-2 border rounded px-3 py-2 text-sm focus:ring-2 focus:ring-green-600 outline-none"
                                required>

                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-3">

                            <div></div>

                            <div class="sm:col-span-2 flex flex-wrap items-center gap-4">
                                <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white px-5 py-2 rounded">Simpan</button>
                                <x-action-message class="text-green-600 text-sm" on="password-updated"> Password berhasil diperbarui.</x-action-message>
                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>
</div>
