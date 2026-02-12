@props(['label', 'value', 'icon', 'color' => 'blue', 'status' => null])

@php
    $colors = [
        'blue' => 'text-blue-400',
        'pink' => 'text-pink-400',
        'purple' => 'text-purple-400',
        'emerald' => 'text-emerald-400',
    ];
@endphp

<div {{ $attributes->merge(['class' => 'flex items-center justify-between p-4 bg-white/5 backdrop-blur-md rounded-2xl border border-white/10']) }}>
    <div class="flex items-center space-x-3">
        <i class="{{ $icon }} {{ $colors[$color] }}"></i>
        <span class="text-white text-sm font-bold">{{ $label }}</span>
    </div>
    
    @if($status)
        <div class="flex items-center space-x-2">
            <div class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse"></div>
            <span class="text-emerald-400 text-xs font-bold">{{ $status }}</span>
        </div>
    @else
        <span class="text-slate-300 text-xs font-bold">{{ $value }}</span>
    @endif
</div>
