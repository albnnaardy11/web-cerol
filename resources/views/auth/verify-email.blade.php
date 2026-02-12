<x-guest-layout>
    <div class="mb-8 text-center">
        <div class="w-20 h-20 bg-blue-50 rounded-full flex items-center justify-center text-blue-500 text-3xl mx-auto mb-6 shadow-inner">
            <i class="fas fa-envelope-circle-check"></i>
        </div>
        <h2 class="text-2xl font-extrabold text-slate-900 mb-2">Check your email</h2>
        <p class="text-slate-500 text-sm font-medium leading-relaxed">
            Thanks for signing up! Before getting started, please verify your email address by clicking on the link we just emailed to you.
        </p>
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-8 p-4 bg-emerald-50 border border-emerald-100 rounded-2xl text-emerald-600 text-sm font-bold flex items-center animate-fade-in-down">
            <i class="fas fa-check-circle mr-3"></i>
            {{ __('A new verification link has been sent to your email address.') }}
        </div>
    @endif

    <div class="space-y-4">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="w-full py-4 bg-gradient-to-r from-pink-500 to-rose-500 text-white font-bold rounded-2xl shadow-lg shadow-pink-200 hover:shadow-xl hover:scale-[1.02] transition-all transform active:scale-95">
                Resend Verification Email
            </button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full py-3 text-slate-400 font-bold hover:text-slate-600 transition-colors text-sm">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout>

