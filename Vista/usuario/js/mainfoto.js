

// Contenedor modal
var contentModal = document.getElementById('exampleModal')
var fotoPrincipal = document.getElementById('fotoPrincipal');


var CheckFotoDiv = document.getElementById('CheckFotoDiv');
var photoCheckDiv = document.getElementById('photoCheckDiv');
var CheckFoto = document.getElementById('CheckFoto');
var photocheck = document.getElementById('photocheck');

if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {

    CheckFoto.addEventListener('click',()=>{
        if (CheckFoto.checked) {
            photocheck.setAttribute('required','')
        }
        else{
            photocheck.removeAttribute('required')
        }
    })
    
} else {
    CheckFotoDiv.style.display ='none';
    photoCheckDiv.style.display ='none';

    fotoPrincipal.setAttribute('data-bs-toggle','modal')
    fotoPrincipal.setAttribute('data-bs-target','#exampleModal')
    contentModal.innerHTML = `
    <div class="modal-dialog">
        <form action="../../../Controlador/controladorActualizarUsuario.php" method="POST"  enctype="multipart/form-data">
            <div class="modal-content">

                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        Cambiar foto del perfil
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label class="custom-file-upload">
                        <input type="file" class="form-control" id="formFileMultiple" name="fotosubida" accept="image/png, .jpeg, .jpg" required />
                        </label>

                        <p id="nameFoto"></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancelar
                    </button>
                    <button type="submit" name="cambiarFoto" class="btn btn-primary">
                        Guardar cambios
                    </button>
                </div>

            </div>
        </form>
    </div>`;

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
}

