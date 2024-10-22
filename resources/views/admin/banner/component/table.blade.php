<div class="wg-table table-all-user">
    <table style="table-layout: auto;" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>STT</th>
                <th>Ảnh</th>
                <th>Order</th>
                <th>Position</th>
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
        {{ $item->order }}
    </td>
    <td>
        {{ $item->position }}
    </td>
    <td>
        {{ $item->publish == 1 ? 'Đang hoạt động' : 'Ngừng hoạt động' }} <!-- Hiển thị trạng thái -->
    </td>
    <td>
        <div class="list-icon-function">
            <a href="{{ route('showroom.edit', $item->id) }}">
                <div class="item edit">
                    <i class="icon-edit-3"></i>
                </div>
            </a>
            <form action="{{ route('showroom.togglePublish', $item->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn {{ $item->publish ? 'btn-success' : 'btn-danger' }}">
                                    {{ $item->publish ? 'Deactivate' : 'Activate' }}
                                </button>
                            </form>
        </div>
    </td>
</tr>
@endforeach

            

        </tbody>
    </table>
</div>