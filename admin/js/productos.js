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






// Funciones
$('.addProduct').click(function(){
    console.log("Agregar producto");
    $('#productName').val('');
    $('#productDescription').val('');
    $('#productPrice').val('');
    $('#file').val('');
    $("#img").attr("src", '');
    $('#inputMarca').val('');
    $('#inputTipo').val('');
    $('#inputCategoria').val('');


    $('#updateProduct').css("display","none");
    $('#addProduct').css("display","block");
    
})





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




    $('body').on('click','#addProduct',function(){

        nProduct = {
            name: String,
            description: String,
            price: String,
            img: String,
            stock: String,
            marca: String,
            tipo: String,
            category: String,
        }
        
        nProduct.name = $('#productName').val();
        nProduct.description = $('#productDescription').val();
        nProduct.price = $('#productPrice').val();
        // nProduct.img = $('.productImg').attr('src');
        nProduct.stock = $('#inputStock').val();
        nProduct.marca = $('#inputMarca option:selected').val();
        nProduct.tipo = $('#inputTipo option:selected').val();
        nProduct.category = $('#inputCategoria option:selected').val();

        console.log(nProduct);
        
        

        // $("#img").attr("src", productImg);
        // $('#productName').val(productName);
        // $('#productDescription').val(productDescription);
        // $('#productPrice').val(productPrice);
        // $('#inputMarca option:selected').text(productMarca)
        // $('#inputTipo option:selected').text(productTipo)
        // $('#inputCategoria option:selected').text(productCategoria)



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


})