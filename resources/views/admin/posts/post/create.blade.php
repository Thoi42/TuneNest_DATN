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
                <form class="post tf-section-2 form-add-product" method="post" enctype="multipart/form-data"
                    action="{{ route('post.store') }}">
                    @csrf
                    <div class="wg-box">
                        <fieldset class="name">
                            <div class="body-title mb-10">Tiêu đề <span class="tf-color-1">*</span>
                            </div>
                            <input class="mb-10" type="text" placeholder="Nhập tiêu đề danh mục" name="title"
                                value="{{ old('title', $post->title ?? '') }}">
                        </fieldset>
                        <fieldset class="description">
                            <div class="form-description mt-3">
                                <div class="body-title mb-10">Mô tả ngắn</div>
                                <textarea type="text" name="description" class="form-control ck-editor" autocomplete="off" id="description">
                                {{ old('description' ?? '') }}
                            </textarea>
                            </div>
                        </fieldset>
                        <fieldset class="content">
                            <div class="form-content mt-3">
                                <div class="body-title mb-10">Nội dung
                                </div>
                                <textarea type="text" name="content" class="form-control ck-editor" autocomplete="off" id="content">
                                {{ old('content' ?? '') }}
                            </textarea>
                            </div>
                        </fieldset>

                        <fieldset>
                            <div class="body-title mb-10">Album ảnh</div>
                            <div class="upload-image mb-16 upload-album">
                                <div id="galUpload" class="item up-load">
                                    <label class="uploadfile" for="gFile">
                                        <span class="icon">
                                            <i class="icon-upload-cloud"></i>
                                        </span>
                                        <span class="text-tiny">Drop your images here or select <span class="tf-color">click to browse</span></span>
                                        <input class="album-image" type="file" id="gFile" name="images[]" accept="image/*" multiple="">
                                        <input type="hidden" id="albums" name="albums" value="{{ old('albums', $post->image ?? '') }}">
                                    </label>
                                </div>

                                @if (old('albums'))
                                @foreach (json_decode(old('albums')) as $item)
                                <div class="item item-parent"> 
                                    <img class="albumPreview" src="{{$item}}" alt="">
                                    <i class="fa-regular fa-circle-xmark delete-img"></i>
                                </div>
                                @endforeach
                            @endif
                            </div>
                        </fieldset>

                        <fieldset class="slug">
                            <div class="mb-3">
                                <div class="body-title mb-10">Đường dẫn <span class="tf-color-1">*</span>
                                </div>
                                <div class="input-group">
                                  <span class="input-group-text" id="basic-addon3">{{ config('app.url') }}</span>
                                  <input type="text" class="form-control" name="slug" value="{{ old('slug' ?? '') }}" id="basic-url" autocomplete="off" placeholder="duong-dan-url">
                                </div>
                              </div>
                        </fieldset>
                    </div>
                    <div class="wg-box">
                        <div class="gap22 cols">
                            <fieldset class="category">
                                <div class="body-title mb-10">Danh mục
                                </div>
                                <div class="select">
                                    <select class="" name="post_category_id">
                                        <option value="">--- Chọn danh mục ---</option>
                                        @foreach ($postCategories as $val)
                                            <option 
                                            @if ($val->id == old('post_category_id', 
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
                            <div class="body-title">Tải ảnh lên
                            </div>
                            <div class="upload-image flex-grow">
                                <div class="item" id="imgpreview"
                                    style="{{ old('oldImage') ? 'display:block' : 'display:none' }}">
                                    <img style="height: auto !important" class="imgpreview" src="{{ old('oldImage') }}" class="effect8" alt="">
                                </div>
                                <div id="upload-file" class="item up-load">
                                    <label class="uploadfile" for="myFile">
                                        <span class="icon">
                                            <i class="icon-upload-cloud"></i>
                                        </span>
                                        <span class="body-text">Thả hình ảnh của bạn vào đây hoặc chọn <span
                                                class="tf-color">Bấn để duyệt</span></span>
                                        <input class="image" type="file" id="myFile" name="image" accept="image/*">
                                        {{-- thêm input hidden để lưu ảnh cũ --}}
                                        <input type="hidden" id="oldImage" name="oldImage"
                                            value="{{ old('oldImage', $post->image ?? '') }}">
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


    @section('css')
        <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    @endsection
    @section('script')
        <script src="{{ asset('librarys/upload.js') }}"></script>
        <script>
            var uploadUrl = "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}";
        </script>
    @endsection
