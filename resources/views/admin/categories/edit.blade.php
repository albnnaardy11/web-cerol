<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-extrabold text-3xl text-slate-900 leading-tight tracking-tight">
                    Edit Category
                </h2>
                <p class="text-slate-500 text-sm mt-1 font-medium">Update category information</p>
            </div>
            <a href="{{ route('admin.categories.index') }}" class="inline-flex items-center px-6 py-3 bg-slate-100 text-slate-700 font-bold rounded-2xl hover:bg-slate-200 transition-all">
                <i class="fas fa-arrow-left mr-2"></i>
                Back to List
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-slate-50 via-blue-50/30 to-indigo-50/30 min-h-screen">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-[3rem] p-12 shadow-lg shadow-slate-100 border border-slate-100">
                <form action="{{ route('admin.categories.update', $category) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <!-- Icon Header -->
                    <div class="flex items-center justify-center mb-10">
                        <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-indigo-500 rounded-3xl flex items-center justify-center text-white text-3xl shadow-lg shadow-blue-200">
                            <i class="fas fa-folder-open"></i>
                        </div>
                    </div>

                    <!-- Form Fields -->
                    <div class="space-y-6 mb-10">
                        <div>
                            <label for="name" class="block text-slate-400 text-[10px] font-black uppercase tracking-widest mb-2 ml-4">Category Name *</label>
                            <input type="text" name="name" id="name" value="{{ $category->name }}" required
                                class="w-full bg-slate-50 border-none rounded-2xl py-4 px-6 focus:ring-2 focus:ring-blue-200 text-sm font-bold placeholder:text-slate-300">
                        </div>
                        
                        <div>
                            <label for="slug" class="block text-slate-400 text-[10px] font-black uppercase tracking-widest mb-2 ml-4">URL Slug *</label>
                            <input type="text" name="slug" id="slug" value="{{ $category->slug }}" required
                                class="w-full bg-slate-50 border-none rounded-2xl py-4 px-6 focus:ring-2 focus:ring-blue-200 text-sm font-bold placeholder:text-slate-300">
                            <p class="text-xs text-slate-400 mt-2 ml-4">
                                <i class="fas fa-info-circle mr-1"></i>
                                Use lowercase letters and hyphens only
                            </p>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex items-center justify-between pt-8 border-t border-slate-100">
                        <a href="{{ route('admin.categories.index') }}" class="inline-flex items-center px-8 py-4 bg-slate-100 text-slate-600 font-bold rounded-2xl hover:bg-slate-200 transition-all">
                            <i class="fas fa-times mr-2"></i>
                            Cancel
                        </a>
                        <button type="submit" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-blue-500 to-indigo-500 text-white font-bold rounded-2xl shadow-lg shadow-blue-200 hover:shadow-xl hover:scale-105 transition-all">
                            <i class="fas fa-save mr-2"></i>
                            Update Category
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>