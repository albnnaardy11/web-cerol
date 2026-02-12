<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-extrabold text-3xl text-slate-900 leading-tight tracking-tight">
                    Messages
                </h2>
                <p class="text-slate-500 text-sm mt-1 font-medium">Inquiries and messages from website visitors</p>
            </div>
            <div class="flex items-center space-x-3">
                <span class="px-4 py-2 bg-amber-50 text-amber-600 rounded-2xl text-xs font-black uppercase tracking-wider">
                    <i class="fas fa-envelope mr-1"></i>
                    {{ $messages->total() }} Total
                </span>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-slate-50 via-amber-50/30 to-orange-50/30 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="bg-gradient-to-r from-emerald-500 to-teal-500 text-white px-8 py-5 rounded-[2.5rem] mb-8 flex items-center shadow-lg shadow-emerald-200 animate-fade-in-down">
                    <i class="fas fa-check-circle text-2xl mr-4"></i>
                    <div>
                        <p class="font-bold text-lg">Success!</p>
                        <p class="text-sm text-white/90">{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            <!-- Messages List -->
            <div class="space-y-6">
                @forelse($messages as $message)
                    <div class="group bg-white rounded-[2.5rem] p-8 shadow-lg shadow-slate-100 border border-slate-100 hover:shadow-2xl transition-all duration-500 relative overflow-hidden">
                        <!-- Background Glow -->
                        <div class="absolute -right-20 -top-20 w-64 h-64 bg-amber-500/5 rounded-full blur-3xl group-hover:bg-amber-500/10 transition-colors"></div>
                        
                        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 relative z-10">
                            <div class="flex items-center space-x-6">
                                <!-- Avatar/Icon -->
                                <div class="w-16 h-16 bg-gradient-to-br from-amber-500 to-orange-500 rounded-2xl flex items-center justify-center text-white text-2xl font-extrabold shadow-lg shadow-amber-200">
                                    {{ strtoupper(substr($message->name, 0, 1)) }}
                                </div>
                                
                                <div>
                                    <div class="flex items-center space-x-3 mb-1">
                                        <h3 class="font-extrabold text-xl text-slate-900 group-hover:text-amber-600 transition-colors">
                                            {{ $message->name }}
                                        </h3>
                                        <span class="text-slate-300 text-xs">•</span>
                                        <span class="text-slate-400 text-sm font-medium">{{ $message->created_at->diffForHumans() }}</span>
                                    </div>
                                    <div class="flex flex-wrap items-center gap-4">
                                        <div class="flex items-center text-slate-500 text-sm font-bold">
                                            <i class="fas fa-envelope text-amber-400 mr-2"></i>
                                            {{ $message->email }}
                                        </div>
                                        <div class="flex items-center text-slate-500 text-sm font-bold">
                                            <i class="fas fa-tag text-amber-400 mr-2"></i>
                                            {{ Str::limit($message->subject, 40) }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Actions -->
                            <div class="flex items-center space-x-3">
                                <a href="{{ route('admin.messages.show', $message) }}" class="inline-flex items-center px-6 py-3 bg-slate-50 text-slate-700 font-bold rounded-xl hover:bg-amber-500 hover:text-white transition-all shadow-sm">
                                    <i class="fas fa-eye mr-2"></i>Read Message
                                </a>
                                <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this message?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-3 bg-red-50 text-red-500 rounded-xl hover:bg-red-500 hover:text-white transition-all shadow-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="bg-white rounded-[3rem] p-20 text-center shadow-lg shadow-slate-100 border border-slate-100">
                        <div class="w-32 h-32 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-8">
                            <i class="fas fa-envelope-open text-5xl text-slate-300"></i>
                        </div>
                        <h2 class="text-2xl font-extrabold text-slate-900 mb-3">Your Inbox is Empty</h2>
                        <p class="text-slate-500 font-medium max-w-sm mx-auto">
                            No messages have been received yet. All new inquiries from the contact form will appear here.
                        </p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($messages->hasPages())
                <div class="mt-12">
                    {{ $messages->links() }}
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
