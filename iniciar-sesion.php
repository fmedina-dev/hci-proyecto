
<?php include('header.php'); ?>

	<section class="main">
		<div class="wrapp">

        <div class="mensaje">
            <a href="index.php" class="miga">Inicio</a>
            <a class="miga-no">/</a>
            <a class="miga-no"> Iniciar sesión</a>
        </div>

                <div class="login-box">
        
                    <h1>Inicia sesión</h1>

                    <form action="database/comprueba_login.php" method="post">
                    
                        <label for="username">Correo
                        <input type="text" name="p_correo" placeholder="Ingresa tu correo">
                        </label>
                
                        <label for="password">Contraseña
                        <input type="password" name="p_pass" placeholder="Ingresa tu contraseña">
                        </label>

                        <input type="submit" name="enviar" value="Ingresar">

                        <a href="crear-cuenta.php">Olvidé mi contraseña.</a><br><br>
                        <a href="crear-cuenta.php">¿No tienes una cuenta? Regístrate.</a>
                    </form>
                </div>
			
		</div>
	</section>
    <?php include('footer.php'); ?>
</body>
</html>
