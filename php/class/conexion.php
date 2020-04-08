<?php
    // //Conexion que funcion
    $conn = new mysqli("localhost", "root", "", "rms");
    if ($conn->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
?>



