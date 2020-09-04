<?php
	session_start();
	require_once("gestionBD.php");
	include_once ("estilo.css"); 

	
if (!isset($_SESSION["login"])) {
		$usuario['email'] = "";
		$usuario['nickname'] = "";
		$usuario['pass'] = "";
		
	
		$_SESSION["login"] = $usuario;
	}
	// Si ya existían valores, los cogemos para inicializar el formulario
	else
		$usuario = $_SESSION["login"];
	
		$aux['email'] = "";
		$aux['nickname'] = "";
		$aux['pass'] = "";
		$_SESSION["aux"] = $aux;
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
  <title>Modifica Usuario</title>
  
  
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
	
	<form id="formulario" method="post" action="validacion_modifica_usuario.php"  
	>
			<p><i>Introduce el email del usuario a modificar </i><em>*</em></p>
			<fieldset><legend></legend>				
					<div><label for="email">Email:<em>*</em></label>
					<input id="email" name="email"  type="email" size="40"  placeholder="usuario@dominio.extension" value="<?php echo $usuario;?>" required/>
					</div>
					<?php  $aux['email']=$usuario  ?>
					
					<div><label for="nickname">Nickname<em>*</em></label>
					<input id="nickname" name="nickname" type="text" value="<?php echo $aux['nickname'];?>" required>
					</div>
					
					<div><label for="pass">Password:<em>*</em></label>
					<input type="password"  name="pass" id="pass" placeholder="Mínimo 8 caracteres" minlength="8" maxlength="20" size="40" value="<?php echo $aux['pass']; ?>" 
					required/>
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