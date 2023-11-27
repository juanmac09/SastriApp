document.addEventListener("DOMContentLoaded", function() {
    setTimeout(()=>{
        const url = new URLSearchParams(window.location.search);
        if (url.has('id_cliente')) {
            // La variable GET 'variable' existe en la URL
            var valorBusqueda = url.get('id_cliente'); // Cambia esto por el valor que desees

            // Seleccionar el input de búsqueda y establecer su valor
            var inputBusqueda = document.getElementsByClassName("input-sm");
            inputBusqueda[1].value = valorBusqueda;

            // Disparar el evento keyup en el campo de búsqueda para activar la búsqueda
            var eventoKeyup = new Event('keyup', { bubbles: true });
            inputBusqueda[1].dispatchEvent(eventoKeyup);
        } else {
            
        }
        
    },500)
});






