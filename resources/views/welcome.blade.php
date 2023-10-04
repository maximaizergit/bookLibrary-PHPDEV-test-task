@extends('layout')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Authors</h5>
                        <p class="card-text">Browse the list of authors.</p>
                        <a href="{{ route('authors.index') }}" class="btn btn-primary">Go to Authors</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Books</h5>
                        <p class="card-text">Explore our collection of books.</p>
                        <a href="{{ route('books.index') }}" class="btn btn-primary">Go to Books</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add new author</h5>
                        <p class="card-text">Add new author to our base!</p>
                        <a href="{{ route('add-author.index') }}" class="btn btn-primary">Go to adding author</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add new book</h5>
                        <p class="card-text">Fill our collection with new books!</p>
                        <a href="{{ route('add-book.index') }}" class="btn btn-primary">Go to adding book</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
