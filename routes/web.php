<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\RatingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function() {
    return redirect()->route('books.index');
});

Route::prefix('books')->name('books.')->group(function() {
    Route::get('', [BookController::class, 'index'])->name('index');
    Route::get('filter', [BookController::class, 'filter'])->name('filter');
});

Route::prefix('author')->name('author.')->group(function() {
    Route::get('', [AuthorController::class, 'index'])->name('index');
});

Route::prefix('rating')->name('rating.')->group(function() {
    Route::get('create', [RatingController::class, 'create'])->name('create');
    Route::post('store', [RatingController::class, 'store'])->name('store');
    Route::get('filterBooks', [RatingController::class, 'filterBooks'])->name('filterBooks');
});