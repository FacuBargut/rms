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
    <link href="css/compra.css" rel="stylesheet">
    <link href="components/header/header.css" rel="stylesheet">
    

    <!-- Estilos header -->
    <link rel="stylesheet" href="components/header/header.css">
    <!-- Estilos footer -->
    <link rel="stylesheet" href="components/footer/footer.css">

    <title>Rosario Music Shop</title>
</head>
<body>

<!-- header -->
    <div class="wrapper">
        <div class="header">
            <?php include "components/header/header.php"; ?>
        </div>
        
        <section class="main container my-3">
        <div class="jumbotron">
              <h1 class="display-4">GRACIAS POR SU COMPRA</h1>
              <p class="lead">Se ha enviado un mail con el detalle de su compra.</p>
              <hr class="my-4">
              <p>Vuelva al inicio, y disfrute de nuestros productos.</p>
              <a class="btn btn-primary btn-lg" href="index" role="button">Inicio</a>
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
<script src="js/compra.js"></script>
</body>
</html>


