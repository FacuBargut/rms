<form id="loginForm">
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="LoginEmail" aria-describedby="loginEmail" placeholder="Ingrese email" required>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Contraseña</label>
      <input type="password" class="form-control" id="LoginPassword" placeholder="Ingrese contraseña" required>
    </div>
    <p>¿No estas registrado?<a href="./register.php">Crear cuenta</a></p>
    <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
</form>


<style>
  button{
    margin-top:8%;
  }
</style>