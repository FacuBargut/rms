<?php
    include "../../class/producto.php";
    $product = $_POST['product'];
    $idProduct = $_POST['idProduct'];
    $update = producto::modifyProduct($user,$idUser);
    
    echo $update; 


?>