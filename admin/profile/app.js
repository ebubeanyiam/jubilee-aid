var acc = document.querySelector(".account-button");
var sec = document.querySelector(".security-button");
var accDiv = document.querySelector(".account");
var secDiv = document.querySelector(".security");


sec.addEventListener('click', () => {
    acc.classList.remove("active");
    sec.classList.add("active");

    secDiv.classList.remove("show");
    accDiv.classList.add("show");
})

acc.addEventListener('click', () => {
    sec.classList.remove("active");
    acc.classList.add("active");

    secDiv.classList.add("show");
    accDiv.classList.remove("show");
})