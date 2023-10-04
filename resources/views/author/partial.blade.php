<h1>List of Authors</h1>
<ul class="list-group">
    @foreach($authors as $author)
        <li class="list-group-item">
            <img src="{{ asset('storage/' . $author->photo) }}" class="card-img-top" alt="{{ $author->first_name }} " style="max-height: 300px; max-width: 400px">
            <h2>{{ $author->first_name }} {{ $author->last_name }}</h2>
            @if ($author->books->count() > 0)
                <ul>
                    @foreach($author->books as $book)
                        <li>
                            {{ $book->title }}
                            <button class="btn btn-primary float-right order-btn" data-book-id="{{ $book->id }}" data-book-title="{{ $book->title }}">Order</button>
                        </li>
                    @endforeach
                </ul>
            @endif
        </li>
    @endforeach
        @include('modals/order-modal')
</ul>
<div class="pagination justify-content-center mt-5 mb-5 text-center">
    {{ $authors->links() }}
</div>
