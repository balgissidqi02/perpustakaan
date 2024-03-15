<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublisherController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/publishers', [PublisherController::class, 'index'])->name('publishers.index')->middleware('auth');

Route::get('/publishers/create', [PublisherController::class, 'create'])->name('publishers.create');

Route::post('/publishers', [PublisherController::class, 'store'])->name('publishers.store');

Route::get('/publishers/{id}/edit', [PublisherController::class, 'edit'])->name('publishers.edit');

Route::put('/publishers/{id}', [PublisherController::class, 'update'])->name('publishers.update');

Route::delete('/publishers/{id}', [PublisherController::class, 'destroy'])->name('publishers.destroy');



Route::get('/authors', [AuthorController::class, 'index'])->name('authors.index')->middleware('auth');

Route::get('/authors/create', [AuthorController::class, 'create'])->name('authors.create');

Route::post('/authors', [AuthorController::class, 'store'])->name('authors.store');

Route::get('/authors/{id}/edit', [AuthorController::class, 'edit'])->name('authors.edit');

Route::put('/authors/{id}', [AuthorController::class, 'update'])->name('authors.update');

Route::delete('/authors/{id}', [AuthorController::class, 'destroy'])->name('authors.destroy');



Route::get('/books', [BookController::class, 'index'])->name('books.index')->middleware('auth');

Route::get('/books/create', [BookController::class, 'create'])->name('books.create');

Route::post('/books', [BookController::class, 'store'])->name('books.store');

Route::get('/books/{id}/edit', [BookController::class, 'edit'])->name('books.edit');

Route::put('/books/{id}', [BookController::class, 'update'])->name('books.update');

Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('books.destroy');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
