<x-public-layout>
    <div class="py-24 bg-[#FAFAFE] min-h-screen relative overflow-hidden">
        <!-- Decoration -->
        <div class="blob bottom-0 right-0 opacity-20 transform translate-x-1/2 translate-y-1/2" style="background: linear-gradient(135deg, rgba(74, 144, 226, 0.2) 0%, rgba(144, 202, 249, 0.2) 100%);"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="flex flex-col lg:flex-row items-center gap-20">
                <!-- Contact Info -->
                <div class="w-full lg:w-1/2">
                    <div class="inline-flex items-center px-4 py-2 rounded-full bg-blue-50 text-blue-600 text-sm font-bold mb-6">
                        <i class="fas fa-headset me-2"></i> Support Center
                    </div>
                    <h1 class="text-5xl lg:text-7xl font-extrabold text-slate-900 leading-tight mb-8">
                        Ada Pertanyaan? <br><span class="gradient-text">Kami Siap</span> Membantu
                    </h1>
                    <p class="text-xl text-slate-500 mb-12 leading-relaxed font-medium">
                        Punya saran atau ingin bekerjasama? Tim kami selalu terbuka untuk mendengar setiap masukan demi kemajuan literasi anak bangsa.
                    </p>
                    
                    <div class="space-y-8">
                        <div class="flex items-center space-x-6 p-6 bg-white rounded-3xl shadow-sm border border-slate-50 transform hover:scale-105 transition-transform duration-300">
                            <div class="w-16 h-16 bg-pink-50 text-pink-500 rounded-2xl flex items-center justify-center text-2xl shadow-inner">
                                <i class="fas fa-map-marked-alt"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900">Kantor Pusat</h4>
                                <p class="text-slate-500 text-sm font-medium">Jl. Literasi No. 123, Indonesia</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center space-x-6 p-6 bg-white rounded-3xl shadow-sm border border-slate-50 transform hover:scale-105 transition-transform duration-300">
                            <div class="w-16 h-16 bg-blue-50 text-blue-500 rounded-2xl flex items-center justify-center text-2xl shadow-inner">
                                <i class="fas fa-envelope-open-text"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900">Email Utama</h4>
                                <p class="text-slate-500 text-sm font-medium">hallo@deandles.com</p>
                            </div>
                        </div>

                        <div class="flex items-center space-x-6 p-6 bg-white rounded-3xl shadow-sm border border-slate-50 transform hover:scale-105 transition-transform duration-300">
                            <div class="w-16 h-16 bg-emerald-50 text-emerald-500 rounded-2xl flex items-center justify-center text-2xl shadow-inner">
                                <i class="fab fa-whatsapp"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900">Layanan WhatsApp</h4>
                                <p class="text-slate-500 text-sm font-medium">+62 812 3456 7890</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="w-full lg:w-1/2">
                    <div class="bg-white p-10 md:p-16 rounded-[3.5rem] shadow-2xl shadow-blue-100/50 border border-slate-50">
                        <h2 class="text-3xl font-extrabold text-slate-900 mb-8">Kirim <span class="text-pink-500">Pesan</span></h2>
                        
                        @if(session('success'))
                            <div class="bg-emerald-50 border border-emerald-100 text-emerald-600 px-6 py-4 rounded-2xl mb-8 flex items-center animate-fade-in-down">
                                <i class="fas fa-check-circle me-3 text-xl"></i>
                                <span class="font-bold text-sm">{{ session('success') }}</span>
                            </div>
                        @endif

                        <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="name" class="block text-slate-400 text-[10px] font-black uppercase tracking-widest mb-2 ml-4">Nama Lengkap</label>
                                    <input type="text" name="name" id="name" 
                                        class="w-full bg-slate-50 border-none rounded-2xl py-4 px-6 focus:ring-2 focus:ring-pink-200 text-sm font-bold placeholder:text-slate-300" 
                                        placeholder="Joe Doe" required>
                                </div>
                                <div>
                                    <label for="email" class="block text-slate-400 text-[10px] font-black uppercase tracking-widest mb-2 ml-4">Alamat Email</label>
                                    <input type="email" name="email" id="email" 
                                        class="w-full bg-slate-50 border-none rounded-2xl py-4 px-6 focus:ring-2 focus:ring-pink-200 text-sm font-bold placeholder:text-slate-300" 
                                        placeholder="joe@example.com" required>
                                </div>
                            </div>
                            
                            <div>
                                <label for="subject" class="block text-slate-400 text-[10px] font-black uppercase tracking-widest mb-2 ml-4">Subjek Pesan</label>
                                <input type="text" name="subject" id="subject" 
                                    class="w-full bg-slate-50 border-none rounded-2xl py-4 px-6 focus:ring-2 focus:ring-pink-200 text-sm font-bold placeholder:text-slate-300" 
                                    placeholder="Tanya soal koleksi..." required>
                            </div>

                            <div>
                                <label for="message" class="block text-slate-400 text-[10px] font-black uppercase tracking-widest mb-2 ml-4">Pesan Anda</label>
                                <textarea name="message" id="message" rows="5" 
                                    class="w-full bg-slate-50 border-none rounded-2xl py-4 px-6 focus:ring-2 focus:ring-pink-200 text-sm font-bold placeholder:text-slate-300 resize-none" 
                                    placeholder="Tuliskan sesuatu di sini..." required></textarea>
                            </div>

                            <button type="submit" class="btn-premium w-full py-5 rounded-2xl text-white font-bold text-lg shadow-xl shadow-pink-100 flex items-center justify-center space-x-3">
                                <span>Kirim Sekarang</span>
                                <i class="fas fa-paper-plane text-sm"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-public-layout>