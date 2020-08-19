<?php
session_start();

require_once ("gestionBD.php");
require_once ("gestion_usuario.php");

if (isset($_SESSION["usuario"])) {
	$nuevoUsusario= $_SESSION["usuario"];
	$_SESSION["usuario"] = null;
	$_SESSION["errores"] = null;
} else {
	Header("Location: cambiarContraseña.php");
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

		<?php
		include_once ("cabecera.php");
		?>
		
		<main>
		<?php
		actualizar($conexion,$nuevoProducto)
		?>
		<!-- MENSAJE DE PRODUCTO modificado -->
		<h3>Producto actualizado con éxito con los siguientes datos:</h3>

		<ul>
			<?php
			echo "<li>Email: " . $nuevoProducto["email"] . "</li>";
			echo "<li>Pass: " . $nuevoProducto["pass"] . "</li>";
			
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