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



