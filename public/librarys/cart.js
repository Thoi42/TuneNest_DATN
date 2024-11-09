
(function ($) {
    "use strict";
    var HT = {};
    var _token = $('meta[name="csrf-token"]').attr('content');
    
    HT.addToCart = () => {
        $('.add-to-cart').on('click', function(event){
            event.preventDefault();
            let _this = $(this);
            let urlCart = _this.data('url');
            let quantity = $('#quantity').val();
            $.ajax({
                type: 'POST',
                url: urlCart,
                dataType: 'json',
                data: {
                    quantity: quantity,
                    _token: _token, // Lấy CSRF token
                },
                success: function(data){
                    toastr.success(data.message);
                    // Cập nhật số lượng giỏ hàng
                    $('.js-cart-items-count').text(data.cartCount);
                },
                error: function(){
                    let errorMsg = jqXHR.responseJSON && jqXHR.responseJSON.error ? jqXHR.responseJSON.error : 'Đã có lỗi xảy ra, vui lòng thử lại.';
                    toastr.error(errorMsg);
                }
            });
        })
    }
    
    HT.removeCart = () => {
        $('.remove-cart').on('click', function(event){
            event.preventDefault();
            let _this = $(this);
            let urlCart = _this.data('url');
            let product_id = _this.data('id'); // Lấy ID sản phẩm từ thuộc tính data-id
    
            $.ajax({
                type: 'POST',
                url: urlCart, // Sử dụng đường dẫn tương đối
                data: {
                    _token: _token, // Lấy CSRF token
                },
                success: function(data){
                    toastr.success(data.message);
                    $('.js-cart-items-count').text(data.cartCount);
                    $('#subtotalAmount').text(data.subtotal + ' VNĐ');
                    $('#discountAmount').text(data.discountAmount.toLocaleString() + ' VNĐ')
                    $('#totalAmount').text(data.total.toLocaleString() + ' VNĐ')
                    // Xóa sản phẩm khỏi bảng
                    _this.closest('tr').remove();
                    if (data.cartCount === 0) {
                        // Cập nhật nội dung hiển thị giỏ hàng trống
                        $('.shop-checkout').html(` <div class="cart-null">
                            <img src="/images/carts-null.png" alt="">
                            <a class="btn-comeback btn-comeback-pst" href="{{ route('home.index') }}"> Mua ngay </a>
                            </div>`);
                        }
                    HT.ValidateDiscount(data.validDiscounts);
                     // Kiểm tra nếu mã giảm giá không còn hợp lệ
                    if (data.discountInvalid) {
                        toastr.warning('Mã giảm giá không còn hợp lệ và đã được xóa.');
                        $('#discountAmount').text(0 + ' VNĐ'); // Xóa mã giảm giá trong select
                        $('#coupon_code').val(''); // Xóa mã giảm giá trong ô input
                    }
                    else if (data.sessionDiscount !== null && data.sessionDiscount !== '') {
                        $('#coupon_code').val(data.sessionDiscount); // Cập nhật mã giảm giá từ session
                    }
                },
                error: function(jqXHR) {
                    let errorMsg = jqXHR.responseJSON && jqXHR.responseJSON.error ? jqXHR.responseJSON.error : 'Đã có lỗi xảy ra, vui lòng thử lại.';
                    toastr.error(errorMsg);
                }
            });
        });
    }

    HT.applyDiscount = () => {
        $('#coupon_code').on('change', function () {
            var couponCode = $(this).val();
            var url = $(this).data('url');
    
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    coupon_code: couponCode,
                    _token: _token // Đảm bảo _token đã được định nghĩa
                },
                success: function (data) {
                    if (data.message) {
                        toastr.success(data.message);
                    }
                    // Cập nhật các giá trị hiển thị
                    $('#discountAmount').text(data.discountAmount.toLocaleString() + ' VNĐ'); // Cập nhật giảm giá
                    $('#totalAmount').text(data.total.toLocaleString() + ' VNĐ'); // Cập nhật tổng
                },
                error: function (xhr) {
                    toastr.error(xhr.responseJSON.message || 'Có lỗi xảy ra.');
                }
            });
        });
    }
    

    HT.changeQuantity = () => {
        $('.qty-control__number').on('change', function() {
            HT.change_quantity($(this))
        })
        $('.qty-control__reduce').on('click', function(){
            var input = $(this).closest('tr').find('.qty-control__number');
            HT.change_quantity(input)
        })
        $('.qty-control__increase').on('click', function(){
            var input = $(this).closest('tr').find('.qty-control__number');
            HT.change_quantity(input)
        })
    }
    HT.change_quantity = (input) => {
        var productId = input.data('id'); // Lấy ID sản phẩm
        var quantity = input.val(); // Lấy số lượng từ input
        var url = input.data('url')

        $.ajax({
            type: 'POST',
            url: url, // Cập nhật đường dẫn tương ứng
            data: {
                _token: _token,
                product_id: productId, // Gửi ID sản phẩm
                quantity: quantity // Gửi số lượng mới
            },
            success: function(response) {
                if (response.success) {
                    $('#subtotalAmount').text(response.subtotal + ' VNĐ');
                    $('#totalAmount').text(response.total + ' VNĐ');
                    $('#discountAmount').text(response.discountAmount.toLocaleString() + ' VNĐ')
                    $(`.shopping-cart__subtotal-${productId}`).text(response.productTotal + ' VNĐ'); 

                    // Gọi hàm kiểm tra điều kiện mã giảm giá
                    HT.ValidateDiscount(response.validDiscounts);

                    // Kiểm tra nếu mã giảm giá không còn hợp lệ
                    if (response.discountInvalid) {
                        toastr.warning('Mã giảm giá không còn hợp lệ và đã được xóa.');
                        $('#discountAmount').text(0 + ' VNĐ'); // Xóa mã giảm giá trong select
                        $('#coupon_code').val(''); // Xóa mã giảm giá trong ô input
                    }
                    else if (response.sessionDiscount !== null && response.sessionDiscount !== '') {
                        $('#coupon_code').val(response.sessionDiscount); // Cập nhật mã giảm giá từ session
                    }
                    

                }
            },
            error: function(xhr, status, error) {
                toastr.error('Có lỗi xảy ra, vui lòng thử lại.');
            }
        });
    }

    HT.ValidateDiscount = (validDiscounts) => {
        let select = $('#coupon_code');
        select.empty(); // Xóa các option hiện tại
    
        // Thêm option mặc định
        select.append('<option value="">Mã giảm giá</option>');
    
        // Thêm các mã giảm giá đủ điều kiện
        validDiscounts.forEach(function(discount) {
            select.append(`<option value="${discount.id}">${discount.code}</option>`);
        });
    }
    

    $(document).ready(function () {
        HT.addToCart();
        HT.removeCart();
        HT.applyDiscount();
        HT.changeQuantity()

    });

})(jQuery);
