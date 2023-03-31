//https://www.codingnepalweb.com/draggable-image-slider-html-css-javascript/
//https://www.codinglabweb.com/2022/05/responsive-card-slider-javascript.html

const carousel = document.querySelector(".homeadcarousel");
const slideshow = document.querySelector(".homecatcarousel");

firstImg = carousel.querySelectorAll(".homeadimg")[0];
firstCat = carousel.querySelectorAll (".homecatdiv")[0];       
arrowIcons = document.querySelectorAll(".adcarouselbtndiv");
arrows = document.querySelectorAll(".catcarouselbtndiv");

let isDragStart = false, isDragging = false, prevPageX, prevScrollLeft, positionDiff;
let catDragStart = false, categoryDragging = false, prevCatPageX, prevCatScrollLeft, positionCatDiff;

const showHideIcons = () => {
    // showing and hiding prev/next icon according to carousel scroll left value
    let scrollWidth = carousel.scrollWidth - carousel.clientWidth; // getting max scrollable width
    arrowIcons[0].style.display = carousel.scrollLeft === 0 ? "none" : "block";
    arrowIcons[1].style.display = carousel.scrollLeft === scrollWidth ? "none" : "block";
};

const catShowHideIcons = () => {
    // showing and hiding prev/next icon according to carousel scroll left value
    let scrollWidth =  slideshow.scrollWidth -  slideshow.clientWidth; // getting max scrollable width
    arrows[0].style.display = slideshow.scrollLeft === 0 ? "none" : "block";
    arrows[1].style.display =  slideshow.scrollLeft === scrollWidth ? "none" : "block";
};

arrowIcons.forEach(icon => {
    icon.addEventListener("click", () => {
        let firstImgWidth = firstImg.clientWidth + 14;
        carousel.scrollLeft += icon.id === "adleft" ? -firstImgWidth : firstImgWidth;
        setTimeout(() => showHideIcons(), 60); // calling showHideIcons after 60ms
    });
});

arrows.forEach(icon => {
    icon.addEventListener("click", () => {
        let firstCatWidth = firstCat.clientWidth + 14; // getting first img width & adding 14 margin value
        // if clicked icon is left, reduce width value from the carousel scroll left else add to it
//        if(icon.id === "adleft"){
//            carousel.scrollLeft += firstImgWidth;
//            
//        }
//        else if(icon.id === "adright"){
//            carousel.scrollLeft -= firstImgWidth;
//        }
        //showHideIcons();
        slideshow.scrollLeft += icon.id === "catleft" ? -firstCatWidth : firstCatWidth;
        setTimeout(() => catShowHideIcons(), 60); // calling showHideIcons after 60ms
    });
});

const autoSlide = () => {
    // if there is no image left to scroll then return from here
    if(carousel.scrollLeft - (carousel.scrollWidth - carousel.clientWidth) > -1 || carousel.scrollLeft <= 0) return;

    positionDiff = Math.abs(positionDiff); // making positionDiff value to positive
    let firstImgWidth = firstImg.clientWidth + 14;
    // getting difference value that needs to add or reduce from carousel left to take middle img center
    let valDifference = firstImgWidth - positionDiff;

    if(carousel.scrollLeft > prevScrollLeft) { // if user is scrolling to the right
        return carousel.scrollLeft += positionDiff > firstImgWidth / 3 ? valDifference : -positionDiff;
    }
    // if user is scrolling to the left
    carousel.scrollLeft -= positionDiff > firstImgWidth / 3 ? valDifference : -positionDiff;
};

const autoCatSlide = () => {
    // if there is no image left to scroll then return from here
    if(slideshow.scrollLeft - (slideshow.scrollWidth - slideshow.clientWidth) > -1 || slideshow.scrollLeft <= 0) return;

    positionCatDiff = Math.abs(positionCatDiff); // making positionDiff value to positive
    let firstCatWidth = firstCat.clientWidth + 14;
    // getting difference value that needs to add or reduce from carousel left to take middle img center
    let valDifference = firstCatWidth - positionCatDiff;

    if(slideshow.scrollLeft > prevScrollLeft) { // if user is scrolling to the right
        return slideshow.scrollLeft += positionCatDiff > firstCatWidth / 6 ? valDifference : -positionCatDiff;
    }
    // if user is scrolling to the left
    slideshow.scrollLeft -= positionCatDiff > firstCatWidth / 3 ? valDifference : -positionCatDiff;
};

const dragStart = (e) => {
    // updatating global variables value on mouse down event
    isDragStart = true;
    prevPageX = e.pageX || e.touches[0].pageX;
    prevScrollLeft = carousel.scrollLeft;
};

const dragCatStart = (e) => {
    // updatating global variables value on mouse down event
    catDragStart = true;
    prevCatPageX = e.pageX || e.touches[0].pageX;
    prevCatScrollLeft = slideshow.scrollLeft;
};


const dragging = (e) => {
    // scrolling images/carousel to left according to mouse pointer
    if(!isDragStart) return;
    e.preventDefault();
    isDragging = true;
    carousel.classList.add("dragging");
    positionDiff = (e.pageX || e.touches[0].pageX) - prevPageX;
    carousel.scrollLeft = prevScrollLeft - positionDiff;
    showHideIcons();
};

const draggingCategory = (e) => {
    // scrolling images/carousel to left according to mouse pointer
    if(!catDragStart) return;
    e.preventDefault();
    categoryDragging = true;
    slideshow.classList.add("dragging");
    positionCatDiff = (e.pageX || e.touches[0].pageX) - prevCatPageX;
    slideshow.scrollLeft = prevCatScrollLeft - positionCatDiff;
    catShowHideIcons();
};

const dragStop = () => {
    isDragStart = false;
    carousel.classList.remove("dragging");

    if(!isDragging) return;
    isDragging = false;
    autoSlide();
};

const dragCategoryStop = () => {
    catDragStart = false;
    slideshow.classList.remove("dragging");

    if(!categoryDragging) return;
    categoryDragging = false;
    autoSlide();
};

//For Advertisement Dragging

carousel.addEventListener("mousedown", dragStart);
carousel.addEventListener("touchstart", dragStart);

document.addEventListener("mousemove", dragging);
carousel.addEventListener("touchmove", dragging);

document.addEventListener("mouseup", dragStop);
carousel.addEventListener("touchend", dragStop);

//For Category Dragging

slideshow.addEventListener("mousedown", dragCatStart);
slideshow.addEventListener("touchstart", dragCatStart);

document.addEventListener("mousemove", draggingCategory);
slideshow.addEventListener("touchmove", draggingCategory);

document.addEventListener("mouseup", dragCategoryStop);
slideshow.addEventListener("touchend", dragCategoryStop);


  
var swiper = new Swiper(".slide-content", {
    slidesPerView: 3,
    spaceBetween: 25,
    loop: true,
    centerSlide: 'true',
    fade: 'true',
    grabCursor: 'true',
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
      dynamicBullets: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },

    breakpoints:{
        0: {
            slidesPerView: 1,
        },
        950: {
            slidesPerView: 2,
        },
        1250: {
            slidesPerView: 3,
        },
    },
  });