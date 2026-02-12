<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\PublicController;

Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/books', [PublicController::class, 'books'])->name('books');
Route::get('/education', [PublicController::class, 'education'])->name('education');
Route::get('/contact', [PublicController::class, 'contact'])->name('contact');
Route::post('/contact', [PublicController::class, 'storeMessage'])->name('contact.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\MessageController;

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('categories', CategoryController::class);
    Route::resource('books', BookController::class);
    Route::resource('users', UserController::class);
    Route::resource('messages', MessageController::class)->only(['index', 'show', 'destroy']);
});
