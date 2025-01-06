<nav x-data="{ open: false }" style="backdrop-filter: blur(10px); background-color: rgba(255, 255, 255, 0.4);">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
        <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
            <!-- Logo and Links -->
            <div class="flex items-center space-x-4">
                <!-- Logo -->
                <div class="shrink-0">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('logo/bims-logo.png') }}" alt="logo" style="width: 80px;">
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:flex">
    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="font-sans font-bold" style="text-decoration: none;">
        {{ __('Dashboard') }}
    </x-nav-link>

    <x-nav-link :href="route('admin.map')" :active="request()->routeIs('admin.map')" class="font-sans font-bold" style="text-decoration: none;">
        {{ __('Map') }}
    </x-nav-link>

    {{-- <x-nav-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users.index')" class="font-sans font-bold" style="text-decoration: none;">
        {{ __('Users') }}
    </x-nav-link> --}}

    <x-nav-link :href="route('admin.building.index')" :active="request()->routeIs('admin.building.index')" class="font-sans font-bold" style="text-decoration: none;">
        {{ __('Building') }}
    </x-nav-link>

    <x-nav-link :href="route('admin.maintenance.index')" :active="request()->routeIs('admin.maintenance.index')" class="font-sans font-bold" style="text-decoration: none;">
        {{ __('Maintenance') }}
    </x-nav-link>

    <x-nav-link :href="route('admin.maintenance.ongoing')" :active="request()->routeIs('admin.maintenance.ongoing')" class="font-sans font-bold" style="text-decoration: none;">
        {{ __('Ongoing Maintenance') }}
    </x-nav-link>

    <x-nav-link :href="route('admin.reports')" :active="request()->routeIs('admin.reports')" class="font-sans font-bold" style="text-decoration: none;">
        {{ __('Reports') }}
    </x-nav-link>
</div>
</div>


         {{-- <!-- Search Bar -->
         <div class="flex items-center justify-center sm:justify-start">
    <div class="relative search-container flex items-center w-full sm:w-auto">
        <!-- Boxicon for the search icon -->
        <i class='bx bx-search absolute left-3 text-gray-400 text-xl'></i>

        <!-- Search Form -->
        <form action="{{ route('admin.admin.building.search') }}" method="GET" class="flex items-center w-full">
            <!-- Search input field -->
            <input type="text" name="search" placeholder="Search here"
                   class="pl-10 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-center w-full sm:w-64"
                   value="{{ request()->input('search') }}"> <!-- Preserve search input -->

            <!-- Search button -->
            <button type="submit" class="ml-2 px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 transition duration-300">
                Search
            </button>
        </form>
    </div>
</div> --}}



            <!-- User Dropdown -->
            <div class="hidden sm:flex items-center space-x-4">
                <x-dropdown align="right">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 focus:outline-none transition duration-150 ease-in-out">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        {{-- <x-dropdown-link :href="route('profile.edit')" style="text-decoration: none;">
                            {{ __('Profile') }}
                        </x-dropdown-link> --}}

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" style="text-decoration: none;">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>

                        <x-dropdown-link style="text-decoration: none;">
                            logged in as {{ Auth::user()->roles[0]->name }}
                        </x-dropdown-link>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger (for mobile) -->
            <div class="sm:hidden flex items-center">
                <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open}" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': !open, 'inline-flex': open}" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Menu (for mobile) -->
    <div :class="{'block': open, 'hidden': !open}" class="hidden sm:hidden">
        <div class="space-y-1">
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" style="text-decoration: none;">
                {{ __('Dashboard') }}
            </x-nav-link>
            <x-nav-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users.index')" style="text-decoration: none;">
                {{ __('Users') }}
            </x-nav-link>
            <x-nav-link :href="route('admin.building.index')" :active="request()->routeIs('admin.building.create')" style="text-decoration: none;">
                {{ __('Building') }}
            </x-nav-link>
            <x-nav-link :href="route('admin.maintenance.create')" :active="request()->routeIs('admin.maintenance.create')" style="text-decoration: none;">
                {{ __('Maintenance') }}
            </x-nav-link>


            <!-- User Dropdown (Mobile) -->
            {{-- <x-dropdown-link :href="route('profile.edit')" style="text-decoration: none;">
                {{ __('Profile') }}
            </x-dropdown-link> --}}
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" style="text-decoration: none;">
                    {{ __('Log Out') }}
                </x-dropdown-link>
            </form>
            <x-dropdown-link style="text-decoration: none;">
                logged in as {{ Auth::user()->roles[0]->name }}
            </x-dropdown-link>
        </div>
    </div>
</nav>

