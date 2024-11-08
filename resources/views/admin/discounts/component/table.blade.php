<div class="wg-table table-all-discount">
    
    @php
        $discounts = ($config == 'index') ? $discounts : $getDelete;
    @endphp

    @if ($discounts->isNotEmpty())
    <table style="table-layout: auto;" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Code</th>
                <th width="100px">Tỷ Lệ Giảm Giá (%)</th>
                <th>Giá Trị Giảm Tối Đa</th>
                <th>Ngày Bắt Đầu</th>
                <th>Ngày Kết Thúc</th>
                <th>Ngày Tạo</th>
                <th>Ngày Cập Nhật</th>
                <th>Giá Trị Đơn Hàng Tối Thiểu</th>
                <th>Tổng Tối Thiểu</th>
                <th>Trạng Thái</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($discounts as $index => $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>
                        <div class="name">
                            <a href="#" class="body-title-2">{{ $item->code }}</a>
                        </div>
                    </td>
                    <td>{{ $item->discount_rate }}</td>
                    <td>{{ $item->max_value }}</td>
                    <td>{{ $item->start_date }}</td>
                    <td>{{ $item->end_date }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->updated_at }}</td>
                    <td>{{ $item->minimum_order_value }}</td>
                    <td>{{ $item->minimum_total_value }}</td>
                    <td class="text-center">
                        <label class="toggle">
                            <input id="toggleswitch" class="toggleswitch" name="publish" type="checkbox"
                                value="{{ $item->publish }}" data-id="{{ $item->id }}" data-model="Brand"
                                {{ $item->publish == 2 ? 'checked' : '' }}
                                {{ $config == 'deleted' ? 'disabled' : '' }}>
                            <span class="roundbutton"></span>
                        </label>
                    </td>
                    <td class="text-center">
                        <div class="list-icon-function">
                            @if ($config == 'deleted')
                                <a href="{{ route('discount.restore', $item->id) }}" title="Khôi phục">
                                    <div class="item edit">
                                        <i class="fa-solid fa-retweet"></i>
                                    </div>
                                </a>
                                <form class="form-delete" action="{{ route('discount.forceDelete', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-delete item text-danger delete" title="Xóa" 
                                    data-text="Bạn không thể khôi phục dữ liệu sau khi xóa!">
                                        <i class="icon-trash-2"></i>
                                    </button>
                                </form>
                            @else
                                <a href="{{ route('admin.discounts.edit', $item->id) }}" title="Chỉnh sửa">
                                    <div class="item edit">
                                        <i class="icon-edit-3"></i>
                                    </div>  
                                </a>
                                <form class="form-delete" action="{{ route('admin.discounts.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-delete item text-danger delete" title="Xóa"
                                    data-text="Bạn có thể khôi phục dữ liệu lại sau khi xóa."
                                    data-text2="{{ ($item->parent_id == 0) ? 'Bạn có thể xóa tất cả danh mục liên quan đến danh mục hiện tại!' : '' }}">
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
        {{ $discounts->appends(request()->all())->links() }}
    </ul>
</nav>
