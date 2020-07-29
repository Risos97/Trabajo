<?php
require_once("gestionBD.php");

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

function getNombreTipo($conexion, $tipo){
	try {
		$consulta = "SELECT TIPO FROM PRODUCTO WHERE OID_PRODUCTO=:tip";
		$stmt=$conexion->prepare($consulta);
		$stmt->bindParam(':tip',$tipo);
		$stmt->execute();
		$result = $stmt->fetch();
		
		return $result["TIPO"];
	} catch(PDOException $e) {
		return $e->getMessage();
    }
}
?>