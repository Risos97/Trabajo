<?php
	session_start();
	
	
	if (isset($_SESSION["usuario"])) {
		// Recogemos los datos del formulario
		$nuevoProducto['email'] = $_REQUEST["email"];
		$nuevoProducto['pass'] = $_REQUEST["pass"];
		// Guardar la variable local con los datos del formulario en la sesión.
		$_SESSION["usuario"]=$nuevoUsuario;
		$errores = validarDatosUsuario($nuevoUsuario);
		
		if(!empty($errores)){
			$_SESSION["errores"] = $errores;
			header("LOCATION:cambiarContraseña.php");
		}else{
			header("LOCATION:validacion_modifica_pass2.php");
		}
	}	
	else // En caso contrario, redireccionamos a altaUsuario
		Header("Location: cambiarContraseña.php");	
	
	//Validación en el servidor de alta producto
	
function validarDatosUsuario($conexion, $nuevoUsuario){
	$errores=array();
	
	
	// Validación del precio			
	if($nuevoProducto["email"]=="") 
		$errores[] = "<p>El email no puede estar vacío</p>";
	
	// Validación del stock			
	if($nuevoProducto["pass"]=="") 
		$errores[] = "<p>La pass no puede estar vacia</p>";
	

}
 ?>