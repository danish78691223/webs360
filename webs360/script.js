document.addEventListener("DOMContentLoaded", () => {
    // Hamburger menu functionality
    const hamburger = document.getElementById("hamburger");
    const sideNav = document.getElementById("side-nav");

    hamburger.addEventListener("click", () => {
        sideNav.classList.toggle("hidden");
    });

    // Dropdown functionality for profile menu
    const profileToggle = document.getElementById("profile-toggle");
    const profileMenu = document.getElementById("profile-menu");

    if (profileToggle && profileMenu) {
        profileToggle.addEventListener("click", (event) => {
            event.preventDefault();
            profileMenu.classList.toggle("visible");
        });

        document.addEventListener("click", (event) => {
            if (!profileToggle.contains(event.target) && !profileMenu.contains(event.target)) {
                profileMenu.classList.remove("visible");
            }
        });
    }
});
