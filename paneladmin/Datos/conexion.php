<?php

class Conexion{

	public $connection; 
	function __construct()
	{
		$this->connect_db();
	}

	public function connect_db(){
		$this->connection = mysqli_connect('localhost', 'root', '', 'solucion_ecocommerce');
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

	public function LeerCategorias(){
		$sql = "SELECT * FROM categorias order by idcategoria desc";
 		$res = mysqli_query($this->connection, $sql);
 		return $res;
	}

	public function guardarProducto($nombre,$caracteristicas,$pcompra,$pventa,$foto1,$foto2,$foto3,$observaciones,$idcategoria){
		$sql = "INSERT INTO productos (nombre,caracteristicas,precioCompra,precioVenta,foto1,foto2,foto3,observaciones,idcategoria) VALUES ('$nombre','$caracteristicas',$pcompra,$pventa,'$foto1','$foto2','$foto3','$observaciones',$idcategoria)";
		$res = mysqli_query($this->connection, $sql);
		if($res){
	 		return true;
		}else{
			return false;
		}
	}

	public function actualizarMunicipio($nombre,$id){
		$sql = "update semunicipio SET nombreMunicipio='$nombre' WHERE idmunicipio=$id";
		$res = mysqli_query($this->connection, $sql);
		if($res){
	 		return true;
		}else{
			return false;
		}
	} ///Municipios

	public function ValidarImagen($imagen){
		$Extension = strtolower(pathinfo($imagen,PATHINFO_EXTENSION));
        $extensionesValidas = array('jpeg', 'jpg', 'png', 'gif'); 

       if(in_array($Extension, $extensionesValidas)){
	   return true;
	   }
	   else{
	   	return false;
	   }
	}

	//Funciones del CRUD  para la tabla usuario ----------------------------------
	public function LeerUsuarios(){
		$sql = "SELECT * FROM usuarios order by idusuario desc";
 		$res = mysqli_query($this->connection, $sql);
 		return $res;
	}

		public function guardarUsuario($nombreCompleto,$contrasena,$alias,$nivel,$estado){
		$sql = "INSERT INTO usuarios (nombreCompleto, contrasena, alias, nivel, estado) VALUES ('$nombreCompleto','$contrasena','$alias','$nivel','$estado')";
		$res = mysqli_query($this->connection, $sql);
		if($res){
	 		return true;
		}else{
			return false;
		}
	}

		public function actualizarUsuario($nombre,$id){
		$sql = "update usuarios SET nombreCompleto='$nombreCompleto' WHERE idusuario=$id";
		$res = mysqli_query($this->connection, $sql);
		if($res){
	 		return true;
		}else{
			return false;
		}
	}

	public function eliminarUsuario($S){
		$sql = "delete from usuarios WHERE id='$nombreCompleto'";
	}


	// funciones para leer las compras
	public function leerCompra(){
		$sql = "SELECT * FROM compras order by idcompra desc";
		$res = mysqli_query($this->connection, $sql);
		return $res;
	}

	//Funcion para leer la tabla carrito
	public function leerCarrito(){
		$sql = "SELECT * FROM carrito order by idcarrito desc";
		$res = mysqli_query($this->connection, $sql);
		return $res;
	}
}

$conexion = new Conexion();
?>
