<?php
	session_start();
	require_once("gestionBD.php");
	include_once ("estilo.css"); 

	
if (!isset($_SESSION["codigo"])) {
		$codigo['codigo'] = "";
		
		
	
		$_SESSION["codigo"] = $codigo;
	}
	// Si ya existían valores, los cogemos para inicializar el formulario
	else
		$producto = $_SESSION["codigo"];
	
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
  <title>Canjear código</title>
  
  
</head>


	<body>
	<script>
		
		
		
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
	
	<form id="	CanjeaCodigo" method="get" action="Canjear_codigo.php"  
	>
			<p><i>Introduce el código del vale </i><em>*</em></p>
			<fieldset><legend></legend>				
					<div><label for="idn">Código:<em>*</em></label>
					<input id="cod" name="cod" type="text" size="20" value="<?php echo $codigo['cod'];?>" required/>
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