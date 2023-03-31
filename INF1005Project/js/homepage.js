var swiper = new Swiper(".slide-content", {
    slidesPerView: 3,
    spaceBetween: 25,
    loop: 'true',
    centerSlide: 'true',
    fade: 'true',
    grabCursor: 'true',
    pagination: {
      el: "#home-ad-swiper-pagination",
      clickable: true,
      dynamicBullets: true,
    },
    navigation: {
      nextEl: "#home-ad-swiper-btn-next",
      prevEl: "#home-ad-swiper-btn-prev",
    },

    breakpoints:{
        0: {
            slidesPerView: 1,
        },
        520: {
            slidesPerView: 2,
        },
        950: {
            slidesPerView: 3,
        },
    },

});