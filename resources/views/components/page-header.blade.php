@props(['title', 'subtitle' => null, 'icon' => null, 'gradient' => 'from-pink-500 to-rose-500'])

<div {{ $attributes->merge(['class' => 'flex flex-col md:flex-row md:items-center justify-between gap-4']) }}>
    <div class="flex items-center space-x-4">
        @if($icon)
            <div class="w-14 h-14 bg-gradient-to-br {{ $gradient }} rounded-2xl flex items-center justify-center text-white text-xl shadow-lg shadow-pink-200">
                <i class="{{ $icon }}"></i>
            </div>
        @endif
        <div>
            <h2 class="font-extrabold text-3xl text-slate-900 leading-tight tracking-tight">
                {{ $title }}
            </h2>
            @if($subtitle)
                <p class="text-slate-500 text-sm mt-1 font-medium">{{ $subtitle }}</p>
            @endif
        </div>
    </div>
    
    @if(isset($actions))
        <div class="flex items-center space-x-3">
            {{ $actions }}
        </div>
    @endif
</div>
