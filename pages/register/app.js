const firstName = document.querySelector("#firstname");

const email = document.querySelector("#email");
const mailWarning = document.querySelector(".mail-warning");

const password = document.querySelector("#password");
const repeatPassword = document.querySelector("#rpt-password");
const passwordWarning = document.querySelector(".password-warning");
const repeatPasswordWarning = document.querySelector(".rpt-pwdwang");

const number = document.querySelector("#num");
const numberWarning = document.querySelector(".num-warning");

const check = document.querySelector(".fa-eye");

email.addEventListener("keyup", function () {
  var emailValue = email.value;

  if (!emailValue.includes("@") && !emValue.includes(".")) {
    mailWarning.style.display = "block";
  } else if (emValue.includes("@") && emValue.includes(".")) {
    mailWarning.style.display = "none";
  }
});

firstName.addEventListener("keyup", () => {
  document.querySelector(".welcome-message h4 span").innerText =
    firstName.value;
});

password.addEventListener("keyup", function () {
  const passwordValue = password.value;
  const button = document.querySelector("#reg");

  if (passwordValue.length < 8) {
    button.style.pointerEvents = "none";
    passwordWarning.style.display = "block";
  } else {
    button.style.pointerEvents = "all";
    button.style.cursor = "pointer";
    passwordWarning.style.display = "none";
  }
});

repeatPassword.addEventListener("keyup", () => {
  const passwordValue = password.value;
  const repeatPasswordValue = repeatPassword.value;
  const button = document.querySelector("#reg");

  if (passwordValue !== repeatPasswordValue) {
    button.style.pointerEvents = "none";
    repeatPasswordWarning.style.display = "block";
  } else if (passwordValue === repeatPasswordValue) {
    button.style.pointerEvents = "all";
    button.style.cursor = "pointer";
    repeatPasswordWarning.style.display = "none";
  }
});

number.addEventListener("keyup", () => {
  const numValue = document.querySelector("#num").value;
  const alphaCheck = numValue.search(/[a-z]/i);
  const button = document.querySelector("#reg");

  if (numValue.length < 10 || numValue.length > 11) {
    numberWarning.style.display = "block";
    button.style.pointerEvents = "none";
  } else if (alphaCheck != -1) {
    numberWarning.style.display = "block";
    button.style.pointerEvents = "none";
  } else if (numValue.startsWith("0") && numValue.length < 11) {
    numberWarning.style.display = "block";
    button.style.pointerEvents = "none";
  } else if (!numValue.startsWith("0") && numValue.length > 10) {
    numberWarning.style.display = "block";
    button.style.pointerEvents = "none";
  } else {
    button.style.pointerEvents = "all";
    button.style.cursor = "pointer";
    numberWarning.style.display = "none";
  }
});

check.addEventListener("click", function () {
  password.style.border = "none";
  password.style.borderBottom = "1px solid #062863";

  if (password.type === "password" && password.value !== "") {
    password.type = "text";
    check.classList.add("check");
  } else {
    password.type = "password";
    check.classList.remove("check");
  }
});
