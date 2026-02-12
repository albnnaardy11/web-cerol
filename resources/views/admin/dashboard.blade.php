<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-extrabold text-3xl text-slate-900 leading-tight tracking-tight">
                    Dashboard Analytics
                </h2>
                <p class="text-slate-500 text-sm mt-1 font-medium">Monitor your library performance in real-time</p>
            </div>
            <div class="hidden md:flex items-center space-x-3">
                <div class="px-4 py-2 bg-gradient-to-r from-pink-500 to-rose-500 text-white rounded-xl text-sm font-bold shadow-lg shadow-pink-200">
                    <i class="fas fa-crown mr-2"></i>{{ Auth::user()->role === 'admin' ? 'Admin' : 'User' }}
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-slate-50 via-pink-50/30 to-blue-50/30 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Welcome Card -->
            <div class="mb-10 relative overflow-hidden">
                <div class="bg-gradient-to-r from-pink-500 via-rose-500 to-orange-500 rounded-[3rem] p-12 shadow-2xl shadow-pink-200/50 relative">
                    <!-- Decorative Elements -->
                    <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
                    <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/10 rounded-full blur-3xl"></div>
                    
                    <div class="relative z-10">
                        <div class="flex items-center space-x-4 mb-4">
                            <div class="w-20 h-20 bg-white/20 backdrop-blur-md rounded-2xl flex items-center justify-center text-white text-3xl border border-white/30 shadow-xl">
                                <i class="fas fa-user-circle"></i>
                            </div>
                            <div>
                                <h3 class="text-white text-4xl font-extrabold mb-1">Welcome back, {{ Auth::user()->name }}! 👋</h3>
                                <p class="text-white/80 text-lg font-medium">Here's what's happening with your library today</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-6 mt-6">
                            <div class="flex items-center space-x-2 text-white/90">
                                <i class="fas fa-calendar-alt"></i>
                                <span class="font-bold text-sm">{{ now()->format('l, F j, Y') }}</span>
                            </div>
                            <div class="flex items-center space-x-2 text-white/90">
                                <i class="fas fa-clock"></i>
                                <span class="font-bold text-sm">{{ now()->format('h:i A') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
                <!-- Books Stat -->
                <div class="group bg-white rounded-[2.5rem] p-8 shadow-lg shadow-slate-100 border border-slate-100 hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-pink-100 to-pink-50 rounded-full blur-2xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div class="relative z-10">
                        <div class="flex items-start justify-between mb-6">
                            <div class="w-16 h-16 bg-gradient-to-br from-pink-500 to-rose-500 rounded-2xl flex items-center justify-center text-white text-2xl shadow-lg shadow-pink-200 transform group-hover:scale-110 group-hover:rotate-6 transition-transform duration-500">
                                <i class="fas fa-book-open"></i>
                            </div>
                            <div class="px-3 py-1 bg-pink-50 text-pink-600 rounded-full text-xs font-black uppercase tracking-wider">
                                Total
                            </div>
                        </div>
                        <h4 class="text-5xl font-extrabold text-slate-900 mb-2 tracking-tight">{{ $stats['books'] }}</h4>
                        <p class="text-slate-400 text-sm font-bold uppercase tracking-widest">Books Collection</p>
                        <div class="mt-4 flex items-center text-emerald-500 text-xs font-bold">
                            <i class="fas fa-arrow-up mr-1"></i>
                            <span>12% from last month</span>
                        </div>
                    </div>
                </div>

                <!-- Categories Stat -->
                <div class="group bg-white rounded-[2.5rem] p-8 shadow-lg shadow-slate-100 border border-slate-100 hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-blue-100 to-blue-50 rounded-full blur-2xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div class="relative z-10">
                        <div class="flex items-start justify-between mb-6">
                            <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-500 rounded-2xl flex items-center justify-center text-white text-2xl shadow-lg shadow-blue-200 transform group-hover:scale-110 group-hover:rotate-6 transition-transform duration-500">
                                <i class="fas fa-layer-group"></i>
                            </div>
                            <div class="px-3 py-1 bg-blue-50 text-blue-600 rounded-full text-xs font-black uppercase tracking-wider">
                                Active
                            </div>
                        </div>
                        <h4 class="text-5xl font-extrabold text-slate-900 mb-2 tracking-tight">{{ $stats['categories'] }}</h4>
                        <p class="text-slate-400 text-sm font-bold uppercase tracking-widest">Categories</p>
                        <div class="mt-4 flex items-center text-blue-500 text-xs font-bold">
                            <i class="fas fa-check-circle mr-1"></i>
                            <span>All active</span>
                        </div>
                    </div>
                </div>

                <!-- Users Stat -->
                <div class="group bg-white rounded-[2.5rem] p-8 shadow-lg shadow-slate-100 border border-slate-100 hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-emerald-100 to-emerald-50 rounded-full blur-2xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div class="relative z-10">
                        <div class="flex items-start justify-between mb-6">
                            <div class="w-16 h-16 bg-gradient-to-br from-emerald-500 to-teal-500 rounded-2xl flex items-center justify-center text-white text-2xl shadow-lg shadow-emerald-200 transform group-hover:scale-110 group-hover:rotate-6 transition-transform duration-500">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="px-3 py-1 bg-emerald-50 text-emerald-600 rounded-full text-xs font-black uppercase tracking-wider">
                                Online
                            </div>
                        </div>
                        <h4 class="text-5xl font-extrabold text-slate-900 mb-2 tracking-tight">{{ $stats['users'] }}</h4>
                        <p class="text-slate-400 text-sm font-bold uppercase tracking-widest">Active Users</p>
                        <div class="mt-4 flex items-center text-emerald-500 text-xs font-bold">
                            <i class="fas fa-arrow-up mr-1"></i>
                            <span>8% from last week</span>
                        </div>
                    </div>
                </div>

                <!-- Messages Stat -->
                <div class="group bg-white rounded-[2.5rem] p-8 shadow-lg shadow-slate-100 border border-slate-100 hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-amber-100 to-amber-50 rounded-full blur-2xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div class="relative z-10">
                        <div class="flex items-start justify-between mb-6">
                            <div class="w-16 h-16 bg-gradient-to-br from-amber-500 to-orange-500 rounded-2xl flex items-center justify-center text-white text-2xl shadow-lg shadow-amber-200 transform group-hover:scale-110 group-hover:rotate-6 transition-transform duration-500">
                                <i class="fas fa-envelope-open-text"></i>
                            </div>
                            <div class="px-3 py-1 bg-amber-50 text-amber-600 rounded-full text-xs font-black uppercase tracking-wider">
                                New
                            </div>
                        </div>
                        <h4 class="text-5xl font-extrabold text-slate-900 mb-2 tracking-tight">{{ $stats['messages'] }}</h4>
                        <p class="text-slate-400 text-sm font-bold uppercase tracking-widest">Messages</p>
                        <div class="mt-4 flex items-center text-slate-400 text-xs font-bold">
                            <i class="fas fa-inbox mr-1"></i>
                            <span>Inbox</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white rounded-[3rem] p-10 shadow-lg shadow-slate-100 border border-slate-100 mb-12">
                <div class="flex items-center justify-between mb-8 pb-6 border-b border-slate-100">
                    <div>
                        <h3 class="text-2xl font-extrabold text-slate-900 mb-1">Quick Actions</h3>
                        <p class="text-slate-500 text-sm font-medium">Manage your library with one click</p>
                    </div>
                    <div class="hidden md:block">
                        <div class="flex items-center space-x-2 px-4 py-2 bg-slate-50 rounded-2xl">
                            <div class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></div>
                            <span class="text-slate-600 text-sm font-bold">All Systems Operational</span>
                        </div>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <a href="{{ route('admin.books.create') }}" class="group flex items-center justify-between p-6 bg-gradient-to-br from-pink-50 to-rose-50 rounded-3xl hover:from-pink-500 hover:to-rose-500 transition-all duration-300 border border-pink-100 hover:border-pink-500 hover:shadow-xl hover:shadow-pink-200">
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center text-pink-500 group-hover:text-white transition-colors shadow-sm">
                                <i class="fas fa-plus-circle text-xl"></i>
                            </div>
                            <div>
                                <span class="font-extrabold text-slate-900 group-hover:text-white transition-colors block">Add New Book</span>
                                <span class="text-xs text-slate-500 group-hover:text-white/80 transition-colors font-medium">Expand collection</span>
                            </div>
                        </div>
                        <i class="fas fa-arrow-right text-pink-300 group-hover:text-white transition-all group-hover:translate-x-1"></i>
                    </a>

                    <a href="{{ route('admin.users.index') }}" class="group flex items-center justify-between p-6 bg-gradient-to-br from-blue-50 to-indigo-50 rounded-3xl hover:from-blue-500 hover:to-indigo-500 transition-all duration-300 border border-blue-100 hover:border-blue-500 hover:shadow-xl hover:shadow-blue-200">
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center text-blue-500 group-hover:text-white transition-colors shadow-sm">
                                <i class="fas fa-user-cog text-xl"></i>
                            </div>
                            <div>
                                <span class="font-extrabold text-slate-900 group-hover:text-white transition-colors block">Manage Users</span>
                                <span class="text-xs text-slate-500 group-hover:text-white/80 transition-colors font-medium">User administration</span>
                            </div>
                        </div>
                        <i class="fas fa-arrow-right text-blue-300 group-hover:text-white transition-all group-hover:translate-x-1"></i>
                    </a>

                    <a href="{{ route('admin.messages.index') }}" class="group flex items-center justify-between p-6 bg-gradient-to-br from-emerald-50 to-teal-50 rounded-3xl hover:from-emerald-500 hover:to-teal-500 transition-all duration-300 border border-emerald-100 hover:border-emerald-500 hover:shadow-xl hover:shadow-emerald-200">
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center text-emerald-500 group-hover:text-white transition-colors shadow-sm">
                                <i class="fas fa-comments text-xl"></i>
                            </div>
                            <div>
                                <span class="font-extrabold text-slate-900 group-hover:text-white transition-colors block">View Messages</span>
                                <span class="text-xs text-slate-500 group-hover:text-white/80 transition-colors font-medium">Check inbox</span>
                            </div>
                        </div>
                        <i class="fas fa-arrow-right text-emerald-300 group-hover:text-white transition-all group-hover:translate-x-1"></i>
                    </a>
                </div>
            </div>

            <!-- Recent Activity & System Info -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Recent Activity -->
                <div class="bg-white rounded-[3rem] p-10 shadow-lg shadow-slate-100 border border-slate-100">
                    <div class="flex items-center justify-between mb-8">
                        <div>
                            <h3 class="text-xl font-extrabold text-slate-900 mb-1">Recent Activity</h3>
                            <p class="text-slate-500 text-xs font-medium">Latest system updates</p>
                        </div>
                        <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-pink-500 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-purple-200">
                            <i class="fas fa-history"></i>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div class="flex items-start space-x-4 p-4 bg-slate-50 rounded-2xl hover:bg-slate-100 transition-colors">
                            <div class="w-10 h-10 bg-pink-100 rounded-xl flex items-center justify-center text-pink-500 shrink-0">
                                <i class="fas fa-book text-sm"></i>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-bold text-slate-900">Database seeded successfully</p>
                                <p class="text-xs text-slate-500 mt-1">{{ $stats['books'] }} books imported from Open Library API</p>
                                <p class="text-xs text-slate-400 mt-1">Just now</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4 p-4 bg-slate-50 rounded-2xl hover:bg-slate-100 transition-colors">
                            <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center text-blue-500 shrink-0">
                                <i class="fas fa-user-plus text-sm"></i>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-bold text-slate-900">New user registered</p>
                                <p class="text-xs text-slate-500 mt-1">{{ Auth::user()->name }} joined the system</p>
                                <p class="text-xs text-slate-400 mt-1">Today</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4 p-4 bg-slate-50 rounded-2xl hover:bg-slate-100 transition-colors">
                            <div class="w-10 h-10 bg-emerald-100 rounded-xl flex items-center justify-center text-emerald-500 shrink-0">
                                <i class="fas fa-check-circle text-sm"></i>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-bold text-slate-900">System update completed</p>
                                <p class="text-xs text-slate-500 mt-1">UI/UX redesign deployed successfully</p>
                                <p class="text-xs text-slate-400 mt-1">Today</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- System Info -->
                <div class="bg-gradient-to-br from-slate-900 to-slate-800 rounded-[3rem] p-10 shadow-2xl shadow-slate-300 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-pink-500/10 rounded-full blur-3xl"></div>
                    <div class="absolute bottom-0 left-0 w-48 h-48 bg-blue-500/10 rounded-full blur-3xl"></div>
                    
                    <div class="relative z-10">
                        <div class="flex items-center justify-between mb-8">
                            <div>
                                <h3 class="text-xl font-extrabold text-white mb-1">System Information</h3>
                                <p class="text-slate-400 text-xs font-medium">Server status & metrics</p>
                            </div>
                            <div class="w-10 h-10 bg-white/10 backdrop-blur-md rounded-2xl flex items-center justify-center text-white border border-white/20">
                                <i class="fas fa-server"></i>
                            </div>
                        </div>
                        
                        <div class="space-y-4">
                            <div class="flex items-center justify-between p-4 bg-white/5 backdrop-blur-md rounded-2xl border border-white/10">
                                <div class="flex items-center space-x-3">
                                    <i class="fas fa-database text-blue-400"></i>
                                    <span class="text-white text-sm font-bold">Database</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <div class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse"></div>
                                    <span class="text-emerald-400 text-xs font-bold">Connected</span>
                                </div>
                            </div>
                            
                            <div class="flex items-center justify-between p-4 bg-white/5 backdrop-blur-md rounded-2xl border border-white/10">
                                <div class="flex items-center space-x-3">
                                    <i class="fas fa-code text-pink-400"></i>
                                    <span class="text-white text-sm font-bold">Laravel</span>
                                </div>
                                <span class="text-slate-300 text-xs font-bold">v12.0</span>
                            </div>
                            
                            <div class="flex items-center justify-between p-4 bg-white/5 backdrop-blur-md rounded-2xl border border-white/10">
                                <div class="flex items-center space-x-3">
                                    <i class="fas fa-palette text-purple-400"></i>
                                    <span class="text-white text-sm font-bold">UI Version</span>
                                </div>
                                <span class="text-slate-300 text-xs font-bold">2.0 Premium</span>
                            </div>
                            
                            <div class="flex items-center justify-between p-4 bg-white/5 backdrop-blur-md rounded-2xl border border-white/10">
                                <div class="flex items-center space-x-3">
                                    <i class="fas fa-shield-alt text-emerald-400"></i>
                                    <span class="text-white text-sm font-bold">Security</span>
                                </div>
                                <span class="text-emerald-400 text-xs font-bold">Protected</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>