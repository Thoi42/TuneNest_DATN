@extends('admin.layout.layout')

@section('content')
    <h1>Mã Giảm Giá</h1>
    <a href="{{ route('admin.discounts.create') }}">Thêm Mã Giảm Giá Mới</a>
    <table>
        <thead>
            <tr>
                <th>Mã</th>
                <th>Tỷ Lệ Giảm Giá</th>
                <th>Giá Trị Tối Đa</th>
                <th>Ngày Bắt Đầu</th>
                <th>Ngày Kết Thúc</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($discounts as $discount)
                <tr>
                    <td>{{ $discount->code }}</td>
                    <td>{{ $discount->discount_rate }}</td>
                    <td>{{ $discount->max_value }}</td>
                    <td>{{ $discount->start_date }}</td>
                    <td>{{ $discount->end_date }}</td>
                    <td>
                        <a href="{{ route('admin.discounts.edit', $discount) }}">Chỉnh Sửa</a>
                        <form action="{{ route('admin.discounts.destroy', $discount) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
