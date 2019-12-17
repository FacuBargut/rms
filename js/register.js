$(document).ready(function() {
    //Inicializacion con foco en el primer input

    setTimeout(function() {
        $('#registerName').focus();
    }, 100);


    var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
    var numeros = /^[0-9]+$/;



    $('button#registerUser').click(function(e) {
        e.preventDefault();


        var name = $('#registerName').val();
        var surname = $('#registerSurname').val();
        var mail = $('#registerEmail').val();
        var password = $('#registerPassword1').val();
        var passwordConfirmed = $('#registerPassword2').val();
        var codArea = $('#registerCodArea').val();
        var telephoneNumber = $('#registerTelephoneNumber').val();

        var errors = [];


        if (name.trim() === "" && surname.trim() === "" || mail.trim() === "" ||
            password.trim() === "" || passwordConfirmed.trim() === "" || codArea.trim() === "" ||
            telephoneNumber.trim() === "") {
            let error = "Todos los campos deben estar completos";
            errors.push(error)
                // console.log("Los campos deben estar completos")
        }
        if (!regex.test(mail.trim())) {
            $('#registerEmail').val('');
            $('#registerEmail').focus();
            $("#registerEmail").addClass("is-invalid");
            let error = "El mail no esta en un formato correcto"
            errors.push(error);
        }
        if (password != passwordConfirmed) {
            $('#registerPassword1').val('');
            $('#registerPassword2').val('');
            $('#registerPassword1').focus();
            $("#registerPassword1").addClass("is-invalid");
            $("#registerPassword2").addClass("is-invalid");
            let error = "Las contraseñas no coinciden";
            errors.push(error);
        }
        if (codArea.length < 3) {
            // console.log("");
            $('#registerCodArea').val('')
            $('#registerCodArea').focus();
            $("#registerCodArea").addClass("is-invalid");
            let error = "El codigo de area no puede tener menos de 3 digitos"
            errors.push(error);
        }
        if (telephoneNumber.length != 7) {
            // console.log("El numero de telefono debe tener 7 digitos");
            $("#telephoneNumber").val('');
            $("#telephoneNumber").focus();
            $("#telephoneNumber").addClass("is-invalid");
            let error = "El numero de telefono debe tener 7 digitos";
            errors.push(error)
        }

        if (errors.length == 0) {
            var user = {
                name: name,
                surname: surname,
                mail: mail,
                password: password,
                passwordConfirmed: passwordConfirmed,
                active: 0,
                admin: 0,
                codArea: codArea,
                telephoneNumber: telephoneNumber
            }

            $.ajax({
                type: 'POST',
                url: './php/script/usuario/altaUsuario.php',
                data: { user },
                success: function(data) {

                    console.log("respuesta del script: ", data);
                }
            })





        } else {

            console.log("Mostrando errores: ");
            errors.forEach(element => {
                $('.errors').append("<li>" + element + "</li>")
                $('.errors').css("display", "block");
                console.log(element);
            });
            errors.length = 0;

        }
    })


    //---------------------------------------------------------------------------------------------
    $("#registerName").blur(function() {
        var name = $('#registerName').val();
        if (name.trim() === "") {
            $("#registerName").removeClass("is-valid").addClass("is-invalid");
        } else {
            $("#registerName").removeClass("is-invalid").addClass("is-valid");
        }
    })

    $("#registerSurname").blur(function() {
        var surname = $('#registerSurname').val();
        if (surname.trim() === "") {
            $("#registerSurname").removeClass("is-valid").addClass("is-invalid");
        } else {
            $("#registerSurname").removeClass("is-invalid").addClass("is-valid");
        }
    })




    //------------------------------------------------------------------------------------------------------------    
    $("#registerEmail").blur(function() {
        var mail = $('#registerEmail').val();
        if (!regex.test(mail.trim())) {
            $("#registerEmail").removeClass("is-valid").addClass("is-invalid");
        } else {
            $("#registerEmail").removeClass("is-invalid").addClass("is-valid");
        }
    })

    //-------------------------------------------------------------------------------------------------------------
    $("#registerPassword2").blur(function() {
        var password1 = $('#registerPassword1').val();
        var password2 = $('#registerPassword2').val();
        if (password1 === password2 && password2.trim() != "") {
            $("#registerPassword1").removeClass("is-invalid").addClass("is-valid");
            $("#registerPassword2").removeClass("is-invalid").addClass("is-valid");
        } else {
            $("#registerPassword1").removeClass("is-valid").addClass("is-invalid");
            $("#registerPassword2").removeClass("is-valid").addClass("is-invalid");
        }
    })

    $("#registerPassword1").blur(function() {
            var password1 = $('#registerPassword1').val();
            var password2 = $('#registerPassword2').val();
            if (password1 === password2 && password1 != "") {
                $("#registerPassword1").removeClass("is-invalid").addClass("is-valid");
                $("#registerPassword2").removeClass("is-invalid").addClass("is-valid");
            } else {
                $("#registerPassword1").removeClass("is-valid").addClass("is-invalid");
                $("#registerPassword2").removeClass("is-valid").addClass("is-invalid");
            }
        })
        //---------------------------------------------------------------------------------------------------------------      

    $("#registerCodArea").blur(function() {
        var codArea = $('#registerCodArea').val();
        if (codArea != "" && codArea.length > 3 && numeros.test(codArea.trim())) {
            $("#registerCodArea").removeClass("is-invalid").addClass("is-valid");
        } else {
            $("#registerCodArea").removeClass("is-valid").addClass("is-invalid");
        }
    })

    //-----------------------------------------------------------------------------------------------------------------------------
    $("#registerTelephoneNumber").blur(function() {
        var telephoneNumber = $('#registerTelephoneNumber').val();
        if (telephoneNumber != "" && telephoneNumber.length == 7 && numeros.test(telephoneNumber.trim())) {
            $("#registerTelephoneNumber").removeClass("is-invalid").addClass("is-valid");
        } else {
            $("#registerTelephoneNusmber").removeClass("is-valid").addClass("is-invalid");
        }
    })




})