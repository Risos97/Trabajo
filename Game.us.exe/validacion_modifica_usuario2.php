<?php
session_start();

require_once ("gestionBD.php");
require_once ("gestion_usuario.php");
include_once ("estilo.css");

if (isset($_SESSION["formulario"])) {
	$nuevoUsuario = $_SESSION["formulario"];
	$_SESSION["formulario"] = null;
	$_SESSION["errores"] = null;
} else {
	Header("Location: modifica_usuario.php");
}
$conexion = crearConexionBD();
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>Testeo: Modificación de Usuario </title>
	</head>

	<body>

		<?php
		include_once ("cabecera.php");
		?>
		
		<main id="va2">
		<?php
		actualizarU($conexion,$nuevoUsuario);
		?>
		<!-- MENSAJE DE Usuario modificado -->
		<h5>Usuario actualizado con éxito con los siguientes datos:</h5>

		<ul>
			<?php
			echo "<li>EMAIL: " . $nuevoUsuario["email"] . "</li>";
			echo "<li>nickname: " . $nuevoUsuario["nickname"] . "</li>";
			echo "<li>Pass: " . $nuevoUsuario["pass"] . "</li>";
			?>
		</ul>
		
		<a href="perfil.php">Ir al perfil</a>

		</main>

		<?php
		cerrarConexionBD($conexion);
		?>
	</body>

</html>