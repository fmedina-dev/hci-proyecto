<?php

try{
	
	//datos de conexión a la base de datos
	$base = new PDO ("mysql:host=localhost; dbname=proyectoparcial", "usuariobd", "123456");
	
	//establecer las propiedades de esta conexion
	
	$base-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$sql="SELECT * FROM cliente WHERE cliente_correo= :p_correo AND cliente_contrasena= :p_pass";
	//admin
	$sqladmin="SELECT * FROM administrador WHERE admin_correo= :p_correo AND admin_contrasena= :p_pass";
	//consulta preparada con marcadores
	
	
	$resultado= $base->prepare($sql);
	//admin
	$resultadoadmin= $base->prepare($sqladmin);
	
	$cor=htmlentities(addslashes($_POST["p_correo"]));
	$pas=htmlentities(addslashes($_POST["p_pass"]));

	
	$resultado->bindValue(":p_correo", $cor);
	$resultado->bindValue(":p_pass", $pas);
	$resultado->execute();
	//admin
	$resultadoadmin->bindValue(":p_correo", $cor);
	$resultadoadmin->bindValue(":p_pass", $pas);
	$resultadoadmin->execute();
	
	$numero_registro=$resultado->rowCount();
	//admin
	$numero_registroadmin=$resultadoadmin->rowCount();
	
	if($numero_registro !=0){
		//sesion creada
		session_start();
		
		$_SESSION["u_log"]=$_POST["p_correo"];
				
		//echo "<h2>Adelante<h2>";
		header("Location:../inicio.php");
				
		
	} else if($numero_registroadmin !=0){
		//sesion creada
		session_start();
		
		$_SESSION["admin"]=$_POST["p_correo"];
				
		//echo "<h2>Adelante<h2>";
		header("Location:../admin.php");
				
		
	} else{
		
		header("location:../iniciar-sesion.php");	
		
	}
}

catch (Exception $e){
		
		die("Error: " . $e->getMessage());
			
}

?>