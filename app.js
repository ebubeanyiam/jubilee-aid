const hamburger = document.querySelector(".hamburger");
const mobileNav = document.querySelector(".mobile-nav");

hamburger.addEventListener("click", () => {
  mobileNav.classList.toggle("mobile-open");
  hamburger.classList.toggle("mobile-click");
});
