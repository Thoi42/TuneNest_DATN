@extends('admin.layout.layout')
@section('title', 'Chỉnh Sửa Showroom')
@section('main')
<div class="container">
    <h2>Chỉnh Sửa Showroom</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="tf-section-2 form-add-product" action="{{ route('showroom.update', $showroom->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="wg-box">
            <fieldset class="name">
                <div class="body-title mb-10">Tên Showroom <span class="tf-color-1">*</span></div>
                <input class="mb-10" type="text" placeholder="Nhập tên showroom" name="name" value="{{ old('name', $showroom->name) }}">
                <div class="text-tiny">Nhập tên showroom tối đa 100 ký tự</div>
            </fieldset>

            <fieldset class="address">
                <div class="body-title mb-10">Địa Chỉ <span class="tf-color-1">*</span></div>
                <input class="mb-10" type="text" placeholder="Nhập địa chỉ showroom" name="address" value="{{ old('address', $showroom->address) }}">
                <div class="text-tiny">Nhập địa chỉ tối đa 250 ký tự</div>
            </fieldset>

            <fieldset class="phone">
                <div class="body-title mb-10">Số Điện Thoại Liên Hệ <span class="tf-color-1">*</span></div>
                <input class="mb-10" type="text" placeholder="Nhập Số Điện Thoại Showroom" name="phone" value="{{ old('phone', $showroom->phone) }}">
                <div class="text-tiny">Nhập số điện thoại</div>
            </fieldset>
        </div>

        <div class="wg-box">
        <fieldset>
    <div class="body-title">Hình ảnh <span class="tf-color-1">*</span></div>
    <div class="upload-image flex-grow">
        <div class="item" id="imgpreview" style="{{ $showroom->image ? 'display:block' : 'display:none' }}">
            <img class="imgpreview" src="{{ old('oldImage') ?? asset($showroom->image) }}" alt="" style="width: 100%; height: auto; object-fit: cover;">
        </div>
        <div id="upload-file" class="item up-load">
            <label class="uploadfile" for="image">
                <span class="icon">
                    <i class="icon-upload-cloud"></i>
                </span>
                <span class="body-text">Thả hình ảnh của bạn vào đây hoặc chọn <span class="tf-color">Bấm để duyệt</span></span>
                <input type="file" id="image" name="image" accept="image/*">
                <input type="hidden" id="oldImage" name="oldImage" value="{{ $showroom->image }}">
            </label>
        </div>
    </div>
</fieldset>


            <div class="cols gap10">
                <button class="tf-button w-full" type="submit">Cập Nhật Showroom</button>
            </div>
        </div>
    </form>

    <script>
        document.getElementById("image").addEventListener("change", function(event) {
            const imgPreview = document.getElementById("imgpreview");
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imgPreview.style.display = "block";
                    imgPreview.querySelector("img").src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
</div>
@endsection
