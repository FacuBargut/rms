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

    public static function loginUser($email, $password){
        
        include "../conexion.php";
        $stmt = $mysqli->query("SELECT * FROM Usuarios");
        $user = $stmt->fetch();
        echo $user;
    }

}