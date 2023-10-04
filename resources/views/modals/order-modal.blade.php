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
                <button type="button" class="btn btn-primary">Order</button>
            </div>
        </div>
    </div>
</div>

<script>
    $('.close-modal').click(function() {
        // Закрываем модальное окно после успешной обработки заказа
        $('#orderModal').modal('hide');
    });
</script>

<script>
    $(document).ready(function () {
        // Обработка нажатия кнопки "Order"
        $('.order-btn').on('click', function () {
            let bookId = $(this).data('book-id');
            let bookTitle = $(this).data('book-title'); // Получаем название книги

            let modalLabel = $('#orderModalLabel');

            // Изменяем текст заголовка модального окна
            modalLabel.text('Order Book: ' + bookTitle);

            // Открываем модальное окно
            $('#orderModal').modal('show');
        });
    });
</script>
