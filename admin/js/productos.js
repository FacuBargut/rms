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

    function cleanObject(){
        product.name = "";
        product.description = "";
        product.price = "";
        product.stock = "";
        product.img = "";
        product.img = "";
        product.brand = "";
        product.type = "";
        product.category = "";
    }


$('.deleteProduct').click(function(){
    var _this = $(this);
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
            let idProduct = $(this).parent().parent().attr('data-id');
            console.log(idProduct);
            $.ajax({
                type: 'POST',
                url: '../php/script/producto/bajaProducto.php',
                data: {idProduct},
                success: function(data){
                    console.log(data);
                    if (data.trim() === "El producto se elimino correctamente"){
                        _this.parent().parent().fadeOut();
                        Swal.fire(
                          'Eliminado con éxito.',
                          'El producto fue eliminado',
                          'success'
                        )
                        

                    }else{
                        alert("Ocurrio un problema");
                        location.reload();
                    }


                }

            })
        }
      })
})


$('.editProduct').click(function(){
    console.log("Editando producto");
    cleanObject();
    unLockbuttons();
    console.log("Editando producto");
    product.name = $(this).parent().parent().children('tr > td:nth-child(1)').text();
    
    product.description = $(this).parent().parent().children('tr > td:nth-child(2)').text();
    
    product.price = $(this).parent().parent().children('tr > td:nth-child(3)').text();
    product.img = $('.productImg').attr('src');
    product.stock = $(this).parent().parent().children('tr > td:nth-child(5)').text();
    product.brand = $(this).parent().parent().children('tr > td:nth-child(6)').text();
    
    product.type = $(this).parent().parent().children('tr > td:nth-child(7)').text();
    
    product.category = $(this).parent().parent().children('tr > td:nth-child(8)').text();

    $("#img").attr("src", product.img);
    $('#productName').val(product.name);
    $('#productDescription').val(product.description);
    $('#productPrice').val(product.price);
    $('#inputMarca option:selected').text(product.brand)
    $('#inputTipo option:selected').text(product.type)
    $('#inputCategoria option:selected').text(product.category)

    $('#updateProduct').css("display","block");
    $('#addProduct').css("display","none");
})





    $('.addProduct').click(function(){
        cleanObject();
        $('#productName').val('');
        $('#productDescription').val('');
        $('#productPrice').val('');
        $('#productStock').val('');
        $("#img").attr("src", '');
        $('#inputMarca option:selected').text('')
        $('#inputTipo option:selected').text('')
        $('#inputCategoria option:selected').text('')

        $("#modalProduct").on('shown.bs.modal', function(){
            $(this).find('#productName').focus();
        });

        $('#updateProduct').css("display","none");
        $('#addProduct').css("display","block");
        unLockbuttons();
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
                    console.log(data);
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
        let idProduct = product.id;

        if(newProductName !== product.name ||
           newProductDescription  !== product.description ||
           newProductPrice !== product.price ||
           newProductMarca !== product.brand ||
           newProductType !== product.type ||
           newProductCategory !== product.category
            
            ){
                cleanObject();
                product.name = newProductName
                product.description = newProductDescription
                product.price = newProductPrice
                product.brand = newProductMarca
                product.type = newProductType
                product.category = newProductCategory
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
                                    
                                    $.ajax({
                                        type: 'POST',
                                        url: '../php/script/producto/modificarProducto.php',
                                        data: {product,idProduct},
                                        beforeSend: function(){
                                            console.log("Cargando...");
                                            $('.capa').fadeIn();
                                            lockbuttons();
                                        },
                                        success: function(data){
                                            console.log(data);
                                            $('.capa').fadeOut();
                                            $('#modalUser').modal('hide');
                                            actualizarListaInstrumentos();
                                        }
                        
                                    })
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
            type: 'POST',
            beforeSend: function(){
                $('.capa').fadeIn();
            },
            success: function(data){
                // alert(data);
                $('.capa').fadeOut();
                console.log(data);
                let instruments = JSON.parse(data);
                console.log("Mostrar lista: ", instruments);
                $('#tbodyProducts').html('');
                for (let i=0; i < instruments.length; i++){
                    $('#tbodyProducts').append(`<tr data-id=${instruments[i]['id']}>
                                                    <td>${instruments[i]['nombre']}</td>
                                                    <td>${instruments[i]['descripcion']}</td>
                                                    <td>${instruments[i]['precio']}</td>
                                                    <td style="width:10%;"  ><img class="productImg" style="width:100%;" src="../${instruments[i]['imagen']}" alt=""></td>
                                                    <td>${instruments[i]['stock']}</td>
                                                    <td>${instruments[i]['idMarca']}</td>
                                                    <td>${instruments[i]['idTipoInstrumento']}</td>
                                                    <td>${instruments[i]['idCategoria']}</td>
                                                    <td>
                                                        <button class="btn btn-danger btn-circle deleteProduct">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    <button class="btn btn-warning btn-circle editProduct" data-toggle="modal" data-target="#modalProduct">
                                                            <i class="fas fa-exclamation-triangle"></i>
                                                    </button>
                                                    </td>
                                                </tr>`);
                 }
                

            }

        })
    }


    $('body').on('keyup','#productName',function(){
        if($(this).val().length>0 && $(this).val().length<5){
            $(this).val($(this).val().charAt(0).toUpperCase()+$(this).val().substr(1));
        }
    })
    $('body').on('keyup','#productDescription',function(){
        if($(this).val().length>0 && $(this).val().length<5){
            $(this).val($(this).val().charAt(0).toUpperCase()+$(this).val().substr(1));
        }
    })




})