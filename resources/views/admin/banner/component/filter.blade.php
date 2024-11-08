<form action="{{ route('banner.index') }}" method="GET">
    @if ($config == 'deleted')
        <input type="hidden" name="deleted" value="daxoa">
    @endif
    <div class="fill-deleted">
        <a class="all" href="{{ route('banner.index') }}"> Tất cả</a> |
        <a class="trash" href="{{ route('banner.index', ['deleted' => 'daxoa']) }}">Thùng rác <span>({{ $countDeleted }})</span></a>
    </div>

    <div class="flex items-center justify-between gap10 flex-wrap">
        <a class="tf-button style-1 w208" href="{{route('banner.create')}}">
            <i class="icon-plus"></i>Thêm mới
        </a>
    </div>
</form>