<?php
	session_start();
	
	
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
	
?>

<?php
	include_once ("estilo.css");
	
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Alta Usuario</title>
  
  
	<script type="text/javascript" src="Js/validaciones.js">
		
	</script>

</head>
 
<body>
	
	
	<?php
		include_once("cabecera.php");
	?>
	
	<form id="altaUsuario" method="get" action="validacion_alta_usuario.php" onsubmit="return validateForm()">
		
		   
		<p><i>Los campos obligatorios están marcados con </i><em>*</em></p>
		<fieldset><legend>Datos Usuario</legend>
					<div><label for="nombre">Nombre:<em>*</em></label>
					<input id="inp" name="nombre" type="text" size="40" value="<?php echo $formulario['nombre'];?>" required/>
					</div>
					
					<div></div><label for="dirección">Dirección:<em></em></label>
					<input id="dirección" name="dirección" type="text" size="40" "<?php echo $formulario['dirección'];?>" required/>
					</div>
					
					<div><label for="móvil">Móvil<em>*</em></label>
					<input id="móvil" name="móvil" type="text" size="40" placeholder="123456789" pattern="^[0-9]{9}" title="Nueve dígitos" value="<?php echo $formulario['móvil'];?>" required/>
					</div>
				
					<div><label for="email">Email:<em>*</em></label>
					<input id="email" name="email"  type="email" size="40"  placeholder="usuario@dominio.extension" value="<?php echo $formulario['email'];?>" required/>
					</div>
				
					<div><label for="nick">Nickname:<em>*</em></label>
					<input id="nickname" name="nickname" type="text" size="40" value="<?php echo $formulario['nickname'];?>" required/>
					</div>
				
					<div><label for="pass">Password:<em>*</em></label>
					<input type="password"  name="pass" id="pass" placeholder="Mínimo 8 caracteres entre letras y dígitos" minlength="8" maxlength="20" size="40" value="<?php echo($formulario['pass']); ?>" 
					required/>
					</div>
				
					<div><label for="confirmpass">Confirmar Password: </label>
					<input type="password" name="confirmpass" id="confirmpass" placeholder="Confirmación de contraseña" minlength="8" maxlength="20" size="40" 
					 required/>
					</div>
			</fieldset>
			<div><input type="submit" value="Enviar" /></div>
	</form>
	

	<script type="text/javascript" src="Js/validaciones.js"> </script>
	</body>
</html>