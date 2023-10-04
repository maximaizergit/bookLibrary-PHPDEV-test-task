<h1>List of Books</h1>
<div class="row">
    @foreach($books as $book)
        <div class="col-md-4">
            <div class="card">
                <img src="{{ $book->image }}" class="card-img-top" alt="{{ $book->title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $book->title }}</h5>
                    <p class="card-text">Author: {{ $book->author->first_name }} {{ $book->author->last_name }}</p>
                    <button class="btn btn-primary float-right order-btn" data-book-id="{{ $book->id }}" data-book-title="{{ $book->title }}">Order</button>
                </div>
            </div>
        </div>
    @endforeach
    @include('modals/order-modal')
</div>
<div class="pagination justify-content-center mt-5 mb-5 text-center">
    {{ $books->links() }}
</div>
