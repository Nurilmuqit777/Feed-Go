<div>

    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">

        <div>
            <h1 class="font-semibold text-3xl">Laporan FeedGo</h1>
            <span class="font-light">Ringkasan penjualan, pembayaran, dan aktivitas pesanan</span>
        </div>

        <div class="grid auto-rows-min gap-4 md:grid-cols-5">
            <div class="relative overflow-hidden rounded-xl p-1 text-center border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-800">
                <div class="flex items-center gap-3 p-3 justify-center">
                    <div class="bg-[#EAAA00] rounded-xl p-3 flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="38" height="47" viewBox="0 0 38 47" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M1.58708 1.58708C-1.61429e-07 3.17417 0 5.72542 0 10.8333V35.2083C0 40.3163 -1.61429e-07 42.8675 1.58708 44.4546C3.17417 46.0417 5.72542 46.0417 10.8333 46.0417H27.0833C32.1913 46.0417 34.7425 46.0417 36.3296 44.4546C37.9167 42.8675 37.9167 40.3163 37.9167 35.2083V10.8333C37.9167 5.72542 37.9167 3.17417 36.3296 1.58708C34.7425 -1.61429e-07 32.1913 0 27.0833 0H10.8333C5.72542 0 3.17417 -1.61429e-07 1.58708 1.58708ZM10.8333 10.8333C10.115 10.8333 9.42616 11.1187 8.91825 11.6266C8.41034 12.1345 8.125 12.8234 8.125 13.5417C8.125 14.26 8.41034 14.9488 8.91825 15.4567C9.42616 15.9647 10.115 16.25 10.8333 16.25H27.0833C27.8016 16.25 28.4905 15.9647 28.9984 15.4567C29.5063 14.9488 29.7917 14.26 29.7917 13.5417C29.7917 12.8234 29.5063 12.1345 28.9984 11.6266C28.4905 11.1187 27.8016 10.8333 27.0833 10.8333H10.8333ZM10.8333 21.6667C10.115 21.6667 9.42616 21.952 8.91825 22.4599C8.41034 22.9678 8.125 23.6567 8.125 24.375C8.125 25.0933 8.41034 25.7822 8.91825 26.2901C9.42616 26.798 10.115 27.0833 10.8333 27.0833H27.0833C27.8016 27.0833 28.4905 26.798 28.9984 26.2901C29.5063 25.7822 29.7917 25.0933 29.7917 24.375C29.7917 23.6567 29.5063 22.9678 28.9984 22.4599C28.4905 21.952 27.8016 21.6667 27.0833 21.6667H10.8333ZM10.8333 32.5C10.115 32.5 9.42616 32.7853 8.91825 33.2933C8.41034 33.8012 8.125 34.49 8.125 35.2083C8.125 35.9266 8.41034 36.6155 8.91825 37.1234C9.42616 37.6313 10.115 37.9167 10.8333 37.9167H21.6667C22.385 37.9167 23.0738 37.6313 23.5817 37.1234C24.0897 36.6155 24.375 35.9266 24.375 35.2083C24.375 34.49 24.0897 33.8012 23.5817 33.2933C23.0738 32.7853 22.385 32.5 21.6667 32.5H10.8333Z" fill="white"/>
                        </svg>
                    </div>
                    <h2 class="font-bold text-4xl">
                        {{ $statistics['ordersThisMonth'] }}
                    </h2>
                </div>
                <div class="mb-2">
                    <span class="font-bold text-sm">
                        Pesanan bulan ini
                    </span>
                </div>
            </div>
            <div class="relative overflow-hidden rounded-xl p-1 text-center border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-800">
                <div class="flex items-center gap-3 p-3 justify-center">
                    <div class="bg-[#EAAA00] rounded-xl p-3 flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" viewBox="0 0 46 46" fill="none">
                            <path d="M10.0625 8.625C8.15626 8.625 6.32809 9.38225 4.98017 10.7302C3.63225 12.0781 2.875 13.9063 2.875 15.8125V17.25H43.125V15.8125C43.125 13.9063 42.3677 12.0781 41.0198 10.7302C39.6719 9.38225 37.8437 8.625 35.9375 8.625H10.0625ZM43.125 20.125H2.875V30.1875C2.875 32.0937 3.63225 33.9219 4.98017 35.2698C6.32809 36.6177 8.15626 37.375 10.0625 37.375H35.9375C37.8437 37.375 39.6719 36.6177 41.0198 35.2698C42.3677 33.9219 43.125 32.0937 43.125 30.1875V20.125ZM30.1875 28.75H35.9375C36.3187 28.75 36.6844 28.9014 36.954 29.171C37.2235 29.4406 37.375 29.8063 37.375 30.1875C37.375 30.5687 37.2235 30.9344 36.954 31.204C36.6844 31.4736 36.3187 31.625 35.9375 31.625H30.1875C29.8063 31.625 29.4406 31.4736 29.171 31.204C28.9014 30.9344 28.75 30.5687 28.75 30.1875C28.75 29.8063 28.9014 29.4406 29.171 29.171C29.4406 28.9014 29.8063 28.75 30.1875 28.75Z" fill="white"/>
                        </svg>
                    </div>
                    <h2 class="font-bold text-4xl">
                        {{ $statistics['verifiedPayments'] }}
                    </h2>
                </div>
                <div class="mb-2">
                    <span class="font-bold text-sm">
                        Pembayaran diverifikasi
                    </span>
                </div>
            </div>
            <div class="relative overflow-hidden rounded-xl p-1 text-center border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-800">
                <div class="flex items-center gap-3 p-3 justify-center">
                    <div class="bg-[#EAAA00] rounded-xl p-3 flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="38" height="47" viewBox="0 0 38 47" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M1.58708 1.58708C-1.61429e-07 3.17417 0 5.72542 0 10.8333V35.2083C0 40.3163 -1.61429e-07 42.8675 1.58708 44.4546C3.17417 46.0417 5.72542 46.0417 10.8333 46.0417H27.0833C32.1913 46.0417 34.7425 46.0417 36.3296 44.4546C37.9167 42.8675 37.9167 40.3163 37.9167 35.2083V10.8333C37.9167 5.72542 37.9167 3.17417 36.3296 1.58708C34.7425 -1.61429e-07 32.1913 0 27.0833 0H10.8333C5.72542 0 3.17417 -1.61429e-07 1.58708 1.58708ZM10.8333 10.8333C10.115 10.8333 9.42616 11.1187 8.91825 11.6266C8.41034 12.1345 8.125 12.8234 8.125 13.5417C8.125 14.26 8.41034 14.9488 8.91825 15.4567C9.42616 15.9647 10.115 16.25 10.8333 16.25H27.0833C27.8016 16.25 28.4905 15.9647 28.9984 15.4567C29.5063 14.9488 29.7917 14.26 29.7917 13.5417C29.7917 12.8234 29.5063 12.1345 28.9984 11.6266C28.4905 11.1187 27.8016 10.8333 27.0833 10.8333H10.8333ZM10.8333 21.6667C10.115 21.6667 9.42616 21.952 8.91825 22.4599C8.41034 22.9678 8.125 23.6567 8.125 24.375C8.125 25.0933 8.41034 25.7822 8.91825 26.2901C9.42616 26.798 10.115 27.0833 10.8333 27.0833H27.0833C27.8016 27.0833 28.4905 26.798 28.9984 26.2901C29.5063 25.7822 29.7917 25.0933 29.7917 24.375C29.7917 23.6567 29.5063 22.9678 28.9984 22.4599C28.4905 21.952 27.8016 21.6667 27.0833 21.6667H10.8333ZM10.8333 32.5C10.115 32.5 9.42616 32.7853 8.91825 33.2933C8.41034 33.8012 8.125 34.49 8.125 35.2083C8.125 35.9266 8.41034 36.6155 8.91825 37.1234C9.42616 37.6313 10.115 37.9167 10.8333 37.9167H21.6667C22.385 37.9167 23.0738 37.6313 23.5817 37.1234C24.0897 36.6155 24.375 35.9266 24.375 35.2083C24.375 34.49 24.0897 33.8012 23.5817 33.2933C23.0738 32.7853 22.385 32.5 21.6667 32.5H10.8333Z" fill="white"/>
                        </svg>
                    </div>
                    <h2 class="font-bold text-4xl">
                        {{ $statistics['ordersShipped'] }}
                    </h2>
                </div>
                <div class="mb-2">
                    <span class="font-bold text-sm">
                        Pesanan dikirim
                    </span>
                </div>
            </div>
            <div class="relative overflow-hidden rounded-xl p-1 text-center border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-800">
                <div class="flex items-center gap-3 p-3 justify-center">
                    <div class="bg-[#EAAA00] rounded-xl p-3 flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="38" height="47" viewBox="0 0 38 47" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M1.58708 1.58708C-1.61429e-07 3.17417 0 5.72542 0 10.8333V35.2083C0 40.3163 -1.61429e-07 42.8675 1.58708 44.4546C3.17417 46.0417 5.72542 46.0417 10.8333 46.0417H27.0833C32.1913 46.0417 34.7425 46.0417 36.3296 44.4546C37.9167 42.8675 37.9167 40.3163 37.9167 35.2083V10.8333C37.9167 5.72542 37.9167 3.17417 36.3296 1.58708C34.7425 -1.61429e-07 32.1913 0 27.0833 0H10.8333C5.72542 0 3.17417 -1.61429e-07 1.58708 1.58708ZM10.8333 10.8333C10.115 10.8333 9.42616 11.1187 8.91825 11.6266C8.41034 12.1345 8.125 12.8234 8.125 13.5417C8.125 14.26 8.41034 14.9488 8.91825 15.4567C9.42616 15.9647 10.115 16.25 10.8333 16.25H27.0833C27.8016 16.25 28.4905 15.9647 28.9984 15.4567C29.5063 14.9488 29.7917 14.26 29.7917 13.5417C29.7917 12.8234 29.5063 12.1345 28.9984 11.6266C28.4905 11.1187 27.8016 10.8333 27.0833 10.8333H10.8333ZM10.8333 21.6667C10.115 21.6667 9.42616 21.952 8.91825 22.4599C8.41034 22.9678 8.125 23.6567 8.125 24.375C8.125 25.0933 8.41034 25.7822 8.91825 26.2901C9.42616 26.798 10.115 27.0833 10.8333 27.0833H27.0833C27.8016 27.0833 28.4905 26.798 28.9984 26.2901C29.5063 25.7822 29.7917 25.0933 29.7917 24.375C29.7917 23.6567 29.5063 22.9678 28.9984 22.4599C28.4905 21.952 27.8016 21.6667 27.0833 21.6667H10.8333ZM10.8333 32.5C10.115 32.5 9.42616 32.7853 8.91825 33.2933C8.41034 33.8012 8.125 34.49 8.125 35.2083C8.125 35.9266 8.41034 36.6155 8.91825 37.1234C9.42616 37.6313 10.115 37.9167 10.8333 37.9167H21.6667C22.385 37.9167 23.0738 37.6313 23.5817 37.1234C24.0897 36.6155 24.375 35.9266 24.375 35.2083C24.375 34.49 24.0897 33.8012 23.5817 33.2933C23.0738 32.7853 22.385 32.5 21.6667 32.5H10.8333Z" fill="white"/>
                        </svg>
                    </div>
                    <h2 class="font-bold text-4xl">
                        {{ $statistics['newOrdersThisWeek'] }}
                    </h2>
                </div>
                <div class="mb-2">
                    <span class="font-bold text-sm">
                        Pesanan baru minggu ini
                    </span>
                </div>
            </div>
            <div class="relative overflow-hidden rounded-xl p-1 text-center border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-800">
                <div class="flex items-center gap-3 p-3 justify-center">
                    <div class="bg-[#EAAA00] rounded-xl p-3 flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" viewBox="0 0 46 46" fill="none">
                            <path d="M10.0625 8.625C8.15626 8.625 6.32809 9.38225 4.98017 10.7302C3.63225 12.0781 2.875 13.9063 2.875 15.8125V17.25H43.125V15.8125C43.125 13.9063 42.3677 12.0781 41.0198 10.7302C39.6719 9.38225 37.8437 8.625 35.9375 8.625H10.0625ZM43.125 20.125H2.875V30.1875C2.875 32.0937 3.63225 33.9219 4.98017 35.2698C6.32809 36.6177 8.15626 37.375 10.0625 37.375H35.9375C37.8437 37.375 39.6719 36.6177 41.0198 35.2698C42.3677 33.9219 43.125 32.0937 43.125 30.1875V20.125ZM30.1875 28.75H35.9375C36.3187 28.75 36.6844 28.9014 36.954 29.171C37.2235 29.4406 37.375 29.8063 37.375 30.1875C37.375 30.5687 37.2235 30.9344 36.954 31.204C36.6844 31.4736 36.3187 31.625 35.9375 31.625H30.1875C29.8063 31.625 29.4406 31.4736 29.171 31.204C28.9014 30.9344 28.75 30.5687 28.75 30.1875C28.75 29.8063 28.9014 29.4406 29.171 29.171C29.4406 28.9014 29.8063 28.75 30.1875 28.75Z" fill="white"/>
                        </svg>
                    </div>
                    <h2 class="font-bold text-4xl">
                        {{ $statistics['pendingPayments'] }}
                    </h2>
                </div>
                <div class="mb-2">
                    <span class="font-bold text-sm">
                        Pembayaran menunggu
                    </span>
                </div>
            </div>
        </div>

        <div class="flex flex-col md:flex-row gap-3 bg-gray-50 dark:bg-neutral-700/50 p-4 rounded-lg ">

            <div class="flex flex-wrap items-center gap-3 flex-1">

                <div class="relative"
                    x-data="{
                        open: false,
                        startDate: @entangle('dateFrom'),
                        endDate: @entangle('dateTo')
                    }"
                >

                    <button
                        type="button"
                        @click="open = !open"
                        class="flex items-center justify-center gap-2 px-4 py-2 text-sm border border-gray-300 dark:border-neutral-600 rounded-lg bg-white dark:bg-neutral-800 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-neutral-700 transition-all duration-200 h-[38px]"
                        :class="startDate || endDate ? 'ring-2 ring-green-500 border-green-500 text-green-600 dark:text-green-400' : '' ">

                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>

                        <span x-text=" startDate && endDate ? `${startDate} - ${endDate}` : startDate ? startDate : endDate ? endDate : 'Tanggal' "></span>

                        <svg class="w-4 h-4 transition-transform duration-300" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>

                    </button>

                    <div
                        x-show="open"
                        @click.outside="open = false"

                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 scale-95 -translate-y-2"
                        x-transition:enter-end="opacity-100 scale-100 translate-y-0"

                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                        x-transition:leave-end="opacity-0 scale-95 -translate-y-2"

                        x-cloak

                        class="absolute left-0 mt-2 w-72 bg-white dark:bg-neutral-800 border border-gray-200 dark:border-neutral-700 rounded-xl shadow-xl z-50 p-4 space-y-4"
                    >

                        <div>
                            <label class=" block text-xs font-medium text-gray-500 dark:text-gray-400 mb-1 ">
                                Dari
                            </label>
                            <input type="date" wire:model.live="dateFrom" class=" w-full h-[38px] px-3 text-sm border border-gray-300 dark:border-neutral-600 rounded-lg bg-white dark:bg-neutral-900 text-gray-700 dark:text-gray-300 focus:ring-2 focus:ring-green-500 focus:outline-none transition ">
                        </div>

                        <div>
                            <label class=" block text-xs font-medium text-gray-500 dark:text-gray-400 mb-1 ">
                                Sampai
                            </label>
                            <input type="date" wire:model.live="dateTo" class=" w-full h-[38px] px-3 text-sm border border-gray-300 dark:border-neutral-600 rounded-lg bg-white dark:bg-neutral-900 text-gray-700 dark:text-gray-300 focus:ring-2 focus:ring-green-500 focus:outline-none transition ">
                        </div>

                        <div class=" border-t border-gray-200 dark:border-neutral-700 pt-3 ">

                            <p class=" text-xs font-medium text-gray-500 dark:text-gray-400 mb-2 ">
                                Pilihan cepat
                            </p>


                            <div class="flex flex-wrap gap-2">

                                <button
                                    type="button"
                                    @click="
                                        const t = new Date().toISOString().split('T')[0];

                                        startDate = t;
                                        endDate = t;

                                        $wire.set('dateFrom', startDate);
                                        $wire.set('dateTo', endDate);

                                        open = false;
                                    "
                                    class=" px-3 py-1.5 text-xs rounded-lg bg-gray-100 dark:bg-neutral-700 hover:bg-gray-200 dark:hover:bg-neutral-600 transition-all duration-200 hover:scale-105 active:scale-95 ">
                                    Hari ini
                                </button>

                                <button
                                    type="button"
                                    @click="
                                        const e = new Date();
                                        const s = new Date();

                                        s.setDate(s.getDate() - 6);

                                        startDate = s.toISOString().split('T')[0];
                                        endDate = e.toISOString().split('T')[0];

                                        $wire.set('dateFrom', startDate);
                                        $wire.set('dateTo', endDate);

                                        open = false;
                                    "
                                    class=" px-3 py-1.5 text-xs rounded-lg bg-gray-100 dark:bg-neutral-700 hover:bg-gray-200 dark:hover:bg-neutral-600 transition-all duration-200 hover:scale-105 active:scale-95 " >
                                    7 hari terakhir
                                </button>

                                <button
                                    type="button"
                                    @click="
                                        const n = new Date();
                                        const s = new Date(
                                            n.getFullYear(),
                                            n.getMonth(),
                                            1
                                        );

                                        startDate = s.toISOString().split('T')[0];
                                        endDate = n.toISOString().split('T')[0];

                                        $wire.set('dateFrom', startDate);
                                        $wire.set('dateTo', endDate);

                                        open = false;
                                    "
                                    class=" px-3 py-1.5 text-xs rounded-lg bg-gray-100 dark:bg-neutral-700 hover:bg-gray-200 dark:hover:bg-neutral-600 transition-all duration-200 hover:scale-105 active:scale-95 " >
                                    Bulan ini
                                </button>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="relative" x-data="{ open: false }" >

                    <button
                        type="button"
                        @click="open = !open"
                        class=" flex items-center justify-center gap-2 px-4 py-2 text-sm border border-gray-300 dark:border-neutral-600 rounded-lg bg-white dark:bg-neutral-800 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-neutral-700 transition-all duration-200 h-[38px] "
                        :class=" $wire.paymentMethod ? 'ring-2 ring-green-500 border-green-500 text-green-600 dark:text-green-400' : '' " >

                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 10h18M5 6h14a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2z" />
                        </svg>


                        <span>
                            @if ($paymentMethod)
                                {{ strtoupper($paymentMethod) }}
                            @else
                                Metode Pembayaran
                            @endif
                        </span>


                        <svg class="w-4 h-4 transition-transform duration-300" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24" >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>

                    </button>

                    <div
                        x-show="open"
                        @click.outside="open = false"

                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 scale-95 -translate-y-2"
                        x-transition:enter-end="opacity-100 scale-100 translate-y-0"

                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                        x-transition:leave-end="opacity-0 scale-95 -translate-y-2"

                        x-cloak

                        class=" absolute left-0 mt-2 w-56 bg-white dark:bg-neutral-800 border border-gray-200 dark:border-neutral-700 rounded-xl shadow-lg z-50 overflow-hidden "
                    >

                        <div class="py-1">

                            <button
                                type="button"
                                wire:click="$set('paymentMethod', '')"
                                @click="open = false"
                                class=" w-full text-left px-4 py-2.5 text-sm flex items-center gap-3 transition hover:bg-gray-50 dark:hover:bg-neutral-700 {{ $paymentMethod === '' ? 'text-green-600 dark:text-green-400 bg-green-50 dark:bg-green-900/20 font-semibold' : 'text-gray-700 dark:text-gray-300' }} " >

                                <span class="w-2 h-2 rounded-full bg-gray-400"></span>

                                Semua Metode

                                @if ($paymentMethod === '')
                                    <svg class="w-4 h-4 ml-auto" fill="currentColor" viewBox="0 0 20 20" >
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                @endif

                            </button>


                            <div class=" border-t border-gray-100 dark:border-neutral-700 my-1 " ></div>

                            @foreach ($paymentMethods as $method)

                                <button
                                    type="button"
                                    wire:click="$set('paymentMethod', '{{ $method }}')"
                                    @click="open = false"
                                    class=" w-full text-left px-4 py-2.5 text-sm flex items-center gap-3 transition hover:bg-gray-50 dark:hover:bg-neutral-700 {{ $paymentMethod === $method ? 'text-green-600 dark:text-green-400 bg-green-50 dark:bg-green-900/20 font-semibold' : 'text-gray-700 dark:text-gray-300' }} " >

                                    <span class="w-2 h-2 rounded-full bg-blue-500"></span>

                                    {{ strtoupper($method) }}

                                    @if ($paymentMethod === $method)

                                        <svg class="w-4 h-4 ml-auto" fill="currentColor" viewBox="0 0 20 20" >
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>

                                    @endif

                                </button>

                            @endforeach

                        </div>

                    </div>

                </div>

                <div class="relative" x-data="{ open: false }" >

                    <button
                        type="button"
                        @click="open = !open"
                        class=" flex items-center justify-center gap-2 px-4 py-2 text-sm border border-gray-300 dark:border-neutral-600 rounded-lg bg-white dark:bg-neutral-800 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-neutral-700 transition-all duration-200 h-[38px] "
                        :class=" $wire.status ? 'ring-2 ring-green-500 border-green-500' : '' " >

                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h10" />
                        </svg>


                        <span>

                            @switch($status)

                                @case('pending')
                                    Menunggu
                                    @break

                                @case('paid')
                                    Dibayar
                                    @break

                                @case('expired')
                                    Kedaluwarsa
                                    @break

                                @default
                                    Status Pembayaran

                            @endswitch

                        </span>

                        <svg class="w-4 h-4 transition-transform duration-300" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24" >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>

                    </button>

                    <div
                        x-show="open"
                        @click.outside="open = false"

                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 scale-95 -translate-y-2"
                        x-transition:enter-end="opacity-100 scale-100 translate-y-0"

                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                        x-transition:leave-end="opacity-0 scale-95 -translate-y-2"

                        x-cloak

                        class=" absolute left-0 mt-2 w-52 bg-white dark:bg-neutral-800 border border-gray-200 dark:border-neutral-700 rounded-xl shadow-lg z-50 overflow-hidden " >

                        <div class="py-1">

                            @php
                                $statuses = [
                                    '' => [ 'label' => 'Semua Status', 'dot' => 'bg-gray-400', 'active' => 'text-green-600 dark:text-green-400 bg-green-50 dark:bg-green-900/20', ],
                                    'pending' => [ 'label' => 'Menunggu', 'dot' => 'bg-yellow-500', 'active' => 'text-yellow-600 dark:text-yellow-400 bg-yellow-50 dark:bg-yellow-900/20', ],
                                    'paid' => [ 'label' => 'Dibayar', 'dot' => 'bg-green-500', 'active' => 'text-green-600 dark:text-green-400 bg-green-50 dark:bg-green-900/20', ],
                                    'expired' => [ 'label' => 'Kedaluwarsa', 'dot' => 'bg-gray-500', 'active' => 'text-gray-600 dark:text-gray-400 bg-gray-50 dark:bg-gray-900/20', ],
                                ];
                            @endphp

                            @foreach ($statuses as $value => $config)

                                @if ($value === 'pending')
                                    <div class=" border-t border-gray-100 dark:border-neutral-700 my-1 "></div>
                                @endif

                                <button
                                    type="button"
                                    wire:click="$set('status', '{{ $value }}')"
                                    @click="open = false"
                                    class=" w-full text-left px-4 py-2.5 text-sm flex items-center gap-3 transition hover:bg-gray-50 dark:hover:bg-neutral-700 {{$status === $value? $config['active'] . ' font-semibold': 'text-gray-700 dark:text-gray-300'}}">

                                    <span class=" w-2 h-2 rounded-full {{ $config['dot'] }} "></span>

                                    {{ $config['label'] }}

                                    @if ($status === $value)

                                        <svg class="w-4 h-4 ml-auto" fill="currentColor" viewBox="0 0 20 20" >
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>

                                    @endif

                                </button>

                            @endforeach

                        </div>

                    </div>

                </div>

                @if ( $search || $paymentMethod || $status || $dateFrom || $dateTo )

                    <button type="button" wire:click="resetFilters" class=" flex items-center gap-2 px-4 py-2 text-sm text-red-600 dark:text-red-400 border border-red-200 dark:border-red-900/50 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg transition-all duration-200 hover:scale-[1.02] active:scale-95 h-[38px] ">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Reset
                    </button>

                @endif

            </div>

            <div class="relative w-full md:w-72">

                <div class=" absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none " >
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" >
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>

                <input
                    type="text"
                    wire:model.live.debounce.300ms="search"
                    placeholder="No Transaksi/Nama Pembeli"
                    class=" w-full h-[38px] pl-10 pr-10 py-2 text-sm border border-gray-300 dark:border-neutral-600 rounded-lg bg-white dark:bg-neutral-800 text-gray-700 dark:text-gray-300 focus:ring-2 focus:ring-green-500 focus:border-green-500 focus:outline-none placeholder:text-gray-400 transition-all duration-200 " >

                <div
                    wire:loading
                    wire:target="search"
                    class=" absolute right-3 top-1/2 -translate-y-1/2 " >

                    <svg class="w-4 h-4 animate-spin text-[#5EB661]" viewBox="0 0 24 24" fill="none" >
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" ></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z" ></path>
                    </svg>

                </div>

            </div>

        </div>

        <div class="overflow-x-auto bg-white dark:bg-neutral-800 rounded-xl shadow-sm">

            <table class="w-full text-sm">

                <thead class="bg-gray-50 dark:bg-neutral-700/50 border-b border-gray-200 dark:border-neutral-700" >
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            No.
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            No. Transaksi
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            Tanggal Pembayaran
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            Pembeli
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            Metode
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            Total
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            Status
                        </th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">

                    @forelse ($payments as $index => $payment)

                        @php
                            $statusConfig = match ($payment->status) {
                                'pending' => [ 'label' => 'Menunggu', 'dot' => 'bg-yellow-500', 'badge' => 'bg-yellow-100 text-yellow-700 dark:bg-yellow-900/30 dark:text-yellow-400', ],
                                'paid' => [ 'label' => 'Dibayar', 'dot' => 'bg-green-500', 'badge' => 'bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400', ],
                                'expired' => [ 'label' => 'Kedaluwarsa', 'dot' => 'bg-red-500', 'badge' => 'bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-400', ],
                                default => [ 'label' => ucfirst($payment->status), 'dot' => 'bg-gray-400', 'badge' => 'bg-gray-100 text-gray-600 dark:bg-gray-900/30 dark:text-gray-400', ],
                            };
                        @endphp

                        <tr
                            wire:key="order-{{ $payment->order->id }}" onclick="window.location='{{ route('admin.report-detail', $payment->order->invoice_number) }}'"
                            class=" hover:bg-gray-50 dark:hover:bg-neutral-700/50 hover:scale-[1.005] active:scale-[0.995] transition-all duration-200 ease-out cursor-pointer " >

                            <td class="px-6 py-4 whitespace-nowrap text-gray-500 dark:text-gray-400" >
                                {{ ($payments->currentPage() - 1) * $payments->perPage() + $index + 1 }}
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900 dark:text-gray-100" >
                                {{ $payment->order?->invoice_number ?? '-' }}
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-gray-600 dark:text-gray-400" >
                                @if ($payment->paid_at)
                                    {{ $payment->paid_at->translatedFormat('d F Y') }}

                                @else
                                    <span class="text-gray-400 dark:text-gray-500">
                                        Belum dibayar
                                    </span>
                                @endif
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-100" >
                                {{ $payment->order?->user?->name ?? '-' }}
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-gray-600 dark:text-gray-400" >
                                @if ($payment->payment_method)

                                    <span class="font-medium">
                                        {{ strtoupper($payment->payment_method) }}
                                    </span>

                                @else

                                    <span class="text-gray-400">
                                        -
                                    </span>

                                @endif
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap font-semibold text-gray-900 dark:text-gray-100" >
                                Rp {{ number_format( $payment->amount, 0, ',', '.' ) }}
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">

                                <span class=" inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold {{ $statusConfig['badge'] }} transition-all duration-200 " >

                                    <span class=" w-1.5 h-1.5 rounded-full {{ $statusConfig['dot'] }} " ></span>

                                    {{ $statusConfig['label'] }}

                                </span>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="7" class=" px-6 py-16 text-center text-gray-400 dark:text-gray-500 " >

                                <div class=" flex flex-col items-center gap-2 " >
                                    <svg class="mx-auto h-12 w-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" >
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a2 2 0 01-1.414.293h-3.172a2 2 0 01-1.414-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                    </svg>

                                    <p class="text-sm">
                                        Belum ada pembayaran
                                    </p>

                                    <p class="text-xs text-gray-400">
                                        Tidak ada data yang sesuai dengan filter.
                                    </p>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        @if ($payments->hasPages())
            <div class=" px-6 py-4 border-t border-gray-200 dark:border-neutral-700 " >
                {{ $payments->links() }}
            </div>
        @endif
    </div>

</div>
