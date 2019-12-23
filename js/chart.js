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