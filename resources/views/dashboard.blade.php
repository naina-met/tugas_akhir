<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Card Total Barang -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Total Barang</h3>
                    <p class="text-3xl text-gray-900 dark:text-gray-100">{{ $totalItems }}</p>
                </div>

                <!-- Card Barang Stok Rendah -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Barang Stok Rendah</h3>
                    <p class="text-3xl text-yellow-500">{{ $lowStockItems }}</p>
                </div>

                <!-- Card Barang Stok Habis -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Barang Stok Habis</h3>
                    <p class="text-3xl text-red-600">{{ $outOfStockItems }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
