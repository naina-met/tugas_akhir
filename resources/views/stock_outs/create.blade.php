<x-app-layout>
    <!-- Navbar -->
    <nav class="bg-[#f5f7f7] text-white shadow mb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center h-16">
            <!-- User -->
            <div class="text-sm text-[#002147] font-semibold">
                {{ Auth::user()->name }}
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="min-h-screen bg-[#002147] py-10">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <!-- Title -->
            <h2 class="text-2xl font-semibold text-white mb-6">Add Stock Out</h2>

            <!-- Error Alert -->
            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form -->
            <form id="stockOutForm" action="{{ route('stock-outs.store') }}" method="POST" class="bg-white p-8 rounded shadow border-2 border-[#002147] space-y-5">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-[#002147] mb-1">Date</label>
                    <input type="date" name="date" class="w-full border rounded px-3 py-2" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-[#002147] mb-1">Item</label>
                    <select name="item_id" class="w-full border rounded px-3 py-2" required>
                        @foreach ($items as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-[#002147] mb-1">Quantity</label>
                    <input type="number" name="quantity" class="w-full border rounded px-3 py-2" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-[#002147] mb-1">Destination</label>
                    <select name="outgoing_destination" class="w-full border rounded px-3 py-2" required>
                        <option value="Penjualan">Penjualan</option>
                        <option value="Pemakaian internal">Pemakaian internal</option>
                        <option value="Rusak">Rusak</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-[#002147] mb-1">Description</label>
                    <textarea name="description" class="w-full border rounded px-3 py-2"></textarea>
                </div>

                <!-- Buttons -->
                <div class="flex gap-4">
                    <button type="submit" id="submitBtn" class="bg-[#ff5c10] hover:bg-[#a6240d] text-white px-6 py-2 rounded shadow transition">
                        Save
                    </button>
                    <a href="{{ route('stock-outs.index') }}" class="bg-gray-400 hover:bg-gray-500 text-white px-6 py-2 rounded shadow transition">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- JavaScript untuk disable tombol saat submit -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('stockOutForm');
            const submitBtn = document.getElementById('submitBtn');

            form.addEventListener('submit', function () {
                submitBtn.disabled = true;
                submitBtn.innerText = 'Saving...';
            });
        });
    </script>
</x-app-layout>
