<?php

class usuario {

    public $id;
    public $name;
    public $surname;
    public $email;
    public $password;
    public $active;
    public $admin;
    public $telephone;


    function __construct( $id, $name, $surname, $email, $password, $active, $admin, $telephone) {
        $this->id = $id;
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

    public function getID(){
        return $this->id;
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


    public static function saveAddress($address,$idUsuario){
        include "../conexion.php";  

        $direccion = $address['direccion'];
        $numero = $address['numero'];
        $departamento = $address['departamento'];
        $localidad = $address['localidad'];
        $codigoPostal = $address['codigoPostal'];
        $provincia = $address['provincia'];

        $stmt = "INSERT INTO Direcciones (direccion, numero, departamento, localidad, codigo_postal, provincia, id_usuario)
                 VALUES('$direccion','$numero','$departamento','$localidad','$codigoPostal','$provincia',$idUsuario)";

        if($query = $conn->query($stmt)){
            return "Direccion cargada con exito";
        }else{
            return "Error al registrar: ".$stmt;
        }
    }

    public static function getAddress($idUsuario){
        include "../conexion.php";
        $array_direcciones = array();
        if($stmt = $conn->query("SELECT * FROM Direcciones WHERE id_usuario IN ('$idUsuario',0)")){
            while($row = $stmt->fetch_object()){
                array_push($array_direcciones, $row);
            }
        }
        return $array_direcciones; 
    }
}