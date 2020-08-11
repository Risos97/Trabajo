<?php
	session_start();
	
	
	if (isset($_SESSION["producto"])) {
		// Recogemos los datos del formulario
		$nuevoProducto['precio'] = $_REQUEST["precio"];
		$nuevoProducto['stock'] = $_REQUEST["stock"];
		$nuevoProducto['idn'] = $_REQUEST["idn"];
		
		
		// Guardar la variable local con los datos del formulario en la sesión.
		$_SESSION["producto"]=$nuevoProducto;
		$errores = validarDatosProducto($nuevoProducto);
		
		if(!empty($errores)){
			$_SESSION["errores"] = $errores;
			header("LOCATION:modifica_producto.php");
		}else{
			header("LOCATION:validacion_modifica_producto2.php");
		}
	}	
	else // En caso contrario, redireccionamos a altaProducto
		Header("Location: modifica_producto.php");	
	
	//Validación en el servidor de alta producto
	
function validarDatosProducto($conexion, $nuevoProducto){
	$errores=array();
	
	
	// Validación del precio			
	if($nuevoProducto["precio"]=="") 
		$errores[] = "<p>El precio no puede estar vacío</p>";
	
	// Validación del stock			
	if($nuevoProducto["stock"]=="") 
		$errores[] = "<p>El stock no puede estar vacío</p>";
	

}
 ?>