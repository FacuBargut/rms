<?php

        include "../../class/usuario.php";


        // print_r ($_POST['user']);

        //Declaracion de variables
        $name = trim($_POST['user']['name']);
        $surname = trim($_POST['user']['surname']);
        $mail = trim($_POST['user']['mail']);
        $password = trim($_POST['user']['password']);
        $passwordConfirmed = trim($_POST['user']['passwordConfirmed']);
        $active = trim($_POST['user']['active']);
        $admin = trim($_POST['user']['admin']);
        $codArea = trim($_POST['user']['codArea']);
        $telephoneNumber = trim($_POST['user']['telephoneNumber']);


        //Validaciones del lado del servidor
        if($name === "" && $surname === "" && $mail === "" && $password === "" && $active === "" &&
           $admin === "" && $telephone === ""){
            echo "Ningun campo puede estar vacio";
            exit;
        }else if (!filter_var($mail, FILTER_VALIDATE_EMAIL)){
            echo "Se necesita un mail valido";
            exit;
        }else if( $password != $passwordConfirmed ){
            echo "Las contraseñas son distintas";
            exit;
        }else if ( strlen($codArea) < 3 ){
            echo "El codigo de area es menor a 3";
            exit;
        }else if( strlen($telephoneNumber) != 7){
            echo "El numero de telefono no tiene 7 digitos";
            exit;
        }


        $searchUser = usuario::searchUserByEmail($mail);

        if($searchUser === "Usuario ya existe"){
            echo "Usuario ya existe";
            exit;
        }

        $telephone = $codArea.$telephoneNumber;

        $createUser = usuario::createUser($name,$surname,$mail,$password,$active,$admin,$telephone);

        if(trim($createUser) == "Usuario registrado correctamente"){
            $mensaje = "Mensaje de prueba";
            mail($mail,'Alta de usuario',$mensaje);

            echo "Enviando mail";

        }else{
            // echo "entra aca";
            echo $createUser;
        }





        

