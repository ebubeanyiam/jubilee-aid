const bar = document.querySelector(".fa-bars");
const times = document.querySelector(".fa-times");
const nav = document.querySelector(".menu-bar");
const main = document.querySelector("main");

bar.addEventListener('click', function() {
    nav.classList.toggle("expand");
    main.classList.toggle("opaque");
});

times.addEventListener('click', function() {
    nav.classList.remove("expand")
    main.classList.toggle("opaque");
});