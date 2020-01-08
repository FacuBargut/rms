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
              }
          })
      })
      //#endregion
    


})