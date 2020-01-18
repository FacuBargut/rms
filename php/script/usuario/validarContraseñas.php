<?php

    include "../../class/usuario.php";

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
    if(trim($contraseñaActualIngresada != trim($contraseñaActual))){
        echo "La contraseña ingresada es erronea";
        exit;
    }

    //Comparo las contraseñas actuales
    if(trim($contraseñaNueva != trim($contraseñaConfirmada))){
        echo "Error confirmacion de contraseña";
        exit;
    }

    $idUsuario = $_SESSION['usuario']->id;

    $nPassword = usuario::changePassword($contraseñaNueva,$idUsuario);

    $_SESSION['usuario']->password = $nPassword;


    echo "Contraseña cambiada con exito";
    
?>