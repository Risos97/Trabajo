<?php
	session_start();
	
	
	if (isset($_SESSION["formulario"])) {
		// Recogemos los datos del formulario
		$nuevoUsuario['email'] = $_REQUEST["email"];
		$nuevoUsuario['pass'] = $_REQUEST["pass"];
		$nuevoUsuario['nickname'] = $_REQUEST["nickname"];
		// Guardar la variable local con los datos del formulario en la sesión.
		$_SESSION["formulario"]=$nuevoUsuario;
		$errores = validarDatosUsuario($nuevoUsuario);
		
		if(!empty($errores)){
			$_SESSION["errores"] = $errores;
			header("LOCATION:cambiarPass.php");
		}else{
			header("LOCATION:validacion_modifica_pass2.php");
		}
	}	
	else // En caso contrario, redireccionamos 
		Header("Location: cambiarPass.php");	
	
	
	
function validarDatosUsuario($conexion, $nuevoUsuario){
	$errores=array();
	
	
	// Validación del email			
	if($nuevoUsuario["email"]=="") 
		$errores[] = "<p>El email no puede estar vacío</p>";
	
	// Validación de la contraseña		
	if($nuevoUsuario["pass"]=="") 
		$errores[] = "<p>La pass no puede estar vacia</p>";
	// Validación de la contraseña		
	if($nuevoUsuario["nickname"]=="") 
		$errores[] = "<p>La pass no puede estar vacia</p>";

}
 ?>