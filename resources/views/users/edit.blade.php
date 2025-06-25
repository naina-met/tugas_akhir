<x-app-layout>
    <!-- Navbar -->
    <nav class="bg-[#f5f7f7] text-white shadow mb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center h-16">
            <!-- User -->
            <div class="text-sm text-[#002147] font-semibold">
                {{ Auth::user()->name }}
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="min-h-screen bg-[#002147] py-10">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <!-- Title -->
            <h2 class="text-2xl font-semibold text-white mb-6">Edit Admin Account</h2>

            <!-- Error Alert -->
            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form -->
            <form id="editUserForm" method="POST" action="{{ route('users.update', $user) }}" class="bg-white p-8 rounded shadow border-2 border-[#002147] space-y-5">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-sm font-medium text-[#002147] mb-1">Username</label>
                    <input type="text" name="username" value="{{ $user->username }}" class="w-full border rounded px-3 py-2" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-[#002147] mb-1">Email</label>
                    <input type="email" name="email" value="{{ $user->email }}" class="w-full border rounded px-3 py-2" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-[#002147] mb-1">Status</label>
                    <select name="status" class="w-full border rounded px-3 py-2">
                        <option value="1" {{ $user->status ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ !$user->status ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <!-- Buttons -->
                <div class="flex gap-4">
                    <button id="submitBtn" type="submit" class="bg-[#ff5c10] hover:bg-[#a6240d] text-white px-6 py-2 rounded shadow transition">
                        Update
                    </button>
                    <a href="{{ route('users.index') }}" class="bg-gray-400 hover:bg-gray-500 text-white px-6 py-2 rounded shadow transition">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- JavaScript: Disable submit button on form submit -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('editUserForm');
            const submitBtn = document.getElementById('submitBtn');

            form.addEventListener('submit', function () {
                submitBtn.disabled = true;
                submitBtn.innerText = 'Updating...';
            });
        });
    </script>
</x-app-layout>
