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
    $('body').on('click','#saveAdress',function(e){

        e.preventDefault();

        console.log("Se guarda la direccion");

        if(!validarInputs()){
            limpiarPantalla();
            return;
        }


        var datosDireccion = {
            direccion : $('#inputDireccion').val(),
            numero : $('#inputNumero').val(),
            departamento : $('#inputDepartamento').val(),
            localidad : $('#inputLocalidad').val(),
            codigoPostal : $('#inputCodigoPostal').val(),
            provincia : $('#inputProvincia').val()
        }
        


        $.ajax({
            type: 'POST',
            url: './php/script/usuario/guardarDireccion.php',
            data: { datosDireccion },
            success: function(data){
                console.log(data);
            }
        })

    })
    //#endregion

    //#region Cancelar guardado de direccion
    $('body').on('click','#cancel',function(){
        $('#checkout').load('./components/breadcrumbs/direccion.php');
    })
    //#endregion


})




//--------------------------------------------------------------------------------------------
function validarInputs(){

    let direccion = $('#inputDireccion').val();
    let numero = $('#inputNumero').val();
    let departamento = $('#inputDepartamento').val();
    let localidad = $('#inputLocalidad').val();
    let codigoPostal = $('#inputCodigoPostal').val();
    let provincia = $('#inputProvincia').val();


    if(direccion.trim() == "" ||
       numero.trim() == "" ||
       departamento.trim() == "" ||
       localidad.trim() == "" ||
       codigoPostal.trim() == "" ||
       provincia.trim() == ""){

       return false; 
    }else{
        return true;
    }
}

function limpiarPantalla(){
    $('#inputDireccion').val('');
    $('#inputNumero').val('');
    $('#inputDepartamento').val('');
    $('#inputLocalidad').val('');
    $('#inputCodigoPostal').val('');
    $('inputProvincia').val('');
}