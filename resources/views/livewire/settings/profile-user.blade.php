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

                <div class="space-y-5">

                    <div class="grid grid-cols-3 items-center">
                        <span class="text-sm text-gray-500">Nama</span>
                        <input type="text" value="{{ auth()->user()->name }}" class="col-span-2 w-full border rounded px-3 py-2 text-sm focus:ring-2 focus:ring-green-600 outline-none">
                    </div>

                    <div class="grid grid-cols-3 items-center">
                        <span class="text-sm text-gray-500">Email</span>
                        <input type="email" value="{{ auth()->user()->email }}" class="col-span-2 w-full border rounded px-3 py-2 text-sm focus:ring-2 focus:ring-green-600 outline-none">
                    </div>

                    <div class="grid grid-cols-3">
                        <div></div>
                        <div class="col-span-2">
                            <button class="bg-yellow-500 hover:bg-yellow-600 text-white px-5 py-2 rounded">
                            Simpan
                            </button>
                        </div>
                    </div>

                </div>

                <div>
                    <h3 class="text-sm font-semibold text-gray-800 mb-2">
                        Hapus akun
                    </h3>
                    <p class="text-xs text-gray-500 mb-4">
                        Menghapus akun akan menghilangkan seluruh data akun Anda secara permanen.
                    </p>

                    <div class="flex justify-center">
                        <button class="bg-red-600 hover:bg-red-700 text-white text-sm px-4 py-2 rounded">
                        Hapus Akun
                    </button>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
