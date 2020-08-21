<?php
session_start();

require_once ("gestionBD.php");
require_once ("gestion_usuario.php");

if (isset($_SESSION["formulario"])) {
	$nuevoUsuario= $_SESSION["formulario"];
	$_SESSION["formulario"] = null;
	$_SESSION["errores"] = null;
} else {
	Header("Location: Perfil.php");
}
$conexion = crearConexionBD();
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>Testeo: Modificación de Usuario</title>
	</head>

	<body>
	<script>
		
	</script>
	
		<?php
		include_once ("cabecera.php");
		?>
		
		<main>
		<?php
		actualizarU($conexion,$nuevoUsuario)
		?>
		<!-- MENSAJE DE Usuario modificado -->
		<h3>Usuario actualizado con éxito con los siguientes datos:</h3>

		<ul>
			<?php
			echo "<li>Email: " . $nuevoUsuario["email"] . "</li>";
			echo "<li>Pass: " . $nuevoUsuario["pass"] . "</li>";
			echo "<li>Pass: " . $nuevoUsuario["nickname"] . "</li>";
			
			?>
		</ul>
		
		<a href="perfil.php">Ir al menu de Usuario</a>

		</main>

		<?php
		include_once ("pie.php");
		?>

		<?php
		cerrarConexionBD($conexion);
		?>
	</body>

</html>