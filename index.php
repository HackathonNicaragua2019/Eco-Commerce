<?php
require_once('Conexion.php');
$res = $conexion->LeerProductos();
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
<!-- header -->
<div class="header" id="home">
	<div class="container">
		<ul>
		    <li> <a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Entrar </a></li>
			<li> <a href="#" data-toggle="modal" data-target="#myModal2"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Registrarse </a></li>
			<li><i class="fa fa-phone" aria-hidden="true"></i> Llamar : 01234567898</li>
			<li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="mailto:info@example.com">info@example.com</a></li>
		</ul>
	</div>
</div>
<!-- //header -->
<!-- header-bot -->
<?php include('includes/header.php');?>
<!-- //header-bot -->
<!-- banner -->
<?php include('includes/menu.php');?>
<!-- //banner-top -->
<?php include('includes/modales.php');?>

<!-- banner -->
<?php include('includes/carrusel.php');?>

	<div class="new_arrivals_agile_w3ls_info"> 
	<div class="container">
		<div class="row">
		   <div class="col-md-3 products-left">
			
			<div class="community-poll">
				<h4>Categorias</h4>
				<div class="swit form">	
					<form>
					<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio" checked=""><i></i>Electronica</label> </div>
				   </div>
				   <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Ropa</label> </div>
				   </div>
				   <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Calzado</label> </div>
				   </div>	
				    <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Electrodomesticos</label> </div>
				   </div>	
				   <input type="submit" value="Ver">
					</form>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>	
        
		<div col-md-8>
			
		
		<div class="container">
		    <h3 class="wthree_text_info">Nuevos productos</h3>		

		       <?php
                while($r = mysqli_fetch_array($res)) { 
                $idproducto =   $r['idproducto'];
                $nombre =   $r['nombre'];
                $precio =   $r['precioVenta'];
                $descripcion =   $r['caracteristicas'];
                $foto1 =   $r['foto1'];
                $foto2 =   $r['foto2'];
                $foto3 =   $r['foto2'];
                ?> 
				<div class="col-md-3 product-men">
					<div class="men-pro-item simpleCart_shelfItem">
					 <div class="men-thumb-item">
						<img src="<?php echo $foto1; ?>" alt="" class="pro-image-front">
						<img src="<?php echo $foto1; ?>" alt="" class="pro-image-back">
						  <div class="men-cart-pro">
							<div class="inner-men-cart-pro">
							 <a href="desc.php?idProducto=<?php echo $r['idproducto']; ?>" class="link-product-add-cart">Ver Detalles</a>
							</div>
						  </div>
							<span class="product-new-top">Nuevo</span>								
					</div>
			   <div class="item-info-product ">
					<h4><a href="#"> <?php echo $nombre; ?></a></h4>
					  <div class="info-product-price">
							<span class="item_price">C$ <?php echo $precio; ?></span>
					 </div>
			       <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
						<form action="agregar.php" method="get">
							<fieldset>
							  <input type="hidden" name="idproducto" value="<?php echo $idproducto; ?>">
							   <input type="hidden" name="nombre" value="<?php echo $nombre; ?>">
							    <input type="hidden" name="precio" value="<?php echo $precio; ?>">
							  <input type="hidden" name="idcomprador" value="1">
							  <input type="hidden" name="cantidad" value="1">
							  <input type="submit" name="submit" name="agregarcarrito" value="Agregar al Carrito" class="button" />
							</fieldset>
						</form>
					</div>
																			
				</div>
			</div>
		</div>	<!-- //Final de un Producto --> 
         <?php } ?>
	    </div></div></div> </div>
</div>
	<!-- //new_arrivals --> 

<?php include('includes/footer.php');?>
<!-- login -->
<?php include('includes/modal2.php');?>
<!-- //login -->
<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>

<?php include('includes/javas.php');?>
</body>
</html>
