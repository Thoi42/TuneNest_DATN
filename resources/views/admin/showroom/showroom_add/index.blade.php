@extends('admin.layout.layout')
@section('title', 'Chỉnh Sửa Showroom')
@section('main')
<div class="container">
    <h2>Thêm Showroom</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form class="tf-section-2 form-add-product" method="POST" enctype="multipart/form-data"
      action="{{ route('showroom.store') }}">
     @csrf <!-- Sử dụng csrf_field() để tự động sinh ra token -->
    
    <div class="wg-box">
        <fieldset class="name">
            <div class="body-title mb-10">Tên Showroom <span class="tf-color-1">*</span></div>
            <input class="mb-10" type="text" placeholder="Nhập tên showroom" name="name" tabindex="0" value=""
                   aria-required="true" required="">
            <div class="text-tiny">Nhập tên showroom tối đa 100 ký tự</div>
        </fieldset>
        
        <fieldset class="address">
            <div class="body-title mb-10">Địa Chỉ <span class="tf-color-1">*</span></div>
            <input class="mb-10" type="text" placeholder="Nhập địa chỉ showroom" name="address" tabindex="0" value=""
                   aria-required="true" required="">
            <div class="text-tiny">Nhập địa chỉ tối đa 250 ký tự</div>
        </fieldset>
        
        <fieldset class="phone">
            <div class="body-title mb-10">Số Điện Thoại Liên Hệ<span class="tf-color-1">*</span></div>
            <input class="mb-10" type="text" placeholder="Nhập Số Điện Thoại Showroom" name="phone" tabindex="0" value=""
                   aria-required="true" required="">
            <div class="text-tiny">Nhập số điện thoại</div>
        </fieldset>
    </div>
    
    <div class="wg-box">
    <fieldset>
    <div class="body-title">Upload images <span class="tf-color-1">*</span></div>
    <div class="upload-image flex-grow">
        <div class="item" id="imgpreview" style="display:none">
            <img src="{{ asset('storage/images/showrooms/upload-1.png') }}" class="effect8" alt="">
        </div>
        <div id="upload-file" class="item up-load">
            <label class="uploadfile" for="myFile">
                <span class="icon">
                    <i class="icon-upload-cloud"></i>
                </span>
                <span class="body-text">Drop your images here or select <span class="tf-color">click to browse</span></span>
                <input type="file" id="myFile" name="image" accept="image/*" required> <!-- Thêm 'required' nếu cần -->
            </label>
        </div>
    </div>
</fieldset>

        
        <div class="cols gap10">
            <button class="tf-button w-full" type="submit">Add product</button>
        </div>
    </div>
</form>

<script>
    document.getElementById("myFile").addEventListener("change", function(event) {
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
<script>
    document.getElementById("myFile").addEventListener("change", function(event) {
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
@endsection