<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <a href="{{ route('admin.messages.index') }}" class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center text-slate-400 hover:text-amber-500 hover:shadow-lg transition-all">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <div>
                    <h2 class="font-extrabold text-3xl text-slate-900 leading-tight tracking-tight">
                        Message Details
                    </h2>
                    <p class="text-slate-500 text-sm mt-1 font-medium italic">Sent {{ $message->created_at->format('F j, Y \a\t H:i') }}</p>
                </div>
            </div>
            <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this message?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="inline-flex items-center px-6 py-3 bg-red-50 text-red-600 font-bold rounded-2xl hover:bg-red-500 hover:text-white transition-all">
                    <i class="fas fa-trash mr-2"></i>
                    Delete Message
                </button>
            </form>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-slate-50 via-amber-50/30 to-orange-50/30 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-[3rem] shadow-xl shadow-slate-100 border border-slate-100 overflow-hidden">
                <!-- Message Header -->
                <div class="p-12 border-b border-slate-50 bg-gradient-to-r from-slate-50/50 to-transparent">
                    <div class="flex items-start justify-between mb-8">
                        <div class="flex items-center space-x-6">
                            <div class="w-20 h-20 bg-gradient-to-br from-amber-500 to-orange-500 rounded-[2rem] flex items-center justify-center text-white text-3xl font-extrabold shadow-lg shadow-amber-200">
                                {{ strtoupper(substr($message->name, 0, 1)) }}
                            </div>
                            <div>
                                <h3 class="text-2xl font-black text-slate-900 mb-1">{{ $message->name }}</h3>
                                <p class="text-amber-600 font-bold flex items-center">
                                    <i class="fas fa-envelope mr-2"></i>
                                    {{ $message->email }}
                                </p>
                            </div>
                        </div>
                        <div class="text-right">
                            <span class="px-4 py-2 bg-slate-100 text-slate-500 rounded-full text-[10px] font-black uppercase tracking-widest">
                                Inquiry
                            </span>
                        </div>
                    </div>
                    
                    <div class="bg-amber-50/50 rounded-3xl p-6 border border-amber-100/50">
                        <h4 class="text-slate-400 text-[10px] font-black uppercase tracking-widest mb-2">Subject</h4>
                        <p class="text-xl font-extrabold text-slate-800">{{ $message->subject }}</p>
                    </div>
                </div>

                <!-- Message Content -->
                <div class="p-12">
                    <h4 class="text-slate-400 text-[10px] font-black uppercase tracking-widest mb-6 ml-1">Message Content</h4>
                    <div class="prose prose-slate max-w-none">
                        <div class="bg-slate-50 rounded-[2.5rem] p-10 text-slate-700 leading-relaxed text-lg font-medium whitespace-pre-line border border-slate-100/50">
                            {{ $message->message }}
                        </div>
                    </div>
                    
                    <div class="mt-12 flex items-center justify-between">
                        <div class="flex items-center space-x-2 text-slate-400 text-sm font-medium">
                            <i class="fas fa-clock"></i>
                            <span>Received {{ $message->created_at->diffForHumans() }}</span>
                        </div>
                        <a href="mailto:{{ $message->email }}?subject=Re: {{ $message->subject }}" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-amber-500 to-orange-500 text-white font-bold rounded-2xl shadow-lg shadow-amber-200 hover:shadow-xl hover:scale-105 transition-all">
                            <i class="fas fa-reply mr-2"></i>
                            Reply via Email
                        </a>
                    </div>
                </div>
            </div>

            <!-- Navigation Helper -->
            <div class="mt-8 flex justify-center">
                <a href="{{ route('admin.messages.index') }}" class="text-slate-400 hover:text-amber-500 font-bold transition-colors flex items-center">
                    <i class="fas fa-th-list mr-2"></i>
                    Back to All Messages
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
