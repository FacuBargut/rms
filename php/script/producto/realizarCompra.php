<?php

        include "../../class/producto.php";
        include "../../class/usuario.php";
        session_start();


        $userID =  $_SESSION['usuario']->getID();


        $compra = producto::registerPurchase($_SESSION['carrito'], $userID);



