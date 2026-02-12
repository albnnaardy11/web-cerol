<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-6 py-3 bg-gradient-to-r from-pink-500 to-rose-500 border border-transparent rounded-2xl font-bold text-sm text-white shadow-lg shadow-pink-200 hover:shadow-xl hover:scale-[1.02] transition-all transform active:scale-95 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2']) }}>
    {{ $slot }}
</button>

