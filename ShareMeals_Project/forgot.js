var close = document.getElementById("close");
var open = document.getElementById("open");
var password = document.getElementById("password");

        function my(){
            if(password.type === "password"){
                password.type = "text";
                open.style.display = "block";
                close.style.display = "none";
            }else{
                password.type = "password";
                open.style.display = "none";
                close.style.display = "block";
            }
        }