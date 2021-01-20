const slider = document.querySelector("#slider");
const sliderLeft = document.querySelector("#slider-control-left");
const sliderRight = document.querySelector("#slider-control-right");
const sliderCount = slider.childElementCount;
let current = 0;

const slideLeft = () => {
    if (current > 0) {
        current--;
        slider.style.transform = `translateX(${current * 100 * -1}%)`;
    }
};

const slideRight = () => {
    if (current < sliderCount - 1) {
        current++;
        slider.style.transform = `translateX(${current * 100 * -1}%)`;
    }
};

sliderLeft.addEventListener("click", e => {
    e.preventDefault();
    e.stopPropagation();
    slideLeft();
});

sliderRight.addEventListener("click", e => {
    e.preventDefault();
    e.stopPropagation();
    slideRight();
});
