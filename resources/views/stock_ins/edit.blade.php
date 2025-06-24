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
            <div class="mb-6">
                <h2 class="text-3xl font-bold text-white">
                    Edit Stock In
                </h2>
            </div>

            <!-- Form Center -->
            <div class="flex justify-center">
                <div class="bg-white shadow rounded-lg border-2 border-[#002147] p-8 w-full max-w-2xl">
                    <form action="{{ route('stock-ins.update', $stockIn) }}" method="POST" class="space-y-5">
                        @csrf
                        @method('PUT')

                        <!-- Date -->
                        <div>
                            <label class="block text-[#002147] font-medium mb-1">Date</label>
                            <input type="date" name="date" value="{{ $stockIn->date }}" required
                                   class="w-full border-2 border-[#002147] rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#ff5c10]">
                        </div>

                        <!-- Item -->
                        <div>
                            <label class="block text-[#002147] font-medium mb-1">Item</label>
                            <select name="item_id" required
                                    class="w-full border-2 border-[#002147] rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#ff5c10]">
                                @foreach ($items as $item)
                                    <option value="{{ $item->id }}" {{ $item->id == $stockIn->item_id ? 'selected' : '' }}>
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Quantity -->
                        <div>
                            <label class="block text-[#002147] font-medium mb-1">Quantity</label>
                            <input type="number" name="quantity" value="{{ $stockIn->quantity }}" required
                                   class="w-full border-2 border-[#002147] rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#ff5c10]">
                        </div>

                        <!-- Source -->
                        <div>
                            <label class="block text-[#002147] font-medium mb-1">Source</label>
                            <select name="incoming_source" required
                                    class="w-full border-2 border-[#002147] rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#ff5c10]">
                                <option value="Pembelian" {{ $stockIn->incoming_source == 'Pembelian' ? 'selected' : '' }}>Pembelian</option>
                                <option value="Retur" {{ $stockIn->incoming_source == 'Retur' ? 'selected' : '' }}>Retur</option>
                            </select>
                        </div>

                        <!-- Description -->
                        <div>
                            <label class="block text-[#002147] font-medium mb-1">Description</label>
                            <textarea name="description" rows="3"
                                      class="w-full border-2 border-[#002147] rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#ff5c10]">{{ $stockIn->description }}</textarea>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-end">
                            <button type="submit" class="bg-[#ff5c10] hover:bg-[#a6240d] text-white px-6 py-2 rounded shadow transition">
                                Update
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
