<div class="wg-table table-all-user">
@php
$showrooms = ($config == 'index') ? $dsbanner : $getDeleted;
@endphp

@if ($showrooms->isNotEmpty())
    <table style="table-layout: auto;" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>STT</th>
                <th>Ảnh</th>
                <th>Vị Trí</th>
                <th>Trang</th>
                <th>Tiêu đề</th> <!-- Cột mới -->
                <th>Tiêu đề In Đậm</th> <!-- Cột mới -->
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($dsbanner as $index => $item)
<tr>
    <td>{{ $index + 1 }}</td>
    <td>
        <span><img src="{{ asset($item->image) }}" alt="" style="width: 100px; height: 70px;"></span> 
    </td>
    <td>
    @switch($item->order)
    @case(1)
        banner 1
        @break
    @case(2)
        banner 2
        @break
    @default
        banner 3
@endswitch

    </td>
    <td>
    {{ $item->position == 1 ? 'Trang Chủ' : 'Cửa Hàng' }}
</td>

    <td>
        {{ $item->title }} <!-- Hiển thị tiêu đề -->
    </td>
    <td>
        {{ $item->strong_title }} <!-- Hiển thị tiêu đề mạnh -->
    </td>
    <td class="text-center">
        <form action="{{ route('banner.togglePublish', $item->id) }}" method="POST" class="d-inline">
            @csrf
            @method('POST')
            <label class="toggle">
                <input class="toggleswitch" name="publish" type="checkbox"
                    value="{{ $item->publish }}" data-id="{{ $item->id }}"
                    {{ $item->publish == 2 ? 'checked' : '' }}
                    {{ $config == 'deleted' ? 'disabled' : '' }} 
                    onchange="this.form.submit()"> <!-- Tự động submit form khi checkbox thay đổi -->
                <span class="roundbutton"></span>
            </label>
        </form>
    </td>
    <td>
        <div class="list-icon-function">
            @if ($config == 'deleted')
                <a href="{{ route('banner.restore', $item->id) }}" title="Khôi phục">
                    <div class="item edit">
                        <i class="fa-solid fa-retweet"></i>
                    </div>
                </a>
                <form class="form-delete" action="{{ route('banner.forceDelete', $item->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-delete item text-danger delete" title="Xóa" 
                    data-text="Bạn không thể khôi phục dữ liệu sau khi xóa!">
                        <i class="icon-trash-2"></i>
                    </button>
                </form>
            @else
                <a href="{{ route('banner.edit', $item->id) }}" title="Chỉnh sửa">
                    <div class="item edit">
                        <i class="icon-edit-3"></i>
                    </div>  
                </a>
                <form class="form-delete" action="{{ route('banner.destroy', $item->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-delete-banner item text-danger delete" title="Xóa" data-publish="{{$item->publish}}"
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
