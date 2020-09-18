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
//Siempre justop antes del contanido a mostrar se pone la sesion de php
//reanudamos la sesion que se creo para el usuario

	include("database/conexion-pdo.php");
	
	/*$conexion=$base->query("SELECT * FROM categoria");
	
	$registros=$conexion->fetchAll(PDO::FETCH_OBJ);*/
	
	$registros=$base->query("SELECT * FROM categoria")->fetchAll(PDO::FETCH_OBJ);
	
	
	//insertar
	
	if(isset($_POST["cr"])){
		
		$categoria=$_POST["catn"];
		
		$sql="INSERT INTO categoria (categoria_nombre) VALUES (:myCAT)";
		
		$resultado=$base->prepare($sql);
		
		$resultado->execute(array(":myCAT"=>$categoria));
		
		header("Location: admin-categorias.php");
		
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
				<a class="miga-no"> Administrador de categorías de productos</a>
			</div>
							
			<div class="login-box-2">
								
			<h1 class="subtitulo">Administrar categorías de productos</h1>


			<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
  				<table width="100%" border="0" align="center">
   			 		<tr>
						<td class="primera_fila">Id</td>
						<td class="primera_fila">Nombre de categoría</td>
						<td class="sin">&nbsp;</td>
						<td class="sin">&nbsp;</td>
					</tr> 
   
	
					<?php
					
						foreach($registros as $categoria):
					?>
						
					<tr>  
						<td> <?php echo $categoria->categoria_id ?></td>
						<td> <?php echo $categoria->categoria_nombre ?></td>
						
						<td class="bot"> 
							<a href="database/eliminar-categoria.php?id=<?php echo $categoria->categoria_id ?>"> 
								<input type='button' name='del' id='del' value='Borrar'>
							</a>
						</td>
						
						<td class='bot'>
							<a href="actualizar-categoria.php?id=<?php echo $categoria->categoria_id ?> & nom=<?php echo $categoria->categoria_nombre ?>">
								<input type='button' name='up' id='up' value='Actualizar'>
							</a>
						</td>	
					</tr>  
					
					<?php
					
						endforeach;
					
					?>
					
					
					<tr>
					<td class="sin">&nbsp;</td>
					
					<td><input type='text' name='catn' size='10' class='centrado'></td>
					
					<td class='bot'><input type='submit' name='cr' id='cr' value='Insertar'></td>
					</tr>    
				</table>
			</form>


			<p>&nbsp;</p>
         						
		</div>
			
</section>

		<?php include('footer.php'); ?>
	
</body>
</html>