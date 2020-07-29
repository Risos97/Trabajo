<?php
session_start();

require_once ("gestionBD.php");
require_once ("gestion_producto.php");

if (isset($_SESSION["producto"])) {
	$nuevoProducto = $_SESSION["producto"];
	$_SESSION["producto"] = null;
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
		
		<main>
		<?php
		alta_producto($conexion,$nuevoProducto)
		?>
		<!-- MENSAJE DE PRODUCTO SUBIDO -->
		<h3>Producto subido con éxito con los siguientes datos:</h3>

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
		
		<a href="Princip.php">Ir a la pagina principal</a>

		</main>

		<?php
		include_once ("pie.php");
		?>

		<?php
		cerrarConexionBD($conexion);
		?>
	</body>

</html>