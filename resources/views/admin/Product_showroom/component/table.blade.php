<style>
    .modal-dialog {
        max-width: 500px;
        margin: 19.75rem auto;
    }
    h5, .h5 {
    font-size: 30px;
    line-height: 28px;
}
.form-select {
    font-size: 16px;
}
.form-label {
    font-size: 17px;
    margin-bottom: .5rem;
}
.modal-footer .btn {
    font-size: 1.5rem; /* Điều chỉnh kích thước chữ (ví dụ: 1.5rem) */
}

</style>
<div class="wg-table table-all-product">
    <table style="table-layout: auto;" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th class="text-center">STT</th>
                <th>Tên Sản Phẩm</th>
                <th>Danh mục</th>
                <th>Thương Hiệu</th>
                <th width="100px">Ảnh</th>
                <th>Giá</th>
                <th>Giá khuyến mãi</th>
                <th>Mô tả</th>
                <th>Số Lượng</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($product as $index => $item)
                <tr>
                    <td class="text-center">{{$index + 1 }}</td>
                    <td>
                        <div class="name">
                            <a href="#" class="body-title-2">{{ $item->product->name }}</a>
                        </div>
                    </td>
                    <td>
                        <div class="category">
                            <a href="#" class="body-title-2">{{ ($item->product->category) ? $item->product->category->name : 'Không có' }}</a>
                        </div>
                    </td>
                    <td>
                        <div class="brand">
                            <a href="#" class="body-title-2">{{ ($item->product->brand) ? $item->product->brand->name : 'Không có' }}</a>
                        </div>
                    </td>
                    <td>
                        <span><img class="img-fluid" src="{{ asset('uploads/products/product/' . $item->product->image) }}" alt=""></span>
                    </td>
                    <td>
                        {{ number_format($item->product->price, 0, ',', '.') }} VNĐ
                    </td>
                    <td>
                        {{ number_format($item->product->price_sale, 0, ',', '.') }} VNĐ
                    </td>
                    <td>
                        {{ $item->product->description }}
                    </td>
                    <td class="text-center">
                        {{$item->stock}}
                    </td>
                    <td>
                        <div class="list-icon-function">
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updateStockModal"
                                data-showroom-id="{{ $item->showroom->id }}" data-product-id="{{ $item->product->id }}"
                                data-current-stock="{{ $item->stock }}">
                                Cập Nhật Số Lượng
                            </button>
                        
                            <form action="{{ route('Productshowroom.remove') }}" method="POST">
                                @csrf
                                <input type="hidden" name="showroom_id" value="{{ $item->showroom->id }}">
                                <input type="hidden" name="product_id" value="{{ $item->product->id }}">
                                <button type="submit" class="btn btn-danger">Xóa sản phẩm</button>
                            </form>
                        
                        </div>
                    </td>
                </tr>
                <!-- Form Cập Nhật Số Lượng trong Modal -->
<div class="modal fade" id="updateStockModal" tabindex="-1" aria-labelledby="updateStockModalLabel" aria-hidden="true" data-bs-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('Productshowroom.update') }}" method="POST">
                @csrf
                <input type="hidden" name="showroom_id" value="{{ $item->showroom->id }}">
                <input type="hidden" name="product_id" value="{{ $item->product->id }}">
                
                <div class="modal-header">
                    <h5 class="modal-title" id="updateStockModalLabel">Cập Nhật Số Lượng Sản Phẩm</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="stock" class="form-label">Số Lượng</label>
                        <input type="number" name="stock" id="stock" class="form-control" min="0" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary">Cập Nhật</button>
                </div>
            </form>
        </div>
    </div>
</div>

            @endforeach
        </tbody>
    </table>
</div>


