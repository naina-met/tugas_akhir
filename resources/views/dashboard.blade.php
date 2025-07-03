<x-app-layout>
    <!-- Navbar -->
    <nav class="bg-[#f5f7f7] text-white shadow-md mb-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center h-16">
            <div class="text-sm text-black">
                {{ Auth::user()->name }}
            </div>
        </div>
    </nav>

    <div class="min-h-screen bg-gradient-to-b from-[#002147] to-[#0f294a] py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <!-- Card Total Barang -->
                <a href="{{ route('items.index') }}" class="block bg-white text-[#002147] rounded-lg shadow-lg p-6 hover:bg-gray-100 transition">
                    <h3 class="text-lg font-semibold mb-4">Total Barang</h3>
                    <p class="text-3xl font-bold">{{ $totalItems }}</p>
                </a>

                <!-- Card Barang Stok Rendah -->
                <a href="{{ route('items.index', ['filter' => 'low-stock']) }}" class="block bg-white text-[#002147] rounded-lg shadow-lg p-6 hover:bg-yellow-50 transition">
                    <h3 class="text-lg font-semibold mb-4">Barang Stok Rendah</h3>
                    <p class="text-3xl text-yellow-500 font-bold">{{ $lowStockItems }}</p>
                </a>

                <!-- Card Barang Stok Habis -->
                <a href="{{ route('items.index', ['filter' => 'out-of-stock']) }}" class="block bg-white text-[#002147] rounded-lg shadow-lg p-6 hover:bg-red-50 transition">
                    <h3 class="text-lg font-semibold mb-4">Barang Stok Habis</h3>
                    <p class="text-3xl text-red-600 font-bold">{{ $outOfStockItems }}</p>
                </a>

            </div>

            <!-- Line Chart -->
            <div class="mt-10 bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-xl font-semibold mb-4 text-[#002147]">Grafik Barang Masuk & Keluar (7 Hari Terakhir)</h2>

                <!-- DEBUG DATA -->
                <!-- <pre class="bg-gray-800 text-white p-4 text-xs rounded mb-4">
Dates: {{ json_encode($dates) }}
In:    {{ json_encode($stockInCounts) }}
Out:   {{ json_encode($stockOutCounts) }}
                </pre> -->

                <canvas id="lineChart" height="100"></canvas>
            </div>
        </div>
    </div>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @if($lowStockItemDetails->count() > 0)
                let lowStockItems = `
                    <ul style="text-align: left; margin:0; padding:0; list-style:none;">
                        @foreach($lowStockItemDetails as $item)
                            <li>🔸 <b>{{ $item->name }}</b> — stok: {{ $item->stock }}</li>
                        @endforeach
                    </ul>
                `;

                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'warning',
                    title: 'Stok barang menipis!',
                    html: lowStockItems + '<button id="swal-close-btn" style="position:absolute;top:5px;right:8px;background:none;border:none;font-size:16px;color:#999;cursor:pointer;">&times;</button>',
                    showConfirmButton: false,
                    timer: 6000,
                    timerProgressBar: true,
                    didRender: () => {
                        document.getElementById('swal-close-btn').addEventListener('click', () => {
                            Swal.close();
                        });
                    },
                    customClass: {
                        popup: 'rounded-lg shadow-lg px-4 py-3'
                    }
                });
            @endif
        });
    </script>

    Chart.js
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('lineChart').getContext('2d');

            const chart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: {!! json_encode($dates ?? []) !!},
                    datasets: [
                        {
                            label: 'Barang Masuk',
                            data: {!! json_encode($stockInCounts ?? []) !!},
                            borderColor: 'green',
                            backgroundColor: 'rgba(0, 128, 0, 0.1)',
                            tension: 0.3,
                            fill: true
                        },
                        {
                            label: 'Barang Keluar',
                            data: {!! json_encode($stockOutCounts ?? []) !!},
                            borderColor: 'red',
                            backgroundColor: 'rgba(255, 0, 0, 0.1)',
                            tension: 0.3,
                            fill: true
                        }
                    ]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Jumlah Barang'
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Tanggal'
                            }
                        }
                    }
                }
            });
        });
    </script>
</x-app-layout>
