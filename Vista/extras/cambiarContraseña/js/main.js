var noCoincide = document.getElementById("noCoincide");
var digitos =document.getElementById("digitos");
var inputPass = document.getElementById("pass");
var inputConfirt =document.getElementById("confirt");


function validarDigitos(event) {
    if (inputPass.value.length < 8) {
        digitos.classList.remove("ocultar");
        inputPass.style.borderColor="#a12b42";
        event.preventDefault();
    }
    else{
        digitos.classList.add("ocultar");
        inputPass.style.borderColor="#fff";
    }
}

function validarConfirt(event) {
    if (inputPass.value != inputConfirt.value) {
        noCoincide.classList.remove("ocultar");
        inputConfirt.style.borderColor="#a12b42";
        event.preventDefault();
    }
    else{
        noCoincide.classList.add("ocultar");
        inputConfirt.style.borderColor="#fff";
    }
}

inputPass.addEventListener("blur",validarDigitos);
inputConfirt.addEventListener("blur",validarConfirt);
document.addEventListener("submit",validarDigitos);
document.addEventListener("submit",validarConfirt);