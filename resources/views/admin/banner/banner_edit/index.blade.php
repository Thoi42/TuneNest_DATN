@extends('admin.layout.layout')
@section('title', 'Chỉnh Sửa Banner')
@section('main')
<div class="container">
    <h2>Chỉnh Sửa Banner</h2>
    <form action="{{ route('banner.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT') <!-- Đổi thành PUT để chỉ định phương thức cập nhật -->

    <div class="wg-box">
        <fieldset>
            <div class="body-title">Title <span class="tf-color-1">*</span></div>
            <div class="cols">
                <input type="text" name="title" value="{{ old('title', $banner->title) }}" required placeholder="Enter title"> <!-- Điền giá trị cũ -->
            </div>
        </fieldset>

        <fieldset>
            <div class="body-title">Strong Title</div>
            <div class="cols">
                <input type="text" name="strong_title" value="{{ old('strong_title', $banner->strong_title) }}" placeholder="Enter strong title"> <!-- Điền giá trị cũ -->
            </div>
        </fieldset>

        <fieldset>
            <div class="body-title">Upload images <span class="tf-color-1">*</span></div>
            <div class="upload-image flex-grow">
                <!-- Hiển thị hình ảnh cũ nếu có -->
                @if($banner->image)
                    <div class="item mb-2">
                        <img src="{{ asset($banner->image) }}" alt="Current Banner Image" class="effect8" width="100">
                    </div>
                @endif
                <div class="item" id="imgpreview" style="display: none">
                    <img src="{{ asset('storage/images/showrooms/upload-1.png') }}" class="effect8" alt="">
                </div>
                <div id="upload-file" class="item up-load">
                    <label class="uploadfile" for="myFile">
                        <span class="icon">
                            <i class="icon-upload-cloud"></i>
                        </span>
                        <span class="body-text">Drop your images here or select <span class="tf-color">click to browse</span></span>
                        <input type="file" id="myFile" name="image" accept="image/*">
                    </label>
                </div>
            </div>
        </fieldset>

        <fieldset>
            <div class="body-title">Vị Trí Xuất Hiện <span class="tf-color-1">*</span></div>
            <div class="cols">
                <input type="number" name="order" min="0" value="{{ old('order', $banner->order) }}" required placeholder="Enter order">
            </div>
        </fieldset>

        <fieldset>
            <div class="body-title">Trang Xuất Hiện <span class="tf-color-1">*</span></div>
            <div class="cols">
                <input type="number" name="position" min="0" value="{{ old('position', $banner->position) }}" required placeholder="Enter position">
            </div>
        </fieldset>

        <button type="submit" class="btn btn-primary">Update</button>
    </div>
    </form>
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
