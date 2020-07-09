<?php
	session_start();
	require_once("gestionBD.php");
	include_once ("estilo.css"); 
	
if (!isset($_SESSION["producto"])) {
		$producto['idn'] = "";
		$producto['precio'] = "";
		$producto['nombre'] = "";
		$producto['descripcion'] = "";
		$producto['stock'] = "";
		$producto['fechaLanzamiento'] = "";
		$producto['tipo'] = "";
		
	
		$_SESSION["producto"] = $producto;
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
  <title>Alta Producto</title>
</head>

<body>
	<script>
		$(document).ready(function() {
			$("#altaProducto").on("submit", function() {
				return validateForm();
			});
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
	
	<form id="altaProducto" method="get" action="validacion_alta_producto.php"
	>
			<p><i>Los campos obligatorios están marcados con </i><em>*</em></p>
			<fieldset><legend>Datos Producto</legend>				
					<div><label for="idn">IDN:<em>*</em></label>
					<input id="idn" name="idn" type="text" size="20" value="<?php echo $producto['idn'];?>" required/>
					</div>
					
					<div><label for="precio">Precio<em>*</em></label>
					<input id="precio" name="precio" type="number" min = "0" value="<?php echo $producto['precio'];?>" required>
					</div>
					
					<div><label for="nombre">Nombre:<em>*</em></label>
					<input id="nombre" name="nombre" type="text" size="20" value="<?php echo $producto['nombre'];?>" required/>
					</div>
				
					<div><label for="descripcion">Descripción:<em>*</em></label>
					<input id="descripcion" name="descripcion" type="text" size="50" value="<?php echo $producto['descripcion'];?>" required/>
					</div>
				
					<div><label for="stock">Stock<em>*</em></label>
					<input id="stock" name="stock" type="number" min = "0" value="<?php echo $producto['stock'];?>" required>
					</div>
				
					<div><label>Fecha de lanzamiento:</label>
					<input type="date" id="launch" name="fechaLanzamiento" title="Introduzca la fecha de lanzamiento" value="<?php echo $producto['fechaLanzamiento'];?>" required>
					</div>
					
					<div><label for="tipo">Escoge un tipo:</label>

					<select id="tipo" value="<?php echo $producto['tipo'];?>" required>
  					<option value="VIDEOJUEGO">Videojuego</option>
  					<option value="MERCHANDISING">Merchandising</option>
  					<option value="PLATFORMAS">Plataforma</option>
					</select>
					</div>
				</fieldset>
			<div><input type="submit" value="Enviar" /></div>
		</form>
		
		<?php
		include_once("pie.php");
		cerrarConexionBD($conexion);
		?>
		
      
    
      
     
		
	</body>
</html>