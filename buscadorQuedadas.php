<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="CSS/w3cssgeneral.css">
 	<link rel="stylesheet" type="text/css" href="CSS/estilo-ocio.css">
 	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>MeetAMate: Quedadas</title>
</head>

<body class="color-fondo">
	<div class="w3-content w3-sand">

	<?php 
		require("codesincss/includes/comun/cabecera.php"); 
	?>

	<div class="w3-row-padding w3-margin-top" id='contenedor-sel-general'>
		<h1>Quedadas</h1>
		<div class="buscador">
			<form id="buscador" name="buscador" method="post" action="buscadorQuedadas.php"> 
				<input  name="buscar" type="search" placeholder="Buscar aquí..." autofocus >
				<input id="boton-buscar" class="w3-dark-blue" type="submit" name="buscador" class="boton peque aceptar" value="Buscar">
			</form>
		</div>

		<?php 
			$busqueda = $_REQUEST["buscar"];
			require("codesincss/procesarBuscadorQuedadas.php");
			$lista = procesarBuscadorQuedadas::getBusqueda($busqueda);

			if (!empty(current($lista))) {
				echo "<h4>Aquí tienes los resultados de tu búsqueda:</h4>";
				for ($i=0; $i < count($lista); $i++) {
					$id = $lista[$i]['ID_Quedada'];
				    $nombre = $lista[$i]['Nombre_Ocio'];
				    $desc = $lista[$i]['Descripcion'];
				    $local = $lista[$i]['Localizacion'];
				    $fini = $lista[$i]['Fecha_Inicio'];
				    $org = $lista[$i]['Organizador'];

				    ?>

					<div class='w3-card w3-container w3-margin-bottom w3-white w3-margin-top'>
						<h3><?php echo $nombre ?></h3>
					       <p><?php echo $desc ?></p>
					       <p><i class="fa fa-map-marker fa-fw w3-large w3-text-dark-blue"></i><?php echo $local ?></p>
					       <p><i class="fa fa-calendar fa-fw w3-large w3-text-dark-blue"></i><?php echo $fini ?></p>
					       <p><i class="fa fa-link fa-fw w3-large w3-text-dark-blue"></i><?php echo $org ?></p>
					       <?php
					       echo "<p><a id='detalles-general' href='sel_quedada.php?nombre=$nombre&desc=$desc&local=$local&fini=$fini&org=$org&id=$id'>Ver detalles</a></p>";
					       ?>
					</div>
					<?php
				}
			} else {
			    echo "<div class='alto'><h4>No hemos encontrado resultados</h4></div>";
			}
		?>
	</div>
	<?php 
		include("codesincss/includes/comun/pie.php"); 
	?>
	</div>
</body>
</html>