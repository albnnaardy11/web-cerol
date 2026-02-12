<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-extrabold text-3xl text-slate-900 leading-tight tracking-tight">
                    Books Management
                </h2>
                <p class="text-slate-500 text-sm mt-1 font-medium">Manage your library collection</p>
            </div>
            <a href="{{ route('admin.books.create') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-pink-500 to-rose-500 text-white font-bold rounded-2xl shadow-lg shadow-pink-200 hover:shadow-xl hover:scale-105 transition-all duration-300">
                <i class="fas fa-plus-circle mr-2"></i>
                Add New Book
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-slate-50 via-pink-50/30 to-blue-50/30 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Search Bar -->
            <div class="bg-white rounded-[2.5rem] p-8 shadow-lg shadow-slate-100 border border-slate-100 mb-8">
                <form action="{{ route('admin.books.index') }}" method="GET" class="flex items-center space-x-4">
                    <div class="flex-1 relative">
                        <i class="fas fa-search absolute left-6 top-1/2 -translate-y-1/2 text-slate-400"></i>
                        <input type="text" name="search" placeholder="Search by title or author..." value="{{ request('search') }}"
                            class="w-full bg-slate-50 border-none rounded-2xl py-4 pl-14 pr-6 focus:ring-2 focus:ring-pink-200 text-sm font-medium placeholder:text-slate-400">
                    </div>
                    <button type="submit" class="px-8 py-4 bg-gradient-to-r from-blue-500 to-indigo-500 text-white font-bold rounded-2xl shadow-lg shadow-blue-200 hover:shadow-xl hover:scale-105 transition-all">
                        <i class="fas fa-search mr-2"></i>Search
                    </button>
                    @if(request('search'))
                        <a href="{{ route('admin.books.index') }}" class="px-6 py-4 bg-slate-100 text-slate-600 font-bold rounded-2xl hover:bg-slate-200 transition-all">
                            <i class="fas fa-times mr-2"></i>Clear
                        </a>
                    @endif
                </form>
            </div>

            @if(session('success'))
                <div class="bg-gradient-to-r from-emerald-500 to-teal-500 text-white px-8 py-5 rounded-[2.5rem] mb-8 flex items-center shadow-lg shadow-emerald-200 animate-fade-in-down">
                    <i class="fas fa-check-circle text-2xl mr-4"></i>
                    <div>
                        <p class="font-bold text-lg">Success!</p>
                        <p class="text-sm text-white/90">{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            <!-- Books Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @foreach($books as $book)
                    <div class="group bg-white rounded-[2.5rem] p-6 shadow-lg shadow-slate-100 border border-slate-100 hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 flex flex-col">
                        <!-- Book Cover -->
                        <div class="relative h-64 rounded-[2rem] overflow-hidden mb-6 bg-slate-50">
                            @if($book->image)
                                <img src="{{ Str::startsWith($book->image, 'http') ? $book->image : asset('storage/' . $book->image) }}" 
                                    alt="{{ $book->title }}" 
                                    class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-slate-200 bg-slate-50">
                                    <i class="fas fa-book text-6xl opacity-30"></i>
                                </div>
                            @endif
                            
                            <!-- Stock Badge -->
                            <div class="absolute top-4 right-4">
                                <span class="px-3 py-1 bg-white/90 backdrop-blur-md rounded-full text-[10px] font-black uppercase tracking-widest {{ $book->stock > 0 ? 'text-emerald-600' : 'text-red-600' }} shadow-sm">
                                    {{ $book->stock > 0 ? 'Stock: ' . $book->stock : 'Out of Stock' }}
                                </span>
                            </div>
                        </div>
                        
                        <!-- Book Info -->
                        <div class="flex-1 mb-4">
                            <span class="inline-block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2">{{ $book->category->name }}</span>
                            <h3 class="font-extrabold text-lg text-slate-900 mb-2 line-clamp-2 group-hover:text-pink-500 transition-colors" title="{{ $book->title }}">
                                {{ $book->title }}
                            </h3>
                            <p class="text-slate-500 text-sm font-bold flex items-center mb-3">
                                <i class="fas fa-pen-nib mr-2 text-pink-300 text-xs"></i>{{ $book->author }}
                            </p>
                        </div>

                        <!-- Actions -->
                        <div class="flex items-center space-x-3 pt-4 border-t border-slate-100">
                            <a href="{{ route('admin.books.edit', $book) }}" class="flex-1 text-center px-4 py-3 bg-blue-50 text-blue-600 font-bold rounded-xl hover:bg-blue-500 hover:text-white transition-all">
                                <i class="fas fa-edit mr-1"></i>Edit
                            </a>
                            <form action="{{ route('admin.books.destroy', $book) }}" method="POST" class="flex-1" onsubmit="return confirm('Are you sure you want to delete this book?');">
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

            @if($books->isEmpty())
                <div class="bg-white rounded-[3rem] p-20 text-center shadow-lg shadow-slate-100 border border-slate-100">
                    <div class="w-32 h-32 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-8">
                        <i class="fas fa-book text-5xl text-slate-300"></i>
                    </div>
                    <h2 class="text-2xl font-extrabold text-slate-900 mb-3">No Books Found</h2>
                    <p class="text-slate-500 font-medium max-w-sm mx-auto mb-8">
                        @if(request('search'))
                            No books match your search criteria. Try different keywords.
                        @else
                            Start building your library by adding your first book!
                        @endif
                    </p>
                    <a href="{{ route('admin.books.create') }}" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-pink-500 to-rose-500 text-white font-bold rounded-2xl shadow-lg shadow-pink-200 hover:shadow-xl hover:scale-105 transition-all">
                        <i class="fas fa-plus-circle mr-2"></i>Add Your First Book
                    </a>
                </div>
            @endif

            <!-- Pagination -->
            @if($books->hasPages())
                <div class="mt-12">
                    {{ $books->links() }}
                </div>
            @endif
        </div>
    </div>
</x-app-layout>