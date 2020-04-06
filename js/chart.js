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
                    window.location.href = "./checkout";
                }





            }
        })
    })
    //#endregion


    //#region Eliminar producto del carro de compras
    $('.deleteProductChart').click(function(){
        var idProduct = $(this).data("id");
        var _this = $(this).parent().parent();
        var precioProd = $(this).parent().parent().find('td:eq(4)>p');
        
        $.ajax({
            type: 'POST',
            url: './php/script/producto/eliminarProductoCarroCompras.php',
            data: {idProduct},
            success: function(data){
                console.log(data);
                _this.fadeOut(300, function(){
                    let total = $('#totalChart>input').val();
                    let nTotal = parseInt(total) - parseInt(precioProd.text());
                    console.log("Total carrito: ", nTotal);
                    $('#totalChart>input').val(nTotal);
                    // console.log(total);
                    // console.log(precioProd.text());
                    // // console.log(total - );
                    $(this).remove();
                })
                
            }
        })
        
        console.log(idProduct);
    })

    // $('body').on('change', 'body > div.wrapper > section > table > tbody > tr > td > input[type=number]',function(){
    //         console.log("Modificacion");
    // })

    $('.cantProduct').change(function (e) { 
        const options2 = { style: 'currency', currency: 'USD' };
        let cantProduct = parseInt($(this).val());
        let priceProduct = parseFloat($(this).parent().parent().find("td:eq(2)>p").text());
        let newSubtProduct = cantProduct * priceProduct;
        const numberFormat = new Intl.NumberFormat('en-US', options2);
        $(this).parent().parent().find("td:eq(4)>p").text(numberFormat.format(newSubtProduct));
        let total = parseInt($('#totalChart>input').val());
        
        $('div.wrapper > section > table > tbody > tr > td:eq(4)').each(function() {
            console.log($(this).text());
        });
        
        
        $('#totalChart>input').val(total);
    });


    //#endregion


})