<?php
    $idProducto = $_POST['idProduct'];

    session_start();

    // for($i=0;$i<=count($_SESSION['carrito']);$i++){
    //     if($_SESSION['carrito'][$i]['id'] === $idProducto){
    //         unset($_SESSION['carrito'][$i]);
    //         echo "Producto eliminado del carro de compras";
    //     }
    // }
    
    unset($_SESSION['carrito'][0]);

    print_r($_SESSION['carrito']);  


?>