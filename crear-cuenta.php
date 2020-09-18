
<?php include('header.php'); ?>

	<section class="main">
		<div class="wrapp">

        <div class="mensaje">
            <a href="index.php" class="miga">Inicio</a>
            <a class="miga-no">/</a>
            <a class="miga-no"> Crear cuenta</a>
        </div>
				
				<div class="regis">
        
                    <h1>Registrarse</h1>
										
                    <form name="form1" method="get" action="database/insertar_usuario.php"> 
                 	
                        <label for="username">Nombre
                            <input type="text" placeholder="Ingresa tu nombre" name="p_nombre" > 
                        </label>

                        <label for="password">Dirección
                            <input type="text" placeholder="Ingresa tu dirección" name="p_direccion">
                        </label>

						<label for="password">Teléfono
                            <input type="text" placeholder="Ingresa tu teléfono" name="p_telefono">
                        </label>
						
						<label for="password">Ciudad
                            <input type="text" placeholder="Ingresa tu ciudad" name="p_ciudad">
                        </label>
						
						<label for="password">Correo
                            <input type="text" placeholder="Ingresa tu correo" name="p_correo">
                        </label>
						
						<label for="password">Contraseña
                            <input type="password" placeholder="Ingresa tu contraseña" name="p_contrasena">
                        </label>
						
						
                        <input type="submit" value="Registrarse" name="registrar">
						
                        <a href="iniciar-sesion.php">Iniciar sesión.</a><br><br>
                        <a href="index.php">Volver a la página principal.</a>
								
                    </form>
                </div>			
		</div>
	</section>
    <?php include('footer.php'); ?>
</body>
</html>
