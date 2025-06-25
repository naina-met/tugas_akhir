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

    <div class="min-h-screen bg-[#002147] py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6">
                <a href="{{ route('categories.create') }}" class="bg-[#ff5c10] text-white px-5 py-2 rounded shadow hover:bg-[#a6240d] transition">
                    + Add Category
                </a>
            </div>

            @if (session('success'))
                <div class="mb-4 text-green-500 font-medium">{{ session('success') }}</div>
            @endif

           <div class="bg-white shadow rounded-lg border-2 border-[#002147] overflow-hidden">
    <table class="w-full text-left border-collapse border-spacing-0">
        <thead class="bg-[#ff5c10] text-white">
            <tr>
                <th class="px-6 py-3 text-sm font-semibold border-r-2 border-[#002147]">#</th>
                <th class="px-6 py-3 text-sm font-semibold border-r-2 border-[#002147]">Name</th>
                <th class="px-6 py-3 text-sm font-semibold border-r-2 border-[#002147]">Description</th>
                <th class="px-6 py-3 text-sm font-semibold">Actions</th>
            </tr>
        </thead>
        <tbody class="text [#002147]">
            @forelse ($categories as $category)
                <tr class="border-t-2 border-[#002147] hover:bg-[#f0f4f8] transition">
                    <td class="px-6 py-4 border-r-2 border-[#002147]">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4 border-r-2 border-[#002147]">{{ $category->name }}</td>
                    <td class="px-6 py-4 border-r-2 border-[#002147]">{{ $category->description }}</td>
                    <td class="px-6 py-4 flex gap-2">
                        <a href="{{ route('categories.edit', $category) }}" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded text-sm">Edit</a>
                        <form action="{{ route('categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center px-6 py-8 text-gray-500">No categories found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    @if ($categories->hasPages())
        <div class="border-t-2 border-[#002147] px-6 py-4">
            {{ $categories->links() }}
        </div>
    @endif
</div>

                <div class="mt-6 px-6 pb-6">
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
