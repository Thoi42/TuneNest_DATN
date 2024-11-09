<!-- Thêm thư viện Leaflet -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

<style>
    .table-bordered>:not(caption)>*>* {
    height: 100px;
    border-width: inherit;
    line-height: 32px;
    font-size: 14px;
    border: 1px solid #e1e1e1;
    vertical-align: middle;
}
.map-container {
    width: 100% !important;  /* Chiều rộng của bản đồ */
    height: 100px !important;  /* Chiều cao của bản đồ */
    max-width: 200px !important; /* Giới hạn chiều rộng tối đa của bản đồ */
    margin: 0 auto;  /* Căn giữa bản đồ */
}

</style>
<div class="wg-table table-all-user">
    @php
    $showrooms = ($config == 'index') ? $dsshowroom : $getDeleted;
    @endphp

    @if ($showrooms->isNotEmpty())
    <table style="table-layout: auto;" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên</th>
                <th>Ảnh</th>
                <th>Địa Chỉ</th>
                <th>Số Điện Thoại</th>
                <th>Trạng thái</th>
                <th>Vị trí</th> <!-- Thêm cột cho bản đồ -->
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dsshowroom as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>
                    <div class="name">
                        <a href="#" class="body-title-2">{{ $item->name }}</a>
                    </div>
                </td>
                <td>
                    <span><img src="{{ asset($item->image) }}" alt="{{ $item->name }}" style="width: 100px; height: 70px;"></span>
                </td>
                <td>{{ $item->address }}</td>
                <td>{{ $item->phone }}</td>
                <td class="text-center">
                    <label class="toggle">
                        <input id="toggleswitch" class="toggleswitch" name="publish" type="checkbox"
                            value="{{ $item->publish }}" data-id="{{ $item->id }}" data-model="Showroom"
                            {{ $item->publish == 2 ? 'checked' : '' }}
                            {{ $config == 'deleted' ? 'disabled' : '' }}>
                        <span class="roundbutton"></span>
                    </label>
                </td>
                <td>
    @if($item->latitude && $item->longitude)
        <!-- Thêm liên kết bản đồ nhỏ -->
        <a href="https://www.openstreetmap.org/?mlat={{ $item->latitude }}&mlon={{ $item->longitude }}#map=16/{{ $item->latitude }}/{{ $item->longitude }}" target="_blank">
            <div id="map{{ $item->id }}" class="map-container" style="height: 150px; width: 100%;"></div>
        </a>
        
        <script>
            // Tạo bản đồ với Leaflet và ẩn nút zoom
            var map = L.map('map{{ $item->id }}', {
                zoomControl: false  // Tắt điều khiển zoom
            }).setView([{{ $item->latitude }}, {{ $item->longitude }}], 14);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
            L.marker([{{ $item->latitude }}, {{ $item->longitude }}]).addTo(map);
        </script>
    @else
        Chưa có vị trí
    @endif
</td>

                <td>
                    <div class="list-icon-function">
                        @if ($config == 'deleted')
                        <a href="{{ route('showroom.restore', $item->id) }}" title="Khôi phục">
                            <div class="item edit">
                                <i class="fa-solid fa-retweet"></i>
                            </div>
                        </a>
                        <form class="form-delete" action="{{ route('showroom.forceDelete', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete item text-danger delete" title="Xóa"
                                data-text="Bạn không thể khôi phục dữ liệu sau khi xóa!">
                                <i class="icon-trash-2"></i>
                            </button>
                        </form>
                        @else
                        <a href="{{ route('showroom.edit', $item->id) }}" title="Chỉnh sửa">
                            <div class="item edit">
                                <i class="icon-edit-3"></i>
                            </div>
                        </a>
                        <a href="{{route('Productshowroom.index', $item->id)}}" title="Add Product_Showroom">
                            <div class="item edit">
                                <i class="fa-regular fa-eye"></i>
                            </div>
                        </a>
                        <form class="form-delete" action="{{ route('showroom.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete-showroom item text-danger delete" title="Xóa"
                                data-text="Showroom Hiện Còn {{$item->products()->count()}} sản phẩm cần chuyển đến kho để xóa."
                                data-text2="Tiếp tục xóa bạn có thể khôi phục trong thùng rác"
                                data-has-products="{{ $item->products()->count() > 0 ? 'true' : 'false' }}"
                                data-publish="{{ $item->publish }}">
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
