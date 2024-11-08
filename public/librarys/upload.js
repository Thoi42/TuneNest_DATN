(function ($) {
    "use strict";
    var HT = {};

    HT.uploadImage = () => {
        $('.image').on('change', function(event){
            var input = event.target; // lấy input gây ra sự kiện

            if(input.files && input.files[0]){ //nếu input file tồn tại và có ít nhất 1 phần tử
                
                var reader = new FileReader(); // đối tượng fileReader giúp đọc file và chuyển sang URL Base6
                reader.onload = (function(e){ // e sự kiện được thực thi ngay lập tức khi đọc và tải thành công
                   $('.imgpreview').attr('src', e.target.result);
                   $('#imgpreview').css('display', 'block');
                   $('#oldImage').val(e.target.result);   
                });

                reader.readAsDataURL(input.files[0]); 
                //readAsDataURL() là thuộc tính của đối tượng FileReader
                //đọc và chuyển đổi nội dung của file image chuỗi Base64-encoded Data URL.
            }
            
        });
    }

    HT.uploadImageAlbum = () => {
        // Lấy giá trị cũ từ #albums (nếu có) và chuyển đổi thành mảng
        var oldImages = JSON.parse($('#albums').val() || '[]');
        var imageUrls = [...oldImages]; // Bắt đầu với giá trị cũ

        $('.album-image').on('change', function(event) {
            var input = event.target;
            if (input.files && input.files.length > 0) {
                for (let i = 0; i < input.files.length; i++) {
                    var file = input.files[i];

                    var reader = new FileReader();
                    reader.onload = function(e) {
                        var imageUrl = e.target.result;
                        imageUrls.push(imageUrl); // Thêm ảnh mới vào mảng

                        // Cập nhật giá trị của #albums
                        $('#albums').val(JSON.stringify(imageUrls));

                        // Tạo HTML để hiển thị hình ảnh
                        var html = `<div class="item item-parent"> 
                            <img class="albumPreview" src="${imageUrl}" alt="">
                            <i class="fa-regular fa-circle-xmark delete-img"></i>
                        </div>`;
                        $('.upload-album').append(html);
                    };
                    reader.readAsDataURL(file);
                }
            }
        });
    }

    HT.deleteImage = () => {
        $(document).on('click', '.delete-img', function() {
            let _this = $(this);
            // Lấy URL của hình ảnh để xóa
            let imgSrc = _this.siblings('img').attr('src');
    
            // Lấy giá trị cũ từ #albums và chuyển đổi thành mảng
            var oldImages = JSON.parse($('#albums').val() || '[]');
    
            // Tìm chỉ số của hình ảnh cần xóa
            const index = oldImages.indexOf(imgSrc);
            if (index > -1) {
                // Xóa hình ảnh khỏi mảng
                oldImages.splice(index, 1);
                // Cập nhật lại giá trị của #albums
                $('#albums').val(JSON.stringify(oldImages));
            }
    
            // Xóa phần tử khỏi DOM
            _this.parents('.item-parent').remove();
        });
    }

    $(document).ready(function () {
        HT.uploadImage();
        HT.uploadImageAlbum();
        HT.deleteImage();
    });
})(jQuery);
