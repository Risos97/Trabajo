<?php
	session_start();
	
	
	if (isset($_SESSION["aux"])) {
		// Recogemos los datos del formulario
		$nuevoUsuario['email'] = $_REQUEST["email"];
		$nuevoUsuario['nickname'] = $_REQUEST["nickname"];
		$nuevoUsuario['pass'] = $_REQUEST["pass"];
		// Guardar la variable local con los datos del formulario en la sesión.
		$_SESSION["formulario"]=$nuevoUsuario;
		$errores = validarDatosUsuario($nuevoUsuario);
		
		if(!empty($errores)){
			$_SESSION["errores"] = $errores;
			header("LOCATION:modifica_usuario.php");
		}else{
			header("LOCATION:validacion_modifica_usuario2.php");
		}
	}	
	else // En caso contrario, redireccionamos 
		Header("Location: modifica_usuario.php");	
	
	
function validarDatosUsuario($conexion, $nuevoUsuario){
	$errores=array();
	
	
	// Validación del nickname			
	if($nuevoUsuario["nickname"]=="") 
		$errores[] = "<p>El nickname no debe estar vacío</p>";
	
	// Validación de la contraseña		
	if($nuevoUsuario["email"]=="") 
		$errores[] = "<p>El email no debe estar vacío</p>";

}
 ?>