<?php
session_start();

require_once ("gestionBD.php");
require_once ("gestion_usuario.php");

if (isset($_SESSION["formulario"])) {
	$nuevoUsuario = $_SESSION["formulario"];
	$_SESSION["formulario"] = null;
	$_SESSION["errores"] = null;
} else {
	Header("Location: formulario.php");
}


$conexion = crearConexionBD();
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>Testeo: Alta de Usuario</title>
	</head>

	<body>

		<?php
		include_once ("cabecera.php");
		?>
		
		<main>

		<?php
		if(alta_usuario($conexion, $nuevoUsuario)){
			$_SESSION["login"] = $nuevoUsuario["email"];
		?>
		
		<!-- MENSAJE DE BIENVENIDO AL USUARIO -->
		<h3>Usuario dado de alta con éxito con los siguientes datos:</h3>

		<ul>
			<?php
			echo "<li>Nombre: " . $nuevoUsuario["nombre"] . "</li>";
			echo "<li>Direccion: " . $nuevoUsuario["dirección"] . "</li>";
			echo "<li>Movil: " . $nuevoUsuario["móvil"] . "</li>";
			echo "<li>email: " . $nuevoUsuario["email"] . "</li>";
			echo "<li>Nickname: " . $nuevoUsuario["nickname"] . "</li>";
			echo "<li>Pass: " . $nuevoUsuario["pass"] . "</li>";
			?>
		</ul>
		
		<a href="Princip.php">Ir a la pagina principal</a>

		<?php } else { ?>
		<!-- MENSAJE DE QUE USUARIO YA EXISTE -->
		<h3>Ya existe un usuario registrado con sus datos</h3>
		<h4>Hay un usuario registrado con su Email o su Nickname</h4>
		<p>
			<a href="formulario.php">Volver al formulario</a>
		</p>
		<?php  } ?>

		</main>

		<?php
		include_once ("pie.php");
		?>

		<?php
		cerrarConexionBD($conexion);
		?>
	</body>

</html>