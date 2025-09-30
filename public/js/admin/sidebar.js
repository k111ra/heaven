document.addEventListener('DOMContentLoaded', function () {
    const sidebar = document.querySelector(".sidebar");
    const sidebarToggler = document.querySelector(".sidebar-toggler");
    const menuToggler = document.querySelector(".menu-toggler");

    // Toggle sidebar's collapsed state
    sidebarToggler?.addEventListener("click", () => {
        sidebar.classList.toggle("collapsed");
    });

    // Toggle menu-active class for mobile
    menuToggler?.addEventListener("click", () => {
        sidebar.classList.toggle("menu-active");
    });

    // Handle window resize
    window.addEventListener("resize", () => {
        if (window.innerWidth >= 1024) {
            sidebar.classList.remove("menu-active");
        }
    });
});
