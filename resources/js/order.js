const triggers = document.querySelectorAll("#customer-order-trigger");
const modal = document.querySelector("#customer-order-modal");
const modalClose = document.querySelector("#customer-order-close");

triggers.forEach(trigger => {
    trigger.addEventListener("click", e => {
        e.preventDefault();
        e.stopPropagation();

        modal.classList.toggle("hidden");
    });
});

modalClose.addEventListener("click", e => {
    e.preventDefault();
    e.stopPropagation();

    modal.classList.toggle("hidden");
});
