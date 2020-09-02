<?php

function alta_producto($conexion, $producto) {
	$resultado = false;
	
	if(productosIguales($conexion,$producto) == 0){
	
		try{	
	
		$stmt = $conexion -> prepare("CALL INSERTAR_PRODUCTO( :idn,:precio, :nombre,:descripcion,:stock,:fecha_lanzamiento,:tipo)");
		$stmt -> bindParam(":idn", $producto["idn"]);
		$stmt -> bindParam(":precio", $producto["precio"]);
		$stmt -> bindParam(":nombre", $producto["nombre"]);
		$stmt -> bindParam(":descripcion", $producto["descripcion"]);
		$stmt -> bindParam(":stock", $producto["stock"]);
		$stmt -> bindParam(":fecha_lanzamiento", $producto["fechaLanzamiento"]);
		$stmt -> bindParam(":tipo", $producto["Tipo"]);
			 
		$stmt -> execute();
		$resultado = true;
		
		} catch(PDOException $e){
			$resultado = false;
			echo("error: " . $e -> GetMessage());
		}
	
	}
	
	return $resultado;		
}

// Listado de los tipos de producto de la BD
function listarTipos($conexion){
	try {
		$consulta = "SELECT * FROM TIPO";
		$stmt = $conexion->query($consulta);

		return $stmt;
	} catch(PDOException $e) {
		return $e->getMessage();
    }
}

function consultaDeTipo($conexion, $tipo) {

	$res = "SELECT * FROM PRODUCTO";
	
	if($tipo == "VIDEOJUEGO"){
		$res = "SELECT * FROM PRODUCTO WHERE TIPO = 'VIDEOJUEGO'";
	} else if($tipo == "MERCHANDISING"){
		$res = "SELECT * FROM PRODUCTO WHERE TIPO = 'MERCHANDISING'";
	} else if($tipo == "PLATFORMAS"){
		$res = "SELECT * FROM PRODUCTO WHERE TIPO = 'PLATFORMAS'";
	}
	
	return $res;
}

function todosLosProductos($conexion){
	$consulta = "SELECT * FROM PRODUCTO";
    return $conexion->query($consulta);
}

function eliminaProducto($conexion,$idn){
	
	try{
		$stmt = $conexion -> prepare("DELETE  FROM PRODUCTO WHERE IDN = :idn");
		$stmt -> bindParam(":idn", $idn["IDN"]);
		$stmt -> execute();
		
	} catch(PDOException $e) {
		echo("error: " . $e -> GetMessage());
	}
}

function actualizar($conexion, $producto) {
	try {

		$stmt = $conexion -> prepare("UPDATE PRODUCTO SET PRECIO = :precio,STOCK = :stock WHERE IDN = :idn");
		$stmt -> bindParam(":idn", $producto["idn"]);
		$stmt -> bindParam(":precio", $producto["precio"]);
		$stmt -> bindParam(":stock", $producto["stock"]);
		$stmt -> execute();
		return "";

	} catch(PDOException $e) {
		echo("error: " . $e -> GetMessage());
	}
}

function productosIguales($conexion, $producto) {

	try {
		$stmt = $conexion -> prepare("SELECT COUNT(*) FROM PRODUCTO WHERE IDN = :idn");
		$stmt -> bindParam(":idn", $producto["idn"]);
		$stmt -> execute();
		return $stmt -> FetchColumn();
	} catch(PDOException $e) {
		echo("error: " . $e -> GetMessage());
	}

}
?>