$(document).ready(function(){


    var globalProductName = "";
    var globalProductDescription = "";
    var globalProductPrice = "";
    var globalProductImg = "";
    var globalProductMarca = "";
    var globalProductStock = "";
    var globalProductTipo = "";
    var globalProductCategoria = "";


    var editProduct = false;


    //Objeto producto
    product = {
        name: String,
        description: String,
        price: String,
        stock:String,
        img: String,
        stock: String,
        img: String,
        brand: String,
        type: String,
        category: String,
    }




$('.deleteProduct').click(function(){
    console.log("Eliminando producto");
    Swal.fire({
        title: 'Esta seguro?',
        text: "Este producto se eliminara permanentemente",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Eliminar',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.value) {
          //Ejecutras AJAX
          $(this).parent().parent().fadeOut();
          Swal.fire(
            'Eliminado con éxito.',
            'El producto fue eliminado',
            'success'
          )
        }
      })
})


$('.editProduct').click(function(){
    console.log("Editando producto");

    let productName = $(this).parent().parent().children('tr > td:nth-child(1)').text();
    globalProductName = productName;
    let productDescription = $(this).parent().parent().children('tr > td:nth-child(2)').text();
    globalProductDescription = productDescription
    let productPrice = $(this).parent().parent().children('tr > td:nth-child(3)').text();
    globalProductPrice = productPrice;
    let productImg = $('.productImg').attr('src');
    globalProductImg = productImg;
    let productStock = $(this).parent().parent().children('tr > td:nth-child(5)').text();
    globalProductStock = productStock
    let productMarca = $(this).parent().parent().children('tr > td:nth-child(6)').text();
    globalProductMarca = productMarca.trim();
    let productTipo = $(this).parent().parent().children('tr > td:nth-child(7)').text();
    globalProductTipo = productTipo.trim();
    let productCategoria = $(this).parent().parent().children('tr > td:nth-child(8)').text();
    globalProductCategoria = productCategoria.trim();

    $("#img").attr("src", productImg);
    $('#productName').val(productName);
    $('#productDescription').val(productDescription);
    $('#productPrice').val(productPrice);
    $('#inputMarca option:selected').text(productMarca)
    $('#inputTipo option:selected').text(productTipo)
    $('#inputCategoria option:selected').text(productCategoria)

    $('#updateProduct').css("display","block");
    $('#addProduct').css("display","none");
})





    $('.addProduct').click(function(){
        $('#productName').val('');
        $('#productDescription').val('');
        $('#productPrice').val('');
        $('#productStock').val('');
        $("#img").attr("src", '');
        $('#inputMarca option:selected').text('')
        $('#inputTipo option:selected').text('')
        $('#inputCategoria option:selected').text('')
    })


    $('body').on('click','#addProduct',function(){
        product.name = $('#productName').val();
        product.description = $('#productDescription').val();
        product.price = $('#productPrice').val();
        product.img = $('#imgContainer>img').attr('src').substr(3);
        product.stock = $('#productStock').val();
        product.brand = $('#inputMarca').val();
        product.type = $('#inputTipo').val();
        product.category = $('#inputCategoria').val();
        
        if(product.name != "" && product.description != "" && product.price != "" && product.stock != "" && product.img != "" && product.brand != "" && product.type != "" && product.category != "")
        {
            $.ajax({
                type: 'POST',
                url: '../php/script/producto/altaProducto.php',
                data: {product},
                beforeSend: function(){
                    console.log("Cargando...");
                    lockbuttons();
                },
                success: function(data){
                    $('#modalProduct').modal('hide');
                    actualizarListaInstrumentos();
                }

            })
        }else{
            console.log("Alguno de los campos se encuentra vacio");
        }





    })







    $('body').on('click','#updateProduct',function(){
        let newProductName = $('#productName').val();
        let newProductDescription = $('#productDescription').val();
        let newProductPrice = $('#productPrice').val();
        let newProductMarca = $('#inputMarca').val();
        let newProductType = $('#inputTipo').val();
        let newProductCategory = $('#inputCategoria').val();

        if(newProductName !== globalProductName ||
           newProductDescription  !== globalProductDescription ||
           newProductPrice !== globalProductPrice ||
           newProductMarca !== globalProductMarca ||
           newProductType !== globalProductTipo ||
           newProductCategory !== globalProductCategoria
            
            ){
                Swal.fire({
                            title: 'Producto modificado',
                            text: "Desea continuar con la modificación del producto",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Modificar',
                            cancelButtonText: 'Cancelar'
                            }).then((result) => {
                                if (result.value) {
                                    
                                    $('#modalProduct').modal('hide')
                                    //Ejecutar AJAX
                                    // $(this).parent().parent().fadeOut();
                                    // Swal.fire(
                                    //     'Eliminado con éxito.',
                                    //     'El producto fue eliminado',
                                    //     'success'
                                    // )
                                }
                            })

        }else{
            $('#modalProduct').modal('hide')
        }
    });


    $('body').on('change', '#file',function(){
        var property = document.getElementById("file").files[0];
        var image_name = property.name;
        var  image_extension = image_name.split('.').pop().toLowerCase();

        if(jQuery.inArray(image_extension, ['gif','png','jpg','jpeg']) == -1){

            alert("Invalid image file");
        }

        var image_size = property.size;

        if(image_size > 2000000){
            alert("Image File size is very big");
        }else{
            var form_data = new FormData();
            form_data.append("file",property);

            $.ajax({
                url: 'php/uploadImage.php',
                type: 'POST',
                data: form_data,
                contentType: false,
                processData: false,
                success: function(response){
                    if(response != 0){
                        console.log(response)
                        // $("#img").attr("src",response); 
                        $('#imgContainer').html(response);
                        // $(".preview img").show(); // Display image element
                    }else{
                        alert('file not uploaded');
                    }
                },
            });
        }
    })


    function lockbuttons(){
        $('#updateProduct').attr("disabled", true);
        $('#addProduct').attr("disabled", true);
        $('#cancelProduct').attr("disabled", true);
        $('.fa-spin').css("display","block")
    }

    function unLockbuttons(){
        $('#updateProduct').attr("disabled", false);
        $('#addProduct').attr("disabled", false);
        $('#cancelProduct').attr("disabled", false);
        $('.fa-spin').css("display","none")
    }


    function actualizarListaInstrumentos(){
        $.ajax({
            url: '../php/script/producto/obtenerInstrumentos.php',
            beforeSend: function(){
                $('.capa').fadeIn();
            },
            success: function(data){
                $('.capa').fadeOut();
                console.log(data);
                let instruments = JSON.parse(data);
                console.log("Mostrar lista: ", instruments);
                $('#tbodyProducts').html('');
                for (let i=0; i < instruments.length; i++){
                    $('#tbodyProducts').append(`<tr>
                                                    <td>${instruments[i]['nombre']}</td>
                                                    <td>${instruments[i]['descripcion']}</td>
                                                    <td>${instruments[i]['precio']}</td>
                                                    <td style="width:10%;"  ><img class="productImg" style="width:100%;" src="../${instruments[i]['imagen']}" alt=""></td>
                                                    <td>${instruments[i]['stock']}</td>
                                                    <td>${instruments[i]['idMarca']}</td>
                                                    <td>${instruments[i]['idTipoInstrumento']}</td>
                                                    <td>${instruments[i]['idCategoria']}</td>
                                                </tr>`);
                 }
                

            }

        })
    }






})