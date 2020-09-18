
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

<?php

	include("database/conexion-pdo.php");

	if(!isset($_POST["btn-act"])){

	$id=$_GET["id"];
	$nombre=$_GET["nom"];
	$categoria=$_GET["cat"];
	$precio=$_GET["pri"];

	}
	
	else{
		
		$ida=$_POST["p_id"];
		$nombrea=$_POST["p_nom"];
		$categoriaa=$_POST["p_idc"];
		$pricea=$_POST["p_pp"];
		
		$sql="UPDATE producto SET producto_nombre=:myNOM, producto_categoria_id=:myIDC, producto_precio=:myPP
		WHERE producto_id=:myID";
		
		$resultado=$base->prepare($sql);
		
		$resultado->execute(array( ":myID"=>$ida, ":myNOM"=>$nombrea, ":myIDC"=>$categoriaa, ":myPP"=>$pricea));
		
		header("Location:admin-productos.php");
			
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
				<a href="admin.php" class="miga">Inicio</a>
				<a class="miga-no">/</a>
				<a href="admin-productos.php" class="miga">Administrador de productos</a>
				<a class="miga-no">/</a>	
				<a class="miga-no"> Actualizar</a>
			</div>
			
				
			<div class="login-box-2">
								
				<h1 class="subtitulo">Administrar productos</h1>
				<table width="100%" border="0" align="center">
					<tr>
					
						<td class="primera_fila">Id</td>
						<td class="primera_fila">Categoria</td>
								
					</tr> 
						<td >1</td>
						<td >Alimentos</td>
					
					<tr>
					
					</tr> 
						<td >2</td>
						<td >Bebidas</td>
					
					<tr>
					
					</tr> 
						<td >3</td>
						<td >Higiene</td>
					
					<tr>
					
					</tr> 
						<td >4</td>
						<td >Snacks</td>
					
					<tr>
					
					</tr> 
						<td >5</td>
						<td >Escolar</td>
					
					<tr>
					
					
					</tr>
					
				</table>	
				<p>&nbsp;</p>
				<p>&nbsp;</p>

				
		<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
				<table width="100%" border="0" align="center">
					<label for="p_id"></label>
					<input type="hidden" name="p_id" id="p_id" size='10' class='centrado' value="<?php echo $id?>" >
				
				<tr>
			
					<td class="primera_fila">Nombre del producto</td>
					
					<td>
						<label for="p_nom"></label>
						<input type="text" name="p_nom" id="p_nom" size='10'  class='centrado' value="<?php echo $nombre?>" >
						
					</td>
				
				</tr> 
			
				<tr>
					
					<td class="primera_fila">Id de la categoría</td>
					
					<td>
						<label for="p_idc"></label>
						<input type="text" name="p_idc" id="p_idc" size='10'  class='centrado' value='Indica una categoría' " >
						
					</td>
				</tr> 
			
				<tr>
					
					<td class="primera_fila">Precio del producto</td>
					
					<td>
						<label for="p_pp"></label>
						<input type="text" name="p_pp" id="p_pp" size='10'  class='centrado' value="<?php echo $precio?>" >
						
					</td>
						
				</tr>  
		
			</table>
		
			<input type="submit"   value="Actualizar" name="btn-act" id="btn-act">

		</form>

		<p>&nbsp;</p>
	
	</div>		
		
</section>
	
		<?php include('footer.php'); ?>
	
</body>
</html>