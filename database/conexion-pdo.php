<?php

	try{
	
	//datos de conexión a la base de datos
	$base = new PDO ("mysql:host=localhost; dbname=proyectoparcial", "usuariobd", "123456");
	
	//establecer las propiedades de esta conexion
	
	$base-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$base->exec("SET CHARACTER SET UTF8");	
	
}

catch (Exception $e){
		
	die('Error: ' . $e->getMessage());
	echo "Linea de error" . $e->getLine();
			
}

?>