<form action="{{ route('product.index') }}" method="GET">
    @if ($config == 'deleted')
        <input type="hidden" name="deleted" value="daxoa">
    @endif
    <div class="fill-deleted">
        <a class="all" href="{{ route('product.index') }}"> Tất cả</a> |
        <a class="trash" href="{{ route('product.index', ['deleted' => 'daxoa']) }}">Thùng rác <span>({{ $countDeleted }})</span></a>
    </div>

    <div class="flex items-center justify-between gap10 flex-wrap">
        <div class="wg-filter wg-filter-product">
            <fieldset class="search" style="width: 70%">
                <input type="text" name="keyword" placeholder="Tìm kiếm sản phẩm..." class="input-filter"
                    tabindex="2" value="{{ request('keyword') ?: old('keyword') }}" aria-required="true">
            </fieldset>
            <fieldset class="publish" style="width: 50%">
                <div class="select">
                    @php
                        $publish = request('publish') ?: old('publish');
                    @endphp
                    <select class="input-filter" name="publish">
                        @foreach (Config('general.publish') as $key => $val)
                            <option value="{{ $key }}" {{ $publish == $key ? 'selected' : '' }}>
                                {{ $val }}</option>
                        @endforeach
                    </select>
                </div>
            </fieldset>

            <fieldset class="category" style="width: 40%">
                <div class="select">
                    @php
                        $category_id = request('category_id') ?: old('category_id');
                    @endphp
                    <select class="" name="category_id">
                        <option value="">Danh mục</option>
                        @foreach ($productCategories as $val)
                            <option 
                            @if ($val->id == old('category_id', 
                            isset($category_id) ? $category_id : '')) selected
                            @endif
                            value="{{ $val->id }}">
                                @php
                                    $str = '';
                                    for ($i=0; $i < $val->level; $i++) {
                                        echo $str;
                                        $str .= '-- ';    
                                    }
                                @endphp
                                {{ $val->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </fieldset>
            <fieldset class="brand" style="width: 50%">
                @php
                    $brand_id = request('brand_id') ?: old('brand_id');
                @endphp
                <div class="select">
                    <select class="" name="brand_id">
                        <option value="">Thương hiệu</option>
                        @foreach ($brand as $val) <!-- Đổi từ $postCategories sang $productCategories -->
                            <option 
                            @if ($val->id == old('brand_id', 
                            isset($brand_id) ? $brand_id : '')) selected
                            @endif
                            value="{{ $val->id }}">
                                {{ $val->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </fieldset>

            <div class="button-submit">
                <button class="btn-filter" type="submit"><span>Tìm kiếm</span></button>
            </div>
        </div>
        <a class="tf-button style-1 w208" href="{{ route('product.create') }}">
            <i class="icon-plus"></i>Thêm mới
        </a>
    </div>
</form>
