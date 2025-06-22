<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Stock Ins') }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <a href="{{ route('stock-ins.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Add Stock In</a>

        @if (session('success'))
            <div class="mb-4 text-green-600">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{ route('export.stockins') }}" class="bg-green-500 text-white px-4 py-2 rounded mb-4 inline-block" onclick="return confirm('Apakah anda yakin ingin mengekspor Stock In ke Excel?')">
    Export Excel
</a>



        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th class="px-6 py-3">Date</th>
                        <th class="px-6 py-3">Item</th>
                        <th class="px-6 py-3">Quantity</th>
                        <th class="px-6 py-3">Source</th>
                        <th class="px-6 py-3">User</th>
                        <th class="px-6 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($stockIns as $stockIn)
                        <tr>
                            <td class="px-6 py-4">{{ $stockIn->date }}</td>
                            <td class="px-6 py-4">{{ $stockIn->item->name }}</td>
                            <td class="px-6 py-4">{{ $stockIn->quantity }}</td>
                            <td class="px-6 py-4">{{ $stockIn->incoming_source }}</td>
                            <td class="px-6 py-4">{{ $stockIn->user->username }}</td>
                            <td class="px-6 py-4">
                                <a href="{{ route('stock-ins.edit', $stockIn) }}" class="text-blue-500 mr-2">Edit</a>
                                <form action="{{ route('stock-ins.destroy', $stockIn) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?');">
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
                {{ $stockIns->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
