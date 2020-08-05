<?php	
	session_start();	
	
	if (isset($_SESSION["producto"])) {
		$libro = $_SESSION["producto"];
		unset($_SESSION["producto"]);
		
		require_once("gestionBD.php");
		require_once("gestionProducto.php");
		
		$conexion = crearConexionBD();		
		$excepcion = eliminaProducto($conexion,$producto["IDN"]);
		cerrarConexionBD($conexion);
			
		if ($excepcion<>"") {
			$_SESSION["excepcion"] = $excepcion;
			$_SESSION["destino"] = "consulta_producto.php";
			Header("Location: excepcion.php");
		}
		else Header("Location: consulta_producto.php");
	}
	else Header("Location: consulta_producto.php"); // Se ha tratado de acceder directamente a este PHP
?>
