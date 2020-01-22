$(document).ready(function() {
    
    //Inicializando
    $.ajax({
        type: 'POST',
        url: './php/script/producto/obtenerTipoInst.php',
        success: function(data){
            console.log(data);
        }
    })





})