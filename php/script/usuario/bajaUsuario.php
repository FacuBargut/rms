<?php
        include "../../class/usuario.php";
        $idUsuario = $_POST['idUser'];
        
        $delete = usuario::deleteUser($idUsuario);
        echo $delete;        
?>