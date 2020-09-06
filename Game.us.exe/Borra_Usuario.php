 <?php
    session_start();
	require_once ("gestion_usuario.php");
	require_once ("gestionBD.php");
	
    if (isset($_SESSION['login'])){
  		
		$conexion = crearConexionBD();
		$email = $_SESSION['login'];
		BorraUsuario($conexion,$email);
		
		cerrarConexionBD($conexion);
		print("Ha sido eliminado con éxito");
	
	}

    header("Location: logout.php");
    
?>