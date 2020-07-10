<?php
	session_start();
	require_once("gestionBD.php");
	
	if (isset($_SESSION["producto"])) {
		// Recogemos los datos del formulario
		$nuevoProducto['idn'] = $_REQUEST["idn"];
		$nuevoProducto['precio'] = $_REQUEST["precio"];
		$nuevoProducto['nombre'] = $_REQUEST["nombre"];
		$nuevoProducto['descripcion'] = $_REQUEST["descripcion"];
		$nuevoProducto['stock'] = $_REQUEST["stock"];
		$nuevoProducto['fechaLanzamiento'] = $_REQUEST["fechaLanzamiento"];
		$nuevoProducto['tipo'] = $_REQUEST["tipo"];
		
		
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
	
	// Validación del idn			
	if($nuevoUsuario["idn"]=="") 
		$errores[] = "<p>El IDN no puede estar vacío</p>";
	
	// Validación del precio			
	if($nuevoUsuario["precio"]=="") 
		$errores[] = "<p>El precio no puede estar vacío</p>";
		
	// Validación del nombre		
	if($nuevoUsuario["nombre"]=="") 
		$errores[] = "<p>El nombre no puede estar vacío</p>";
	
	// Validación de la descripción
	if($nuevoUsuario["descripcion"]=="") 
		$errores[] = "<p>La descripcion no puede estar vacía</p>";
	
	// Validación del stock			
	if($nuevoUsuario["stock"]=="") 
		$errores[] = "<p>El stock no puede estar vacío</p>";
	
	// Validación de la fecha de lanzamiento			
	if($nuevoUsuario["fechaLanzamiento"]=="") 
		$errores[] = "<p>La fecha lanzamiento no puede estar vacía</p>";
	
	// Validación del tipo		
	if($nuevoUsuario["tipo"]=="") 
		$errores[] = "<p>El tipo no puede estar vacío</p>";
	
}

 ?>