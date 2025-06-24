<x-guest-layout>
    <div class="min-h-screen flex flex-col justify-start items-center bg-gradient-to-b from-[#ff5c10] to-[#002147] pt-16 px-4 md:px-8 relative overflow-hidden">

        <!-- Welcome Box -->
        <div class="welcome-box animate-fade-in-up">
            <h1 class="welcome-title">Login</h1>
        </div>

        <!-- Login Box -->
        <div class="login-box animate-fade-in-up delay-150">
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="mb-5">
                    <x-input-label for="email" :value="('Email')" />
                    <x-text-input id="email" class="block mt-2 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mb-5">
                    <x-input-label for="password" :value="('Password')" />
                    <x-text-input id="password" class="block mt-2 w-full" type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center mb-6">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <label for="remember_me" class="ml-2 text-sm text-gray-600">Remember me</label>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                    @if (Route::has('password.request'))
                        <a class="text-sm text-orange-500 hover:text-orange-700 transition-colors duration-300" href="{{ route('password.request') }}">
                            Forgot your password?
                        </a>
                    @endif

                    <button type="submit" class="login-button">
                        Log in
                    </button>
                </div>
            </form>
        </div>

       <!-- Stickman Left -->
<div class="absolute bottom-8 left-4 animate-stickman-left z-10">
    <img src="{{ asset('forpic.img/rena_bluberi.png') }}" alt="stickman left" class="w-12 md:w-14">
</div>

<!-- Stickman Right -->
<div class="absolute bottom-8 right-4 animate-stickman-right z-10">
    <img src="{{ asset('forpic.img/naina_stoberi.png') }}" alt="stickman right" class="w-12 md:w-14">
</div>

    </div>
</x-guest-layout>
