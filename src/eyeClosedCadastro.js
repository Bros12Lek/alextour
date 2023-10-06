const closedEye = document.querySelector(".closedEye");

closedEye.addEventListener("click" , (event) =>{
    if(password.type === "password"){
        password.type = "text";
        closedEye.src = "https://img.icons8.com/material-outlined/24/visible--v1.png";
    }else if(password.type === "text"){
        password.type = "password";
        closedEye.src = "https://img.icons8.com/small/16/closed-eye.png";
    }
})