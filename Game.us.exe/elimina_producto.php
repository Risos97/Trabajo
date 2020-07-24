<?php
	session_start();
	
	
	
if (!isset($_SESSION["producto"])) {
		$producto['idn'] = "";
		
		
	
		$_SESSION["producto"] = $producto;
	}
	// Si ya existían valores, los cogemos para inicializar el formulario
	else
		$producto = $_SESSION["producto"];
	
	if (isset($_SESSION["errores"])){
		$errores = $_SESSION["errores"];
		unset($_SESSION["errores"]);
	}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Elimina Producto</title>
  
  
</head>


	<body>


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
	
	<form id="eliminaProducto" method="post"  action="validacion_elimina.php">
			<p><i>Introduce el id del producto a eliminar </i><em>*</em></p>
			<fieldset><legend></legend>				
					<div><label for="idn">IDN:<em>*</em></label>
					<input id="idn" name="idn" type="text" size="20" value="<?php echo $producto['idn'];?>" required/>
					</div>
					
					
				</fieldset>
			<div><input type="submit" value="Eliminar" /></div>
		</form>
		
		<?php
	
		include_once("pie.php");
		
		?>
		
      
    
      
     
		
	</body>
</html>