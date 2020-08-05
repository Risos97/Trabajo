<?php

function alta_usuario($conexion, $usuario) {
	$resultado = false; 
	
	if (usuariosIguales($conexion, $usuario) == 0) {
		
		try {
			
			$stmt = $conexion -> prepare("CALL INSERTAR_USUARIO( :nombre,:correo, :contraseña,:dirección,:nickname,:móvil)");
			$stmt -> bindParam(":nombre", $usuario["nombre"]);
			$stmt -> bindParam(":dirección", $usuario["dirección"]);
			$stmt -> bindParam(":móvil", $usuario["móvil"]);
			$stmt -> bindParam(":correo", $usuario["email"]);
			$stmt -> bindParam(":nickname", $usuario["nickname"]);
			$stmt -> bindParam(":contraseña", $usuario["pass"]);
			 
			 
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
		$stmt = $conexion -> prepare("SELECT COUNT(*) FROM USUARIO WHERE CORREO = :correo OR NICKNAME = :nickname");
		$stmt -> bindParam(":correo", $usuario["email"]);
		$stmt -> bindParam(":nickname", $usuario["nickname"]);
		$stmt -> execute();
		return $stmt -> FetchColumn();
	} catch(PDOException $e) {
		echo("error: " . $e -> GetMessage());
	}

}

function consultarUsuario($conexion, $email, $pass) {

	try {
		$stmt = $conexion -> prepare("SELECT COUNT(*) FROM USUARIO WHERE CORREO = :correo AND CONTRASEÑA = :contraseña");
		$stmt -> bindParam(":correo", $email);
		$stmt -> bindParam(":contraseña", $pass);
		$stmt -> execute();
		return $stmt -> FetchColumn();
	} catch(PDOException $e) {
		echo("error: " . $e -> GetMessage());
	}

}

function consultarDatosUsuario($conexion, $email) {

    try {
        $stmt = $conexion -> prepare("SELECT * FROM USUARIO WHERE CORREO = :correo");
        $stmt -> bindParam(":correo", $email);
        $stmt -> execute();
        return $stmt -> Fetch();
    } catch(PDOException $e) {
        echo("error: " . $e -> GetMessage());
    }

}

