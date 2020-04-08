<?php
  include '../php/class/producto.php';
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
            <?php
            $productos = producto::getProducts();
            $marcas = producto:: getBrands();
            $tipoIntrumentos = producto:: getIntrumentTypes();
            $categorias = producto:: getCategories();
            if(count($productos) > 0){ ?>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Descripción</th>
                      <th>Precio</th>
                      <th>Imagen</th>
                      <th>Stock</th>
                      <th>Marca</th>
                      <th>Tipo</th>
                      <th>Categoría</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                        <?php for ($i=0; $i < count($productos); $i++) { ?>
                        <tr>
                            <td><?php echo $productos[$i]->nombre;?></td>
                            <td><?php echo $productos[$i]->descripcion;?></td>
                            <td><?php echo $productos[$i]->precio;?></td>
                            <td style="width:10%;">
                                <img style="width:100%;" src="<?php echo "../".$productos[$i]->imagen;?>" alt="">
                                
                            </td>
                            <td><?php echo $productos[$i]->stock;?></td>
                            <td>
                                <?php for ( $m = 0; $m < count($marcas); $m++ ) {
                                    if($productos[$i]->idMarca == $marcas[$m]->id){
                                        echo $marcas[$m]->nombre;
                                        break;
                                    }
                                }   
                                ?>
                            </td>
                            <td>
                                <?php for ( $t = 0; $t < count($tipoIntrumentos); $t++ ) {
                                    if($productos[$i]->idTipoInstrumento == $tipoIntrumentos[$t]->id){
                                        echo $tipoIntrumentos[$t]->descripcion;
                                        break;
                                    }
                                }   
                                ?>
                            </td>
                            <td>
                                <?php for ( $c = 0; $c < count($categorias); $c++ ) {
                                    if($productos[$i]->idCategoria == $categorias[$c]->id){
                                        echo $categorias[$c]->descripcion;
                                        break;
                                    }
                                }   
                                ?>
                            </td>
                            <td>
                                <button class="btn btn-danger btn-circle deleteProduct">
                                        <i class="fas fa-trash"></i>
                                </button>
                                <button class="btn btn-warning btn-circle editProduct" data-toggle="modal" data-target="#staticBackdrop">
                                        <i class="fas fa-exclamation-triangle"></i>
                                </button>
                            </td>  
                            
                          </tr>
                        <?php } ?>
                  </tbody>
                </table>

            <?php
            }else{
              echo "Sin productos creados...";
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

  <!-- Logout Modal
  <div class="modal fade" >
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
    </div>
  </div> -->
  
  <!-- Modify modal -->


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div style="max-width: 75%;" class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Edición de producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
            <div class="form-group">
              <label for="nombre">Nombre</label>
              <input type="text" class="form-control" id="productName" aria-describedby="Nombre del producto">
            </div>
            <div class="form-group">
              <label for="descripcion">Descripción</label>
              <input type="text" class="form-control" id="productDescription">
            </div>
            <div class="form-group">
              <label for="precio">Precio</label>
              <input type="text" class="form-control" id="productPrice">
            </div>
            <div class="form-group">
              <label for="exampleFormControlFile1">Example file input</label>
              <input type="file" class="form-control-file" id="productImage">
            </div>
            <div class="form-group col-md-4">
                <label for="inputMarca">Marca</label>
                <select id="inputMarca" class="form-control">
                  <option selected></option>
                  <?php for ($i=0; $i < count($marcas) ; $i++) {  ?>
                    <option> <?php echo $marcas[$i]->descripcion; ?> </option>
                    <?php }  ?>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="inputTipo">Tipo</label>
                <select id="inputTipo" class="form-control">
                  <option selected>Choose...</option>
                  <?php for ($i=0; $i < count($tipoIntrumentos) ; $i++) {  ?>
                    <option> <?php echo $tipoIntrumentos[$i]->descripcion; ?> </option>
                    <?php }  ?>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="inputCategoria">Categoría</label>
                <select id="inputCategoria" class="form-control">
                  <option selected>Choose...</option>
                  <?php for ($i=0; $i < count($categorias) ; $i++) {  ?>
                    <option> <?php echo $categorias[$i]->descripcion; ?> </option>
                    <?php }  ?>
                </select>
            </div>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button id="updateProduct" type="button" class="btn btn-success">Cambiar</button>
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

  <!-- Script creado por mí -->
  <script src="js/productos.js"></script>

  <!-- sweetalert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>



</body>

</html>