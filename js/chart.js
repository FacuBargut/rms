$(document).ready(function() {
    console.log("Script cargado correctamente");

    //#region Click button borrar carrito
    $('#deleteChart').click(function(data) {
            $.ajax({
                type: 'POST',
                url: './php/script/producto/borrarCarroCompras.php',
                success: function(data) {
                    if (data.trim() === "Carrito eliminado") {
                        $('section.main').html("<h1>Carrito de compras vacio</h1>");
                        $('.cantItemChart').css("display", "none");
                        $('#deleteChart').prop("disabled", "true")
                        $('#buyChart').prop("disabled", "true")
                    }
                }
            })
        })
        //#endregion
    
    //#region Click button borrar carrito
    $('#buyChart').click(function(data) {
        $.ajax({
            type: 'POST',
            url: './php/script/usuario/validarLoginUsuario.php',
            success: function(data) {
                console.log(data);
                if (data.trim() === "Usuario aun no se logeo") {
                    // $('#myModal').on('shown.bs.modal', function () {
                    //     $('#myInput').trigger('focus')
                    //   })
                    $('#modal').modal('show');
                    $('.modal-title').text("Para finalizar la compra, necesita loguearse")
                    $('.modal-body').load("./components/forms/loginForm.php")
                    $('.modal-footer').css("display","none");
                    $('#buyChart').css("margin","0");
                    $('#deleteChart').css("margin","0");
                    setTimeout(function(){
                        $('#LoginEmail').focus();
                    }, 500);
                }else if(data.trim() === "Usuario logueado"){
                    $.ajax({
                        type: 'POST',
                        url: './php/script/producto/realizarCompra.php',
                        success: function(data){
                            console.log(data);
                        }
                    })
                }





            }
        })
    })
    //#endregion


    //#region Eliminar producto del carro de compras
    $('.deleteProductChart').click(function(){
        var idProduct = $(this).data("id");
        
        $.ajax({
            type: 'POST',
            url: './php/script/producto/eliminarProductoCarroCompras.php',
            data: {idProduct},
            success: function(data){
                console.log(data);
            }
        })

        
        console.log(idProduct);
    })
    //#endregion


})