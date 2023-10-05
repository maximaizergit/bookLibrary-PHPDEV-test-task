
    $('.close-modal').click(function() {
    // Закрываем модальное окно после успешной обработки заказа
    $('#orderModal').modal('hide');
});

    $(document).ready(function () {
    $('.order-btn').on('click', function () {
        let bookId = $(this).data('book-id');
        let bookTitle = $(this).data('book-title');
        let submitBtn = $('#orderSubmit');
        let modalLabel = $('#orderModalLabel');

        modalLabel.text('Order Book: ' + bookTitle);
        submitBtn.data('bookId', bookId);
        $('#orderModal').modal('show');
    });
});

    $('#orderSubmit').on('click', function() {
    let name = $('#name').val();
    let email = $('#email').val();
    let submitBtn = $('#orderSubmit');

    if (!name || !email || !isValidEmail(email)) {
    alert('Пожалуйста, заполните все поля корректно.');
    return;
}

    $.ajax({
    url: '/submit-order',
    type: 'POST',
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Получаем CSRF-токен из мета-тега
},
    data: {
    bookId: submitBtn.data('bookId'),
    name: name,
    email: email
},
    success: function(response) {
    $('#orderModal').modal('hide');
    alert("Ваш заказ обработан! Пожалуйста, проверьте почту");
},
    error: function(xhr, status, error) {

}
});
});

    function isValidEmail(email) {
    let emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    return emailPattern.test(email);
}

