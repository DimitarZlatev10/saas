<nav x-data="{ open: false }" class="bg-white border-b border-gray-200 shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a wire:navigate href="{{ route('home') }}" class="text-xl font-semibold text-gray-800">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link wire:navigate :href="route('businesses.index')" :active="request()->routeIs('businesses.index')">
                        {{ __('Businesses') }}
                    </x-nav-link>
                    <x-nav-link wire:navigate :href="route('businesses.register')" :active="request()->routeIs('businesses.register')">
                        {{ __('Register Business') }}
                    </x-nav-link>

                    @auth
                        {{-- <x-nav-link wire:navigate :href="route('user.businesses')" :active="request()->routeIs('user.businesses')">
                            {{ __('My Businesses') }}
                        </x-nav-link>
                        <x-nav-link wire:navigate :href="route('user.appointments')" :active="request()->routeIs('user.appointments')">
                            {{ __('My Appointments') }}
                        </x-nav-link> --}}
                    @else
                        <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                            {{ __('Login') }}
                        </x-nav-link>
                        <x-nav-link :href="route('register')" :active="request()->routeIs('register')">
                            {{ __('Register') }}
                        </x-nav-link>
                    @endauth
                </div>
            </div>

            <!-- User Menu -->
            @auth
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium text-gray-600 bg-white hover:text-gray-800 focus:outline-none">
                                <span>{{ auth()->user()->name }}</span>
                                <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link wire:navigate :href="route('profile')">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                            <x-dropdown-link wire:navigate :href="route('dashboard')">
                                {{ __('Dashboard') }}
                            </x-dropdown-link>
                            <x-dropdown-link wire:navigate :href="route('user.businesses')">
                                {{ __('My Businesses') }}
                            </x-dropdown-link>
                            <x-dropdown-link wire:navigate :href="route('user.appointments')">
                                {{ __('My Appointments') }}
                            </x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf
                                <x-dropdown-link @click.prevent="$el.closest('form').submit()">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            @endauth

            <!-- Mobile Menu Button -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = !open"
                    class="inline-flex items-center justify-center p-2 text-gray-400 hover:text-gray-600">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('businesses.index')" :active="request()->routeIs('businesses.index')">
                {{ __('Businesses') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('businesses.register')" :active="request()->routeIs('businesses.register')">
                {{ __('Register Business') }}
            </x-responsive-nav-link>

            @auth
                <x-responsive-nav-link :href="route('user.businesses')" :active="request()->routeIs('user.businesses')">
                    {{ __('My Businesses') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('user.appointments')" :active="request()->routeIs('user.appointments')">
                    {{ __('My Appointments') }}
                </x-responsive-nav-link>
            @else
                <x-responsive-nav-link :href="route('login')" :active="request()->routeIs('login')">
                    {{ __('Login') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('register')" :active="request()->routeIs('register')">
                    {{ __('Register') }}
                </x-responsive-nav-link>
            @endauth
        </div>

        @auth
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="px-4">
                    <div class="font-medium text-gray-800">{{ auth()->user()->name }}</div>
                    <div class="font-medium text-gray-500">{{ auth()->user()->email }}</div>
                </div>
                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf
                        <x-responsive-nav-link @click.prevent="$el.closest('form').submit()">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        @endauth
    </div>
</nav>
