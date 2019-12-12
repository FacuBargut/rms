$(document).ready(function(){

    //Header
    //#region llamando formulario de logeo
    $('.nav-item-user').on("click",function(){
        $('#modal').modal('show')
        $('.modal-title').text("Login de usuario")
        $('.modal-body').load("./components/forms/loginForm.php")
        $('.modal-footer').css("display","none");

        setTimeout(function(){
            $('#LoginEmail').focus();
          }, 500);
        
    })
    //#endregion 

    //#region click en el boton de logeo
    $('body').on("click","#loginForm>button",function(){

        //Validacion del formulario de logeo

        let mail = $('#LoginEmail').val();
        let pass = $('#LoginPassword').val();

        if (mail.trim() == "" || pass.trim() == "") {
            alert("Ningun campo puede estar vacío");
            $('#LoginEmail').val('');
            $('#LoginPassword').val('');
            return;
        }


        var datos = {
            mail : mail,
            pass : pass
        };
        $.ajax({
            type:'POST',
            url:'./php/script/usuario/loguearUsuario.php',
            data: {datos},
            success: function(data){
                console.log(data);
                switch(data.trim()){
                    case "Usuario no encontrado":
                        alert("Usuario no existe");
                        $('#LoginEmail').val('');
                        $('#LoginPassword').val('');
                        $('#LoginEmail').focus();
                        break;
                    case "Sesión iniciada":
                        location.reload();
                    break;
                }
            }
        })
    })
    //#endregion
    
    //#region click en el icono de carro de compras
    $('body').on("click", ".nav-item-shopping-cart",function(){
        $('.modal-chart').fadeIn(200, function(){
            $('.charter-wrapper').css("right","0%");
        })
    })
    //#endregion
})

