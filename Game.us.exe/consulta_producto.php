<?php
session_start();

require_once ("gestionBD.php");
require_once ("gestion_producto.php");
require_once ("consulta_paginacion.php");

if (!isset($_SESSION['login']))
	Header("Location: login_empleado.php");
else {
	if (isset($_SESSION["producto"])) {
		$producto = $_SESSION["producto"];
		unset($_SESSION["producto"]);
	}

	// ¿Venimos simplemente de cambiar página o de haber seleccionado un registro ?
	// ¿Hay una sesión activa?
	if (isset($_SESSION["paginacion"]))
		$paginacion = $_SESSION["paginacion"];
	
	$pagina_seleccionada = isset($_GET["PAG_NUM"]) ? (int)$_GET["PAG_NUM"] : (isset($paginacion) ? (int)$paginacion["PAG_NUM"] : 1);
	$pag_tam = isset($_GET["PAG_TAM"]) ? (int)$_GET["PAG_TAM"] : (isset($paginacion) ? (int)$paginacion["PAG_TAM"] : 5);

	if ($pagina_seleccionada < 1) 		$pagina_seleccionada = 1;
	if ($pag_tam < 1) 		$pag_tam = 5;

	// Antes de seguir, borramos las variables de sección para no confundirnos más adelante
	unset($_SESSION["paginacion"]);

	$conexion = crearConexionBD();

	// La consulta que ha de paginarse
	$query = 'SELECT PRODUCTO.OID_PRODUCTO, PRODUCTO.IDN, PRODUCTO.PRECIO, ' 
			. 'PRODUCTO.NOMBRE, PRODUCTO.DESCRIPCION, PRODUCTO.STOCK, PRODUCTO.FECHA_LANZAMIENTO, PRODUCTO.TIPO ' 
			. 'FROM PRODUCTO '  
			. 'ORDER BY FECHA_LANZAMIENTO, NOMBRE, TIPO';

	// Se comprueba que el tamaño de página, página seleccionada y total de registros son conformes.
	// En caso de que no, se asume el tamaño de página propuesto, pero desde la página 1
	$total_registros = total_consulta($conexion, $query);
	$total_paginas = (int)($total_registros / $pag_tam);

	if ($total_registros % $pag_tam > 0)		$total_paginas++;

	if ($pagina_seleccionada > $total_paginas)		$pagina_seleccionada = $total_paginas;

	// Generamos los valores de sesión para página e intervalo para volver a ella después de una operación
	$paginacion["PAG_NUM"] = $pagina_seleccionada;
	$paginacion["PAG_TAM"] = $pag_tam;
	$_SESSION["paginacion"] = $paginacion;

	$filas = consulta_paginada($conexion, $query, $pagina_seleccionada, $pag_tam);

	cerrarConexionBD($conexion);
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <!-- Hay que indicar el fichero externo de estilos -->
    <!-- <link rel="stylesheet" type="text/css" href="css/biblio.css" /> -->
	<script type="text/javascript" src="Js/boton.js"></script>
  <title>Gestión de Productos: Lista de Productos</title>
</head>

<body>

<?php

include_once ("cabecera.php");
?>



<main>

	 <nav>

		<div id="enlaces">

			<?php

				for( $pagina = 1; $pagina <= $total_paginas; $pagina++ )

					if ( $pagina == $pagina_seleccionada) { 	?>

						<span class="current"><?php echo $pagina; ?></span>

			<?php }	else { ?>

						<a href="consulta_producto.php?PAG_NUM=<?php echo $pagina; ?>&PAG_TAM=<?php echo $pag_tam; ?>"><?php echo $pagina; ?></a>

			<?php } ?>

		</div>



		<form method="get" action="consulta_producto.php">

			<input id="PAG_NUM" name="PAG_NUM" type="hidden" value="<?php echo $pagina_seleccionada?>"/>

			Mostrando

			<input id="PAG_TAM" name="PAG_TAM" type="number"

				min="1" max="<?php echo $total_registros; ?>"

				value="<?php echo $pag_tam?>" autofocus="autofocus" />

			entradas de <?php echo $total_registros?>

			<input type="submit" value="Cambiar">

		</form>

	</nav>



	<?php

		foreach($filas as $fila) {

	?>



	<article class="producto">

		<form method="post" action="controlador_productos.php">

			<div class="fila_producto">

				<div class="datos_producto">

					<input id="IDN" name="IDN"

						type="hidden" value="<?php echo $fila["IDN"]; ?>"/>

					<input id="PRECIO" name="PRECIO"

						type="hidden" value="<?php echo $fila["PRECIO"]; ?>"/>

					<input id="NOMBRE" name="NOMBRE"

						type="hidden" value="<?php echo $fila["NOMBRE"]; ?>"/>

					<input id="DESCRIPCION" name="DESCRIPCION"

						type="hidden" value="<?php echo $fila["DESCRIPCION"]; ?>"/>

					<input id="STOCK" name="STOCK"

						type="hidden" value="<?php echo $fila["STOCK"]; ?>"/>
						
					<input id="FECHA_LANZAMIENTO" name="FECHA_LANZAMIENTO"

						type="hidden" value="<?php echo $fila["FECHA_LANZAMIENTO"]; ?>"/>

					<input id="TIPO" name="TIPO"

						type="hidden" value="<?php echo $fila["TIPO"]; ?>"/>

				<?php

					if (isset($producto) and ($producto["IDN"] == $fila["IDN"])) { ?>

						<!-- Editando título -->

						<h3><input id="NOMBRE" name="NOMBRE" type="text" value="<?php echo $fila["NOMBRE"]; ?>"/>	</h3>

						<h4><?php echo $fila["DESCRIPCION"] . " " . $fila["PRECIO"]; ?></h4>

				<?php }	else { ?>

						<!-- mostrando título -->

						<input id="NOMBRE" name="NOMBRE" type="hidden" value="<?php echo $fila["NOMBRE"]; ?>"/>

						<div class="nombre"><b><?php echo $fila["NOMBRE"]; ?></b></div>

						<div class="infor"> <em><?php echo $fila["DESCRIPCION"] . " " . $fila["PRECIO"]; ?></em></div>

				<?php } ?>

				</div>



				<div id="botones_fila">

				<?php if (isset($producto) and ($producto["IDN"] == $fila["IDN"])) { ?>

						<button id="grabar" name="grabar" type="submit" class="editar_fila">

							<img src="images/OJO.jpg" class="editar_fila" alt="Guardar modificación">

						</button>

				<?php } else { ?>

						<button id="editar" name="editar" type="submit" class="editar_fila">

							<img src="images/LAPIZ.png" class="editar_fila" alt="Editar producto">

						</button>

				<?php } ?>

					<button id="borrar" name="borrar" type="submit" class="editar_fila">

						<img src="images/BORRAR.png" class="editar_fila" alt="Borrar producto">

					</button>

				</div>

			</div>

		</form>

	</article>



	<?php } ?>

</main>



<?php

include_once ("pie.php");
?>

</body>

</html>