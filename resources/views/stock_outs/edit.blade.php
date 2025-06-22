<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Stock Out') }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto sm:px-6 lg:px-8">
        @if ($errors->any())
    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        <form action="{{ route('stock-outs.update', $stockOut) }}" method="POST" class="bg-white p-6 rounded shadow">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700">Date</label>
                <input type="date" name="date" value="{{ $stockOut->date }}" class="w-full border rounded px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Item</label>
                <select name="item_id" class="w-full border rounded px-3 py-2" required>
                    @foreach ($items as $item)
                        <option value="{{ $item->id }}" {{ $item->id == $stockOut->item_id ? 'selected' : '' }}>{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Quantity</label>
                <input type="number" name="quantity" value="{{ $stockOut->quantity }}" class="w-full border rounded px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Destination</label>
                <select name="outgoing_destination" class="w-full border rounded px-3 py-2" required>
                    <option value="Penjualan" {{ $stockOut->outgoing_destination == 'Penjualan' ? 'selected' : '' }}>Penjualan</option>
                    <option value="Pemakaian internal" {{ $stockOut->outgoing_destination == 'Pemakaian internal' ? 'selected' : '' }}>Pemakaian internal</option>
                    <option value="Rusak" {{ $stockOut->outgoing_destination == 'Rusak' ? 'selected' : '' }}>Rusak</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Description</label>
                <textarea name="description" class="w-full border rounded px-3 py-2">{{ $stockOut->description }}</textarea>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
        </form>
    </div>
</x-app-layout>
