@extends('layout')

@section('content')
    <div class="container">
        <h1>Add new book to our base!</h1>
        <form id="addBookForm" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Book Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="author">Author</label>
                <select class="form-control" id="author" name="author_id" required>
                    <option value="">Select Author</option>
                    @foreach($authors as $author)
                        <option value="{{ $author->id }}">{{ $author->first_name }} {{ $author->last_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="image">Book Image</label>
                <input type="file" class="form-control-file" id="image" name="image" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Book</button>
        </form>
    </div>
    <input type="hidden" id="addBookUrl" data-url='{{ route('add-book.index') }}'>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('storage/js/addBook.js') }}"></script>




