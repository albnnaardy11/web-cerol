<x-guest-layout>
    <div class="mb-8">
        <h2 class="text-2xl font-extrabold text-slate-900 mb-2">Secure Area</h2>
        <p class="text-slate-500 text-sm font-medium leading-relaxed">
            This is a secure area of the application. Please confirm your password before continuing.
        </p>
    </div>

    <form method="POST" action="{{ route('password.confirm') }}" class="space-y-6">
        @csrf

        <!-- Password -->
        <div>
            <label for="password" class="block text-slate-400 text-[10px] font-black uppercase tracking-widest mb-2 ml-4">Confirm Password</label>
            <div class="relative">
                <i class="fas fa-lock absolute left-6 top-1/2 -translate-y-1/2 text-slate-300 text-xs"></i>
                <input id="password" type="password" name="password" required autocomplete="current-password"
                    class="w-full bg-slate-50 border-none rounded-2xl py-4 pl-12 pr-6 focus:ring-2 focus:ring-pink-200 text-sm font-bold placeholder:text-slate-300 transition-all"
                    placeholder="••••••••">
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2 ml-4" />
        </div>

        <div class="pt-4">
            <button type="submit" class="w-full py-4 bg-gradient-to-r from-pink-500 to-rose-500 text-white font-bold rounded-2xl shadow-lg shadow-pink-200 hover:shadow-xl hover:scale-[1.02] transition-all transform active:scale-95">
                Confirm
            </button>
        </div>
    </form>
</x-guest-layout>

