const inicioViagem = document.querySelector("#inicioViagem");
const fimViagem = document.querySelector("#fimViagem");
const input = document.querySelectorAll("input");

function formatarData(e){

    var v = e.target.value.replace(/\D/g,"");
    
    v=v.replace(/(\d{2})(\d)/,"$1/$2") 
    
    v=v.replace(/(\d{2})(\d)/,"$1/$2") 
    
    e.target.value = v;
}

input.forEach((element) =>{
    element.addEventListener("focus", (event) =>{
        event.target.style.borderColor = "#0e4861"
    });

    element.addEventListener("keyup", (event) =>{
        if(event.target.value !== null || event.target.value !== ""){
            event.target.style.borderColor = "#0e4861";

        }
    });

    element.addEventListener("blur", (event) =>{
        if(event.target.value === null || event.target.value === ""){
            event.target.style.borderColor = "gray";
        }
    });
})

inicioViagem.addEventListener("keyup", formatarData);
fimViagem.addEventListener("keyup",formatarData)