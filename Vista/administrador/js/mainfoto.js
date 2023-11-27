// Obtén el input de tipo file
var input = document.getElementById('formFileMultiple');

// Añade un evento change para detectar cuando se selecciona un archivo
input.addEventListener('change', function() {
    // Obtén el nombre del archivo seleccionado
    var fileName = input.files[0].name;
    // Obtén el botón personalizado
    var customButton = document.getElementById('nameFoto');
    // Cambia el texto del botón con el nombre del archivo
    customButton.textContent = fileName;
});
