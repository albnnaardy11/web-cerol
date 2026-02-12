<section>
    <header class="mb-10 flex items-center space-x-4">
        <div class="w-12 h-12 bg-indigo-50 rounded-2xl flex items-center justify-center text-indigo-600">
            <i class="fas fa-user-circle text-xl"></i>
        </div>
        <div>
            <h2 class="text-2xl font-black text-slate-900">
                {{ __('Profile Information') }}
            </h2>
            <p class="text-slate-500 font-medium text-sm">
                {{ __("Update your account's profile information and email address.") }}
            </p>
        </div>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-8">
        @csrf
        @method('patch')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="space-y-2">
                <label for="name" class="block text-slate-400 text-[10px] font-black uppercase tracking-widest ml-4">Full Name</label>
                <input id="name" name="name" type="text" 
                    class="w-full bg-slate-50 border-none rounded-2xl py-4 px-6 focus:ring-2 focus:ring-indigo-200 text-sm font-bold placeholder:text-slate-300 transition-all"
                    value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" />
                @if($errors->get('name'))
                    <p class="text-xs text-red-500 mt-2 ml-4 font-bold">{{ $errors->get('name')[0] }}</p>
                @endif
            </div>

            <div class="space-y-2">
                <label for="email" class="block text-slate-400 text-[10px] font-black uppercase tracking-widest ml-4">Email Address</label>
                <input id="email" name="email" type="email" 
                    class="w-full bg-slate-50 border-none rounded-2xl py-4 px-6 focus:ring-2 focus:ring-indigo-200 text-sm font-bold placeholder:text-slate-300 transition-all"
                    value="{{ old('email', $user->email) }}" required autocomplete="username" />
                @if($errors->get('email'))
                    <p class="text-xs text-red-500 mt-2 ml-4 font-bold">{{ $errors->get('email')[0] }}</p>
                @endif

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div class="mt-4 p-4 bg-amber-50 rounded-2xl border border-amber-100">
                        <p class="text-xs text-amber-700 font-bold flex items-center">
                            <i class="fas fa-info-circle mr-2"></i>
                            {{ __('Your email address is unverified.') }}
                        </p>
                        <button form="send-verification" class="text-xs text-indigo-600 font-black uppercase tracking-wider mt-2 hover:text-indigo-800 transition-colors">
                            {{ __('Click here to re-send verification') }}
                        </button>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 font-black text-[10px] text-emerald-600 uppercase tracking-widest">
                                {{ __('Verification link sent!') }}
                            </p>
                        @endif
                    </div>
                @endif
            </div>
        </div>

        <div class="flex items-center space-x-6 pt-6 border-t border-slate-50">
            <button type="submit" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-indigo-500 to-purple-600 text-white font-black uppercase tracking-wider text-xs rounded-2xl shadow-lg shadow-indigo-200 hover:shadow-xl hover:scale-105 transition-all">
                <i class="fas fa-save mr-2"></i>
                {{ __('Save Profile') }}
            </button>

            @if (session('status') === 'profile-updated')
                <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 3000)"
                    class="flex items-center text-emerald-600 font-bold text-sm">
                    <i class="fas fa-check-circle mr-2"></i>
                    {{ __('Your profile has been updated successfully.') }}
                </div>
            @endif
        </div>
    </form>
</section>

