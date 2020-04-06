<?php

        $producto = $_POST['producto'];

        session_start();

        if(isset($_SESSION['carrito'])){
            $cantidadProductos = count($_SESSION['carrito']);

            for($i=0;$i<$cantidadProductos;$i++){
                // print_r($_SESSION['carrito'][0]['id']);
                if($_SESSION['carrito'][$i]['id'] === $producto['id']){
                    $suma = $_SESSION['carrito'][$i]['cantidad'] + $producto['cantidad'];
                    $_SESSION['carrito'][$i]['cantidad'] += $producto['cantidad'];
                    $_SESSION['carrito'][$i]['cantidad'] *= $producto['cantidad'];
                    exit;
                }

            }

            $_SESSION['carrito'][$cantidadProductos] = $producto;

        }else{
            $_SESSION['carrito'][0] = $producto;
        }

        echo 'Producto agregado exitosamente';


?>