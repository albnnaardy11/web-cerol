<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-extrabold text-3xl text-slate-900 leading-tight tracking-tight">
                    Create User
                </h2>
                <p class="text-slate-500 text-sm mt-1 font-medium">Add a new user to the system</p>
            </div>
            <a href="{{ route('admin.users.index') }}" class="inline-flex items-center px-6 py-3 bg-slate-100 text-slate-700 font-bold rounded-2xl hover:bg-slate-200 transition-all">
                <i class="fas fa-arrow-left mr-2"></i>
                Back to List
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-slate-50 via-emerald-50/30 to-teal-50/30 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-[3rem] p-12 shadow-lg shadow-slate-100 border border-slate-100">
                <form action="{{ route('admin.users.store') }}" method="POST">
                    @csrf
                    
                    <!-- Icon Header -->
                    <div class="flex items-center justify-center mb-10">
                        <div class="w-20 h-20 bg-gradient-to-br from-emerald-500 to-teal-500 rounded-3xl flex items-center justify-center text-white text-3xl shadow-lg shadow-emerald-200">
                            <i class="fas fa-user-plus"></i>
                        </div>
                    </div>

                    <!-- Form Fields -->
                    <div class="space-y-8 mb-12">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div>
                                <label for="name" class="block text-slate-400 text-[10px] font-black uppercase tracking-widest mb-2 ml-4">Full Name *</label>
                                <input type="text" name="name" id="name" required
                                    class="w-full bg-slate-50 border-none rounded-2xl py-4 px-6 focus:ring-2 focus:ring-emerald-200 text-sm font-bold placeholder:text-slate-300"
                                    placeholder="Enter full name">
                            </div>
                            
                            <div>
                                <label for="username" class="block text-slate-400 text-[10px] font-black uppercase tracking-widest mb-2 ml-4">Username (Optional)</label>
                                <input type="text" name="username" id="username"
                                    class="w-full bg-slate-50 border-none rounded-2xl py-4 px-6 focus:ring-2 focus:ring-emerald-200 text-sm font-bold placeholder:text-slate-300"
                                    placeholder="Enter username">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div>
                                <label for="email" class="block text-slate-400 text-[10px] font-black uppercase tracking-widest mb-2 ml-4">Email Address *</label>
                                <input type="email" name="email" id="email" required
                                    class="w-full bg-slate-50 border-none rounded-2xl py-4 px-6 focus:ring-2 focus:ring-emerald-200 text-sm font-bold placeholder:text-slate-300"
                                    placeholder="name@example.com">
                            </div>
                            
                            <div>
                                <label for="role" class="block text-slate-400 text-[10px] font-black uppercase tracking-widest mb-2 ml-4">User Role *</label>
                                <select name="role" id="role" required
                                    class="w-full bg-slate-50 border-none rounded-2xl py-4 px-6 focus:ring-2 focus:ring-emerald-200 text-sm font-bold">
                                    <option value="user">User / Staff</option>
                                    <option value="admin">Administrator</option>
                                </select>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 pt-6 border-t border-slate-50">
                            <div>
                                <label for="password" class="block text-slate-400 text-[10px] font-black uppercase tracking-widest mb-2 ml-4">Password *</label>
                                <input type="password" name="password" id="password" required
                                    class="w-full bg-slate-50 border-none rounded-2xl py-4 px-6 focus:ring-2 focus:ring-emerald-200 text-sm font-bold placeholder:text-slate-300"
                                    placeholder="••••••••">
                            </div>
                            
                            <div>
                                <label for="password_confirmation" class="block text-slate-400 text-[10px] font-black uppercase tracking-widest mb-2 ml-4">Confirm Password *</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" required
                                    class="w-full bg-slate-50 border-none rounded-2xl py-4 px-6 focus:ring-2 focus:ring-emerald-200 text-sm font-bold placeholder:text-slate-300"
                                    placeholder="••••••••">
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex items-center justify-between pt-8 border-t border-slate-100">
                        <a href="{{ route('admin.users.index') }}" class="inline-flex items-center px-8 py-4 bg-slate-100 text-slate-600 font-bold rounded-2xl hover:bg-slate-200 transition-all">
                            <i class="fas fa-times mr-2"></i>
                            Cancel
                        </a>
                        <button type="submit" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-emerald-500 to-teal-500 text-white font-bold rounded-2xl shadow-lg shadow-emerald-200 hover:shadow-xl hover:scale-105 transition-all">
                            <i class="fas fa-save mr-2"></i>
                            Create User
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
