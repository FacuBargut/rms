$(document).ready(function() {
    console.log("Script cargado correctamente");

    var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;

    var oUser = {
        name : $('#modifyName').val(),
        surname :  $('#modifySurname').val(),
        mail : $('#modifyEmail').val(),
        codArea : $('#modifyCodArea').val(),
        telephoneNumber : $('#modifyTelephoneNumber').val(),
    }

    setTimeout(function(){
        $('#modifyName').focus();
      }, 100);


      //#region cambiar contraseña
      $('#changePassword').click(function(e){
        e.preventDefault();
        $('#modal').modal('show');
        setTimeout(function(){
            $('#currentlyPassword').focus();
        }, 500);
        
        
      })
      //#endregion

      //#region guardar contraseña
      $('body').on('click','#savePassword',function(){
          let contraseñaActual = $('#currentlyPassword').val();
          let contraseñaNueva = $('#newPassword').val();
          let contraseñaConfirmada = $('#confirmedPassword').val();
          $.ajax({
              type: 'POST',
              url: './php/script/usuario/validarContraseñas',
              data: {contraseñaActual, contraseñaNueva, contraseñaConfirmada},
              success: function(data){
                  console.log(data)
                                    setTimeout(function(){
                                        $('.swal2-confirm').focus();
                                    }, 300);
                  switch (data.trim()){
                      case "Todos los campos deben estar completos":
                            Swal.fire({
                                icon: 'error',
                                title: data,
                                text: 'Por favor, completelos a todos'
                            }).then((result) => {
                                if (result.value) {
                                     
                                }
                            })
                          break;
                      case "La contraseña ingresada es erronea":
                            Swal.fire({
                                icon: 'error',
                                title: 'La contraseña actual ingresada es erronea',
                            }).then((result) => {
                                if (result.value) {
                                    $('#currentlyPassword').val('');
                                    setTimeout(function(){
                                        $('#currentlyPassword').focus();
                                    }, 300);                               
                                }
                            })
                          break;
                      case "Error confirmacion de contraseña":
                            

                            Swal.fire({
                                icon: 'error',
                                title: 'Error en la confirmación de la contraseña',
                            }).then((result) => {
                                if (result.value) {
                                    $('#confirmedPassword').val('');
                                    $('#newPassword').val('');
                                    setTimeout(function(){
                                        $('#newPassword').focus();
                                      }, 300);                               
                                }
                            })
                          break;
                      case "Contraseña cambiada con exito":
                            Swal.fire({
                                icon: 'success',
                                title: data,
                                showConfirmButton: false,
                                timer: 1500
                            })
                            
                            setTimeout(function(){
                                $('#modal').modal('hide')                        
                            },1500)
                          break;
                  }
              }
          })
      })
      //#endregion
    

      //#region guardar datos
      $('#saveModifyUser').click(function(e){
        e.preventDefault();
        var name = $('#modifyName').val();
        var surname = $('#modifySurname').val();
        var mail = $('#modifyEmail').val();
        var codArea = $('#modifyCodArea').val();
        var telephoneNumber = $('#modifyTelephoneNumber').val();
        var errors = [];
        
        if (name.trim() === "" || surname.trim() === "" || mail.trim() === "" || telephoneNumber.trim() === "") {
            let error = "Todos los campos deben estar completos";
            errors.push(error)
        }
        if (!regex.test(mail.trim())) {
            $('#modifyEmail').val('');
            $('#modifyEmail').focus();
            // $("#modifyEmail").addClass("is-invalid");
            let error = "El mail no esta en un formato correcto"
            errors.push(error);
        }

        if (codArea.length < 3) {
            // console.log("");
            $('#modifyCodArea').val('')
            $('#modifyCodArea').focus();
            // $("#modifyCodArea").addClass("is-invalid");
            let error = "El codigo de area no puede tener menos de 3 digitos"
            errors.push(error);
        }

        if (telephoneNumber.length != 9) {
            // console.log("El numero de telefono debe tener 7 digitos");
            $("#modifyTelephoneNumber").val('');
            $("#modifyTelephoneNumber").focus();
            // $("#modifyTelephoneNumber").addClass("is-invalid");
            let error = "El numero de telefono debe tener 7 digitos";
            errors.push(error)
        }

        if (errors.length == 0) {
            var user = {
                name: name,
                surname: surname,
                mail: mail,
                codArea: codArea,
                telephoneNumber: telephoneNumber
            }

            $.ajax({
                type: 'POST',
                url: './php/script/usuario/modificarUsuario.php',
                data: { user },
                success: function(data) {
                    switch(data.trim()){
                        case "Usuario modificado correctamente":
                            Swal.fire({
                                icon: 'success',
                                title: data,
                                showConfirmButton: false,
                                timer: 1500
                            })
                            setTimeout(function(){
                                location.reload();
                              }, 1500);
                            

                        break;

                        

                    }
                    
                }
            })

         }
         else {
            console.log(errors)
            setTimeout(function(){
                $('.swal2-confirm').focus();
              }, 300);
            
            Swal.fire({
                icon: 'error',
                title: "Hay errores",
                text: errors
            }).then((result) => {
                if (result.value) {
                    $('#modifyName').val(oUser.name);
                    $('#modifySurname').val(oUser.surname);
                    $('#modifyEmail').val(oUser.mail);
                    $('#modifyCodArea').val(oUser.codArea);
                    $('#modifyTelephoneNumber').val(oUser.telephoneNumber);
                }
            })
            


        }

      })
      //#endregion 


})