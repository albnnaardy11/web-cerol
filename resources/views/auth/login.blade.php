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
        <x-form-field 
            label="Email Address" 
            name="email" 
            type="email" 
            icon="fas fa-envelope" 
            placeholder="name@example.com" 
            :value="old('email')"
            required 
            autofocus
        />

        <!-- Password -->
        <div class="space-y-2">
            <div class="flex items-center justify-between mb-2 ml-4">
                <label for="password" class="block text-slate-400 text-[10px] font-black uppercase tracking-widest">Password</label>
                @if (Route::has('password.request'))
                    <a class="text-[10px] font-black uppercase tracking-widest text-pink-500 hover:text-pink-600 transition-colors" href="{{ route('password.request') }}">
                        Forgot?
                    </a>
                @endif
            </div>
            <x-form-field 
                name="password" 
                type="password" 
                icon="fas fa-lock" 
                placeholder="••••••••" 
                required
            />
        </div>

        <!-- Remember Me -->
        <div class="block ml-4">
            <label for="remember_me" class="inline-flex items-center cursor-pointer group">
                <input id="remember_me" type="checkbox" class="rounded-lg border-slate-200 text-pink-500 shadow-sm focus:ring-pink-500 focus:ring-offset-0 w-5 h-5 transition-all cursor-pointer" name="remember">
                <span class="ms-3 text-sm font-bold text-slate-500 group-hover:text-slate-700 transition-colors">Keep me logged in</span>
            </label>
        </div>

        <div class="pt-4">
            <x-primary-button class="w-full py-4">
                Sign In
            </x-primary-button>
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


