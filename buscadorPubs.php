<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="CSS/w3cssgeneral.css">
 	<link rel="stylesheet" type="text/css" href="CSS/estilo-ocio.css">
 	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>MeetAMate: Pubs</title>
</head>

<body class="color-fondo">
	<div class="w3-content w3-sand">

		<?php 
			require("codesincss/includes/comun/cabecera.php"); 
		?>
		<div class="w3-row-padding w3-margin-top" id='contenedor-residencias'>
			<h1>Pubs</h1>
			<div class="buscador">
			<form id="buscador" name="buscador" method="post" action="buscadorPubs.php"> 
				<input  name="buscar" type="search" placeholder="Buscar aquí..." autofocus >
				<input id="boton-buscar" class="w3-dark-blue" type="submit" name="buscador" class="boton peque aceptar" value="Buscar">
			</form>
		</div>

			<?php 
				$busqueda = $_REQUEST["buscar"];
				require("codesincss/procesarBuscadorPubs.php");
				$lista_pubs = procesarBuscadorPubs::getBusqueda($busqueda);
					
				if (!empty(current($lista_pubs))){
					echo "<h4>Aqui tienes los resultados de tu busqueda:</h4>";
					for ($i = 0; $i < count($lista_pubs); $i++){
						$id = $lista_pubs[$i]['ID_Pub'];
						$nombre_pub = $lista_pubs[$i]['Nombre_Ocio'];
						$descripcion = $lista_pubs[$i]['Descripcion'];
						$localizacion = $lista_pubs[$i]['Localizacion'];
						$link = $lista_pubs[$i]['Link'];
						
						?>

					<div class='w3-card w3-container w3-margin-bottom w3-white w3-margin-top'>
						<h3><?php echo $nombre_pub ?></h3>
					       <p><?php echo $descripcion ?></p>
					       <p><i class="fa fa-map-marker fa-fw w3-large w3-text-dark-blue"></i><?php echo $localizacion ?></p>
					       <p><i class="fa fa-link fa-fw w3-large w3-text-dark-blue"></i><?php echo $link ?></p>
					       <?php
					       echo "<p><a id='detalles-general' href='sel_pub.php?id=$id&nombre=$nombre_pub&descripcion=$descripcion&localizacion=$localizacion&link=$link'>Ver detalles</a></p>";
					       ?>
					</div>
					<?php
					}
				}
				else{
					echo "<div class='alto'><p>No hemos encontrado resultados</p></div>";
				}
			?>
		</div>
		
		<?php 
			include("codesincss/includes/comun/pie.php"); 
		?>
	</div>
	</body>
</html>