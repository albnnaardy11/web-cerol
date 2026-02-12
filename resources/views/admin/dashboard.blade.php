<x-app-layout>
    <x-slot name="header">
        <x-page-header 
            title="Dashboard Analytics" 
            subtitle="Monitor your library performance in real-time"
        >
            <x-slot name="actions">
                <div class="px-4 py-2 bg-gradient-to-r from-pink-500 to-rose-500 text-white rounded-xl text-sm font-bold shadow-lg shadow-pink-200">
                    <i class="fas fa-crown mr-2"></i>{{ Auth::user()->role === 'admin' ? 'Admin' : 'User' }}
                </div>
            </x-slot>
        </x-page-header>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-slate-50 via-pink-50/30 to-blue-50/30 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Welcome Card -->
            <x-premium-card variant="white" padding="p-12" class="mb-10 bg-gradient-to-r from-pink-500 via-rose-500 to-orange-500 !border-none relative overflow-hidden shadow-pink-200/50">
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
            </x-premium-card>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
                <x-stat-card 
                    title="Books Collection" 
                    value="{{ $stats['books'] }}" 
                    icon="fas fa-book-open" 
                    trend="12% from last month"
                    gradient="from-pink-500 to-rose-500"
                />

                <x-stat-card 
                    title="Categories" 
                    value="{{ $stats['categories'] }}" 
                    icon="fas fa-layer-group" 
                    trend="All active"
                    trendType="up"
                    gradient="from-blue-500 to-indigo-500"
                />

                <x-stat-card 
                    title="Active Users" 
                    value="{{ $stats['users'] }}" 
                    icon="fas fa-users" 
                    trend="8% from last week"
                    gradient="from-emerald-500 to-teal-500"
                />

                <x-stat-card 
                    title="Messages" 
                    value="{{ $stats['messages'] }}" 
                    icon="fas fa-envelope-open-text" 
                    trend="Inbox"
                    trendType="up"
                    gradient="from-amber-500 to-orange-500"
                />
            </div>

            <!-- Quick Actions -->
            <x-premium-card padding="p-10" class="mb-12">
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
                    <x-action-link 
                        href="{{ route('admin.books.create') }}" 
                        label="Add New Book" 
                        desc="Expand collection" 
                        icon="fas fa-plus-circle" 
                        color="pink"
                    />

                    <x-action-link 
                        href="{{ route('admin.users.index') }}" 
                        label="Manage Users" 
                        desc="User administration" 
                        icon="fas fa-user-cog" 
                        color="blue"
                    />

                    <x-action-link 
                        href="{{ route('admin.messages.index') }}" 
                        label="View Messages" 
                        desc="Check inbox" 
                        icon="fas fa-comments" 
                        color="emerald"
                    />
                </div>
            </x-premium-card>

            <!-- Recent Activity & System Info -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Recent Activity -->
                <x-premium-card padding="p-10">
                    <div class="flex items-center justify-between mb-8">
                        <div>
                            <h3 class="text-xl font-extrabold text-slate-900 mb-1">Recent Activity</h3>
                            <p class="text-slate-500 text-xs font-medium">Latest system updates</p>
                        </div>
                        <x-gradient-icon icon="fas fa-history" gradient="from-purple-500 to-pink-500" shadow="shadow-purple-200" size="w-10 h-10" />
                    </div>
                    <div class="space-y-4">
                        <x-activity-item 
                            title="Database seeded successfully" 
                            desc="{{ $stats['books'] }} books imported" 
                            time="Just now" 
                            icon="fas fa-book" 
                            color="pink" 
                        />
                        <x-activity-item 
                            title="New user registered" 
                            desc="{{ Auth::user()->name }} joined" 
                            time="Today" 
                            icon="fas fa-user-plus" 
                            color="blue" 
                        />
                        <x-activity-item 
                            title="System update completed" 
                            desc="UI/UX redesign deployed" 
                            time="Today" 
                            icon="fas fa-check-circle" 
                            color="emerald" 
                        />
                    </div>
                </x-premium-card>

                <!-- System Info -->
                <x-premium-card variant="dark" padding="p-10" class="relative overflow-hidden">
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
                            <x-system-info-row label="Database" value="Connected" icon="fas fa-database" color="blue" status="Connected" />
                            <x-system-info-row label="Laravel" value="v12.0" icon="fas fa-code" color="pink" />
                            <x-system-info-row label="UI Version" value="2.0 Premium" icon="fas fa-palette" color="purple" />
                            <x-system-info-row label="Security" value="Protected" icon="fas fa-shield-alt" color="emerald" status="Protected" />
                        </div>
                    </div>
                </x-premium-card>
            </div>
        </div>
    </div>
</x-app-layout>
