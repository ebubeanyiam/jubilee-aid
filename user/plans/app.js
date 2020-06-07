const newPlan = document.querySelector(".fa-plus");
const plan = document.querySelector(".plan");
const confirm = document.querySelector(".confirm");
const select = document.querySelector("select");
const result = document.querySelector(".result");
const check = document.querySelector(".check");

newPlan.addEventListener('click', () => {
    plan.classList.add("hide") ;
})

function calc() {
    let selPrice = parseInt(select.value);
    let percentage = selPrice * 0.7;
    selPrice += percentage;
    result.innerHTML = selPrice;

    if (select.value != "") {
        check.classList.remove("activate")
    }
    else {
        check.classList.add("activate")
        result.innerHTML = "[No plan selected yet]"
    }
}

function activate() {
}

activate();