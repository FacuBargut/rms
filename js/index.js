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


})


