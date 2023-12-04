function actualizar(event) {

    swal(
        {
            title: "Cambiar Estado",
            text: "¿Estas seguro de actualizar el estado?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            cancelButtonText: "No",
            confirmButtonText: "Si",
            closeOnConfirm: true,
        },
        function () {
            var id_pedido = event.target.getAttribute("id_ped");
            var valor = event.target.value;
            var id_cli = event.target.getAttribute("id_cli");
            var url = location.href;
            var cadena = url.split("/");
            var di = 0;
            if (cadena[cadena.length - 1] == "consultarPedido.php") {
                di = 1;
            }


            if ((event.target.classList.contains('n1') && valor != 1) ||
                (event.target.classList.contains('n2') && valor != 2) ||
                (event.target.classList.contains('n3') && valor != 3)) {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("tablabody").innerHTML = this.responseText;
                    }
                }
                xmlhttp.open("GET", "../../../Controlador/controladorIntermediario.php?idP=" + id_pedido + "&valor=" + valor + "&id_cli=" + id_cli + "&di=" + di, true);
                xmlhttp.send();

            }
        }
    );

}

document.addEventListener('change', function (event) {
    if (event.target.classList.contains('estado')) {
        actualizar(event);
    }
});
