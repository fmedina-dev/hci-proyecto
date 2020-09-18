<?php
				
					
	session_start();
	
	require("database/conexion.php");
	
	$conexion= mysqli_connect($db_host, $db_usuario, $db_contrasena, $db_nombre);
	
	if(mysqli_connect_errno()){
		
		echo "No se conecto con la base de datos.";	
		exit();
	}
	
	//caracteres que maneja la base de datos
	mysqli_set_charset($conexion, "utf8");
	
	$ver=$_SESSION['u_log'];
	//query
	$consulta="SELECT * FROM cliente WHERE cliente_correo= '".$ver."'";
	
	//resultado de la consulta
	$resultado=mysqli_query($conexion, $consulta);
	
	$fila = mysqli_fetch_row($resultado);
	
	mysqli_close($conexion);
	
?>
					

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto</title>
	<link rel="stylesheet" href="styles.css">
	<script src="https://kit.fontawesome.com/771f707260.js" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/css2?family=Fira+Sans+Condensed:wght@300;400;500;600&display=swap" rel="stylesheet"> 
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>

    <header>
		<div class="wrapp">
			<div class="logo">
				<a href="index.php" class="empresa">Novedades Estrellita</a>
			</div>
					
			<nav>
				<ul>						
					<li> 
					<div class="buscar-product">
						<form action="" method="post" target="_blank">
							<input type="search" name="" placeholder="Busca un producto...">
							<input type="submit" value="Buscar">							
						</form>					
					</div>
					
					</li>
					<li><a href="carrito.php" class="navegacion">Carrito</a></li>
					<li><a href="mi-cuenta.php" class="navegacion">Mi Cuenta</a></li>
				</ul>
			</nav>
		</div>
	</header>

<section class="main">
		<div class="wrapp">
		
			<div class="mensaje">
				<a href="inicio.php" class="miga">Inicio</a>
				<a class="miga-no">/</a>
				<a class="miga-no"> Mi cuenta</a>
			</div>
	
			<div class="info-user">
				<div class="info-user2">
				<?php
	
					echo "<p class='mc-datos'> Nombre:  $fila[1]  </p>" . " ";					
					echo "<p class='mc-datos'> Dirección:  $fila[2]  </p>" . " ";
					echo "<p class='mc-datos'> Teléfono:  $fila[3]  </p>" . " ";
					echo "<p class='mc-datos'> Ciudad:  $fila[4]  </p>" . " ";
					echo "<p class='mc-datos'> Correo:  $fila[5]  </p>" . " ";
					echo "<p class='mc-datos'> Contraseña:  $fila[6]  </p>" . " ";

				?>

			</div>
				<a class="close" href="database/cerrar-sesion.php">Cerrar sesión</a>
		</div>
	
	</div>
</section>
	
	<?php include('footer.php'); ?>
	
</body>
</html>