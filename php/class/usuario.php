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

}