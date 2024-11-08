@extends('user.layouts.app')
@section('content')
<style>
  .table> :not(caption)>tr>th {
    padding: 0.625rem 1.5rem .625rem !important;
    background-color: #6a6e51 !important;
  }

  .table>tr>td {
    padding: 0.625rem 1.5rem .625rem !important;
  }

  .table-bordered> :not(caption)>tr>th,
  .table-bordered> :not(caption)>tr>td {
    border-width: 1px 1px;
    border-color: #6a6e51;
  }

  .table> :not(caption)>tr>td {
    padding: .8rem 1rem !important;
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
</style>
    <main class="pt-90">
        <div class="mb-4 pb-4"></div>
        <section class="my-account container">
            <h2 class="page-title">Thông tin tài khoản</h2>
            <div class="row">
                <div class="col-lg-3">
                    <ul class="account-nav">
                        @include('user.layouts.component.sidebarUser')
                    </ul>
                </div>
                <div class="col-lg-9">
                    <div class="page-content my-account__dashboard">
                        <p>Xin chào <strong>{{ $customer->name }}</strong> </p>
                        <p>Thành viên <strong>{{ $loyalty->level_name}} </strong></p>
                        <p>Từ trang quản lý tài khoản của bạn, bạn có thể xem các <a class="unerline-link"
                                href="account_orders.html">đơn hàng gần đây</a>, quản lý các <a class="unerline-link"
                                href="account_edit_address.html">địa chỉ giao hàng</a>, và <a class="unerline-link"
                                href="account_edit.html">chỉnh sửa mật khẩu và thông tin tài khoản</a>.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>


@endsection
