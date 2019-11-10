<?php
 require_once('Conexion.php');
$conexion = new Conexion();

$consulta = "select * from carrito where idcomprador=1";
$resultado = mysqli_query($conexion->connection,$consulta);
$count = mysqli_num_rows($resultado);

$total = 0;
$total2 = 0;

$sql = "SELECT sum(subtotal) as tot FROM carrito where idcomprador = 1 and estado = 'Activo'";
$resultado = mysqli_query($conexion->connection,$sql);
while($row=mysqli_fetch_assoc($resultado)){
$total+=$row['tot'];	
}

$sql2 = "SELECT count(idcompra) as tot FROM compras where idcomprador = 1";
$resultado2 = mysqli_query($conexion->connection,$sql2);
while($row2=mysqli_fetch_assoc($resultado2)){
$total2+=$row2['tot'];	
}

$cantidad = round($total2 / 2);

?>



<div class="ban-top">
	<div class="container">
		<div class="top_nav_left">
			<nav class="navbar navbar-default">
			  <div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
				  <ul class="nav navbar-nav menu__list">
					<li class="active menu__item menu__item--current"><a class="menu__link" href="index.php">Inicio <span class="sr-only">(current)</span></a></li>
					<li class=" menu__item"><a class="menu__link" href="#">Categorias</a></li>
					<li class=" menu__item"><a class="menu__link" href="#">Todos los Productos</a></li>
					<li class=" menu__item"><a class="menu__link" href="carrito.php">Carrito</a></li>
				  </ul>
				</div>
			  </div>
			</nav>	
		</div>
		<div class="top_nav_right">
			<div class="wthreecartaits wthreecartaits2 cart cart box_1"> 
						 

					<div class="row">
					<div class="col-md-6">
						<form action="carrito.php" method="post" class="last"> 
						<input type="hidden" name="cmd" value="_cart">
						<input type="hidden" name="display" value="1">
						<button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-shopping-cart" aria-hidden="true" ><span class="label label-success"><?php echo $total; ?></span></i></button>
					</form> 
					</div>
					<div class="col-md-6">
						<form action="#" method="post" class="last"> 
						<input type="hidden" name="cmd" value="_cart">
						<input type="hidden" name="display" value="1">
			<button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-tree" aria-hidden="true"><span class="label label-success"><?php echo $cantidad; ?></span></i></button>
					</form> 
					</div>
					</div> 
  
  
						</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>