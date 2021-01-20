const wrapper = document.querySelector("#popular-products");
const left = document.querySelector("#popular-left");
const right = document.querySelector("#popular-right");
const product = document.querySelectorAll("#popular-product");
const count = product.length;
const availableSlide = Math.ceil(
    (count * product[0].clientWidth - wrapper.clientWidth) /
        product[0].clientWidth
);
let current = 0;

const slideLeft = () => {
    if (current > 0) {
        current--;
        wrapper.style.transform = `translateX(${current *
            product[0].clientWidth *
            -1}px)`;
    }
};

const slideRight = () => {
    if (current < availableSlide) {
        current++;
        wrapper.style.transform = `translateX(${current *
            product[0].clientWidth *
            -1}px)`;
    }
};

left.addEventListener("click", e => {
    e.preventDefault();
    e.stopPropagation();
    slideLeft();
});

right.addEventListener("click", e => {
    e.preventDefault();
    e.stopPropagation();
    slideRight();
});
