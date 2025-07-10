<x-app-layout>
    <!-- Navbar -->
    <nav class="bg-[#f5f7f7] text-white shadow mb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center h-16">
            <div class="text-sm text-[#002147] font-semibold">
                {{ Auth::user()->name }}
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="min-h-screen bg-[#002147] py-10">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <!-- Title -->
            <h2 class="text-3xl font-semibold text-white mb-6">
                {{ isset($category) ? 'Edit Category' : 'Add Category' }}
            </h2>

             <!-- Form box -->
            <div class="bg-white shadow rounded-lg border-2 border-[#002147] p-8">
                <form method="POST" action="{{ isset($category) ? route('categories.update', $category) : route('categories.store') }}" id="categoryForm">
                    @csrf
                    @if (isset($category))
                        @method('PUT')
                    @endif

                    <!-- Name -->
                    <div class="mb-4">
                        <x-input-label for="name" :value="'Name'" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $category->name ?? '')" required autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Description -->
                    <div class="mb-6">
                        <x-input-label for="description" :value="'Description'" />
                        <textarea id="description" name="description" class="block mt-1 w-full rounded-md shadow-sm border-gray-300">{{ old('description', $category->description ?? '') }}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button type="submit" id="submitBtn" class="bg-[#ff5c10] hover:bg-[#a6240d] text-white px-5 py-2 rounded shadow transition">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Disable Button Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('categoryForm');
            const submitBtn = document.getElementById('submitBtn');

            form.addEventListener('submit', function () {
                submitBtn.disabled = true;
                submitBtn.innerText = 'Saving...';
            });
        });
    </script>
</x-app-layout>
