<?php
    include "php/class/usuario.php";
    include "php/class/producto.php";
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="css/css/all.css" rel="stylesheet">
    <link href="css/producto-detalle.css" rel="stylesheet">
    <link href="components/header/header.css" rel="stylesheet">
    

    <!-- Estilos header -->
    <link rel="stylesheet" href="components/header/header.css">
    <!-- Estilos footer -->
    <link rel="stylesheet" href="components/footer/footer.css">

    <title>Rosario Music Shop</title>
</head>
<body>


<?php
    //Obtengo id por url
    $IdProducto = $_GET["intrument"];
    $Producto = producto::getProductById($IdProducto);

?>





<!-- header -->
    <div class="wrapper">
        <div class="header">
            <?php include "components/header/header.php"; ?>
        </div>





        
        <section class="main">
            <div class="img-producto">
                <div class="img-wrapper">
                    <img id="imgProducto" src="<?php echo $Producto->imagen;?>" alt="">
                </div>
            </div>
            <div class="details-producto">
                <h1 id="nombreProducto"><?php echo $Producto->nombre;?></h1>
                <h4 style="color:black;"><?php echo $Producto->descripcion;?></h4>
                <h2>$ <input disabled id="precioProducto" type="text" value="<?php echo number_format($Producto->precio,2,",",".");?>"></h2>
                <div>
                    <label for="Cantidad">Cantidad</label>
                    <input type="number" id="cantidadProducto" value="1">
                    <button id="addProduct" class="btn btn-primary">Añadir al carrito</button>
                    <label for="Total">Total $</label>
                    <input id="total" type="text" disabled>
                </div>
            </div>
        </section>






        <div class="footer">
            <?php include "components/footer/footer.php"; ?>
        </div>
    </div>


    <?php 
         include "components/modal/modal-usuario.php"
    ?>

    



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="js/producto-detalle.js"></script>
<script src="components/header/header.js"></script>
</body>
</html>


