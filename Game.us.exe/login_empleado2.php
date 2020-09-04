<?php
session_start();


include_once ("gestionBD.php"); 
include_once ("gestion_usuario.php");

if (isset($_POST['submit'])) {
	$dni = $_POST['dni'];
	

	$conexion = crearConexionBD();
	$num_usuarios = consultarEmpleado2($conexion, $dni);
	$empleado = tocha($conexion, $email); 
	cerrarConexionBD($conexion);
	print ($empleado);
	
	if ($num_usuarios == 0)
		$login = "error";
	else
		$_SESSION['empleado'] = $dni;
		Header("Location: menuEmpleado.php");
}
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>Game.us.exe: Login</title>
	</head>

	<body>

		<?php
		include_once ("cabecera.php");
		
		include_once ("estilo.css");
	
		?>
		<script>
			
			
		</script>
		<main>
			
			<?php
			if (isset($login)) {
				echo "<div class=\"error\">";
				echo "Error en la contraseña o no existe el usuario.";
				echo "</div>";
			}
			?>

			<form id="login" action="login_empleado2.php" method="post">
				
				<fieldset>
					
				<legend>
					Datos de Empleado
				</legend>
				
				<div>
					<label for="dni">DNI: </label>
					<input type="text" name="dni" id="dni" />
				</div>
				
				
				
				
				</fieldset>
				
				<input class="boton_fo" type="submit" name="submit" value="Iniciar sesion" />
				
				<p>
				¿No eres miembro? <a href="formulario.php">Registrarse</a>
				</p>
			</form>

			
			
		</main>

		<?php
		//include_once ("pie.php");
		?>
		
	</body>
</html>

