var tipRegistro = document.getElementById('tipRegistro');

var divMaterial = document.getElementById('divMaterial');
var divAccesorio = document.getElementById('divAccesorios');

var inputsMaterial = document.getElementsByClassName('inputMaterial');
var inputsAccesorios = document.getElementsByClassName('inputAccesorios');



// Funcion para poner en los campos required
function ponerRequired(...args) {

    for (let i = 0; i < args.length; i++) {
        for (let j = 0; j < args[i].length; j++) {
            args[i][j].setAttribute("required","");
        }
    }
    
}
// Funcion para quitar en los campos required
function quitarRequired(...args) {
    for (let i = 0; i < args.length; i++) {
        for (let j = 0; j < args[i].length; j++) {
            args[i][j].removeAttribute("required");
        }
    }
}
// Funcion para aparecer Elementos
function aparecerElemento(...args) {
    for (let index = 0; index < args.length; index++) {
        args[index].classList.remove("ocultar");
    } 
}

// Funcion para aparecer Elementos

function desaparecerElemento(...args) {
    for (let index = 0; index < args.length; index++) {
        args[index].classList.add("ocultar");
    }
}


function validarSeleccion() {
    if (tipRegistro.value == 1) {
        desaparecerElemento(divAccesorio)
        quitarRequired(inputsAccesorios)

        aparecerElemento(divMaterial)
        ponerRequired(inputsMaterial)
    }
    else if (tipRegistro.value == 2) {
        desaparecerElemento(divMaterial)
        quitarRequired(inputsMaterial)

        aparecerElemento(divAccesorio)
        ponerRequired(inputsAccesorios)
    }
    else{
        desaparecerElemento(divMaterial)
        quitarRequired(inputsMaterial)

        desaparecerElemento(divAccesorio)
        quitarRequired(inputsAccesorios)
    }
}

tipRegistro.addEventListener('change',validarSeleccion)
document.addEventListener('DOMContentLoaded',validarSeleccion)



var select = document.getElementsByClassName("select");


function validarSelect(event) {
    if (tipRegistro.value == 1) {
        for (let index = 0; index < select.length; index++) {

            if (select[index].value == "") {
                alert("Seleccione una opción en la lista desplegable")
                event.preventDefault();
            }
            
        }
    }
}


function validarTipoRegistro(event) {
    if (tipRegistro.value == "") {
        alert("Seleccione una opción para registrar")
        event.preventDefault();
    }
}
document.addEventListener("submit",validarSelect);
document.addEventListener("submit",validarTipoRegistro);