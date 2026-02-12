<x-app-layout>
    <x-slot name="header">
        <x-page-header 
            title="Categories Management" 
            subtitle="Organize your books by categories"
        >
            <x-slot name="actions">
                <a href="{{ route('admin.categories.create') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-500 to-indigo-500 text-white font-bold rounded-2xl shadow-lg shadow-blue-200 hover:shadow-xl hover:scale-105 transition-all duration-300">
                    <i class="fas fa-plus-circle mr-2"></i>
                    Add New Category
                </a>
            </x-slot>
        </x-page-header>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-slate-50 via-blue-50/30 to-indigo-50/30 min-h-screen">
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

            <!-- Categories Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @foreach($categories as $category)
                    <x-premium-card padding="p-8" class="group">
                        <!-- Icon -->
                        <x-gradient-icon 
                            icon="fas fa-folder-open" 
                            gradient="from-blue-500 to-indigo-500" 
                            shadow="shadow-blue-200" 
                            size="w-16 h-16" 
                            class="mb-6 transform group-hover:scale-110 group-hover:rotate-6 transition-transform duration-500"
                        />
                        
                        <!-- Category Info -->
                        <div class="mb-6">
                            <h3 class="font-extrabold text-2xl text-slate-900 mb-2 group-hover:text-blue-500 transition-colors">
                                {{ $category->name }}
                            </h3>
                            <p class="text-slate-400 text-sm font-bold flex items-center">
                                <i class="fas fa-link mr-2 text-xs"></i>
                                {{ $category->slug }}
                            </p>
                            <div class="mt-4 inline-flex items-center px-3 py-1 bg-blue-50 text-blue-600 rounded-full text-xs font-black uppercase tracking-wider">
                                <i class="fas fa-hashtag mr-1 text-[8px]"></i>
                                ID: {{ $category->id }}
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="flex items-center space-x-3 pt-6 border-t border-slate-100">
                            <a href="{{ route('admin.categories.edit', $category) }}" class="flex-1 text-center px-4 py-3 bg-blue-50 text-blue-600 font-bold rounded-xl hover:bg-blue-500 hover:text-white transition-all text-xs">
                                <i class="fas fa-edit mr-1"></i>Edit
                            </a>
                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="flex-1" onsubmit="return confirm('Are you sure you want to delete this category?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full px-4 py-3 bg-red-50 text-red-600 font-bold rounded-xl hover:bg-red-500 hover:text-white transition-all text-xs">
                                    <i class="fas fa-trash mr-1"></i>Delete
                                </button>
                            </form>
                        </div>
                    </x-premium-card>
                @endforeach
            </div>

            @if($categories->isEmpty())
                <x-premium-card padding="p-20" class="text-center">
                    <div class="w-32 h-32 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-8">
                        <i class="fas fa-th-large text-5xl text-slate-300"></i>
                    </div>
                    <h2 class="text-2xl font-extrabold text-slate-900 mb-3">No Categories Found</h2>
                    <p class="text-slate-500 font-medium max-w-sm mx-auto mb-8">
                        Start organizing your library by creating your first category!
                    </p>
                    <a href="{{ route('admin.categories.create') }}" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-blue-500 to-indigo-500 text-white font-bold rounded-2xl shadow-lg shadow-blue-200 hover:shadow-xl hover:scale-105 transition-all">
                        <i class="fas fa-plus-circle mr-2"></i>Create First Category
                    </a>
                </x-premium-card>
            @endif

            <!-- Pagination -->
            @if($categories->hasPages())
                <div class="mt-12">
                    {{ $categories->links() }}
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
