$(document).ready(function() {
    var booksUrl = $('#booksUrl').data('url');
    $('#items-per-page').change(function() {
        let selectedValue = $(this).val();

        $.ajax({
            url: booksUrl,
            type: 'GET',
            data: { itemsPerPage: selectedValue },
            success: function(response) {
                $('#books-list').html(response);
                console.log($('#books-list'));
            }
        });
    });

    $(document).on('click', '.pagination a', function(e) {
        e.preventDefault();
        let page = $(this).attr('href').split('page=')[1];
        let itemsPerPage = $('#items-per-page').val();

        $.ajax({
            url: booksUrl,
            type: 'GET',
            data: { page: page, itemsPerPage: itemsPerPage },
            success: function(response) {
                $('#books-list').html(response);
                console.log($('#books-list'));
            }
        });
    });
});
