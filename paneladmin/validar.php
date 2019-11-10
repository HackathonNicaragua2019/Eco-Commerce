  <?php
            session_start();
			require_once "datos/Conexion.php";
			$conexion = new Conexion();

			if(isset($_POST['login'])){
				$usuario = mysqli_real_escape_string($conexion->connection, htmlspecialchars($_POST['user']));
                $pw = mysqli_real_escape_string($conexion->connection, htmlspecialchars($_POST['pass']));
			    $tipo =$_POST['tipo'];

				$log = mysqli_query($conexion->connection, "SELECT * FROM usuarios WHERE alias='$usuario' AND contrasena='$pw'and nivel='Administrador' and estado='Activo'");
				if (mysqli_num_rows($log)>0) {
					$row = mysqli_fetch_array($log);
					$_SESSION["alias"] = $row['alias'];
					$_SESSION["nivel"] = $row['nivel'];
					$_SESSION["idusuario"] = $row['idusuario'];
				  	echo '<script> alert("Bienvenidos al Sistema.");</script>';
					echo '<script> window.location="inicio.php"; </script>';
				}
				else{
					echo '<script> alert("Usuario o contraseña incorrectos.");</script>';
					echo '<script> window.location="inicio.php"; </script>';
				}
			}
		?>