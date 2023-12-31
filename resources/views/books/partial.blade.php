<h1>List of Books</h1>
<div class="row">
    @foreach($books as $book)
        <div class="col-md-4" style="height: 500px; width: 400px">
            <div class="card" style="height: 100%">
                <img src="{{ asset('storage/' . $book->image) }}" class="card-img-top" alt="{{ $book->title }} " style="max-height: 300px">
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
