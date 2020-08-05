<?php	
	session_start();
	
	if (isset($_REQUEST["OID_PRODUCTO"])){
		$producto["IDN"] = $_REQUEST["IDN"];
		$producto["PRECIO"] = $_REQUEST["PRECIO"];
		$producto["NOMBRE"] = $_REQUEST["NOMBRE"];
		$producto["DESCRIPCION"] = $_REQUEST["DESCRIPCION"];
		$producto["STOCK"] = $_REQUEST["STOCK"];
		$producto["FECHA_LANZAMIENTO"] = $_REQUEST["FECHA_LANZAMIENTO"];
		$producto["TIPO"] = $_REQUEST["TIPO"];
		
		$_SESSION["producto"] = $producto;
			
		if (isset($_REQUEST["editar"])) Header("Location: consulta_productos.php"); 
		else if (isset($_REQUEST["grabar"])) Header("Location: accion_modificar_producto.php");
		else /* if (isset($_REQUEST["borrar"])) */ Header("Location: accion_borrar_producto.php"); 
	}
	else 
		Header("Location: consulta_productos.php");

?>
