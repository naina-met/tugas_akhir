<x-guest-layout>
    <div class="min-h-screen flex flex-col justify-start items-center bg-gradient-to-b from-[#ff5c10] to-[#002147] pt-16 px-4 md:px-8 relative overflow-hidden">

        <!-- Welcome Box -->
        <div class="welcome-box animate-fade-in-up">
            <h1 class="welcome-title">Register Akun</h1>
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
                    <div class="relative mt-2 flex items-center">
                        <x-text-input id="password" class="w-full pr-10" type="password" name="password" required autocomplete="new-password" />
                        <button type="button" onclick="togglePassword('password', this)" 
                            class="absolute right-3 inset-y-0 flex items-center text-gray-500 hover:text-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.478 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mb-5">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <div class="relative mt-2 flex items-center">
                        <x-text-input id="password_confirmation" class="w-full pr-10" type="password" name="password_confirmation" required autocomplete="new-password" />
                        <button type="button" onclick="togglePassword('password_confirmation', this)" 
                            class="absolute right-3 inset-y-0 flex items-center text-gray-500 hover:text-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.478 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>
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

    <!-- Password Toggle Script -->
    <script>
        function togglePassword(fieldId, button) {
            const input = document.getElementById(fieldId);
            const isVisible = input.type === "text";
            input.type = isVisible ? "password" : "text";

            const svg = button.querySelector('svg');
            svg.innerHTML = isVisible
                ? `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                         d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                         d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.478 0-8.268-2.943-9.542-7z" />`
                : `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                         d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.956 9.956 0 012.11-3.368m1.977-1.704A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.542 7a9.972 9.972 0 01-4.36 5.225M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                         d="M3 3l18 18" />`;
        }
    </script>
</x-guest-layout>
