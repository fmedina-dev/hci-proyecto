
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

	}
	
	else{
		
		$ida=$_POST["p_id"];
		$nombrea=$_POST["p_nom"];
		
		$sql="UPDATE categoria SET categoria_nombre=:myNOM WHERE categoria_id=:myID";
		
		$resultado=$base->prepare($sql);
			
		$resultado->execute(array( ":myID"=>$ida, ":myNOM"=>$nombrea));
		
		header("Location:admin-categorias.php");
				
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
				<a href="admin-categorias.php" class="miga">Administrador de categorías de producto</a>
				<a class="miga-no">/</a>
				
				<a class="miga-no"> Actualizar</a>
			</div>
				
			<div class="login-box-2">
								
				<h1 class="subtitulo">Administrar categorías de productos</h1>
				
				<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
					<table width="100%" border="0" align="center">

						<label for="p_id"></label>
						<input type="hidden" name="p_id" id="p_id" size='10' class='centrado' value="<?php echo $id?>" >
							
						<tr>
							<td class="primera_fila">Nombre de categoría</td>
							
							<td>
								<label for="p_nom"></label>
								<input type="text" name="p_nom" id="p_nom" size='10'  class='centrado' value="<?php echo $nombre?>" >
								
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
