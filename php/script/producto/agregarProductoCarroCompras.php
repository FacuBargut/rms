<?php

        $producto = $_POST['producto'];

        session_start();

        if(isset($_SESSION['carrito'])){
            $cantidadProductos = count($_SESSION['carrito']);
            $_SESSION['carrito'][$cantidadProductos] = $producto;
        }else{
            $_SESSION['carrito'][0] = $producto;
        }

        echo 'Producto agregado exitosamente';

  



?>