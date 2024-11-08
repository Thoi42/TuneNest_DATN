<form action="{{ route('productCategory.index') }}" method="GET">
    @if ($config == 'deleted')
        <input type="hidden" name="deleted" value="daxoa">
    @endif
    <div class="fill-deleted">
        <a class="all" href="{{ route('productCategory.index') }}"> Tất cả</a> |
        <a class="trash" href="{{ route('productCategory.index', ['deleted' => 'daxoa']) }}">Thùng rác <span>({{ $countDeleted }})</span></a>
    </div>

    <div class="flex items-center justify-between gap10 flex-wrap">
        <div class="wg-filter wg-filter-postc">
            <fieldset class="search" style="width: 70%">
                <input type="text" name="keyword" placeholder="Tìm kiếm tại đây..." class="input-filter"
                    tabindex="2" value="{{ request('keyword') ?: old('keyword') }}" aria-required="true">
            </fieldset>
            <fieldset class="publish" style="width: 40%">
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

            <div class="button-submit">
                <button class="btn-filter" type="submit"><span>Tìm kiếm</span></button>
            </div>
        </div>
        <a class="tf-button style-1 w208" href="{{ route('productCategory.create') }}">
            <i class="icon-plus"></i>Thêm mới
        </a>
    </div>
</form>
