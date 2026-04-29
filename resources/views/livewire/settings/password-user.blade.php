@section('title', 'Password')

<div class="max-w-4xl mx-auto mt-10 bg-white rounded-2xl p-8 shadow-sm m-10">
    <div class="grid grid-cols-4 gap-8">

        @include('components.settings.layout-user')

        <div class="col-span-3">
            <div class="border rounded-xl p-6">

                <h2 class="text-xl font-semibold text-gray-800">
                    Perbarui Password
                </h2>
                <p class="text-sm text-gray-500 mb-4">
                    Perbarui password untuk menjaga keamanan akun Anda.
                </p>

                <hr class="mb-4">

                <div class="space-y-5">

                    <div class="grid grid-cols-3 items-center">
                        <span class="text-sm text-gray-500">Password Saat Ini</span>
                        <input type="password" class="col-span-2 w-full border rounded px-3 py-2 text-sm focus:ring-2 focus:ring-green-600 outline-none">
                    </div>

                    <div class="grid grid-cols-3 items-center">
                        <span class="text-sm text-gray-500">Password Baru</span>
                        <input type="password" class="col-span-2 w-full border rounded px-3 py-2 text-sm focus:ring-2 focus:ring-green-600 outline-none">
                    </div>

                    <div class="grid grid-cols-3 items-center">
                        <span class="text-sm text-gray-500">Konfirmasi Password</span>
                        <input type="password" class="col-span-2 w-full border rounded px-3 py-2 text-sm focus:ring-2 focus:ring-green-600 outline-none">
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


            </div>
        </div>

    </div>
</div>

