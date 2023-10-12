const aside = document.querySelector("aside");
const toggle_menu = document.querySelector(".toggle-menu");
const imgLogo = document.querySelector("#imgLogo")

toggle_menu.addEventListener("click", (event) =>{
    
    aside.classList.toggle("active");
    imgLogo.classList.toggle("rotate")
})