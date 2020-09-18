<?php

	
	$nom=$_GET['p_nombre'];
	$dir=$_GET['p_direccion'];
	$tel=$_GET['p_telefono'];
	$ciu=$_GET['p_ciudad'];
	$cor=$_GET['p_correo'];
	$cont=$_GET['p_contrasena'];   
	
	require("conexion.php");
	
	$conexion= mysqli_connect($db_host, $db_usuario, $db_contrasena, $db_nombre);
	
	if(mysqli_connect_errno()){
		
		echo "No se conecto con la base de datos.";	
		exit();
	}
	
	//caracteres que maneja la base de datos
	mysqli_set_charset($conexion, "utf8");
	
	
	//query
	$consulta="INSERT INTO cliente( cliente_nombre, cliente_direccion, cliente_telefono, cliente_ciudad, cliente_correo, cliente_contrasena)
	VALUES('$nom', '$dir', '$tel', '$ciu', '$cor', '$cont')";
	
	//resultado de la consulta
	$resultado=mysqli_query($conexion, $consulta);
	
	if($resultado==false){
		
		echo "Error en la consulta";
	
	} else{
		
		echo "Registro completado";				
		
	}
	
	mysqli_close($conexion);
	
?>