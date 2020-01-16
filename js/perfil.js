$(document).ready(function() {
    console.log("Script cargado correctamente");

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
                  switch (data){
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
                          break;
                      case "Error confirmacion de contraseña":
                          break;
                      case "Contraseña cambiada con exito":
                          break;
                      
                  }
              }
          })
      })
      //#endregion
    


})