// Obtener elementos del DOM por su id o clase
var select = document.getElementById('tiInv');
var divExtra = document.getElementsByClassName('extra');
var precioDiv = document.getElementById('precioDiv');
var materialInv = document.getElementsByClassName('materialDiv')[0];
var proveedorDiv = document.getElementsByClassName('proveedorDiv')[0];
var pedidoDiv = document.getElementsByClassName('pedidoDiv')[0];
var materialSalidaDiv = document.getElementsByClassName('materialSalida')[0];
var inputExtra = document.getElementsByClassName('accesorioInput');
var inputPrecio = document.getElementsByClassName('precioInput');
var inputMaterial = document.getElementsByClassName('materialInput');
var inputProveedor = document.getElementsByClassName('proveedorI');
var inputPedido = document.getElementsByClassName('pedidoInput');
var inputMaterialSalida = document.getElementsByClassName('materialSalidaInput');
var observaciones = document.getElementById('observaciones');
var login = document.getElementsByClassName('login-box')[0];
var precioUnitario = document.getElementsByClassName('precioUnitario');
var PrecioTotal = document.getElementById('precioTotal');
var TipoRegistro = document.getElementById('TipoRegistro');
var registroInventarioMaterial = document.getElementById('registroInventarioMaterial');
var registroInventarioAccesorios = document.getElementById('registroInventarioAccesorios');
var precioUnitarioAccesorio = document.getElementsByClassName('precioUnitarioAccesorio');
var precioTotalInventario = document.getElementById('precioTotalInventario');
var tiInvAcc = document.getElementById('tiInvAcc');

// Función para quitar los input de precio en cuyo caso sea inventario de salida
function ocultarPreciosAccesorios() {
    var precioTotalAccesorio = document.getElementById('precioTotalAccesorio');
    var precioUnitarioAccesorioGrupo = document.getElementsByClassName('precioUnitarioAccesorioGrupo');
    if (tiInvAcc.value == 1) {
        for (let index = 0; index < precioUnitarioAccesorioGrupo.length; index++) {
            precioUnitarioAccesorioGrupo[index].classList.remove('desaparecer')
            precioUnitarioAccesorio[index].setAttribute('required', '');
            precioTotalAccesorio.classList.remove('desaparecer')
            precioTotalAccesorio.setAttribute('required', '');
        }
    }
    else if (tiInvAcc.value == 2) {
        for (let index = 0; index < precioUnitarioAccesorioGrupo.length; index++) {
            precioUnitarioAccesorioGrupo[index].classList.add('desaparecer');
            precioUnitarioAccesorio[index].removeAttribute('required');
            precioTotalAccesorio.classList.add('desaparecer');
            precioTotalAccesorio.removeAttribute('required');
        }
    }
}

// Asignar evento 
tiInvAcc.addEventListener('change', ocultarPreciosAccesorios)
// Función para mostrar u ocultar elementos según el valor de TipoRegistro
function mostrarTipoInventario() {
    // Verificar el valor de TipoRegistro
    if (TipoRegistro.value == 1) {
        // Ocultar registroInventarioAccesorios y mostrar registroInventarioMaterial
        registroInventarioAccesorios.classList.add('desaparecer');
        registroInventarioMaterial.classList.remove('desaparecer');

        // Desactivar el atributo 'required' en todos los inputs dentro de registroInventarioMaterial
        var contentenedorMaterial = registroInventarioMaterial.getElementsByTagName('input');
        for (let index = 0; index < contentenedorMaterial.length; index++) {
            contentenedorMaterial[index].removeAttribute('required');
        }
    } else if (TipoRegistro.value == 2) {
        // Mostrar registroInventarioAccesorios y ocultar registroInventarioMaterial
        registroInventarioAccesorios.classList.remove('desaparecer');
        registroInventarioMaterial.classList.add('desaparecer');

        // Activar el atributo 'required' en todos los inputExtra
        for (let index = 0; index < inputExtra.length; index++) {
            inputExtra[index].setAttribute('required', '');
        }

        // Desactivar el atributo 'required' en todos los inputs dentro de registroInventarioMaterial
        for (let index = 0; index < registroInventarioMaterial.length; index++) {
            registroInventarioMaterial[index].removeAttribute('required');
        }

        // Agregar el evento blur a los precioUnitarioAccesorio para la suma de precios
        for (let index = 0; index < precioUnitarioAccesorio.length; index++) {
            precioUnitarioAccesorio[index].addEventListener('blur', sumarPrecioTotalAcc);
        }
    } else {
        // Ocultar ambos registros
        registroInventarioAccesorios.classList.add('desaparecer');
        registroInventarioMaterial.classList.add('desaparecer');

        // Activar el atributo 'required' en todos los inputExtra
        for (let index = 0; index < inputExtra.length; index++) {
            inputExtra[index].setAttribute('required', '');
        }

        // Desactivar el atributo 'required' en todos los inputs dentro de registroInventarioMaterial
        for (let index = 0; index < registroInventarioMaterial.length; index++) {
            registroInventarioMaterial[index].removeAttribute('required');
        }
    }
}

// Agregar un evento de cambio a TipoRegistro que llama a la función mostrarTipoInventario
TipoRegistro.addEventListener('change', mostrarTipoInventario);


// Función para sumar el total de los precios en precioUnitarioAccesorio y actualizar precioTotalInventario
function sumarPrecioTotalAcc() {
    var sumaTotal = 0;
    var input;

    // Recorrer cada elemento en precioUnitarioAccesorio
    for (let index = 0; index < precioUnitarioAccesorio.length; index++) {

        // Verificar si el valor es una cadena vacía
        if (precioUnitarioAccesorio[index].value == '') {
            // Si es una cadena vacía, establecer el valor a 0
            precioUnitarioAccesorio[index].value = 0;

            // Convertir el valor a entero y sumarlo a sumaTotal
            input = parseInt(precioUnitarioAccesorio[index].value);
            sumaTotal += input;

            // Restablecer el valor a cadena vacía
            precioUnitarioAccesorio[index].value = '';
        } else {
            // Si no es una cadena vacía, convertir el valor a entero y sumarlo a sumaTotal
            input = parseInt(precioUnitarioAccesorio[index].value);
            sumaTotal += input;
        }
    }

    // Actualizar el valor de precioTotalInventario con la suma total
    precioTotalInventario.value = sumaTotal;
}


// Función para sumar el total de los precios en precioUnitario y actualizar PrecioTotal
function sumarPrecioTotal() {
    var sumaTotal = 0;
    var input;

    // Recorrer cada elemento en precioUnitario
    for (let index = 0; index < precioUnitario.length; index++) {

        // Verificar si el valor es una cadena vacía
        if (precioUnitario[index].value == '') {
            // Si es una cadena vacía, establecer el valor a 0
            precioUnitario[index].value = 0;

            // Convertir el valor a entero y sumarlo a sumaTotal
            input = parseInt(precioUnitario[index].value);
            sumaTotal += input;

            // Restablecer el valor a cadena vacía
            precioUnitario[index].value = '';
        } else {
            // Si no es una cadena vacía, convertir el valor a entero y sumarlo a sumaTotal
            input = parseInt(precioUnitario[index].value);
            sumaTotal += input;
        }
    }

    // Actualizar el valor de PrecioTotal con la suma total
    PrecioTotal.value = sumaTotal;
}

// Función para gestionar la visibilidad y requisitos de los elementos según el valor seleccionado en el elemento 'select'
function desarecerCamp() {
    if (select.value == 1) {
        // Modificar clases para mostrar u ocultar elementos
        login.classList.remove('salida');
        login.classList.remove('extra');
        login.classList.add('entrada');

        for (let index = 0; index < divExtra.length; index++) {
            divExtra[index].classList.add('desaparecer');
        }

        pedidoDiv.classList.add('desaparecer');
        materialInv.classList.remove('desaparecer');
        proveedorDiv.classList.remove('desaparecer');
        precioDiv.classList.remove('desaparecer');
        materialSalidaDiv.classList.add('desaparecer');

        // Agregar eventos y requisitos a los elementos
        for (let index = 0; index < precioUnitario.length; index++) {
            precioUnitario[index].addEventListener('blur', sumarPrecioTotal);
        }
        for (let index = 0; index < inputMaterial.length; index++) {
            inputMaterial[index].setAttribute('required', '');
        }
        for (let index = 0; index < inputProveedor.length; index++) {
            inputProveedor[index].setAttribute('required', '');
        }
        for (let index = 0; index < inputPrecio.length; index++) {
            inputPrecio[index].setAttribute('required', '');
            inputPrecio[index].setAttribute('readonly', '');
        }
        for (let index = 0; index < inputExtra.length; index++) {
            inputExtra[index].removeAttribute('required');
        }
        for (let index = 0; index < inputPedido.length; index++) {
            inputPedido[index].removeAttribute('required');
        }
        for (let index = 0; index < inputMaterialSalida.length; index++) {
            inputMaterialSalida[index].removeAttribute('required');
        }
        observaciones.removeAttribute('required');
    }
    else if (select.value == 2) {
        // Modificar clases para mostrar u ocultar elementos
        login.classList.add('salida');
        login.classList.remove('extra');
        login.classList.remove('entrada');

        for (let index = 0; index < divExtra.length; index++) {
            divExtra[index].classList.add('desaparecer');
        }
        materialSalidaDiv.classList.remove('desaparecer');
        materialInv.classList.add('desaparecer');
        proveedorDiv.classList.add('desaparecer');
        precioDiv.classList.add('desaparecer');
        pedidoDiv.classList.remove('desaparecer');

        // Agregar eventos y requisitos a los elementos
        for (let index = 0; index < inputMaterialSalida.length; index++) {
            inputMaterialSalida[index].setAttribute('required', '');
        }
        for (let index = 0; index < inputMaterial.length; index++) {
            inputMaterial[index].removeAttribute('required');
        }
        for (let index = 0; index < inputPedido.length; index++) {
            inputPedido[index].setAttribute('required', '');
        }
        for (let index = 0; index < inputProveedor.length; index++) {
            inputProveedor[index].removeAttribute('required');
        }
        for (let index = 0; index < inputPrecio.length; index++) {
            inputPrecio[index].removeAttribute('required');
            inputPrecio[index].removeAttribute('readonly');
        }
        for (let index = 0; index < inputExtra.length; index++) {
            inputExtra[index].removeAttribute('required');
        }
        observaciones.removeAttribute('required');
    }
    else {
        // Modificar clases para mostrar u ocultar elementos
        login.classList.remove('salida');
        login.classList.remove('extra');
        login.classList.remove('entrada');
        precioDiv.classList.add('desaparecer');
        pedidoDiv.classList.add('desaparecer');
        materialInv.classList.add('desaparecer');
        proveedorDiv.classList.add('desaparecer');
        materialSalidaDiv.classList.add('desaparecer');

        // Quitar requisitos de elementos
        for (let index = 0; index < inputPedido.length; index++) {
            inputPedido[index].removeAttribute('required');
        }
        for (let index = 0; index < inputMaterial.length; index++) {
            inputMaterial[index].removeAttribute('required');
        }
        for (let index = 0; index < inputProveedor.length; index++) {
            inputProveedor[index].removeAttribute('required');
        }
        for (let index = 0; index < inputPrecio.length; index++) {
            inputPrecio[index].removeAttribute('required');
            inputPrecio[index].removeAttribute('readonly');
        }
        for (let index = 0; index < inputMaterialSalida.length; index++) {
            inputMaterialSalida[index].removeAttribute('required');
        }
        observaciones.removeAttribute('required');
    }
}

// Agregar evento para ejecutar la función cuando cambie el valor de 'select'

select.addEventListener("change", desarecerCamp);


// Variables para referenciar elementos del DOM
var restar = document.getElementById('restar');
var sumar = document.getElementById('sumar');
var material = document.getElementsByClassName('materialDiv')[0];
var inputContador = document.getElementById('contadorI');
var contador = 1;
var copias = [];

// Función para agregar material
function agregarMaterial() {
    // Clonar el elemento original
    var elementoOriginal = document.querySelector('.ma');
    var elementoCopia = elementoOriginal.cloneNode(true);
    contador++;

    // Modificar los atributos del clon
    var inputsCopia = elementoCopia.querySelectorAll('input, select');
    inputsCopia.forEach(function (input) {
        // Restablecer el valor del input a vacío
        input.value = '';

        if (input.getAttribute('name')) {
            input.name = input.name.replace(/\d+$/, contador);
        }
    });

    // Agregar el clon al contenedor de material
    material.appendChild(elementoCopia);
    inputContador.value = contador;

    // Agregar la copia al array de copias
    copias.push(elementoCopia);

    // Configurar eventos después de un tiempo de espera
    setTimeout(() => {
        // Configurar eventos para los elementos 'select'
        var select = document.getElementsByClassName("select");

        function selectFormS(event) {
            event.target.style.color = '#000';
        }

        function selectFormD(event) {
            event.target.style.color = '#fff';
        }

        for (let index = 0; index < select.length; index++) {
            select[index].addEventListener("click", selectFormS);
            select[index].addEventListener("mouseout", selectFormD);
        }

        // Configurar eventos para los elementos 'precioUnitario'
        precioUnitario = document.getElementsByClassName('precioUnitario');
        for (let index = 0; index < precioUnitario.length; index++) {
            precioUnitario[index].addEventListener('blur', sumarPrecioTotal);
        }
    }, 1000);
}

// Agregar eventos para los botones de sumar y restar
sumar.addEventListener('click', agregarMaterial);
restar.addEventListener('click', eliminarUltimaCopia);


function eliminarUltimaCopia() {
    if (copias.length > 0) {
        var ultimaCopia = copias.pop(); // Obtener la última copia del array
        ultimaCopia.remove();
        contador--; // Decrementar el contador
        inputContador.value = contador;
    } else {
        alert("No hay más copias para eliminar.");
    }
}
sumar.addEventListener('click', agregarMaterial)
restar.addEventListener('click', eliminarUltimaCopia)


var restarSalida = document.getElementById('restarSalida');
var sumarSalida = document.getElementById('sumarSalida');
var materialSalida = document.getElementsByClassName('materialSalida')[0];
var inputContadorSalida = document.getElementById('contadorS');
var contadorSalida = 1
var copiasSalida = [];

// Función para agregar material de salida
function agregarMaterialSalida() {
    // Clonar el elemento original de salida
    var elementoOriginal = document.querySelector('.salidaM');
    var elementoCopia = elementoOriginal.cloneNode(true);
    contadorSalida++;

    // Modificar los atributos del clon
    var inputsCopia = elementoCopia.querySelectorAll('input, select');
    inputsCopia.forEach(function (input) {
        // Restablecer el valor del input a vacío
        input.value = '';

        if (input.getAttribute('name')) {
            input.name = input.name.replace(/\d+$/, contadorSalida);
        }
    });

    // Agregar el clon al contenedor de material de salida
    materialSalida.appendChild(elementoCopia);
    inputContadorSalida.value = contadorSalida;

    // Agregar la copia al array de copias de salida
    copiasSalida.push(elementoCopia);

    // Configurar eventos después de un tiempo de espera
    setTimeout(() => {
        // Configurar eventos para los elementos 'select'
        var select = document.getElementsByClassName("select");

        function selectFormS(event) {
            event.target.style.color = '#000';
        }

        function selectFormD(event) {
            event.target.style.color = '#fff';
        }

        for (let index = 0; index < select.length; index++) {
            select[index].addEventListener("click", selectFormS);
            select[index].addEventListener("mouseout", selectFormD);
        }
    }, 1000);
}



function eliminarUltimaCopiaSalida() {
    if (copiasSalida.length > 0) {
        var ultimaCopia = copiasSalida.pop(); // Obtener la última copia del array
        ultimaCopia.remove();
        contadorSalida--; // Decrementar el contador
        inputContadorSalida.value = contadorSalida;
    } else {
        alert("No hay más copias para eliminar.");
    }
}

sumarSalida.addEventListener('click', agregarMaterialSalida)
restarSalida.addEventListener('click', eliminarUltimaCopiaSalida)



// Variables para elementos relacionados con accesorios
var restarAccesorio = document.getElementById('restarAccesorio');
var sumarAccesorio = document.getElementById('sumarAccesorio');
var acessorio = document.getElementsByClassName('extra')[0];
var inputContadorAccesorio = document.getElementById('contadorA');
var contadorAcessorio = 1;
var copiasAccesorio = [];

// Función para agregar un accesorio
function agregarAccesorio() {
    // Clonar el elemento original de accesorio
    var elementoOriginal = document.querySelector('.acc');
    var elementoCopia = elementoOriginal.cloneNode(true);
    contadorAcessorio++;

    // Modificar los atributos del clon
    var inputsCopia = elementoCopia.querySelectorAll('input, select');
    inputsCopia.forEach(function (input) {
        // Restablecer el valor del input a vacío
        input.value = '';

        if (input.getAttribute('name')) {
            input.name = input.name.replace(/\d+$/, contadorAcessorio);
        }
    });

    // Agregar el clon al contenedor de accesorios
    acessorio.appendChild(elementoCopia);
    inputContadorAccesorio.value = contadorAcessorio;

    // Agregar la copia al array de copias de accesorios
    copiasAccesorio.push(elementoCopia);

    // Configurar eventos después de un tiempo de espera
    setTimeout(() => {
        // Configurar eventos para los elementos 'select'
        var select = document.getElementsByClassName("select");

        function selectFormS(event) {
            event.target.style.color = '#000';
        }

        function selectFormD(event) {
            event.target.style.color = '#fff';
        }

        for (let index = 0; index < select.length; index++) {
            select[index].addEventListener("click", selectFormS);
            select[index].addEventListener("mouseout", selectFormD);
        }

        // Configurar eventos para los elementos 'precioUnitarioAccesorio'
        for (let index = 0; index < precioUnitarioAccesorio.length; index++) {
            precioUnitarioAccesorio[index].addEventListener('blur', sumarPrecioTotalAcc);
        }
    }, 1000);
}



function eliminarUltimaCopiaAccesorio() {
    if (copiasAccesorio.length > 0) {
        var ultimaCopia = copiasAccesorio.pop(); // Obtener la última copia del array
        ultimaCopia.remove();
        contadorAcessorio--; // Decrementar el contador
        inputContadorAccesorio.value = contadorAcessorio;
    } else {
        alert("No hay más copias para eliminar.");
    }
}

sumarAccesorio.addEventListener('click', agregarAccesorio)
restarAccesorio.addEventListener('click', eliminarUltimaCopiaAccesorio)