const bigImg = document.querySelector(".prod-preview__img");
const smallImg = document.querySelectorAll(".prod-preview__thumb-img");

smallImg.forEach(function (imgItem, x) {
    imgItem.addEventListener("click", function () {
        bigImg.src = imgItem.src;
    });
});
