let currentIndex = 0;

function moveSlide(direction) {
    const items = document.querySelectorAll('.carousel-item');
    const totalItems = items.length;

    items[currentIndex].classList.remove('active'); // Bỏ active từ slide hiện tại

    currentIndex += direction;

    if (currentIndex < 0) {
        currentIndex = totalItems - 1;
    } else if (currentIndex >= totalItems) {
        currentIndex = 0;
    }

    items[currentIndex].classList.add('active'); // Thêm active cho slide mới

    // Di chuyển carousel-inner theo index
    // const offset = -currentIndex * 100; // Tính toán độ lệch
    // document.querySelector('.carousel-inner').style.transform = `translateX(${offset}%)`;
}

// $(document).ready(function() {
//     $(".menu-item").mouseenter(function(e) {
//         // Hiển thị menu con khi di chuột vào menu chính
//         $(this).children(".sub-menu").stop(true, true).slideDown("fast");
        
//         // Đóng tất cả các sub-menu khác
//         $(this).siblings().find(".sub-menu").stop(true, true).slideUp("fast");
//     });

//     $(".menu-item").mouseleave(function(e) {
//         // Ẩn menu con khi rời chuột khỏi menu chính
//         $(this).children(".sub-menu").stop(true, true).slideUp("fast");
//     });
// });
$(document).ready(function() {
    // Khi hover vào danh mục cha
    $('.menu-item.parent-menu').hover(
        function() {
            // Hiện danh mục con
            $(this).children('.subcategory-list-parent-1').stop(true, true).slideDown(500);
        },
        function() {
            // Ẩn danh mục con
            $(this).children('.subcategory-list-parent-1').stop(true, true).slideUp(500);
        }
    );
    // Khi hover vào danh mục con
    $('.menu-item.sub-menu').hover(
        function() {
            // Hiện danh mục con thứ hai
            $(this).children('.subcategory-list-parent-2').stop(true, true).slideDown(500);
        },
        function() {
            // Ẩn danh mục con thứ hai
            $(this).children('.subcategory-list-parent-2').stop(true, true).slideUp(500);
        }
    );
});