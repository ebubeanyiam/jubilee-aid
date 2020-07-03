var acc = document.querySelector(".account-button");
var sec = document.querySelector(".security-button");
var accDiv = document.querySelector(".account");
var secDiv = document.querySelector(".security");
const submit = document.querySelector(".submit");

sec.addEventListener("click", () => {
  acc.classList.remove("active");
  sec.classList.add("active");

  secDiv.classList.remove("show");
  accDiv.classList.add("show");
});

acc.addEventListener("click", () => {
  sec.classList.remove("active");
  acc.classList.add("active");

  secDiv.classList.add("show");
  accDiv.classList.remove("show");
});

//
const checkBank = () => {
  const bank = document.querySelector(".bank-choice").value;
  const type = document.querySelector(".acc-type");

  if (bank === "") {
    document.querySelector(".bank-warning").style.display = "block";
    type.style.display = "none";
  } else {
    document.querySelector(".bank-warning").style.display = "none";
    type.style.display = "block";
  }
};

checkBank();

const accType = () => {
  const type = document.querySelector(".acc-type").value;

  if (type === "") {
    document.querySelector(".type-warning").style.display = "block";
  } else {
    document.querySelector(".type-warning").style.display = "none";
    submit.classList.remove("pointer-none");
  }
};

accType();

// banks.addEventListener("onchange", () => {
//   console.log("hello wolrd");
// });
