var email = document.querySelector('#email');
        var password = document.querySelector('#password');
        var rptpassword = document.querySelector('#rpt-password');
        var number = document.querySelector('#num');
        var check = document.querySelector('.fa-eye');
        var mlwang = document.querySelector('.mlwang');
        var pwdwang = document.querySelector('.pwdwang');
        var rptpwdwang = document.querySelector('.rpt-pwdwang');
        var numwang = document.querySelector('.numwang');
        
        email.addEventListener('keyup', function() {
            var emValue = document.querySelector('#email').value;

            if(!emValue.includes("@") && !emValue.includes(".")) {
                mlwang.style.display = "block";
            }
            else if(emValue.includes("@") && emValue.includes(".")) {
                mlwang.style.display = "none";
            }
        });

        password.addEventListener("keyup", function() {
            var pwdValue = document.querySelector('#password').value;
            var button = document.querySelector('#reg');

            if (pwdValue.length < 8) {
                button.style.pointerEvents = "none";
                button.style.backgroundColor = "#f4501eb9"
                pwdwang.style.display = "block";
            }
            else {
                button.style.backgroundColor = "#f4511e";
                button.style.pointerEvents = "all";
                button.style.cursor = "pointer";
                pwdwang.style.display = "none";
            }
        });

        rptpassword.addEventListener("keyup", () => {
            var pwdValue = document.querySelector('#password').value;
            var rptpwdValue = document.querySelector('#rpt-password').value;
            var button = document.querySelector('#reg');

            if (pwdValue !== rptpwdValue) {
                button.style.pointerEvents = "none";
                button.style.backgroundColor = "#f4501eb9"
                rptpwdwang.style.display = "block";
            }
            else if (pwdValue === rptpwdValue) {
                button.style.backgroundColor = "#f4511e";
                button.style.pointerEvents = "all";
                button.style.cursor = "pointer";
                rptpwdwang.style.display = "none";
            }
        })

        number.addEventListener("keyup", () => {
            const numValue = document.querySelector('#num').value;
            const alphaCheck = numValue.search(/[a-z]/i);
            var button = document.querySelector('#reg');

            if (numValue.length < 10 || numValue.length > 11) {
                numwang.style.display = "block";
                button.style.pointerEvents = "none";
                button.style.backgroundColor = "#f4501eb9"
            }
            else if (alphaCheck != -1) {
                numwang.style.display = "block";
                button.style.pointerEvents = "none";
                button.style.backgroundColor = "#f4501eb9"
            }
            else if (numValue.startsWith("0") && numValue.length < 11) {
                numwang.style.display = "block";
                button.style.pointerEvents = "none";
                button.style.backgroundColor = "#f4501eb9"
            }
            else if (!numValue.startsWith("0") && numValue.length > 10) {
                numwang.style.display = "block";
                button.style.pointerEvents = "none";
                button.style.backgroundColor = "#f4501eb9"
            }
            else {
                button.style.backgroundColor = "#f4511e";
                button.style.pointerEvents = "all";
                button.style.cursor = "pointer";
                numwang.style.display = "none";
            }
        });

        check.addEventListener("click", function() {
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