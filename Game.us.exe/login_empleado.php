<?php
session_start();

if(isset($_SESSION['login_empleado'])){
	
}

include_once ("gestionBD.php"); 
include_once ("gestion_usuario.php");

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$pass = $_POST['pass'];

	$conexion = crearConexionBD();
	$num_usuarios = consultarUsuario($conexion, $email, $pass);
	$empleado = tocha($conexion, $email); 
	cerrarConexionBD($conexion);
	print ($empleado);
	
	if ($num_usuarios == 0)
		$login = "error";
	else{ if($empleado == 0){
			$_SESSION['login'] = $email;
			Header("Location: Princip.php"); }
		else {
			$_SESSION['login'] = $email;
			Header("Location: MenuEmplead.php");
		}
	}
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

			<form action="login_empleado.php" method="post">
				
				<fieldset>
					
				<legend>
					Datos de usuario
				</legend>
				
				<div>
					<label for="email">Email: </label>
					<input type="text" name="email" id="email" />
				</div>
				
				<div>
					<label for="pass">Contraseña: </label>
					<input type="password" name="pass" id="pass" />
				</div>
				
				
				</fieldset>
				
				<input class="boton_fo" type="submit" name="submit" value="Iniciar sesion" />
				
			</form>

			<p>
				¿No eres miembro? <a href="formulario.php">Registrarse</a>
			</p>
			
		</main>

		<?php
		include_once ("pie.php");
		?>
		
	</body>
</html>

