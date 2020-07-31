<?php 
	session_start();
	
	$excepcion = $_SESSION["excepcion"];
	unset($_SESSION["excepcion"]);
	
	if (isset ($_SESSION["destino"])) {
		$destino = $_SESSION["destino"];
		unset($_SESSION["destino"]);	
	} else 
		$destino = "";
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Gestion : Se ha producido un problema</title>
</head>
<body>	
	
<?php	
	include_once("cabecera.php"); 
?>	

	<div>
		<h2>Ups!</h2>
		<?php if ($destino<>"") { ?>
		<p>Ocurrio un problema durante el procesado de los datos. Pulse <a href="<?php echo $destino ?>">aqui­</a> para volver a la pagina principal.</p>
		<?php } else { ?>
		<p>Ocurrio un problema para acceder a la base de datos. </p>
		<?php } ?>
	</div>
		
	<div class='excepcion'>	
		<?php echo "Informacion relativa al problema: $excepcion;" ?>
	</div>

<?php	
	include_once("pie.php");
?>	

</body>
</html>