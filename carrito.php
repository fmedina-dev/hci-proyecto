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
            <a class="miga-no"> Carrito</a>
        </div>
				
				
		
				
				
				
				
			

 
			<div class="articulo">
				<article>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					<br/>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					<br/>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					<br/>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in
					reprehenderit in voluptate velit esse Ut enim ad minim veniam, quis nostrud 
					exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
				</article>
			</div>
 
			<aside>
				<div class="widget">
					<h3>Articulos Relacionados</h3>
					<ul>
						<li><a href="#">Lorem ipsum dolor sit amet</a></li>
						<li><a href="#">Ut enim ad minim</a></li>
						<li><a href="#">Excepteur sint occaecat</a></li>
						<li><a href="#">Reprehenderit in voluptate</a></li>
						<li><a href="#">Duis aute irure dolor in reprehenderit</a></li>
					</ul>
				</div>
			</aside>
		</div>
	</section>
	
		<?php include('footer.php'); ?>
	
</body>
</html>