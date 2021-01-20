const menu = document.querySelector("#menu");
const menuTrigger = document.querySelector("#menu-trigger");
let open = false;

menuTrigger.addEventListener("click", e => {
    e.preventDefault();
    e.stopPropagation();

    if (open) {
        menu.classList.add("hidden");
        open = false;
        return;
    } else {
        menu.classList.remove("hidden");
        open = true;
    }
});
