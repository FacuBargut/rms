$(document).ready(function() {
    console.log("Script cargado");

    //Inicializo pagina con la carga de direccion
    $('#checkout').load('./components/breadcrumbs/direccion.php');


    //#region Nueva Direccion
    $('body').on('click','#newAdress',function(){
        $('#checkout').load('./components/breadcrumbs/nuevaDireccion.php');
        setTimeout(function(){
            $('#inputDireccion').focus();
          }, 500);
    })
    //#endregion

    //#region Guardar Direccion
    $('body').on('click','#saveAdress',function(){
        console.log("Se guarda la direccion");
    })
    //#endregion

    //#region Cancelar guardado de direccion
    $('body').on('click','#cancel',function(){
        $('#checkout').load('./components/breadcrumbs/direccion.php');
    })
    //#endregion


})