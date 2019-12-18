$(document).ready(function() {
    
    var precio = $('#precioProducto').val();
    $('#total').val(precio);
    console.log(precio);
    var precio = precio.toString();
    var rep = precio.split(".").length-1;
    
    for(var i=0; i < rep; i++){
        var precio = precio.replace(".","");
    }
    console.log(precio);
    var precio = precio.replace(",",".")
    var precio = parseFloat(precio);
    console.log(precio);

    //#region Cambiar Cantidad
    $('#cantidadProducto').change(function(){
        let nPrice = this.value*precio;
        let nPrice2 = nPrice.toFixed(2);
        let nPrice3 = nPrice2.replace(".",",");


        let second_part = nPrice3.slice(-6);
        var first_part = nPrice3.slice(0,-6);
        console.log("primera parte: ",first_part);

        if(first_part.length == 4){
            let first_part1 = first_part.slice(0,1);
            let first_part2 = first_part.slice(-3);
            var first_part = first_part1+"."+first_part2;
        }

        let total = first_part+"."+second_part;

        $('#total').val(total);
    })
    //#endregion



    //#region Agregar a Carrito
    $('#addProduct').click(function(){
        var producto = {
            nombre: $('#nombreProducto').text(),
            cantidad : $('#cantidadProducto').val(),
            precio : precio,
            img : $('#imgProducto').attr('src')
        }

        console.log(producto);


        // $.ajax({
        //     url:'agregarProductoCarroCompras',
        //     data:

        // })
    })
})