@extends('admin.layout.layout')

@section('content')
    <h1>Chỉnh sửa mã giảm giá</h1>
    <form action="{{ route('admin.discounts.update', $discount) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="code">Mã</label>
            <input type="text" name="code" id="code" value="{{ $discount->code }}" required>
        </div>
        <div>
            <label for="discount_rate">Tỷ lệ giảm giá</label>
            <input type="number" name="discount_rate" id="discount_rate" value="{{ $discount->discount_rate }}" required>
        </div>
        <div>
            <label for="max_value">Giá trị tối đa</label>
            <input type="number" name="max_value" id="max_value" value="{{ $discount->max_value }}" required>
        </div>
        <div>
            <label for="start_date">Ngày bắt đầu</label>
            <input type="date" name="start_date" id="start_date" value="{{ $discount->start_date }}" required>
        </div>
        <div>
            <label for="end_date">Ngày kết thúc</label>
            <input type="date" name="end_date" id="end_date" value="{{ $discount->end_date }}" required>
        </div>
        <button type="submit">Cập nhật</button>
    </form>
@endsection
