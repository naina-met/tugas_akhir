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
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Title -->
            <h2 class="text-3xl font-semibold text-white mb-6 text-center">
                {{ __('Profile') }}
            </h2>

            <!-- Update Profile Information -->
            <div class="bg-white shadow rounded-lg border-2 border-[#002147] p-8">
                @include('profile.partials.update-profile-information-form')
            </div>

            <!-- Update Password -->
            <div class="bg-white shadow rounded-lg border-2 border-[#002147] p-8">
                @include('profile.partials.update-password-form')
            </div>

            <!-- Delete User -->
            <div class="bg-white shadow rounded-lg border-2 border-[#002147] p-8 mb-10">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</x-app-layout>
