var select = document.getElementsByClassName("select");


function validarSelect(event) {
    for (let index = 0; index < select.length; index++) {

        if (select[index].value == "") {
            alert("Seleccione una opción en la lista desplegable")
            event.preventDefault();
        }
        
    }
    
}

document.addEventListener("submit",validarSelect);


