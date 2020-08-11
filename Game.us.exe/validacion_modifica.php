<?php
	session_start();
	require_once ("gestion_producto.php");
	require_once ("gestionBD.php");
	
	if (isset($_SESSION["producto"])) {
		// Recogemos los datos del formulario
		$precio['precio'] = $_REQUEST["precio"];
		$stock['stock'] = $_REQUEST["stock"];
		
		$conexion = crearConexionBD();

    	actualizar($conexion, $precio, $stock);

    	cerrarConexionBD($conexion);

    	header("LOCATION:Princip.php");

	} else {
		header("LOCATION:formulario.php");
	}
		
		
		
	


 ?>