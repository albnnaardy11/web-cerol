@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'bg-slate-50 border-none rounded-2xl py-4 px-6 focus:ring-2 focus:ring-pink-200 text-sm font-bold placeholder:text-slate-300 transition-all shadow-sm']) }}>

