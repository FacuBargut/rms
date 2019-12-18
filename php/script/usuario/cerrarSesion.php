<?php
    session_start();
    if(isset($_SESSION['usuario'])){
        session_destroy();
    }


    if(isset($_SESSION['usuario']) && isset($_SESSION['carrito'])){
        echo "Ocurrio un problema";
    }else{
        echo "Sesion cerrada";
    }


?>