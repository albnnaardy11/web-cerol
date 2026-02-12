<x-guest-layout>
    <div class="mb-8">
        <h2 class="text-2xl font-extrabold text-slate-900 mb-2">Create Account</h2>
        <p class="text-slate-500 text-sm font-medium">Join our community and start your reading journey.</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-6">
        @csrf

        <!-- Name -->
        <x-form-field 
            label="Full Name" 
            name="name" 
            type="text" 
            icon="fas fa-user" 
            placeholder="Joe Doe" 
            :value="old('name')"
            required 
            autofocus
        />

        <!-- Email Address -->
        <x-form-field 
            label="Email Address" 
            name="email" 
            type="email" 
            icon="fas fa-envelope" 
            placeholder="name@example.com" 
            :value="old('email')"
            required 
        />

        <!-- Password -->
        <x-form-field 
            label="Password" 
            name="password" 
            type="password" 
            icon="fas fa-lock" 
            placeholder="••••••••" 
            required
        />

        <!-- Confirm Password -->
        <x-form-field 
            label="Confirm Password" 
            name="password_confirmation" 
            type="password" 
            icon="fas fa-shield-alt" 
            placeholder="••••••••" 
            required
        />

        <div class="pt-4">
            <x-primary-button class="w-full py-4">
                Register
            </x-primary-button>
        </div>

        <div class="text-center pt-4">
            <p class="text-sm font-medium text-slate-500">
                Already registered? 
                <a href="{{ route('login') }}" class="text-pink-500 font-bold hover:underline ml-1">Sign in instead</a>
            </p>
        </div>
    </form>
</x-guest-layout>


