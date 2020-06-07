var email = document.querySelector('#email');
        var password = document.querySelector('#password');
        var check = document.querySelector('.fa-eye');
        var mlwang = document.querySelector('.mlwang');
        var pwdwang = document.querySelector('.pwdwang');

        email.addEventListener('keyup', function () {
            var emValue = document.querySelector('#email').value;

            if (!emValue.includes("@") && !emValue.includes(".")) {
                mlwang.style.display = "block";
            } else if (emValue.includes("@") && emValue.includes(".")) {
                mlwang.style.display = "none";
            }
        });

        password.addEventListener("keyup", function () {
            var pwdValue = document.querySelector('#password').value;
            var button = document.querySelector('#signIn');

            if (pwdValue.length < 8) {
                button.style.pointerEvents = "none";
                button.style.backgroundColor = "#f4501eb9"
                pwdwang.style.display = "block";
            } else {
                button.style.backgroundColor = "#f4511e";
                button.style.pointerEvents = "all";
                button.style.cursor = "pointer";
                pwdwang.style.display = "none";
            }
        });

        check.addEventListener("click", function () {
            password.style.border = "none";
            password.style.borderBottom = "1px solid #f4511e";

            if (password.type === "password" && password.value !== "") {
                password.type = "text";
                check.classList.add("check")
            } else {
                password.type = "password";
                check.classList.remove("check")
            }
        });