$(document).ready(function(){
    
    var editClient = false;

    //Objeto producto
    client = {
        name: String,
        surname: String,
        mail: String,
        password:String,
        active: Boolean,
        admin: Boolean,
        telephone: String,
    }




$('.deleteClient').click(function(){
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
            let idClient = $(this).parent().parent().attr('data-id');
            console.log(idClient);
            $.ajax({
                type: 'POST',
                url: '../php/script/producto/bajaCliento.php',
                data: {idClient},
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


$('.editClient').click(function(){
    console.log("Editando producto");

    let productName = $(this).parent().parent().children('tr > td:nth-child(1)').text();
    globalClientName = productName;
    let productDescription = $(this).parent().parent().children('tr > td:nth-child(2)').text();
    globalClientDescription = productDescription
    let productPrice = $(this).parent().parent().children('tr > td:nth-child(3)').text();
    globalClientPrice = productPrice;
    let productImg = $('.productImg').attr('src');
    globalClientImg = productImg;
    let productStock = $(this).parent().parent().children('tr > td:nth-child(5)').text();
    globalClientStock = productStock
    let productMarca = $(this).parent().parent().children('tr > td:nth-child(6)').text();
    globalClientMarca = productMarca.trim();
    let productTipo = $(this).parent().parent().children('tr > td:nth-child(7)').text();
    globalClientTipo = productTipo.trim();
    let productCategoria = $(this).parent().parent().children('tr > td:nth-child(8)').text();
    globalClientCategoria = productCategoria.trim();

    $("#img").attr("src", productImg);
    $('#productName').val(productName);
    $('#productDescription').val(productDescription);
    $('#productPrice').val(productPrice);
    $('#inputMarca option:selected').text(productMarca)
    $('#inputTipo option:selected').text(productTipo)
    $('#inputCategoria option:selected').text(productCategoria)

    $('#updateClient').css("display","block");
    $('#addClient').css("display","none");
})




    //Abrir modal de alta cliente
    $('.addClient').click(function(){
        $('#clientName').val('');
        $('#clientDescription').val('');
        $('#clientPassword').val('');
        $('#clientPassword').val('');
        $('#activeSwitch').prop('checked',false);
        $('#adminSwitch').prop('checked',false);
        $('#clientTelefono').val('');

        $("#modalClient").on('shown.bs.modal', function(){
            $(this).find('#clientName').focus();
        });

        $('#updateProduct').css("display","none");
    })


    $('body').on('click','#addClient',function(){

        client.name = $('#clientName').val();
        client.surname = $('#clientDescription').val();
        client.password = $('#clientPassword').val();
        client.active = $('#activeSwitch').val();
        client.admin = $('#adminSwitch').val();
        client.telephone = $('#clientTelefono').val();
       
       
        
        if(client.name != "" && client.surname != "" && client.password != "" && client.active != "" && client.admin != "" && client.telephone != "")
        {
            $.ajax({
                type: 'POST',
                url: '../php/script/producto/altaCliente.php',
                data: {client},
                beforeSend: function(){
                    console.log("Cargando...");
                    lockbuttons();
                },
                success: function(data){
                    console.log(data);
                    $('#modalClient').modal('hide');
                    actualizarListaClientes();
                }

            })
        }else{
            console.log("Alguno de los campos se encuentra vacio");
        }





    })







    $('body').on('click','#updateClient',function(){
        let newClientName = $('#productName').val();
        let newClientDescription = $('#productDescription').val();
        let newClientPrice = $('#productPrice').val();
        let newClientMarca = $('#inputMarca').val();
        let newClientType = $('#inputTipo').val();
        let newClientCategory = $('#inputCategoria').val();

        if(newClientName !== globalClientName ||
           newClientDescription  !== globalClientDescription ||
           newClientPrice !== globalClientPrice ||
           newClientMarca !== globalClientMarca ||
           newClientType !== globalClientTipo ||
           newClientCategory !== globalClientCategoria
            
            ){
                Swal.fire({
                            title: 'Cliento modificado',
                            text: "Desea continuar con la modificación del producto",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Modificar',
                            cancelButtonText: 'Cancelar'
                            }).then((result) => {
                                if (result.value) {
                                    
                                    $('#modalClient').modal('hide')
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
            $('#modalClient').modal('hide')
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
        $('#updateClient').attr("disabled", true);
        $('#addClient').attr("disabled", true);
        $('#cancelClient').attr("disabled", true);
        $('.fa-spin').css("display","block")
    }

    function unLockbuttons(){
        $('#updateClient').attr("disabled", false);
        $('#addClient').attr("disabled", false);
        $('#cancelClient').attr("disabled", false);
        $('.fa-spin').css("display","none")
    }


    function actualizarListaInstrumentos(){
        $.ajax({
            
            url: '../php/script/producto/obtenerInstrumentos.php',
            type: 'POST',
            dataType : 'json',
            beforeSend: function(){
                $('.capa').fadeIn();
            },
            success: function(data){
                // alert(data);
                $('.capa').fadeOut();
                console.log(data);
                let instruments = JSON.parse(data);
                console.log("Mostrar lista: ", instruments);
                $('#tbodyClients').html('');
                for (let i=0; i < instruments.length; i++){
                    $('#tbodyClients').append(`<tr>
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
    }})