<?php
	session_start();
	require_once ("gestion_producto.php");
	require_once ("gestionBD.php");
	
	if (isset($_SESSION["producto"])) {
		// Recogemos los datos del formulario
		$idn['idn'] = $_REQUEST["idn"];
		
		$conexion = crearConexionBD();

    	eliminaProducto($conexion, $idn);

    	cerrarConexionBD($conexion);

    	header("LOCATION:elimina_Producto.php");
		print("Ha sido eliminado con éxito");

	} else {
		header("LOCATION:menuEmpleado.php");
	}
		
		
		
	


 ?>