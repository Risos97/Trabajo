<?php
session_start();

require_once ("gestionBD.php");
require_once ("gestion_usuario.php");

if (isset($_SESSION["empleado"])) {
	$nuevoEmpleado = $_SESSION["empleado"];
	$_SESSION["empleado"] = null;
	$_SESSION["errores"] = null;
} else {
	Header("Location: modifica_empleado.php");
}
$conexion = crearConexionBD();
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>Testeo: Modificación de Empleado/title>
	</head>

	<body>

		<?php
		include_once ("cabecera.php");
		?>
		
		<main>
		<?php
		actualizarEmpleado($conexion,$nuevoEmpleado)
		?>
		<!-- MENSAJE DE EMPLEADO modificado -->
		<h3>Empleado actualizado con éxito con los siguientes datos:</h3>

		<ul>
			<?php
			echo "<li>DNI: " . $nuevoEmpleado["dni"] . "</li>";
			echo "<li>Puesto: " . $nuevoEmpleado["puesto"] . "</li>";
			echo "<li>Salario: " . $nuevoEmpleado["salario"] . "</li>";
			?>
		</ul>
		
		<a href="menuEmpleado.php">Ir al menu de empleados</a>

		</main>

		<?php
		include_once ("pie.php");
		?>

		<?php
		cerrarConexionBD($conexion);
		?>
	</body>

</html>