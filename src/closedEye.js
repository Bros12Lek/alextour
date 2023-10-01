const closedEye = document.querySelector(".closedEye");
const senha = document.querySelector("#senha")

closedEye.addEventListener("click" , (event) =>{
    if(senha.type === "password"){
        senha.type = "text";
        closedEye.src = "https://img.icons8.com/material-outlined/24/visible--v1.png";
    }else if(senha.type === "text"){
        senha.type = "password";
        closedEye.src = "https://img.icons8.com/small/16/closed-eye.png";
    }
})