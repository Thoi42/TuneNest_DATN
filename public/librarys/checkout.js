(function ($) {
    "use strict";
    var HT = {};
    var _token = $('meta[name="csrf-token"]').attr('content');
    
    HT.methodPayment = () => {
         // Lắng nghe sự thay đổi của radio buttons
        $('input[name="checkout_payment_method"]').change(function () {
            var selectedMethod = $(this).val(); // Lấy giá trị của radio button được chọn
            
            // Thay đổi giá trị 'name' của button submit dựa trên phương thức thanh toán
            if (selectedMethod === 'Thanh toán VNPAY') {
                $('#checkoutButton').attr('name', 'redirect');
            } else if (selectedMethod === 'Thanh toán MoMo') {
                $('#checkoutButton').attr('name', 'payUrl');
            } else {
                $('#checkoutButton').attr('name', 'redirect'); // Mặc định cho các phương thức khác
            }
        });

    }

    $(document).ready(function () {
        HT.methodPayment();
    });

})(jQuery);
