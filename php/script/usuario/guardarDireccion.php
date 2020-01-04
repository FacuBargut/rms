<?php
    include "../../class/usuario.php";
    session_start();

    $datosDireccion = $_POST['datosDireccion'];

    $user = usuario::saveAddress($datosDireccion,$_SESSION['usuario']->getId());


    echo $user;






?>