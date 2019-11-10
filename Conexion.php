<?php

class Conexion{

	public $connection; 
	function __construct()
	{
		$this->connect_db();
	}

	public function connect_db(){
		$this->connection = mysqli_connect('localhost', 'root', '', 'eco-commerce');
		if(mysqli_connect_error()){
			die("Conexion fallida a la base de datos" . mysqli_connect_error() . mysqli_connect_errno());
		}
		 if($this->connection){
                   mysqli_set_charset($this->connection,'utf8');
                }
	}
	public function limpiar($var){
		$return = mysqli_real_escape_string($this->connection, $var);
		return $return;
	}
    public function LeerProductos(){
		$sql = "SELECT * FROM productos order by idproducto desc";
 		$res = mysqli_query($this->connection, $sql);
 		return $res;
	}
	public function LeerProductosXID($id){
		$sql = "SELECT * FROM productos where idproducto = $id order by idproducto desc";
 		$res = mysqli_query($this->connection, $sql);
 		return $res;
	}
    public function guardarVenta($idcarrito,$idcomprador,$total){
		$sql = "INSERT INTO compras (idcarrito,idcomprador,total) VALUES ($idcarrito,$idcomprador,$total)";
		$res = mysqli_query($this->connection, $sql);
		if($res){
	 		return true;
		}else{
			return false;
		}
	}
	public function actualizarCarrito($idcomprador){
		$sql = "update carrito SET estado='Inactivo' WHERE idcomprador=$idcomprador";
		$res = mysqli_query($this->connection, $sql);
		if($res){
	 		return true;
		}else{
			return false;
		}
	} ///Municipios

	public function actualizarCantidadCarrito($idcarrito,$cantidad){
	$sql = "update carrito SET cantidad='$cantidad' WHERE idcarrito=$idcarrito";
		$res = mysqli_query($this->connection, $sql);
		if($res){
	 		return true;
		}else{
			return false;
		}
	} ///Municipios

	public function desactivarRegistro($tabla, $indice, $id){
		$sql = "update $tabla SET estado='Inactivo' WHERE $indice=$id";
		$res = mysqli_query($this->connection, $sql);
		if($res){
	 		return true;
		}else{
			return false;
		}
	}
}

$conexion = new Conexion();
?>