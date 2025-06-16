<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Admin Account') }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <form method="POST" action="{{ route('users.update', $user) }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label>Username</label>
                <input type="text" name="username" class="w-full border rounded px-3 py-2" value="{{ $user->username }}" required>
            </div>

            <div class="mb-4">
                <label>Email</label>
                <input type="email" name="email" class="w-full border rounded px-3 py-2" value="{{ $user->email }}" required>
            </div>

            <div class="mb-4">
                <label>Status</label>
                <select name="status" class="w-full border rounded px-3 py-2">
                    <option value="1" {{ $user->status ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ !$user->status ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
        </form>
    </div>
</x-app-layout>
