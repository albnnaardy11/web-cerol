<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-extrabold text-3xl text-slate-900 leading-tight tracking-tight">
                    Account Profile
                </h2>
                <p class="text-slate-500 text-sm mt-1 font-medium">Manage your personal information and security</p>
            </div>
            <div class="flex items-center space-x-3">
                <span class="px-4 py-2 bg-indigo-50 text-indigo-600 rounded-2xl text-xs font-black uppercase tracking-wider">
                    <i class="fas fa-id-card mr-1"></i>
                    Settings
                </span>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-slate-50 via-indigo-50/30 to-purple-50/30 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-10">
            
            <!-- Profile Info Section -->
            <div class="bg-white rounded-[3rem] p-10 shadow-xl shadow-slate-100 border border-slate-100 overflow-hidden relative">
                <div class="absolute -right-20 -top-20 w-64 h-64 bg-indigo-500/5 rounded-full blur-3xl"></div>
                <div class="relative z-10">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Password Section -->
            <div class="bg-white rounded-[3rem] p-10 shadow-xl shadow-slate-100 border border-slate-100 overflow-hidden relative">
                <div class="absolute -left-20 -bottom-20 w-64 h-64 bg-purple-500/5 rounded-full blur-3xl"></div>
                <div class="relative z-10">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Danger Zone -->
            <div class="bg-white rounded-[3rem] p-10 shadow-xl shadow-red-50 border border-red-50 overflow-hidden relative group">
                <div class="absolute inset-0 bg-red-500/[0.02] group-hover:bg-red-500/[0.04] transition-colors"></div>
                <div class="relative z-10">
                    <div class="flex items-center space-x-3 mb-8">
                        <div class="w-10 h-10 bg-red-100 rounded-xl flex items-center justify-center text-red-600">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <h3 class="text-xl font-extrabold text-slate-900">Danger Zone</h3>
                    </div>
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

