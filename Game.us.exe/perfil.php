<!DOCTYPE html>
<?php
session_start();

require_once ("gestionBD.php");
require_once ("gestion_usuario.php");


if (!isset($_SESSION['login']))
	Header("Location: login_empleado.php");
else {
		$usuario = $_SESSION["login"];
	
	
		$conexion = crearConexionBD();
		$datos = consultarDatosUsuario($conexion, $usuario);
	
		cerrarConexionBD($conexion);
	}
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}
<title>Pefil de Usuario: Lista de Datos de Usuario</title>
</style>
</head>
<body>
<?php

include_once ("cabecera.php");
include_once ("estilo.css");
?>
<h2>Games.us.exe</h2>
<div class="bg-img">
  <div class="perfil2">
    <div class="topnav">
      <a href="cambiarPass.php">Cambiar Contraseña</a>
      <a href="Borra_Usuario.php">Borrar Usuario</a>
      <a href="logout.php">Cerrar Sesión</a>
      <a href="consulta_producto.php">Productos</a>
      <a href="Princip.php">Página principal</a>
      
      <article class="Usuario">

		<form  method="post" >

				<div class="datos_usuario">

					<input id="NOMBRE" name="NOMBRE"

						type="hidden" value="<?php echo $datos["NOMBRE"]; ?>"/>

					<input id="DIRECCION" name="DIRECCION"

						type="hidden" value="<?php echo $datos["DIRECCION"]; ?>"/>

					<input id="MOVIL" name="MOVIL"

						type="hidden" value="<?php echo $datos["MOVIL"]; ?>"/>

					<input id="CORREO" name="CORREO"

						type="hidden" value="<?php echo $datos["CORREO"]; ?>"/>

					<input id="NICKNAME" name="NICKNAME"

						type="hidden" value="<?php echo $datos["NICKNAME"]; ?>"/>
						

				 </div>
			</div>
 		</div>

				<?php  ?>

						<!-- mostrando título -->
					
					<div id="perfil">
						<b>Datos de Usuario:</b>
						<br></br>
						
						<input id="NOMBRE" name="NOMBRE" type="hidden" value="<?php echo $datos["NOMBRE"]; ?>"/>

						<div > <b>Nombre: </b> <?php echo $datos["NOMBRE"]; ?></div>

						<div > <b>Dirección: </b> <?php echo $datos["DIRECCION"]; ?></div>
						
						<div > <b>Móvil: </b> <?php echo $datos["MOVIL"]; ?></div>
						
						<div > <b>Correo:</b> <?php echo $datos["CORREO"]; ?></div>
						
						<div > <b>Nickname: </b><?php echo $datos["NICKNAME"]; ?></div>
						
					</div>
				<?php  ?>

				
     
</body>