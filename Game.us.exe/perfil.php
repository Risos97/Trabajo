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
?>
<h2>Games.us.exe</h2>
<div class="bg-img">
  <div class="container">
    <div class="topnav">
      <a href="cambiarPass.php">Cambiar Contraseña</a>
      
      <article class="Usuario">

		<form method="post" >

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
						

				

				<?php  ?>

						<!-- mostrando título -->
					<div class="Datos Usuario"><b>Datos de Usuario:</b>
						
						
						<input id="NOMBRE" name="NOMBRE" type="hidden" value="<?php echo $datos["NOMBRE"]; ?>"/>

						<div ><?php echo $datos["NOMBRE"]; ?></div>

						<div > <?php echo $datos["DIRECCION"]; ?></div>
						
						<div><?php echo $datos["MOVIL"]; ?></div>
						
						<div > <?php echo $datos["CORREO"]; ?></div>
						
						<div > <?php echo $datos["NICKNAME"]; ?></div>
						
					</div>
				<?php  ?>

				</div>
      
    
  </div>
</div>
<?php

include_once ("pie.php");
?>
</body>