<?php

    include "../../class/usuario.php";

    $mail = $_POST['datos']['mail'];
    $password = $_POST['datos']['pass'];


    usuario::loginUser($mail, $password);

