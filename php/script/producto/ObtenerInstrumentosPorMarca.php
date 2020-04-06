<?php

    include "../../class/producto.php";

    $idMarca = $_POST['marca'];

    $productos = producto::getProductsByBrand($idMarca);

    $productos = json_encode($productos);

    print_r ($productos);