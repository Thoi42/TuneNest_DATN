@extends('user.layouts.app')
@section('title', 'Thanh toán')
@section('content')
<main class="pt-90">
    <div class="mb-4 pb-4"></div>
    <section class="shop-checkout container">
      <h2 class="page-title">Thanh Toán</h2>
      <div class="checkout-steps">
        <a href="{{ route('cart.index') }}" class="checkout-steps__item active">
          <span class="checkout-steps__item-number">01</span>
          <span class="checkout-steps__item-title">
            <span>GIỏ hàng</span>
            <em>Quản lý danh sách mặt hàng của bạn</em>
          </span>
        </a>
        <a href="{{ route('checkout') }}" class="checkout-steps__item active">
          <span class="checkout-steps__item-number">02</span>
          <span class="checkout-steps__item-title">
            <span> Vận chuyển và thanh toán</span>
            <em>Kiểm tra danh sách mặt hàng của bạn</em>
          </span>
        </a>
        <a href="" class="checkout-steps__item">
          <span class="checkout-steps__item-number">03</span>
          <span class="checkout-steps__item-title">
            <span>Xác nhận</span>
                            <em>Xem xét và gửi đơn đặt hàng của bạn</em>
          </span>
        </a>
      </div>
      <form id="checkoutForm" name="checkout-form" method="POST" action="{{ route('checkout.online') }}" data-url="{{ route('checkout.online') }}">
        @csrf
        <div class="checkout-form">
          <div class="billing-info__wrapper">
            <div class="row">
              <div class="col-6">
                <h4>CHI TIẾT VẬN CHUYỂN</h4>
              </div>
              <div class="col-6">
              </div>
            </div>

            <div class="row mt-5">
              <div class="col-md-6">
                <div class="form-floating my-3">
                  <input type="text" class="form-control" value="{{ $customer->name }}" name="name" required="">
                  <label for="name">Họ và tên *</label>
                  <span class="text-danger"></span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating my-3">
                  <input type="text" class="form-control" value="{{ $customer->phone }}" name="phone" required="">
                  <label for="phone">Số điện thoại *</label>
                  <span class="text-danger"></span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating my-3">
                  <input type="text" class="form-control" value="{{ $customer->address }}" name="address" required="">
                  <label for="address">Địa chỉ *</label>
                  <span class="text-danger"></span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating my-3">
                  <input type="text" class="form-control" value="{{ $customer->email }}"  name="email" required="">
                  <label for="email">Email *</label>
                  <span class="text-danger"></span>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-floating my-3">
                  <textarea style="height: 300px" class="form-control" name="customer_note" required=""> </textarea>
                  <label for="customer_note">Ghi chú</label>
                  <span class="text-danger"></span>
                </div>
              </div>
            </div>
          </div>
          <div class="checkout__totals-wrapper">
            <div class="sticky-content">
              <div class="checkout__totals">
                <h3>Đơn Hàng Của Bạn</h3>
                <table class="checkout-cart-items">
                  <thead>
                    <tr>
                      <th>SẢN PHẨM</th>
                      <th align="right">ĐƠN GIÁ</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($products as $item)
                      <tr>
                        <td>
                          <img width="50px" src="{{ asset('uploads/products/product/' . $item->image) }}" alt="">
                          {{ $item->name 
                          . ' x '
                          . session('carts')[$item->id]['quantity']
                        
                        }}  
                        </td>
                        <td align="right">
                          {{ number_format(($item->price_sale ?? $item->price) * session('carts')[$item->id]['quantity'], 0, '.', ',') . ' VNĐ'}}
                        </td>
                      </tr>
                    @endforeach 
                  </tbody>
                </table>
                <table class="checkout-totals">
                  <tbody>
                    <tr>
                      <th>TẠM TÍNH</th>
                      <td align="right">{{ number_format($subtotal , 0, '.', ',') . ' VNĐ'}}</td>
                    </tr>
                    <tr>
                      <th>GIẢM GIÁ</th>
                      <td id="discountAmount" align="right">
                          {{ number_format($discountAmount, 0, '.', ',') . ' VNĐ' }}</td>
                    </tr>
                    <tr>
                      <th>ƯU ĐÃI THÀNH VIÊN</th>
                      <td id="discountAmount" align="right">
                          {{ number_format($loyaltyAmount, 0, '.', ',') . ' VNĐ' }}</td>
                    </tr>
                    {{-- <tr>
                      <th>VAT</th>
                      <td align="right">$19</td>
                    </tr> --}}
                    <tr>
                      <th>TỔNG THANH TOÁN</th>
                      <td id="totalAmount" align="right">
                          {{ number_format($subtotal - $discountAmount - $loyaltyAmount, 0, '.', ',') . ' VNĐ' }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
                <div class="checkout__payment-methods">
                  <div class="form-check">
                    <input class="form-check-input form-check-input_fill" type="radio" name="checkout_payment_method"
                      id="checkout_payment_method_cod" value="Thanh toán khi nhận hàng" checked>
                    <label class="form-check-label" for="checkout_payment_method_cod">
                      Thanh toán khi giao hàng
                      {{-- <p class="option-detail">
                        Thanh toán khi nhận hàng. Vui lòng kiểm tra hàng trước khi nhận
                      </p> --}}
                    </label>
                  </div>
                  <div class="form-check">
                    <div class="method-online">
                      <input class="form-check-input form-check-input_fill" type="radio" name="checkout_payment_method"
                        id="checkout_payment_method_vnpay" value="Thanh toán VNPAY" >
                      <label class="form-check-label" for="checkout_payment_method_vnpay">
                        Thanh toán VNPAY
                      </label>
                        <div class="logo-method">
                          <img src="{{ asset('images/vnpay.jpg') }}" alt="">
                        </div>
                    </div>
                   
                    
                  </div>
                  <div class="form-check">
                    <div class="method-online">
                      <input class="form-check-input form-check-input_fill" type="radio" name="checkout_payment_method"
                        id="checkout_payment_method_momo" value="Thanh toán MoMo">
                      <label class="form-check-label" for="checkout_payment_method_momo">
                        Thanh toán MoMo
                      </label>
                      <div class="logo-method">
                        <img src="{{ asset('images/momo.png') }}" alt="">
                      </div>
                    </div>
                  </div>
                  <div class="policy-text">
                    Dữ liệu cá nhân của bạn sẽ được sử dụng để xử lý đơn đặt hàng của bạn, hỗ trợ trải nghiệm của bạn trong suốt quá trình này
                    trang web và cho các mục đích khác được mô tả trong <a href="terms.html" target="_blank">sự riêng tư
                      chính sách</a>.
                  </div>
                </div>
              
              <button id="checkoutButton" type="submit" class="btn btn-primary btn-checkout">ĐẶT HÀNG</button>
              <script>

              </script>
            </div>
          </div>
        </div>
      </form>
      {{-- <form action="{{ route('checkout.vnpay') }}" method="POST">
        @csrf
        <button type="submit" name="redirect" class="btn btn-primary">Thanh toán VNPAY</button>
      </form> --}}
    </section>
  </main>

@endsection
