<?php

    include "../../class/producto.php";

    $minPrice = $_POST['minPrice'];
    $maxPrice = $_POST['maxPrice'];

    $productos = producto::getProductosByMinMaxPrice($minPrice,$maxPrice);

    

    $productos2 = json_encode($productos);

    print_r ($productos2);