<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'books' => \App\Models\Book::count(),
            'categories' => \App\Models\Category::count(),
            'users' => \App\Models\User::count(),
            'messages' => \App\Models\Message::count(),
        ];
        return view('admin.dashboard', compact('stats'));
    }
}
