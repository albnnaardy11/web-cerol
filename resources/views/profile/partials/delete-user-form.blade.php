<section class="space-y-6">
    <header class="mb-4">
        <p class="text-sm text-slate-500 font-medium leading-relaxed">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="inline-flex items-center px-8 py-4 bg-red-600 text-white font-black uppercase tracking-wider text-xs rounded-2xl shadow-lg shadow-red-200 hover:bg-red-700 hover:shadow-xl hover:scale-105 transition-all"
    >
        <i class="fas fa-trash-alt mr-2"></i>
        {{ __('Delete My Account') }}
    </button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-10 bg-white">
            @csrf
            @method('delete')

            <div class="flex items-center space-x-4 mb-6 text-red-600">
                <div class="w-12 h-12 bg-red-50 rounded-2xl flex items-center justify-center">
                    <i class="fas fa-exclamation-triangle text-xl"></i>
                </div>
                <h2 class="text-2xl font-black text-slate-900">
                    {{ __('Are you absolutely sure?') }}
                </h2>
            </div>

            <p class="text-slate-500 font-medium mb-8 leading-relaxed">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="space-y-2">
                <label for="password" class="block text-slate-400 text-[10px] font-black uppercase tracking-widest ml-4">Confirm with Password</label>
                <input id="password" name="password" type="password" 
                    class="w-full bg-slate-50 border-none rounded-2xl py-4 px-6 focus:ring-2 focus:ring-red-200 text-sm font-bold placeholder:text-slate-300 transition-all"
                    placeholder="Enter your password to proceed" />
                @if($errors->userDeletion->get('password'))
                    <p class="text-xs text-red-500 mt-2 ml-4 font-bold">{{ $errors->userDeletion->get('password')[0] }}</p>
                @endif
            </div>

            <div class="mt-10 flex items-center justify-end space-x-4">
                <button type="button" x-on:click="$dispatch('close')" 
                    class="px-8 py-4 bg-slate-100 text-slate-600 font-black uppercase tracking-wider text-xs rounded-2xl hover:bg-slate-200 transition-all">
                    {{ __('Cancel') }}
                </button>

                <button type="submit" 
                    class="px-8 py-4 bg-red-600 text-white font-black uppercase tracking-wider text-xs rounded-2xl shadow-lg shadow-red-200 hover:bg-red-700 hover:shadow-xl hover:scale-105 transition-all">
                    {{ __('Permanently Delete') }}
                </button>
            </div>
        </form>
    </x-modal>
</section>

