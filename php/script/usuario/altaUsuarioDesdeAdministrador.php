<?php
        include "../../class/usuario.php";
        $user = $_POST['user'];
        $name = $user['name'];
        $surname = $user['surname'];
        $mail = $user['mail'];
        $password = $user['password'];
        $active = $user['active'];
        $admin = $user['admin'];
        $telephone = $user['telephone'];
        $insert = usuario::createUser($name,$surname,$mail,$password,$active,$admin,$telephone);
        echo $insert;
?>