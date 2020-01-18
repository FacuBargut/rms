<?php
    include "php/class/usuario.php";
    session_start();

    print_r($_SESSION['usuario']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="css/css/all.css" rel="stylesheet">
    <link href="css/perfil.css" rel="stylesheet">
    <link href="components/header/header.css" rel="stylesheet">
    

    <!-- Estilos header -->
    <link rel="stylesheet" href="components/header/header.css">
    <!-- Estilos footer -->
    <link rel="stylesheet" href="components/footer/footer.css">

    <title>Perfil</title>
</head>
<body>

<!-- header -->
    <div class="wrapper">
        <div class="header">
            <?php include "components/header/header.php"; ?>
        </div>
        
        <section class="main container my-3">
            <h1 class="text-center">Perfil usuario</h1>
            <form>
                  <div class="form-group">
                    <label for="modifyName">Nombre</label>
                    <input type="text" class="form-control" id="modifyName" aria-describedby="Nombre" value="<?php echo $_SESSION['usuario']->name;?>">
                  </div>
                  <div class="form-group">
                    <label for="modifySurname">Apellido</label>
                    <input type="text" class="form-control" id="modifySurname" aria-describedby="Apellido" value="<?php echo $_SESSION['usuario']->surname?>">
                  </div>
                  <div class="form-group">
                    <label for="modifyEmail">Email</label>
                    <input type="text" class="form-control" id="modifyEmail" aria-describedby="Email" value="<?php echo $_SESSION['usuario']->email;?>">
                  </div>
                  <div class="form-group">
                    <label>Numero de telefono</label>
                    <input type="text" class="form-control" id="modifyCodArea" aria-describedby="Codigo de area" value="<?php echo substr($_SESSION['usuario']->telephone,0,4);?>" placeholder="Cód. Área">
                    <input type="text" class="form-control" id="modifyTelephoneNumber" aria-describedby="Numero de telefono" value="<?php echo "15".substr($_SESSION['usuario']->telephone,-7);?>" placeholder="Número de telefono">
                  </div>
  
                  <button class="btn btn-success" id="saveModifyUser" type="submit">Guardar</button>
                  <button class="btn btn-primary" id="changePassword" >Cambiar Contraseña</button>
                </form>
        </section>

        <div class="footer">
            <?php include "components/footer/footer.php"; ?>
        </div>
    </div>

    <?php 
         include "components/modal/modal-cambio-contraseña.php"
    ?>

    



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="js/perfil.js"></script>
</body>
</html>


