@extends('admin.layout.layout')

@section('main')
<div class="container">
    <h1>Cập Nhật Mã Giảm Giá</h1>
    <form action="{{ route('discount.update', $discount->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="code">Mã Giảm Giá</label>
            <input type="text" name="code" class="form-control" value="{{ $discount->code }}" required>
        </div>
        <div class="form-group">
            <label for="discount_rate">Tỷ Lệ Giảm Giá (%)</label>
            <input type="number" name="discount_rate" class="form-control" value="{{ $discount->discount_rate }}" required>
        </div>
        <div class="form-group">
            <label for="max_value">Giá Trị Giảm Tối Đa</label>
            <input type="number" name="max_value" class="form-control" value="{{ $discount->max_value }}" required>
        </div>
        <div class="form-group">
            <label for="start_date">Ngày Bắt Đầu</label>
            <input type="date" name="start_date" class="form-control" value="{{ $discount->start_date }}" required>
        </div>
        <div class="form-group">
            <label for="end_date">Ngày Kết Thúc</label>
            <input type="date" name="end_date" class="form-control" value="{{ $discount->end_date }}" required>
        </div>
        <div class="form-group">
            <label for="use _limit">Giới Hạn Sử Dụng</label>
            <input type="number" name="use_limit" class="form-control" value="{{ $discount->use_limit }}">
        </div>
        <div class="form-group">
            <label for="status">Trạng Thái</label>
            <select name="status" class="form-control" required>
                <option value="active" {{ $discount->status == 'active' ? 'selected' : '' }}>Kích hoạt</option>
                <option value="inactive" {{ $discount->status == 'inactive' ? 'selected' : '' }}>Không kích hoạt</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Cập Nhật</button>
    </form>
</div>
@endsection