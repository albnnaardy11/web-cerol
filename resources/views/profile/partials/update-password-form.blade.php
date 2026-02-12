<section>
    <header class="mb-10 flex items-center space-x-4">
        <div class="w-12 h-12 bg-purple-50 rounded-2xl flex items-center justify-center text-purple-600">
            <i class="fas fa-lock text-xl"></i>
        </div>
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
            <div class="space-y-2">
                <label for="update_password_current_password" class="block text-slate-400 text-[10px] font-black uppercase tracking-widest ml-4">Current Password</label>
                <input id="update_password_current_password" name="current_password" type="password" 
                    class="w-full max-w-xl bg-slate-50 border-none rounded-2xl py-4 px-6 focus:ring-2 focus:ring-purple-200 text-sm font-bold placeholder:text-slate-300 transition-all"
                    autocomplete="current-password" />
                @if($errors->updatePassword->get('current_password'))
                    <p class="text-xs text-red-500 mt-2 ml-4 font-bold">{{ $errors->updatePassword->get('current_password')[0] }}</p>
                @endif
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl">
                <div class="space-y-2">
                    <label for="update_password_password" class="block text-slate-400 text-[10px] font-black uppercase tracking-widest ml-4">New Password</label>
                    <input id="update_password_password" name="password" type="password" 
                        class="w-full bg-slate-50 border-none rounded-2xl py-4 px-6 focus:ring-2 focus:ring-purple-200 text-sm font-bold placeholder:text-slate-300 transition-all"
                        autocomplete="new-password" />
                    @if($errors->updatePassword->get('password'))
                        <p class="text-xs text-red-500 mt-2 ml-4 font-bold">{{ $errors->updatePassword->get('password')[0] }}</p>
                    @endif
                </div>

                <div class="space-y-2">
                    <label for="update_password_password_confirmation" class="block text-slate-400 text-[10px] font-black uppercase tracking-widest ml-4">Confirm Password</label>
                    <input id="update_password_password_confirmation" name="password_confirmation" type="password" 
                        class="w-full bg-slate-50 border-none rounded-2xl py-4 px-6 focus:ring-2 focus:ring-purple-200 text-sm font-bold placeholder:text-slate-300 transition-all"
                        autocomplete="new-password" />
                    @if($errors->updatePassword->get('password_confirmation'))
                        <p class="text-xs text-red-500 mt-2 ml-4 font-bold">{{ $errors->updatePassword->get('password_confirmation')[0] }}</p>
                    @endif
                </div>
            </div>
        </div>

        <div class="flex items-center space-x-6 pt-6 border-t border-slate-50">
            <button type="submit" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-purple-500 to-indigo-600 text-white font-black uppercase tracking-wider text-xs rounded-2xl shadow-lg shadow-purple-200 hover:shadow-xl hover:scale-105 transition-all">
                <i class="fas fa-shield-alt mr-2"></i>
                {{ __('Update Password') }}
            </button>

            @if (session('status') === 'password-updated')
                <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 3000)"
                    class="flex items-center text-emerald-600 font-bold text-sm">
                    <i class="fas fa-check-circle mr-2"></i>
                    {{ __('Password has been updated.') }}
                </div>
            @endif
        </div>
    </form>
</section>

