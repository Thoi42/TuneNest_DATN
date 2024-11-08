@extends('admin.layout.layout')
@section('title', 'Dashboard')
@section('main')
<div class="main-content-inner">

    <div class="main-content-wrap">
        <div class="tf-section-2 mb-30">
            <div class="flex gap20 flex-wrap-mobile">
                <div class="w-half">

                    <div class="wg-chart-default mb-20">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="icon-shopping-bag"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Tổng số đơn hàng</div>
                                    <h4>{{ $countOrder }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="wg-chart-default mb-20">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="icon-dollar-sign"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Tổng số tiền</div>
                                    <h4>{{ number_format($totalOrder) }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="wg-chart-default mb-20">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="icon-shopping-bag"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Đơn hàng chờ duyệt</div>
                                    <h4>{{ $countPending }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="wg-chart-default">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="icon-dollar-sign"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Tổng tiền đơn hàng chờ duyệt</div>
                                    <h4>{{ number_format($totalPending) }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="w-half">

                    <div class="wg-chart-default mb-20">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="icon-shopping-bag"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Đơn hàng đã giao</div>
                                    <h4>{{ $countDelivered }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="wg-chart-default mb-20">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="icon-dollar-sign"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Tổng tiền đơn hàng đã giao</div>
                                    <h4>{{ number_format($totalDelivered) }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="wg-chart-default mb-20">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="icon-shopping-bag"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Đơn hàng đã hủy</div>
                                    <h4>{{ $countCanceled }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="wg-chart-default">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="icon-dollar-sign"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Tổng tiền đơn hàng đã hủy</div>
                                    <h4>{{ number_format($totalCanceled) }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div class="wg-box">
                <div class="flex items-center justify-between">
                    <h5>Biểu đồ doanh thu</h5>
                   
                </div>
                <div class="flex flex-wrap gap40">
                    <div>
                        <div class="mb-2">
                            <div class="block-legend">
                                <div class="dot t1"></div>
                                <div class="text-tiny">Doanh thu</div>
                            </div>
                        </div>
                        <div class="flex items-center gap10">
                            <h4>{{ number_format($totalOrder) }}</h4>
                            {{-- <div class="box-icon-trending up">
                                <i class="icon-trending-up"></i>
                                <div class="body-title number">0.56%</div>
                            </div> --}}
                        </div>
                    </div>
                    <div>
                        <div class="mb-2">
                            <div class="block-legend">
                                <div class="dot t2"></div>
                                <div class="text-tiny">Đơn hàng đã giao</div>
                            </div>
                        </div>
                        <div class="flex items-center gap10">
                            <h4>{{ number_format($totalDelivered) }}</h4>
                            {{-- <div class="box-icon-trending up">
                                <i class="icon-trending-up"></i>
                                <div class="body-title number">0.56%</div>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div id="line-chart-8"></div>
            </div>

        </div>
        <div class="tf-section mb-30">

            <div class="wg-box">
                <div class="flex items-center justify-between">
                    <h5>Các đơn hàng mới</h5>
                    <div class="dropdown default">
                        <a class="btn btn-secondary dropdown-toggle" href="{{ route('order.index') }}">
                            <span class="view-all">Xem tất cả</span>
                        </a>
                    </div>
                </div>
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
            </div>

        </div>
    </div>

</div>

@endsection

@section('css')
@endsection
@section('script')
    <script src="{{ asset('js/apexcharts/apexcharts.js') }}"></script>

    <!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.log('WebSocket is not supported');
        console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>
<script>
    (function ($) {

        var tfLineChart = (function () {

            var chartBar = function () {

                var options = {
                    series: [{
                        name: 'Tổng doanh thu',
                        data: [{{ $monthlyRevenue[1] ?? 0 }}, {{ $monthlyRevenue[2] ?? 0 }}, {{ $monthlyRevenue[3] ?? 0 }}, {{ $monthlyRevenue[4] ?? 0 }}, {{ $monthlyRevenue[5] ?? 0 }}, {{ $monthlyRevenue[6] ?? 0 }}, {{ $monthlyRevenue[7] ?? 0 }}, {{ $monthlyRevenue[8] ?? 0 }}, {{ $monthlyRevenue[9] ?? 0 }}, {{ $monthlyRevenue[10] ?? 0 }}, {{ $monthlyRevenue[11] ?? 0 }}, {{ $monthlyRevenue[12] ?? 0 }}]
                    }, {
                        name: 'Đơn hàng chờ duyệt',
                        data: [{{ $monthlyPending[1] ?? 0 }}, {{ $monthlyPending[2] ?? 0 }}, {{ $monthlyPending[3] ?? 0 }}, {{ $monthlyPending[4] ?? 0 }}, {{ $monthlyPending[5] ?? 0 }}, {{ $monthlyPending[6] ?? 0 }}, {{ $monthlyPending[7] ?? 0 }}, {{ $monthlyPending[8] ?? 0 }}, {{ $monthlyPending[9] ?? 0 }}, {{ $monthlyPending[10] ?? 0 }}, {{ $monthlyPending[11] ?? 0 }}, {{ $monthlyPending[12] ?? 0 }}]
                    },
                    {
                        name: 'Đơn hàng đã giao',
                        data: [{{ $monthlyDelivered[1] ?? 0 }}, {{ $monthlyDelivered[2] ?? 0 }}, {{ $monthlyDelivered[3] ?? 0 }}, {{ $monthlyDelivered[4] ?? 0 }}, {{ $monthlyDelivered[5] ?? 0 }}, {{ $monthlyDelivered[6] ?? 0 }}, {{ $monthlyDelivered[7] ?? 0 }}, {{ $monthlyDelivered[8] ?? 0 }}, {{ $monthlyDelivered[9] ?? 0 }}, {{ $monthlyDelivered[10] ?? 0 }}, {{ $monthlyDelivered[11] ?? 0 }}, {{ $monthlyDelivered[12] ?? 0 }}]
                    }, {
                        name: 'Đơn hàng đã hủy',
                        data: [{{ $monthlyCanceled[1] ?? 0 }}, {{ $monthlyCanceled[2] ?? 0 }}, {{ $monthlyCanceled[3] ?? 0 }}, {{ $monthlyCanceled[4] ?? 0 }}, {{ $monthlyCanceled[5] ?? 0 }}, {{ $monthlyCanceled[6] ?? 0 }}, {{ $monthlyCanceled[7] ?? 0 }}, {{ $monthlyCanceled[8] ?? 0 }}, {{ $monthlyCanceled[9] ?? 0 }}, {{ $monthlyCanceled[10] ?? 0 }}, {{ $monthlyCanceled[11] ?? 0 }}, {{ $monthlyCanceled[12] ?? 0 }}]
                    }],
                    chart: {
                        type: 'bar',
                        height: 325,
                        toolbar: {
                            show: false,
                        },
                    },
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            columnWidth: '10px',
                            endingShape: 'rounded'
                        },
                    },
                    dataLabels: {
                        enabled: false
                    },
                    legend: {
                        show: false,
                    },
                    colors: ['#2377FC', '#FFA500', '#078407', '#FF0000'],
                    stroke: {
                        show: false,
                    },
                    xaxis: {
                        labels: {
                            style: {
                                colors: '#212529',
                            },
                        },
                        categories: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
                    },
                    yaxis: {
                        show: false,
                    },
                    fill: {
                        opacity: 1
                    },
                    tooltip: {
                        y: {
                            formatter: function (val) {
                                return new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(val);
                            }
                        }
                    }
                };

                chart = new ApexCharts(
                    document.querySelector("#line-chart-8"),
                    options
                );
                if ($("#line-chart-8").length > 0) {
                    chart.render();
                }
            };

            /* Function ============ */
            return {
                init: function () { },

                load: function () {
                    chartBar();
                },
                resize: function () { },
            };
        })();

        jQuery(document).ready(function () { });

        jQuery(window).on("load", function () {
            tfLineChart.load();
        });

        jQuery(window).on("resize", function () { });
    })(jQuery);
</script>
@endsection
