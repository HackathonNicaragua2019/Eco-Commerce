<?php
require_once "../datos/Conexion.php";

if(isset($_POST['guardarProducto'])){
	 $nombre = $conexion->limpiar($_POST['nombre']);
	 $caracteristicas = $conexion->limpiar($_POST['caracteristicas']);
	 $pcompra = $conexion->limpiar($_POST['pcompra']);
	 $pventa = $conexion->limpiar($_POST['pventa']);
	 $observaciones = $conexion->limpiar($_POST['observaciones']);
	 $idcategoria = $conexion->limpiar($_POST['idcategoria']);
	

	 if (empty($nombre)||empty($caracteristicas)||empty($pcompra)) {
     	echo '<script> alert("Todos los campos deben ser llenados.");</script>';
	 	echo '<script> window.location="../productos.php";</script>';
     }
     if (!$conexion->ValidarImagen($_FILES['foto1']['name'])) {
     	echo '<script> alert("La imagen no es valida");</script>';
	 	echo '<script> window.location="../productos.php";</script>';
     }
     if (!$conexion->ValidarImagen($_FILES['foto2']['name'])) {
     	echo '<script> alert("La imagen no es valida");</script>';
	 	echo '<script> window.location="../productos.php";</script>';
     }
     if (!$conexion->ValidarImagen($_FILES['foto3']['name'])) {
     	echo '<script> alert("La imagen no es valida");</script>';
	 	echo '<script> window.location="../productos.php";</script>';
     }
	 else{
			$rutaservidor1='../imagenes/productos';
			$rutatemporal1=$_FILES['foto1']['tmp_name'];
			$nombrefoto1=$_FILES['foto1']['name'];
			$rutadestino1=$rutaservidor1.'/'.$nombrefoto1;
			$rutafinal1 = substr($rutadestino1, 3);
			move_uploaded_file($rutatemporal1, $rutadestino1);

			$rutaservidor2='../imagenes/productos';
			$rutatemporal2=$_FILES['foto2']['tmp_name'];
			$nombrefoto2=$_FILES['foto2']['name'];
			$rutadestino2=$rutaservidor2.'/'.$nombrefoto2;
			$rutafinal2 = substr($rutadestino2, 3);
			move_uploaded_file($rutatemporal2, $rutadestino2);

			$rutaservidor3='../imagenes/productos';
			$rutatemporal3=$_FILES['foto3']['tmp_name'];
			$nombrefoto3=$_FILES['foto3']['name'];
			$rutadestino3=$rutaservidor3.'/'.$nombrefoto3;
			$rutafinal3 = substr($rutadestino3, 3);
			move_uploaded_file($rutatemporal3, $rutadestino3);

		 $res = $conexion->guardarProducto($nombre,$caracteristicas,$pcompra,$pventa, $rutafinal1,$rutafinal2,$rutafinal3,$observaciones,$idcategoria);

		 if($res){
		 	echo '<script> alert("Datos agregados correctamente.");</script>';
		    echo '<script> window.location="../productos.php";</script>';
		 }else{
		 	echo '<script> alert("Error al guardar los datos");</script>';
		 //	echo '<script> window.location="../productos.php";</script>';
		 }
	 }
 }


?>