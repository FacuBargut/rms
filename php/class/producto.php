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
        
        $fechaPedido = date('d-m-Y H:i:s');

        $fechaEntrega = date("d-m-Y", strtotime($fechaPedido."+ 10 days"));
        $totalPedido = 0;

        //Registro pedido
        $query = "INSERT INTO Pedidos (fechaPedido,totalPedido,fechaEntrega,idUsuario) VALUES (now(),$totalPedido,STR_TO_DATE('$fechaEntrega','%d-%m-%Y %h,%i,%s'), $userID)";

        $result = $conn->query($query);
        
        if($result){
            return "Pedido registrado";
        }else{
            echo $query;
            exit;
        }

        exit;

    }

    public static function getLastPurchase($userID){
        include "../conexion.php";

        if($result = $conn->query("SELECT * FROM Pedidos WHERE idUsuario = '7' ORDER BY fechaPedido LIMIT 1")){
            $row = $result->fetch_object();
            return $row;
        }else{
            return "No se encontro el ultimo pedido";            
        }
            
    }

    public static function registerPurchaseDetail($products, $idPedido){
        include "../conexion.php";

   

        for($i=0;$i<count($products); $i++){

            $idInstrumento = $products[$i]['id'];
            

            $result = $conn->query("INSERT INTO DetallePedidos (id_pedido, id_instrumento) VALUES ('$idPedido','$idInstrumento')");

            if(!$result){
                // echo "Hay problemas al registrar el detalle de producto. Elimine el pedido: ".$idPedido." para que no haya inconsistencia de datos";
                echo "INSERT INTO DetallePedidos (id_pedido, id_instrumento) VALUES ('$idPedido','$idInstrumento')";
                exit;
            }
        
        }

        echo "Compra registrada";
        

        

    }


    public static function getTypeInstrument(){
        include "php/script/conexion.php";
        $array_typeInstruments = array();
        if($result = $conn->query("SELECT * FROM TipoInstrumentos")){
            while($row = $result->fetch_object()){
                
                    array_push($array_typeInstruments,$row);
                
            }
            return $array_typeInstruments;
        }else{
            echo "Problemas al momento de devolver los tipos de instrumentos";
            exit;
        }
    }

    public static function getCategoryInstrument($idInstrument){
        include "php/script/conexion.php";
        $array_category = array();
        if($result = $conn->query("SELECT * FROM Categorias WHERE idInstrumento = $idInstrument")){
            while($row = $result->fetch_object()){
                    array_push($array_category,$row);
            }
            return $array_category;
        }else{
            echo "Problemas al momento de devolver las categorias";
            
        }
    }

}