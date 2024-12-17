// Chuyển slide
function plusSlides(n) {
    // Chuyển đến slide tiếp theo trong carousel
    $('#carouselExampleIndicators').carousel('next');
}

// Tự động chuyển slide mỗi 2 giây
setInterval(() => {
    plusSlides(1);
}, 2000);

// Cuộn trang
function scrollPage() {
    // Cuộn trang lên đầu với hiệu ứng mượt
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}

// Điều chỉnh biểu tượng Messenger và nút cuộn lên đầu trang
$(document).ready(function () {
    $(window).on('scroll', function () {
        var menu = $('nav');
        if ($(this).scrollTop() > 110) {
            // Thêm class để đổi màu nền menu khi cuộn xuống hơn 110px
            menu.addClass('bg-body-tertiary');
            menu.removeClass('bg-body-sticky');
            // Hiện nút cuộn lên đầu trang
            $('#scroll-btn').fadeIn("slow");
            // Thay đổi vị trí biểu tượng Messenger khi cuộn xuống
            $('#mess').css("bottom", "100px");
        } else {
            // Đổi lại màu nền menu khi cuộn lên trên 110px
            menu.addClass('bg-body-sticky');
            menu.removeClass('bg-body-tertiary');
            // Ẩn nút cuộn lên đầu trang
            $('#scroll-btn').fadeOut("slow");
            // Đặt lại vị trí biểu tượng Messenger khi cuộn lên
            $('#mess').css("bottom", "30px");
        }
    });
});

// Màn hình chờ
$(window).on("load", function () {
    // Ẩn màn hình chờ sau 3 giây khi trang tải xong
    $('.container-load').delay(3000).fadeOut("slow");
});


// Hàm kiểm tra email hợp lệ
function validateEmail(email) {
    // Kiểm tra định dạng email theo regex
    var emailRegex = /\S+@\S+\.\S+/;
    return emailRegex.test(email);
}

// Hiển thị chi tiết sản phẩm
function showDetails(id) {
    $('#' + id).css('display', 'flex');
}

// Ẩn chi tiết sản phẩm
function hideDetails(id) {
    $('#' + id).css('display', 'none');
}
function hideLogoutLink() {
    document.getElementById('logout-link').style.display = 'none'; // Ẩn thẻ <a>
}
