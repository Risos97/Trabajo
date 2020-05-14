<?php
	session_start();
	
	if (isset($_SESSION["producto"])) {
		// Recogemos los datos del formulario
		$formulario['idn'] = $_REQUEST["idn"];
		$formulario['precio'] = $_REQUEST["precio"];
		$formulario['nombre'] = $_REQUEST["nombre"];
		$formulario['descripcion'] = $_REQUEST["descripcion"];
		$formulario['stock'] = $_REQUEST["stock"];
		$formulario['fechaLanzamiento'] = $_REQUEST["fechaLanzamiento"];
		$formulario['tipo'] = $_REQUEST["tipo"];
		
		
		// Guardar la variable local con los datos del formulario en la sesión.
		$_SESSION["producto"] = $nuevoProducto;
	}	
	else // En caso contrario, redireccionamos al formulario
		Header("Location: alta_producto.php");		
	
	// Validamos el formulario en servidor
	$conexion = crearConexionBD(); 
	$errores = validarDatosProducto($conexion, $nuevoProducto);
	cerrarConexionBD($conexion);
	
	// Comprobamos los errores
	if (count($errores)>0) {
		// Guardo en la sesión los mensajes de error y volvemos al formulario
		$_SESSION["errores"] = $errores;
		Header('Location: alta_producto.php');
	} else
		Header('Location: alta_producto.php');
	//Validación en el servidor de alta producto
	
function validarDatosProducto($conexion, $nuevoProducto){
	$errores=array();
	
	// Validación del IDN			
	if($nuevoUsuario["IDN"]=="") 
		$errores[] = "<p>El IDN no puede estar vacío</p>";
		
	// Validación del nombre		
	if($nuevoUsuario["nombre"]=="") 
		$errores[] = "<p>El nombre no puede estar vacío</p>";
	
	// Validación de la descripción
	if($nuevoUsuario["descripcion"]=="") 
		$errores[] = "<p>La descripcion no puede estar vacía</p>";
	
	// Validación del Nickname			
	if($nuevoUsuario["nickname"]=="") 
		$errores[] = "<p>El nickname no puede estar vacío</p>";
	
	
	
}

 ?>