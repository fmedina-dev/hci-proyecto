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
	
	$registros=$base->query("SELECT producto_id, producto_nombre, categoria_nombre, producto_precio, producto_foto
	FROM producto INNER JOIN categoria ON producto_categoria_id=categoria_id")->fetchAll(PDO::FETCH_OBJ);
	
?>

<?php
	//insertar

	include("database/conexion-pdo.php");
	
	if(isset($_POST["cr2"])){
		
		$name=$_POST["pro"];
		$cat=$_POST["cat"];
		$price=$_POST["precio"];
		
		$sql2="INSERT INTO producto (producto_categoria_id, producto_nombre,  producto_precio) VALUES(:category, :product, :price)";
				
		$resultado2=$base->prepare($sql2);
		
		
		$resultado2->execute(array(":category"=>$cat, ":product"=>$name, ":price"=>$price));
		
		header("Location: admin-productos.php");
		
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
				<a class="miga-no"> Administrador de productos</a>
			</div>
							
			<div class="login-box-2">						
			<h1 class="subtitulo">Administrar productos</h1>


<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
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
		
		<td class="bot"> 
			<a href="database/eliminar-producto.php?id=<?php echo $producto->producto_id ?>"> 
				<input type='button' name='del' id='del' value='Borrar'>
			</a>
		</td>
		
		<td class='bot'>
			<a href="actualizar-producto.php?id=<?php echo $producto->producto_id ?> & nom=<?php echo $producto->producto_nombre ?>
			& cat=<?php echo $producto->categoria_nombre ?> & pri=<?php echo $producto->producto_precio ?>">
				<input type='button' name='up' id='up' value='Actualizar'>
			</a>
		</td>	
    </tr>  
	
	<?php
	
		endforeach;
	
	?>
	
	<tr>
		<td class="sin">&nbsp;</td>
      	<td><input type='text' name='pro' size='10' class='centrado'></td>
	  	<td><input type='text' name='cat' size='10' class='centrado'></td>
	  	<td><input type='text' name='precio' size='10' class='centrado'></td>
	  	<td></td>
	    
      <td class='bot'><input type='submit' name='cr2' id='cr2' value='Insertar'></td>
	</tr>    
  </table>
</form>

<p>&nbsp;</p>
         			
	</div>
			
</section>
	
		<?php include('footer.php'); ?>
	
</body>
</html>