@section('title', 'Laporan')

<x-layouts.app :title="__('Laporan')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div>
            <h1 class="font-semibold text-3xl">Laporan FeedGo</h1>
            <span class="font-light">Ringkasan penjualan, pembayaran, dan aktivitas pesanan</span>
        </div>

        <div class="grid auto-rows-min gap-10 md:grid-cols-5">
            <div class="relative overflow-hidden rounded-xl p-1 text-center border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-800">
                <div class="flex items-center gap-3 p-3 justify-center">
                    <div class="bg-[#EAAA00] rounded-xl p-3 flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="38" height="47" viewBox="0 0 38 47" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M1.58708 1.58708C-1.61429e-07 3.17417 0 5.72542 0 10.8333V35.2083C0 40.3163 -1.61429e-07 42.8675 1.58708 44.4546C3.17417 46.0417 5.72542 46.0417 10.8333 46.0417H27.0833C32.1913 46.0417 34.7425 46.0417 36.3296 44.4546C37.9167 42.8675 37.9167 40.3163 37.9167 35.2083V10.8333C37.9167 5.72542 37.9167 3.17417 36.3296 1.58708C34.7425 -1.61429e-07 32.1913 0 27.0833 0H10.8333C5.72542 0 3.17417 -1.61429e-07 1.58708 1.58708ZM10.8333 10.8333C10.115 10.8333 9.42616 11.1187 8.91825 11.6266C8.41034 12.1345 8.125 12.8234 8.125 13.5417C8.125 14.26 8.41034 14.9488 8.91825 15.4567C9.42616 15.9647 10.115 16.25 10.8333 16.25H27.0833C27.8016 16.25 28.4905 15.9647 28.9984 15.4567C29.5063 14.9488 29.7917 14.26 29.7917 13.5417C29.7917 12.8234 29.5063 12.1345 28.9984 11.6266C28.4905 11.1187 27.8016 10.8333 27.0833 10.8333H10.8333ZM10.8333 21.6667C10.115 21.6667 9.42616 21.952 8.91825 22.4599C8.41034 22.9678 8.125 23.6567 8.125 24.375C8.125 25.0933 8.41034 25.7822 8.91825 26.2901C9.42616 26.798 10.115 27.0833 10.8333 27.0833H27.0833C27.8016 27.0833 28.4905 26.798 28.9984 26.2901C29.5063 25.7822 29.7917 25.0933 29.7917 24.375C29.7917 23.6567 29.5063 22.9678 28.9984 22.4599C28.4905 21.952 27.8016 21.6667 27.0833 21.6667H10.8333ZM10.8333 32.5C10.115 32.5 9.42616 32.7853 8.91825 33.2933C8.41034 33.8012 8.125 34.49 8.125 35.2083C8.125 35.9266 8.41034 36.6155 8.91825 37.1234C9.42616 37.6313 10.115 37.9167 10.8333 37.9167H21.6667C22.385 37.9167 23.0738 37.6313 23.5817 37.1234C24.0897 36.6155 24.375 35.9266 24.375 35.2083C24.375 34.49 24.0897 33.8012 23.5817 33.2933C23.0738 32.7853 22.385 32.5 21.6667 32.5H10.8333Z" fill="white"/>
                        </svg>
                    </div>
                    <h2 class="font-bold text-4xl">95</h2>
                </div>
                <div class="mb-2">
                    <span class="font-bold text-sm">Pesanan bulan ini</span>
                </div>
            </div>
            <div class="relative overflow-hidden rounded-xl p-1 text-center border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-800">
                <div class="flex items-center gap-3 p-3 justify-center">
                    <div class="bg-[#EAAA00] rounded-xl p-3 flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" viewBox="0 0 46 46" fill="none">
                            <path d="M10.0625 8.625C8.15626 8.625 6.32809 9.38225 4.98017 10.7302C3.63225 12.0781 2.875 13.9063 2.875 15.8125V17.25H43.125V15.8125C43.125 13.9063 42.3677 12.0781 41.0198 10.7302C39.6719 9.38225 37.8437 8.625 35.9375 8.625H10.0625ZM43.125 20.125H2.875V30.1875C2.875 32.0937 3.63225 33.9219 4.98017 35.2698C6.32809 36.6177 8.15626 37.375 10.0625 37.375H35.9375C37.8437 37.375 39.6719 36.6177 41.0198 35.2698C42.3677 33.9219 43.125 32.0937 43.125 30.1875V20.125ZM30.1875 28.75H35.9375C36.3187 28.75 36.6844 28.9014 36.954 29.171C37.2235 29.4406 37.375 29.8063 37.375 30.1875C37.375 30.5687 37.2235 30.9344 36.954 31.204C36.6844 31.4736 36.3187 31.625 35.9375 31.625H30.1875C29.8063 31.625 29.4406 31.4736 29.171 31.204C28.9014 30.9344 28.75 30.5687 28.75 30.1875C28.75 29.8063 28.9014 29.4406 29.171 29.171C29.4406 28.9014 29.8063 28.75 30.1875 28.75Z" fill="white"/>
                        </svg>
                    </div>
                    <h2 class="font-bold text-4xl">95</h2>
                </div>
                <div class="mb-2">
                    <span class="font-bold text-sm">pembayaran diverifikasi</span>
                </div>
            </div>
            <div class="relative overflow-hidden rounded-xl p-1 text-center border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-800">
                <div class="flex items-center gap-3 p-3 justify-center">
                    <div class="bg-[#EAAA00] rounded-xl p-3 flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="38" height="47" viewBox="0 0 38 47" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M1.58708 1.58708C-1.61429e-07 3.17417 0 5.72542 0 10.8333V35.2083C0 40.3163 -1.61429e-07 42.8675 1.58708 44.4546C3.17417 46.0417 5.72542 46.0417 10.8333 46.0417H27.0833C32.1913 46.0417 34.7425 46.0417 36.3296 44.4546C37.9167 42.8675 37.9167 40.3163 37.9167 35.2083V10.8333C37.9167 5.72542 37.9167 3.17417 36.3296 1.58708C34.7425 -1.61429e-07 32.1913 0 27.0833 0H10.8333C5.72542 0 3.17417 -1.61429e-07 1.58708 1.58708ZM10.8333 10.8333C10.115 10.8333 9.42616 11.1187 8.91825 11.6266C8.41034 12.1345 8.125 12.8234 8.125 13.5417C8.125 14.26 8.41034 14.9488 8.91825 15.4567C9.42616 15.9647 10.115 16.25 10.8333 16.25H27.0833C27.8016 16.25 28.4905 15.9647 28.9984 15.4567C29.5063 14.9488 29.7917 14.26 29.7917 13.5417C29.7917 12.8234 29.5063 12.1345 28.9984 11.6266C28.4905 11.1187 27.8016 10.8333 27.0833 10.8333H10.8333ZM10.8333 21.6667C10.115 21.6667 9.42616 21.952 8.91825 22.4599C8.41034 22.9678 8.125 23.6567 8.125 24.375C8.125 25.0933 8.41034 25.7822 8.91825 26.2901C9.42616 26.798 10.115 27.0833 10.8333 27.0833H27.0833C27.8016 27.0833 28.4905 26.798 28.9984 26.2901C29.5063 25.7822 29.7917 25.0933 29.7917 24.375C29.7917 23.6567 29.5063 22.9678 28.9984 22.4599C28.4905 21.952 27.8016 21.6667 27.0833 21.6667H10.8333ZM10.8333 32.5C10.115 32.5 9.42616 32.7853 8.91825 33.2933C8.41034 33.8012 8.125 34.49 8.125 35.2083C8.125 35.9266 8.41034 36.6155 8.91825 37.1234C9.42616 37.6313 10.115 37.9167 10.8333 37.9167H21.6667C22.385 37.9167 23.0738 37.6313 23.5817 37.1234C24.0897 36.6155 24.375 35.9266 24.375 35.2083C24.375 34.49 24.0897 33.8012 23.5817 33.2933C23.0738 32.7853 22.385 32.5 21.6667 32.5H10.8333Z" fill="white"/>
                        </svg>
                    </div>
                    <h2 class="font-bold text-4xl">95</h2>
                </div>
                <div class="mb-2">
                    <span class="font-bold text-sm">Pesanan dikirim</span>
                </div>
            </div>
            <div class="relative overflow-hidden rounded-xl p-1 text-center border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-800">
                <div class="flex items-center gap-3 p-3 justify-center">
                    <div class="bg-[#EAAA00] rounded-xl p-3 flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="38" height="47" viewBox="0 0 38 47" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M1.58708 1.58708C-1.61429e-07 3.17417 0 5.72542 0 10.8333V35.2083C0 40.3163 -1.61429e-07 42.8675 1.58708 44.4546C3.17417 46.0417 5.72542 46.0417 10.8333 46.0417H27.0833C32.1913 46.0417 34.7425 46.0417 36.3296 44.4546C37.9167 42.8675 37.9167 40.3163 37.9167 35.2083V10.8333C37.9167 5.72542 37.9167 3.17417 36.3296 1.58708C34.7425 -1.61429e-07 32.1913 0 27.0833 0H10.8333C5.72542 0 3.17417 -1.61429e-07 1.58708 1.58708ZM10.8333 10.8333C10.115 10.8333 9.42616 11.1187 8.91825 11.6266C8.41034 12.1345 8.125 12.8234 8.125 13.5417C8.125 14.26 8.41034 14.9488 8.91825 15.4567C9.42616 15.9647 10.115 16.25 10.8333 16.25H27.0833C27.8016 16.25 28.4905 15.9647 28.9984 15.4567C29.5063 14.9488 29.7917 14.26 29.7917 13.5417C29.7917 12.8234 29.5063 12.1345 28.9984 11.6266C28.4905 11.1187 27.8016 10.8333 27.0833 10.8333H10.8333ZM10.8333 21.6667C10.115 21.6667 9.42616 21.952 8.91825 22.4599C8.41034 22.9678 8.125 23.6567 8.125 24.375C8.125 25.0933 8.41034 25.7822 8.91825 26.2901C9.42616 26.798 10.115 27.0833 10.8333 27.0833H27.0833C27.8016 27.0833 28.4905 26.798 28.9984 26.2901C29.5063 25.7822 29.7917 25.0933 29.7917 24.375C29.7917 23.6567 29.5063 22.9678 28.9984 22.4599C28.4905 21.952 27.8016 21.6667 27.0833 21.6667H10.8333ZM10.8333 32.5C10.115 32.5 9.42616 32.7853 8.91825 33.2933C8.41034 33.8012 8.125 34.49 8.125 35.2083C8.125 35.9266 8.41034 36.6155 8.91825 37.1234C9.42616 37.6313 10.115 37.9167 10.8333 37.9167H21.6667C22.385 37.9167 23.0738 37.6313 23.5817 37.1234C24.0897 36.6155 24.375 35.9266 24.375 35.2083C24.375 34.49 24.0897 33.8012 23.5817 33.2933C23.0738 32.7853 22.385 32.5 21.6667 32.5H10.8333Z" fill="white"/>
                        </svg>
                    </div>
                    <h2 class="font-bold text-4xl">95</h2>
                </div>
                <div class="mb-2">
                    <span class="font-bold text-sm">Pesanan baru minggu ini</span>
                </div>
            </div>
            <div class="relative overflow-hidden rounded-xl p-1 text-center border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-800">
                <div class="flex items-center gap-3 p-3 justify-center">
                    <div class="bg-[#EAAA00] rounded-xl p-3 flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" viewBox="0 0 46 46" fill="none">
                            <path d="M10.0625 8.625C8.15626 8.625 6.32809 9.38225 4.98017 10.7302C3.63225 12.0781 2.875 13.9063 2.875 15.8125V17.25H43.125V15.8125C43.125 13.9063 42.3677 12.0781 41.0198 10.7302C39.6719 9.38225 37.8437 8.625 35.9375 8.625H10.0625ZM43.125 20.125H2.875V30.1875C2.875 32.0937 3.63225 33.9219 4.98017 35.2698C6.32809 36.6177 8.15626 37.375 10.0625 37.375H35.9375C37.8437 37.375 39.6719 36.6177 41.0198 35.2698C42.3677 33.9219 43.125 32.0937 43.125 30.1875V20.125ZM30.1875 28.75H35.9375C36.3187 28.75 36.6844 28.9014 36.954 29.171C37.2235 29.4406 37.375 29.8063 37.375 30.1875C37.375 30.5687 37.2235 30.9344 36.954 31.204C36.6844 31.4736 36.3187 31.625 35.9375 31.625H30.1875C29.8063 31.625 29.4406 31.4736 29.171 31.204C28.9014 30.9344 28.75 30.5687 28.75 30.1875C28.75 29.8063 28.9014 29.4406 29.171 29.171C29.4406 28.9014 29.8063 28.75 30.1875 28.75Z" fill="white"/>
                        </svg>
                    </div>
                    <h2 class="font-bold text-4xl">95</h2>
                </div>
                <div class="mb-2">
                    <span class="font-bold text-sm">Pembayaran menunggu</span>
                </div>
            </div>
        </div>

        <div class="flex flex-wrap items-center gap-3 bg-gray-50 dark:bg-neutral-700/50 p-4 rounded-lg">
            <div class="flex flex-wrap items-center gap-3">
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600 dark:text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                    </svg>
                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Filter By</span>
                </div>
            </div>

            <button class="flex items-center gap-2 px-4 py-2 text-sm border border-gray-300 dark:border-neutral-600
                       rounded-lg bg-white dark:bg-neutral-800 text-gray-700 dark:text-gray-300
                       hover:bg-gray-50 dark:hover:bg-neutral-700 transition">
                <span>Metode Pembayaran</span>
            </button>

            <select
                    class="px-4 py-2 text-sm border border-gray-300 dark:border-neutral-600
                           rounded-lg bg-white dark:bg-neutral-800 text-gray-700 dark:text-gray-300
                           focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <option value="">Status</option>
                <option value="pending">Tertunda</option>
                <option value="processing">Diproses</option>
                <option value="completed">Selesai</option>
                <option value="cancelled">Dibatalkan</option>
            </select>

            <button class="flex items-center gap-2 px-4 py-2 text-sm border border-gray-300 dark:border-neutral-600
                       rounded-lg bg-white dark:bg-neutral-800 text-gray-700 dark:text-gray-300
                       hover:bg-gray-50 dark:hover:bg-neutral-700 transition">
                <span>Rentang Tanggal</span>
            </button>

            <div class=" w-full md:w-auto ml-auto">
                <div class="relative max-w-md">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input type="text"
                    placeholder="Cari ID Pesanan / Nama Pemesan"
                    class="px-4 pl-10 py-2 text-sm border border-gray-300 dark:border-neutral-600
                           rounded-lg bg-white dark:bg-neutral-800 text-gray-700 dark:text-gray-300
                           focus:ring-2 focus:ring-blue-500 focus:border-transparent
                           placeholder:text-gray-400"/>
                </div>
            </div>

        </div>

        <div class="overflow-x-auto bg-white dark:bg-neutral-800 rounded-xl shadow-sm">
            <table class="w-full text-sm">
                <thead class="bg-gray-50 dark:bg-neutral-700/50 border-b border-gray-200 dark:border-neutral-700">
                    <tr>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            Tanggal pembayaran
                        </th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            ID Pesanan
                        </th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            Pembeli
                        </th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            metode
                        </th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            Status pembayaran
                        </th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            Total
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                    <tr class="hover:bg-gray-50 dark:hover:bg-neutral-700/50 transition text-center">
                        <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-100">
                            07 janu 2025
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-100">
                            001
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-100">
                            Mirza
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-100">
                            QRIS
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-100">
                            Dibyara
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-100">
                            Rp. 70.000
                        </td>
                    </tr>
                    {{-- @empty
                    <tr>
                        <td colspan="6" class="px-6 py-10 text-center text-gray-400 dark:text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                            </svg>
                            Belum ada pesanan
                        </td>
                    </tr>
                    @endforelse --}}
                </tbody>
            </table>
        </div>

    </div>
</x-layouts.app>
