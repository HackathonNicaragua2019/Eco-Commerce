<?php
require_once('datos/Conexion.php');
$res = $conexion->LeerProductos();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>AdminLTE 3 | Dashboard 2</title>
<?php
    include('includes/estilos.php');
 ?>
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
<?php
    include('includes/menu.php');
 ?>

<?php
    include('includes/aside.php');
 ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Productos</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Productos</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Administracion de Productos</h3>
        </div>
        <div class="card-body">

    <button class="btn btn-success" data-toggle="modal" data-target="#modal-xl">Agregar Producto</button><br><br>

     <div class="modal fade" id="modal-xl">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Agregar Producto</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="procesos/procesoProductos.php" method="post" enctype="multipart/form-data"> 
              <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                      <label>Nombre</label>
                      <input type="text" name="nombre" class="form-control" placeholder="Ingresar Nombre" required="true">
                    </div>
                    <div class="form-group">
                      <label>Caracteristicas</label>
                      <input type="text" name="caracteristicas" class="form-control" placeholder="Ingresar caracteristicas" required="true">
                    </div>
                    <div class="form-group">
                      <label>Precio Compra</label>
                      <input type="number" name="pcompra" class="form-control" placeholder="Ingresar Precio de Compra" required="true">
                    </div>
                    <div class="form-group">
                      <label>Precio Venta</label>
                      <input type="number" name="pventa" class="form-control" placeholder="Ingresar Precio de Venta" required="true">
                    </div>
                     <div class="form-group">
                      <label>Foto 1</label>
                      <input type="file" name="foto1" class="form-control" placeholder="Ingresar Foto 1" required="true">
                    </div>
                  </div>
                  <div class="col-md-6">
                      
                    <div class="form-group">
                      <label>Foto2</label>
                      <input type="file" name="foto2" class="form-control" placeholder="Ingresar Foto 2" required="true">
                    </div>
                    <div class="form-group">
                      <label>Foto 3</label>
                      <input type="file" name="foto3" class="form-control" placeholder="Ingresar Foto 3" required="true">
                    </div>
                    <div class="form-group">
                      <label>Observaciones</label>
                      <input type="text" name="observaciones" class="form-control" placeholder="Ingresar Observaciones" required="true">
                    </div>
                    <div class="form-group">
                      <label>Categoria</label>
                     <select class="form-control" name="idcategoria" required="true">
                        <?php
                            $categoria = $conexion->LeerCategorias();
                            while($cat = mysqli_fetch_array($categoria)) {   
                            echo "<option value='".$cat['idcategoria']."'>".$cat['descripcion']."</option>";
                                  }
                        ?>
                     </select>
                    </div>
                  </div>
              </div>
          
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
              <button type="submit" name="guardarProducto" class="btn btn-primary">Guardar</button>
               </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
     <div class="table-responsive">
       
     
          <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Foto 1</th>
                  <th>Foto 2</th>
                  <th>Foto 3</th>
                  <th>Nombre</th>
                  <th>Caracteristicas</th>
                  <th>P. Compra</th>
                  <th>P. Venta</th>
                  <th>Estado</th>
                  <th>Observaciones</th>
                  <th>Categoria</th>
                  <th>Actualizar</th>
                  <th>Borrar</th>
                </tr>
                </thead>

                <tbody>
                 <?php
                while($r = mysqli_fetch_array($res)) {  
                 $Foto1 = $r['foto1'];
                 $Foto2 = $r['foto2'];
                 $Foto3 = $r['foto3'];
                 $imagen1 = '<img src="'.$Foto1.'" width="50" height="50">';
                 $imagen2 = '<img src="'.$Foto2.'" width="50" height="50">';
                 $imagen3 = '<img src="'.$Foto3.'" width="50" height="50">';

                 echo "<tr>";
                 echo "<td>".$imagen1."</td>";
                 echo "<td>".$imagen2."</td>";
                 echo "<td>".$imagen3."</td>";
                 echo "<td>".$r['nombre']."</td>";
                 echo "<td>".$r['caracteristicas']."</td>";
                 echo "<td>".$r['precioCompra']."</td>";
                 echo "<td>".$r['precioVenta']."</td>";
                 echo "<td>".$r['estado']."</td>";
                 echo "<td>".$r['observaciones']."</td>";
                 echo "<td>".$r['idcategoria']."</td>";
                 ?>
                <td><button class="btn btn-success">Actualizar</button></td>
                <td><button class="btn btn-danger">Borrar</button></td>
                 <?php
                 echo "</tr>";      
                }  
                ?> 
               
                </tbody>
               
              </table>
        </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
 <?php
    include('includes/footer.php');
 ?>
</div>
<!-- ./wrapper -->
<?php
    include('includes/javas.php');
 ?>
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<script>
  $(function () {
    $("#example1").DataTable();
  });
</script>
</body>
</html>
