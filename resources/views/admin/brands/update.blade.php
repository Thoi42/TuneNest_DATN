@extends('admin.layout.layout')
@section('crumb_parent', 'Danh sách thương hiệu')
@section('title', 'Sửa thương hiệu')
@section('main')
    <div class="main-content-inner">
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
                        <a href="{{ route('brand.index') }}">
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
            <!-- form-edit-brand -->
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
                    action="{{ route('brand.update', $brand->id) }}">
                    @csrf
                    <div class="wg-box">
                        <fieldset class="name">
                            <div class="body-title mb-10">Tên thương hiệu <span class="tf-color-1">*</span></div>
                            <input class="mb-10" type="text" placeholder="Nhập tên thương hiệu" name="name"
                            value="{{ old('name', ($brand->name) ?? '') }}">
                        </fieldset>

                        <fieldset class="description">
                            <div class="body-title mb-10">Mô tả</div>
                            <textarea class="mb-10" placeholder="Nhập mô tả" name="description" tabindex="0" aria-required="true">{{ old('description', ($brand->description) ?? '') }}</textarea>
                        </fieldset>
                    </div>
                    <div class="wg-box">
                        <fieldset>
                            <div class="body-title">Tải ảnh lên</div>
                            <div class="upload-image flex-grow">
                                <div class="item" id="imgpreview" style="{{ old('image', $brand->image) ? 'display:block' : 'display:none' }}">
                                    <img class="imgpreview" src="{{ old('image') ?? asset('uploads/brands/' . $brand->image) }}" class="effect8" alt="">
                                </div>
                                <div id="upload-file" class="item up-load">
                                    <label class="uploadfile" for="myFile">
                                        <span class="icon">
                                            <i class="icon-upload-cloud"></i>
                                        </span>
                                        <span class="body-text">Thả hình ảnh của bạn vào đây hoặc chọn <span class="tf-color">Bấm vào để duyệt</span></span>
                                        <input class="image" type="file" id="myFile" name="image" accept="image/*">
                                        <input type="hidden" id="oldImage" name="oldImage" value="{{ old('oldImage', $brand->image) }}">
                                    </label>
                                </div>
                            </div>
                        </fieldset>
                        <div class="cols gap10">
                            <button class="tf-button w-full" type="submit">Lưu</button>
                        </div>
                    </div>
                </form>
                <!-- /form-edit-brand -->
            </div>
            <!-- /main-content-wrap -->
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('librarys/upload.js') }}"></script>
@endsection
