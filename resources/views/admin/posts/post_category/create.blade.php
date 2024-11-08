@extends('admin.layout.layout')
@section('crumb_parent', 'Danh mục bài viết')
@section('title', 'Thêm danh mục bài viết')
@section('main')
    <div class="main-content-inner">
        <!-- main-content-wrap -->
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>@yield('title')</h3>
                <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                    <li>
                        <a href="{{ route('dashboard.index') }}">
                            <div class="text-tiny">Dashboard</div>
                        </a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <a href="{{ route('postCategory.index') }}">
                            <div class="text-tiny">@yield('crumb_parent')</div>
                        </a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <div class="text-tiny">@yield('title')</div>
                    </li>
                </ul>
            </div>
            <!-- form-add-product -->
            <div class="main-content-wrap">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="tf-section-2 form-add-product" method="post" enctype="multipart/form-data"
                    action="{{ route('postCategory.store') }}">
                    @csrf
                    <div class="wg-box">
                        <fieldset class="name">
                            <div class="body-title mb-10">Tiêu đề <span class="tf-color-1">*</span>
                            </div>
                            <input class="mb-10" type="text" placeholder="Nhập tiêu đề danh mục" name="name"
                            value="{{ old('name' ?? '' ) }}">
                        </fieldset>

                        <fieldset class="description">
                            <div class="body-title mb-10">Mô tả</div>
                            <textarea class="mb-10" placeholder="Nhập mô tả" name="description" tabindex="0" aria-required="true">{{ old( 'description') ?? ''  }}</textarea>
                        </fieldset>
                    </div>
                    <div class="wg-box">
                        <div class="gap22 cols">
                            <fieldset class="category">
                                <div class="body-title mb-10">Danh mục
                                </div>
                                <div class="select">
                                    <select class="" name="parent_id">
                                        <option value="0">--Root--</option>
                                        @foreach ($postCategories as $val)
                                            <option 
                                            @if ($val->id == old('parent_id', 
                                            isset($postCategory->parent_id) ? $postCategory->parent_id : '')) selected
                                            @endif
                                            value="{{ $val->id }}">
                                                @php
                                                    $str = '';
                                                    for ($i=0; $i < $val->level ; $i++) {
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
                        </div>
                        <fieldset>
                            <div class="body-title">Upload images
                            </div>
                            <div class="upload-image flex-grow">
                                <div class="item" id="imgpreview" style="{{ old('oldImage') ? 'display:block' : 'display:none' }}">
                                    <img class="imgpreview" src="{{ old('oldImage') }}" class="effect8"
                                        alt="">
                                </div>
                                <div id="upload-file" class="item up-load">
                                    <label class="uploadfile" for="myFile">
                                        <span class="icon">
                                            <i class="icon-upload-cloud"></i>
                                        </span>
                                        <span class="body-text">Thả hình ảnh của bạn vào đây hoặc chọn <span class="tf-color">Bấn để duyệt</span></span>
                                        <input class="image" type="file" id="myFile" name="image" accept="image/*">
                                        {{-- thêm input hidden để lưu ảnh cũ --}}
                                        <input type="hidden" id="oldImage" name="oldImage" value="{{ old('oldImage', $postCategory->image ?? '') }}">
                                    </label>
                                </div>
                            </div>
                        </fieldset>
                        <div class="cols gap10">
                            <button class="tf-button w-full" type="submit">Thêm</button>
                        </div>
                    </div>
                </form>
                <!-- /form-add-product -->
            </div>
            <!-- /main-content-wrap -->
        </div>
    @endsection

@section('script'){
    <script src="{{ asset('librarys/upload.js') }}"></script>
}
@endsection