<?php
require_once('../datos/Conexion.php');

if(isset($_POST['guardarUsuario'])){
	 $nombre = $conexion->limpiar($_POST['nombre']);
	 $contra = $conexion->limpiar($_POST['contra']);
	 $alias = $conexion->limpiar($_POST['alias']);
	 $nivel = $conexion->limpiar($_POST['nivel']);
	 $estado = $conexion->limpiar($_POST['estado']);

	 if (empty($nombre)||empty($contra)||empty($alias)||empty($nivel)||empty($estado)) {
     	echo '<script> alert("Todos los campos deben ser llenados.");</script>';
	 	echo '<script> window.location="../usuario.php";</script>';
     }

    
     	 else{

		 $res = $conexion->guardarUsuario($nombre,$contra,$alias, $nivel,$estado);

		 if($res){
		 	echo '<script> alert("Datos agregados correctamente.");</script>';
		    echo '<script> window.location="../usuario.php";</script>';
		 }else{
		 	echo '<script> alert("Error al guardar los datos");</script>';
		   echo '<script> window.location="../productos.php";</script>';
		 }
		}
	 }

?>