<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-extrabold text-3xl text-slate-900 leading-tight tracking-tight">
                    Edit Book
                </h2>
                <p class="text-slate-500 text-sm mt-1 font-medium">Update book information</p>
            </div>
            <a href="{{ route('admin.books.index') }}" class="inline-flex items-center px-6 py-3 bg-slate-100 text-slate-700 font-bold rounded-2xl hover:bg-slate-200 transition-all">
                <i class="fas fa-arrow-left mr-2"></i>
                Back to List
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-slate-50 via-pink-50/30 to-blue-50/30 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-[3rem] p-12 shadow-lg shadow-slate-100 border border-slate-100">
                <form action="{{ route('admin.books.update', $book) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <!-- Basic Information -->
                    <div class="mb-10">
                        <h3 class="text-xl font-extrabold text-slate-900 mb-6 flex items-center">
                            <div class="w-10 h-10 bg-gradient-to-br from-pink-500 to-rose-500 rounded-xl flex items-center justify-center text-white mr-3">
                                <i class="fas fa-info-circle"></i>
                            </div>
                            Basic Information
                        </h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="title" class="block text-slate-400 text-[10px] font-black uppercase tracking-widest mb-2 ml-4">Book Title *</label>
                                <input type="text" name="title" id="title" value="{{ $book->title }}" required
                                    class="w-full bg-slate-50 border-none rounded-2xl py-4 px-6 focus:ring-2 focus:ring-pink-200 text-sm font-bold placeholder:text-slate-300">
                            </div>
                            
                            <div>
                                <label for="author" class="block text-slate-400 text-[10px] font-black uppercase tracking-widest mb-2 ml-4">Author Name *</label>
                                <input type="text" name="author" id="author" value="{{ $book->author }}" required
                                    class="w-full bg-slate-50 border-none rounded-2xl py-4 px-6 focus:ring-2 focus:ring-pink-200 text-sm font-bold placeholder:text-slate-300">
                            </div>
                            
                            <div>
                                <label for="category_id" class="block text-slate-400 text-[10px] font-black uppercase tracking-widest mb-2 ml-4">Category *</label>
                                <select name="category_id" id="category_id" required
                                    class="w-full bg-slate-50 border-none rounded-2xl py-4 px-6 focus:ring-2 focus:ring-pink-200 text-sm font-bold">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $book->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div>
                                <label for="stock" class="block text-slate-400 text-[10px] font-black uppercase tracking-widest mb-2 ml-4">Stock Quantity *</label>
                                <input type="number" name="stock" id="stock" value="{{ $book->stock }}" required min="0"
                                    class="w-full bg-slate-50 border-none rounded-2xl py-4 px-6 focus:ring-2 focus:ring-pink-200 text-sm font-bold placeholder:text-slate-300">
                            </div>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="mb-10">
                        <h3 class="text-xl font-extrabold text-slate-900 mb-6 flex items-center">
                            <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-indigo-500 rounded-xl flex items-center justify-center text-white mr-3">
                                <i class="fas fa-align-left"></i>
                            </div>
                            Description
                        </h3>
                        
                        <div>
                            <label for="description" class="block text-slate-400 text-[10px] font-black uppercase tracking-widest mb-2 ml-4">Book Description (Optional)</label>
                            <textarea name="description" id="description" rows="5"
                                class="w-full bg-slate-50 border-none rounded-2xl py-4 px-6 focus:ring-2 focus:ring-pink-200 text-sm font-bold placeholder:text-slate-300 resize-none">{{ $book->description }}</textarea>
                        </div>
                    </div>

                    <!-- Files Upload -->
                    <div class="mb-10">
                        <h3 class="text-xl font-extrabold text-slate-900 mb-6 flex items-center">
                            <div class="w-10 h-10 bg-gradient-to-br from-emerald-500 to-teal-500 rounded-xl flex items-center justify-center text-white mr-3">
                                <i class="fas fa-upload"></i>
                            </div>
                            Files & Media
                        </h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="image" class="block text-slate-400 text-[10px] font-black uppercase tracking-widest mb-2 ml-4">Cover Image</label>
                                @if($book->image)
                                    <div class="mb-4 p-4 bg-slate-50 rounded-2xl">
                                        <p class="text-xs font-bold text-slate-500 mb-2">Current Cover:</p>
                                        <img src="{{ Str::startsWith($book->image, 'http') ? $book->image : asset('storage/' . $book->image) }}" 
                                            alt="Current Cover" 
                                            class="h-32 w-auto rounded-xl shadow-sm">
                                    </div>
                                @endif
                                <input type="file" name="image" id="image" accept="image/*"
                                    class="w-full bg-slate-50 border-none rounded-2xl py-4 px-6 focus:ring-2 focus:ring-pink-200 text-sm font-bold file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-bold file:bg-pink-50 file:text-pink-600 hover:file:bg-pink-100">
                                <p class="text-xs text-slate-400 mt-2 ml-4">Leave empty to keep current image</p>
                            </div>
                            
                            <div>
                                <label for="file_path" class="block text-slate-400 text-[10px] font-black uppercase tracking-widest mb-2 ml-4">E-Book PDF</label>
                                @if($book->file_path)
                                    <div class="mb-4 p-4 bg-slate-50 rounded-2xl">
                                        <p class="text-xs font-bold text-slate-500 mb-2">Current File:</p>
                                        <a href="{{ asset('storage/' . $book->file_path) }}" target="_blank" 
                                            class="inline-flex items-center text-blue-600 hover:text-blue-700 font-bold text-sm">
                                            <i class="fas fa-file-pdf mr-2"></i>View PDF
                                        </a>
                                    </div>
                                @endif
                                <input type="file" name="file_path" id="file_path" accept=".pdf"
                                    class="w-full bg-slate-50 border-none rounded-2xl py-4 px-6 focus:ring-2 focus:ring-pink-200 text-sm font-bold file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-bold file:bg-blue-50 file:text-blue-600 hover:file:bg-blue-100">
                                <p class="text-xs text-slate-400 mt-2 ml-4">Leave empty to keep current file</p>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex items-center justify-between pt-8 border-t border-slate-100">
                        <a href="{{ route('admin.books.index') }}" class="inline-flex items-center px-8 py-4 bg-slate-100 text-slate-600 font-bold rounded-2xl hover:bg-slate-200 transition-all">
                            <i class="fas fa-times mr-2"></i>
                            Cancel
                        </a>
                        <button type="submit" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-blue-500 to-indigo-500 text-white font-bold rounded-2xl shadow-lg shadow-blue-200 hover:shadow-xl hover:scale-105 transition-all">
                            <i class="fas fa-save mr-2"></i>
                            Update Book
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>