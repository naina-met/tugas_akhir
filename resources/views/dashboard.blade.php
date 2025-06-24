You said:
<x-app-layout>
    <!-- Navbar -->
    <nav class="bg-[#f5f7f7] text-white shadow-md mb-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex items-center space-x-4">
                <a href="{{ route('dashboard') }}">
                    <img src="/forpic.img/logocm.png" alt="Logo" class="h-20">
                </a>

            </div>

            <!-- User -->
            <div class="text-sm">
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
                timer: 6000, // auto hilang dalam 6 detik
                timerProgressBar: true, // kasih progress bar juga biar kelihatan
                didRender: () => {
                    // Event buat close manual
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


</x-app-layout>