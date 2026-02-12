@props(['title', 'value', 'icon', 'trend' => null, 'trendType' => 'up', 'gradient' => 'from-pink-500 to-rose-500'])

@php
    $trendColor = $trendType === 'up' ? 'text-emerald-500' : 'text-red-500';
    $trendIcon = $trendType === 'up' ? 'fa-arrow-up' : 'fa-arrow-down';
@endphp

<x-premium-card class="group relative overflow-hidden">
    <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br {{ $gradient }} rounded-full blur-2xl opacity-0 group-hover:opacity-10 shadow-2xl transition-opacity duration-500"></div>
    
    <div class="relative z-10">
        <div class="flex items-start justify-between mb-6">
            <div class="w-16 h-16 bg-gradient-to-br {{ $gradient }} rounded-2xl flex items-center justify-center text-white text-2xl shadow-lg transform group-hover:scale-110 group-hover:rotate-6 transition-transform duration-500">
                <i class="{{ $icon }}"></i>
            </div>
            <div class="px-3 py-1 bg-slate-50 text-slate-400 rounded-full text-[10px] font-black uppercase tracking-wider">
                Overview
            </div>
        </div>
        
        <h4 class="text-5xl font-extrabold text-slate-900 mb-2 tracking-tight">{{ $value }}</h4>
        <p class="text-slate-400 text-sm font-bold uppercase tracking-widest">{{ $title }}</p>
        
        @if($trend)
            <div class="mt-4 flex items-center {{ $trendColor }} text-xs font-bold">
                <i class="fas {{ $trendIcon }} mr-1"></i>
                <span>{{ $trend }}</span>
            </div>
        @endif
    </div>
</x-premium-card>
