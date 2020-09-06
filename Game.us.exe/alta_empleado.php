<?php
	session_start();
	
	
// Si no existen datos del formulario en la sesión, se crea una entrada con valores por defecto
	if (!isset($_SESSION["alta"])) {
		$formulario['dni'] = "";
		$formulario['puesto'] = "";
		$formulario['salario'] = "";
		$formulario['email'] = "";
		
		
	
		$_SESSION["alta"] = $formulario;
	}
	// Si ya existían valores, los cogemos para inicializar el formulario
	else
		$formulario = $_SESSION["alta"];
	
	if (isset($_SESSION["errores"])){
		$errores = $_SESSION["errores"];
		unset($_SESSION["errores"]);
	}
	
?>

<?php
	include_once ("estilo.css");
	
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Alta Usuario</title>
  
  
	<script type="text/javascript" src="Js/validaciones.js">
		
	</script>

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
	

	
	<form id="altaUsuario" method="post" action="validacion_alta_empleado.php" onsubmit="return validateForm()">
		 
		<p><i>Los campos obligatorios están marcados con </i><em>*</em></p>
		<fieldset><legend>Datos Usuario</legend>
					<div><label for="dni">DNI:<em>*</em></label>
					<input id="inp" name="dni" type="text" size="40" value="<?php echo $formulario['dni'];?>" required/>
					</div>
					<div><label for="salario">salario:<em>*</em></label>
					<input id="inp" name="salario" type="text" size="40" value="<?php echo $formulario['salario'];?>" required/>
					</div>
					<div><label for="email">email:<em>*</em></label>
					<input id="inp" name="email" type="text" size="40" value="<?php echo $formulario['email'];?>" required/>
					</div>
					<div>
                        <label>Puesto:*</label>
                            <select id="sel"  name="puesto" title="Indique el puesto del empleado" required>
                                <?php
                                $formulario = array('DEPENDIENTE', 'JEFE', 'GESTOR DE ALMACEN');
                                foreach ($formulario as $p) {
                                    if($aux["puesto"] == $p){
                                        echo("<option value='" . $p . "'  selected>" . $p . "</option>");
                                    } else {
                                        echo("<option value='" . $p . "'>" . $p . "</option>");
                                    }
                                }
                                ?>
                            </select>
                    </div>
					
					
			</fieldset>
			<div><input type="submit" value="Enviar" /></div>
	</form>
	
	<script type="text/javascript" src="Js/validaciones.js"> </script>
	</body>
</html>