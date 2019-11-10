<?php
require_once('datos/Conexion.php');
$res = $conexion->LeerUsuarios();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Eco-Commerce</title>
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

   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Usuarios</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Usuarios</li>
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
          <h3 class="card-title">Administracion de Usuarios</h3>
        </div>
        <div class="card-body">

    <button class="btn btn-success" data-toggle="modal" data-target="#modal-xl">Agregar Usuarios</button><br><br>

     <div class="modal fade" id="modal-xl">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Agregar Usuarios</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="procesos/procesoUsuario.php" method="post" enctype="multipart/form-data"> 
              <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                      <label>Nombre</label>
                      <input type="text" name="nombre" class="form-control" placeholder="Ingresar Nombre" required="true">
                    </div>
                    <div class="form-group">
                      <label>Contraseña</label>
                      <input type="password" name="contra" class="form-control" placeholder="Ingresar contraseña" required="true">
                    </div>
                    <div class="form-group">
                      <label>Alias</label>
                      <input type="text" name="alias" class="form-control" placeholder="Ingresar un alias" required="true">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label>Nivel</label>
                      <input type="text" name="nivel" class="form-control" placeholder="Ingresar nivel" required="true">
                    </div>
                     <div class="form-group">
                      <label>Estado</label>
                      <input type="text" name="estado" class="form-control" placeholder="Ingresar estado" required="true">
                    </div>
                  </div>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
              <button type="submit" name="guardarUsuario" class="btn btn-primary">Guardar</button>
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
                  <th>Nombre</th>
                  <th>Contraseña</th>
                  <th>Alias</th>
                  <th>Nivel</th>
                  <th>Estado</th>
                  <th>Actualizar</th>
                  <th>Eliminar</th>
                </tr>
                </thead>

                <tbody>
                 <?php
                while($r = mysqli_fetch_array($res)) {  

                 echo "<tr>";
                 echo "<td>".$r['nombreCompleto']."</td>";
                 echo "<td>".$r['contrasena']."</td>";
                 echo "<td>".$r['alias']."</td>";
                 echo "<td>".$r['nivel']."</td>";
                 echo "<td>".$r['estado']."</td>";
                 ?>
                <td><button class="btn btn-success">Actualizar</button></td>
                <td><button class="btn btn-danger">Eliminar</button></td>
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
