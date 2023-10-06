const confirmaSenha = document.querySelector(".confirmaSenha");
const password = document.querySelector("#password");
const form = document.querySelector("form");
const error = document.querySelector(".error");

form.addEventListener("submit", (event) =>{
    if(password.value !== confirmaSenha.value){
        event.preventDefault();
        error.style.display = "flex";
        error.style.color = "red";
        error.innerHTML = "As senhas devem ser iguais !";
    }else{
        error.display = "none";
    }
})