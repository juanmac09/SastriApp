function guardarValor(arreglo) {
    var valor = []
    for (let index = 0; index < arreglo.length; index++) {
        valor.push(arreglo[index].textContent);
    }
    return valor;
}
function compararValores(array1,array2) {
    for (let index = 0; index < array1.length; index++) {
        if (array1[index]!= array2[index]) {
            return false;
        }
    }
    return true;
}


function compararValoresVacios(array1,array2) {
    for (let index = 0; index < array1.length; index++) {
        if (array1[index]  != "" && array2[index] =="" ) {
            return false;
        }
    }
    return true;
}

function mostrarValoresAnteriores(elementos,valores) {
    for (let index = 0; index < elementos.length; index++) {
        elementos[index].textContent = valores[index]; 
    }
}
var saveChange = document.getElementById("saveChange");
var elementoChaqueta = document.getElementsByClassName("medidaChaqueta")
var elementoChaleco = document.getElementsByClassName("medidaChaleco")
var elementoCamisa = document.getElementsByClassName("medidaCamisa")
var elementoPantalon = document.getElementsByClassName("medidaPantalon")
var valorMedidaChaqueta = guardarValor(document.getElementsByClassName("medidaChaqueta"));
var valorMedidaChaleco = guardarValor(document.getElementsByClassName("medidaChaleco"));
var valorMedidaCamisa = guardarValor(document.getElementsByClassName("medidaCamisa"));
var valorMedidaPantalon = guardarValor(document.getElementsByClassName("medidaPantalon"));




saveChange.addEventListener("click",()=>{
    var confirt = confirm("Esta seguro de guardar cambios");
    if (confirt) {
        var valorNuevoMedidaChaqueta = guardarValor(document.getElementsByClassName("medidaChaqueta"));
        var valorNuevoMedidaChaleco = guardarValor(document.getElementsByClassName("medidaChaleco"));
        var valorNuevoMedidaCamisa = guardarValor(document.getElementsByClassName("medidaCamisa"));
        var valorNuevoMedidaPantalon = guardarValor(document.getElementsByClassName("medidaPantalon"));

        
        if (compararValoresVacios(valorMedidaChaqueta,valorNuevoMedidaChaqueta) && compararValoresVacios(valorMedidaChaleco,valorNuevoMedidaChaleco) && compararValoresVacios(valorMedidaCamisa,valorNuevoMedidaCamisa) && compararValoresVacios(valorMedidaPantalon,valorNuevoMedidaPantalon)){
            // Obtén la URL actual
            const url = new URL(window.location.href);
            // Crea un objeto URLSearchParams para analizar los parámetros de la URL
            const params = new URLSearchParams(url.search);
            var documento = params.get('id');

            // Actualizar y mostrar chaqueta
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                document.getElementById("idMedidasChaqueta").innerHTML = this.responseText;
              }
            };

            xmlhttp.open("GET", "../../../Controlador/controladorActualizarMedidasMostrar.php?id="+documento+"&me_talle_chaqueta="+valorNuevoMedidaChaqueta[0]+"&me_largo_chaqueta="+valorNuevoMedidaChaqueta[1]+"&me_espalda_chaqueta="+valorNuevoMedidaChaqueta[2]+"&me_hombro_chaqueta="+valorNuevoMedidaChaqueta[3]+"&me_pecho_chaqueta="+valorNuevoMedidaChaqueta[4]+"&me_cintura_chaqueta="+valorNuevoMedidaChaqueta[5]+"&me_manga_chaqueta="+valorNuevoMedidaChaqueta[6]+"&tipo=1");
            xmlhttp.send();


            // Actualizar y mostrar chaleco

            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                  document.getElementById("idMedidasChaleco").innerHTML = this.responseText;
                }
              };
  
            xmlhttp.open("GET", "../../../Controlador/controladorActualizarMedidasMostrar.php?id="+documento+"&me_largo_chaleco="+valorNuevoMedidaChaleco[0]+"&me_espalda_chaleco="+valorNuevoMedidaChaleco[1]+"&me_hombro_chaleco="+valorNuevoMedidaChaleco[2]+"&me_pecho_chaleco="+valorNuevoMedidaChaleco[3]+"&tipo=2");
            xmlhttp.send();


           // Actualizar y mostrar Camisa
            var xmlhttpCamisa = new XMLHttpRequest();
            xmlhttpCamisa.onreadystatechange = function() {
                if (xmlhttpCamisa.readyState == 4 && xmlhttpCamisa.status == 200) {
                    document.getElementById("idMedidaCamisa").innerHTML = xmlhttpCamisa.responseText;
                }
            };

            xmlhttpCamisa.open("GET", "../../../Controlador/controladorActualizarMedidasMostrar.php?id=" + documento + "&me_cuello=" + valorNuevoMedidaCamisa[0] + "&me_espalda_camisa=" + valorNuevoMedidaCamisa[1] + "&me_manga_camisa=" + valorNuevoMedidaCamisa[2] + "&me_largo_camisa=" + valorNuevoMedidaCamisa[3] + "&me_pecho_camisa=" + valorNuevoMedidaCamisa[4] + "&me_cintura_camisa=" + valorNuevoMedidaCamisa[5] + "&me_cont_puño=" + valorNuevoMedidaCamisa[6] + "&tipo=3");
            xmlhttpCamisa.send();
            
            
            // Actualizar y mostrar pantalon
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                  document.getElementById("idMedidasPantalon").innerHTML = this.responseText;
                }
              };
  
            xmlhttp.open("GET", "../../../Controlador/controladorActualizarMedidasMostrar.php?id="+documento+"&me_cintura_pantalon="+valorNuevoMedidaPantalon[0]+"&me_base_pantalon="+valorNuevoMedidaPantalon[1]+"&me_largo_pantalon="+valorNuevoMedidaPantalon[2]+"&me_rodilla_pantalon="+valorNuevoMedidaPantalon[3]+"&me_tiro_pantalon="+valorNuevoMedidaPantalon[4]+"&me_bota_pantalon="+valorNuevoMedidaPantalon[5]+"&tipo=4");
            xmlhttp.send();

            setTimeout(()=>{
             saveChange = document.getElementById("saveChange");
             elementoChaqueta = document.getElementsByClassName("medidaChaqueta")
             elementoChaleco = document.getElementsByClassName("medidaChaleco")
             elementoCamisa = document.getElementsByClassName("medidaCamisa")
             elementoPantalon = document.getElementsByClassName("medidaPantalon")
             valorMedidaChaqueta = guardarValor(document.getElementsByClassName("medidaChaqueta"));
             valorMedidaChaleco = guardarValor(document.getElementsByClassName("medidaChaleco"));
             valorMedidaCamisa = guardarValor(document.getElementsByClassName("medidaCamisa"));
             valorMedidaPantalon = guardarValor(document.getElementsByClassName("medidaPantalon"));},500)

             alert("Actualización exitosa")
            
        }
        else{
            alert("Todos los campos que no estuviesen vacios originalmente tienen que tener un valor para actualizar");
        }
    }
    else{
        mostrarValoresAnteriores(elementoChaqueta,valorMedidaChaqueta)
        mostrarValoresAnteriores(elementoChaleco,valorMedidaChaleco)
        mostrarValoresAnteriores(elementoCamisa,valorMedidaCamisa)
        mostrarValoresAnteriores(elementoPantalon,valorMedidaPantalon)
    }
    

})