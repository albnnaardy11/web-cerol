@props(['padding' => 'p-8', 'variant' => 'white'])

@php
    $baseClasses = "rounded-[2.5rem] transition-all duration-500 border border-slate-100";
    $variants = [
        'white' => 'bg-white shadow-lg shadow-slate-100 hover:shadow-2xl',
        'glass' => 'bg-white/80 backdrop-blur-md shadow-xl border-white/50',
        'dark' => 'bg-slate-900 shadow-2xl border-slate-800 text-white',
    ];
    $classes = "{$baseClasses} {$variants[$variant]} {$padding}";
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</div>
