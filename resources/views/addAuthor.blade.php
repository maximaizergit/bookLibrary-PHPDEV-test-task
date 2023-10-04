@extends('layout')

@section('content')
    <div class="container">
        <h1>Add new author to our base!</h1>
        <form id="addAuthorForm" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="fname">First name</label>
                <input type="text" class="form-control" id="fname" name="fname" required>
            </div>
            <div class="form-group">
                <label for="lname">Last name</label>
                <input type="text" class="form-control" id="lname" name="lname" required>
            </div>

            <div class="form-group">
                <label for="image">Photo</label>
                <input type="file" class="form-control-file" id="image" name="image" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Author</button>
        </form>
    </div>
    <input type="hidden" id="addAuthorUrl" data-url="{{ route('add-author.index') }}">
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('storage/js/addAuthor.js') }}"></script>




