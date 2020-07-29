<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

function crearConexionBD()
{
	$host="oci:dbname=LAPTOP-8J9EGE29/xe;charset=UTF8";
	$usuario="RISOS";
	$password="risos";

	try{
		/* Indicar que las sucesivas conexiones se puedan reutilizar */	
		$conexion=new PDO($host,$usuario,$password,array(PDO::ATTR_PERSISTENT => true));
	    /* Indicar que se disparen excepciones cuando ocurra un error*/
    	$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $conexion;
	}catch(PDOException $e){
		$_SESSION['excepcion'] = $e->GetMessage();
		header("Location: excepcion.php");
	}
}

function cerrarConexionBD($conexion){
	$conexion=null;
}

?>
