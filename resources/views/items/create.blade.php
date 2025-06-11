<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ isset($item) ? 'Edit Item' : 'Add Item' }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <form method="POST" action="{{ isset($item) ? route('items.update', $item) : route('items.store') }}">
            @csrf
            @if (isset($item))
                @method('PUT')
            @endif

            <div class="mb-4">
                <x-input-label for="name" :value="'Name'" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ old('name', $item->name ?? '') }}" required autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-input-label for="code" :value="'Code'" />
                <x-text-input id="code" class="block mt-1 w-full" type="text" name="code" value="{{ old('code', $item->code ?? '') }}" required />
                <x-input-error :messages="$errors->get('code')" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-input-label for="category_id" :value="'Category'" />
                <select id="category_id" name="category_id" class="block mt-1 w-full" required>
                    <option value="">-- Select Category --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ (old('category_id', $item->category_id ?? '') == $category->id) ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-input-label for="description" :value="'Description'" />
                <textarea id="description" name="description" class="block mt-1 w-full">{{ old('description', $item->description ?? '') }}</textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-input-label for="stock" :value="'Stock'" />
                <x-text-input id="stock" class="block mt-1 w-full" type="number" name="stock" value="{{ old('stock', $item->stock ?? 0) }}" required />
                <x-input-error :messages="$errors->get('stock')" class="mt-2" />
            </div>

            <!-- Unit -->
<div class="mt-4">
    <x-input-label for="unit" value="Unit" />
    <select name="unit" id="unit" class="block mt-1 w-full rounded-md shadow-sm border-gray-300">
        <option value="">-- Select Unit --</option>
        <option value="pcs" {{ old('unit') == 'pcs' ? 'selected' : '' }}>Pcs</option>
        <option value="box" {{ old('unit') == 'box' ? 'selected' : '' }}>Box</option>
        <option value="kg" {{ old('unit') == 'kg' ? 'selected' : '' }}>Kg</option>
        <option value="liter" {{ old('unit') == 'liter' ? 'selected' : '' }}>Liter</option>
    </select>
    <x-input-error :messages="$errors->get('unit')" class="mt-2" />
</div>



            <div>
                <x-primary-button>
                    {{ isset($item) ? 'Update' : 'Save' }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
