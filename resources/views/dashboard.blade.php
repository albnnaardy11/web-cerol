<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-extrabold text-3xl text-slate-900 leading-tight tracking-tight">
                    User Dashboard
                </h2>
                <p class="text-slate-500 text-sm mt-1 font-medium">Welcome to your personal library space</p>
            </div>
            <div class="hidden md:flex items-center space-x-3">
                <div class="px-4 py-2 bg-gradient-to-r from-blue-500 to-indigo-500 text-white rounded-xl text-sm font-bold shadow-lg shadow-blue-200">
                    <i class="fas fa-user mr-2"></i>Member Access
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-slate-50 via-blue-50/30 to-indigo-50/30 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome Card -->
            <div class="mb-10 relative overflow-hidden">
                <div class="bg-gradient-to-r from-blue-600 to-indigo-600 rounded-[3rem] p-12 shadow-2xl shadow-blue-200/50 relative">
                    <!-- Decorative Elements -->
                    <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
                    <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/10 rounded-full blur-3xl"></div>
                    
                    <div class="relative z-10 flex flex-col md:flex-row items-center justify-between">
                        <div class="text-center md:text-left mb-8 md:mb-0">
                            <h3 class="text-white text-4xl font-extrabold mb-2">Hello, {{ Auth::user()->name }}! 👋</h3>
                            <p class="text-white/80 text-lg font-medium">Ready to dive back into your favorite books?</p>
                            
                            <div class="flex items-center justify-center md:justify-start space-x-6 mt-6">
                                <div class="flex items-center space-x-2 text-white/90">
                                    <i class="fas fa-calendar-alt"></i>
                                    <span class="font-bold text-sm">{{ now()->format('l, F j') }}</span>
                                </div>
                                <div class="flex items-center space-x-2 text-white/90">
                                    <i class="fas fa-clock"></i>
                                    <span class="font-bold text-sm">{{ now()->format('h:i A') }}</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex space-x-4">
                            <a href="{{ route('books') }}" class="px-8 py-4 bg-white text-blue-600 font-bold rounded-2xl shadow-xl hover:scale-105 transition-all">
                                <i class="fas fa-search mr-2"></i>Browse Collection
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats/Features Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
                <!-- Profile -->
                <div class="bg-white rounded-[2.5rem] p-8 shadow-lg shadow-slate-100 border border-slate-100 hover:shadow-2xl transition-all duration-500">
                    <div class="w-16 h-16 bg-blue-50 rounded-2xl flex items-center justify-center text-blue-500 text-2xl mb-6 shadow-sm">
                        <i class="fas fa-user-circle"></i>
                    </div>
                    <h4 class="text-xl font-extrabold text-slate-900 mb-2">My Profile</h4>
                    <p class="text-slate-500 text-sm font-medium mb-6">Manage your account settings and personal information.</p>
                    <a href="{{ route('profile.edit') }}" class="inline-flex items-center text-blue-600 font-bold hover:translate-x-1 transition-transform">
                        Go to Profile <i class="fas fa-arrow-right ml-2 text-xs"></i>
                    </a>
                </div>

                <!-- Books -->
                <div class="bg-white rounded-[2.5rem] p-8 shadow-lg shadow-slate-100 border border-slate-100 hover:shadow-2xl transition-all duration-500">
                    <div class="w-16 h-16 bg-pink-50 rounded-2xl flex items-center justify-center text-pink-500 text-2xl mb-6 shadow-sm">
                        <i class="fas fa-book"></i>
                    </div>
                    <h4 class="text-xl font-extrabold text-slate-900 mb-2">Books Library</h4>
                    <p class="text-slate-500 text-sm font-medium mb-6">Explore our extensive collection of digital and physical books.</p>
                    <a href="{{ route('books') }}" class="inline-flex items-center text-pink-500 font-bold hover:translate-x-1 transition-transform">
                        Start Reading <i class="fas fa-arrow-right ml-2 text-xs"></i>
                    </a>
                </div>

                <!-- Support -->
                <div class="bg-white rounded-[2.5rem] p-8 shadow-lg shadow-slate-100 border border-slate-100 hover:shadow-2xl transition-all duration-500">
                    <div class="w-16 h-16 bg-emerald-50 rounded-2xl flex items-center justify-center text-emerald-500 text-2xl mb-6 shadow-sm">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h4 class="text-xl font-extrabold text-slate-900 mb-2">Need Help?</h4>
                    <p class="text-slate-500 text-sm font-medium mb-6">Have questions or need assistance? Our team is here to help.</p>
                    <a href="{{ route('contact') }}" class="inline-flex items-center text-emerald-600 font-bold hover:translate-x-1 transition-transform">
                        Contact Support <i class="fas fa-arrow-right ml-2 text-xs"></i>
                    </a>
                </div>
            </div>

            <!-- Promotion Section -->
            <div class="bg-slate-900 rounded-[3rem] p-10 shadow-2xl relative overflow-hidden">
                <div class="absolute top-0 right-0 w-96 h-96 bg-blue-500/10 rounded-full blur-3xl"></div>
                <div class="relative z-10 flex flex-col md:flex-row items-center justify-between text-center md:text-left">
                    <div class="mb-6 md:mb-0">
                        <h3 class="text-2xl font-extrabold text-white mb-2">Elevate Your Reading Experience</h3>
                        <p class="text-slate-400 font-medium">Unlock exclusive features and digital access across all your devices.</p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="h-12 border-l border-white/10 hidden md:block mx-6"></div>
                        <span class="text-blue-400 font-black text-xs uppercase tracking-widest">Premium Version 2.0</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

