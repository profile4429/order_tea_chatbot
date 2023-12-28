$('.category-slider').slick({
    infinite: true, //Lặp lại
    accessibility: true,
    slidesToShow: 1, //Số item hiển thị
    slidesToScroll: 1, //Số item cuộn khi chạy
    autoplay: true, //Tự động chạy
    autoplaySpeed: 2000, //Tốc độ chạy
    speed: 1000, //Tốc độ chuyển slider
    arrows: false, //Hiển thị mũi tên
    centerMode: false, //item nằm giữa
    dots: false, //Hiển thị dấu chấm
    draggable: true, //Kích hoạt tính năng kéo chuột
    mobileFirst: true,
    pauseOnHover: true,
    responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 5,
                slidesToScroll: 1,
                infinite: true,
            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
    ]
});