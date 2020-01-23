<?php

  include "php/class/usuario.php";
  include "php/class/producto.php";
  session_start();

  print_r($_SESSION['carrito']);
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="css/css/all.css" rel="stylesheet">
    <link href="css/chart.css" rel="stylesheet">
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

        <?php

          if(!isset($_SESSION['carrito'])){
          ?>
            <h1>Carrito de compras vacio</h1>
          <?php
          }else{

        ?>
        <table class="table">
              <thead>
                <tr>
                  <th></th>
                  <th>Producto</th>
                  <th>Precio</th>
                  <th>Cantidad</th>
                  <th>Subtotal</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                    <?php
                        $total = 0;
                        for($i=0;$i<count($_SESSION['carrito']);$i++){
                            $total = $total + ($_SESSION['carrito'][$i]['cantidad']*$_SESSION['carrito'][$i]['precio']);
                    ?>
                      <tr>
                        <td><img src="<?php echo $_SESSION['carrito'][$i]['img']; ?>" alt="">
                        <td><p><?php echo $_SESSION['carrito'][$i]['nombre']; ?></p></td>
                        <td>$ <?php echo number_format($_SESSION['carrito'][$i]['precio'],2,",","."); ?></td>
                        <td><?php echo $_SESSION['carrito'][$i]['cantidad']; ?></td>
                        <td>$ <?php echo number_format(($_SESSION['carrito'][$i]['cantidad']*$_SESSION['carrito'][$i]['precio']),2,",","."); ?></td>
                        <td>
                        <!-- number_format($_SESSION['carrito'][$i]['total'],2,",",".") -->
                          <button data-id="<?php echo $_SESSION['carrito'][$i]['id']; ?>"
                                  class="btn btn-danger deleteProductChart"
                                  >
                                  X
                          </button>
                        </td>
                      </tr>
                    <?php
                      }
                    ?>
             </tbody>
        </table>
        <div class="totalChart">

        <!-- echo number_format($Producto->precio,2,",",".") -->
             <h3>Total: $<input type="text" value="<?php echo number_format($total,2,",","."); ?>"></h3>
        </div>
        <?php
          }
        ?>
        </section>

        <div class="action-buttons">
                <button id="deleteChart"
                        class="btn btn-danger"
                        <?php if(!isset($_SESSION['carrito'])){
                          ?>disabled<?php } ?>
                        >Vaciar carro
                </button>
                <button id="buyChart"
                        class="btn btn-primary"
                        <?php if(!isset($_SESSION['carrito'])){
                          ?>disabled<?php } ?>
                        >Comprar
                </button>
        </div>


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
<script src="js/chart.js"></script>
<script src="components/header/header.js"></script>
</body>
</html>


