<x-guest-layout>
    <div class="min-h-screen flex flex-col justify-start items-center bg-gradient-to-b from-[#ff5c10] to-[#002147] pt-16 px-4 md:px-8 relative overflow-hidden">

        <!-- Welcome Box -->
        <div class="welcome-box animate-fade-in-up">
            <h1 class="welcome-title">Register Akun ✨</h1>
        </div>

        <!-- Register Box -->
        <div class="login-box animate-fade-in-up delay-150">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Username -->
                <div class="mb-5">
                    <x-input-label for="username" :value="__('Username')" />
                    <x-text-input id="username" class="block mt-2 w-full" type="text" name="username" :value="old('username')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('username')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mb-5">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-2 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mb-5">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-2 w-full" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mb-5">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" class="block mt-2 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                    <a class="text-sm text-orange-500 hover:text-orange-700 transition-colors duration-300" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <button type="submit" class="login-button">
                        {{ __('Register') }}
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
