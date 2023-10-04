<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{

    public function books(Author $author)
    {
        $books = $author->books;

        return view('author.books', compact('author', 'books'));
    }

    public function index(Request $request)
    {
        $itemsPerPage = $request->input('itemsPerPage', 10); // Значение по умолчанию: 10 записей на странице
        $authors = Author::with('books')->paginate($itemsPerPage);

        if ($request->ajax()) {
            return view('author.partial', compact('authors')); // Создайте частичное представление для списка авторов
        }

        return view('authors', compact('authors')); // Представление для обычного запроса
    }

}
