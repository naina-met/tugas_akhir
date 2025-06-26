<nav x-data="{ open: false }" class="flex flex-col justify-between w-64 h-screen bg-white text-gray-800">
    <!-- Sidebar Header -->
    <div>
        <div class="flex items-center justify-center h-20 border-b border-gray-300">
            <a href="{{ route('dashboard') }}">
                <img src="/forpic.img/logocm.png" alt="Logo" class="h-16">
            </a>
        </div>

        <!-- Navigation Links -->
        <div class="px-6 py-6 space-y-4 text-base font-medium">

            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-gray-100">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7m-7-7v18" />
                </svg>
                {{ __('Dashboard') }}
            </x-nav-link>

            <x-nav-link :href="route('categories.index')" :active="request()->routeIs('categories.*')" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-gray-100">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h8m-8 6h16" />
                </svg>
                {{ __('Categories') }}
            </x-nav-link>

            <x-nav-link :href="route('items.index')" :active="request()->routeIs('items.*')" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-gray-100">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 16V8a2 2 0 00-1-1.732l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 8v8a2 2 0 001 1.732l7 4a2 2 0 002 0l7-4a2 2 0 001-1.732z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.27 6.96l8.73 5.04 8.73-5.04" />
                </svg>
                {{ __('Items') }}
            </x-nav-link>

            <x-nav-link :href="route('stock-ins.index')" :active="request()->routeIs('stock-ins.*')" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-gray-100">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
                {{ __('Stock In') }}
            </x-nav-link>

            <x-nav-link :href="route('stock-outs.index')" :active="request()->routeIs('stock-outs.*')" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-gray-100">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20 12H4" />
                </svg>
                {{ __('Stock Out') }}
            </x-nav-link>

            @if (Auth::user()->role === 'Superadmin')
                <x-nav-link :href="route('users.index')" :active="request()->routeIs('users.*')" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-gray-100">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A8.964 8.964 0 0112 15c1.957 0 3.76.634 5.121 1.804M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    {{ __('User Management') }}
                </x-nav-link>
            @endif
        </div>
    </div>

    <!-- User Info, Profile & Logout -->
    <div class="px-6 py-4 border-t border-gray-300 space-y-3">
        <div>
            <div class="text-sm font-semibold text-gray-800">{{ Auth::user()->name }}</div>
            <div class="text-xs text-gray-500">{{ Auth::user()->email }}</div>
        </div>

        <x-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-gray-100">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536M9 11l6-6 3.536 3.536L12.464 14.464 9 11zm-6 7.5V21h2.5l6.036-6.036-2.5-2.5L3 18.5z" />
            </svg>
            {{ __('Profile') }}
        </x-nav-link>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-gray-100">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H6a2 2 0 01-2-2V7a2 2 0 012-2h5a2 2 0 012 2v1" />
                </svg>
                {{ __('Log Out') }}
            </x-nav-link>
        </form>
    </div>
</nav>
