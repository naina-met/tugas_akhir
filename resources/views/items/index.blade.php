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
            <!-- Header Button -->
            <div class="mb-6">
                <a href="{{ route('items.create') }}" class="bg-[#ff5c10] text-white px-5 py-2 rounded shadow hover:bg-[#a6240d] transition">
                    + Add Item
                </a>
                <a href="{{ route('export.items') }}" class="bg-green-600 text-white px-5 py-2 rounded shadow hover:bg-green-700 ml-2 transition" onclick="return confirmExport();">
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
                            <th class="px-6 py-3 text-sm font-semibold border-r-2 border-[#002147]">Name</th>
                            <th class="px-6 py-3 text-sm font-semibold border-r-2 border-[#002147]">Code</th>
                            <th class="px-6 py-3 text-sm font-semibold border-r-2 border-[#002147]">Category</th>
                            <th class="px-6 py-3 text-sm font-semibold border-r-2 border-[#002147]">Stock</th>
                            <th class="px-6 py-3 text-sm font-semibold border-r-2 border-[#002147]">Unit</th>
                            <th class="px-6 py-3 text-sm font-semibold">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-[#002147]">
                        @forelse ($items as $index => $item)
                            <tr class="border-t-2 border-[#002147] hover:bg-[#f0f4f8] transition">
                                <td class="px-6 py-4 border-r-2 border-[#002147]">{{ $index + 1 }}</td>
                                <td class="px-6 py-4 border-r-2 border-[#002147]">{{ $item->name }}</td>
                                <td class="px-6 py-4 border-r-2 border-[#002147]">{{ $item->code }}</td>
                                <td class="px-6 py-4 border-r-2 border-[#002147]">{{ $item->category->name }}</td>
                                <td class="px-6 py-4 border-r-2 border-[#002147]">{{ $item->stock }}</td>
                                <td class="px-6 py-4 border-r-2 border-[#002147]">{{ $item->unit }}</td>
                                <td class="px-6 py-4 flex gap-2">
                                    <a href="{{ route('items.edit', $item) }}" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded text-sm">Edit</a>
                                    <form action="{{ route('items.destroy', $item) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center px-6 py-8 text-gray-500">No items found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                @if ($items->hasPages())
                    <div class="border-t-2 border-[#002147] px-6 py-4">
                        {{ $items->links() }}
                    </div>
                @endif
            </div>

            <div class="mt-6 px-6 pb-6">
                {{ $items->links() }}
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
