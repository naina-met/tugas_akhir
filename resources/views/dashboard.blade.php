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
                <div class="bg-white text-[#002147] rounded-lg shadow-lg p-6">
                    <h3 class="text-lg font-semibold mb-4">Total Barang</h3>
                    <p class="text-3xl font-bold">{{ $totalItems }}</p>
                </div>

                <!-- Card Barang Stok Rendah -->
                <div class="bg-white text-[#002147] rounded-lg shadow-lg p-6">
                    <h3 class="text-lg font-semibold mb-4">Barang Stok Rendah</h3>
                    <p class="text-3xl text-yellow-500 font-bold">{{ $lowStockItems }}</p>
                </div>

                <!-- Card Barang Stok Habis -->
                <div class="bg-white text-[#002147] rounded-lg shadow-lg p-6">
                    <h3 class="text-lg font-semibold mb-4">Barang Stok Habis</h3>
                    <p class="text-3xl text-red-600 font-bold">{{ $outOfStockItems }}</p>
                </div>
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
                html: lowStockItems,
                showConfirmButton: false,
                timer: 5000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });
        @endif
    });
</script>

</x-app-layout>