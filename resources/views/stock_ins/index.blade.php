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
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Header Button -->
            <div class="mb-6">
                <a href="{{ route('stock-ins.create') }}" class="bg-[#ff5c10] text-white px-5 py-2 rounded shadow hover:bg-[#a6240d] transition">
                    + Add Stock In
                </a>
                <a href="{{ route('export.stockins') }}" class="bg-green-600 text-white px-5 py-2 rounded shadow hover:bg-green-700 ml-2 transition" onclick="return confirmExport();">
                    Export Excel
                </a>
            </div>

            @if (session('success'))
                <div class="mb-4 text-green-500 font-medium">{{ session('success') }}</div>
            @endif

            <!-- Table -->
            <div class="bg-white shadow rounded-lg border-2 border-[#002147]">
                <table class="w-full text-left border-collapse border-b-2 border-[#002147]">
                    <thead class="bg-[#ff5c10] text-white border-b-2 border-[#002147]">
                        <tr>
                            <th class="px-6 py-3 text-sm font-semibold border-r-2 border-[#002147]">#</th>
                            <th class="px-6 py-3 text-sm font-semibold border-r-2 border-[#002147]">Date</th>
                            <th class="px-6 py-3 text-sm font-semibold border-r-2 border-[#002147]">Item</th>
                            <th class="px-6 py-3 text-sm font-semibold border-r-2 border-[#002147]">Quantity</th>
                            <th class="px-6 py-3 text-sm font-semibold border-r-2 border-[#002147]">Source</th>
                            <th class="px-6 py-3 text-sm font-semibold border-r-2 border-[#002147]">User</th>
                            <th class="px-6 py-3 text-sm font-semibold">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-[#002147]">
                        @forelse ($stockIns as $index => $stockIn)
                            <tr class="border-t-2 border-[#002147] hover:bg-[#f0f4f8] transition">
                                <td class="px-6 py-4 border-r-2 border-[#002147]">{{ $index + 1 }}</td>
                                <td class="px-6 py-4 border-r-2 border-[#002147]">{{ $stockIn->date }}</td>
                                <td class="px-6 py-4 border-r-2 border-[#002147]">{{ $stockIn->item->name }}</td>
                                <td class="px-6 py-4 border-r-2 border-[#002147]">{{ $stockIn->quantity }}</td>
                                <td class="px-6 py-4 border-r-2 border-[#002147]">{{ $stockIn->incoming_source }}</td>
                                <td class="px-6 py-4 border-r-2 border-[#002147]">{{ $stockIn->user->username }}</td>
                                <td class="px-6 py-4 flex gap-2">
                                    <a href="{{ route('stock-ins.edit', $stockIn) }}" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded text-sm">Edit</a>
                                    <form action="{{ route('stock-ins.destroy', $stockIn) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center px-6 py-8 text-gray-500">No stock-in records found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                @if ($stockIns->hasPages())
                    <div class="border-t-2 border-[#002147] px-6 py-4">
                        {{ $stockIns->links() }}
                    </div>
                @endif
            </div>

            <div class="mt-6 px-6 pb-6">
                {{ $stockIns->links() }}
            </div>
        </div>
    </div>

    <!-- Confirm Export Script -->
    <script>
        function confirmExport() {
            return confirm('Apakah Anda yakin mau mengekspor dalam bentuk Excel?');
        }
    </script>
</x-app-layout>
