<?php
  include '../php/class/usuario.php';
  session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Clientes</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <link href="css/clientes.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include 'sidebar.php'; ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
        <?php include 'nav.php'; ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Clientes</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">
            <button class="btn btn-primary addClient" data-toggle="modal" data-target="#modalClient"><i class="fas fa-plus"></i></button>
            <?php
            $usuarios = usuario::getUsers();
            if(count($usuarios) > 0){ ?>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Apellido</th>
                      <th>Mail</th>
                      <th>Contraseña</th>
                      <th>Activo</th>
                      <th>Administrator</th>
                      <th>Telefono</th>
                      <th></th>

                  </thead>
                  <tbody>
                        <?php for ($i=0; $i < count($usuarios); $i++) { ?>
                        <tr>
                            <td><?php echo $usuarios[$i]->nombre;?></td>
                            <td><?php echo $usuarios[$i]->apellido;?></td>
                            <td><?php echo $usuarios[$i]->email;?></td>
                            <td><?php echo $usuarios[$i]->password;?></td>
                            <td>
                                <?php if ($usuarios[$i]->activo){
                                    echo 'Si';
                                }else{
                                  echo 'No';
                                }
                                 ?>
                            </td>
                            <td>
                              <?php if ($usuarios[$i]->admin){
                                    echo 'Si';
                                }else{
                                  echo 'No';
                                }
                                 ?>
                            </td>
                            <td><?php echo $usuarios[$i]->telefono;?></td>
                            <td>
                            <button class="btn btn-danger btn-circle deleteClient">
                                        <i class="fas fa-trash"></i>
                                </button>
                                <button class="btn btn-warning btn-circle editClient" data-toggle="modal" data-target="#modalClient">
                                        <i class="fas fa-exclamation-triangle"></i>
                                </button>
                            </td>
                          </tr>
                        <?php } ?>
                  </tbody>
                </table>

            <?php
            }else{
              echo "Sin usuarios creados...";
            }
            ?>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <!-- <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.php">Logout</a>
        </div>
      </div>
    </div> -->
    <div class="modal fade" id="modalClient" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalClientLabel" aria-hidden="true">
  <div style="max-width: 75%;" class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalClientLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
            <div class="form-group">
              <label for="nombre">Nombre</label>
              <input type="text" class="form-control" id="clientName" aria-describedby="Nombre del producto">
            </div>
            <div class="form-group">
              <label for="apellido">Apellido</label>
              <input type="text" class="form-control" id="clientDescription">
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                  <label for="mail">Mail</label>
                  <input type="text" class="form-control" id="clientPassword">
                </div>
                <div class="form-group col-md-6">
                  <label for="precio">Contraseña</label>
                  <input type="password" class="form-control" id="clientPassword">
                </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                  <div class="custom-control custom-switch form-group">
                      <input type="checkbox" class="custom-control-input" id="activeSwitch">
                      <label class="custom-control-label" for="activeSwitch">Activo</label>
                  </div>
                  <div class="custom-control custom-switch form-group">
                    <input type="checkbox" class="custom-control-input" id="adminSwitch">
                    <label class="custom-control-label" for="adminSwitch">Administrador</label>
                  </div>
              </div>
              <div class="form-group col-md-6">
                  <label for="telefono">Telefono</label>
                  <input type="text" class="form-control" id="clientTelefono">
              </div>
            </div>

      </form>
      </div>
      <div class="modal-footer">
        <i class="fas fa-circle-notch fa-spin"></i>
        <button id="cancelProduct" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button id="updateProduct" type="button" class="btn btn-success">Cambiar</button>
        <button id="addProduct" type="button" class="btn btn-primary">Aceptar</button>
      </div>
    </div>
  </div>
</div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

  <!-- Script creado por mi -->
  <script src="js/clientes.js"></script>

  <!-- sweetalert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

</body>

</html>