<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Toastr CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />

<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<!-- Select2 CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

<!-- Select2 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<style>
.select2-container--default .select2-results>.select2-results__options {
    max-height: 200px;
    overflow-y: auto;
    font-size: medium;}
    .modal-dialog {
        max-width: 500px;
        margin: 19.75rem auto;
    }
    .modal-title {
        font-size: 20px;
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
.form-control {
    padding-left: 10px !important;
    font-size: 13px;
}
.select2-container--default .select2-selection--single .select2-selection__rendered {
    font-size: 13px;
    color: #444;
    line-height: 28px;
}
.modal-footer .btn {
    font-size: 1.5rem; /* Điều chỉnh kích thước chữ (ví dụ: 1.5rem) */
}
    </style>

<div class="wg-table table-all-product">
    @php
        $products = ($config == 'index') ? $products : $getDeleted;
    @endphp

    @if ($products->isNotEmpty())
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
                {{-- <th>Mô tả</th> --}}
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $index => $item)
                <tr>
                    <td class="text-center">{{ $products->currentPage() * $products->perPage() - $products->perPage() + $index + 1 }}</td>
                    <td>
                        <div class="name">
                            <a href="#" class="body-title-2">{{ $item->name }}</a>
                        </div>
                    </td>
                    <td>
                        <div class="category">
                            <a href="#" class="body-title-2">{{ ($item->category) ? $item->category->name : 'Không có' }}</a>
                        </div>
                    </td>
                    <td>
                        <div class="brand">
                            <a href="#" class="body-title-2">{{ ($item->brand) ? $item->brand->name : 'Không có' }}</a>
                        </div>
                    </td>
                    <td>
                        <span><img class="img-fluid" src="{{ asset('uploads/products/product/' . $item->image) }}" alt=""></span>
                    </td>
                    <td>
                        {{ number_format($item->price, 0, ',', '.') }} VNĐ
                    </td>
                    <td>
                        {{ number_format($item->price_sale, 0, ',', '.') }} VNĐ
                    </td>
                    {{-- <td>
                        {{ $item->short_description }}
                    </td> --}}
                    <td class="text-center">
                        <label class="toggle">
                            <input id="toggleswitch" class="toggleswitch" name="publish" type="checkbox"
                                value="{{ $item->publish }}" data-id="{{ $item->id }}" data-model="Product"
                                {{ $item->publish == 2 ? 'checked' : '' }}
                                {{ $config == 'deleted' ? 'disabled' : '' }}>
                            <span class="roundbutton"></span>
                        </label>
                    </td>
                    <td>
                        <div class="list-icon-function">
                            @if ($config == 'deleted')
                                <a href="{{ route('product.restore', $item->id) }}" title="Khôi phục">
                                    <div class="item edit">
                                        <i class="fa-solid fa-retweet"></i>
                                    </div>
                                </a>
                                <form class="form-delete" action="{{ route('product.forceDelete', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-delete item text-danger delete" title="Xóa"
                                    data-text2=""
                                    data-text="Bạn không thể khôi phục dữ liệu sau khi xóa!">
                                        <i class="icon-trash-2"></i>
                                    </button>
                                </form>
                            @else
                                <a href="{{ route('product.edit', $item->id) }}" title="Chỉnh sửa">
                                    <div class="item edit">
                                        <i class="icon-edit-3"></i>
                                    </div>  
                                </a>
                                <form class="form-delete" action="{{ route('product.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-delete item text-danger delete" title="Xóa"
                                        data-text2=""
                                        data-text="Bạn có thể khôi phục dữ liệu lại sau khi xóa.">
                                            <i class="icon-trash-2"></i>
                                        </button>
                                    </form>
                            @endif
                        </div>
                    </td>
                </tr>

            @endforeach
        </tbody>
    </table>
    @else
        <div class="not-search text-center">
            <i class="fa-solid fa-circle-exclamation"></i>
            <h3>Không tìm thấy {{ request('keyword') ? '"'.request('keyword').'"' : '' }}</h3>
        </div>
    @endif
</div>

<nav aria-label="Page navigation example">
    <ul class="pagination d-flex justify-content-center my-3">
        {{ $products->appends(request()->all())->links() }}
    </ul>
</nav>

<script>




</script>

