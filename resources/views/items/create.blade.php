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
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <!-- Title di luar form -->
            <h2 class="text-3xl font-semibold text-white mb-6">
                {{ isset($item) ? 'Edit Item' : 'Add Item' }}
            </h2>

            <!-- Form box -->
            <div class="bg-white shadow rounded-lg border-2 border-[#002147] p-8">
                <form method="POST" action="{{ isset($item) ? route('items.update', $item) : route('items.store') }}">
                    @csrf
                    @if (isset($item))
                        @method('PUT')
                    @endif

                    <!-- Name -->
                    <div class="mb-4">
                        <x-input-label for="name" :value="'Name'" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ old('name', $item->name ?? '') }}" required autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Code -->
                    <div class="mb-4">
                        <x-input-label for="code" :value="'Code'" />
                        <x-text-input id="code" class="block mt-1 w-full" type="text" name="code" value="{{ old('code', $item->code ?? '') }}" required />
                        <x-input-error :messages="$errors->get('code')" class="mt-2" />
                    </div>

                    <!-- Category -->
                    <div class="mb-4">
                        <x-input-label for="category_id" :value="'Category'" />
                        <select id="category_id" name="category_id" class="block mt-1 w-full rounded-md shadow-sm border-gray-300" required>
                            <option value="">-- Select Category --</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ (old('category_id', $item->category_id ?? '') == $category->id) ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                    </div>

                    <!-- Description -->
                    <div class="mb-4">
                        <x-input-label for="description" :value="'Description'" />
                        <textarea id="description" name="description" class="block mt-1 w-full rounded-md shadow-sm border-gray-300">{{ old('description', $item->description ?? '') }}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <!-- Stock -->
                    <div class="mb-4">
                        <x-input-label for="stock" :value="'Stock'" />
                        <x-text-input id="stock" class="block mt-1 w-full" type="number" name="stock" value="{{ old('stock', $item->stock ?? 0) }}" required />
                        <x-input-error :messages="$errors->get('stock')" class="mt-2" />
                    </div>

                    <!-- Unit -->
                    <div class="mb-6">
                        <x-input-label for="unit" :value="'Unit'" />
                        <select name="unit" id="unit" class="block mt-1 w-full rounded-md shadow-sm border-gray-300" required>
                            <option value="">-- Select Unit --</option>
                            <option value="pcs" {{ old('unit', $item->unit ?? '') == 'pcs' ? 'selected' : '' }}>Pcs</option>
                            <option value="box" {{ old('unit', $item->unit ?? '') == 'box' ? 'selected' : '' }}>Box</option>
                            <option value="kg" {{ old('unit', $item->unit ?? '') == 'kg' ? 'selected' : '' }}>Kg</option>
                            <option value="liter" {{ old('unit', $item->unit ?? '') == 'liter' ? 'selected' : '' }}>Liter</option>
                        </select>
                        <x-input-error :messages="$errors->get('unit')" class="mt-2" />
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button type="submit" class="bg-[#ff5c10] hover:bg-[#a6240d] text-white px-5 py-2 rounded shadow transition">
                            {{ isset($item) ? 'Update' : 'Save' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
