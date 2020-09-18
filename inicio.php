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

<?php
//Siempre justop antes del contanido a mostrar se pone la sesion de php
//reanudamos la sesion que se creo para el usuario

	session_start();
	if(!isset($_SESSION["u_log"])){
		
		header("Location:iniciar-sesion.php");
				
	}
	
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


    <header>
		<div class="wrapp">
			<div class="logo">
				<a href="inicio.php" class="empresa">Novedades Estrellita</a>
			</div>
				
			<nav>
				<ul>					
					<li> 
					
					<div class="buscar-product">
						<form action="busquedaa.php" method="post" >
							<input type="search" name="buscar" placeholder="Busca un producto...">
							<input type="submit" name="enviado" value="Buscar">
						</form>
					</div>
					
					</li>
					<li><a href="carrito2.php" class="navegacion">Carrito</a></li>
					<li><a href="mi-cuenta.php" class="navegacion">Mi Cuenta</a></li>
				</ul>
			</nav>
		</div>
	</header>

<section class="main">
		<div class="wrapp">
			<div class="mensaje">
				<?php
						
					echo "<p class='miga-no'><font size='5'>Bienvenid@ $fila[1] </font> </p>" ;					
												
				?>
					
			</div>
				
			<div class="ver-cat-pro">
				
				<div class="ver-categorias">
					<a href="categorias.php" class="cat-pro">Ver las categorias de productos</a>
				</div>
				
				
				<div class="ver-productos">
					<a href="todos-productos.php" class="cat-pro-1">Ver los productos</a>
				</div>
				
		</div>	
			
	</div>
</section>
	
	<?php include('footer.php'); ?>
	
</body>
</html>