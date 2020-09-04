<?php
	session_start();
	require_once ("gestion_usuario.php");
	require_once ("gestionBD.php");
	
	if (isset($_SESSION["login"])) {
		// Recogemos los datos del formulario
		$login = $_SESSION["login"];
		
		$email=$login['email'];
		$pass=$login['pass'];
		
		$conexion = crearConexionBD();

    	$num_usuarios = consultarUsuario($conexion, $email, $pass);
	    cerrarConexionBD($conexion);

	
	if ($num_usuarios == 0){
		$login = "error";
	Header("Location: login_empleado.php"); 
	}
	else{
			$_SESSION['login'] = $email;
			Header("Location: Princip.php"); 
	}
		
}	
	


 ?>





<?php
session_start();


include_once ("gestionBD.php"); 
include_once ("gestion_usuario.php");


	$login['email']="";
	$login['pass']="";
	$_SESSION['login'] = $login;

?>
<?php
	include_once ("estilo.css");
	
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
			
			

			<form id="login" action="validacion_login.php" method="post">
				
				<fieldset>
					
				<legend>
					Datos de usuario
				</legend>
				
				<div>
					<label for="email">Email: </label>
					<input type="text" name="email" id="email" value="<?php echo $login['email'];?>" />
				</div>
				
				<div>
					<label for="pass">Contraseña: </label>
					<input type="password" name="pass" id="pass" value="<?php echo $login['pass'];?>" />
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

