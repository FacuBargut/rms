<?php
        include "../../class/producto.php";
        $nProduct = $_POST['product'];
        
        $insert = producto::insertProduct($nProduct);
        return $insert;        
?>