const aside = document.querySelector("aside");
const toggle_menu = document.querySelector(".toggle-menu");
const imgLogo = document.querySelector("#imgLogo");
const main = document.querySelector("main");

toggle_menu.addEventListener("click", (event) =>{
    aside.classList.toggle("active");
    imgLogo.classList.toggle("rotate")
})

main.addEventListener("click", (event) =>{
    if(aside.classList.contains("active")){
        aside.classList.remove("active");
        imgLogo.classList.remove("rotate");
    }
})