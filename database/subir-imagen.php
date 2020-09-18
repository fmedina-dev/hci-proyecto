<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto</title>
	<link rel="stylesheet" href="../styles.css">
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

<?php
//Siempre justop antes del contanido a mostrar se pone la sesion de php
//reanudamos la sesion que se creo para el usuario

	include("conexion-pdo.php");
	
	/*$conexion=$base->query("SELECT * FROM categoria");
	
	$registros=$conexion->fetchAll(PDO::FETCH_OBJ);*/
	
	$registros=$base->query("SELECT producto_id, producto_nombre, categoria_nombre, producto_precio, producto_foto
	FROM producto INNER JOIN categoria ON producto_categoria_id=categoria_id")->fetchAll(PDO::FETCH_OBJ);
	


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
				<a href="../admin.php" class="miga">Inicio</a>
				<a class="miga-no">/</a>
				<a class="miga-no"> Subir imagen</a>
			</div>					
	
			<div class="login-box-2">
			<h1 class="subtitulo">Subir imagen</h1>
				
				<form action="agregar-imagen.php" method="post" enctype="multipart/form-data">
                    
                         <td class="sin">&nbsp;</td>
					  <td class="sin">&nbsp;</td>
					<table width="100%" border="0" align="center">
					<tr>
						<td>
                        <input type="file" name="imagen">
						 </td>
						 
					</tr>
					<td class="sin">&nbsp;</td>
						 
						<tr>
						
							<td>
							<label for="cod_pro"  class="primera_fila" style="text-align:justify;"><font size='5'>Codigo del producto</font></label>
							</td>
						</tr>
						
						<tr>
							<td>
							<input type="text" placeholder="Ingresa el ID del producto" name="cod">
							</td>						
						
						</tr>
						
						<label for="password"></label>
						
						<tr>
						<td>
						<input type="submit" value="Enviar imagen">
						</td>
						</tr>
						<td class="sin">&nbsp;</td>
                    </table>
                        
                </form>
				
			<h1 class="subtitulo">Productos</h1>
			
			
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
						<td><img src="/proyecto-products/images/<?php echo $producto->producto_foto?>"/></td>		
					
					</tr>  
					
					<?php
					
						endforeach;
					
					?>
					  
				  </table>
						
			</div>			
			
		</div>
	</section>
	
		<?php include('../footer.php'); ?>
	
</body>
</html>