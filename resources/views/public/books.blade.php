<x-public-layout>
    <div class="py-20 bg-[#FAFAFE] min-h-screen relative overflow-hidden">
        <!-- Decoration -->
        <div class="blob top-0 left-0 opacity-20 transform -translate-x-1/2 -translate-y-1/2"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-20">
                <h1 class="text-5xl lg:text-6xl font-extrabold text-slate-900 mb-6 tracking-tight">
                    Perpustakaan <span class="gradient-text">Digital</span>
                </h1>
                <p class="text-xl text-slate-500 font-medium max-w-2xl mx-auto italic">
                    "Buku adalah jendela dunia, dan setiap halaman adalah petualangan baru."
                </p>
            </div>

            <div class="flex flex-col lg:flex-row gap-12">
                <!-- Sidebar Filters -->
                <div class="w-full lg:w-1/4">
                    <div class="sticky top-28 space-y-8">
                        <!-- Search Box -->
                        <div class="bg-white p-8 rounded-[2.5rem] shadow-sm border border-slate-100">
                            <h3 class="font-bold text-xl mb-6 text-slate-900 flex items-center">
                                <i class="fas fa-search me-3 text-pink-400"></i>Cari Buku
                            </h3>
                            <form action="{{ route('books') }}" method="GET">
                                <input type="hidden" name="category" value="{{ request('category') }}">
                                <div class="relative">
                                    <input type="text" name="search" value="{{ request('search') }}" 
                                        placeholder="Judul, penulis..." 
                                        class="w-full bg-slate-50 border-none rounded-2xl py-4 pl-6 pr-12 focus:ring-2 focus:ring-pink-200 text-sm font-medium">
                                    <button type="submit" class="absolute right-3 top-1/2 -translate-y-1/2 w-10 h-10 bg-pink-500 text-white rounded-xl hover:bg-pink-600 transition-colors flex items-center justify-center shadow-lg shadow-pink-200">
                                        <i class="fas fa-search text-xs"></i>
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Categories -->
                        <div class="bg-white p-8 rounded-[2.5rem] shadow-sm border border-slate-100">
                            <h3 class="font-bold text-xl mb-6 text-slate-900 flex items-center">
                                <i class="fas fa-th-large me-3 text-pink-400"></i>Kategori
                            </h3>
                            <div class="space-y-2">
                                <a href="{{ route('books', ['search' => request('search')]) }}" 
                                    class="flex items-center justify-between px-5 py-4 rounded-2xl text-sm font-bold transition-all {{ !request('category') ? 'bg-pink-500 text-white shadow-lg shadow-pink-100' : 'text-slate-500 hover:bg-slate-50' }}">
                                    <span>Semua Koleksi</span>
                                    <i class="fas fa-chevron-right text-[10px] opacity-50"></i>
                                </a>
                                @foreach($categories as $category)
                                    <a href="{{ route('books', ['category' => $category->slug, 'search' => request('search')]) }}" 
                                        class="flex items-center justify-between px-5 py-4 rounded-2xl text-sm font-bold transition-all {{ request('category') == $category->slug ? 'bg-pink-500 text-white shadow-lg shadow-pink-100' : 'text-slate-500 hover:bg-slate-50' }}">
                                        <span>{{ $category->name }}</span>
                                        <i class="fas fa-chevron-right text-[10px] opacity-50"></i>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Books Grid -->
                <div class="w-full lg:w-3/4">
                    @if($books->count() > 0)
                        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-8">
                            @foreach($books as $book)
                                <div class="group bg-white rounded-[2.5rem] p-4 shadow-sm hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 border border-slate-50 flex flex-col">
                                    <div class="relative h-80 rounded-[2rem] overflow-hidden mb-6 bg-slate-50">
                                        @if($book->image)
                                            <img src="{{ Str::startsWith($book->image, 'http') ? $book->image : asset('storage/' . $book->image) }}" 
                                                alt="{{ $book->title }}" 
                                                class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center text-slate-200 bg-slate-50">
                                                <i class="fas fa-book text-7xl opacity-30"></i>
                                            </div>
                                        @endif
                                        
                                        <!-- Availability Overlay -->
                                        <div class="absolute inset-0 bg-slate-900/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center p-6">
                                            <div class="text-center transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                                                @if($book->stock > 0 && $book->file_path)
                                                    <a href="{{ asset('storage/' . $book->file_path) }}" target="_blank" class="px-6 py-3 bg-white text-slate-900 rounded-xl font-bold text-sm hover:bg-pink-500 hover:text-white transition-all shadow-xl">
                                                        Baca E-Book
                                                    </a>
                                                @else
                                                    <span class="px-6 py-3 bg-white/20 backdrop-blur-md text-white border border-white/30 rounded-xl font-bold text-sm">
                                                        {{ $book->stock > 0 ? 'Tersedia di Rak' : 'Stok Habis' }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="absolute top-4 left-4">
                                            <span class="bg-white/90 backdrop-blur px-3 py-1 rounded-full text-[9px] font-black uppercase tracking-widest text-slate-900 shadow-sm">
                                                {{ $book->category->name }}
                                            </span>
                                        </div>
                                    </div>
                                    
                                    <div class="px-2 pb-4 flex-grow">
                                        <h3 class="font-extrabold text-xl text-slate-900 mb-2 truncate group-hover:text-pink-500 transition-colors" title="{{ $book->title }}">
                                            {{ $book->title }}
                                        </h3>
                                        <p class="text-slate-400 text-sm font-bold flex items-center">
                                            <i class="fas fa-pen-nib me-2 text-pink-300"></i>{{ $book->author }}
                                        </p>
                                    </div>

                                    @if($book->stock > 0)
                                        <div class="mt-4 pt-4 border-t border-slate-50 flex items-center justify-between">
                                            <div class="flex items-center space-x-1">
                                                @for($i = 0; $i < 5; $i++)
                                                    <i class="fas fa-star text-[10px] text-amber-400"></i>
                                                @endfor
                                            </div>
                                            <span class="text-[10px] font-black text-slate-300 uppercase tracking-tighter">
                                                Stock: {{ $book->stock }}
                                            </span>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                        
                        <div class="mt-16">
                            {{ $books->withQueryString()->links() }}
                        </div>
                    @else
                        <div class="bg-white rounded-[3rem] p-20 text-center shadow-sm border border-slate-100 mt-10">
                            <div class="w-32 h-32 bg-pink-50 rounded-full flex items-center justify-center mx-auto mb-8">
                                <i class="fas fa-search text-4xl text-pink-300"></i>
                            </div>
                            <h2 class="text-2xl font-extrabold text-slate-900 mb-3">Oops! Buku Tidak Ditemukan</h2>
                            <p class="text-slate-500 font-medium max-w-sm mx-auto">Kami tidak dapat menemukan buku yang kamu cari. Coba gunakan kata kunci lain!</p>
                            <a href="{{ route('books') }}" class="inline-block mt-8 text-pink-500 font-bold hover:underline">Lihat Semua Koleksi</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-public-layout>
