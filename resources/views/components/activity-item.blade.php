@props(['title', 'desc', 'time', 'icon', 'color' => 'pink'])

@php
    $colors = [
        'pink' => 'bg-pink-100 text-pink-500',
        'blue' => 'bg-blue-100 text-blue-500',
        'emerald' => 'bg-emerald-100 text-emerald-500',
    ];
@endphp

<div {{ $attributes->merge(['class' => 'flex items-start space-x-4 p-4 bg-slate-50 rounded-2xl hover:bg-slate-100 transition-colors']) }}>
    <div class="w-10 h-10 {{ $colors[$color] }} rounded-xl flex items-center justify-center shrink-0">
        <i class="{{ $icon }} text-sm"></i>
    </div>
    <div class="flex-1">
        <p class="text-sm font-bold text-slate-900">{{ $title }}</p>
        <p class="text-xs text-slate-500 mt-1">{{ $desc }}</p>
        <p class="text-xs text-slate-400 mt-1">{{ $time }}</p>
    </div>
</div>
