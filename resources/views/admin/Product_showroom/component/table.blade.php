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
            @if ($product->isNotEmpty())  <!-- Kiểm tra xem có sản phẩm nào không -->
                @foreach ($product as $index => $item)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
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
                            {{ $item->product->short_description }}
                        </td>
                        <td class="text-center">
                            {{ $item->stock }}
                        </td>
                        <td>
                        <div class="list-icon-function">
                        
<form action="{{ route('Productshowroom.remove', ['showroomId' => $item->showroom->id]) }}" method="POST">
    @csrf
    <input type="hidden" name="product_id" value="{{ $item->product->id }}">
    <button type="submit" class="btn btn-delete-product item text-danger delete" data-text2=" Muốn Chuyển Sản Phẩm Về Kho Tổng ?"
    data-text=""><i class="icon-trash-2"></i></button>
</form>

                        
                        </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="10" class="text-center">Không tìm thấy sản phẩm nào.</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>

<!-- Form để chuyển tất cả sản phẩm -->
<form class="form-transfer-all" action="{{ route('showroom.transferAll', $showroom->id) }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-delete-product text-success" title="Chuyển tất cả sản phẩm" data-text2=" Muốn Chuyển Sản Phẩm Về Kho Tổng ?"
    data-text="">
        Chuyển tất cả sản phẩm
    </button>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>