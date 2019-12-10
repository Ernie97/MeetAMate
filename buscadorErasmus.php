<?php session_start(); ?>

<!DOCTYPE html>
<html>
	<head>
	  	<meta charset="UTF-8">
	<link rel="stylesheet" href="CSS/w3cssgeneral.css">
 	<link rel="stylesheet" type="text/css" href="CSS/estilo-ocio.css">
 	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>

<body class="color-fondo">
	<div class="w3-content w3-sand">

		<?php 
			require("codesincss/includes/comun/cabecera.php"); 
		?>
		<div class="w3-row-padding w3-margin-top" id='contenedor-residencias'>
			<h1>Erasmus</h1>
			<div class="buscador">
			<form id="buscador" name="buscador" method="post" action="buscadorErasmus.php"> 
				<input  name="buscar" type="search" placeholder="Buscar aquí..." autofocus >
				<input id="boton-buscar" class="w3-dark-blue" type="submit" name="buscador" class="boton peque aceptar" value="Buscar">
			</form>
			</div>

			<?php 
				$busqueda = $_REQUEST["buscar"];
				require("codesincss/procesarBuscadorErasmus.php");
				$lista_Erasmus = procesarBuscadorErasmus::getBusqueda($busqueda);
					
				if (!empty(current($lista_Erasmus))){
					echo "<h4>Aqui tienes los resultados de tu busqueda:</h4>";
					for ($i = 0; $i < count($lista_Erasmus); $i++){
						$id = $lista_Erasmus[$i]['ID_Quedada'];
						$nombre_Erasmus = $lista_Erasmus[$i]['Nombre_Ocio'];
						$descripcion = $lista_Erasmus[$i]['Descripcion'];
						$localizacion = $lista_Erasmus[$i]['Localizacion'];
						$fecha_inicio = $lista_Erasmus[$i]['Fecha_Inicio'];
						$organizador = $lista_Erasmus[$i]['Organizador'];
						$idioma = $lista_Erasmus[$i]['Idioma'];
						
						?>

					<div class='w3-card w3-container w3-margin-bottom w3-white w3-margin-top'>
						<h3><?php echo $nombre_Erasmus ?></h3>
					       <p><?php echo $descripcion ?></p>
					       <p><i class="fa fa-map-marker fa-fw w3-large w3-text-dark-blue"></i><?php echo $localizacion ?></p>
					       <p><i class="fa fa-calendar fa-fw w3-large w3-text-dark-blue"></i><?php echo $fecha_inicio ?></p>
					       <p><i class="fa fa-link fa-fw w3-large w3-text-dark-blue"></i><?php echo $organizador ?></p>
					       <p><i class="fa fa-language fa-fw w3-large w3-text-dark-blue"></i><?php echo $idioma ?></p>
					       <?php
					       echo "<p><a id='detalles-general' href='sel_erasmus.php?id=$id&nombre=$nombre_Erasmus&descripcion=$descripcion&localizacion=$localizacion&fecha=$fecha_inicio&organizador=$organizador&idioma=$idioma'>Ver detalles</a></p>";
					       ?>
					</div>
					<?php
					}
				}
				else{
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