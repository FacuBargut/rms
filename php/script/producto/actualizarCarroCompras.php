<?php   
    session_start();

    if(isset($_SESSION['carrito'])){
        print_r (json_encode($_SESSION['carrito']));
    }else{
        echo "Carrito de compras vacio";
    }

?>




