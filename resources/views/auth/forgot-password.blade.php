<x-guest-layout>
    <div class="mb-8">
        <h2 class="text-2xl font-extrabold text-slate-900 mb-2">Forgot Password?</h2>
        <p class="text-slate-500 text-sm font-medium leading-relaxed">
            No problem. Enter your email address and we'll send you a password reset link to choose a new one.
        </p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-8" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-slate-400 text-[10px] font-black uppercase tracking-widest mb-2 ml-4">Email Address</label>
            <div class="relative">
                <i class="fas fa-envelope absolute left-6 top-1/2 -translate-y-1/2 text-slate-300 text-xs"></i>
                <input id="email" type="email" name="email" :value="old('email')" required autofocus
                    class="w-full bg-slate-50 border-none rounded-2xl py-4 pl-12 pr-6 focus:ring-2 focus:ring-pink-200 text-sm font-bold placeholder:text-slate-300 transition-all"
                    placeholder="name@example.com">
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2 ml-4" />
        </div>

        <div class="pt-4">
            <button type="submit" class="w-full py-4 bg-gradient-to-r from-pink-500 to-rose-500 text-white font-bold rounded-2xl shadow-lg shadow-pink-200 hover:shadow-xl hover:scale-[1.02] transition-all transform active:scale-95">
                Send Reset Link
            </button>
        </div>

        <div class="text-center pt-4">
            <a href="{{ route('login') }}" class="text-sm font-bold text-slate-400 hover:text-pink-500 transition-colors">
                <i class="fas fa-arrow-left mr-2 text-xs"></i> Back to Sign In
            </a>
        </div>
    </form>
</x-guest-layout>

