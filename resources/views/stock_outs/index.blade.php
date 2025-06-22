<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Stock Outs') }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <a href="{{ route('stock-outs.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Add Stock Out</a>

        @if (session('success'))
            <div class="mb-4 text-green-600">
                {{ session('success') }}
            </div>
        @endif
            <a href="{{ route('export.stockouts') }}" class="bg-green-500 text-white px-4 py-2 rounded mb-4 inline-block" onclick="return confirm('Apakah anda yakin ingin mengekspor Stock Out ke Excel?')">
    Export Excel
</a>

        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th class="px-6 py-3">Date</th>
                        <th class="px-6 py-3">Item</th>
                        <th class="px-6 py-3">Quantity</th>
                        <th class="px-6 py-3">Destination</th>
                        <th class="px-6 py-3">User</th>
                        <th class="px-6 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($stockOuts as $stockOut)
                        <tr>
                            <td class="px-6 py-4">{{ $stockOut->date }}</td>
                            <td class="px-6 py-4">{{ $stockOut->item->name }}</td>
                            <td class="px-6 py-4">{{ $stockOut->quantity }}</td>
                            <td class="px-6 py-4">{{ $stockOut->outgoing_destination }}</td>
                            <td class="px-6 py-4">{{ $stockOut->user->username }}</td>
                            <td class="px-6 py-4">
                                <a href="{{ route('stock-outs.edit', $stockOut) }}" class="text-blue-500 mr-2">Edit</a>
                                <form action="{{ route('stock-outs.destroy', $stockOut) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="p-4">
                {{ $stockOuts->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
