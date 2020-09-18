<?php 
session_start();
$connect = mysqli_connect("localhost", "usuariobd", "123456", "proyectoparcial");

if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_GET["id"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_id'			=>	$_GET["id"],
				'item_name'			=>	$_POST["hidden_name"],
				'item_price'		=>	$_POST["hidden_price"],
				'item_quantity'		=>	$_POST["quantity"]
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
		}
		else
		{
			echo '<script>alert("Item Already Added")</script>';
		}
	}
	else
	{
		$item_array = array(
			'item_id'			=>	$_GET["id"],
			'item_name'			=>	$_POST["hidden_name"],
			'item_price'		=>	$_POST["hidden_price"],
			'item_quantity'		=>	$_POST["quantity"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
}

if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["id"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
				echo '<script>alert("Producto Eliminado.")</script>';
				echo '<script>window.location="carrito2.php"</script>';
			}
		}
	}
}

?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Proyecto</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="styles.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</head>
	<body>
	    <header>
			<div class="wrapp">
				<div class="logo">
					<a href="inicio.php" class="empresa">Novedades Estrellita</a>
				</div>
					
				<nav>
					<ul>					
						<li> 
						
						<div class="buscar-product">
							<form action="busquedaa.php" method="post" >
							
								
								<input type="search" name="buscar" placeholder="Busca un producto...">
								
								
								
								<input type="submit" name="enviado" value="Buscar">
								
							</form>
						</div>
						
						</li>
						<li><a href="carrito.php" class="navegacion">Carrito</a></li>
						<li><a href="mi-cuenta.php" class="navegacion">Mi Cuenta</a></li>
					</ul>
				</nav>
			</div>
		</header>

<section class="main">
		<div class="wrapp">		
		<div class="mensaje">
			<a href="inicio.php" class="miga">Inicio</a>
			<a class="miga-no">/</a>
			<a class="miga-no"> Mi cuenta</a>
		</div>
	</div>
</section>
		
		
		
		<div class="container">
				
			<?php
				$query = "SELECT producto_id, producto_nombre, producto_precio, producto_foto FROM producto";
				$result = mysqli_query($connect, $query);
				if(mysqli_num_rows( $result ) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
				?>
			<div class="col-md-4">
				<form method="post" action="carrito2.php?action=add&id=<?php echo $row["producto_id"]; ?>">
					<div style="border:1px solid #037E8C; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">
						<img alt="producto" src="/proyecto-products/images/<?php echo $row["producto_foto"]; ?>" class="img-responsive" /><br />

						<h4 class="text-info"><?php echo $row["producto_nombre"]; ?></h4>

						<h4 class="text-danger">$ <?php echo $row["producto_precio"]; ?></h4>
						<label>
						<input type="text" name="quantity" value="1" class="form-control" />
						</label>
						
						<label>
						<input type="hidden" name="hidden_name" value="<?php echo $row["producto_nombre"]; ?>" />
						</label>
						
						<label>
						<input type="hidden" name="hidden_price" value="<?php echo $row["producto_precio"]; ?>" />
						</label>

						<label>
						<input type="submit" name="add_to_cart" style="border-color:#037E8C; margin-top:5px; background-color:#037E8C; color:#fff;" class="btn btn-success" value="Añadir al carrito" />
						</label>

					</div>
						<td class="sin">&nbsp;</td>
					  <td class="sin">&nbsp;</td>
					  
					  
				</form>
			</div>
			<?php
					}
				}
			?>
			<div style="clear:both"></div>
			<br />
			<h3>Carrito</h3>
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<th width="40%">Nombre</th>
						<th width="10%">Cantidad</th>
						<th width="20%">Precio</th>
						<th width="15%">Total</th>
						<th width="5%">Acción</th>
					</tr>
					<?php
					if(!empty($_SESSION["shopping_cart"]))
					{
						$total = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
					?>
					<tr>
						<td><?php echo $values["item_name"]; ?></td>
						<td><?php echo $values["item_quantity"]; ?></td>
						<td>$ <?php echo $values["item_price"]; ?></td>
						<td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
						<td><a href="carrito2.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Eliminar</span></a></td>
					</tr>
					<?php
							$total = $total + ($values["item_quantity"] * $values["item_price"]);
						}
					?>
					<tr>
						<td colspan="3" align="right">Total</td>
						<td align="right">$ <?php echo number_format($total, 2); ?></td>
						<td></td>
					</tr>
					<?php
					}
					?>
						
				</table>
			</div>
		</div>
	</div>
	<br />

	</body>
</html>
