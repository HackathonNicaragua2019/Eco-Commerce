<?php
include 'Conexion.php';
$conexion = new Conexion();
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
    <div class="header" id="home">
  <div class="container">
    <ul>
        <li> <a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Entrar </a></li>
      <li> <a href="#" data-toggle="modal" data-target="#myModal2"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Registrarse </a></li>
      <li><i class="fa fa-phone" aria-hidden="true"></i> Llamar : 01234567898</li>
      <li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="mailto:info@example.com">eco-commerce@gmail.com</a></li>
    </ul>
  </div>
</div>
<?php include('includes/header.php');?>
<!-- //header-bot -->
<!-- banner -->
<?php include('includes/menu.php');?>
<!-- //banner-top -->
<?php include('includes/modales.php');?>

	<div class="new_arrivals_agile_w3ls_info"> 
	<div class="container">		

<div class="community-poll">
        <h4>Pasarela de Pago</h4>
        <div class="swit form"> 
          <div class="row">
            <div class="col-md-2">
               <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio" checked=""><i></i><img src="imagenes/western.png" width="150" height="60"></label> </div>
         </div>
            </div>
            <div class="col-md-2">
              <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i><img src="imagenes/moneygram.jpg" width="150" height="60"></label> </div>
         </div>
            </div>
            <div class="col-md-2">
               <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i><img src="imagenes/paypal.png" width="150" height="60"></label> </div>
         </div>
            </div>
            <div class="col-md-2">
               <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i><img src="imagenes/tarjeta.png" width="150" height="40"></label> </div>
         </div>
            </div>
            <div class="col-md-2">
                 <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i><img src="imagenes/bitcoin.png" width="150" height="60"></label> </div>
         </div> 
            </div>
          </div>
         
          
         
         
       
          <input type="submit" value="Pagar">
        </div>
      </div>
<div class="table-responsive" ><!-- table-responsive Starts -->
   
		</div>
</div>

</div>
<?php include('includes/footer.php');?>
<!-- login -->
<?php include('includes/modal2.php');?>
<!-- //login -->
<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>

<?php include('includes/javas.php');?>
</body>
</html>
