<nav x-data="{ open: false }" class="bg-white border-b border-slate-200 shadow-sm">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex items-center">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 group">
                        <div class="w-12 h-12 bg-gradient-to-br from-pink-500 to-rose-500 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-pink-200 transform group-hover:scale-110 transition-transform">
                            <i class="fas fa-book-open text-xl"></i>
                        </div>
                        <div class="hidden md:block">
                            <span class="text-2xl font-extrabold text-slate-900">Deandles</span>
                            <span class="text-xs font-bold text-slate-400 block -mt-1">Admin Panel</span>
                        </div>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-2 sm:-my-px sm:ms-10 lg:flex">
                    <a href="{{ route('admin.dashboard') }}" 
                        class="inline-flex items-center px-4 py-2 text-sm font-bold rounded-xl transition-all {{ request()->routeIs('admin.dashboard') ? 'bg-pink-50 text-pink-600' : 'text-slate-600 hover:bg-slate-50' }}">
                        <i class="fas fa-chart-line mr-2"></i>
                        Dashboard
                    </a>

                    @if(Auth::user()->role === 'admin')
                        <a href="{{ route('admin.books.index') }}" 
                            class="inline-flex items-center px-4 py-2 text-sm font-bold rounded-xl transition-all {{ request()->routeIs('admin.books.*') ? 'bg-pink-50 text-pink-600' : 'text-slate-600 hover:bg-slate-50' }}">
                            <i class="fas fa-book mr-2"></i>
                            Books
                        </a>
                        <a href="{{ route('admin.categories.index') }}" 
                            class="inline-flex items-center px-4 py-2 text-sm font-bold rounded-xl transition-all {{ request()->routeIs('admin.categories.*') ? 'bg-pink-50 text-pink-600' : 'text-slate-600 hover:bg-slate-50' }}">
                            <i class="fas fa-th-large mr-2"></i>
                            Categories
                        </a>
                        <a href="{{ route('admin.users.index') }}" 
                            class="inline-flex items-center px-4 py-2 text-sm font-bold rounded-xl transition-all {{ request()->routeIs('admin.users.*') ? 'bg-pink-50 text-pink-600' : 'text-slate-600 hover:bg-slate-50' }}">
                            <i class="fas fa-users mr-2"></i>
                            Users
                        </a>
                        <a href="{{ route('admin.messages.index') }}" 
                            class="inline-flex items-center px-4 py-2 text-sm font-bold rounded-xl transition-all {{ request()->routeIs('admin.messages.*') ? 'bg-pink-50 text-pink-600' : 'text-slate-600 hover:bg-slate-50' }}">
                            <i class="fas fa-envelope mr-2"></i>
                            Messages
                        </a>
                    @endif
                </div>
            </div>

            <!-- Right Side -->
            <div class="hidden sm:flex sm:items-center sm:space-x-4">
                <!-- Public Site Link -->
                <a href="{{ route('home') }}" target="_blank" class="inline-flex items-center px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 text-sm font-bold rounded-xl transition-all">
                    <i class="fas fa-external-link-alt mr-2 text-xs"></i>
                    View Site
                </a>

                <!-- User Dropdown -->
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-4 py-2 border border-slate-200 text-sm font-bold rounded-xl text-slate-700 bg-white hover:bg-slate-50 focus:outline-none transition ease-in-out duration-150">
                            <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-indigo-500 rounded-lg flex items-center justify-center text-white text-xs font-bold mr-3">
                                {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                            </div>
                            <div class="text-left mr-2">
                                <div class="text-sm">{{ Auth::user()->name }}</div>
                                <div class="text-xs text-slate-400">{{ Auth::user()->role }}</div>
                            </div>
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            <i class="fas fa-user-circle mr-2"></i>
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                <i class="fas fa-sign-out-alt mr-2"></i>
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-xl text-slate-400 hover:text-slate-500 hover:bg-slate-100 focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden border-t border-slate-100">
        <div class="pt-2 pb-3 space-y-1 px-4">
            <a href="{{ route('admin.dashboard') }}" class="block px-4 py-3 text-sm font-bold rounded-xl {{ request()->routeIs('admin.dashboard') ? 'bg-pink-50 text-pink-600' : 'text-slate-600 hover:bg-slate-50' }}">
                <i class="fas fa-chart-line mr-2"></i>Dashboard
            </a>
            @if(Auth::user()->role === 'admin')
                <a href="{{ route('admin.books.index') }}" class="block px-4 py-3 text-sm font-bold rounded-xl {{ request()->routeIs('admin.books.*') ? 'bg-pink-50 text-pink-600' : 'text-slate-600 hover:bg-slate-50' }}">
                    <i class="fas fa-book mr-2"></i>Books
                </a>
                <a href="{{ route('admin.categories.index') }}" class="block px-4 py-3 text-sm font-bold rounded-xl {{ request()->routeIs('admin.categories.*') ? 'bg-pink-50 text-pink-600' : 'text-slate-600 hover:bg-slate-50' }}">
                    <i class="fas fa-th-large mr-2"></i>Categories
                </a>
                <a href="{{ route('admin.users.index') }}" class="block px-4 py-3 text-sm font-bold rounded-xl {{ request()->routeIs('admin.users.*') ? 'bg-pink-50 text-pink-600' : 'text-slate-600 hover:bg-slate-50' }}">
                    <i class="fas fa-users mr-2"></i>Users
                </a>
                <a href="{{ route('admin.messages.index') }}" class="block px-4 py-3 text-sm font-bold rounded-xl {{ request()->routeIs('admin.messages.*') ? 'bg-pink-50 text-pink-600' : 'text-slate-600 hover:bg-slate-50' }}">
                    <i class="fas fa-envelope mr-2"></i>Messages
                </a>
            @endif
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-slate-200 px-4">
            <div class="px-4 mb-3">
                <div class="font-bold text-base text-slate-900">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-slate-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="space-y-1">
                <a href="{{ route('profile.edit') }}" class="block px-4 py-3 text-sm font-bold text-slate-600 hover:bg-slate-50 rounded-xl">
                    <i class="fas fa-user-circle mr-2"></i>Profile
                </a>
                <a href="{{ route('home') }}" target="_blank" class="block px-4 py-3 text-sm font-bold text-slate-600 hover:bg-slate-50 rounded-xl">
                    <i class="fas fa-external-link-alt mr-2"></i>View Site
                </a>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left block px-4 py-3 text-sm font-bold text-red-600 hover:bg-red-50 rounded-xl">
                        <i class="fas fa-sign-out-alt mr-2"></i>Log Out
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>