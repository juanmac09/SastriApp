var tipo = document.getElementById('tipo');
var DivcliDir = document.getElementById('cliDir');
var divFotoUsu = document.getElementById('fotoUsu');
var iDire = document.getElementById('dire');
var divUsu = document.getElementsByClassName("divInput");
var inUsu = document.getElementsByClassName("in");
var selectRolUsuario = document.getElementById("selectRolUsuario");
document.addEventListener("DOMContentLoaded",()=>{
    if (tipo.value == "") {
        DivcliDir.classList.add("desaparecer");
        divFotoUsu.classList.add("desaparecer");
        selectRolUsuario.classList.add("desaparecer");
        iDire.removeAttribute("required");
        for (let index = 0; index < divUsu.length; index++) {
            divUsu[index].classList.remove("desaparecer");
            inUsu[index].setAttribute("required","");
        }
    }
    else if(tipo.value == 1){
        if (!DivcliDir.classList.contains("desaparecer")) {
            DivcliDir.classList.add("desaparecer");
            iDire.removeAttribute("required");
        }
        divFotoUsu.classList.remove("desaparecer");
        selectRolUsuario.classList.remove("desaparecer");
        for (let index = 0; index < divUsu.length; index++) {
            divUsu[index].classList.remove("desaparecer");
            inUsu[index].setAttribute("required","");
        }
    }
    else if(tipo.value == 2){
        
        if (!divFotoUsu.classList.contains("desaparecer")) {
            divFotoUsu.classList.add("desaparecer");
            selectRolUsuario.classList.add("desaparecer");
        }
        DivcliDir.classList.remove("desaparecer");
        iDire.setAttribute("required",'');
        for (let index = 0; index < divUsu.length; index++) {
            divUsu[index].classList.remove("desaparecer");
            inUsu[index].setAttribute("required","");
        }
    }
    else if(tipo.value == 3){
        selectRolUsuario.classList.add("desaparecer");
        divFotoUsu.classList.add("desaparecer");
        DivcliDir.classList.remove("desaparecer");
        iDire.setAttribute("required",'');
        for (let index = 0; index < divUsu.length; index++) {
            divUsu[index].classList.add("desaparecer");
            inUsu[index].removeAttribute("required");
        }

    }
})
tipo.addEventListener('change', (event)=>{
    if (event.target.value == "") {
        DivcliDir.classList.add("desaparecer");
        divFotoUsu.classList.add("desaparecer");
        selectRolUsuario.classList.add("desaparecer");
        iDire.removeAttribute("required");
        for (let index = 0; index < divUsu.length; index++) {
            divUsu[index].classList.remove("desaparecer");
            inUsu[index].setAttribute("required","");
        }
    }
    else if(event.target.value == 1){
        if (!DivcliDir.classList.contains("desaparecer")) {
            DivcliDir.classList.add("desaparecer");
            iDire.removeAttribute("required");
        }
        divFotoUsu.classList.remove("desaparecer");
        selectRolUsuario.classList.remove("desaparecer");
        for (let index = 0; index < divUsu.length; index++) {
            divUsu[index].classList.remove("desaparecer");
            inUsu[index].setAttribute("required","");
        }
    }
    else if(event.target.value == 2){
        if (!divFotoUsu.classList.contains("desaparecer")) {
            divFotoUsu.classList.add("desaparecer");
        }
        DivcliDir.classList.remove("desaparecer");
        iDire.setAttribute("required",'');
        for (let index = 0; index < divUsu.length; index++) {
            divUsu[index].classList.remove("desaparecer");
            inUsu[index].setAttribute("required","");
        }
        selectRolUsuario.classList.add("desaparecer");
    }
    else if(event.target.value == 3){
        divFotoUsu.classList.add("desaparecer");
        DivcliDir.classList.remove("desaparecer");
        iDire.setAttribute("required",'');
        for (let index = 0; index < divUsu.length; index++) {
            divUsu[index].classList.add("desaparecer");
            inUsu[index].removeAttribute("required");
        }
        selectRolUsuario.classList.add("desaparecer");

    }
})




document.addEventListener("submit",(event)=>{
    var tipo = document.getElementById('tipo')
    
    if (tipo.value == "") {
        alert("Seleccione un rol a registrar");
        event.preventDefault();
    }
    
})


document.addEventListener("submit",(event)=>{
    var tipo = document.getElementById('tipo')
    var rolUsuario = document.getElementById("rolUsuario");

    if (tipo.value == 1 && rolUsuario.value == "") {
        alert("Seleccione un rol de usuario a registrar");
        event.preventDefault();
    }
})


