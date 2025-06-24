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
            <x-nav-link 
                :href="route('dashboard')" 
                :active="request()->routeIs('dashboard')" 
                class="block w-full px-4 py-2 rounded hover:bg-gray-100">
                {{ __('Dashboard') }}
            </x-nav-link>

            <x-nav-link 
                :href="route('categories.index')" 
                :active="request()->routeIs('categories.*')" 
                class="block w-full px-4 py-2 rounded hover:bg-gray-100">
                {{ __('Categories') }}
            </x-nav-link>

            <x-nav-link 
                :href="route('items.index')" 
                :active="request()->routeIs('items.*')" 
                class="block w-full px-4 py-2 rounded hover:bg-gray-100">
                {{ __('Items') }}
            </x-nav-link>

            <x-nav-link 
                :href="route('stock-ins.index')" 
                :active="request()->routeIs('stock-ins.*')" 
                class="block w-full px-4 py-2 rounded hover:bg-gray-100">
                {{ __('Stock In') }}
            </x-nav-link>

            <x-nav-link 
                :href="route('stock-outs.index')" 
                :active="request()->routeIs('stock-outs.*')" 
                class="block w-full px-4 py-2 rounded hover:bg-gray-100">
                {{ __('Stock Out') }}
            </x-nav-link>

            @if (Auth::user()->role === 'Superadmin')
                <x-nav-link 
                    :href="route('users.index')" 
                    :active="request()->routeIs('users.*')" 
                    class="block w-full px-4 py-2 rounded hover:bg-gray-100">
                    {{ __('User Management') }}
                </x-nav-link>
            @endif
        </div>
    </div>

    <!-- User Info, Profile & Logout -->
    <div class="px-6 py-4 border-t border-gray-300 space-y-3">
        <!-- User Info -->
        <div>
            <div class="text-sm font-semibold text-gray-800">{{ Auth::user()->name }}</div>
            <div class="text-xs text-gray-500">{{ Auth::user()->email }}</div>
        </div>

        <!-- Profile Link -->
        <x-nav-link 
            :href="route('profile.edit')" 
            :active="request()->routeIs('profile.edit')" 
            class="block w-full px-4 py-2 rounded hover:bg-gray-100">
            {{ __('Profile') }}
        </x-nav-link>

        <!-- Logout -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-nav-link 
                :href="route('logout')" 
                onclick="event.preventDefault(); this.closest('form').submit();" 
                class="block w-full px-4 py-2 rounded hover:bg-gray-100">
                {{ __('Log Out') }}
            </x-nav-link>
        </form>
    </div>
</nav>
