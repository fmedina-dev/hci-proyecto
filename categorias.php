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
				<a class="miga-no"> Categorias</a>
			</div>
	
			<div class="ver-cat-pro">
				<div class="principal">
					<div class="ver-productos-02">
						<a href="alimentos.php" class="cat-pro-02">Alimentos</a>
					</div>
					
					
					<div class="ver-productos-02">
						<a href="bebidas.php" class="cat-pro-02">Bebidas</a>
					</div>
				</div>
				
				<div class="principal">
					<div class="ver-productos-02">
						<a href="Higiene.php" class="cat-pro-02">Higiene</a>
					</div>
					
					<div class="ver-productos-02">
						<a href="Snacks.php" class="cat-pro-02">Snacks</a>
					</div>
				</div>
				
				<div class="ver-productos-02">
					<a href="escolar.php" class="cat-pro-02">Escolar</a>
				</div>	
		</div>	
	</div>
</section>
	
	<?php include('footer.php'); ?>
	
</body>
</html>