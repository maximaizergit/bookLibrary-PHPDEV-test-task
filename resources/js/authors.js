$(document).ready(function() {
    var authorUrl = $('#authorUrl').data('url');
    $('#items-per-page').change(function() {
        let selectedValue = $(this).val();

        $.ajax({
            url: authorUrl,
            type: 'GET',
            data: { itemsPerPage: selectedValue },
            success: function(response) {
                $('#authors-list').html(response);
                console.log($('#authors-list'));
            }
        });
    });

    $(document).on('click', '.pagination a', function(e) {
        e.preventDefault();
        let page = $(this).attr('href').split('page=')[1];
        let itemsPerPage = $('#items-per-page').val();

        $.ajax({
            url: authorUrl,
            type: 'GET',
            data: { page: page, itemsPerPage: itemsPerPage },
            success: function(response) {
                $('#authors-list').html(response);
                console.log($('#authors-list'));
            }
        });
    });
});
