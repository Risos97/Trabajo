<?php
	session_start();
	
	if (isset($_SESSION["formulario"])) {
		// Recogemos los datos del formulario
		$nuevoUsuario["nombre"] = $_REQUEST["nombre"];
		$nuevoUsuario["dirección"] = $_REQUEST["dirección"];
		$nuevoUsuario["móvil"] = $_REQUEST["móvil"];
		$nuevoUsuario["email"] = $_REQUEST["email"];
		$nuevoUsuario["nickname"] = $_REQUEST["nickname"];
		$nuevoUsuario["pass"] = $_REQUEST["pass"];
		//$nuevoUsuario["confirmpass"] = $_REQUEST["confirmpass"];
		
		
		// Guardar la variable local con los datos del formulario en la sesión.
		$_SESSION["formulario"] = $nuevoUsuario;
		$errores = validarDatosUsuario($nuevoUsuario);

    	if (!empty($errores)) {
        	$_SESSION["errores"] = $errores;
        	header("LOCATION:formulario.php");
    	} else {
        	header("LOCATION:validacion_alta_usuario2.php");
    	}
	
	} else {// En caso contrario, redireccionamos al formulario
		Header("Location: formulario.php");	
	}	
	
	// Validamos el formulario en servidor
	//$conexion = crearConexionBD(); 
	//$errores = validarDatosUsuario($conexion, $nuevoUsuario);
	//cerrarConexionBD($conexion);
	
	// Comprobamos los errores
	// if (count($errores)>0) {
		// Guardo en la sesión los mensajes de error y volvemos al formulario
	//	$_SESSION["errores"] = $errores;
		
	//	Header('Location: formulario.php');
	// } else
	//	Header('Location: accion_alta_usuario.php');
	//Validación en el servidor de alta usuario
	
function validarDatosUsuario($conexion, $nuevoUsuario){
	$errores=array();
	
	// Validación del Nombre			
	if($nuevoUsuario["nombre"]=="") 
		$errores[] = "<p>El nombre no puede estar vacío</p>";
		
	// Validación de dirección			
	if($nuevoUsuario["dirección"]=="") 
		$errores[] = "<p>La dirección no puede estar vacío</p>";	
	
	// Validación del Móvil			
	if($nuevoUsuario["móvil"]=="") 
		$errores[] = "<p>El móvil no puede estar vacío</p>";
	
	// Validación del email
	if($nuevoUsuario["email"]==""){ 
		$errores[] = "<p>El email no puede estar vacío</p>";
	}else if(!filter_var($nuevoUsuario["email"], FILTER_VALIDATE_EMAIL)){
		$errores[] = "<p>El email es incorrecto: " . $nuevoUsuario["email"]. "</p>";
	}
	
	// Validación del Nickname			
	if($nuevoUsuario["nickname"]=="") 
		$errores[] = "<p>El nickname no puede estar vacío</p>";
	
	// Validación de la contraseña
	if(!isset($nuevoUsuario["pass"]) || strlen($nuevoUsuario["pass"])<8){
		$errores [] = "<p>Contraseña no válida: debe tener al menos 8 caracteres</p>";
	}else if(!preg_match("/[a-z]+/", $nuevoUsuario["pass"]) || 
		!preg_match("/[A-Z]+/", $nuevoUsuario["pass"])){
		$errores[] = "<p>Contraseña no válida: debe contener letras mayúsculas y minúsculas</p>";
	}else if($nuevoUsuario["pass"] != $nuevoUsuario["confirmpass"]){
		$errores[] = "<p>La confirmación de contraseña no coincide con la contraseña</p>";
	}
}

 ?>