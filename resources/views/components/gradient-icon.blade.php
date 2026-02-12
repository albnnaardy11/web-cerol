@props(['icon', 'size' => 'w-12 h-12', 'gradient' => 'from-pink-500 to-rose-500', 'shadow' => 'shadow-pink-200'])

<div {{ $attributes->merge(['class' => "{$size} bg-gradient-to-br {$gradient} rounded-2xl flex items-center justify-center text-white shadow-lg {$shadow}"]) }}>
    <i class="{{ $icon }}"></i>
</div>
