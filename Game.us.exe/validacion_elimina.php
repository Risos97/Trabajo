<?php
	session_start();
	require_once ("gestion_producto.php");
	require_once ("gestionBD.php");
	
	if (isset($_SESSION["producto"])) {
		// Recogemos los datos del formulario
		$idn = $_SESSION["producto"];
		
		$conexion = crearConexionBD();

    	eliminaProducto($conexion, $idn);

    	cerrarConexionBD($conexion);

    	header("LOCATION:consulta_producto.php");
		print("Ha sido eliminado con éxito");

	} else {
		header("LOCATION:menuEmpleado.php");
	}
		
		
		
	


 ?>