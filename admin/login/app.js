const email = document.querySelector("#email");
const password = document.querySelector("#password");
const check = document.querySelector(".fa-eye");
const mlwang = document.querySelector(".mlwang");
const pwdwang = document.querySelector(".pwdwang");

email.addEventListener("keyup", function () {
  var emValue = email.value;

  if (!emValue.includes("@") && !emValue.includes(".")) {
    mlwang.style.display = "block";
  } else if (emValue.includes("@") && emValue.includes(".")) {
    mlwang.style.display = "none";
  }
});

password.addEventListener("keyup", function () {
  var pwdValue = password.value;
  var button = document.querySelector("#signIn");

  if (pwdValue.length < 8) {
    button.style.pointerEvents = "none";
    pwdwang.style.display = "block";
  } else {
    button.style.pointerEvents = "all";
    button.style.cursor = "pointer";
    pwdwang.style.display = "none";
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
