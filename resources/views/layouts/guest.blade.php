<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body {
                font-family: 'Outfit', sans-serif;
            }
            .gradient-bg {
                background: linear-gradient(135deg, #f8fafc 0%, #eff6ff 50%, #f5f3ff 100%);
            }
            .glass-card {
                background: rgba(255, 255, 255, 0.8);
                backdrop-filter: blur(12px);
                border: 1px solid rgba(255, 255, 255, 0.5);
            }
        </style>
    </head>
    <body class="antialiased text-slate-900">
        <div class="min-h-screen flex flex-col items-center justify-center p-6 gradient-bg relative overflow-hidden">
            <!-- Decorative Elements -->
            <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-blue-100/50 rounded-full blur-[100px] -translate-y-1/2 translate-x-1/2"></div>
            <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-pink-100/50 rounded-full blur-[100px] translate-y-1/2 -translate-x-1/2"></div>

            <div class="relative z-10 w-full max-w-md">
                <div class="text-center mb-10">
                    <a href="/" class="inline-flex flex-col items-center group">
                        <div class="w-16 h-16 bg-gradient-to-tr from-pink-500 to-rose-500 rounded-[1.5rem] flex items-center justify-center text-white text-2xl shadow-xl shadow-pink-200 group-hover:scale-110 transition-transform duration-500">
                            <i class="fas fa-book-open"></i>
                        </div>
                        <h1 class="mt-4 text-3xl font-black text-slate-900 tracking-tight">Deandles<span class="text-pink-500">Cerol</span></h1>
                        <p class="text-slate-500 text-sm font-medium">Literacy with Love</p>
                    </a>
                </div>

                <div class="glass-card w-full p-10 rounded-[3rem] shadow-2xl shadow-blue-100/50">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html>

