<section>
    <header class="mb-10 flex items-center space-x-4">
        <x-gradient-icon icon="fas fa-lock" size="w-12 h-12" gradient="from-purple-500 to-indigo-600" shadow="shadow-purple-200" />
        <div>
            <h2 class="text-2xl font-black text-slate-900">
                {{ __('Update Password') }}
            </h2>
            <p class="text-slate-500 font-medium text-sm">
                {{ __('Ensure your account is using a long, random password to stay secure.') }}
            </p>
        </div>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="space-y-8">
        @csrf
        @method('put')

        <div class="space-y-6">
            <x-form-field 
                label="Current Password" 
                name="current_password" 
                type="password" 
                id="update_password_current_password" 
                autocomplete="current-password" 
                class="max-w-xl"
                :errors="$errors->updatePassword"
            />

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl">
                <x-form-field 
                    label="New Password" 
                    name="password" 
                    type="password" 
                    id="update_password_password" 
                    autocomplete="new-password" 
                    :errors="$errors->updatePassword"
                />

                <x-form-field 
                    label="Confirm Password" 
                    name="password_confirmation" 
                    type="password" 
                    id="update_password_password_confirmation" 
                    autocomplete="new-password" 
                    :errors="$errors->updatePassword"
                />
            </div>
        </div>

        <div class="flex items-center space-x-6 pt-6 border-t border-slate-50">
            <x-primary-button class="px-8 !bg-gradient-to-r from-purple-500 to-indigo-600 shadow-purple-200">
                <i class="fas fa-shield-alt mr-2"></i>
                {{ __('Update Password') }}
            </x-primary-button>

            @if (session('status') === 'password-updated')
                <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 3000)"
                    class="flex items-center text-emerald-600 font-bold text-sm">
                    <i class="fas fa-check-circle mr-2"></i>
                    {{ __('Saved.') }}
                </div>
            @endif
        </div>
    </form>
</section>


