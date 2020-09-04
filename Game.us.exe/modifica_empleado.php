<?php
	session_start();
	require_once("gestionBD.php");
	//include_once ("estilo.css"); 

	
if (!isset($_SESSION["empleado"])) {
		$empleado['dni'] = "";
		$empleado['puesto'] = "";
		$empleado['salario'] = "";
		
	
		$_SESSION["empleado"] = $empleado;
	}
	// Si ya existían valores, los cogemos para inicializar el formulario
	else
		$empleado = $_SESSION["empleado"];
	
		$aux['dni'] = "";
		$aux['puesto'] = "";
		$aux['salario'] = "";
		$_SESSION["aux"] = $aux;
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
  <title>Modifica Producto</title>
  
  
</head>


	<body>

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
	
	<form id="altaEmpleado" method="post" action="validacion_modifica_empleado.php"  
	>
			<p><i>Introduce el dni del empleado a modificar </i><em>*</em></p>
			<fieldset><legend></legend>				
					<div><label for="dni">DNI:<em>*</em></label>
					<input id="dni" name="dni" type="text" size="20" value="<?php echo $empleado['DNI'] ?>" required/>
					</div>
					<?php  $aux['dni']=$empleado['DNI']  ?>
					
					<div>
                        <label>Tipo:*</label>
                            <select name="Tipo" title="Indique el tipo de empleado" required>
                                <?php
                                $emp = array('JEFE', 'DEPENDIENTE', 'GESTOR DE ALMACEN');
                                foreach ($emp as $e) {
                                    if($util["Tipo"] == $e){
                                        echo("<option value='" . $e . "'  selected>" . $e . "</option>");
                                    } else {
                                        echo("<option value='" . $e . "'>" . $e . "</option>");
                                    }
                                }
                                ?>
                            </select>
                    </div>
                    <?php  $aux['puesto']=$emp['Tipo']  ?>
					
					<div><label for="salario">Salario<em>*</em></label>
					<input id="salario" name="salario" type="text"  value="<?php echo $aux['salario'];?>" required>
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