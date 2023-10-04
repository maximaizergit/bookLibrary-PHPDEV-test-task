<div>
    @extends('layout')

    @section('content')

        <div class="container">

            <h1>Books by {{ $author->first_name }} {{ $author->last_name }}</h1>
            <ul class="list-group">
                @foreach($books as $book)
                    <li class="list-group-item">
                        {{ $book->title }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endsection
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


