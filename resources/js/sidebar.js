const initializeSidebarCollapse = () => {
    const sidebarElement = document.getElementsByClassName("sidebar-menu")[0];
    const sidebarToggleElement = document.getElementsByClassName(
        "sidebar-hamburger-toggle"
    )[0];

    if (sidebarElement && sidebarToggleElement) {
        sidebarToggleElement.addEventListener("click", () => {
            sidebarElement.classList.toggle("collapsed");

            sidebarElement.addEventListener("transitionend", () => {
                window.dispatchEvent(new Event("resize"));
            });
        });
    }
};

// Wait until page is loaded
document.addEventListener("DOMContentLoaded", () =>
    initializeSidebarCollapse()
);
