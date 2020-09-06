<?php
session_start();

require_once ("gestionBD.php");
require_once ("gestion_producto.php");
include_once ("estilo.css");

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
		
		<main id="va2">
		<?php
		actualizar($conexion,$nuevoProducto)
		?>
		<!-- MENSAJE DE PRODUCTO modificado -->
		<h5>Producto actualizado con éxito con los siguientes datos:</h5>

		<ul>
			<?php
			echo "<li>Precio: " . $nuevoProducto["precio"] . "</li>";
			echo "<li>Stock: " . $nuevoProducto["stock"] . "</li>";
			echo "<li>IDN: " . $nuevoProducto["idn"] . "</li>";
			?>
		</ul>
		
		<a href="menuEmpleado.php">Ir al menu de empleados</a>

		</main>

		<?php
		cerrarConexionBD($conexion);
		?>
	</body>

</html>