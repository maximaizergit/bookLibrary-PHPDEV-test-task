<!-- resources/views/modals/order-modal.blade.php -->

<div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="orderModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="orderModalLabel">Order Book: </h5>
                <button type="button" class="close close-modal" data-dismiss="orderModal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter your name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-modal" data-dismiss="orderModal">Close</button>
                <button type="button" class="btn btn-primary" id="orderSubmit">Order</button>
            </div>
        </div>
    </div>
</div>

<script>
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

</script>
