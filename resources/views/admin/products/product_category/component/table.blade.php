<div class="wg-table table-all-user">

    @php
        $categories = $config == 'index' ? $productCategories : $getDeleted;
    @endphp

    @if ($categories->isNotEmpty())
        <table style="table-layout: auto;" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th class="text-center">STT</th>
                    <th>Danh mục Cha</th>
                    <th>Tiêu đề</th>
                    <th width="100px">Ảnh</th>
                    <th>Mô tả</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $index => $item)
                    <tr>
                        <td class="text-center">
                            {{ $categories->currentPage() * $categories->perPage() - $categories->perPage() + $index + 1 }}
                        </td>
                        <td>
                            <div class="parent_id">
                                <a href="#"
                                    class="body-title-2">{{ $item->parent ? $item->parent->name : 'Không' }}</a>
                            </div>
                        </td>
                        <td>
                            <div class="name">
                                <a href="#" class="body-title-2">{{ $item->name }}</a>
                            </div>
                        </td>
                        <td>
                            <span><img class="img-fluid"
                                    src="{{ asset('uploads/products/product_categories/' . $item->image) }}"
                                    alt=""></span>
                        </td>
                        <td>
                            {{ $item->description }}
                        </td>
                        <td class="text-center">
                            <label class="toggle">
                                <input id="toggleswitch" class="toggleswitch" name="publish" type="checkbox"
                                    value="{{ $item->publish }}" data-id="{{ $item->id }}"
                                    data-model="ProductCategory" {{ $item->publish == 2 ? 'checked' : '' }}
                                    {{ $config == 'deleted' ? 'disabled' : '' }}>
                                <span class="roundbutton"></span>
                            </label>
                        </td>
                        <td>
                            <div class="list-icon-function">
                                @if ($config == 'deleted')
                                    <a href="{{ route('productCategory.restore', $item->id) }}" title="Khôi phục">
                                        <div class="item edit">
                                            <i class="fa-solid fa-retweet"></i>
                                        </div>
                                    </a>
                                    <form class="form-delete"
                                        action="{{ route('productCategory.forceDelete', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-delete item text-danger delete"
                                            title="Xóa" data-text="Bạn không thể khôi phục dữ liệu sau khi xóa!"
                                            data-text2="">
                                            <i class="icon-trash-2"></i>
                                        </button>
                                    </form>
                                @else
                                    <a href="{{ route('productCategory.edit', $item->id) }}" title="Chỉnh sửa">
                                        <div class="item edit">
                                            <i class="icon-edit-3"></i>
                                        </div>
                                    </a>
                                    <form class="form-delete"
                                        action="{{ route('productCategory.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-delete item text-danger delete"
                                            title="Xóa" 
                                            data-text="Bạn có thể khôi phục dữ liệu lại sau khi xóa."   
                                            data-text2="{{ $item->parent_id == 0 ? 'Không thể xóa danh mục vì có danh mục liên quan!' : '' }}"
                                            data-text3="{{ $item->products()->count() > 0 ? 'Không thể xóa danh mục vì nó có ' . $item->products()->count() . ' sản phẩm liên quan!' : '' }}">
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
            <h3>Không tìm thấy {{ request('keyword') ? '"' . request('keyword') . '"' : '' }}</h3>
        </div>
    @endif
</div>

<nav aria-label="Page navigation example">
    <ul class="pagination d-flex justify-content-center my-3">
        {{ $categories->appends(request()->all())->links() }}
    </ul>
</nav>
