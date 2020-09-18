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
<?php
//Siempre justop antes del contanido a mostrar se pone la sesion de php
//reanudamos la sesion que se creo para el usuario
	if (isset($_POST['enviado']))    {    
        // Instrucciones si $_POST['valor'] existe    
  
	$busqueda2=$_POST["buscar"];
	
	include("database/conexion-pdo.php");
	
	/*$conexion=$base->query("SELECT * FROM categoria");
	
	$registros=$conexion->fetchAll(PDO::FETCH_OBJ);*/
	
	$registros=$base->query("SELECT producto_id, producto_nombre, categoria_nombre, producto_precio, producto_foto
	FROM producto INNER JOIN categoria ON producto_categoria_id=categoria_id
	WHERE producto_nombre LIKE '%$busqueda2%' ")->fetchAll(PDO::FETCH_OBJ);
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
				<a class="miga-no" class="miga"> Búsqueda</a>	
			</div>
					
			<div class="login-box-2">
												
				<h1 class="subtitulo">Productos</h1>
	
				<table width="100%" border="0" align="center">
					<tr>
					 
						<td class="primera_fila">Id</td>
						<td class="primera_fila">Producto</td>
						<td class="primera_fila">Categoria</td>
						<td class="primera_fila">Precio</td>
						<td class="primera_fila">Imagen</td>
						<td class="primera_fila">Comprar</td>
					 
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
						<td><img src="/proyecto-products/images/<?php echo $producto->producto_foto?>"/></td>
						<td><a >Añadir al carrito</a></td>
					</tr>  
					
					<?php
					
						endforeach;
					
					?>
					  
				</table>
			<p>&nbsp;</p>
		</div>
 	</div>
</section>
	
	<?php include('footer.php'); ?>
	
</body>
</html>