$(document).ready(function(){
    
    var editUser = false;

    //Objeto producto
    user = {
        id: String,
        name: String,
        surname: String,
        mail: String,
        password:String,
        active: Boolean,
        admin: Boolean,
        telephone: String,
    }

    function cleanObject(){
        user.name = "";
        user.surname = "";
        user.mail = "";
        user.password = "";
        user.active = "";
        user.admin = "";
        user.telephone = "";
    }




$('body').on('click','.deleteUser', function(){
    var _this = $(this);
    console.log("Eliminando producto");
    Swal.fire({
        title: 'Esta seguro?',
        text: "Este usuario se eliminara permanentemente",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Eliminar',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.value) {
            let idUser = $(this).parent().parent().attr('data-id');
            console.log(idUser);
            $.ajax({
                type: 'POST',
                url: '../php/script/usuario/bajaUsuario.php',
                data: {idUser},
                success: function(data){
                    console.log(data);
                    if (data.trim() === "El usuario se elimino correctamente"){
                        _this.parent().parent().fadeOut();
                        Swal.fire(
                          'Eliminado con éxito.',
                          'El usuario fue eliminado',
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


$('body').on('click','.editUser', function(){
    cleanObject();
    unLockbuttons();
    console.log("Editando usuario");

    user.id = $(this).parent().parent().data('id');
    user.name = $(this).parent().parent().children('tr > td:nth-child(1)').text();
    user.surname = $(this).parent().parent().children('tr > td:nth-child(2)').text();
    user.mail = $(this).parent().parent().children('tr > td:nth-child(3)').text();
    user.password = $(this).parent().parent().children('tr > td:nth-child(4)').text();
    user.active = $(this).parent().parent().children('tr > td:nth-child(5)').text();
    user.admin = $(this).parent().parent().children('tr > td:nth-child(6)').text();
    user.telephone = $(this).parent().parent().children('tr > td:nth-child(7)').text();

    $('#userName').val(user.name);
    $('#userSurname').val(user.surname);
    $('#userMail').val(user.mail);
    $('#userPassword').val(user.password);
    $('#userTelefono').val(user.telephone);

    if(user.active.trim() === "Si"){
        $("#activeSwitch").prop("checked", true);
    }else{
        $("#activeSwitch").prop("checked", false);
    }
    if(user.admin.trim() === "Si"){
        $("#adminSwitch").prop("checked", true);
    }else{
        $("#adminSwitch").prop("checked", false);
    }

    $('#updateUser').css("display","block");
    $('#addUser').css("display","none");
})




    //Abrir modal de alta usere
    $('.addUser').click(function(){
        cleanObject();
        $('#userName').val('');
        $('#userSurname').val('');
        $('#userMail').val('');
        $('#userPassword').val('');
        $('#activeSwitch').prop('checked',false);
        $('#adminSwitch').prop('checked',false);
        $('#userTelefono').val('');

        $("#modalUser").on('shown.bs.modal', function(){
            $(this).find('#userName').focus();
        });

        $('#updateUser').css("display","none");
        $('#addUser').css("display","block");
        unLockbuttons();
    })


    $('body').on('click','#addUser',function(){

        user.name = $('#userName').val();
        user.surname = $('#userSurname').val();
        user.mail = $('#userMail').val();
        user.password = $('#userPassword').val();
        user.active = $('#activeSwitch').is(':checked');
        user.admin = $('#adminSwitch').is(':checked');
        user.telephone = $('#userTelefono').val();
       
       
        
        if(user.name != "" && user.surname != "" && user.password != "" && user.telephone != "")
        {
            $.ajax({
                type: 'POST',
                url: '../php/script/usuario/altaUsuarioDesdeAdministrador.php',
                data: {user},
                beforeSend: function(){
                    console.log("Cargando...");
                    lockbuttons();
                },
                success: function(data){
                    console.log(data);
                    $('#modalUser').modal('hide');
                    actualizarListaUsuarios();
                }

            })
        }else{
            console.log("Alguno de los campos se encuentra vacio");
        }





    })







    $('body').on('click','#updateUser',function(){
        let newUserName = $('#userName').val();
        let newUserSurname = $('#userSurname').val();
        let newUserMail = $('#userMail').val();
        let newUserPassword = $('#userPassword').val();
        let newUserActive = $('#activeSwitch').is(':checked');
        let newUserAdmin = $('#adminSwitch').is(':checked');
        let newUserTelephone = $('#userTelefono').val();
        let idUser = user.id;
        console.log(idUser);

        if(newUserName !== user.name ||
           newUserSurname  !== user.surname ||
           newUserMail !== user.mail ||
           newUserPassword !== user.password ||
           newUserActive !== user.active ||
           newUserAdmin !== user.admin ||
           newUserTelephone !== user.telephone 
            
            ){

                        cleanObject();
                        user.name = newUserName
                        user.surname = newUserSurname
                        user.mail = newUserMail
                        user.password = newUserPassword
                        user.active = newUserActive
                        user.admin = newUserAdmin
                        user.telephone = newUserTelephone
                
                Swal.fire({
                            title: 'Usuario modificado',
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
                                        url: '../php/script/usuario/modificarUsuarioDesdeAdministrador.php',
                                        data: {user,idUser},
                                        beforeSend: function(){
                                            console.log("Cargando...");
                                            $('.capa').fadeIn();
                                            lockbuttons();
                                        },
                                        success: function(data){
                                            console.log(data);
                                            $('.capa').fadeOut();
                                            $('#modalUser').modal('hide');
                                            actualizarListaUsuarios();
                                        }
                        
                                    })
                                }
                            })

        }else{
            $('#modalUser').modal('hide')
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
        $('#updateUser').attr("disabled", true);
        $('#addUser').attr("disabled", true);
        $('#cancelUser').attr("disabled", true);
        $('.fa-spin').css("display","block")
    }

    function unLockbuttons(){
        $('#updateUser').attr("disabled", false);
        $('#addUser').attr("disabled", false);
        $('#cancelUser').attr("disabled", false);
        $('.fa-spin').css("display","none")
    }


    function actualizarListaUsuarios(){
        $.ajax({
            
            url: '../php/script/usuario/obtenerUsuarios.php',
            type: 'POST',
            beforeSend: function(){
                $('.capa').fadeIn();
            },
            success: function(data){
                $('.capa').fadeOut();
                console.log(data);
                let usuarios = JSON.parse(data);
                console.log("Mostrar lista: ", usuarios);
                $('#tbodyUsers').html('');
                let activo;
                let admin;
                for (let i=0; i < usuarios.length; i++){
                    if(usuarios[i]['activo'] === "1"){
                        activo = "Si"
                    }else{
                        activo = "No"
                    }
                    if(usuarios[i]['admin'] === "1"){
                        admin = "Si"
                    }else{
                        admin = "No"
                    }

                    $('#tbodyUsers').append(`<tr data-id=${usuarios[i]['id']}>
                                                    <td>${usuarios[i]['nombre']}</td>
                                                    <td>${usuarios[i]['apellido']}</td>
                                                    <td>${usuarios[i]['email']}</td>
                                                    <td>${usuarios[i]['password']}</td>
                                                    <td>${activo}</td>
                                                    <td>${admin}</td>
                                                    <td>${usuarios[i]['telefono']}</td>
                                                    <td>
                                                    <button class="btn btn-danger btn-circle deleteUser">
                                                                <i class="fas fa-trash"></i>
                                                        </button>
                                                        <button class="btn btn-warning btn-circle editUser" data-toggle="modal" data-target="#modalUser">
                                                                <i class="fas fa-exclamation-triangle"></i>
                                                        </button>
                                                    </td>
                                                </tr>`);
                 }
            }
        })
    }})


    $('body').on('keyup','#userName',function(){
        if($(this).val().length>0 && $(this).val().length<5){
            $(this).val($(this).val().charAt(0).toUpperCase()+$(this).val().substr(1));
        }
    })
    $('body').on('keyup','#userSurname',function(){
        if($(this).val().length>0 && $(this).val().length<5){
            $(this).val($(this).val().charAt(0).toUpperCase()+$(this).val().substr(1));
        }
    })