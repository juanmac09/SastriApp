function controlarMedidas(event) {
    // Reemplaza todo excepto los números y el punto decimal
    event.target.value = event.target.value.replace(/[^0-9.]/g, '');

    // Asegúrate de que haya solo un punto decimal
    if ((event.target.value.match(/\./g) || []).length > 1) {
        var puntos = event.target.value.split('.');
        event.target.value = puntos[0] + '.' + puntos.slice(1).join('');
    }
}

var documeno = document.getElementById('op')
var camposDecimal = document.getElementsByClassName('camposDecimales');
for (let index = 0; index < camposDecimal.length; index++) {
    camposDecimal[index].addEventListener('input', controlarMedidas);
}
documeno.addEventListener('input', () => {
    setTimeout(() => {
        camposDecimal = document.getElementsByClassName('camposDecimales');
        for (let index = 0; index < camposDecimal.length; index++) {
            camposDecimal[index].addEventListener('input', controlarMedidas);
        }
    }, 200);

})



