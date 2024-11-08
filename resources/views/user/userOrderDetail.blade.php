@extends('user.layouts.app')

@section('content')
    <style type="text/css" media="print">
        @media print {

            .tf-button,
            .wg-box:last-child {
                display: none !important;
            }

            body {
                font-size: 12pt;
            }

            .table {
                border-collapse: collapse;
                width: 100%;
            }

            .table th,
            .table td {
                border: 1px solid #ddd;
                padding: 8px;
                text-align: left;
            }
        }
        .bg-success {
            background-color: #40c710 !important;
        }

        .bg-danger {
            background-color: #f44032 !important;
        }

        .bg-warning {
            background-color: #f5d700 !important;
            color: #000;
        }
        .btn-primary {
            background-color: #6a6e51 !important;
            border-color: #6a6e51 !important;
        }
    </style>
    <main class="pt-90" style="padding-top: 0px;">
        <div class="mb-4 pb-4"></div>
        <section class="my-account container">
            <h2 class="page-title">Chi tiết đơn hàng #{{ $order->id }}</h2>
            <div class="row">
                <div class="col-lg-2">
                    <ul class="account-nav">
                        @include('user.layouts.component.sidebarUser')
                    </ul>
                </div>

                <div class="col-lg-10">
                    <div class="wg-box mt-5 mb-5">
                        <div class="row mb-2">
                            <div class="col-6">
                                <h5>Sản phẩm đơn hàng</h5>
                            </div>
                            <div class="col-6 text-right">
                                <a class="btn btn-sm btn-danger" href="{{ route('customer.orders') }}">Quay lại</a>
                                <button class="btn btn-sm btn-primary" onclick="printOrder()">In đơn hàng</button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-transaction">
                                <thead>
                                    <tr>
                                        <th class="text-center">Mã sản phẩm</th>
                                        <th>Tên sản phẩm</th>
                                        <th class="text-center">Giá</th>
                                        <th class="text-center">Số lượng</th>
                                        <th class="text-center">Thương hiệu</th>
                                        <th class="text-center">Danh mục</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->orderDetails as $orderDetail)
                                        <tr>
                                            <td class="text-center">#{{ $orderDetail->product->id }}</td>
                                            <td class="pname">
                                                <div class="image">
                                                    <img src="{{ asset('uploads/products/product/' .$orderDetail->product->image) }}" alt="" class="image">
                                                </div>
                                                <div class="name">
                                                    <a href="#" target="_blank" class="body-title-2">{{ $orderDetail->product->name }}</a>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                @if ($orderDetail->product->price_sale)
                                                    {{ number_format($orderDetail->product->price_sale) }} VNĐ
                                                @else
                                                    {{ number_format($orderDetail->product->price) }} VNĐ
                                                @endif
                                            </td>
                                            <td class="text-center">{{ $orderDetail->quantity }}</td>
                                            <td class="text-center">{{ $orderDetail->product->brand->name ?? 'N/A' }}</td>
                                            <td class="text-center">{{ $orderDetail->product->productCategory->name ?? 'N/A' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @if ($order->discount_id)
                        <div class="wg-box mt-5">
                            <h5>Mã giảm giá</h5>
                            <div class="my-account__address-item col-md-6">
                                <div class="my-account__address-item__detail">
                                    <p>{{ $order->discount->code }}</p>
                                    <br>
                                    <p>Số tiền được giảm: {{ $order->discount->value }}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="wg-box mt-5">
                        <h5>Địa chỉ giao hàng</h5>
                        <div class="my-account__address-item col-md-6">
                            <div class="my-account__address-item__detail">
                                <p>{{ $order->address }}</p>
                                <br>
                                <p>{{ $order->customer->name }}</p>
                                <br>
                                <p>Số điện thoại: {{ $order->customer->phone }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="wg-box mt-5">
                        <h5>Thanh toán</h5>
                        <table class="table table-striped table-bordered table-transaction">
                            <tbody>
                                <tr>
                                    <th>Tổng tiền</th>
                                    <td>{{ number_format($order->total) }}VNĐ</td>
                                    <th>Mã giảm giá</th>
                                    <td>{{ $order->discount->code ?? 'N/A' }}</td>
                                    <th>Giảm giá</th>
                                    <td>{{ $order->discount->value ?? 'N/A' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="wg-box mt-5 text-right">
                        @if ($order->status =='chờ duyệt')
                            <form action="{{ route('customer.orders.cancel', $order->id) }}" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" autocomplete="off">
                                <input type="hidden" name="order_id" value="{{ $order->id }}">
                                <button type="submit" class="btn bg-danger">Hủy đơn hàng</button>
                            </form>
                        @else
                            <a href="{{ route('customer.orders') }}" class="btn btn-primary">Quay lại</a>
                        @endif
                    </div>
                </div>

            </div>
        </section>
    </main>
@endsection

@section('script')
    <script>
        function printOrder() {
            window.print();
        }
    </script>
@endsection
