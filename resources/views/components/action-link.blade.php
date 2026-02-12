@props(['href', 'label', 'desc', 'icon', 'color' => 'pink'])

@php
    $colors = [
        'pink' => 'from-pink-50 to-rose-50 hover:from-pink-500 hover:to-rose-500 border-pink-100 hover:border-pink-500 hover:shadow-pink-200 text-pink-500',
        'blue' => 'from-blue-50 to-indigo-50 hover:from-blue-500 hover:to-indigo-500 border-blue-100 hover:border-blue-500 hover:shadow-blue-200 text-blue-500',
        'emerald' => 'from-emerald-50 to-teal-50 hover:from-emerald-500 hover:to-teal-500 border-emerald-100 hover:border-emerald-500 hover:shadow-emerald-200 text-emerald-500',
    ];
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => "group flex items-center justify-between p-6 bg-gradient-to-br rounded-3xl transition-all duration-300 border hover:shadow-xl {$colors[$color]}"]) }}>
    <div class="flex items-center space-x-4">
        <div class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center group-hover:text-white transition-colors shadow-sm">
            <i class="{{ $icon }} text-xl"></i>
        </div>
        <div>
            <span class="font-extrabold text-slate-900 group-hover:text-white transition-colors block">{{ $label }}</span>
            <span class="text-xs text-slate-500 group-hover:text-white/80 transition-colors font-medium">{{ $desc }}</span>
        </div>
    </div>
    <i class="fas fa-arrow-right opacity-30 group-hover:opacity-100 group-hover:text-white transition-all group-hover:translate-x-1"></i>
</a>
