<div class="wg-table table-all-user">
    @php
        $posts = ($config == 'index') ? $posts : $getDeleted
    @endphp

    @if ($posts->isNotEmpty())
    <table style="table-layout: auto;" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th class="text-center">STT</th>
                <th width="100px !important">Ảnh</th>
                <th>Tiêu đề</th>
                <th>Danh mục</th>
                <th>Ngày tạo</th>
                <th>Người tạo</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
                @foreach ($posts as $index => $item)
                    <tr>
                        <td class="text-center">{{ $posts->currentPage() * $posts->perPage() - $posts->perPage() + $index + 1 }}
                        </td>
                        <td width="100px !important">
                            <span><img class="img-fluid" src="{{ asset('uploads/posts/posts/' . $item->image ) }}" alt=""></span>
                        </td>
                        <td>
                            <div class="name">
                                <a href="#" class="body-title-2">{{ $item->title }}</a>
                            </div>
                        </td>
                        <td>
                            <div class="">
                                <a href="#" class="body-title-2">{{ $item->postCategory->name ?? 'Không' }}</a>
                            </div>
                        </td>
                        <td>
                            {{ date('d/m/Y', strtotime($item->created_at)) }}
                        </td>
                        <td>
                            {{ $item->users->name }}
                        </td>
                        <td class="text-center">
                            <label class="toggle">
                                <input id="toggleswitch" class="toggleswitch" name="publish" type="checkbox"
                                    value="{{ $item->publish }}" data-id="{{ $item->id }}" data-model="Post"
                                    {{ $item->publish == 2 ? 'checked' : '' }}
                                    {{ $config == 'deleted' ? 'disabled' : '' }}
                                    >
                                <span class="roundbutton"></span>
                            </label>
                        </td>
                        <td>
                            <div class="list-icon-function">
                                @if ($config == 'deleted')
                                    <a href="{{ route('post.restore', $item->id)}}" title="Khôi phục">
                                        <div class="item edit">
                                            <i class="fa-solid fa-retweet"></i>
                                        </div>
                                    </a>
                                    <form class="form-delete" action="{{ route('post.forceDelete', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-delete item text-danger delete" title="Xóa"
                                        data-text2="" 
                                        data-text="Bạn không thể khôi phục dữ liệu sau khi xóa!">
                                            <i class="icon-trash-2"></i>
                                        </button>
                                    </form>
                                @else
                                    <a href="{{ route('post.edit', $item->slug)}}" title="Chỉnh sửa">
                                        <div class="item edit">
                                            <i class="icon-edit-3"></i>
                                        </div>  
                                    </a>
                                    <form class="form-delete" action="{{ route('post.destroy', $item->id) }}" method="POST">
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
            <h3>Không tìm thấy  {{ request('keyword') ? '"'.request('keyword').'"' : ''}} </h3>
        </div>
    @endif
</div>
<nav aria-label="Page navigation example">
    <ul class="pagination d-flex justify-content-center my-3">
        {{ $posts->appends(request()->all())->links() }}
    </ul>
</nav>