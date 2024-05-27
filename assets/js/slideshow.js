// slideshow
const slideList = $(".slideshow__list");
const slideItem = $$(".slideshow__item");
console.log(slideItem);
const btnPrev = document.getElementById("prev");
const btnNext = document.getElementById("next");
let length = slideItem.length;
let current = 0;

const handleChangeSlider = () => {
    if (current == length - 1) {
        current = 0;
        let width = slideItem[0].offsetWidth;
        console.log(width);
        slideList.style.transform = `translateX(0px)`;
    } else {
        current++;
        let width = slideItem[0].offsetWidth;
        slideList.style.transform = `translateX(${width * -1 * current}px)`;
    }
};
let handleEventChangeSlider = setInterval(handleChangeSlider, 4000);

btnNext.addEventListener("click", () => {
    clearInterval(handleEventChangeSlider);
    handleChangeSlider();
    handleEventChangeSlider = setInterval(handleChangeSlider, 4000);
});
btnPrev.addEventListener("click", () => {
    clearInterval(handleEventChangeSlider);
    if (current == 0) {
        current = length - 1;
        let width = slideItem[0].offsetWidth;
        console.log(width);
        slideList.style.transform = `translateX(${width * -1 * current}px)`;
    } else {
        current--;
        let width = slideItem[0].offsetWidth;
        slideList.style.transform = `translateX(${width * -1 * current}px)`;
    }
    handleEventChangeSlider = setInterval(handleChangeSlider, 4000);
});
