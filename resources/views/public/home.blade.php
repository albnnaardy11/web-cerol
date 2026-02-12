<x-public-layout>
    <!-- Hero Section -->
    <div class="relative pt-16 pb-32 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:flex lg:items-center lg:space-x-12">
                <div class="lg:w-1/2 text-center lg:text-left">
                    <div class="inline-flex items-center px-4 py-2 rounded-full bg-pink-50 text-pink-600 text-sm font-bold mb-6 animate-bounce">
                        <i class="fas fa-star me-2"></i> Aplikasi Perpustakaan Digital Terbaik
                    </div>
                    <h1 class="text-5xl lg:text-7xl font-extrabold text-slate-900 leading-tight mb-8">
                        Jelajahi Dunia Lewat <span class="gradient-text">Cerita</span> 
                    </h1>
                    <p class="text-xl text-slate-500 mb-10 leading-relaxed font-medium">
                        Mengedukasi dunia anak dengan nyaman dan literasi santuy. Temukan ribuan buku menarik untuk menemani setiap langkah imajinasimu.
                    </p>
                    <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start space-y-4 sm:space-y-0 sm:space-x-6">
                        <a href="{{ route('books') }}" class="btn-premium w-full sm:w-auto px-10 py-4 rounded-2xl text-white font-bold text-lg flex items-center justify-center">
                            Mulai Membaca <i class="fas fa-arrow-right ms-3"></i>
                        </a>
                        <a href="{{ route('education') }}" class="w-full sm:w-auto px-10 py-4 rounded-2xl bg-white border-2 border-slate-100 text-slate-700 font-bold text-lg hover:bg-slate-50 transition-all flex items-center justify-center">
                            Lihat Edukasi
                        </a>
                    </div>
                    
                    <div class="mt-12 flex items-center justify-center lg:justify-start space-x-6 grayscale opacity-60">
                        <span class="text-sm font-bold text-slate-400 uppercase tracking-widest">Dipercaya oleh:</span>
                        <div class="flex space-x-4 text-2xl">
                            <i class="fab fa-apple"></i>
                            <i class="fab fa-google"></i>
                            <i class="fab fa-amazon"></i>
                        </div>
                    </div>
                </div>
                
                <div class="lg:w-1/2 mt-20 lg:mt-0 relative">
                    <div class="relative z-10 w-full rounded-3xl overflow-hidden shadow-2xl transform hover:scale-[1.02] transition-transform duration-500">
                        <img src="https://images.unsplash.com/photo-1512820790803-83ca734da794?auto=format&fit=crop&q=80&w=1000" alt="Reading Child" class="w-full h-[500px] object-cover" />
                        <div class="absolute inset-0 bg-gradient-to-t from-pink-900/40 to-transparent"></div>
                    </div>
                    <!-- Decorative Elements -->
                    <div class="absolute -top-10 -right-10 w-40 h-40 bg-pink-100 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-pulse"></div>
                    <div class="absolute -bottom-10 -left-10 w-40 h-40 bg-rose-100 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-pulse" style="animation-delay: 2s"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Section -->
    <div class="py-20 bg-white border-y border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="text-4xl font-extrabold text-slate-900 mb-2">12K+</div>
                    <div class="text-sm font-bold text-pink-500 uppercase tracking-widest">Koleksi Buku</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-extrabold text-slate-900 mb-2">5K+</div>
                    <div class="text-sm font-bold text-pink-500 uppercase tracking-widest">Siswa Aktif</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-extrabold text-slate-900 mb-2">98%</div>
                    <div class="text-sm font-bold text-pink-500 uppercase tracking-widest">Kepuasan</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-extrabold text-slate-900 mb-2">24/7</div>
                    <div class="text-sm font-bold text-pink-500 uppercase tracking-widest">Akses Digital</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Featured Books Section -->
    <div class="py-32 bg-[#FAFAFE]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-6">
                <div class="max-w-xl">
                    <h2 class="text-4xl font-extrabold text-slate-900 mb-4 ls-tight">Pilihan Editor <span class="gradient-text">Bulan Ini</span></h2>
                    <p class="text-lg text-slate-500 font-medium leading-relaxed">
                        Kurasi buku terbaik minggu ini yang sangat direkomendasikan untuk menunjang kreativitas dan imajinasi si kecil.
                    </p>
                </div>
                <a href="{{ route('books') }}" class="inline-flex items-center text-pink-500 font-bold hover:text-pink-600 transition group text-lg">
                    Lihat Koleksi Lengkap <i class="fas fa-chevron-right ms-2 group-hover:translate-x-1 transition-transform"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10">
                @foreach($featuredBooks as $book)
                    <div class="group bg-white rounded-[2.5rem] p-4 shadow-sm hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 border border-slate-50 relative overflow-hidden">
                        <div class="relative h-72 rounded-3xl overflow-hidden mb-6 bg-slate-100">
                            @if($book->image)
                                <img src="{{ Str::startsWith($book->image, 'http') ? $book->image : asset('storage/' . $book->image) }}" alt="{{ $book->title }}"
                                    class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-slate-300">
                                    <i class="fas fa-book text-6xl opacity-20"></i>
                                </div>
                            @endif
                            <div class="absolute top-4 right-4 bg-white/90 backdrop-blur px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-widest text-pink-500 shadow-sm">
                                New Arrival
                            </div>
                        </div>
                        <div class="px-2 pb-4">
                            <span class="inline-block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-3">{{ $book->category->name }}</span>
                            <h3 class="font-extrabold text-xl text-slate-900 mb-2 truncate group-hover:text-pink-500 transition-colors" title="{{ $book->title }}">{{ $book->title }}</h3>
                            <p class="text-slate-500 text-sm font-medium">{{ $book->author }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-32">
        <div class="relative rounded-[3.5rem] bg-slate-900 overflow-hidden py-24 px-8 md:px-16">
            <!-- Decorative Blobs -->
            <div class="absolute top-0 right-0 w-96 h-96 bg-pink-500/20 rounded-full blur-[100px]"></div>
            <div class="absolute bottom-0 left-0 w-96 h-96 bg-blue-500/20 rounded-full blur-[100px]"></div>
            
            <div class="relative z-10 lg:flex lg:items-center lg:justify-between space-y-12 lg:space-y-0">
                <div class="lg:max-w-2xl">
                    <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-6 leading-tight">
                        Siap Memulai Petualangan <span class="text-pink-400">Literasi</span>-mu?
                    </h2>
                    <p class="text-xl text-slate-300 font-medium opacity-80 leading-relaxed">
                        Daftar sekarang dan dapatkan akses tak terbatas ke koleksi premium kami. Gratis untuk semua anggota komunitas Deandles.
                    </p>
                </div>
                <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                    <a href="{{ route('register') }}" class="btn-premium px-12 py-5 rounded-2xl text-white font-bold text-lg text-center shadow-xl">
                        Daftar Gratis Sekarang
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-public-layout>