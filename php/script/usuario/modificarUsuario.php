<?php

        include "../../class/usuario.php";
        session_start();
        // print_r ($_POST['user']);

        //Declaracion de variables
        $name = trim($_POST['user']['name']);
        $surname = trim($_POST['user']['surname']);
        $mail = trim($_POST['user']['mail']);
        $codArea = trim($_POST['user']['codArea']);
        $telephoneNumber = trim($_POST['user']['telephoneNumber']);
        $idUsuario = $_SESSION['usuario']->id;


        //Validaciones del lado del servidor
        if($name === "" && $surname === "" && $mail === "" && $password === "" && $codArea === ""  && $telephone === ""){
            echo "Ningun campo puede estar vacio";
            exit;
        }else if (!filter_var($mail, FILTER_VALIDATE_EMAIL)){
            echo "Se necesita un mail valido";
            exit;
        }else if ( strlen($codArea) < 3 ){
            echo "El codigo de area es menor a 3";
            exit;
        }else if( strlen($telephoneNumber) != 9){
            echo "El numero de telefono no tiene 7 digitos";
            exit;
        }

        $telephone = $codArea.$telephoneNumber;

        $modifyUser = usuario::modifyUser($idUsuario,$name,$surname,$mail,$telephone);

        $_SESSION['usuario']->name = $name;
        $_SESSION['usuario']->surname = $surname;
        $_SESSION['usuario']->email = $mail;
        $_SESSION['usuario']->telephone = $telephone;
        echo $modifyUser;