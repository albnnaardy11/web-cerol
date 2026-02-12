<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Deandles') }} - Literacy with Love</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Outfit', sans-serif;
        }
        
        .font-brand {
            font-family: 'Quicksand', sans-serif;
        }

        .glass {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
        }

        .premium-shadow {
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.05), 0 10px 10px -5px rgba(0, 0, 0, 0.02);
        }

        .gradient-text {
            background: linear-gradient(135deg, #FF69B4 0%, #FF1493 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .btn-premium {
            background: linear-gradient(135deg, #FF69B4 0%, #FF1493 100%);
            box-shadow: 0 10px 15px -3px rgba(255, 105, 180, 0.3);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .btn-premium:hover {
            transform: translateY(-2px);
            box-shadow: 0 20px 25px -5px rgba(255, 105, 180, 0.4);
        }

        .blob {
            position: absolute;
            width: 500px;
            height: 500px;
            background: linear-gradient(135deg, rgba(255, 105, 180, 0.2) 0%, rgba(255, 182, 193, 0.2) 100%);
            filter: blur(80px);
            border-radius: 40% 60% 70% 30% / 40% 50% 60% 50%;
            z-index: -1;
            animation: move 25s infinite alternate;
        }

        @keyframes move {
            from { transform: translate(0, 0) rotate(0deg); }
            to { transform: translate(100px, 100px) rotate(360deg); }
        }
    </style>
</head>

<body class="antialiased text-slate-800 bg-[#FAFAFE] selection:bg-pink-100 selection:text-pink-600">
    <div class="min-h-screen flex flex-col relative overflow-hidden">
        <!-- Decoration Blobs -->
        <div class="blob top-[-10%] right-[-10%] opacity-50"></div>
        <div class="blob bottom-[-10%] left-[-10%] opacity-30" style="animation-delay: -5s; background: linear-gradient(135deg, rgba(74, 144, 226, 0.1) 0%, rgba(144, 202, 249, 0.1) 100%);"></div>

        <!-- Navigation -->
        <nav class="glass sticky top-0 z-50 transition-all duration-300">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-20">
                    <div class="flex items-center">
                        <!-- Logo -->
                        <div class="shrink-0 flex items-center">
                            <a href="{{ route('home') }}" class="flex items-center space-x-2 group">
                                <div class="w-10 h-10 bg-gradient-to-tr from-pink-400 to-rose-500 rounded-xl flex items-center justify-center text-white shadow-lg group-hover:rotate-12 transition-transform">
                                    <i class="fas fa-book-open"></i>
                                </div>
                                <span class="text-2xl font-extrabold font-brand tracking-tight text-slate-900">
                                    Deandles<span class="gradient-text">Cerol</span>
                                </span>
                            </a>
                        </div>

                        <!-- Navigation Links -->
                        <div class="hidden space-x-1 sm:ms-12 sm:flex">
                            <a href="{{ route('home') }}" 
                                class="px-5 py-2 rounded-full text-sm font-semibold transition-all duration-200 {{ request()->routeIs('home') ? 'bg-pink-50 text-pink-600' : 'text-slate-600 hover:text-pink-500' }}">
                                <i class="fas fa-home me-2 opacity-70"></i>Beranda
                            </a>
                            <a href="{{ route('books') }}" 
                                class="px-5 py-2 rounded-full text-sm font-semibold transition-all duration-200 {{ request()->routeIs('books') ? 'bg-pink-50 text-pink-600' : 'text-slate-600 hover:text-pink-500' }}">
                                <i class="fas fa-book me-2 opacity-70"></i>Daftar Buku
                            </a>
                            <a href="{{ route('education') }}" 
                                class="px-5 py-2 rounded-full text-sm font-semibold transition-all duration-200 {{ request()->routeIs('education') ? 'bg-pink-50 text-pink-600' : 'text-slate-600 hover:text-pink-500' }}">
                                <i class="fas fa-graduation-cap me-2 opacity-70"></i>Edukasi
                            </a>
                            <a href="{{ route('contact') }}" 
                                class="px-5 py-2 rounded-full text-sm font-semibold transition-all duration-200 {{ request()->routeIs('contact') ? 'bg-pink-50 text-pink-600' : 'text-slate-600 hover:text-pink-500' }}">
                                <i class="fas fa-headset me-2 opacity-70"></i>Kontak
                            </a>
                        </div>
                    </div>

                    <div class="hidden sm:flex sm:items-center sm:ms-6 space-x-4">
                        @auth
                            <a href="{{ route('dashboard') }}"
                                class="text-sm font-bold text-slate-700 hover:text-pink-600 transition flex items-center">
                                <i class="fas fa-user-circle me-2 text-xl opacity-70"></i>Account
                            </a>
                        @else
                            <a href="{{ route('login') }}"
                                class="text-sm font-bold text-slate-700 hover:text-pink-600 transition">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="btn-premium text-white py-2.5 px-6 rounded-full text-sm font-bold tracking-wide">
                                    Join Now
                                </a>
                            @endif
                        @endauth
                    </div>

                    <!-- Mobile Hamburger -->
                    <div class="-me-2 flex items-center sm:hidden">
                        <button id="mobile-menu-button"
                            class="inline-flex items-center justify-center p-2 rounded-xl text-slate-500 hover:text-pink-600 hover:bg-pink-50 transition-all">
                            <i class="fas fa-bars text-xl"></i>
                        </button>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main class="flex-grow z-10">
            {{ $slot }}
        </main>

        <!-- Footer -->
        <footer class="bg-white/80 backdrop-blur-md border-t border-slate-100 pt-16 pb-8 z-10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-16">
                    <div class="md:col-span-1">
                        <a href="{{ route('home') }}" class="flex items-center space-x-2 mb-6">
                            <div class="w-8 h-8 bg-gradient-to-tr from-pink-400 to-rose-500 rounded-lg flex items-center justify-center text-white shadow-md">
                                <i class="fas fa-book-open text-xs"></i>
                            </div>
                            <span class="text-xl font-extrabold font-brand tracking-tight text-slate-900">
                                Deandles<span class="gradient-text">Cerol</span>
                            </span>
                        </a>
                        <p class="text-slate-500 leading-relaxed max-w-xs text-sm">
                            Mengedukasi dunia anak dengan nyaman dan literasi santuy. 
                            Partner terbaik untuk tumbuh kembang anak melalui jendela buku.
                        </p>
                        <div class="flex space-x-4 mt-8">
                            <a href="#" class="w-9 h-9 flex items-center justify-center rounded-lg bg-pink-50 text-pink-500 hover:bg-pink-500 hover:text-white transition-all transform hover:-translate-y-1">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="w-9 h-9 flex items-center justify-center rounded-lg bg-pink-50 text-pink-500 hover:bg-pink-500 hover:text-white transition-all transform hover:-translate-y-1">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#" class="w-9 h-9 flex items-center justify-center rounded-lg bg-pink-50 text-pink-500 hover:bg-pink-500 hover:text-white transition-all transform hover:-translate-y-1">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </div>
                    </div>
                    
                    <div>
                        <h3 class="text-sm font-bold text-slate-900 uppercase tracking-widest mb-6">Menu Utama</h3>
                        <ul class="space-y-4">
                            <li><a href="{{ route('home') }}" class="text-slate-500 hover:text-pink-600 text-sm transition-colors">Beranda</a></li>
                            <li><a href="{{ route('books') }}" class="text-slate-500 hover:text-pink-600 text-sm transition-colors">Perpustakaan Digital</a></li>
                            <li><a href="{{ route('education') }}" class="text-slate-500 hover:text-pink-600 text-sm transition-colors">Materi Edukasi</a></li>
                            <li><a href="{{ route('contact') }}" class="text-slate-500 hover:text-pink-600 text-sm transition-colors">Layanan Bantuan</a></li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="text-sm font-bold text-slate-900 uppercase tracking-widest mb-6">Legalitas</h3>
                        <ul class="space-y-4">
                            <li><a href="#" class="text-slate-500 hover:text-pink-600 text-sm transition-colors">Syarat & Ketentuan</a></li>
                            <li><a href="#" class="text-slate-500 hover:text-pink-600 text-sm transition-colors">Kebijakan Privasi</a></li>
                            <li><a href="#" class="text-slate-500 hover:text-pink-600 text-sm transition-colors">Cookies Policy</a></li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="text-sm font-bold text-slate-900 uppercase tracking-widest mb-6">Hubungi Kami</h3>
                        <div class="space-y-4">
                            <div class="flex items-start space-x-3">
                                <div class="w-8 h-8 rounded-full bg-pink-50 flex items-center justify-center shrink-0">
                                    <i class="fas fa-map-marker-alt text-pink-500 text-xs"></i>
                                </div>
                                <p class="text-slate-500 text-sm">Jl. Literasi No. 123, Taman Baca, Indonesia</p>
                            </div>
                            <div class="flex items-start space-x-3">
                                <div class="w-8 h-8 rounded-full bg-pink-50 flex items-center justify-center shrink-0">
                                    <i class="fas fa-envelope text-pink-500 text-xs"></i>
                                </div>
                                <p class="text-slate-500 text-sm">hallo@deandles.com</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="pt-8 border-t border-slate-100 flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0 text-sm text-slate-400">
                    <p>&copy; {{ date('Y') }} Deandles Cerol. Dibuat dengan <i class="fas fa-heart text-pink-400"></i> untuk Literasi Anak.</p>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>
