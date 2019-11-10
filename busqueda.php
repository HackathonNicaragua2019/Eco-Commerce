
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
		
		<div class="container">	

			<?php
				require_once('Conexion.php');
				$conexion = new Conexion();
				if(isset($_GET['buscar'])){
				$key = $_GET['textobuscar'];
				$get_productoss = "select * from productos where nombre like '%$key%'";
				$run_productos = mysqli_query($conexion->connection,$get_productoss);
				$count = mysqli_num_rows($run_productos);
				if($count==0){
				echo "
				<div class='box'>
				<h2>No se encontraron resultados de búsqueda</h2>
				</div>
				";

				}
				?>
		        <h4>Productos encontrados con el termino "<?php echo $key;?>"</h4>	

		       <?php
                while($r = mysqli_fetch_array($run_productos)) { 
                $idproducto =   $r['idproducto'];
                $nombre =   $r['nombre'];
                $precio =   $r['precioVenta'];
                $foto1 =   $r['foto1'];
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
					<h4><a href="single.html"> <?php echo $nombre; ?></a></h4>
					  <div class="info-product-price">
							<span class="item_price">C$ <?php echo $precio; ?></span>
					 </div>
			       <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
						<form action="#" method="post">
							<fieldset>
							  <input type="submit" name="submit" value="Agregar al Carrito" class="button" />
							</fieldset>
						</form>
					</div>
																			
				</div>
			</div>
		</div>	<!-- //Final de un Producto --> 
         <?php }
         ?>
	    </div></div>
</div>
	<!-- //new_arrivals --> 
	<?php
        

        }?>

<?php include('includes/footer.php');?>
<!-- login -->
<?php include('includes/modal2.php');?>
<!-- //login -->
<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>

<?php include('includes/javas.php');?>
</body>
</html>
