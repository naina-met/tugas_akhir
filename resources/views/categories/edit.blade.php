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
            <div class="text-sm text-[#002147] font-semibold">
                {{ Auth::user()->name }}
            </div>
        </div>
    </nav>

    <div class="min-h-screen bg-gradient-to-b from-[#002147] to-[#0f294a] py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <!-- Page Title -->
            <h2 class="text-2xl text-white font-bold mb-6">Edit Category</h2>

            <!-- Form -->
            <form action="{{ route('categories.update', $category) }}" method="POST" class="bg-white text-[#002147] shadow-lg rounded-lg p-8 space-y-6 border-2 border-[#002147]">
                @csrf
                @method('PUT')

                <div>
                    <label for="name" class="block text-sm font-semibold mb-2">Name</label>
                    <input id="name" name="name" type="text" value="{{ $category->name }}" required autofocus
                           class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-[#ff5c10] focus:outline-none" />
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="description" class="block text-sm font-semibold mb-2">Description</label>
                    <textarea id="description" name="description"
                              class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-[#ff5c10] focus:outline-none"
                    >{{ $category->description }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <button type="submit"
                            class="bg-[#ff5c10] text-white px-6 py-2 rounded shadow hover:bg-[#a6240d] transition">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
