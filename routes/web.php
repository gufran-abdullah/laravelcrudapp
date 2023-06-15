<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookRecord;

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

Route::get('/', [BookRecord::class, 'index'])->name('index');
Route::get('/add-book', [BookRecord::class, 'addBook'])->name('addBook');
Route::post('/book-store', [BookRecord::class, 'storeBook'])->name('storeBook');
Route::get('/edit-book/{id}', [BookRecord::class, 'editBook'])->name('editBook');
Route::put('/book-update/{id}', [BookRecord::class, 'updateBook'])->name('updateBook');
Route::get('/book-delete/{id}', [BookRecord::class, 'deleteBook'])->name('deleteBook');


