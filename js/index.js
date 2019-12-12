$(document).ready(function(){

    //Header
    //Llamando formulario de logeo
    $('.nav-item-user').on("click",function(){
        $('#modal').modal('show')
        $('.modal-title').text("Login de usuario")
        $('.modal-body').load("./components/forms/loginForm.php")
        $('.modal-footer').css("display","none");

        setTimeout(function(){
            $('#LoginEmail').focus();
          }, 500);
        
    })

    //Click en el boton de logueo
    $('body').on("click","#loginForm>button",function(){

        var datos = {
            mail : $('#LoginEmail').val(),
            pass : $('#LoginPassword').val(),
        };

        $.ajax({
            type:'POST',
            url:'./php/script/usuario/loguearUsuario.php',
            data: {datos},
            success: function(data){

                console.log(data);

            }
        })
    })

})


