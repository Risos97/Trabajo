<?php

function alta_producto($conexion, $producto) {
	$resultado = false;
	
	if(productosIguales($conexion,$producto) == 0){
	
		try{	
	
		$stmt = $conexion -> prepare("CALL INSERTAR_PRODUCTO( :idn,:precio, :nombre,:descripcion,:stock,:fecha_lanzamiento,:tipo)");
		$stmt -> bindParam(":idn", $producto["idn"]);
		$stmt -> bindParam(":precio", $producto["precio"]);
		$stmt -> bindParam(":nombre", $producto["nombre"]);
		$stmt -> bindParam(":descripcion", $descripcion["descripcion"]);
		$stmt -> bindParam(":stock", $producto["stock"]);
		$stmt -> bindParam(":fecha_lanzamiento", $producto["fechaLanzamiento"]);
		$stmt -> bindParam(":tipo", $producto["tipo"]);
			 
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

function actualizar($conexion, $actprod) {
	$resultado = false;
	
	$oid_pr = $actprod["oid_pr"];
	$nombre = $actprod["nombre"];
	$fechaLanzamiento = $actprod["fecha_lanzamiento"];
	$precio = $actprod["precio"];
	$stock = $actprod["stock"];

	try {

		$stmt = $conexion -> prepare("UPDATE PRODUCTO SET NOMBRE = :nombre, FECHA_LANZAMIENTO = TO_DATE(:fecha_lanzamiento, 'YYYY-MM-DD'), SET PRECIO = :precio, SET STOCK = :stock WHERE OID_PRODUCTO = :oid_pr");
		$stmt -> bindParam(":nombre", $nombre);
		$stmt -> bindParam(":oid_pr", $oid_pr);
		$stmt -> bindParam(":fecha_lanzamiento", $fechaLanzamiento);
		$stmt -> bindParam(":precio", $precio);
		$stmt -> bindParam(":stock", $stock);
		$stmt -> execute();
		$resultado = true;

	} catch(PDOException $e) {
		echo("error: " . $e -> GetMessage());
	}

return $resultado;
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