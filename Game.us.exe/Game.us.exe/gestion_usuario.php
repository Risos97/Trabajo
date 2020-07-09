<?php

function alta_usuario($conexion, $usuario) {
	$resultado = false; 
	
	if (usuariosIguales($conexion, $usuario) == 0) {
		
		try {
			
			$stmt = $conexion -> prepare("CALL INSERTAR_USUARIO( :nombre,:direccion,:movil, :email, :password,  :nickname)");
			$stmt -> bindParam(":nombre", $usuario["nombre"]);
			$stmt -> bindParam(":direccion", $usuario["direccion"]);
			$stmt -> bindParam(":movil", $usuario["movil"]);
			$stmt -> bindParam(":email", $usuario["email"]);
			$stmt -> bindParam(":nickname", $usuario["nickname"]);
			$stmt -> bindParam(":password", $usuario["password"]);
			 
			 
			$stmt -> execute();
			$resultado = true;
			
		} catch(PDOException $e) {
			$resultado = false;
			echo("error: " . $e -> GetMessage());
		}
	
	}
	
	return $resultado;
}


function usuariosIguales($conexion, $usuario) {

	try {
		$stmt = $conexion -> prepare("SELECT COUNT(*) FROM USUARIO WHERE EMAIL = :email OR NICKNAME = :nickname");
		$stmt -> bindParam(":email", $usuario["email"]);
		$stmt -> bindParam(":nickname", $usuario["nickname"]);
		$stmt -> execute();
		return $stmt -> FetchColumn();
	} catch(PDOException $e) {
		echo("error: " . $e -> GetMessage());
	}

}

function consultarUsuario($conexion, $email, $pass) {

	try {
		$stmt = $conexion -> prepare("SELECT COUNT(*) FROM USUARIO WHERE EMAIL = :email AND PASSWORD = :pass");
		$stmt -> bindParam(":email", $email);
		$stmt -> bindParam(":pass", $pass);
		$stmt -> execute();
		return $stmt -> FetchColumn();
	} catch(PDOException $e) {
		echo("error: " . $e -> GetMessage());
	}

}




