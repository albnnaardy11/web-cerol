<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-extrabold text-3xl text-slate-900 leading-tight tracking-tight">
                    Users Management
                </h2>
                <p class="text-slate-500 text-sm mt-1 font-medium">Manage system users and permissions</p>
            </div>
            <a href="{{ route('admin.users.create') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-emerald-500 to-teal-500 text-white font-bold rounded-2xl shadow-lg shadow-emerald-200 hover:shadow-xl hover:scale-105 transition-all duration-300">
                <i class="fas fa-user-plus mr-2"></i>
                Add New User
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-slate-50 via-emerald-50/30 to-teal-50/30 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="bg-gradient-to-r from-emerald-500 to-teal-500 text-white px-8 py-5 rounded-[2.5rem] mb-8 flex items-center shadow-lg shadow-emerald-200 animate-fade-in-down">
                    <i class="fas fa-check-circle text-2xl mr-4"></i>
                    <div>
                        <p class="font-bold text-lg">Success!</p>
                        <p class="text-sm text-white/90">{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            <!-- Users Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($users as $user)
                    <div class="group bg-white rounded-[2.5rem] p-8 shadow-lg shadow-slate-100 border border-slate-100 hover:shadow-2xl hover:-translate-y-2 transition-all duration-500">
                        <!-- Avatar -->
                        <div class="flex items-center mb-6">
                            <div class="w-16 h-16 bg-gradient-to-br {{ $user->role === 'admin' ? 'from-pink-500 to-rose-500' : 'from-blue-500 to-indigo-500' }} rounded-2xl flex items-center justify-center text-white text-2xl font-extrabold shadow-lg {{ $user->role === 'admin' ? 'shadow-pink-200' : 'shadow-blue-200' }} mr-4">
                                {{ strtoupper(substr($user->name, 0, 2)) }}
                            </div>
                            <div class="flex-1">
                                <h3 class="font-extrabold text-lg text-slate-900 group-hover:text-emerald-500 transition-colors">
                                    {{ $user->name }}
                                </h3>
                                <div class="inline-flex items-center px-3 py-1 {{ $user->role === 'admin' ? 'bg-pink-50 text-pink-600' : 'bg-blue-50 text-blue-600' }} rounded-full text-xs font-black uppercase tracking-wider mt-1">
                                    <i class="fas {{ $user->role === 'admin' ? 'fa-crown' : 'fa-user' }} mr-1 text-[8px]"></i>
                                    {{ ucfirst($user->role) }}
                                </div>
                            </div>
                        </div>
                        
                        <!-- User Info -->
                        <div class="space-y-3 mb-6">
                            <div class="flex items-center text-sm">
                                <i class="fas fa-envelope text-slate-400 w-5"></i>
                                <span class="text-slate-600 font-medium truncate">{{ $user->email }}</span>
                            </div>
                            <div class="flex items-center text-sm">
                                <i class="fas fa-calendar text-slate-400 w-5"></i>
                                <span class="text-slate-600 font-medium">Joined {{ $user->created_at->diffForHumans() }}</span>
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="flex items-center space-x-3 pt-6 border-t border-slate-100">
                            <a href="{{ route('admin.users.edit', $user) }}" class="flex-1 text-center px-4 py-3 bg-emerald-50 text-emerald-600 font-bold rounded-xl hover:bg-emerald-500 hover:text-white transition-all">
                                <i class="fas fa-edit mr-1"></i>Edit
                            </a>
                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="flex-1" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full px-4 py-3 bg-red-50 text-red-600 font-bold rounded-xl hover:bg-red-500 hover:text-white transition-all">
                                    <i class="fas fa-trash mr-1"></i>Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

            @if($users->isEmpty())
                <div class="bg-white rounded-[3rem] p-20 text-center shadow-lg shadow-slate-100 border border-slate-100">
                    <div class="w-32 h-32 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-8">
                        <i class="fas fa-users text-5xl text-slate-300"></i>
                    </div>
                    <h2 class="text-2xl font-extrabold text-slate-900 mb-3">No Users Found</h2>
                    <p class="text-slate-500 font-medium max-w-sm mx-auto mb-8">
                        Start by creating your first user account!
                    </p>
                    <a href="{{ route('admin.users.create') }}" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-emerald-500 to-teal-500 text-white font-bold rounded-2xl shadow-lg shadow-emerald-200 hover:shadow-xl hover:scale-105 transition-all">
                        <i class="fas fa-user-plus mr-2"></i>Create First User
                    </a>
                </div>
            @endif

            <!-- Pagination -->
            @if($users->hasPages())
                <div class="mt-12">
                    {{ $users->links() }}
                </div>
            @endif
        </div>
    </div>
</x-app-layout>