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
    <link href="css/index.css" rel="stylesheet">
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
        
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/carrousel/feder.png" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Mira lo ultimo de Fender</h5>
          <p>Enterate de los ultimos productos que ingresaron a nuestra tienda</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="img/carrousel/gibson.png" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Gibson nunca se queda atras!</h5>
          <p>Como siempre, Gibson demostrando su calidad en guitarras. Entra y mira lo ultimo que ingreso</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="img/carrousel/acoustic.png" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Lo clasico nunca pasa de moda</h5>
          <p>Enterate de lo ultimo en guitarras acusticas y electroacusticas para darle ese toque clasico a tus canciones</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <section class="main container my-3">
      <div class="offerTittle">
            <h1>Mejores ofertas</h1>
      </div>
      
      <?php 

      $productos = producto::getProducts();
      for($i=0;$i<count($productos);$i++){
        // echo $productos[$i];
      ?>
          <div class="card">
              <img src="<?php echo $productos[$i]->imagen; ?>" class="card-img-top">
              <div class="card-body">
                  <h5 class="card-title"><?php  echo $productos[$i]->nombre; ?></h5>
                  <p>$ <?php echo $productos[$i]->precio; ?></p>
                  <a href="producto-detalle?intrument=<?php echo $productos[$i]->id;?>" class="btn btn-primary btn-block">Ver más</a>
              </div>
          </div>
      <?php
  }
  ?>
      
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
<script src="js/index.js"></script>
<script src="components/header/header.js"></script>
</body>
</html>


