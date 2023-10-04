<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class AddAuthorController extends Controller
{
    public function index(Request $request)
    {
        return view('addAuthor');
    }
    public function store(Request $request)
    {
        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $request->file('image')->store('public/uploads');
        $imagePathForDB = str_replace('public/', '', $imagePath);
        $author = new Author([
            'first_name' => $request->input('fname'),
            'last_name' => $request->input('lname'),
            'photo' => $imagePathForDB,
        ]);
        $author->save();

        return redirect('/authors')->with('success', 'Author added successfully.');
    }
}
