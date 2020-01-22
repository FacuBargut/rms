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
    <link href="css/checkout.css" rel="stylesheet">
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
        <section class="main">
          <div class="information-entry">
              <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item">Dirección</li>
                      <li class="breadcrumb-item">Forma de pago</li>
                      <li class="breadcrumb-item">Confirmar</li>
                  </ol>
              </nav>

               <div id="checkout">
                 
               </div> 




          </div>
          <div class="chart-revision">
              <div class="wrapp-revision">
                <div class="revision-title">
                    <h3>Revisión del pedido</h3><a href="chart">Modificar</a>
                </div>
                <div class="revision-body">
                  <ul>
                    <?php for($i=0;$i<count($_SESSION['carrito']);$i++){ ?>

                    <li class="chart-item">
                        <div class="wrapper-img-item">
                            <img src="<?php echo $_SESSION['carrito'][$i]['img']; ?>">
                        </div>
                        <div class="wrapper-details-item">
                            <h1><?php echo $_SESSION['carrito'][$i]['nombre']; ?></h1>
                            <h1>Cantidad: <?php echo $_SESSION['carrito'][$i]['cantidad']; ?></h1>
                            <h1>$ <?php echo $_SESSION['carrito'][$i]['total']; ?></h1>
                        </div>
                    </li>

                    <?php
                      }
                    ?>
                  </ul>
                </div>
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
<script src="js/checkout.js"></script>
<script src="components/header/header.js"></script>
</body>
</html>


