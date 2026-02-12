<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book;
use App\Models\Category;
use App\Models\Message;

class PublicController extends Controller
{
    public function home()
    {
        $featuredBooks = Book::with('category')->latest()->take(4)->get();
        return view('public.home', compact('featuredBooks'));
    }

    public function books(Request $request)
    {
        $categorySlug = $request->category;

        $books = Book::with('category')
            ->when($request->search, function ($query, $search) {
                return $query->where('title', 'like', "%{$search}%")
                    ->orWhere('author', 'like', "%{$search}%");
            })
            ->when($categorySlug, function ($query, $slug) {
                return $query->whereHas('category', function ($q) use ($slug) {
                    $q->where('slug', $slug);
                });
            })
            ->latest()
            ->paginate(12);

        $categories = Category::all();

        return view('public.books', compact('books', 'categories', 'categorySlug'));
    }

    public function education()
    {
        return view('public.education');
    }

    public function contact()
    {
        return view('public.contact');
    }

    public function storeMessage(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Message::create($request->all());

        return redirect()->route('contact')->with('success', 'Your message has been sent successfully!');
    }
}
