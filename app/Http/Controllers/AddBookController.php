<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class AddBookController extends Controller
{
    public function index(Request $request)
    {
        $authors = Author::with('books')->get();
        return view('addBooks', compact('authors'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author_id' => 'required|exists:authors,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $request->file('image')->store('public/uploads');
        $imagePathForDB = str_replace('public/', '', $imagePath);
        $book = new Book([
            'title' => $request->input('title'),
            'author_id' => $request->input('author_id'),
            'image' => $imagePathForDB,
        ]);
        $book->save();

        return redirect('/books')->with('success', 'Book added successfully.');
    }
}
