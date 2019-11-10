<?php
include 'Conexion.php';
$conexion = new Conexion();
?>
<!DOCTYPE html>
<html>
<head>
<title>Eco-commerce</title>
<!--/tags -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Plataforma de comercio electronico en Nicaragua" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<?php include('includes/estilos.php');?>
</head>
<body>
<?php include('includes/header.php');?>
<!-- //header-bot -->
<!-- banner -->
<?php include('includes/menu.php');?>
<!-- //banner-top -->
<?php include('includes/modales.php');?>

	<div class="new_arrivals_agile_w3ls_info"> 
	<div class="container">		
		<h3 class="wthree_text_info">Carrito de Compras</h3>

		<?php
			$consulta = "select * from carrito where idcomprador=1";
			$resultado = mysqli_query($conexion->connection,$consulta);
			$count = mysqli_num_rows($resultado);

		?>

<p class="text-muted" style="color: green;" > Usted tiene actualmente <?php echo $count; ?> item(s) en su carrito. </p>
<div class="table-responsive" ><!-- table-responsive Starts -->
   <table class="table table-bordered table-condensed table-striped table-hover" ><!-- table Starts -->
     <thead><!-- thead Starts -->
		<tr style="background: #02936c;">
			<th style="color:white;">Foto</th>
			<th style="color:white;">Producto</th>
			<th style="color:white;">Precio</th>
			<th style="color:white;">Cantidad</th>
			<th style="color:white;">Subtotal</th>
			<th style="color:white;"> Actualizar </th>
			<th style="color:white;">Borrar  </th>
		</tr>
     </thead><!-- thead Ends -->
     <tbody><!-- tbody Starts -->
     	<?php
        $sql = "SELECT * FROM carrito where idcomprador = 1 and estado = 'Activo' order by idcarrito desc";
 		$res = mysqli_query($conexion->connection, $sql);
 		     
       while($r = mysqli_fetch_array($res)) { 
       $idcarrito = $r['idcarrito'];
       $codigo = $r['idproducto'];
       $sql2 = "SELECT * FROM productos where idproducto = $codigo";
 	   $res2 = mysqli_query($conexion->connection, $sql2);
 	   $respuesta = mysqli_fetch_assoc($res2);

 	   $imagen = $respuesta['foto1']; 
       echo "<tr>";
       	?>
       	<td><img src="<?php echo $imagen?>" width=50px heigth=50px> </td>
       	<?php
      echo "<td>".$r['producto']."</td>";
      echo "<td>".$r['precio']."</td>";
      $cantidad = $r['cantidad'];


      $precio = $r['precio'];
      $subtotal = $cantidad * $precio;
      ?> 
      <form action="procesos.php" method="get">
       <input type="hidden" name="idcarrito" value="<?php echo $idcarrito;?>">
       <td><input type="number" name="cantidad" value="<?php echo $cantidad;?>"></td>  
       <td><input type="text" name="subtotal" readonly="true" value="<?php echo $subtotal;?>"></td>
       <td>
       	<button type="submit" name="actualizarCarrito" class="label label-success"><i class="fa fa-trash">  Actualizar</i> </button>
      </form>
       </td>
       <td><a href="procesos.php?idCarritoActualizar=<?php echo $idcarrito; ?>"><span name="actualizarCarrito" class="label label-danger"> <i class="fa fa-trash"></i> Borrar</span></a> 
        </td>
        
    <?php
     }
    ?>
   <tfoot>
   	<?php
     $consulta = "select sum(subtotal) as total from carrito where idcomprador = 1 and estado = 'Activo'";
     $dato = mysqli_query($conexion->connection, $consulta);
     $mostrar = mysqli_fetch_assoc($dato);
     $subtotal2 = $mostrar['total'];
   	 ?>
   	  <td></td>
   	  <td></td>
   	  <td></td>
   	  <td></td>
   	   <td></td>
   	  <td style="background: #02936c;"><b style="color:white;">Pago Total</b></td>
   	  <td style="background: #02936c;"><b style="color:white;">C$<?php echo $subtotal2;?>.00</b></td>
   </tfoot>

</table><!-- table Ends -->

		</div>
</div>

</div>
<?php include('includes/footer.php');?>
<!-- login -->
<?php include('includes/modal2.php');?>
<!-- //login -->
<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>

<?php include('includes/javas.php');?>
</body>
</html>
