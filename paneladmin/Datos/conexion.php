<?php
class Conexion{

	public $connection; 
	function __construct()
	{
		$this->connect_db();
	}

	public function connect_db(){
		$this->connection = mysqli_connect('eco-commerce.solucionestecnologicasrocha.com', 'solucion_sysuni5', 'unisistemas2019..', 'solucion_ecocommerce');
		if(mysqli_connect_error()){
			die("Conexion fallida a la base de datos" . mysqli_connect_error() . mysqli_connect_errno());
		}
		 if($this->connection){
                   mysqli_set_charset($this->connection,'utf8');
                }
	}

}
?>