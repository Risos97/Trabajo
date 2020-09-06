<?php
session_start();

require_once ("gestionBD.php");
require_once ("gestion_producto.php");
include_once ("estilo.css");

if (isset($_SESSION["product"])) {
	$nuevoProducto = $_SESSION["product"];
	$_SESSION["product"] = null;
	$_SESSION["errores"] = null;
} else {
	Header("Location: alta_producto.php");
}
$conexion = crearConexionBD();
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>Testeo: Alta de Producto</title>
	</head>

	<body>

		<?php
		include_once ("cabecera.php");
		?>
		
		<main id="va2">
		<?php
		alta_producto($conexion,$nuevoProducto)
		?>
		<!-- MENSAJE DE PRODUCTO SUBIDO -->
		<h5>Producto subido con éxito con los siguientes datos:</h5>

		<ul>
			<?php
			echo "<li>Idn: " . $nuevoProducto["idn"] . "</li>";
			echo "<li>Precio: " . $nuevoProducto["precio"] . "</li>";
			echo "<li>Nombre: " . $nuevoProducto["nombre"] . "</li>";
			echo "<li>descripcion: " . $nuevoProducto["descripcion"] . "</li>";
			echo "<li>Stock: " . $nuevoProducto["stock"] . "</li>";
			echo "<li>FechaLanzamiento: " . $nuevoProducto["fechaLanzamiento"] . "</li>";
			echo "<li>Tipo: " . $nuevoProducto["Tipo"] . "</li>";
			?>
		</ul>
		
		<a href="alta_producto.php">Ir a alta Producto</a>

		</main>


		<?php
		cerrarConexionBD($conexion);
		?>
	</body>

</html>