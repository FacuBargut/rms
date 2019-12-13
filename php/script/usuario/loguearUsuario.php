<?php

    include "../../class/usuario.php";

    $mail = $_POST['datos']['mail'];
    $password = $_POST['datos']['pass'];
    $user = "";

    $user = usuario::loginUser($mail, $password);

    echo $user;
    exit;

    if($user === "Usuario no encontrado"){
        echo "Usuario no encontrado";
    }else{
       session_start();
       $oUser = new usuario ($user->nombre, $user->apellido, $user->email, $user->password, $user->activo, $user->admin, $user->telefono);
       $_SESSION['user'] = $oUser;
       echo "Sesión iniciada";
    }