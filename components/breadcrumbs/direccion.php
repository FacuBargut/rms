<h4>PASO 1/4: DIRECCIÓN DE ENVÍO O RETIRO</h4>
<?php
    session_start();
    for($i=0; $i < count($_SESSION['direcciones']); $i++){ ?>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="gridRadios1" id="gridRadios1" value="option1" checked>
            <label class="form-check-label" for="gridRadios1"><?php echo $_SESSION['direcciones'][$i]->direccion." ".$_SESSION['direcciones'][$i]->numero." - ".$_SESSION['direcciones'][$i]->localidad." - ".$_SESSION['direcciones'][$i]->provincia; ?></label>
        </div>
<?php
    }
?>

<div class="action-buttons">
    <button class="btn btn-danger" id="next">Siguiente</button>
    <button class="btn btn-light" id="newAdress">Nueva Dirección</button>
</div>
