<x-app-layout>
    <!-- Navbar -->
    <nav class="bg-[#f5f7f7] text-white shadow mb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex items-center space-x-4">
                <a href="{{ route('dashboard') }}">
                    <img src="/forpic.img/logocm.png" alt="Logo" class="h-20">
                </a>
            </div>

            <!-- User -->
            <div class="text-sm text-[#002147] font-semibold">
                {{ Auth::user()->name }}
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="min-h-screen bg-[#002147] py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Page Title -->
            <div class="mb-8 text-center">
                <h2 class="text-3xl font-bold text-white">Add Stock In</h2>
            </div>

            <!-- Form Wrapper Center -->
            <div class="flex justify-center">
                <div class="bg-white shadow rounded-lg border-2 border-[#002147] p-8 w-full max-w-2xl">
                    <form action="{{ route('stock-ins.store') }}" method="POST" class="space-y-5">
                        @csrf

                        <div>
                            <label class="block text-[#002147] font-medium mb-1">Date</label>
                            <input type="date" name="date" class="w-full border-2 border-[#002147] rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#ff5c10]" required>
                        </div>

                        <div>
                            <label class="block text-[#002147] font-medium mb-1">Item</label>
                            <select name="item_id" class="w-full border-2 border-[#002147] rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#ff5c10]" required>
                                @foreach ($items as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-[#002147] font-medium mb-1">Quantity</label>
                            <input type="number" name="quantity" class="w-full border-2 border-[#002147] rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#ff5c10]" required>
                        </div>

                        <div>
                            <label class="block text-[#002147] font-medium mb-1">Source</label>
                            <select name="incoming_source" class="w-full border-2 border-[#002147] rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#ff5c10]" required>
                                <option value="Pembelian">Pembelian</option>
                                <option value="Retur">Retur</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-[#002147] font-medium mb-1">Description</label>
                            <textarea name="description" class="w-full border-2 border-[#002147] rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#ff5c10]" rows="3"></textarea>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="bg-[#ff5c10] text-white px-6 py-2 rounded shadow hover:bg-[#a6240d] transition">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
