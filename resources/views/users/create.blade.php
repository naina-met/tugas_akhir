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
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold text-white mb-6">Add Admin Account</h2>

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
            <form id="adminForm" method="POST" action="{{ route('users.store') }}" class="bg-white p-8 rounded shadow border-2 border-[#002147] space-y-5">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-[#002147] mb-1">Username</label>
                    <input type="text" name="username" class="w-full border rounded px-3 py-2" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-[#002147] mb-1">Email</label>
                    <input type="email" name="email" class="w-full border rounded px-3 py-2" required>
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-sm font-medium text-[#002147] mb-1">Password</label>
                    <div class="relative">
                        <input type="password" name="password" id="password" class="w-full border rounded px-3 py-2 pr-10" required>
                        <button type="button" class="absolute right-2 top-1/2 transform -translate-y-1/2 text-gray-500" onclick="togglePassword('password', this)">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 eye-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path id="eye-path-password" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Confirm Password -->
                <div>
                    <label class="block text-sm font-medium text-[#002147] mb-1">Confirm Password</label>
                    <div class="relative">
                        <input type="password" name="password_confirmation" id="password_confirmation" class="w-full border rounded px-3 py-2 pr-10" required>
                        <button type="button" class="absolute right-2 top-1/2 transform -translate-y-1/2 text-gray-500" onclick="togglePassword('password_confirmation', this)">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 eye-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path id="eye-path-confirm" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="flex gap-4">
                    <button id="submitBtn" type="submit" class="bg-[#ff5c10] hover:bg-[#a6240d] text-white px-6 py-2 rounded shadow transition">
                        Save
                    </button>
                    <a href="{{ route('users.index') }}" class="bg-gray-400 hover:bg-gray-500 text-white px-6 py-2 rounded shadow transition">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Script untuk disable tombol saat submit -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('adminForm');
            const submitBtn = document.getElementById('submitBtn');

            form.addEventListener('submit', function () {
                submitBtn.disabled = true;
                submitBtn.innerText = 'Saving...';
            });
        });

        function togglePassword(fieldId, button) {
            const field = document.getElementById(fieldId);
            const icon = button.querySelector('svg');

            if (field.type === 'password') {
                field.type = 'text';
                icon.classList.add('text-blue-600');
            } else {
                field.type = 'password';
                icon.classList.remove('text-blue-600');
            }
        }
    </script>
</x-app-layout>
