<?php   
        include "../../class/producto.php";
        $instruments = producto::getProducts();
        echo json_encode($instruments);  
?>