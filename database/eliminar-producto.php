<?php	
	
	include("conexion-pdo.php");
	
	$id =$_GET["id"];
	
	$base->query("DELETE FROM producto WHERE producto_id='$id'");

	header("Location: ../admin-productos.php");
	
	
?>