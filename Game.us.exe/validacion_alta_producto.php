<?php
	session_start();
	
	
	if (isset($_SESSION["product"])) {
		// Recogemos los datos del formulario
		$nuevoProducto['idn'] = $_REQUEST["idn"];
		$nuevoProducto['precio'] = $_REQUEST["precio"];
		$nuevoProducto['nombre'] = $_REQUEST["nombre"];
		$nuevoProducto['descripcion'] = $_REQUEST["descripcion"];
		$nuevoProducto['stock'] = $_REQUEST["stock"];
		$nuevoProducto['fechaLanzamiento'] = $_REQUEST["fechaLanzamiento"];
		$nuevoProducto['Tipo'] = $_REQUEST["Tipo"];
		
		
		// Guardar la variable local con los datos del formulario en la sesión.
		$_SESSION["product"] = $nuevoProducto;
		$errores = validarDatosProducto($nuevoProducto);
		
		if(!empty($errores)){
			$_SESSION["errores"] = $errores;
			header("LOCATION:alta_producto.php");
		}else{
			header("LOCATION:validacion_alta_producto2.php");
		}
	}	
	else // En caso contrario, redireccionamos a altaProducto
		Header("Location: alta_producto.php");		
	

	
	//Validación en el servidor de alta producto
	
function validarDatosProducto($conexion, $nuevoProducto){
	$errores=array();
	
	// Validación del idn			
	if($nuevoProducto["idn"]=="") 
		$errores[] = "<p>El IDN no puede estar vacío</p>";
	
	// Validación del precio			
	if($nuevoProducto["precio"]=="") 
		$errores[] = "<p>El precio no puede estar vacío</p>";
		
	// Validación del nombre		
	if($nuevoProducto["nombre"]=="") 
		$errores[] = "<p>El nombre no puede estar vacío</p>";
	
	// Validación de la descripción
	if($nuevoProducto["descripcion"]=="") 
		$errores[] = "<p>La descripcion no puede estar vacía</p>";
	
	// Validación del stock			
	if($nuevoProducto["stock"]=="") 
		$errores[] = "<p>El stock no puede estar vacío</p>";
	
	// Validación de la fecha de lanzamiento
	$date = new DateTime($nuevoProducto["fechaLanzamiento"]);
	$FechaNo = new DateTime("2000-01-01");			
	if($FechaNo > $date){
		$error[] = "Fecha de producto no valida: Fecha posterior a 2000";
	} 
	
	// Validación del tipo		
	if($nuevoProducto["Tipo"]=="") 
		$errores[] = "<p>El tipo no puede estar vacío</p>";
	
}

 ?>