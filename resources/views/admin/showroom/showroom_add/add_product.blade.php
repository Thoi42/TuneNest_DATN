@extends('admin.layout.layout')
@section('title', 'Chỉnh Sửa Showroom')
@section('main')
<form action="{{ route('showroom.addProduct', $showroom->id) }}" method="POST">
    @csrf

    <!-- Dropdown để chọn sản phẩm -->
    <div class="form-group">
        <label for="product_id">Select Product:</label>
        <select name="product_id" id="product_id" class="form-control" required>
            <option value="" disabled selected>Choose a product</option>
            @foreach($products as $product)
                <option value="{{ $product->id }}">{{ $product->name }}</option>
            @endforeach
        </select>
    </div>

    <!-- Nút submit -->
    <button type="submit" class="btn btn-primary">Add Product to Showroom</button>
</form>

@endsection