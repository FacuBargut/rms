<?php

class usuario {

    public $name;
    public $surname;
    public $email;
    public $password;
    public $active;
    public $admin;
    public $telephone;


    function __construct( $name, $surname, $email, $password, $active, $admin, $telephone) {
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->password = $password;
        $this->active = $active;
        $this->admin = $admin;
        $this->telephone = $telephone;
    }

    public function getName(){
        return $this->name;
    }

    public function getSurname(){
        return $this->surname;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getPassword(){
        return $this->password;
    }


    public static function loginUser($email, $password){
        
        include "../conexion.php";
        $stmt = $conn->query("SELECT * FROM Usuarios WHERE email = '$email' and password = '$password'");
        $result = $stmt->num_rows;

        if($result == 0){
            return "Usuario no encontrado";
            exit;
        }
        $user = $stmt->fetch_object();
        return $user; 
    }

    public static function searchUserByEmail ($email){
        include "../conexion.php";
        $stmt = $conn->query("SELECT * FROM Usuarios WHERE email = '$email'");
        $result = $stmt->num_rows;

        if($result > 0){
            return "Usuario ya existe";
            exit;
        }
    }

    public static function createUser($name,$surname,$mail,$password,$active,$admin,$telephone){
        include "../conexion.php";
        if($stmt = $conn->query("INSERT INTO Usuarios (nombre, apellido, email, password, activo, admin, telefono) VALUES ('$name', '$surname', '$mail', '$password', '$active', '$admin', '$telephone')") == TRUE){
            return "Usuario registrado correctamente";
            
        }else{
            return "Error, mostrando consulta: "."INSERT INTO Usuarios (nombre, apellido, email, 'password', activo, 'admin', telefono) VALUES ('$name', '$surname', '$mail', '$password', '$active', '$admin', '$telephone')";
            
        }

    }

}