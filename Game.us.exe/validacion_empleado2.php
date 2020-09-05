<?php
session_start();

require_once ("gestionBD.php");
require_once ("gestion_usuario.php");

if (isset($_SESSION["alta"])) {
	$nuevoUsuario = $_SESSION["alta"];
	$_SESSION["alta"] = null;
	$_SESSION["errores"] = null;
} else {
	Header("Location: alta_empleado.php");
}


$conexion = crearConexionBD();
$oid=calculaOid($conexion,$nuevoUsuario['email']);
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
		if(alta_empleado($conexion, $nuevoUsuario)){
			
		?>
		
		<!-- MENSAJE DE BIENVENIDO AL USUARIO -->
		<h3>Empleado dado de alta con éxito con los siguientes datos:</h3>

		<ul>
			<?php
			echo "<li>DNI: " . $nuevoUsuario["dni"] . "</li>";
			echo "<li>Puesto: " . $nuevoUsuario["puesto"] . "</li>";
			echo "<li>Salario: " . $nuevoUsuario["salario"] . "</li>";
			
			?>
		</ul>
		
		<a href="menuEmpleado.php">Ir al menú de empleado</a>

		<?php } else { ?>
		<!-- MENSAJE DE QUE USUARIO YA EXISTE -->
		<h3>Ya existe un empleado registrado con sus datos</h3>
		<ul>
			<?php
			echo "<li>DNI: " . $nuevoUsuario["dni"] . "</li>";
			echo "<li>Puesto: " . $nuevoUsuario["puesto"] . "</li>";
			echo "<li>oid: " . $oid . "</li>";
			
			?>
		</ul>
		<p>
			<a href="alta_empleado.php">Volver al alta empleado</a>
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