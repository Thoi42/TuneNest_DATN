@extends('admin.layout.layout')
@section('title', 'Thêm Banner')
@section('main')
<style>
    .image-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
    }

    .img-preview-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        width: 150px;
    }

    .img-preview-item img {
        width: 100%;
        height: 100px;
        object-fit: cover;
        margin-bottom: 10px;
    }

    .upload-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 150px;
        height: 100px;
        border: 2px dashed #ccc;
        justify-content: center;
        margin-top: 10px;
        transition: all 0.3s ease;
    }

    .additional-fields {
        width: 100%;
    }

    .additional-fields input {
        width: calc(100% - 10px);
        margin-bottom: 10px;
    }
    
    .delete-img {
        cursor: pointer;
        color: red;
        margin-top: 5px;
    }
</style>
<div class="container">
    <h4>Thêm Banner</h4>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form class="tf-section-2 form-add-product" method="POST" enctype="multipart/form-data" action="{{ route('banner.store') }}" style="margin-inline-start:110px; width:150%;">
        @csrf
        <div class="wg-box" id="image-upload-section">
            <fieldset>
                <div class="body-title">Upload images <span class="tf-color-1">*</span></div>
                <div class="row upload-image">
                    <div id="img-previews" class="row image-grid">
                    </div>
                    <div class="item upload-container" id="upload-container">
                        <label class="uploadfile">
                            <span class="icon">
                                <i class="icon-upload-cloud"></i>
                            </span>
                            <span class="body-text">Drop your images here or select <span class="tf-color">click to browse</span></span>
                            <input type="file" name="images[]" accept="image/*" multiple required>
                        </label>
                    </div>
                </div>
            </fieldset>

            <div class="cols gap10">
                <button class="tf-button w-full" type="submit">Add Banner</button>
            </div>
        </div>
    </form>

    <script>
        document.querySelector("input[type='file']").addEventListener("change", function(event) {
            const files = event.target.files;
            const imgPreviewsContainer = document.getElementById("img-previews");
            const uploadContainer = document.getElementById("upload-container");

            // Di chuyển upload-container vào img-previews nếu chưa có
            if (!imgPreviewsContainer.contains(uploadContainer)) {
                imgPreviewsContainer.appendChild(uploadContainer);
            }

            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                const reader = new FileReader();
                reader.onload = function(e) {
                    const imgPreview = document.createElement("div");
                    imgPreview.className = "col-md-4 img-preview-item";
                    imgPreview.innerHTML = `
                        <img src="${e.target.result}" class="effect8" alt="">
                        <div class="additional-fields">
                            <div class="body-title">Tiêu Đề <span class="tf-color-1">*</span></div>
                            <input type="text" name="title[]" required placeholder="Nhập tiêu đề">
                            <div class="body-title">Tiêu Đề Mạnh <span class="tf-color-1">*</span></div>
                            <input type="text" name="strong_title[]" required placeholder="Nhập tiêu đề mạnh">
                            <div class="body-title">Vị Trí Xuất Hiện <span class="tf-color-1">*</span></div>
                            <input type="number" name="order[]" min="0" required placeholder="VD:1 là slide banner1, 2 là slide banner2,">
                            <div class="body-title">Trang Xuất Hiện <span class="tf-color-1">*</span></div>
                            <input type="number" name="position[]" min="0" required placeholder="VD: 1 xuất hiện ở trang chủ">
                            <div class="body-title">Mô Tả <span class="tf-color-1">*</span></div>
                            <input type="text" name="description[]" placeholder="Nhập mô tả">
                            <button type="button" class="remove-image">Xóa</button> <!-- Nút xóa hình ảnh -->
                        </div>
                    `;
                    imgPreviewsContainer.insertBefore(imgPreview, uploadContainer);
                    
                    // Thêm sự kiện cho nút xóa hình ảnh
                    imgPreview.querySelector(".remove-image").addEventListener("click", function() {
                        imgPreview.remove();
                    });
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
</div>
@endsection
