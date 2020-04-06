
<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cambio de contraseña</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="passwordForm">
            <div class="form-group">
              <label for="currentlyPassword">Contraseña actual</label>
              <input type="password" class="form-control" id="currentlyPassword" aria-describedby="currentlyPassoword" placeholder="Ingrese contraseña actual" required>
            </div>
            <div class="form-group">
              <label for="newPassword">Nueva contraseña</label>
              <input type="password" class="form-control" id="newPassword" placeholder="Ingrese nueva contraseña" required>
            </div>
            <div class="form-group">
              <label for="confirmedPassword">Confirmar nueva contraseña</label>
              <input type="password" class="form-control" id="confirmedPassword" placeholder="Confirme la nueva contraseña" required>
            </div>
      
</form>





        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary btn-block" id="savePassword">Aceptar</button>
      </div>
    </div>
  </div>
</div>