window.addEventListener("DOMContentLoaded", () => {
    const preferujeTmavyRezim = window.matchMedia("(prefers-color-scheme: dark)").matches;
    document.documentElement.setAttribute("data-bs-theme", preferujeTmavyRezim ? "dark" : "light");
});
