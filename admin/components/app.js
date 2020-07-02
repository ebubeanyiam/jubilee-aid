const menuBar = document.querySelector(".menu-bar");
const Bars = document.querySelector(".header span");
const closeMenu = document.querySelector(".fa-times");

Bars.addEventListener("click", () => {
  menuBar.classList.toggle("open-nav");
});

closeMenu.addEventListener("click", () => {
  menuBar.classList.remove("open-nav");
});

// Close nav
window.addEventListener("click", (e) => {
  if (
    // !document.querySelector(".hamburger-toggle").contains(e.target)
    !menuBar.contains(e.target) &&
    !Bars.contains(e.target)
  ) {
    menuBar.classList.remove("open-nav");
  }
});

console.log("hey");
