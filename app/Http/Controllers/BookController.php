<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $itemsPerPage = $request->input('itemsPerPage', 10);
        $books = Book::with('author')->paginate($itemsPerPage);
        if ($request->ajax()) {

            return view('books.partial', compact('books'));
        }

        return view('books', compact('books'));
    }
}
