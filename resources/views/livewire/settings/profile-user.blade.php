@section('title', 'Profil')
<div class="max-w-4xl mx-auto mt-5 sm:mt-10 bg-white rounded-2xl p-4 sm:p-6 lg:p-8 shadow-sm mb-5">
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6 lg:gap-8">

        @include('components.settings.layout-user')

        <div class="col-span-1 lg:col-span-3">
            <div class="border rounded-xl p-6">

                <h2 class="text-xl font-semibold text-gray-800">
                    Profil saya
                </h2>
                <p class="text-sm text-gray-500 mb-4">
                    Perbarui informasi akun Anda
                </p>

                <hr class="mb-4">

                <form wire:submit="updateProfileInformation" class="space-y-5">

                    <div class="grid grid-cols-1 sm:grid-cols-3 sm:items-center gap-2 sm:gap-4">
                        <span class="text-sm text-gray-500">Nama</span>

                        <input
                            type="text"
                            wire:model="name"
                            class="w-full sm:col-span-2 border rounded px-3 py-2 text-sm focus:ring-2 focus:ring-green-600 outline-none"
                        >
                    </div>

                    @error('name')
                        <p class="text-red-500 text-xs sm:ml-[33%]">
                            {{ $message }}
                        </p>
                    @enderror

                    <div class="grid grid-cols-1 sm:grid-cols-3 sm:items-center gap-2 sm:gap-4">
                        <span class="text-sm text-gray-500">Email</span>

                        <input
                            type="email"
                            wire:model="email"
                            class="w-full sm:col-span-2 border rounded px-3 py-2 text-sm focus:ring-2 focus:ring-green-600 outline-none"
                        >
                    </div>

                    @error('email')
                        <p class="text-red-500 text-xs sm:ml-[33%]">
                            {{ $message }}
                        </p>
                    @enderror

                    <div class="grid grid-cols-1 sm:grid-cols-3">
                        <div></div>

                        <div class="sm:col-span-2 flex flex-wrap items-center gap-4">
                            <button
                                type="submit"
                                class="bg-yellow-500 hover:bg-yellow-600 text-white px-5 py-2 rounded"
                            >
                                Simpan
                            </button>

                            <x-action-message on="profile-updated" class="text-green-600 text-sm">
                                Data berhasil diperbarui.
                            </x-action-message>
                        </div>
                    </div>

                </form>

                <livewire:settings.delete-user-form />

            </div>
        </div>

    </div>
</div>
