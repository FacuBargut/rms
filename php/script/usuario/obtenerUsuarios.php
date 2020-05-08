<?php
    include "../../class/usuario.php";
    $users = usuario::getUsers();
    echo json_encode($users);  
?>