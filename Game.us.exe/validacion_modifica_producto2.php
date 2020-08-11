<?php
session_start();

require_once ("gestionBD.php");
require_once ("gestion_producto.php");

if (isset($_SESSION["producto"])) {
	$nuevoProducto = $_SESSION["producto"];
	$_SESSION["producto"] = null;
	$_SESSION["errores"] = null;
} else {
	Header("Location: modifica_producto.php");
}
$conexion = crearConexionBD();
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>Testeo: Modificación de Producto</title>
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
			echo "<li>Precio: " . $nuevoProducto["precio"] . "</li>";
			echo "<li>Stock: " . $nuevoProducto["stock"] . "</li>";
			echo "<li>IDN: " . $nuevoProducto["idn"] . "</li>";
			?>
		</ul>
		
		<a href="menuEmpleado.php">Ir a la pagina principal</a>

		</main>

		<?php
		include_once ("pie.php");
		?>

		<?php
		cerrarConexionBD($conexion);
		?>
	</body>

</html>