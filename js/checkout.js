$(document).ready(function() {
    console.log("Script cargado");

    //Inicializo pagina con la carga de direcciones del usuario

    cargarDireccionesUsuario();

    //Creo objeto de orden
    var orden = {
        direccion: "",
        envio: "",
        pago: "",
    }



    //#region Nueva Direccion
    $('body').on('click', '#newAdress', function() {
            $('#checkout').load('./components/breadcrumbs/nuevaDireccion.php');
            setTimeout(function() {
                $('#inputDireccion').focus();
            }, 500);
        })
        //#endregion

    //#region Guardar Direccion
    $('body').on('click', '#saveAdress', function(e) {

            e.preventDefault();

            console.log("Se guarda la direccion");

            if (!validarInputs()) {
                limpiarPantalla();
                return;
            }


            var datosDireccion = {
                direccion: $('#inputDireccion').val(),
                numero: $('#inputNumero').val(),
                departamento: $('#inputDepartamento').val(),
                localidad: $('#inputLocalidad').val(),
                codigoPostal: $('#inputCodigoPostal').val(),
                provincia: $('#inputProvincia').val()
            }



            $.ajax({
                type: 'POST',
                url: './php/script/usuario/guardarDireccion.php',
                data: { datosDireccion },
                success: function(data) {
                    console.log(data);
                    if (data.trim() == "Direccion cargada con exito") {
                        cargarDireccionesUsuario()
                    }
                }
            })

        })
        //#endregion

    //#region Cancelar guardado de direccion
    $('body').on('click', '#toDireccion', function() {
            $('#checkout').load('./components/breadcrumbs/direccion.php');
        })
    //#endregion


    //#region Ir a forma de pago
    $('body').on('click', '#toFormaPago', function() {

        if(!$("input[name=direccion]").is(":checked")){
            alert("Debe seleccionar alguna de las direcciones cargadas");
            return false;
        }
        
         $("input[name=direccion]").each(function (index){
            if($(this).is(":checked")){
                orden.direccion = $(this).val();
                if($(this).val() === "Santa Fe 2141 - Rosario - Santa Fe"){
                    orden.envio = "Retira en local";
                }else{
                    orden.envio = "Envío a cargo de la empresa";
                }
                $('.breadcrumb>li:nth-child(1)').css("color","grey");
                $('.breadcrumb>li:nth-child(2)').css("color","black");
                $('#checkout').load('./components/breadcrumbs/forma-pago.php');
                return false;
            }

         })   

         console.log(orden);
        
    })
    //endregion

        //#region Ir a confirmar
        $('body').on('click', '#toConfirmar', function() {

            if(!$("input[name=pago]").is(":checked")){
                alert("Debe seleccionar alguna forma de pago");
                return false;
            }
            
             $("input[name=pago]").each(function (index){
                if($(this).is(":checked")){
                    orden.pago = $(this).val();
                    $('.breadcrumb>li:nth-child(2)').css("color","grey");
                    $('.breadcrumb>li:nth-child(3)').css("color","black");
                    $('#checkout').load('./components/breadcrumbs/confirmar.php',function(){
                        $('#direccion').text(orden.direccion);
                        $('#envio').text(orden.envio);
                        $('#pago').text(orden.pago);
                    });
                    return false;
                }
    
             })
             
             
    
             console.log(orden);
            
        })
        //endregion
        $('body').on('click','#modificar',function(){
            cargarDireccionesUsuario();
        })
        //#region finalizar y comprar
        $('body').on('click','#finalizarCompra',function(){
            $.ajax({
                type: 'POST',
                url: './php/script/producto/realizarCompra.php',
                success: function(data){
                    if(data.trim() === "Compra registrada"){
                        window.location.href = "./compra";
                    } 
                }
            })
        })
        //#endregion


})




//--------------------------------------------------------------------------------------------
function validarInputs() {

    let direccion = $('#inputDireccion').val();
    let numero = $('#inputNumero').val();
    let departamento = $('#inputDepartamento').val();
    let localidad = $('#inputLocalidad').val();
    let codigoPostal = $('#inputCodigoPostal').val();
    let provincia = $('#inputProvincia').val();


    if (direccion.trim() == "" ||
        numero.trim() == "" ||
        departamento.trim() == "" ||
        localidad.trim() == "" ||
        codigoPostal.trim() == "" ||
        provincia.trim() == "") {

        return false;
    } else {
        return true;
    }
}

function limpiarPantalla() {
    $('#inputDireccion').val('');
    $('#inputNumero').val('');
    $('#inputDepartamento').val('');
    $('#inputLocalidad').val('');
    $('#inputCodigoPostal').val('');
    $('inputProvincia').val('');
}

function cargarDireccionesUsuario() {
    $.ajax({
        type: 'POST',
        url: './php/script/usuario/obtenerDirecciones.php',
        success: function(data) {
            console.log(data);
            $('#checkout').load('./components/breadcrumbs/direccion.php',function(){
                $('.form-check>label:nth-child(1)>input').prop("checked",true);
            });
        }
    })
}