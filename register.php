<?php
    include "php/class/usuario.php";
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
    <link href="css/register.css" rel="stylesheet">
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
            <h1 class="text-center">Alta de usuario</h1>
            <form>
                  <div class="form-group">
                    <label for="registerName">Nombre</label>
                    <input type="text" class="form-control" id="registerName" aria-describedby="Nombre" placeholder="Ingresar nombre">
                  </div>
                  <div class="form-group">
                    <label for="registerSurname">Apellido</label>
                    <input type="text" class="form-control" id="registerSurname" aria-describedby="Apellido" placeholder="Ingresar apellido">
                  </div>
                  <div class="form-group">
                    <label for="registerEmail">Email</label>
                    <input type="text" class="form-control" id="registerEmail" aria-describedby="Email" placeholder="Ingresar email">
                  </div>
                  <div class="form-group">
                    <label for="registerPassword1">Contraseña</label>
                    <input type="password" class="form-control" id="registerPassword1" aria-describedby="Contraseña" placeholder="Ingresar contraseña">
                  </div>
                  <div class="form-group">
                    <label for="registerPassoword2">Confirmar contraseña</label>
                    <input type="password" class="form-control" id="registerPassword2" aria-describedby="ConfirmarContraseña" placeholder="Confirmar contraseña">
                  </div>
                  <div class="form-group">
                    <label>Numero de telefono</label>
                    <input type="text" class="form-control" id="registerCodArea" aria-describedby="Codigo de area" placeholder="Cód. Área">
                    <input type="text" class="form-control" id="registerTelephoneNumber" aria-describedby="Numero de telefono" placeholder="Número de telefono">
                  </div>
  
                  <button class="btn btn-primary" id="registerUser" type="submit">Registrar</button>
                </form>
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
<script src="js/register.js"></script>
</body>
</html>


