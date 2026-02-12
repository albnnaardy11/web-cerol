<x-guest-layout>
    <div class="mb-8">
        <h2 class="text-2xl font-extrabold text-slate-900 mb-2">Welcome Back!</h2>
        <p class="text-slate-500 text-sm font-medium">Please enter your credentials to access your account.</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-slate-400 text-[10px] font-black uppercase tracking-widest mb-2 ml-4">Email Address</label>
            <div class="relative">
                <i class="fas fa-envelope absolute left-6 top-1/2 -translate-y-1/2 text-slate-300 text-xs"></i>
                <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username"
                    class="w-full bg-slate-50 border-none rounded-2xl py-4 pl-12 pr-6 focus:ring-2 focus:ring-pink-200 text-sm font-bold placeholder:text-slate-300 transition-all"
                    placeholder="name@example.com">
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2 ml-4" />
        </div>

        <!-- Password -->
        <div>
            <div class="flex items-center justify-between mb-2 ml-4">
                <label for="password" class="block text-slate-400 text-[10px] font-black uppercase tracking-widest">Password</label>
                @if (Route::has('password.request'))
                    <a class="text-[10px] font-black uppercase tracking-widest text-pink-500 hover:text-pink-600 transition-colors" href="{{ route('password.request') }}">
                        Forgot?
                    </a>
                @endif
            </div>
            <div class="relative">
                <i class="fas fa-lock absolute left-6 top-1/2 -translate-y-1/2 text-slate-300 text-xs"></i>
                <input id="password" type="password" name="password" required autocomplete="current-password"
                    class="w-full bg-slate-50 border-none rounded-2xl py-4 pl-12 pr-6 focus:ring-2 focus:ring-pink-200 text-sm font-bold placeholder:text-slate-300 transition-all"
                    placeholder="••••••••">
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2 ml-4" />
        </div>

        <!-- Remember Me -->
        <div class="block ml-4">
            <label for="remember_me" class="inline-flex items-center cursor-pointer group">
                <input id="remember_me" type="checkbox" class="rounded-lg border-slate-200 text-pink-500 shadow-sm focus:ring-pink-500 focus:ring-offset-0 w-5 h-5 transition-all cursor-pointer" name="remember">
                <span class="ms-3 text-sm font-bold text-slate-500 group-hover:text-slate-700 transition-colors">Keep me logged in</span>
            </label>
        </div>

        <div class="pt-4">
            <button type="submit" class="w-full py-4 bg-gradient-to-r from-pink-500 to-rose-500 text-white font-bold rounded-2xl shadow-lg shadow-pink-200 hover:shadow-xl hover:scale-[1.02] transition-all transform active:scale-95">
                Sign In
            </button>
        </div>

        @if (Route::has('register'))
            <div class="text-center pt-4">
                <p class="text-sm font-medium text-slate-500">
                    Don't have an account? 
                    <a href="{{ route('register') }}" class="text-pink-500 font-bold hover:underline ml-1">Create one now</a>
                </p>
            </div>
        @endif
    </form>
</x-guest-layout>

