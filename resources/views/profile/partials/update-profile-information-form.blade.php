<section>
    <header class="mb-10 flex items-center space-x-4">
        <x-gradient-icon icon="fas fa-user-circle" size="w-12 h-12" gradient="from-indigo-500 to-purple-600" shadow="shadow-indigo-200" />
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
            <x-form-field 
                label="Full Name" 
                name="name" 
                :value="old('name', $user->name)" 
                required 
                autofocus 
                autocomplete="name" 
            />

            <div class="space-y-4">
                <x-form-field 
                    label="Email Address" 
                    name="email" 
                    type="email" 
                    :value="old('email', $user->email)" 
                    required 
                    autocomplete="username" 
                />

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div class="p-4 bg-amber-50 rounded-2xl border border-amber-100">
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
            <x-primary-button class="px-8 !bg-gradient-to-r from-indigo-500 to-purple-600 shadow-indigo-200">
                <i class="fas fa-save mr-2"></i>
                {{ __('Save Profile') }}
            </x-primary-button>

            @if (session('status') === 'profile-updated')
                <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 3000)"
                    class="flex items-center text-emerald-600 font-bold text-sm">
                    <i class="fas fa-check-circle mr-2"></i>
                    {{ __('Saved successfully.') }}
                </div>
            @endif
        </div>
    </form>
</section>


