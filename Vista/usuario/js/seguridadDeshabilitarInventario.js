var btnEliminar = document.getElementsByClassName('eliminacionInventario')

for (let index = 0; index < btnEliminar.length; index++) {
    btnEliminar[index].addEventListener('click',(e)=>{
        var valor = e.target.href;
        e.preventDefault();
        swal(
            {
                title: "Eliminar Inventario",
                text: "¿Estas seguro de eliminar el inventario?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                cancelButtonText: "No",
                confirmButtonText: "Si",
                closeOnConfirm: true,
            },
            function () {
                setTimeout(() => {
                    location.href = valor;
                }, 500);

            }
        );
    })
    
}