@extends('admin.layout.layout')
@section('title', 'Danh mục bài viết')
@section('main')
    <div class="main-content-inner">
        <div class="main-content-wrap">

            @foreach ($posts as $index => $item)
                {{$item->description}}
                {!! $item->content !!}
            @endforeach
            
        </div>
    </div>



@endsection

@section('css')

@endsection
@section('script')

@endsection
