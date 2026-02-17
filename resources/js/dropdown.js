function toggleDropdown(button) {
    const dropdown = button.nextElementSibling;
    const isHidden = dropdown.classList.contains("hidden");

    document.querySelectorAll(".dropdown-menu").forEach((menu) => {
        menu.classList.add("hidden");
    });

    if (isHidden) {
        dropdown.classList.remove("hidden");
    }
}

window.toggleDropdown = toggleDropdown;

document.addEventListener("click", function (e) {
    if (!e.target.closest(".relative")) {
        document.querySelectorAll(".dropdown-menu").forEach((menu) => {
            menu.classList.add("hidden");
        });
    }
});
