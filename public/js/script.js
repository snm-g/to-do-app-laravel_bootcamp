document.addEventListener("DOMContentLoaded", () => {
    const navigation_links = document.querySelectorAll(".navigation-item");
    const active_url = window.location.href;
    navigation_links.forEach((link) => {
        if (link.href === active_url) {
            link.classList.add("active");
        }
    });
});
