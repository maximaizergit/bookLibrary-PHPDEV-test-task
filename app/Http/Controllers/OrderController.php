<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function submitOrder(Request $request)
    {

        $bookId = $request->input('bookId');
        $name = $request->input('name');
        $email = $request->input('email');

        $book = Book::findBookById($bookId);

        if (!$book) {
            return response()->json(['error' => 'Book not found'], 404);
        }

        Mail::send('emails.order', [
            'name' => $name,
            'email' => $email,
            'book_title' => $book->title,
            'author_name' => $book->author(),
            'dateTime' => now(),
        ], function($message) use ($email) {
            $message->to($email, 'Customer Name')->subject('Order Confirmation');
        });

        return response()->json(['message' => 'Order submitted successfully']);
    }

}
