<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Stock In') }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto sm:px-6 lg:px-8">
        <form action="{{ route('stock-ins.update', $stockIn) }}" method="POST" class="bg-white p-6 rounded shadow">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700">Date</label>
                <input type="date" name="date" value="{{ $stockIn->date }}" class="w-full border rounded px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Item</label>
                <select name="item_id" class="w-full border rounded px-3 py-2" required>
                    @foreach ($items as $item)
                        <option value="{{ $item->id }}" {{ $item->id == $stockIn->item_id ? 'selected' : '' }}>{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Quantity</label>
                <input type="number" name="quantity" value="{{ $stockIn->quantity }}" class="w-full border rounded px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Source</label>
                <select name="incoming_source" class="w-full border rounded px-3 py-2" required>
                    <option value="Pembelian" {{ $stockIn->incoming_source == 'Pembelian' ? 'selected' : '' }}>Pembelian</option>
                    <option value="Retur" {{ $stockIn->incoming_source == 'Retur' ? 'selected' : '' }}>Retur</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Description</label>
                <textarea name="description" class="w-full border rounded px-3 py-2">{{ $stockIn->description }}</textarea>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
        </form>
    </div>
</x-app-layout>
