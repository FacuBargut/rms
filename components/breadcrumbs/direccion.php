<h4>PASO 1/4: DIRECCIÓN DE ENVÍO O RETIRO</h4>
<?php
    session_start();
    ?>
        <div class="form-check">
        <?php
            for($i=0; $i < count($_SESSION['direcciones']); $i++){ ?>        
            <label class="form-check-label">
                <input class="form-check-input" type="radio" name="direccion" id="gridRadios1" value = "<?php echo $_SESSION['direcciones'][$i]->direccion." ".$_SESSION['direcciones'][$i]->numero." - ".$_SESSION['direcciones'][$i]->localidad." - ".$_SESSION['direcciones'][$i]->provincia; ?>">
                <?php echo $_SESSION['direcciones'][$i]->direccion." ".$_SESSION['direcciones'][$i]->numero." - ".$_SESSION['direcciones'][$i]->localidad." - ".$_SESSION['direcciones'][$i]->provincia; ?>
            </label><br>
            <?php
            }
            ?>
        </div>


<div class="action-buttons">
    <button class="btn btn-danger" id="toFormaPago">Siguiente</button>
    <button class="btn btn-light" id="newAdress">Nueva Dirección</button>
</div>
