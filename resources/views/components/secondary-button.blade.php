<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-6 py-3 bg-white border border-slate-200 rounded-2xl font-bold text-sm text-slate-700 shadow-sm hover:bg-slate-50 hover:border-slate-300 hover:scale-[1.02] transition-all transform active:scale-95 focus:outline-none focus:ring-2 focus:ring-slate-200 focus:ring-offset-2 disabled:opacity-25']) }}>
    {{ $slot }}
</button>

