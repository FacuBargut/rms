$(document).ready(function(){
    //Inicializacion con foco en el primer input
    
    setTimeout(function(){
        $('#registerName').focus();
      }, 100);


      var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;



      $('button#registerUser').click(function(e){
        e.preventDefault();


        var name = $('#registerName').val();
        var surname = $('#registerSurname').val();
        var mail = $('#registerEmail').val();
        var password = $('#registerPassword1').val();
        var passwordConfirmed = $('#registerPassword2').val();


        if(name.trim() === "" && surname.trim() === "" || mail.trim() === "" || password.trim() === "" || passwordConfirmed === ""){
            console.log("Los campos deben estar completos")

        }else if( !regex.test(mail.trim())){
            console.log("El mail no esta en un formato correcto");
            $('#registerEmail').val('');
            $('#registerEmail').focus();
            $( "#registerEmail" ).addClass("is-invalid" );

        }else if(password != passwordConfirmed){
                $('#registerPassword1').val('');
                $('#registerPassword2').val('');
                $('#registerPassword1').focus();
                $( "#registerPassword1" ).addClass("is-invalid" );
                $( "#registerPassword2" ).addClass("is-invalid" );
                console.log("Las contraseñas no coinciden")
        }else{
            console.log("registrando usuario");
        }





        


      })
    $("#registerName").blur(function(){
        var name = $('#registerName').val();
        if(name.trim() === ""){
            $( "#registerName" ).removeClass("is-valid").addClass("is-invalid");
        }else{
            $( "#registerName" ).removeClass("is-invalid").addClass("is-valid");
        }
    })

    $("#registerSurname").blur(function(){
        var surname = $('#registerSurname').val();
        if(surname.trim() === ""){
            $( "#registerSurname" ).removeClass("is-valid").addClass("is-invalid");
        }else{
            $( "#registerSurname" ).removeClass("is-invalid").addClass("is-valid");
        }
    })




//------------------------------------------------------------------------------------------------------------    
      $("#registerEmail").blur(function(){
            var mail = $('#registerEmail').val();
            if( !regex.test(mail.trim())){
                $( "#registerEmail" ).removeClass("is-valid").addClass("is-invalid");
            }else{
                $( "#registerEmail" ).removeClass("is-invalid").addClass("is-valid");
            }
      })

//-------------------------------------------------------------------------------------------------------------
      $("#registerPassword2").blur(function(){
        var password1 = $('#registerPassword1').val();
        var password2 = $('#registerPassword2').val();
        if( password1 === password2){
            $( "#registerPassword1" ).removeClass("is-invalid").addClass("is-valid");
            $( "#registerPassword2" ).removeClass("is-invalid").addClass("is-valid");
        }else{
            $( "#registerPassword1" ).removeClass("is-valid").addClass("is-invalid");
            $( "#registerPassword2" ).removeClass("is-valid").addClass("is-invalid");
        }
      })

      $("#registerPassword1").blur(function(){
        var password1 = $('#registerPassword1').val();
        var password2 = $('#registerPassword2').val();
        if( password1 === password2){
            $( "#registerPassword1" ).removeClass("is-invalid").addClass("is-valid");
            $( "#registerPassword2" ).removeClass("is-invalid").addClass("is-valid");
        }else{
            $( "#registerPassword1" ).removeClass("is-valid").addClass("is-invalid");
            $( "#registerPassword2" ).removeClass("is-valid").addClass("is-invalid");
        }
      })
//---------------------------------------------------------------------------------------------------------------      




})