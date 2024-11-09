(function ($) {
    "use strict";
    var HT = {};
    var _token = $('meta[name="csrf-token"]').attr('content');
    
    HT.methodPayment = () => {
        const $form = $('#checkoutForm');

        // Hàm cập nhật action của form dựa trên phương thức thanh toán được chọn
        function updateFormAction() {
            const paymentMethod = $('input[name="checkout_payment_method"]:checked').val();
            switch (paymentMethod) {
                case 'cash_on_delivery':
                    $form.attr('action', paymentUrls.cod); // Đặt lại action nếu chọn COD
                    break;
                case 'online_payment':
                    $form.attr('action', paymentUrls.vnpay); // Đặt URL đến trang VNPAY
                    break;
                // case 'momo_payment':
                //     $form.attr('action', paymentUrls.momo); // Đặt URL đến trang MoMo
                //     break;
                // case 'paypal_payment':
                //     $form.attr('action', paymentUrls.paypal); // Đặt URL đến trang PayPal
                //     break;
            }
        }

        // Gắn sự kiện change cho các phương thức thanh toán
        $('input[name="checkout_payment_method"]').on('change', updateFormAction);

    }

    $(document).ready(function () {
        // HT.methodPayment();
    });

})(jQuery);
