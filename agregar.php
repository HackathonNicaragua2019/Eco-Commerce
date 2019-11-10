<?php
include 'Conexion.php';
$conexion = new Conexion();

  if (isset($_GET['idproducto']) && isset($_GET['nombre']) && isset($_GET['cantidad']) && isset($_GET['idcomprador']) && isset($_GET['precio'])) {
		$idproducto = $_GET['idproducto'];
		$nombre = $_GET['nombre'];
		$precio = $_GET['precio'];
		$cantidad  = $_GET['cantidad'];
		$idcomprador=$_GET['idcomprador'];
		$subtotal = $cantidad * $precio;

		$repeticion = "select idproducto from carrito where idproducto = $idproducto and idcomprador=$idcomprador and estado='Activo'";
		$consult = mysqli_query($conexion->connection, $repeticion);
		$consulta = mysqli_num_rows($consult);

		if($consulta > 0){
		    echo '<script> alert("Ya existe en el carrito. Lo vamos a agregar");</script>';
			$sql = "update carrito set cantidad = cantidad+1 where idproducto=$idproducto and idcomprador=1 and Estado='Activo'";
				$res = mysqli_query($conexion->connection, $sql);

				if($res){
				    echo '<script> alert("Se ha agregado al carrito.");</script>';
					echo '<script> window.location="carrito.php";</script>';
				}
				else{
				     echo '<script> alert("Error al agregar al carrito");</script>';
					 echo '<script> window.location="index.php";</script>';
				     
				}
		}
		else{
		     echo '<script> alert("No existe en el carrito");</script>';
		        $sql = "INSERT INTO carrito (idproducto,producto,precio,idcomprador,cantidad,subtotal) values($idproducto,'$nombre',$precio,$idcomprador,$cantidad,$subtotal)";
				$res = mysqli_query($conexion->connection, $sql);

				if($res){
				    echo '<script> alert("Se ha agregado al carrito.");</script>';
					echo '<script> window.location="carrito.php";</script>';
				}
				else{
				     echo '<script> alert("Error al agregar al carrito");</script>';
					 echo '<script> window.location="index.php";</script>';
				     
				}
			
		}

		
}
else
{
		     echo '<script> alert("Error. Faltan completar campos");</script>';
			 echo '<script> window.location="index.php";</script>';
}

 

 
