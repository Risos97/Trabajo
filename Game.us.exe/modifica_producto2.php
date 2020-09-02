<?php
	session_start();
	require_once("gestionBD.php");
	//include_once ("estilo.css"); 

	
if (!isset($_SESSION["producto"])) {
		
	
	}
	// Si ya existían valores, los cogemos para inicializar el formulario
	else
		$producto = $_SESSION["producto"];
	
	if (isset($_SESSION["errores"])){
		$errores = $_SESSION["errores"];
		unset($_SESSION["errores"]);
	}
	$conexion = crearConexionBD();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Modifica Producto</title>
  
  
</head>


	<body>
	<script>
		
		
	
	
	//launch.setCustomValidity(error);
	
	//return error;

	</script>	

	<?php
		include_once("cabecera.php");
	?>
	<?php 
		if (isset($errores) && count($errores)>0) { 
	    	echo "<div id=\"div_errores\" class=\"error\">";
			echo "<h4> Errores en el formulario:</h4>";
    		foreach($errores as $error){
    			echo $error;
			} 
    		echo "</div>";
  		}
	?>
	
	<form id="altaProducto" method="post" action="validacion_modifica_producto.php" 
	>
			<p><i>Modifica los campos deseados </i><em>*</em></p>
			<fieldset><legend>Datos Producto</legend>				
					
					
					<div><label for="precio">Precio<em>*</em></label>
					<input id="precio" name="precio" type="number" min = "0" value="<?php echo $producto['precio'];?>" required>
					</div>
					
					<div><label for="stock">Stock<em>*</em></label>
					<input id="stock" name="stock" type="number" min = "0" value="<?php echo $producto['stock'];?>" required>
					</div>
				
									
					
			<div><input type="submit" value="Enviar" /></div>
		</form>
		
		<?php
	
		include_once("pie.php");
		cerrarConexionBD($conexion);
		?>
		
      
    
      
     
		
	</body>
</html>