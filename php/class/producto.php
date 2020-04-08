<?php

class producto {

    public $name;
    public $description;
    public $price;
    public $image;
    public $stock;
    public $idBrand;
    public $idInstrument;

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
        include "conexion.php";
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

    public static function getBrands(){
        include "conexion.php";
        $array_brands = array();
        if($result = $conn->query("SELECT * FROM Marcas")){
            while($row = $result->fetch_object()){
                array_push($array_brands, $row);
            }
        }else{
            echo "No hay marcas";
            exit;
        }
        return $array_brands;
    }

    public static function getIntrumentTypes(){
        include "conexion.php";
        $array_intrumentTypes = array();
        if($result = $conn->query("SELECT * FROM tipoinstrumentos")){
            while($row = $result->fetch_object()){
                array_push($array_intrumentTypes, $row);
            }
        }else{
            echo "No hay tipos de intrumentos cargados";
            exit;
        }
        return $array_intrumentTypes;
    }

    public static function getCategories(){
        include "conexion.php";
        $array_categories = array();
        if($result = $conn->query("SELECT * FROM categorias")){
            while($row = $result->fetch_object()){
                array_push($array_categories, $row);
            }
        }else{
            echo "No hay categorías cargadas";
            exit;
        }
        return $array_categories;
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
        if($result = $conn->query("SELECT * FROM tipoinstrumentos")){
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

    public static function getInstrumentCategoryAvailable($idInstrument, $idCategory){
        include "php/script/conexion.php";
        $array_instruments = array();
        if($result = $conn->query("SELECT * FROM Instrumentos WHERE idTipoInstrumento = $idInstrument AND IdCategoria = $idCategory")){
            while($row = $result->fetch_object()){
                    array_push($array_instruments,$row);
            }
            return $array_instruments;
        }else{
            echo "Problemas al momento de devolver los instrumentos";
            
        }
    }

    public static function getBrandsByIdBrands($idsBrand){
        include "php/script/conexion.php";
        $array_brands = array(); 
        for ($i = 0; $i < count($idsBrand); $i++){
            $idBrand = $idsBrand[$i];
            if($result = $conn->query("SELECT i.idMarca AS 'IdMarca', m.descripcion AS 'NombreMarca', COUNT(*) AS 'Cantidad' FROM Marcas m INNER JOIN Instrumentos i ON m.id = i.idMarca WHERE i.idMarca = $idBrand")){
                while($row = $result->fetch_object()){
                        array_push($array_brands,$row);
                }
            }else{
                echo "Problemas al momento de devolver los instrumentos";
            }
        }
        return $array_brands;
    }
    

    public static function getProductosByMinMaxPrice($minPrice,$maxPrice){
        include "../conexion.php";
        $array_products = array(); 
        
            if($result = $conn->query("SELECT * FROM Instrumentos WHERE precio BETWEEN $minPrice AND $maxPrice")){
                while($row = $result->fetch_object()){
                        array_push($array_products,$row);
                }
            }else{
                echo "Problemas al momento de devolver los instrumentos";
            }
        
        return $array_products;
    }
    
    public static function getProductsByBrand($idBrand){
        include "../conexion.php";
        $array_products = array(); 
            if($result = $conn->query("SELECT * FROM Instrumentos WHERE idMarca = $idBrand")){
                while($row = $result->fetch_object()){
                        array_push($array_products,$row);
                }
            }else{
                echo "Problemas al momento de devolver los instrumentos";
            }
        
        return $array_products;
    }
    
}