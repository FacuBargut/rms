<?php
    include "../../class/usuario.php";
    session_start();

    $userID = $_SESSION['usuario']->getID();
    $direcciones = usuario::getAddress($userID);

    


    for($i=0; $i < count($direcciones); $i++){
        $_SESSION['direcciones'][$i] = $direcciones[$i];
    }

    print_r($_SESSION['direcciones']);



?>