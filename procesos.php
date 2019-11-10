<?php
include 'Conexion.php';
$conexion = new Conexion();

if(isset($_GET['actualizarCarrito'])){
	 $cantidad = $_GET['cantidad'];
	 $idcarrito = $_GET['idcarrito'];

		 $res = $database->guardarAsignacion($docente,$year,$asignatura,$grado,$semestre,$observaciones);
		 if($res){
		 	echo '<script> alert("Datos agregados correctamente.");</script>';
		    echo '<script> window.location="../asignaciones.php";</script>';
		 }else{
		 	echo '<script> alert("Error al guardar los datos");</script>';
		 	//echo '<script> window.location="../asignaciones.php";</script>';
		 }
 }

?>