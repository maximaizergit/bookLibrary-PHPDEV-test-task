$(document).ready(function () {
    $('#addBookForm').submit(function (e) {
        e.preventDefault();
        var addBookUrl = $('#addBookUrl').data('url');
        var formData = new FormData(this);

        // Выполняем AJAX-запрос на сервер
        $.ajax({
            type: 'POST',
            url: addBookUrl,
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                alert('Author added successfully!');
                $('#addAuthorForm')[0].reset();
            },
            error: function (xhr, status, error) {
                alert('Error: ' + xhr.responseText);
            }
        });
    });
});
