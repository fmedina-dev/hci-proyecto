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
	if(!isset($_SESSION["admin"])){
		
		header("Location:iniciar-sesion.php");
				
	}

?>

    <header>
		<div class="wrapp">
			<div class="logo">
				<a href="admin.php" class="empresa">Novedades Estrellita</a>
			</div>
				
			<nav>
				<ul>
										
					<li><a href="database/cerrar-sesion.php" class="navegacion">Cerrar sesión</a></li>
				
				</ul>
			</nav>
		</div>
	</header>


<section class="main">
		<div class="wrapp">
		
			<div class="mensaje">
				<p class="miga-no">Inicio</>
			</div>
						
			<div class="ver-cat-pro">
				
				<div class="ver-categorias">
					<a href="admin-categorias.php" class="cat-pro">Administrar categorías de productos</a>
				</div>
				
				
				<div class="ver-productos">
					<a href="admin-productos.php" class="cat-pro-1">Administrar productos</a>
				</div>
				
				<div class="ver-productos">
					<a href="database/subir-imagen.php" class="cat-pro">Subir imagen</a>
				</div>
				
			</div>
 						
		</div>
	</section>
	
		<?php include('footer.php'); ?>
	
</body>
</html>