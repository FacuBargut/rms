<?php
        include "../../class/producto.php";
        $idProduct = $_POST['idProduct'];
        
        $delete = producto::deleteProduct($idProduct);
        echo $delete;        
?>