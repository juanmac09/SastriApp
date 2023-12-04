var btnPedido = document.getElementsByClassName('btnPedidoCliente')
for (let index = 0; index < btnPedido.length; index++) {
    btnPedido[index].addEventListener('click', (e) => {
        var valor = e.target.getAttribute("id_cliente");
        swal(
            {
                title: "Gestionar Pedido",
                text: "",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Consultar Pedidos",
                cancelButtonText: "Registrar Pedido",
                closeOnConfirm: true,
                closeOnCancel: false,
            },
            function (isConfirm) {
                document.removeEventListener('keydown', handleKeyDown);  // Retiramos el listener después de usarlo
                if (isConfirm) {
                    var datosCliente = valor.split("-");
                    valor = datosCliente[0];
                    location.href = "consultarPedido.php?id_cliente=" + valor;
                } else {
                    // Redirigir solo si no se presionó la tecla Escape
                    setTimeout(() => {
                        location.href = "formularioRegistroPedido.php?id_cliente=" + valor;
                    }, 500);
                }
            }
        );

        // Manejador de teclado
        function handleKeyDown(event) {
            // 27 es el código de tecla para la tecla Escape
            if (event.which === 27) {
                swal.close();  // Cierra el modal en lugar de redirigir
            }
        }

        // Agregar el listener para capturar la tecla Escape
        document.addEventListener('keydown', handleKeyDown);
    });
}