var enlaces = document.getElementsByClassName('eliminar');
for (let index = 0; index < enlaces.length; index++) {

    enlaces[index].addEventListener("click", (e) => {
        var valor = e.target.href;
        e.preventDefault();

        swal(
            {
                title: "Eliminar Usuario",
                text: "¿Esta seguro de deshabilitar el usuario?",
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