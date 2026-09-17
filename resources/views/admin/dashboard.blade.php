@section('title', 'Dashboard')

<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div>
            <h1 class="font-semibold text-3xl">Dashboard FeedGo</h1>
            <span class="font-light">Kelola seluruh produk pakan FeedGo</span>
        </div>

        <div class="grid auto-rows-min gap-4 md:grid-cols-3">

            <div class="relative overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-800">
                <div class="flex justify-between items-center p-3 mt-1">
                    <h1 class="font-bold text-gray-900 dark:text-white">Total Pesanan</h1>
                </div>
                <div class="flex px-3 items-center justify-between gap-3">
                    <div class="flex items-center gap-3">
                        <div class="bg-yellow-500 p-2 rounded-lg">
                            <x-svg.bag-icon class="text-white" />
                        </div>
                        <span class="font-semibold text-lg text-gray-900 dark:text-white">{{ number_format($totalOrders) }} pesanan</span>
                    </div>
                    <div class="flex items-center gap-1">
                        @if($totalOrdersPercentage >= 0)
                            <x-svg.arrow-up-icon class="text-green-500" />
                            <span class="text-green-500 font-medium">
                                {{ $totalOrdersPercentage }}%
                            </span>
                        @else
                            <x-svg.arrow-up-icon class="text-red-500 rotate-180"/>
                            <span class="text-red-500 font-medium">
                                {{ abs($totalOrdersPercentage) }}%
                            </span>

                        @endif
                    </div>
                </div>
                <div class="px-3 pb-4 mt-2 flex justify-between text-sm">
                    <span class="text-green-700 dark:text-green-400">Total pesanan masuk</span>
                    <span class="text-gray-500 dark:text-gray-400">Dibanding bulan lalu</span>
                </div>
            </div>

            <div class="relative overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-800">
                <div class="flex justify-between p-3 mt-1 items-center">
                    <h1 class="font-bold text-gray-900 dark:text-white">Pesanan Aktif</h1>
                </div>
                <div class="flex px-3 items-center justify-between gap-3">
                    <div class="flex items-center gap-3">
                        <div class="bg-yellow-500 p-2 rounded-lg">
                            <x-svg.bag-icon class="text-white" />
                        </div>
                        <span class="font-semibold text-lg text-gray-900 dark:text-white">{{ number_format($activeOrders) }} pesanan</span>
                    </div>
                    <div class="flex items-center gap-1">
                        @if($activeOrdersPercentage >= 0)
                            <x-svg.arrow-up-icon class="text-green-500" />
                            <span class="text-green-500 font-medium">
                                {{ $activeOrdersPercentage }}%
                            </span>
                        @else
                            <x-svg.arrow-up-icon class="text-red-500 rotate-180"/>
                            <span class="text-red-500 font-medium">
                                {{ abs($activeOrdersPercentage) }}%
                            </span>
                        @endif
                    </div>
                </div>
                <div class="px-3 pb-4 mt-2 flex justify-between text-sm">
                    <span class="text-green-700 dark:text-green-400">Status: proses & dikirim</span>
                    <span class="text-gray-500 dark:text-gray-400">Dibanding bulan lalu</span>
                </div>
            </div>

            <div class="relative overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-800">
                <div class="flex justify-between p-3 mt-1 items-center">
                    <h1 class="font-bold text-gray-900 dark:text-white">Pesanan Terkirim</h1>
                </div>
                <div class="flex px-3 items-center justify-between gap-3">
                    <div class="flex items-center gap-3">
                        <div class="bg-yellow-500 p-2 rounded-lg">
                            <x-svg.bag-icon class="text-white" />
                        </div>
                        <span class="font-semibold text-lg text-gray-900 dark:text-white">{{ number_format($shippedOrders) }} pesanan</span>
                    </div>
                    <div class="flex items-center gap-1">
                        @if($shippedOrdersPercentage >= 0)
                            <x-svg.arrow-up-icon class="text-green-500"/>
                            <span class="text-green-500 font-medium">
                                {{ $shippedOrdersPercentage }}%
                            </span>

                        @else
                            <x-svg.arrow-up-icon class="text-red-500 rotate-180"/>
                            <span class="text-red-500 font-medium">
                                {{ abs($shippedOrdersPercentage) }}%
                            </span>
                        @endif
                    </div>
                </div>
                <div class="px-3 pb-4 mt-2 flex justify-between text-sm">
                    <span class="text-green-700 dark:text-green-400">Status: Selesai</span>
                    <span class="text-gray-500 dark:text-gray-400">Dibanding bulan lalu</span>
                </div>
            </div>
        </div>

        <div class="grid gap-6 lg:grid-cols-3">
            <div class=" lg:col-span-2 bg-white dark:bg-neutral-800 rounded-xl shadow-sm p-6 border border-neutral-200 dark:border-neutral-700">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-4">
                    <h2 class="text-xl font-bold text-gray-900 dark:text-white">Grafik Penjualan Pakan</h2>
                    <div class="flex gap-2">
                        <button
                            type="button"
                            onclick="window.changePeriod('weekly')"
                            data-period="weekly"
                            class="period-btn px-4 py-2 rounded-lg text-sm font-medium text-gray-600 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-neutral-700 transition-colors duration-200">
                            7 HARI
                        </button>
                        <button
                            type="button"
                            onclick="window.changePeriod('monthly')"
                            data-period="monthly"
                            class="period-btn px-4 py-2 rounded-lg text-sm font-medium bg-yellow-500 text-white hover:bg-yellow-600 transition-colors duration-200">
                            30 HARI
                        </button>
                        <button
                            type="button"
                            onclick="window.changePeriod('yearly')"
                            data-period="yearly"
                            class="period-btn px-4 py-2 rounded-lg text-sm font-medium text-gray-600 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-neutral-700 transition-colors duration-200">
                            12 BULAN
                        </button>
                    </div>
                </div>
                <div class="border-t border-gray-300"></div>
                <div id="salesChart" class="w-full"></div>
            </div>
            <div class="bg-white dark:bg-neutral-800 rounded-xl shadow-sm p-6 border border-neutral-200 dark:border-neutral-700">
                <div class="flex items-center mb-4">
                    <h2 class="text-xl font-bold text-gray-900 dark:text-white">Produk Terlaris</h2>
                </div>

                <div class="border-t border-gray-300"></div>

                <div class="space-y-10">
                    @forelse ($bestSellingProducts as $item)
                        @php
                            $product = $item->product;
                        @endphp
                    <div class="flex items-center gap-3 p-3 rounded-lg hover:bg-gray-50 dark:hover:bg-neutral-700 transition-colors">
                        <img src="{{ asset('storage/' . $product->product_image1) }}" alt="{{ $product->product_name }}" class="w-14 h-14 rounded-lg object-cover">
                        <div class="flex-1">
                            <h4 class="font-semibold text-gray-900 dark:text-white">{{ $product->product_name }}</h4>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Rp {{ number_format($product->product_discount_price ?? $product->product_price, 0, ',', '.') }}</p>
                        </div>
                        <div class="text-right">
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{ $item->total_sold }} Penjualan</p>
                        </div>
                    </div>
                    @empty
                    <div class="py-10 text-center text-sm text-gray-500">
                        Belum ada data penjualan.
                    </div>
                    @endforelse

                </div>

                <a href="{{ route('admin.product') }}" class="flex items-center justify-center w-full mt-6 px-4 py-2.5 bg-[#EAAA00] hover:bg-[#D49A00] text-white font-semibold text-sm rounded-lg shadow-sm hover:shadow-md hover:scale-105 active:scale-95 transition-all duration-200">
                    LIHAT PRODUK
                </a>
            </div>
        </div>
        <div class="bg-white dark:bg-neutral-800 rounded-xl shadow-sm p-6 border border-neutral-200 dark:border-neutral-700">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-bold text-gray-900 dark:text-white">Tabel Pesanan Terbaru</h2>
                <a href="{{ route('admin.order') }}" class="px-4 py-2.5 bg-[#EAAA00] hover:bg-[#D49A00] text-white font-semibold text-sm rounded-lg shadow-sm hover:shadow-md hover:scale-105 active:scale-95 transition-all duration-200">
                    Lihat Semua Pesanan
                </a>
            </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-gray-200 dark:border-neutral-700 bg-[#EEEEEE] dark:bg-neutral-700">
                        <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700 dark:text-gray-300">No. Transaksi</th>
                        <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700 dark:text-gray-300">Tanggal</th>
                        <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700 dark:text-gray-300">Nama Pelanggan</th>
                        <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700 dark:text-gray-300">Status</th>
                        <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700 dark:text-gray-300">Total</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                    @forelse ( $recentOrders as $order )
                        @php
                            $statusClass = match ($order->status) {
                                'pending' => ['dot' => 'bg-yellow-500', 'badge' => 'bg-yellow-100 text-yellow-700 dark:bg-yellow-900/30 dark:text-yellow-400'],
                                'processing' => ['dot' => 'bg-blue-500', 'badge' => 'bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400'],
                                'delivered' => ['dot' => 'bg-purple-500', 'badge' => 'bg-purple-100 text-purple-700 dark:bg-purple-900/30 dark:text-purple-400'],
                                'completed' => ['dot' => 'bg-green-500', 'badge' => 'bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400'],
                                'cancelled' => ['dot' => 'bg-red-500', 'badge' => 'bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-400'],
                                default => ['dot' => 'bg-gray-400', 'badge' => 'bg-gray-100 text-gray-600'],
                            };

                            $totalQuantity = $order->orderDetails->sum('quantity_ordered');
                        @endphp

                        <tr class="hover:bg-gray-50 dark:hover:bg-neutral-700">
                            <td class="py-4 px-4 text-sm text-gray-600 dark:text-gray-400">{{ $order->invoice_number}}</td>
                            <td class="py-4 px-4 text-sm text-gray-600 dark:text-gray-400">{{ $order->created_at?->format('d M Y') }}</td>
                            <td class="py-4 px-4">
                                <div class="flex items-center gap-2">
                                        <x-svg.user-icon class="w-5 h-5 text-gray-500" />
                                    <span class="text-sm text-gray-900 dark:text-white">{{ $order->orderAddress->recipient_name }}</span>
                                </div>
                            </td>
                            <td class="px-4 py-4">
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold {{ $statusClass['badge'] }}">
                                <span class="w-1.5 h-1.5 rounded-full {{ $statusClass['dot'] }}"></span>
                                {{ $order->status_label }}
                            </span>
                            </td>
                            <td class="py-4 px-4 text-sm font-semibold text-gray-900 dark:text-white">Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-10 text-center text-sm text-gray-500">
                                Belum ada pesanan.
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>

    </div>
</x-layouts.app>

<script>
    (function() {
        let chart;
        let currentPeriod = 'monthly';
        window.initChart = async function() {
            try {
                const response = await fetch(`/admin/sales-data?period=${currentPeriod}`);

                if (!response.ok) {
                    throw new Error('Failed to fetch data');
                }

                const data = await response.json();

                const isDark = document.documentElement.classList.contains('dark');
                const textColor = isDark ? '#D1D5DB' : '#6B7280';
                const gridColor = isDark ? '#374151' : '#F3F4F6';

                const options = {
                    series: [{
                        name: 'Penjualan',
                        data: data.data
                    }],
                    chart: {
                        type: 'area',
                        height: 260,
                        toolbar: { show: false },
                        zoom: { enabled: false },
                        background: 'transparent',
                        fontFamily: 'Poppins, sans-serif'
                    },
                    colors: ['#EAB308'],
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        curve: 'smooth',
                        width: 3
                    },
                    fill: {
                        type: 'gradient',
                        gradient: {
                            shadeIntensity: 1,
                            opacityFrom: 0.4,
                            opacityTo: 0.1,
                        }
                    },
                    xaxis: {
                        categories: data.labels,
                        labels: {
                            style: {
                                fontSize: '12px',
                                fontWeight: 600,
                                colors: textColor
                            }
                        },
                        axisBorder: {
                            show: false
                        },
                        axisTicks: {
                            show: false
                        }
                    },
                    yaxis: {
                        labels: {
                            formatter: function(value) {
                                return 'Rp ' + (value / 1000).toFixed(0) + 'K';
                            },
                            style: {
                                colors: textColor,
                                fontSize: '12px'
                            }
                        }
                    },
                    tooltip: {
                        theme: isDark ? 'dark' : 'light',
                        y: {
                            formatter: function(value) {
                                return 'Rp ' + value.toLocaleString('id-ID');
                            }
                        }
                    },
                    grid: {
                        borderColor: gridColor,
                        strokeDashArray: 4,
                        xaxis: {
                            lines: {
                                show: false
                            }
                        },
                        yaxis: {
                            lines: {
                                show: true
                            }
                        },
                        padding: {
                            top: 0,
                            right: 0,
                            bottom: 0,
                            left: 10
                        }
                    }
                };
                if (chart) {
                    chart.destroy();
                }

                chart = new ApexCharts(document.querySelector("#salesChart"), options);
                await chart.render();

            } catch (error) {
                console.error('Error initializing chart:', error);
                const chartElement = document.querySelector("#salesChart");
                if (chartElement) {
                    chartElement.innerHTML = `
                        <div class="flex items-center justify-center py-10">
                            <div class="text-center">
                                <svg class="mx-auto h-12 w-12 text-red-500 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <p class="text-red-500 font-medium">Gagal memuat data grafik</p>
                                <p class="text-gray-500 text-sm mt-1">${error.message}</p>
                            </div>
                        </div>
                    `;
                }
            }
        }
        window.changePeriod = function(period) {
            currentPeriod = period;

            document.querySelectorAll('.period-btn').forEach(btn => {
                const btnPeriod = btn.getAttribute('data-period');
                if (btnPeriod === period) {
                    btn.classList.remove('text-gray-600', 'hover:bg-gray-100', 'dark:text-gray-300', 'dark:hover:bg-neutral-700');
                    btn.classList.add('bg-yellow-500', 'text-white', 'hover:bg-yellow-600');
                } else {
                    btn.classList.remove('bg-yellow-500', 'text-white', 'hover:bg-yellow-600');
                    btn.classList.add('text-gray-600', 'hover:bg-gray-100', 'dark:text-gray-300', 'dark:hover:bg-neutral-700');
                }
            });

            window.initChart();
        }

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', window.initChart);
        } else {
            window.initChart();
        }
    })();
</script>
