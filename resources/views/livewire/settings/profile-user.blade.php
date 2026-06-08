@section('title', 'Profil')
<div class="max-w-4xl mx-auto mt-10 bg-white rounded-2xl p-8 shadow-sm m-10">
    <div class="grid grid-cols-4 gap-8">

        @include('components.settings.layout-user')

        <div class="col-span-3">
            <div class="border rounded-xl p-6">

                <h2 class="text-xl font-semibold text-gray-800">
                    Profil saya
                </h2>
                <p class="text-sm text-gray-500 mb-4">
                    Perbarui informasi akun Anda
                </p>

                <hr class="mb-4">

                <form wire:submit="updateProfileInformation" class="space-y-5">

                    <div class="grid grid-cols-3 items-center">
                        <span class="text-sm text-gray-500">Nama</span>

                        <input
                            type="text"
                            wire:model="name"
                            class="col-span-2 w-full border rounded px-3 py-2 text-sm focus:ring-2 focus:ring-green-600 outline-none"
                        >
                    </div>

                    @error('name')
                        <p class="text-red-500 text-xs ml-[33%]">
                            {{ $message }}
                        </p>
                    @enderror

                    <div class="grid grid-cols-3 items-center">
                        <span class="text-sm text-gray-500">Email</span>

                        <input
                            type="email"
                            wire:model="email"
                            class="col-span-2 w-full border rounded px-3 py-2 text-sm focus:ring-2 focus:ring-green-600 outline-none"
                        >
                    </div>

                    @error('email')
                        <p class="text-red-500 text-xs ml-[33%]">
                            {{ $message }}
                        </p>
                    @enderror

                    <div class="grid grid-cols-3">
                        <div></div>

                        <div class="col-span-2 flex items-center gap-4">
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
