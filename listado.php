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
    <link href="css/listado.css" rel="stylesheet">
    <link href="components/header/header.css" rel="stylesheet">
    

    <!-- Estilos header -->
    <link rel="stylesheet" href="components/header/header.css">
    <!-- Estilos footer -->
    <link rel="stylesheet" href="components/footer/footer.css">

    <title>Rosario Music Shop</title>


</head>


<body>

    <!-- Recibo variables de url -->
    <?php
        $idInstrumento = $_GET['i'];
        $idCategoria = $_GET['c'];

        $productos = producto::getInstrumentCategoryAvailable($idInstrumento, $idCategoria);
        $IdMarcas = array();
        // var_dump($productos);
        for ($i = 0; $i < count($productos); $i++){
            array_push($IdMarcas,$productos[$i]->idMarca);
            // echo $productos[$i]->idMarca;
        }
        
        $marcas = producto::getBrandsByIdBrands($IdMarcas);
        
    ?>

    <div class="wrapper">

        <div class="header">
            <?php include "components/header/header.php"; ?>
        </div>

        <section class="main container my-3">
              <div class="sidebar">
                    <div class="sidebarIntruments">
                        <div class="title">Instrumentos</div>
                        <div class="body">
                            <ul></ul>
                        </div>
                    </div>
                    <div class="sidebarMarcas">
                        <div class="title">Marcas</div>
                        <div class="body">
                            <ul></ul>
                        </div>
                    </div>
                    <div class="sidebarPrice">
                        <div class="title">Rango de Precio</div>
                        <div class="body">
                            <input type="number" value="Min."> - <input type="number" value="Máx."><button class="btn btn-light">Consultar</button>
                        </div>
                    </div>
                    
              </div>
              <div class="productos">
                    <div class="opc-ordenamiento">

                    </div>
                    <div class="productos">
                    <?php
                    if(count($productos) === 0){ ?>
                        <h1>No se han cargado productos</h1>
                    <?php
                    }else{

                    
                    for ($i=0; $i < count($productos); $i++){
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
                    }
                    ?>
                        
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
<script src="js/listado.js"></script>
<script src="components/header/header.js"></script>
</body>
</html>


