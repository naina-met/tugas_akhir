<x-app-layout>
    <!-- Navbar -->
    <nav class="bg-[#f5f7f7] text-white shadow mb-0">
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

    <!-- Form Section -->
    <div class="min-h-screen bg-gradient-to-b from-[#002147] to-[#0f294a] py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <!-- Page Title -->
            <h2 class="text-2xl font-semibold text-white mb-8">Add Category</h2>

            <form action="{{ route('categories.store') }}" method="POST" class="bg-white text-[#002147] shadow-lg rounded-2xl p-8 space-y-6 border border-[#002147]">
                @csrf

                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-semibold mb-2">Name</label>
                    <input id="name" name="name" type="text" class="w-full px-4 py-2 border border-[#002147] rounded focus:ring-2 focus:ring-[#ff5c10] focus:outline-none" required autofocus>
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-600 text-sm" />
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-semibold mb-2">Description</label>
                    <textarea id="description" name="description" rows="4" class="w-full px-4 py-2 border border-[#002147] rounded focus:ring-2 focus:ring-[#ff5c10] focus:outline-none"></textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2 text-red-600 text-sm" />
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end">
                    <button type="submit" class="bg-[#ff5c10] hover:bg-[#a6240d] text-white px-6 py-2 rounded shadow-md font-semibold transition">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
