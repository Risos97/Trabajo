<?php	
	session_start();	
	require_once("gestionBD.php");
	require_once("gestion_producto.php");
	
	if (isset($_SESSION["producto"])) {
		$producto = $_SESSION["producto"];
		unset($_SESSION["producto"]);
		
		
		
		$conexion = crearConexionBD();		
		$excepcion = actualizar($conexion,$precio["PRECIO"],$stock["STOCK"]);
		cerrarConexionBD($conexion);
			
		if ($excepcion<>"") {
			$_SESSION["excepcion"] = $excepcion;
			$_SESSION["destino"] = "consulta_productos.php";
			Header("Location: excepcion.php");
		}
		else
			Header("Location: consulta_productos.php");
	} 
	else Header("Location: consulta_productos.php"); // Se ha tratado de acceder directamente a este PHP
?>
