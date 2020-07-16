<?php
	session_start();
	require_once("gestionBD.php");
	include_once ("estilo.css"); 

	
if (!isset($_SESSION["producto"])) {
		$producto['idn'] = "";
		
		
	
		$_SESSION["producto"] = $producto;
	}
	// Si ya existían valores, los cogemos para inicializar el formulario
	else
		$producto = $_SESSION["producto"];
	
	if (isset($_SESSION["errores"])){
		$errores = $_SESSION["errores"];
		unset($_SESSION["errores"]);
	}
	$conexion = crearConexionBD();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Elimina Producto</title>
  
  
</head>


	<body>
	<script>
		
		
		function validaciónFechaJuego(){
	var date = document.getElementById("launch");
	var aux = date.value;
	
	var ahora = new Date();
	var fJuego= new Date(aux);
	//document.write(ahora);
	if(ahora>fJuego){
		//document.write(fJuego);
		//var error= "Una fecha de lanzamiento de un juego tiene que ser posterior a ahora";
		alert("Una fecha de lanzamiento de un juego tiene que ser posterior a ahora");
		
	}
	
	//launch.setCustomValidity(error);
	
	//return error;
}
	</script>	

	<?php
		include_once("cabecera.php");
	?>
	<?php 
		if (isset($errores) && count($errores)>0) { 
	    	echo "<div id=\"div_errores\" class=\"error\">";
			echo "<h4> Errores en el formulario:</h4>";
    		foreach($errores as $error){
    			echo $error;
			} 
    		echo "</div>";
  		}
	?>
	
	<form id="altaProducto" method="get"   
	>
			<p><i>Introduce el id del producto a eliminar </i><em>*</em></p>
			<fieldset><legend></legend>				
					<div><label for="idn">IDN:<em>*</em></label>
					<input id="idn" name="idn" type="text" size="20" value="<?php echo $producto['idn'];?>" required/>
					</div>
					
					
				</fieldset>
			<div><input type="submit" value="Enviar" /></div>
		</form>
		
		<?php
	
		include_once("pie.php");
		cerrarConexionBD($conexion);
		?>
		
      
    
      
     
		
	</body>
</html>