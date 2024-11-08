@extends('admin.layout.layout')

@section('main')
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Đơn hàng</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li>
                    <a href="{{ route('dashboard.index') }}">
                        <div class="text-tiny">Bảng điều khiển</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <div class="text-tiny">Đơn hàng</div>
                </li>
            </ul>
        </div>

        <div class="wg-box">
            
            <div class="wg-table table-all-user">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th style="width:70px">Mã đơn hàng</th>
                                <th class="text-center">Tên khách hàng</th>
                                <th class="text-center">Tổng tiền hàng</th>
                                <th class="text-center">Trạng thái</th>
                                <th class="text-center">Ngày đặt hàng</th>
                                <th class="text-center">Số lượng sản phẩm</th>
                                <th class="text-center">Ngày giao hàng</th>
                                <th class="text-center">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td class="text-center">#{{ $order->id }}</td>
                                <td class="text-center">{{ $order->customer->name }}</td>
                                <td class="text-center">{{ $order->discount ? number_format($order->total - $order->discount->discount_rate) : number_format($order->total) }} VND</td>
                                <td class="text-center text-uppercase">{{ $order->status }}</td>
                                <td class="text-center">{{ $order->created_at->format('Y-m-d H:i:s') }}</td>
                                <td class="text-center">{{ $order->orderDetails->sum('quantity') }}</td>
                                <td class="text-center text-uppercase">{{ $order->delivered_at ? $order->delivered_at->format('Y-m-d H:i:s') : $order->status }}</td>
                                <td class="text-center">
                                    <a href="{{ route('order.show', $order->id) }}">
                                        <div class="list-icon-function view-icon">
                                            <div class="item eye">
                                                <i class="icon-eye"></i>
                                            </div>
                                        </div>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="divider"></div>
            <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
                {{ $orders->links() }}
            </div>
        </div>
    </div>
@endsection

