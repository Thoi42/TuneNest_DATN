@extends('user.layouts.app')
@section('title', 'Giỏ Hàng')
@section('content')
    <main class="pt-90">
        @if (session('carts') && count(session('carts')) > 0)
            <section class="shop-checkout container">
                <h2 class="page-title">@yield('title')</h2>
                <div class="checkout-steps">
                    <a href="{{ route('cart.index') }}" class="checkout-steps__item active">
                        <span class="checkout-steps__item-number">01</span>
                        <span class="checkout-steps__item-title">
                            <span>GIỏ hàng</span>
                            <em>Quản lý danh sách mặt hàng của bạn</em>
                        </span>
                    </a>
                    <a href="{{ Auth::guard('customer')->user() ? route('checkout') : route('customer.login') }}" class="checkout-steps__item">
                        <span class="checkout-steps__item-number">02</span>
                        <span class="checkout-steps__item-title">
                            <span> Vận chuyển và thanh toán</span>
                            <em>Kiểm tra danh sách mặt hàng của bạn</em>
                        </span>
                    </a>
                    <a href="order-confirmation.html" class="checkout-steps__item">
                        <span class="checkout-steps__item-number">03</span>
                        <span class="checkout-steps__item-title">
                            <span>Xác nhận</span>
                            <em>Xem xét và gửi đơn đặt hàng của bạn</em>
                        </span>
                    </a>
                </div>
                <div class="shopping-cart">
                    <div class="cart-table__wrapper">
                        <table class="cart-table">
                            <thead>
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th></th>
                                    <th>giá</th>
                                    <th>Số lượng</th>
                                    <th>Đơn giá</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $item)
                                    <tr>
                                        <td>
                                            <div class="shopping-cart__product-item">
                                                <img loading="lazy"
                                                    src="{{ asset('uploads/products/product/' . $item->image) }}"
                                                    width="120" height="120" alt="" />
                                            </div>
                                        </td>
                                        <td>
                                            <div class="shopping-cart__product-item__detail">
                                                <h4>{{ $item['name'] }}</h4>
                                                <ul class="shopping-cart__product-item__options">
                                                    <li>{{ $item->productCategory->name }}</li>
                                                    <li>{{ $item->brand->name }}</li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="shopping-cart__product-price">
                                                {{ number_format($item->price_sale ?? $item->price, 0, '.', ',') . ' VNĐ' }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="qty-control position-relative">
                                                <input type="number" name="quantity[{{ $item->id }}]"
                                                    value="{{ session('carts')[$item->id]['quantity'] }}" min="1"
                                                    class="qty-control__number text-center" data-id = "{{ $item->id }}"
                                                    data-url="{{ route('cart.update.quantity', $item->id) }}"
                                                    data-price="{{ $item->price_sale ?? $item->price }}"
                                                    >
                                                <div class="qty-control__reduce">-</div>
                                                <div class="qty-control__increase">+</div>
                                            </div>
                                        </td>
                                        <td data-id="{{ $item->id }}">
                                            <span class="shopping-cart__subtotal-{{ $item->id }}">
                                                {{ number_format(session('carts')[$item->id]['quantity'] * ($item->price_sale ?? $item->price), 0, '.', ',') . ' VNĐ' }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="#" class="remove-cart" data-id="{{ $item->id }}"
                                                data-url="{{ route('cart.remove', $item->id) }}">
                                                <svg width="10" height="10" viewBox="0 0 10 10" fill="#767676"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M0.259435 8.85506L9.11449 0L10 0.885506L1.14494 9.74056L0.259435 8.85506Z" />
                                                    <path
                                                        d="M0.885506 0.0889838L9.74057 8.94404L8.85506 9.82955L0 0.97449L0.885506 0.0889838Z" />
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-4 d-flex align-items-center justify-content-between"> 
                            <a href="{{ route('home.index') }}"
                            class="btn btn-primary btn-comeback">TIẾP TỤC MUA HÀNG </a>
                            <a class="btn-clear"  data-text="Bạn có chắc xóa hết giỏ hàng." data-url="{{ route('cart.clear') }}" href="#">Xóa hết</a>
                        </div>
                    </div>
                    <div class="shopping-cart__totals-wrapper">
                        <div class="sticky-content">
                            <div class="shopping-cart__totals">
                                <h3>TỔNG GIỎ HÀNG</h3>
                                <table class="cart-totals">
                                    <tbody>
                                        <tr>
                                            <th>Tạm tính</th>
                                            <td id="subtotalAmount">{{ number_format($total, 0, '.', ',') . ' VNĐ' }}</td>
                                        </tr>
                                        {{-- <tr>
                                            <th>VAT</th>
                                            <td>$19</td>
                                        </tr> --}}
                                        <tr>
                                            <th>Mã giảm giá</th>
                                            <td>
                                                <fieldset class="coupon_code" style="width: 50%">
                                                    <div class="select">
                                                        @php
                                                            $coupon_code = session('discount_code');
                                                        @endphp
                                                        <select class="input-filter" name="coupon_code" id="coupon_code"
                                                            data-url="{{ route('cart.discount') }}">
                                                            <option value="">Mã giảm giá</option>
                                                            @foreach ($validDiscounts['validDiscounts']  as $key => $val)
                                                                <option value="{{ $val->id }}"
                                                                    {{ $coupon_code == $val->id ? 'selected' : '' }}>
                                                                    {{ $val->code }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </fieldset>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Ưu đãi thành viên</th>
                                            <td id="loyalty_rate_Amount">
                                                {{ number_format($loyaltyAmount, 0, '.', ',') . ' VNĐ' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Giảm giá</th>
                                            <td id="discountAmount">
                                                {{ number_format($discountAmount, 0, '.', ',') . ' VNĐ' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Tổng thanh toán</th>
                                            <td id="totalAmount">
                                                {{ number_format($total - $discountAmount - $loyaltyAmount, 0, '.', ',') . ' VNĐ' }}</td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                            <div class="mobile_fixed-btn_wrapper">
                                <div class="button-wrapper container">
                                    <a href="{{ Auth::guard('customer')->user() ? route('checkout') : route('customer.login') }}"
                                        class="btn btn-primary btn-checkout">TIẾN HÀNH THANH
                                        TOÁN</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="cart-null">
                        <img src="{{ asset('images/carts-null.png') }}" alt="">
                        <a class="btn-comeback" href="{{ route('home.index') }}"> Mua ngay </a>
                    </div>
        @endif
        </section>
    </main>
@endsection
