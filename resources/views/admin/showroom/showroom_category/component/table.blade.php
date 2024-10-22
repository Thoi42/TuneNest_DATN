<div class="wg-table table-all-user">
    <table style="table-layout: auto;" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên</th>
                <th>Ảnh</th>
                <th>Địa Chỉ</th>
                <th>Số Điện Thoại</th>
                <th>Trạng thái</th>
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
                    <span><img src="{{ asset($item->image) }}" alt="{{ $item->name }}"
                            style="width: 100px; height: 70px;"></span>
                </td>
                <td>
                    {{ $item->address }}
                </td>
                <td>
                    {{ $item->phone }}
                </td>
                <td>
                    <label class="toggle">
                        <input id="toggleswitch" class="toggleswitch" name="publish" type="checkbox"
                            value="{{ $item->publish }}" data-id="{{ $item->id }}" data-model="Showroom" {{
                            $item->publish == 1 ? 'checked' : '' }}>
                        <span class="roundbutton"></span>
                    </label>
                </td>
                <td>
                    <div class="list-icon-function">
                        <a href="{{ route('showroom.edit', $item->id) }}">
                            <div class="item edit">
                                <i class="icon-edit-3"></i>
                            </div>
                        </a>
                        <form action="{{ route('showroom.togglePublish', $item->id) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('PUT')
                            <button type="submit">
                                <div class="item text-danger delete">
                                    <i class="icon-trash-2"></i>
                                </div>
                            </button>
                        </form>
                    </div>
                </td>

            </tr>
            @endforeach


        </tbody>
    </table>
</div>