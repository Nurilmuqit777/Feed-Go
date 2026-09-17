<div class="grid grid-cols-1 lg:grid-cols-[2fr_1fr] gap-4 items-start">

    <div class="space-y-4">

        <div class="rounded-xl border border-gray-200 bg-white dark:bg-neutral-800 dark:border-neutral-700">

            <div class="grid grid-cols-1 md:grid-cols-2">

                <div class="p-5 md:border-r border-gray-200 dark:border-neutral-700">

                    <div class="flex items-center gap-2 pb-3 border-b border-gray-200 dark:border-neutral-700">
                        <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 34 34" fill="none">
                            <path d="M5.625 26.25C5.625 22.5 13.125 20.4375 16.875 20.4375C20.625 20.4375 28.125 22.5 28.125 26.25V28.125H5.625M22.5 11.25C22.5 12.7418 21.9074 14.1726 20.8525 15.2275C19.7976 16.2824 18.3668 16.875 16.875 16.875C15.3832 16.875 13.9524 16.2824 12.8975 15.2275C11.8426 14.1726 11.25 12.7418 11.25 11.25C11.25 9.75816 11.8426 8.32742 12.8975 7.27252C13.9524 6.21763 15.3832 5.625 16.875 5.625C18.3668 5.625 19.7976 6.21763 20.8525 7.27252C21.9074 8.32742 22.5 9.75816 22.5 11.25ZM0 3.75V30C0 30.9946 0.395088 31.9484 1.09835 32.6516C1.80161 33.3549 2.75544 33.75 3.75 33.75H30C30.9946 33.75 31.9484 33.3549 32.6516 32.6516C33.3549 31.9484 33.75 30.9946 33.75 30V3.75C33.75 2.75544 33.3549 1.80161 32.6516 1.09835C31.9484 0.395088 30.9946 0 30 0H3.75C2.75544 0 1.80161 0.395088 1.09835 1.09835C0.395088 1.80161 0 2.75544 0 3.75Z" fill="currentColor"/>
                        </svg>

                        <h2 class="text-sm font-bold text-gray-900 dark:text-white">
                            Informasi Akun
                        </h2>
                    </div>

                    <div class="mt-3 space-y-2 text-[14px]">

                        <div class="grid grid-cols-[80px_10px_1fr] gap-1">
                            <span>Nama</span>
                            <span>:</span>
                            <span class="font-semibold"> {{$user->name}} </span>
                        </div>

                        <div class="grid grid-cols-[80px_10px_1fr] gap-1">
                            <span>Email</span>
                            <span>:</span>
                            <span class="font-semibold underline">
                                {{ $user->email }}
                            </span>
                        </div>

                        <div class="grid grid-cols-[80px_10px_1fr] gap-1">
                            <span>Tanggal Daftar</span>
                            <span>:</span>
                            <span class="font-semibold">
                                {{ $user->created_at->format('d/m/Y H:i') }}
                            </span>
                        </div>

                        <div class="grid grid-cols-[80px_10px_1fr] gap-1">
                            <span>Status Akun</span>
                            <span>:</span>
                            @if ($user->status === 'active')
                                <span class="font-semibold text-green-600">
                                    Aktif
                                </span>
                            @else
                                <span class="font-semibold text-red-600">
                                    Tidak Aktif
                                </span>
                            @endif
                        </div>

                    </div>
                </div>

                <div class="p-5">

                    <div class="flex items-center gap-2 pb-3 border-b border-gray-200 dark:border-neutral-700">

                        <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 45 45" fill="none">
                            <path d="M22.5 3.75C32.8556 3.75 41.25 12.1444 41.25 22.5C41.25 32.8556 32.8556 41.25 22.5 41.25C19.4209 41.2546 16.3884 40.4978 13.6725 39.0469L3.75002 41.25L5.95502 31.3312C4.50289 28.6144 3.74539 25.5806 3.75002 22.5C3.75002 12.1444 12.1444 3.75 22.5 3.75ZM24.375 13.125H20.625V26.25H31.875V22.5H24.375V13.125Z" fill="currentColor"/>
                        </svg>

                        <h2 class="text-sm font-bold text-gray-900 dark:text-white">
                            Informasi Aktivitas
                        </h2>

                    </div>

                    <div class="mt-3 space-y-2 text-[14px]">

                        <div class="grid grid-cols-[80px_10px_1fr] gap-1">
                            <span>Email terverifikasi</span>
                            <span>:</span>
                            @if ($user->email_verified_at)
                                <p class="text-sm font-medium text-green-600">
                                    Terverifikasi
                                </p>
                            @else
                                <p class="text-sm font-medium text-red-600">
                                    Belum Terverifikasi
                                </p>
                            @endif
                        </div>

                        <div class="grid grid-cols-[80px_10px_1fr] gap-1">
                            <span>Terakhir belanja</span>
                            <span>:</span>
                            <span class="font-semibold">
                                {{ $lastOrder?->created_at?->format('d/m/Y') ?? '-' }}
                            </span>
                        </div>

                    </div>

                </div>

            </div>
        </div>

        <div class="rounded-xl border border-gray-200 bg-white dark:bg-neutral-800 dark:border-neutral-700 p-5">

            <h2 class="text-lg font-bold text-gray-900 dark:text-white mb-5">
                Riwayat Pesanan
            </h2>

            <div class="overflow-x-auto">

                <table class="w-full text-[14px]">

                    <thead>
                        <tr class="border-b border-gray-200 dark:border-neutral-700">

                            <th class="px-3 pb-3 text-left font-semibold">
                                No
                            </th>

                            <th class="px-3 pb-3 text-left font-semibold">
                                No. Pesanan
                            </th>

                            <th class="px-3 pb-3 text-left font-semibold">
                                Tanggal Pesanan
                            </th>

                            <th class="px-3 pb-3 text-left font-semibold">
                                Total Pembayaran
                            </th>

                            <th class="px-3 pb-3 text-left font-semibold">
                                Status
                            </th>

                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($orders as $index => $order)

                            @php
                                $statusConfig = match ($order->status) {
                                    'pending' => [ 'label' => 'MENUNGGU', 'class' => 'bg-yellow-100 text-yellow-700', ],
                                    'processing' => [ 'label' => 'DIPROSES', 'class' => 'bg-orange-100 text-orange-700', ],
                                    'delivered' => [ 'label' => 'DIKIRIM', 'class' => 'bg-purple-100 text-purple-700', ],
                                    'completed' => [ 'label' => 'SELESAI', 'class' => 'bg-green-100 text-green-700', ],
                                    'cancelled' => [ 'label' => 'DIBATALKAN', 'class' => 'bg-red-100 text-red-700', ],
                                    default => [ 'label' => strtoupper($order->status), 'class' => 'bg-gray-100 text-gray-600', ],
                                };
                            @endphp
                            <tr wire:key="order-{{ $order->id }}" class="border-b border-gray-100 dark:border-neutral-700">

                                <td class="px-3 py-4">
                                    {{ ($orders->currentPage() - 1) * $orders->perPage() + $index + 1 }}
                                </td>

                                <td class="px-3 py-4 font-medium">
                                    #{{ $order->invoice_number }}
                                </td>

                                <td class="px-3 py-4">
                                    {{ $order->created_at->format('d/m/Y H:i') }}
                                </td>

                                <td class="px-3 py-4">
                                    Rp{{ number_format($order->total_price, 0, ',', '.') }}
                                </td>

                                <td class="px-3 py-4">
                                    <span class="inline-flex px-2.5 py-1 rounded-full text-[9px] font-bold {{ $statusConfig['class'] }}">
                                        {{ $statusConfig['label'] }}
                                    </span>
                                </td>

                            </tr>
                        @empty
                            <tr>

                                <td colspan="5" class="px-3 py-10 text-center text-gray-400" >
                                    Belum ada riwayat pesanan
                                </td>

                            </tr>
                        @endforelse

                    </tbody>

                </table>

                <div class="flex items-center justify-end mt-4">
                    <div>
                        {{ $orders->links() }}
                    </div>
                </div>

            </div>

        </div>

    </div>

    <div class="space-y-4">

        <div class="flex items-center gap-3 bg-white dark:bg-neutral-800 border border-gray-200 dark:border-neutral-700 rounded-lg p-3">

            <div class="flex items-center justify-center w-12 h-12 rounded-lg border border-gray-200 dark:border-neutral-600">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.1164 9.12637C9.9502 10.2925 9.9502 12.1672 9.9502 15.9204V33.8308C9.9502 37.5841 9.9502 39.4587 11.1164 40.6248C12.2825 41.791 14.1572 41.791 17.9104 41.791H29.8507C33.6039 41.791 35.4785 41.791 36.6447 40.6248C37.8109 39.4587 37.8109 37.5841 37.8109 33.8308V15.9204C37.8109 12.1672 37.8109 10.2925 36.6447 9.12637C35.4785 7.9602 33.6039 7.96021 29.8507 7.96021H17.9104C14.1572 7.96021 12.2825 7.9602 11.1164 9.12637ZM17.9104 15.9204C17.3826 15.9204 16.8764 16.1301 16.5032 16.5033C16.13 16.8765 15.9203 17.3826 15.9203 17.9104C15.9203 18.4382 16.13 18.9444 16.5032 19.3176C16.8764 19.6908 17.3826 19.9005 17.9104 19.9005H29.8507C30.3785 19.9005 30.8846 19.6908 31.2578 19.3176C31.6311 18.9444 31.8407 18.4382 31.8407 17.9104C31.8407 17.3826 31.6311 16.8765 31.2578 16.5033C30.8846 16.1301 30.3785 15.9204 29.8507 15.9204H17.9104ZM17.9104 23.8806C17.3826 23.8806 16.8764 24.0903 16.5032 24.4635C16.13 24.8367 15.9203 25.3428 15.9203 25.8706C15.9203 26.3984 16.13 26.9046 16.5032 27.2778C16.8764 27.651 17.3826 27.8607 17.9104 27.8607H29.8507C30.3785 27.8607 30.8846 27.651 31.2578 27.2778C31.6311 26.9046 31.8407 26.3984 31.8407 25.8706C31.8407 25.3428 31.6311 24.8367 31.2578 24.4635C30.8846 24.0903 30.3785 23.8806 29.8507 23.8806H17.9104ZM17.9104 31.8408C17.3826 31.8408 16.8764 32.0504 16.5032 32.4236C16.13 32.7969 15.9203 33.303 15.9203 33.8308C15.9203 34.3586 16.13 34.8648 16.5032 35.238C16.8764 35.6112 17.3826 35.8209 17.9104 35.8209H25.8706C26.3984 35.8209 26.9045 35.6112 27.2778 35.238C27.651 34.8648 27.8606 34.3586 27.8606 33.8308C27.8606 33.303 27.651 32.7969 27.2778 32.4236C26.9045 32.0504 26.3984 31.8408 25.8706 31.8408H17.9104Z" fill="#388E3C"/>
                </svg>
            </div>

            <div>
                <p class="text-xs font-bold text-gray-900 dark:text-white">
                    Total Pesanan
                </p>

                <p class="text-sm font-bold text-green-600">
                    {{ $totalOrders }}
                </p>
            </div>

        </div>

        <div class="flex items-center gap-3 bg-white dark:bg-neutral-800 border border-gray-200 dark:border-neutral-700 rounded-lg p-3">

            <div class="flex items-center justify-center w-12 h-12 rounded-lg border border-gray-200 dark:border-neutral-600">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.1164 9.12637C9.9502 10.2925 9.9502 12.1672 9.9502 15.9204V33.8308C9.9502 37.5841 9.9502 39.4587 11.1164 40.6248C12.2825 41.791 14.1572 41.791 17.9104 41.791H29.8507C33.6039 41.791 35.4785 41.791 36.6447 40.6248C37.8109 39.4587 37.8109 37.5841 37.8109 33.8308V15.9204C37.8109 12.1672 37.8109 10.2925 36.6447 9.12637C35.4785 7.9602 33.6039 7.96021 29.8507 7.96021H17.9104C14.1572 7.96021 12.2825 7.9602 11.1164 9.12637ZM17.9104 15.9204C17.3826 15.9204 16.8764 16.1301 16.5032 16.5033C16.13 16.8765 15.9203 17.3826 15.9203 17.9104C15.9203 18.4382 16.13 18.9444 16.5032 19.3176C16.8764 19.6908 17.3826 19.9005 17.9104 19.9005H29.8507C30.3785 19.9005 30.8846 19.6908 31.2578 19.3176C31.6311 18.9444 31.8407 18.4382 31.8407 17.9104C31.8407 17.3826 31.6311 16.8765 31.2578 16.5033C30.8846 16.1301 30.3785 15.9204 29.8507 15.9204H17.9104ZM17.9104 23.8806C17.3826 23.8806 16.8764 24.0903 16.5032 24.4635C16.13 24.8367 15.9203 25.3428 15.9203 25.8706C15.9203 26.3984 16.13 26.9046 16.5032 27.2778C16.8764 27.651 17.3826 27.8607 17.9104 27.8607H29.8507C30.3785 27.8607 30.8846 27.651 31.2578 27.2778C31.6311 26.9046 31.8407 26.3984 31.8407 25.8706C31.8407 25.3428 31.6311 24.8367 31.2578 24.4635C30.8846 24.0903 30.3785 23.8806 29.8507 23.8806H17.9104ZM17.9104 31.8408C17.3826 31.8408 16.8764 32.0504 16.5032 32.4236C16.13 32.7969 15.9203 33.303 15.9203 33.8308C15.9203 34.3586 16.13 34.8648 16.5032 35.238C16.8764 35.6112 17.3826 35.8209 17.9104 35.8209H25.8706C26.3984 35.8209 26.9045 35.6112 27.2778 35.238C27.651 34.8648 27.8606 34.3586 27.8606 33.8308C27.8606 33.303 27.651 32.7969 27.2778 32.4236C26.9045 32.0504 26.3984 31.8408 25.8706 31.8408H17.9104Z" fill="#388E3C"/>
                </svg>
            </div>

            <div>
                <p class="text-xs font-bold text-gray-900 dark:text-white">
                    Pesanan Selesai
                </p>

                <p class="text-sm font-bold text-green-600">
                    {{ $completedOrders }}
                </p>
            </div>

        </div>

        <div class="flex items-center gap-3 bg-white dark:bg-neutral-800 border border-gray-200 dark:border-neutral-700 rounded-lg p-3">

            <div class="flex items-center justify-center w-12 h-12 rounded-lg border border-gray-200 dark:border-neutral-600">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.1164 9.12637C9.9502 10.2925 9.9502 12.1672 9.9502 15.9204V33.8308C9.9502 37.5841 9.9502 39.4587 11.1164 40.6248C12.2825 41.791 14.1572 41.791 17.9104 41.791H29.8507C33.6039 41.791 35.4785 41.791 36.6447 40.6248C37.8109 39.4587 37.8109 37.5841 37.8109 33.8308V15.9204C37.8109 12.1672 37.8109 10.2925 36.6447 9.12637C35.4785 7.9602 33.6039 7.96021 29.8507 7.96021H17.9104C14.1572 7.96021 12.2825 7.9602 11.1164 9.12637ZM17.9104 15.9204C17.3826 15.9204 16.8764 16.1301 16.5032 16.5033C16.13 16.8765 15.9203 17.3826 15.9203 17.9104C15.9203 18.4382 16.13 18.9444 16.5032 19.3176C16.8764 19.6908 17.3826 19.9005 17.9104 19.9005H29.8507C30.3785 19.9005 30.8846 19.6908 31.2578 19.3176C31.6311 18.9444 31.8407 18.4382 31.8407 17.9104C31.8407 17.3826 31.6311 16.8765 31.2578 16.5033C30.8846 16.1301 30.3785 15.9204 29.8507 15.9204H17.9104ZM17.9104 23.8806C17.3826 23.8806 16.8764 24.0903 16.5032 24.4635C16.13 24.8367 15.9203 25.3428 15.9203 25.8706C15.9203 26.3984 16.13 26.9046 16.5032 27.2778C16.8764 27.651 17.3826 27.8607 17.9104 27.8607H29.8507C30.3785 27.8607 30.8846 27.651 31.2578 27.2778C31.6311 26.9046 31.8407 26.3984 31.8407 25.8706C31.8407 25.3428 31.6311 24.8367 31.2578 24.4635C30.8846 24.0903 30.3785 23.8806 29.8507 23.8806H17.9104ZM17.9104 31.8408C17.3826 31.8408 16.8764 32.0504 16.5032 32.4236C16.13 32.7969 15.9203 33.303 15.9203 33.8308C15.9203 34.3586 16.13 34.8648 16.5032 35.238C16.8764 35.6112 17.3826 35.8209 17.9104 35.8209H25.8706C26.3984 35.8209 26.9045 35.6112 27.2778 35.238C27.651 34.8648 27.8606 34.3586 27.8606 33.8308C27.8606 33.303 27.651 32.7969 27.2778 32.4236C26.9045 32.0504 26.3984 31.8408 25.8706 31.8408H17.9104Z" fill="#388E3C"/>
                </svg>
            </div>

            <div>
                <p class="text-xs font-bold text-gray-900 dark:text-white">
                    Pesanan Diproses
                </p>

                <p class="text-sm font-bold text-green-600">
                    {{ $processingOrders }}
                </p>
            </div>

        </div>

        <div class="flex items-center gap-3 bg-white dark:bg-neutral-800 border border-gray-200 dark:border-neutral-700 rounded-lg p-3">

            <div class="flex items-center justify-center w-12 h-12 rounded-lg border border-gray-200 dark:border-neutral-600">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
                    <path d="M8.54183 7.5C7.16049 7.5 5.83573 8.04873 4.85898 9.02549C3.88223 10.0022 3.3335 11.327 3.3335 12.7083V15.4167H36.6668V12.7083C36.6668 11.327 36.1181 10.0022 35.1413 9.02549C34.1646 8.04873 32.8398 7.5 31.4585 7.5H8.54183ZM3.3335 27.2917V17.5H36.6668V27.2917C36.6668 28.673 36.1181 29.9978 35.1413 30.9745C34.1646 31.9513 32.8398 32.5 31.4585 32.5H8.54183C7.16049 32.5 5.83573 31.9513 4.85898 30.9745C3.88223 29.9978 3.3335 28.673 3.3335 27.2917ZM26.0418 24.5833C25.7656 24.5833 25.5006 24.6931 25.3053 24.8884C25.1099 25.0838 25.0002 25.3487 25.0002 25.625C25.0002 25.9013 25.1099 26.1662 25.3053 26.3616C25.5006 26.5569 25.7656 26.6667 26.0418 26.6667H30.6252C30.9014 26.6667 31.1664 26.5569 31.3617 26.3616C31.5571 26.1662 31.6668 25.9013 31.6668 25.625C31.6668 25.3487 31.5571 25.0838 31.3617 24.8884C31.1664 24.6931 30.9014 24.5833 30.6252 24.5833H26.0418Z" fill="#EAAA00"/>
                </svg>
            </div>

            <div>
                <p class="text-xs font-bold text-gray-900 dark:text-white">
                    Total belanja
                </p>

                <p class="text-sm font-bold text-yellow-500">
                    Rp {{ number_format($totalSpent, 0, ',', '.') }}
                </p>
            </div>

        </div>

        <div class="bg-white dark:bg-neutral-800 border border-gray-200 dark:border-neutral-700 rounded-lg p-4">

            <h2 class="text-xs font-bold text-gray-900 dark:text-white mb-3">
                Kelola Status Akun
            </h2>

            <div class="flex gap-2">

                @if ($user->status === 'inactive')

                    <button
                        wire:click="openStatusModal('activate')"
                        class="flex items-center gap-2 rounded-lg bg-green-600 px-3 py-2 text-sm font-medium text-white transition hover:bg-green-700 hover:scale-105 active:scale-95"
                    >
                        <span>✓</span>
                        Aktifkan
                    </button>

                @else

                    <button
                        wire:click="openStatusModal('deactivate')"
                        class="flex items-center gap-2 rounded-lg bg-red-600 px-3 py-2 text-sm font-medium text-white transition hover:bg-red-700 hover:scale-105 active:scale-95"
                    >
                        <span>⊘</span>
                        Non Aktifkan
                    </button>

                @endif

            </div>

        </div>

    </div>

@if ($showStatusModal)
    <div
        class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 px-4"
        wire:click.self="closeStatusModal"
    >

        <div
            class="w-full max-w-md rounded-2xl bg-white dark:bg-neutral-800 p-5 shadow-2xl"
        >

            @if ($statusAction === 'deactivate')
                <div class="flex justify-center">
                    <div class="flex h-20 w-20 items-center justify-center rounded-full bg-[#EB000426] dark:bg-[#ff8588]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" viewBox="0 0 70 70" fill="none">
                            <path d="M11.9876 62.7587H58.0126C62.4076 62.7587 65.1614 59.595 65.1614 55.61C65.1665 54.3758 64.8429 53.1626 64.2239 52.095L41.1676 10.845C39.8489 8.47121 37.4464 7.24121 35.0151 7.24121C32.6126 7.24121 30.1526 8.47121 28.8326 10.845L5.80637 52.1237C5.16137 53.2362 4.83887 54.4087 4.83887 55.6112C4.83887 59.595 7.62262 62.7587 11.9876 62.7587ZM35.0151 42.69C33.4626 42.69 32.6126 41.8112 32.5539 40.23L32.1439 25.7575C32.0851 24.175 33.3151 23.0025 34.9851 23.0025C36.6264 23.0025 37.9151 24.2037 37.8564 25.7862L37.4176 40.23C37.3589 41.8412 36.5089 42.69 35.0151 42.69ZM35.0151 53.5012C33.3151 53.5012 31.7339 52.1537 31.7339 50.3362C31.7339 48.5187 33.2864 47.1737 35.0151 47.1737C36.7439 47.1737 38.2964 48.4912 38.2964 50.3362C38.2964 52.1825 36.7139 53.5012 35.0151 53.5012Z" fill="#D80E12"/>
                        </svg>
                    </div>
                </div>

                <div class="mt-5 text-center">

                    <h3 class="text-base font-bold text-gray-900 dark:text-gray-300">
                        Nonaktifkan Akun Pelanggan?
                    </h3>

                    <p class="mt-2 text-sm leading-5 text-gray-700 dark:text-gray-200">
                        Pelanggan tidak dapat lagi masuk ke akun maupun
                        menggunakan layanan FeedGo setelah akun dinonaktifkan.
                        Untuk mengaktifkan kembali akun, pelanggan harus
                        menghubungi Admin.
                    </p>

                </div>

            @else
                <div class="flex justify-center">
                    <div class="flex h-20 w-20 items-center justify-center rounded-full bg-[#388E3C]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" viewBox="0 0 70 70" fill="none">
                            <path d="M35 7C19.53 7 7 19.53 7 35C7 50.47 19.53 63 35 63C50.47 63 63 50.47 63 35C63 19.53 50.47 7 35 7ZM32.8475 51.31H28.1575L16.8175 35.42L21.511 31.045L30.5025 39.445L48.496 18.6865L53.186 21.9765L32.8475 51.31Z" fill="white"/>
                        </svg>
                    </div>
                </div>
                <div class="mt-5 text-center">

                    <h3 class="text-base font-bold text-gray-900 dark:text-gray-300">
                        Aktifkan Akun Pelanggan?
                    </h3>

                    <p class="mt-2 text-sm leading-5 text-gray-700 dark:text-gray-200">
                        Pelanggan akan dapat kembali masuk ke akun dan menggunakan layanan FeedGo setelah akun diaktifkan.
                    </p>

                </div>

            @endif

            <div class="mt-6 flex justify-center gap-3">

                <button
                    type="button"
                    wire:click="changeStatus"
                    wire:loading.attr="disabled"
                    class="rounded-lg {{ $statusAction === 'deactivate' ? 'bg-red-600 hover:bg-red-700': 'bg-[#388E3C] hover:bg-green-700'  }} px-5 py-2.5 text-sm font-semibold text-white transition hover:scale-105 active:scale-95 disabled:opacity-50"
                >
                    <span wire:loading.remove wire:target="changeStatus">
                        {{ $statusAction === 'deactivate' ? 'Nonaktifkan' : 'Aktifkan' }}
                    </span>

                    <span wire:loading wire:target="changeStatus">
                        Memproses...
                    </span>
                </button>

                <button
                    type="button"
                    wire:click="closeStatusModal"
                    wire:loading.attr="disabled"
                    class="rounded-lg bg-gray-200 px-5 py-2.5 text-sm font-semibold text-gray-800 transition hover:scale-105 active:scale-95 hover:bg-gray-300"
                >
                    Batal
                </button>

            </div>

        </div>

    </div>
@endif

</div>
