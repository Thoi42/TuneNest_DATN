@extends('admin.layout.layout')
@section('title', 'Thêm Mã Giảm Giá')
@section('main')
    <div class="main-content-inner">
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>@yield('title')</h3>
                <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                    <li>
                        <a href="{{ route('dashboard.index') }}">
                            <div class="text-tiny">Dashboard</div>
                        </a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <div class="text-tiny">@yield('title')</div>
                    </li>
                </ul>
            </div>

            <div class="main-content-wrap">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('admin.discounts.store') }}" method="POST">
                    @csrf
                    <div class="wg-box">
                        <div class="form-group">
                            <label for="code">Mã Giảm Giá</label>
                            <input type="text" name="code" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="discount_rate">Tỷ Lệ Giảm Giá (%)</label>
                            <input type="number" name="discount_rate" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="max_value">Giá Trị Giảm Tối Đa</label>
                            <input type="number" name="max_value" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="start_date">Ngày Bắt Đầu</label>
                            <input type="date" name="start_date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="end_date">Ngày Kết Thúc</label>
                            <input type="date" name="end_date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="use_limit">Giới Hạn Sử Dụng</label>
                            <input type="number" name="use_limit" class="form-control">
                        </div>
                        </div>
                            <button class="tf-button w-full" type="submit">Thêm</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection