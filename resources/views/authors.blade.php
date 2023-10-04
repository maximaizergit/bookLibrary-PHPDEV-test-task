@extends('layout')

@section('content')
    <label for="items-per-page">Число записей</label>
    <select id="items-per-page">
        <option value="10">10 записей</option>
        <option value="20">20 записей</option>
        <option value="30">30 записей</option>
    </select>
    <div class="container" id="authors-list">
        <h1>List of Authors</h1>
        <ul class="list-group">
            @foreach($authors as $author)
                <li class="list-group-item">
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

    </div>
    <script>
        $(document).ready(function() {
            // Обработчик изменения количества записей
            $('#items-per-page').change(function() {
                let selectedValue = $(this).val();

                // Выполняем AJAX-запрос на сервер для получения новых данных
                $.ajax({
                    url: '{{ route('authors.index') }}', // Замените на свой маршрут
                    type: 'GET',
                    data: { itemsPerPage: selectedValue },
                    success: function(response) {
                        // Обновляем контент на странице
                        $('#authors-list').html(response);
                        console.log($('#authors-list'));
                    }
                });
            });

            // Обновляем ссылки на другие страницы при их нажатии
            $(document).on('click', '.pagination a', function(e) {
                e.preventDefault();
                let page = $(this).attr('href').split('page=')[1];
                let itemsPerPage = $('#items-per-page').val();

                $.ajax({
                    url: '{{ route('authors.index') }}', // Замените на свой маршрут
                    type: 'GET',
                    data: { page: page, itemsPerPage: itemsPerPage },
                    success: function(response) {
                        $('#authors-list').html(response);
                        console.log($('#authors-list'));
                    }
                });
            });
        });
    </script>





@endsection
