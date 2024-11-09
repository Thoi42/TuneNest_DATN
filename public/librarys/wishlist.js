
$(document).ready(function() {
    $('.add-to-favourites').click(function(e) {
        e.preventDefault();
        var productId = $(this).data('id');

        $.ajax({
            url: '/favourites/add/' + productId,
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                alert(response.message);
            },
            error: function(xhr) {
                alert('Có lỗi xảy ra khi thêm sản phẩm vào danh sách yêu thích.');
            }
        });
    });
});
