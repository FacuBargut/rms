<?php
    session_start();

    $contraseñaActualIngresada = $_POST['contraseñaActual'];
    $contraseñaNueva = $_POST['contraseñaNueva'];
    $contraseñaConfirmada = $_POST['contraseñaConfirmada'];
    $contraseñaActual = $_SESSION['usuario']->password;


    if(trim($contraseñaActualIngresada) == "" || trim($contraseñaNueva) == "" || trim($contraseñaConfirmada) == "" ){
        echo "Todos los campos deben estar completos";
        exit;
    }


    //Comparo contraseña actual ingresada con la contraseña actual de logueo
    if(trim($contraseñaActualIngresada != trim($contraseñaActualIngresada))){
        echo "La contraseña ingresada erronea";
        exit;
    }

    //Comparo las contraseñas actuales
    if(trim($contraseñaNueva != trim($contraseñaConfirmada))){
        echo "Error confirmacion de contraseña";
        exit;
    }

    
?>