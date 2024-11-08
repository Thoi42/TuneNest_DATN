@extends('admin.layout.layout')

@section('main')
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
    </style>
    <div class="main-content-inner">
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>Chi tiết đơn hàng #{{ $order->id }}</h3>
                <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                    <li>
                        <a href="#">
                            <div class="text-tiny">Dashboard</div>
                        </a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <div class="text-tiny">Chi tiết đơn hàng #{{ $order->id }}</div>
                    </li>
                </ul>
            </div>

            <div class="wg-box">
                <div class="flex items-center justify-between gap10 flex-wrap">
                    <div class="wg-filter flex-grow">
                        <h5>Sản phẩm đơn hàng</h5>
                    </div>
                    <div>
                        <a class="tf-button style-1 w208 mr-2" href="{{ route('order.index') }}">Quay lại</a>
                        <button class="tf-button style-1 w208" onclick="printOrder()">In đơn hàng</button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
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
                                            <img src="1718066538.html" alt="" class="image">
                                        </div>
                                        <div class="name">
                                            <a href="#" target="_blank"
                                                class="body-title-2">{{ $orderDetail->product->name }}</a>
                                        </div>
                                    </td>
                                    <td class="text-center">{{ number_format($orderDetail->price) }} VNĐ</td>
                                    <td class="text-center">{{ $orderDetail->quantity }}</td>
                                    <td class="text-center">{{ $orderDetail->product->brand->name ?? 'N/A' }}</td>
                                    <td class="text-center">{{ $orderDetail->product->productCategory->summary ?? 'N/A' }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="divider"></div>
                <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">

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
                        <tr>
                            <th>Tổng tiền</th>
                            <td>
                                @if ($order->discount_id)
                                    {{ number_format($order->total - $order->discount->discount_rate) }}VNĐ
                            </td>
                        @else
                            {{ number_format($order->total) }} VNĐ
                            @endif
                            <th>Phương thức thanh toán</th>
                            <td>Tiền mặt</td>
                            <th>Trạng thái</th>
                            <td class="text-uppercase font-bold">{{ $order->status }}</td>
                        </tr>
                        <tr>
                            <th>Ngày đặt hàng</th>
                            <td>{{ $order->created_at->format('Y-m-d H:i:s') }}</td>
                            <th>Ngày giao hàng</th>
                            <td>{{ $order->delivered_at ? $order->delivered_at->format('Y-m-d H:i:s') : 'Đang giao' }}</td>
                            <th>Ngày hủy</th>
                            <td>{{ $order->canceled_at ? $order->canceled_at->format('Y-m-d H:i:s') : 'N/A' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="wg-box mt-5">
                <h5>Cập nhật trạng thái đơn hàng</h5>
                <div class="my-account__address-item col-md-6">
                    <div class="my-account__address-item__detail">
                        <form action="{{ route('order.updateStatus', $order->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-3">
                                <label for="status" class="form-label fw-bold h6">Trạng thái:</label>
                                <select name="status" id="status" class="form-select form-select-lg mt-2  fs-4 py-3">
                                    {{-- <option class="fs-4" value="chờ duyệt" {{ $order->status == 'chờ duyệt' ? 'selected' : '' }}>Chờ duyệt</option>
                                    <option class="fs-4" value="đang giao" {{ $order->status == 'đang giao' ? 'selected' : '' }}>Đang giao</option>
                                    <option class="fs-4" value="đã giao" {{ $order->status == 'đã giao' ? 'selected' : '' }}>Đã giao</option>
                                    <option class="fs-4" value="đã hủy" {{ $order->status == 'đã hủy' ? 'selected' : '' }}>Đã hủy</option> --}}
                                    @foreach ($statuses as $status)
                                        <option class="fs-4" value="{{ $status }}"
                                            {{ $order->status == $status ? 'selected' : '' }}>{{ $status }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="tf-button style-1 mt-2 h5">Cập nhật trạng thái</button>
                        </form>
                    </div>
                </div>
            </div>




        </div>
    @endsection
    @section('script')
        <script>
            function printOrder() {
                window.print();
            }
        </script>
    @endsection

