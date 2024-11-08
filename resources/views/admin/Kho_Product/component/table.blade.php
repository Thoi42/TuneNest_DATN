<style>
    /* Tăng kích thước của select */
    .selectpicker {
        height: 45px; /* Điều chỉnh chiều cao */
        font-size: 16px; /* Điều chỉnh kích thước font chữ */
    }
</style>

<div class="wg-table table-all-product">
<div style="position: relative; padding: 10px; margin-bottom: 15px;">
    <div style="display: flex; align-items: center;">
        <input type="text" id="showroomSearch" placeholder="Tìm showroom" style="margin-right: 10px; width: 300px; font-size: 16px; padding: 10px;" class="form-control">
        <button id="transferBtn" class="btn btn-outline-primary" style="font-size: 16px; padding: 10px;">Chuyển sản phẩm</button>
    </div>
    <ul id="suggestions" style="list-style-type: none; padding: 0; margin-top: 5px; border: 1px solid #ccc; display: none; background: white; font-size: 16px; width: 300px; position: absolute; z-index: 10;">
        @foreach ($showroomid as $showroom)
            <li data-id="{{ $showroom->id }}" class="suggestion-item" style="padding: 10px; cursor: pointer;">{{ $showroom->name }}</li>
        @endforeach
    </ul>
</div>




    <table style="table-layout: auto;" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Chọn</th>
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
                <td>
    <div style="display: flex; align-items: center;">
        <input type="checkbox" class="product-checkbox" data-id="{{ $item->product->id }}" style="margin-right: 5px;">
    </div>
</td>

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
                        {{ $item->product->short_description }}
                    </td>
                    <td class="text-center">
                        {{$item->stock}}
                    </td>
                    <td>
                        <div class="list-icon-function">
                            <div class="item edit" type="button" data-bs-toggle="modal" data-bs-target="#updateStockModal"
                                data-showroom-id="{{ $item->showroom->id }}" 
                                data-product-id="{{ $item->product->id }}" 
                                data-current-stock="{{ $item->stock }}" 
                                onclick="setModalData(this)">
                                <i class="icon-edit-3"></i>
                        </div>
                        <input type="number" class="form-control quantity-input" data-id="{{ $item->product->id }}" value="1" min="1" max="{{$item->stock}}" style="width: 50px;">
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Form Cập Nhật Số Lượng trong Modal -->
<div class="modal fade" id="updateStockModal" tabindex="-1" aria-labelledby="updateStockModalLabel" aria-hidden="true" data-bs-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('Productshowroom.update') }}" method="POST">
                @csrf
                <input type="hidden" name="showroom_id" id="modalShowroomId">
                <input type="hidden" name="product_id" id="modalProductId">
                
                <div class="modal-header">
                    <h5 class="modal-title" id="updateStockModalLabel">Cập Nhật Số Lượng Sản Phẩm</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="stock" class="form-label">Số Lượng</label>
                        <input type="number" name="stock" id="modalStock" class="form-control" min="0" required>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
function setModalData(element) {
    const showroomId = element.getAttribute('data-showroom-id');
    const productId = element.getAttribute('data-product-id');
    const currentStock = element.getAttribute('data-current-stock');

    document.getElementById('modalShowroomId').value = showroomId;
    document.getElementById('modalProductId').value = productId;
    document.getElementById('modalStock').value = currentStock;
}
$(document).ready(function() {
    $('#showroomSearch').on('keyup', function() {
        const searchValue = $(this).val().toLowerCase();
        $('#suggestions').empty(); // Xóa danh sách gợi ý cũ

        @foreach ($showroomid as $showroom)
            if ('{{ $showroom->name }}'.toLowerCase().includes(searchValue)) {
                $('#suggestions').append('<li data-id="{{ $showroom->id }}" class="suggestion-item" style="padding: 5px; cursor: pointer;">{{ $showroom->name }}</li>');
            }
        @endforeach

        $('#suggestions').toggle($('#suggestions li').length > 0); // Hiện/ẩn danh sách gợi ý
    });

    // Xử lý sự kiện khi click vào gợi ý
    $(document).on('click', '.suggestion-item', function() {
        const showroomId = $(this).data('id');
        $('#showroomSearch').val($(this).text()); // Đặt giá trị vào input
        $('#showroomSearch').data('showroom-id', showroomId); // Lưu ID showroom vào input
        $('#suggestions').hide(); // Ẩn danh sách gợi ý
    });

    $('#transferBtn').on('click', function() {
        const showroomId = $('#showroomSearch').data('showroom-id'); // Lấy ID showroom
        const products = [];

        $('.product-checkbox:checked').each(function() {
            const productId = $(this).data('id');
            const quantity = $(this).closest('tr').find('.quantity-input').val();

            products.push({
                id: productId,
                quantity: quantity,
            });
        });

        if (products.length === 0 || !showroomId) {
            toastr.error('Vui lòng chọn ít nhất một sản phẩm và showroom.'); // Thông báo lỗi
            return;
        }

        // Gửi yêu cầu AJAX
        $.ajax({
            url: '{{ route('transfer.product') }}',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                showroom_id: showroomId,
                products: products,
            },
            success: function(response) {
                toastr.success(response.message); // Thông báo thành công
                location.reload(); // Tải lại trang
            },
            error: function(xhr) {
                toastr.error(xhr.responseJSON.message || 'Đã xảy ra lỗi, vui lòng thử lại.'); // Thông báo lỗi
            }
        });
    });
});








</script>
