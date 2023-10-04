<?php

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

Route::get('/authors', 'App\Http\Controllers\AuthorController@index')->name('authors.index');

Route::get('authors/{author}/books', 'App\Http\Controllers\AuthorController@books')->name('author.books');

Route::get('/books', 'App\Http\Controllers\BookController@index')->name('books.index');

Route::get('/add-book', 'App\Http\Controllers\AddBookController@index')->name('add-book.index');

Route::post('/add-book', 'App\Http\Controllers\AddBookController@store')->name('add-book.index');

Route::get('/add-author', 'App\Http\Controllers\AddAuthorController@index')->name('add-author.index');

Route::post('/add-author', 'App\Http\Controllers\AddAuthorController@store')->name('add-author.index');

Route::post('/submit-order', 'App\Http\Controllers\OrderController@submitOrder')->name('submit.order');



