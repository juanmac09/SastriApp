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
        args[index].classList.remove("desaparecer");
    } 
}

// Funcion para aparecer Elementos

function desaparecerElemento(...args) {
    for (let index = 0; index < args.length; index++) {
        args[index].classList.add("desaparecer");
    }
}

// Variables boxCheck
var checkSaco = document.getElementById('saco'),
checkChaquelo = document.getElementById('chaleco'),
checkPantalon = document.getElementById('pantalon'),
checkCamisa = document.getElementById('camisa');

// Variables de Div de Medidas
var divMedidasChaqueta = document.getElementById("medidasChaqueta"),
divMedidasChaleco = document.getElementById("medidasChaleco"),
divMedidasCamisa = document.getElementById("medidasCamisa"),
divMedidasPantalon = document.getElementById("medidasPantalon");

// Variables Campos Medidas

var camposMedidasChaqueta = document.getElementsByClassName("camposMedidasChaqueta"),
camposMedidasChaleco = document.getElementsByClassName("camposMedidasChaleco"),
camposMedidasCamisa = document.getElementsByClassName("camposMedidasCamisa"),
camposMedidasPantalon = document.getElementsByClassName("camposMedidasPantalon");

// Variable Div

var divSaco = document.getElementById('camposSaco'),
divChaleco = document.getElementById('camposChaleco'),
divPantalon = document.getElementById('camposPantalon'),
divCamisa = document.getElementById('campoCamisa');

// Variables Campos 

var camposSaco = document.getElementsByClassName('campoSacoInput'),
camposChaleco = document.getElementsByClassName('campoChalecoInput'),
camposPantalon = document.getElementsByClassName('campoPantalonInput'),
camposCamisa = document.getElementsByClassName('campoCamisaInput');





function validarChecks() {
    
    if (checkSaco.checked && checkChaquelo.checked && checkPantalon.checked && checkCamisa.checked) {
        aparecerElemento(divMedidasChaqueta,divMedidasChaleco,divMedidasPantalon,divMedidasCamisa,divSaco,divChaleco,divPantalon,divCamisa);
        ponerRequired(camposMedidasChaqueta,camposMedidasChaleco,camposMedidasPantalon,camposMedidasCamisa,camposSaco,camposChaleco,camposPantalon,camposCamisa);
    }
    else if(checkSaco.checked && checkChaquelo.checked && checkPantalon.checked && !checkCamisa.checked){
        desaparecerElemento(divMedidasCamisa,divCamisa);
        quitarRequired(camposMedidasCamisa,camposCamisa);
        aparecerElemento(divMedidasChaqueta,divMedidasChaleco,divMedidasPantalon,divSaco,divChaleco,divPantalon)
        ponerRequired(camposMedidasChaqueta,camposMedidasChaleco,camposMedidasPantalon,camposSaco,camposChaleco,camposPantalon);
    }
    else if(checkSaco.checked && checkChaquelo.checked && !checkPantalon.checked && checkCamisa.checked){
        desaparecerElemento(divMedidasPantalon,divPantalon);
        quitarRequired(camposMedidasPantalon,camposPantalon);
        aparecerElemento(divMedidasChaqueta,divMedidasChaleco,divMedidasCamisa,divSaco,divChaleco,divCamisa);
        ponerRequired(camposMedidasChaqueta,camposMedidasChaleco,camposMedidasCamisa,camposSaco,camposChaleco,camposCamisa);
    }
    else if(checkSaco.checked && checkChaquelo.checked && !checkPantalon.checked && !checkCamisa.checked){
        desaparecerElemento(divMedidasCamisa,divMedidasPantalon,divCamisa,divPantalon);
        quitarRequired(camposMedidasCamisa,camposMedidasPantalon,camposCamisa,camposPantalon);
        aparecerElemento(divMedidasChaleco,divMedidasChaqueta,divChaleco,divSaco);
        ponerRequired(camposMedidasChaleco,camposMedidasChaqueta,camposChaleco,camposSaco);
    }
    else if(checkSaco.checked && !checkChaquelo.checked && checkPantalon.checked && checkCamisa.checked){
        desaparecerElemento(divMedidasChaleco,divChaleco);
        quitarRequired(camposMedidasChaleco,camposChaleco);
        aparecerElemento(divMedidasCamisa,divMedidasChaqueta,divMedidasPantalon,divCamisa,divSaco,divPantalon);
        ponerRequired(camposMedidasCamisa,camposMedidasChaqueta,camposMedidasPantalon,camposCamisa,camposSaco,camposPantalon);
    }
    else if(checkSaco.checked && !checkChaquelo.checked && checkPantalon.checked && !checkCamisa.checked){
        desaparecerElemento(divMedidasChaleco,divMedidasCamisa,divChaleco,divCamisa);
        quitarRequired(camposMedidasChaleco,camposMedidasCamisa,camposChaleco,camposCamisa);
        aparecerElemento(divMedidasChaqueta,divMedidasPantalon,divSaco,divPantalon);
        ponerRequired(camposMedidasChaqueta,camposMedidasPantalon,camposSaco,camposPantalon);
    }
    else if(checkSaco.checked && !checkChaquelo.checked && !checkPantalon.checked && !checkCamisa.checked){
        desaparecerElemento(divMedidasChaleco,divMedidasPantalon,divMedidasCamisa,divChaleco,divPantalon,divCamisa);
        quitarRequired(camposMedidasChaleco,camposMedidasPantalon,camposMedidasCamisa,camposChaleco,camposPantalon,camposCamisa);
        aparecerElemento(divMedidasChaqueta,divSaco);
        ponerRequired(camposMedidasChaqueta,camposSaco);
    }
    else if(!checkSaco.checked && checkChaquelo.checked && checkPantalon.checked && checkCamisa.checked){
        desaparecerElemento(divMedidasChaqueta,divSaco);
        quitarRequired(camposMedidasChaqueta,camposSaco);
        aparecerElemento(divMedidasCamisa,divMedidasChaleco,divMedidasPantalon,divCamisa,divChaleco,divPantalon);
        ponerRequired(camposMedidasCamisa,camposMedidasChaleco,camposMedidasPantalon,camposCamisa,camposChaleco,camposPantalon);
    }
    else if(!checkSaco.checked && checkChaquelo.checked && checkPantalon.checked && !checkCamisa.checked){
        desaparecerElemento(divMedidasChaqueta,divMedidasCamisa,divSaco,divCamisa);
        quitarRequired(camposMedidasChaqueta,camposMedidasCamisa,camposSaco,camposCamisa);
        aparecerElemento(divMedidasChaleco,divMedidasPantalon,divChaleco,divPantalon);
        ponerRequired(camposMedidasChaleco,camposMedidasPantalon,camposChaleco,camposPantalon);
    }
    else if(!checkSaco.checked && checkChaquelo.checked && !checkPantalon.checked && checkCamisa.checked){
        desaparecerElemento(divMedidasChaqueta,divMedidasPantalon,divSaco,divPantalon);
        quitarRequired(camposMedidasChaqueta,camposMedidasPantalon,camposSaco,camposPantalon);
        aparecerElemento(divMedidasChaleco,divMedidasCamisa,divChaleco,divCamisa);
        ponerRequired(camposMedidasChaleco,camposMedidasCamisa,camposChaleco,camposCamisa);
    }
    else if(!checkSaco.checked && checkChaquelo.checked && !checkPantalon.checked && !checkCamisa.checked){
        desaparecerElemento(divMedidasChaqueta,divMedidasPantalon,divMedidasCamisa,divSaco,divPantalon,divCamisa);
        quitarRequired(camposMedidasChaqueta,camposMedidasPantalon,camposMedidasCamisa,camposSaco,camposPantalon,camposCamisa);
        aparecerElemento(divMedidasChaleco,divChaleco);
        ponerRequired(camposMedidasChaleco,camposChaleco);
    }
    else if(!checkSaco.checked && !checkChaquelo.checked && checkPantalon.checked && checkCamisa.checked){
        desaparecerElemento(divMedidasChaqueta,divMedidasChaleco,divSaco,divChaleco);
        quitarRequired(camposMedidasChaqueta,camposMedidasChaleco,camposSaco,camposChaleco);
        aparecerElemento(divMedidasPantalon,divMedidasCamisa,divPantalon,divCamisa);
        ponerRequired(camposMedidasPantalon,camposMedidasCamisa,camposPantalon,camposCamisa);
    }
    else if(!checkSaco.checked && !checkChaquelo.checked && checkPantalon.checked && !checkCamisa.checked){
        desaparecerElemento(divMedidasChaqueta,divMedidasChaleco,divMedidasCamisa,divSaco,divChaleco,divCamisa);
        quitarRequired(camposMedidasChaqueta,camposMedidasChaleco,camposMedidasCamisa,camposSaco,camposChaleco,camposCamisa);
        aparecerElemento(divMedidasPantalon,divPantalon);
        ponerRequired(camposMedidasPantalon,camposPantalon);
    }
    else if(!checkSaco.checked && !checkChaquelo.checked && !checkPantalon.checked && checkCamisa.checked){
        desaparecerElemento(divMedidasChaqueta,divMedidasChaleco,divMedidasPantalon,divSaco,divChaleco,divPantalon);
        quitarRequired(camposMedidasChaqueta,camposMedidasChaleco,camposMedidasPantalon,camposSaco,camposChaleco,camposPantalon);
        aparecerElemento(divMedidasCamisa,divCamisa);
        ponerRequired(camposMedidasCamisa,camposCamisa);
    }
    else if(checkSaco.checked && !checkChaquelo.checked && !checkPantalon.checked && checkCamisa.checked){
        desaparecerElemento(divMedidasChaleco,divMedidasPantalon,divChaleco,divPantalon);
        quitarRequired(camposMedidasChaleco,camposMedidasPantalon,camposChaleco,camposPantalon);
        aparecerElemento(divMedidasChaqueta,divMedidasCamisa,divSaco,divCamisa);
        ponerRequired(camposMedidasChaqueta,camposMedidasCamisa,camposSaco,camposCamisa);
    }
    else{
        desaparecerElemento(divMedidasChaqueta,divMedidasChaleco,divMedidasPantalon,divMedidasCamisa,divSaco,divChaleco,divPantalon,divCamisa);
        quitarRequired(camposMedidasChaqueta,camposMedidasChaleco,camposMedidasPantalon,camposMedidasCamisa,camposSaco,camposChaleco,camposPantalon,camposCamisa    );
    }

    
    
}

checkSaco.addEventListener("click",validarChecks);
checkChaquelo.addEventListener("click",validarChecks);
checkPantalon.addEventListener("click",validarChecks);
checkCamisa.addEventListener("click",validarChecks);