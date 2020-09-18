<?php	
	
	include("conexion-pdo.php");
	
	$id =$_GET["id"];
	
	$base->query("DELETE FROM categoria WHERE categoria_id='$id'");

	header("Location: ../admin-categorias.php");
	
	
?>