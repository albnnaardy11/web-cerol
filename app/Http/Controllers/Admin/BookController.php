<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $books = Book::with('category')
            ->when($request->search, function ($query, $search) {
                return $query->where('title', 'like', "%{$search}%")
                    ->orWhere('author', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10);

        return view('admin.books.index', compact('books'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.books.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'file_path' => 'nullable|mimes:pdf|max:10000',
        ]);

        $data = $request->except(['image', 'file_path']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('books/images', 'public');
        }

        if ($request->hasFile('file_path')) {
            $data['file_path'] = $request->file('file_path')->store('books/files', 'public');
        }

        Book::create($data);

        return redirect()->route('admin.books.index')->with('success', 'Book created successfully.');
    }

    public function edit(Book $book)
    {
        $categories = Category::all();
        return view('admin.books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'file_path' => 'nullable|mimes:pdf|max:10000',
        ]);

        $data = $request->except(['image', 'file_path']);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($book->image) {
                Storage::disk('public')->delete($book->image);
            }
            $data['image'] = $request->file('image')->store('books/images', 'public');
        }

        if ($request->hasFile('file_path')) {
            // Delete old file if exists
            if ($book->file_path) {
                Storage::disk('public')->delete($book->file_path);
            }
            $data['file_path'] = $request->file('file_path')->store('books/files', 'public');
        }

        $book->update($data);

        return redirect()->route('admin.books.index')->with('success', 'Book updated successfully.');
    }

    public function destroy(Book $book)
    {
        if ($book->image) {
            Storage::disk('public')->delete($book->image);
        }
        if ($book->file_path) {
            Storage::disk('public')->delete($book->file_path);
        }

        $book->delete();
        return redirect()->route('admin.books.index')->with('success', 'Book deleted successfully.');
    }
}
