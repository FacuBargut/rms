<?php   
        include "../../class/producto.php";
        $instruments = producto::getProducts();
        // var_dump($instruments);
        echo json_encode($instruments);  
?>