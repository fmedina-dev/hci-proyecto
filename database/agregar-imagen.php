<?php

	//datos de la imagen
	$nombre_imagen=$_FILES['imagen']['name'];
	
	$tipo_imagen=$_FILES['imagen']['type'];
	
	$tamano_imagen=$_FILES['imagen']['size'];
	$cod=$_POST['cod'];
	
	//ruta de la carpeta
	
	$carpeta_destino=$_SERVER['DOCUMENT_ROOT'] . '/proyecto-products/images/';

	move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta_destino.$nombre_imagen);
	
	//subir imagen
	
	require("conexion.php");
	
	$conexion= mysqli_connect($db_host, $db_usuario, $db_contrasena, $db_nombre);
	
	if(mysqli_connect_errno()){
		
		echo "No se conecto con la base de datos.";	
		exit();
	}
	
	//caracteres que maneja la base de datos
	mysqli_set_charset($conexion, "utf8");
	
	
	//query
	$consulta="UPDATE producto SET producto_foto='$nombre_imagen' WHERE producto_id='$cod'";
	
	//resultado de la consulta
	$resultado=mysqli_query($conexion, $consulta);


?>