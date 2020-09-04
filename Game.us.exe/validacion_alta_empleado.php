<?php
	session_start();
	
	if (isset($_SESSION["alta"])) {
		// Recogemos los datos del formulario
		$nuevoEmpleado["dni"] = $_REQUEST["dni"];
		$nuevoEmpleado["salario"] = $_REQUEST["salario"];
		$nuevoEmpleado["puesto"] = $_REQUEST["puesto"];
		$nuevoEmpleado["email"] = $_REQUEST["email"];
		
		
		
		// Guardar la variable local con los datos del formulario en la sesión.
		$_SESSION["alta"] = $nuevoEmpleado;
		$errores = validarDatosUsuario($nuevoEmpleado);
		
    	if (!empty($errores)) {
        	$_SESSION["errores"] = $errores;
        	header("LOCATION:alta_empleado.php");
    	} else {
        	header("LOCATION:validacion_empleado2.php");
    	}
	
	} else {// En caso contrario, redireccionamos al formulario
		Header("Location: alta_empleado.php");	
	}	
	
	
	
function validarDatosUsuario($nuevoEmpleado){
	$errores=array();
	
	// Validación del Nombre			
	if($nuevoEmpleado["dni"]=="") 
		$errores[] = "<p>El nombre no puede estar vacío</p>";
		
	// Validación de dirección			
	if($nuevoEmpleado["puesto"]=="") 
		$errores[] = "<p>La dirección no puede estar vacío</p>";	
	
	// Validación del Móvil			
	if($nuevoEmpleado["salario"]=="") 
		$errores[] = "<p>El móvil no puede estar vacío</p>";
	
	
}

 ?>