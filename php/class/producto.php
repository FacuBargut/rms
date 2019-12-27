<?php

class producto {

    public $name;
    public $description;
    public $price;
    public $image;
    public $stock;
    public $idBrand;
    public $idInstrument;

    //Aun no se si implementarlo
    // function __construct( $name, $surname, $email, $password, $active, $admin, $telephone) {
    //     $this->name = $name;
    //     $this->surname = $surname;
    //     $this->email = $email;
    //     $this->password = $password;
    //     $this->active = $active;
    //     $this->admin = $admin;
    //     $this->telephone = $telephone;
    // }

    public function getName(){
        return $this->name;
    }

    public function getDescription(){
        return $this->description;
    }

    public function getImage(){
        return $this->price;
    }

    public function getPrice(){
        return $this->price;
    }

    public function getIdBrand(){
        return $this->idBrand;
    }
    public function getIdInstrument(){
        return $this->idIntrument;
    }


    public static function getProducts(){
        include "php/script/conexion.php";
        $array_instruments = array();

        if($result = $conn->query("SELECT * FROM Instrumentos")){

            while($row = $result->fetch_object()){
                array_push($array_instruments,$row);
            }

        }else{
            echo "No hay instrumentos";
            exit;
        }

        return $array_instruments;
    }

    public static function getProductById($idProducto){
        include "php/script/conexion.php";

        if($result = $conn->query("SELECT * FROM Instrumentos WHERE Id='$idProducto'")){
            $row = $result->fetch_object();
            return $row;

        }else{
            return "No hay producto";
            
        }

        
    }




    public static function createProduct($name,$description,$image,$price,$idBrand,$idIntrument){
        include "../conexion.php";
        if($stmt = $conn->query("INSERT INTO Productos (nombre, descripcion, precio, imagen, stock, id-marca, id-intrumento) VALUES ('$name', '$description', '$image', '$price', '$idBrand', '$idInstrument')") == TRUE){
            return "Usuario registrado correctamente";
            
        }else{
            return "Error, mostrando consulta: "."INSERT INTO Productos (nombre, descripcion, precio, imagen, stock, 'id-marca', 'id-intrumento') VALUES ('$name', '$description', '$image', '$price', '$idBrand', '$idIntrument')";
            
        }

    }

    public static function registerPurchase ($products, $userID){
        include "../conexion.php";

        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $fechaPedido = date('d/m/Y');
        $fechaEntrega = date("d/m/Y", strtotime($fechaPedido."+ 10 days"));
        $horaPedido = date('H:i:s');
        $totalPedido = 0;

         for($i=0;$i<=count($products);$i++){
            
            $result = $conn->query("INSERT INTO Pedidos (fechaPedido,horaPedido,totalPedido,fechaEntrega,idUsuario) VALUES (date('d/m/Y') ,NOW(),$totalPedido,$fechaEntrega, $userID)");
        
            if($result){
                echo "Producto registrado";
            }else{
                echo "INSERT INTO Pedidos (fechaPedido,horaPedido,totalPedido,fechaEntrega,idUsuario) VALUES (date('d/m/Y') ,NOW(),$totalPedido,$fechaEntrega, $userID)";
            }
            // INSERT INTO Pedidos (fechaPedido,horaPedido,totalPedido,fechaEntrega,idUsuario) VALUES (27/12/2019,NOW(),0,06/01/2020, 7)

        }

        exit;

    }

}