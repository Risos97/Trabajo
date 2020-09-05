<?php
	session_start();
	
	
	if (isset($_SESSION["aux"])) {
		// Recogemos los datos del formulario
		$nuevoEmpleado['dni'] = $_REQUEST["dni"];
		$nuevoEmpleado['puesto'] = $_REQUEST["puesto"];
		$nuevoEmpleado['salario'] = $_REQUEST["salario"];
		// Guardar la variable local con los datos del formulario en la sesión.
		$_SESSION["empleado"]=$nuevoEmpleado;
		$errores = validarDatosEmpleado($nuevoEmpleado);
		
		if(!empty($errores)){
			$_SESSION["errores"] = $errores;
			header("LOCATION:modifica_empleado.php");
		}else{
			header("LOCATION:validacion_modifica_empleado2.php");
		}
	}	
	else // En caso contrario, redireccionamos 
		Header("Location: modifica_empleado.php");	
	
	//Validación en el servidor de alta producto
	
function validarDatosEmpleado($conexion, $nuevoEmpleado){
	$errores=array();
	
	
	// Validación del puesto			
	if($nuevoProducto["puesto"]=="") 
		$errores[] = "<p>El puesto no debe estar vacío</p>";
	
	// Validación del stock			
	if($nuevoProducto["salario"]=="") 
		$errores[] = "<p>El salario no puede estar vacío</p>";
	

}
 ?>