@extends('admin.layout.layout')

@section('content')
    <h1>Create Discount Code</h1>
    <form action="{{ route('admin.discounts.store') }}" method="POST">
        @csrf
        <div>
            <label for="code">Code</label>
            <input type="text" name="code" id="code" required>
        </div>
        <div>
            <label for="discount_rate">Tỷ lệ triết khấu</label>
            <input type="number" name="discount_rate" id="discount_rate" required>
        </div>
        <div>
            <label for="max_value">Giảm lớn nhất:</label>
            <input type="number" name="max_value" id="max_value" required>
        </div>
        <div>
            <label for="start_date">Ngày bắt đầu:</label>
            <input type="date" name="start_date" id="start_date" required>
        </div>
        <div>
            <label for="end_date">End Date</label>
            <input type="date" name="end_date" id="end_date" required>
        </div>
        <button type="submit">Create</button>
    </form>
@endsection

