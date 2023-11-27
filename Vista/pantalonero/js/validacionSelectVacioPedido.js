var selectTipoPedido = document.getElementsByClassName("selectTipoPedido");
var selectCamisa = document.getElementsByClassName("selectCamisa");
var selectChaqueta = document.getElementsByClassName("selectChaqueta");
var selectPantalon = document.getElementsByClassName("selectPantalon");
// Variables boxCheck
var checkSaco = document.getElementById('saco'),
checkPantalon = document.getElementById('pantalon'),
checkCamisa = document.getElementById('camisa');
var checkChaleco = document.getElementById('chaleco');
var total = document.getElementById('total')
var abono = document.getElementById('abono')
function validarSelectTipoPedido(event) {
    for (let index = 0; index < selectTipoPedido.length; index++) {

        if (selectTipoPedido[index].value == "") {
            alert("Seleccione una opción en la lista desplegable tipo pedido")
            event.preventDefault();
        }
        
    }
    
}

function validarSelectChaqueta(event) {
    if (checkSaco.checked) {
        for (let index = 0; index < selectChaqueta.length; index++) {

            if (selectChaqueta[index].value == "") {
                alert("Seleccione una opción en la lista desplegable de chaqueta")
                event.preventDefault();
            }
            
        }
    }
}

function validarSelectCamisa(event) {
    if (checkCamisa.checked) {
        for (let index = 0; index < selectCamisa.length; index++) {

            if (selectCamisa[index].value == "") {
                if (index == 1) {
                    alert("Seleccione una opción en la listas desplegables de camisa")
                }
                event.preventDefault();
            }
            
        }
    }
}

function validarSelectPantalon(event) {
    if (checkPantalon.checked) {
        for (let index = 0; index < selectPantalon.length; index++) {

            if (selectPantalon[index].value == "") {
                alert("Seleccione una opción en la lista desplegable de pantalon")
                event.preventDefault();
            }
            
        }
    }
}


function checkBoxVacioEnvio(event) {
    if (!checkPantalon.checked && !checkCamisa.checked && !checkSaco.checked && !checkChaleco.checked) {
        alert("Seleccione una opción entre Chaleco, Chaqueta y/o Pantalón")
        event.preventDefault();
    }
}

function validarTotalAbono(event) {
    if (parseInt(total.value) < parseInt(abono.value)) {
        alert("El abono no puede ser mayor al total")
        event.preventDefault();
    }
}


document.addEventListener("submit",validarSelectTipoPedido);
document.addEventListener("submit",validarSelectChaqueta);
document.addEventListener("submit",validarSelectCamisa);
document.addEventListener("submit",validarSelectPantalon);
document.addEventListener("submit",checkBoxVacioEnvio);
document.addEventListener("submit",validarTotalAbono)




