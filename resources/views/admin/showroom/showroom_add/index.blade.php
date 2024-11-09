@extends('admin.layout.layout')

@section('title', 'Thêm Showroom')

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

    <form class="tf-section-2 form-add-product" method="POST" enctype="multipart/form-data" action="{{ route('showroom.store') }}">
        @csrf <!-- Sử dụng csrf_field() để tự động sinh ra token -->

        <div class="wg-box">
            <fieldset class="name">
                <div class="body-title mb-10">Tên Showroom <span class="tf-color-1">*</span></div>
                <input class="mb-10" type="text" placeholder="Nhập tên showroom" name="name" tabindex="0" value="" required>
                <div class="text-tiny">Nhập tên showroom tối đa 100 ký tự</div>
            </fieldset>

            <fieldset class="address">
                <div class="body-title mb-10">Địa Chỉ <span class="tf-color-1">*</span></div>
                <input class="mb-10" type="text" id="address" placeholder="Nhập địa chỉ showroom" name="address" tabindex="0" value="" required>
                <div class="text-tiny">Nhập địa chỉ tối đa 250 ký tự</div>
            </fieldset>

            <fieldset class="phone">
                <div class="body-title mb-10">Số Điện Thoại Liên Hệ<span class="tf-color-1">*</span></div>
                <input class="mb-10" type="text" placeholder="Nhập Số Điện Thoại Showroom" name="phone" tabindex="0" value="" required>
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
                            <input type="file" id="myFile" name="image" accept="image/*" required>
                        </label>
                    </div>
                </div>
            </fieldset>
        </div>

        <!-- Thêm bản đồ OpenStreetMap -->
        <div id="map" style="height: 400px;"></div> <!-- Thêm bản đồ với id="map" -->
        <input type="hidden" name="latitude" id="latitude">
        <input type="hidden" name="longitude" id="longitude">

        <div class="cols gap10">
            <button class="tf-button w-full" type="submit">Thêm Showroom</button>
        </div>
    </form>

    <script>
        // Thêm sự kiện cho việc chọn ảnh
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

        // Thêm sự kiện cho việc nhập địa chỉ
// Thêm sự kiện cho việc nhập địa chỉ
let map; // Khai báo biến map bên ngoài để có thể tái sử dụng khi cập nhật

document.getElementById('address').addEventListener('blur', function(event) {
    var address = event.target.value;
    
    if (address.length > 5) { // Khi người dùng nhập ít nhất 5 ký tự
        var geocodeUrl = 'https://nominatim.openstreetmap.org/search?format=json&q=' + encodeURIComponent(address);

        fetch(geocodeUrl)
            .then(response => response.json())
            .then(data => {
                if (data.length > 0) {
                    var latitude = data[0].lat;
                    var longitude = data[0].lon;

                    // Ghi vào các input ẩn để gửi lên server
                    document.getElementById('latitude').value = latitude;
                    document.getElementById('longitude').value = longitude;

                    // Nếu bản đồ đã được khởi tạo trước đó, ta xóa marker cũ đi
                    if (map) {
                        map.remove(); // Xóa bản đồ cũ nếu có
                    }

                    // Khởi tạo lại bản đồ với vị trí mới
                    map = L.map('map').setView([latitude, longitude], 14);
                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                    }).addTo(map);

                    L.marker([latitude, longitude]).addTo(map)
                        .bindPopup('Địa Chỉ: ' + address)
                        .openPopup();
                }
            })
            .catch(error => console.log('Error fetching geocode: ', error));
    }
});


    </script>
</div>

<!-- Thêm CSS và JS cho OpenStreetMap -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

@endsection
