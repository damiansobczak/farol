const trigger = document.querySelector("#menu-popover-trigger");
const popover = document.querySelector("#menu-popover");
let animating = false;

const popIn = () => {
    animating = true;
    popover.classList.remove("hidden", "opacity-0");
    popover.animate(
        [
            { opacity: "0", transform: "translateY(-10px)" },
            { opacity: "1", transform: "translateY(0)" }
        ],
        {
            duration: 100,
            fill: "both",
            easing: "cubic-bezier(0.42, 0, 0.58, 1)"
        }
    ).onfinish = () => {
        trigger.setAttribute("aria-expanded", "true");
        animating = false;
    };
};

const popOut = () => {
    animating = true;
    popover.animate(
        [
            { opacity: "1", transform: "translateY(0)" },
            { opacity: "0", transform: "translateY(-10px)" }
        ],
        {
            duration: 100,
            fill: "both",
            easing: "cubic-bezier(0.42, 0, 0.58, 1)"
        }
    ).onfinish = () => {
        trigger.setAttribute("aria-expanded", "false");
        popover.classList.add("hidden", "opacity-0");
        animating = false;
    };
};

trigger.addEventListener("click", e => {
    e.preventDefault();
    e.stopPropagation();

    if (trigger.getAttribute("aria-expanded") === "false" && !animating) {
        popIn();
    }

    if (trigger.getAttribute("aria-expanded") === "true" && !animating) {
        popOut();
    }
});
