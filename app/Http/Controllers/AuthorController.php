<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index(Request $request)
    {
        $itemsPerPage = $request->input('itemsPerPage', 10);
        $authors = Author::with('books')->paginate($itemsPerPage);

        if ($request->ajax()) {
            return view('author.partial', compact('authors'));
        }

        return view('authors', compact('authors'));
    }

}
