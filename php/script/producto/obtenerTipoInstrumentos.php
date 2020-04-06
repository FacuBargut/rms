<?php
    include "../../class/producto.php";


    $tipoInstrumentos = producto::getTypeInstrument();

    
    print_r ($tipoInstrumentos);

    
    