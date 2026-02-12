@props(['label', 'name', 'type' => 'text', 'placeholder' => '', 'required' => false, 'icon' => null, 'value' => null])

<div {{ $attributes->merge(['class' => 'space-y-2']) }}>
    @if($label)
        <label for="{{ $name }}" class="block text-slate-400 text-[10px] font-black uppercase tracking-widest ml-4">
            {{ $label }}
            @if($required) <span class="text-rose-500">*</span> @endif
        </label>
    @endif

    <div class="relative group">
        @if($icon)
            <i class="{{ $icon }} absolute left-6 top-1/2 -translate-y-1/2 text-slate-300 group-focus-within:text-pink-400 transition-colors text-xs"></i>
        @endif
        
        <input 
            type="{{ $type }}" 
            name="{{ $name }}" 
            id="{{ $name }}" 
            placeholder="{{ $placeholder }}" 
            @if($required) required @endif
            @if($value) value="{{ $value }}" @endif
            class="w-full bg-slate-50 border-none rounded-2xl py-4 {{ $icon ? 'pl-12' : 'px-6' }} pr-6 focus:ring-2 focus:ring-pink-200 text-sm font-bold placeholder:text-slate-300 transition-all shadow-sm"
        >
    </div>

    @error($name)
        <p class="text-rose-500 text-xs font-bold mt-1 ml-4 animate-shake">
            <i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}
        </p>
    @enderror
</div>
