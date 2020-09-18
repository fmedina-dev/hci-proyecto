<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto</title>
	<link rel="stylesheet" href="../styles.css">
	<script src="https://kit.fontawesome.com/771f707260.js" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/css2?family=Fira+Sans+Condensed:wght@300;400;500;600&display=swap" rel="stylesheet"> 
</head>
<body>

<?php
//Siempre justop antes del contanido a mostrar se pone la sesion de php
//reanudamos la sesion que se creo para el usuario

	include("../database/conexion-pdo.php");
	
	/*$conexion=$base->query("SELECT * FROM categoria");
	
	$registros=$conexion->fetchAll(PDO::FETCH_OBJ);*/
	
	$registros=$base->query("SELECT producto_id, producto_nombre, categoria_nombre, producto_precio, producto_foto
	FROM producto INNER JOIN categoria ON producto_categoria_id=categoria_id
	WHERE producto_categoria_id=3")->fetchAll(PDO::FETCH_OBJ);

?>
    <header>
		<div class="wrapp">
			<div class="logo">
				<a href="index.php" class="empresa">Novedades Estrellita</a>
			</div>
			<nav>
				<ul>
					<li><a href="../index.php" class="navegacion">Inicio</a></li>
					<li><a href="../iniciar-sesion.php" class="navegacion">Iniciar sesión</a></li>
					<li><a href="../crear-cuenta.php" class="navegacion">Crear cuenta</a></li>
				</ul>
			</nav>
		</div>
	</header>


<section class="main">
		<div class="wrapp">
		
			<div class="mensaje">
            <a href="../index.php" class="miga">Inicio</a>
            <a class="miga-no">/</a>
            <a class="miga-no"> Higiene</a>
        </div>

			<div class="login-box-2">
												
				<h1 class="subtitulo">Categoría Higiene</h1>
				
				  <table width="100%" border="0" align="center">
					<tr>
					 
						<td class="primera_fila">Id</td>
						<td class="primera_fila">Producto</td>
						<td class="primera_fila">Categoria</td>
						<td class="primera_fila">Precio</td>
						<td class="primera_fila">Imagen</td>
					 
					  	<td class="sin">&nbsp;</td>
					  	<td class="sin">&nbsp;</td>
					</tr> 
				   
					
					<?php
	
						foreach($registros as $producto):
					?>
						
					<tr>  
					
						<td> <?php echo $producto->producto_id ?></td>
						<td> <?php echo $producto->producto_nombre ?></td>
						<td> <?php echo $producto->categoria_nombre ?></td>
						<td> <?php echo $producto->producto_precio ?></td>
						<td><img alt="producto" src="/proyecto-products/images/<?php echo $producto->producto_foto?>"/></td>
									
					</tr>  
					
					<?php
					
						endforeach;
					
					?>
					  
				  </table>
				
				<p>&nbsp;</p>
						 							
			</div>		
		</div>		
	</section>

<footer>
		<div class="footer-000">
			<div class="footer-001">
			
			<p class="fm"> Sobre nosotros</p> 
				<p class="nosotros00">Desarrollado por: 
					Roberth Loor,
					David Zambrano,
					Adriana Gilces y
					Pablo Proaño.
			</p>
		</div>
				
		<div class="footer-002">
			<p class="fm">Síguenos</p>
            <ul class="footer-links">

              <li><a class="9i" href="http://scanfcode.com/category/c-language/">→ Facebook</a></li>
              <li><a href="http://scanfcode.com/category/front-end-development/">→ Twitter</a></li>
              <li><a href="http://scanfcode.com/category/back-end-development/">→ Instagram</a></li>
              
            </ul>
		</div>
						
	</div>
	</div>
</footer>
	
</body>
</html>