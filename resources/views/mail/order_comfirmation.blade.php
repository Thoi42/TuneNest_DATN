<div style="font-family: Arial, sans-serif; background-color: #ffffff; color: #333; padding: 20px;">
    <div style="max-width: 600px; margin: 0 auto; border: 1px solid rgb(185, 161, 107); border-radius: 10px; padding: 20px; background-color: #f9f9f9;">
        <h1>Xin chào {{ $order->name }}</h1>
        <h2>Xác nhận đơn hàng TuneNest</h2>
        <h4>Bạn vừa có 1 đơn hàng từ shop TuneNest, xin kiểm tra lại đơn hàng và xác nhận!</h4>
        <h4>Chi tiết đơn hàng của bạn, Mã đơn hàng #{{$order->id}}</h4>
        <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <tr>
                <th style="border: 1px solid #ccc; padding: 10px; text-align: left; background-color: rgb(185, 161, 107); color: #fff;">STT</th>
                <th style="border: 1px solid #ccc; padding: 10px; text-align: left; background-color: rgb(185, 161, 107); color: #fff;">Ảnh</th>
                <th style="border: 1px solid #ccc; padding: 10px; text-align: left; background-color: rgb(185, 161, 107); color: #fff;">Tên</th>
                <th style="border: 1px solid #ccc; padding: 10px; text-align: left; background-color: rgb(185, 161, 107); color: #fff;">Số lượng</th>
                <th style="border: 1px solid #ccc; padding: 10px; text-align: left; background-color: rgb(185, 161, 107); color: #fff;">Đơn giá</th>
            </tr>
            @foreach ($order->orderDetails as $detail)
            <tr>
                <td style="border: 1px solid #ccc; padding: 10px;">{{$loop->index + 1}}</td>
                <td style="border: 1px solid #ccc; padding: 10px;"><img width="50px" src="{{ asset('uploads/products/product/' .$detail->product->image) }}" alt=""></td>
                <td style="border: 1px solid #ccc; padding: 10px;">{{$detail->product->name}}</td>
                <td style="border: 1px solid #ccc; padding: 10px;">{{$detail->quantity}}</td>
                <td style="border: 1px solid #ccc; padding: 10px;">{{ number_format($detail->quantity * $detail->price, 0, '.', ',') }} VNĐ</td>
            </tr>
            @endforeach
            <tr>
                <th colspan="4" style="border: 1px solid #ccc; padding: 10px; font-weight: bold; background-color: #f9f9f9;">Tổng thành tiền</th>
                <td style="border: 1px solid #ccc; padding: 10px;">{{ number_format($order->total, 0, '.', ',') }} VNĐ</td>
            </tr>
        </table>
        
        <p>
            <a href="{{ route('checkout.verify', $token) }}" style="display: inline-block; margin-top: 20px; padding: 10px 20px; background-color: rgb(185, 161, 107); color: white; text-decoration: none; border-radius: 5px;">Xác nhận đơn hàng</a>
        </p>
    </div>
</div>
