var pNoCoincide = document.getElementById('noCoincide');
var pDigitos = document.getElementById('digitos');
var inputPass = document.getElementById('pass');
var inputConfirPass = document.getElementById('confirPass');
var check = document.getElementById('Checkpass');



function validateInputsPasswordConfirt(event) {
    if (check.checked) {
        if (inputPass.value != inputConfirPass.value) {
            inputConfirPass.style.borderColor="#a12b42"
            pNoCoincide.classList.add("mensajeMostrar");
            event.preventDefault()
        }
        else{
            inputConfirPass.style.borderColor="#ced4da"
            pNoCoincide.classList.add("mensajeOculto");
            pNoCoincide.classList.remove("mensajeMostrar");
        }
    }
}
function validateInputsPassword(event){
    if (check.checked) {
        if (inputPass.value.length < 8) {
            inputPass.style.borderColor="#a12b42"
            pDigitos.classList.add("mensajeMostrar");
            event.preventDefault()
        }
        else{
            inputPass.style.borderColor="#ced4da"
            pDigitos.classList.add("mensajeOculto");
            pDigitos.classList.remove("mensajeMostrar");
        }
    }
}

inputPass.addEventListener('blur',validateInputsPassword)
inputConfirPass.addEventListener('blur',validateInputsPasswordConfirt)
document.getElementById("form").addEventListener('submit',validateInputsPasswordConfirt);
document.getElementById("form").addEventListener('submit',validateInputsPassword);