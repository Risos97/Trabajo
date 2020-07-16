<?php
	session_start();
	require_once("gestionBD.php");
	
// Si no existen datos del formulario en la sesión, se crea una entrada con valores por defecto
	if (!isset($_SESSION["formulario"])) {
		$formulario['nombre'] = "";
		$formulario['dirección'] = "";
		$formulario['móvil'] = "";
		$formulario['email'] = "";
		$formulario['nickname'] = "";
		$formulario['pass'] = "";
		
	
		$_SESSION["formulario"] = $formulario;
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
  <title>Alta Usuario</title>
 </head>
 
<body>
	<script src="validaciones.js"></script>
	
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
	
	<form id="altaUsuario" method="get" action="formulario.php" onsubmit="validaciónContraseña()"
		>
		<!--novalidate-> 
		<!--onsubmit="return validateForm()"-->   
		<p><i>Los campos obligatorios están marcados con </i><em>*</em></p>
		<fieldset><legend>Datos Usuario</legend>
					<div><label for="nombre">Nombre:<em>*</em></label>
					<input id="nombre" name="nombre" type="text" size="40" value="<?php echo $formulario['nombre'];?>" required/>
					</div>
					
					<div></div><label for="dirección">Dirección:<em>*</em></label>
					<input id="dirección" name="dirección" type="text" size="80" value="<?php echo $formulario['dirección'];?>" required/>
					</div>
					
					<div><label for="móvil">Móvil<em>*</em></label>
					<input id="móvil" name="móvil" type="text" placeholder="123456789" pattern="^[0-9]{9}" title="Nueve dígitos" <?php echo $formulario['móvil'];?> required>
					</div>
				
					<div><label for="email">Email:<em>*</em></label>
					<input id="email" name="email"  type="email" placeholder="usuario@dominio.extension" <?php echo $formulario['email'];?>" required/><br>
					</div>
				
					<div><label for="nick">Nickname:<em>*</em></label>
					<input id="nickname" name="nickname" type="text" size="40" <?php echo $formulario['nickname'];?> required/>
					</div>
				
					<div><label for="pass">Password:<em>*</em></label>
					<input type="password" name="pass" id="pass" placeholder="Mínimo 8 caracteres entre letras y dígitos" required oninput="passwordValidation(); "/>
					</div>
				
					<div><label for="confirmpass">Confirmar Password: </label>
					<input type="password" name="confirmpass" id="confirmpass" placeholder="Confirmación de contraseña" oninput="passwordConfirmation();" required />
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