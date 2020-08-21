<?php
	session_start();
	require_once("gestionBD.php");
	//include_once ("estilo.css"); 

	
if (!isset($_SESSION['formulario'])) {
		$formulario['pass'] = "";
		$formulario['nickname'] = "";
		
		
		$_SESSION['formulario'] = $formulario;
	}
	// Si ya existían valores, los cogemos para inicializar el formulario
	else
		$formulario = $_SESSION["formulario"];
	
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
  <title>Modifica Contraseña</title>


  
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
	
	<form id="altaUsuario" method="get" action="validacion_modifica_pass.php"  
	>
			<p><i>Introduce el email del Usuario a modificar </i><em>*</em></p>
			<fieldset>				
					<div><label for="pass">Pass<em>*</em></label>
					<input id="pass" name="pass" type="text" value="<?php echo $formulario['pass'];?>" required>
					</div>	
					<div><label for="nick">Nickname<em>*</em></label>
					<input id="nickname" name="nickname" type="text" value="<?php echo $formulario['nickname'];?>" required>
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