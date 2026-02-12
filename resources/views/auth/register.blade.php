<x-guest-layout>
    <div class="mb-8">
        <h2 class="text-2xl font-extrabold text-slate-900 mb-2">Create Account</h2>
        <p class="text-slate-500 text-sm font-medium">Join our community and start your reading journey.</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-6">
        @csrf

        <!-- Name -->
        <div>
            <label for="name" class="block text-slate-400 text-[10px] font-black uppercase tracking-widest mb-2 ml-4">Full Name</label>
            <div class="relative">
                <i class="fas fa-user absolute left-6 top-1/2 -translate-y-1/2 text-slate-300 text-xs"></i>
                <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name"
                    class="w-full bg-slate-50 border-none rounded-2xl py-4 pl-12 pr-6 focus:ring-2 focus:ring-pink-200 text-sm font-bold placeholder:text-slate-300 transition-all"
                    placeholder="Joe Doe">
            </div>
            <x-input-error :messages="$errors->get('name')" class="mt-2 ml-4" />
        </div>

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-slate-400 text-[10px] font-black uppercase tracking-widest mb-2 ml-4">Email Address</label>
            <div class="relative">
                <i class="fas fa-envelope absolute left-6 top-1/2 -translate-y-1/2 text-slate-300 text-xs"></i>
                <input id="email" type="email" name="email" :value="old('email')" required autocomplete="username"
                    class="w-full bg-slate-50 border-none rounded-2xl py-4 pl-12 pr-6 focus:ring-2 focus:ring-pink-200 text-sm font-bold placeholder:text-slate-300 transition-all"
                    placeholder="name@example.com">
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2 ml-4" />
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-slate-400 text-[10px] font-black uppercase tracking-widest mb-2 ml-4">Password</label>
            <div class="relative">
                <i class="fas fa-lock absolute left-6 top-1/2 -translate-y-1/2 text-slate-300 text-xs"></i>
                <input id="password" type="password" name="password" required autocomplete="new-password"
                    class="w-full bg-slate-50 border-none rounded-2xl py-4 pl-12 pr-6 focus:ring-2 focus:ring-pink-200 text-sm font-bold placeholder:text-slate-300 transition-all"
                    placeholder="••••••••">
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2 ml-4" />
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation" class="block text-slate-400 text-[10px] font-black uppercase tracking-widest mb-2 ml-4">Confirm Password</label>
            <div class="relative">
                <i class="fas fa-shield-alt absolute left-6 top-1/2 -translate-y-1/2 text-slate-300 text-xs"></i>
                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                    class="w-full bg-slate-50 border-none rounded-2xl py-4 pl-12 pr-6 focus:ring-2 focus:ring-pink-200 text-sm font-bold placeholder:text-slate-300 transition-all"
                    placeholder="••••••••">
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 ml-4" />
        </div>

        <div class="pt-4">
            <button type="submit" class="w-full py-4 bg-gradient-to-r from-pink-500 to-rose-500 text-white font-bold rounded-2xl shadow-lg shadow-pink-200 hover:shadow-xl hover:scale-[1.02] transition-all transform active:scale-95">
                Register
            </button>
        </div>

        <div class="text-center pt-4">
            <p class="text-sm font-medium text-slate-500">
                Already registered? 
                <a href="{{ route('login') }}" class="text-pink-500 font-bold hover:underline ml-1">Sign in instead</a>
            </p>
        </div>
    </form>
</x-guest-layout>

