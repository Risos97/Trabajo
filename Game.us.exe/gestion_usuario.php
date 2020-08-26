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
function consultarEmpleado2($conexion, $dni) {

	try {
		$stmt = $conexion -> prepare("SELECT COUNT(*) FROM EMPLEADO WHERE DNI = :dni ");
		$stmt -> bindParam(":dni", $dni);
		
		$stmt -> execute();
		return $stmt -> FetchColumn();
	} catch(PDOException $e) {
		echo("error: " . $e -> GetMessage());
	}

}

function calculaOid($conexion, $email){
	try{
		$stmt = $conexion -> prepare("SELECT USUARIO.OID_USUARIO FROM USUARIO WHERE CORREO = :email ");
		$stmt -> bindParam(":email", $email);
		$stmt -> execute();
		return $stmt -> FetchColumn();
	} catch(PDOException $e) {
		echo("error: " . $e -> GetMessage());
	}
	
	
}

function consultarEmpleado($conexion, $oid_usuario){
	try{
		$stmt = $conexion -> prepare("SELECT COUNT(*) FROM EMPLEADO WHERE OID_USUARIO = :oid_usuario");
		$stmt -> bindParam(":oid_usuario", $oid_usuario);
		$stmt -> execute();
		return $stmt -> FetchColumn();
	} catch(PDOException $e) {
		echo("error: " . $e -> GetMessage());
	}
	
}

function tocha($conexion, $email) {
	$oid_usuario = calculaOid($conexion, $email);
	
	
	if(consultarEmpleado($conexion, $oid_usuario) == 0)	
		$resultado = 0;
	else
		$resultado = 1;	
		
	return $resultado;		
}

function consultarDatosUsuario($conexion, $usuario) {

    try {
        $stmt = $conexion -> prepare("SELECT * FROM USUARIO WHERE CORREO = :correo");
        $stmt -> bindParam(":correo", $usuario);
        $stmt -> execute();
        return $stmt -> Fetch();
    } catch(PDOException $e) {
        echo("error: " . $e -> GetMessage());
    }

}
function actualizarU($conexion, $usuario) {
	try {

		$stmt = $conexion -> prepare("UPDATE USUARIO SET CONTRASEÑA = :contraseña,NICKNAME = :nickname WHERE CORREO = :correo");
		$stmt -> bindParam(":contraseña", $usuario["pass"]);
		$stmt -> bindParam(":correo", $usuario["email"]);
		$stmt -> bindParam(":nickname", $usuario["nickname"]);
		$stmt -> execute();
		return "";

	} catch(PDOException $e) {
		echo("error: " . $e -> GetMessage());
	}
}

function BorraUsuario($conexion, $correo) {

    try {
        $stmt = $conexion -> prepare("DELETE FROM USUARIO WHERE CORREO = :correo");
        $stmt -> bindParam(":correo", $correo);
        $stmt -> execute();
		
    } catch(PDOException $e) {
        echo("error: " . $e -> GetMessage());
    }

}


