<?php session_start();?>
<!DOCTYPE html>
<html>
	<head>
	  	<meta charset="UTF-8">
		<link rel="stylesheet" href="CSS/w3cssgeneral.css">
		<link rel="stylesheet" href="CSS/estilo-alojamiento.css">
		<style>
		html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}
		</style>
	</head>
	
	<body class="color-fondo">
		<div class="w3-content w3-sand">	

			<?php 
				require("codesincss/includes/comun/cabecera.php"); 
			?>

		<div class="w3-container" id="contenedor-general">

			<div id="contenido-alojamiento" class="w3-container w3-card w3-third w3-margin-bottom w3-white">
					<h2><a href="residencias.php">Residencias</a></h2>
					<p>Aquí encontrarás las mejores residencias para irte a vivir donde tú quieras.</p>
			</div>
				
				<?php 
				if (isset($_SESSION['LogIn']) && $_SESSION['LogIn']) { 
				?>

			<div id="contenido-alojamiento" class="w3-container w3-card w3-third w3-margin-bottom w3-white">
				<h2><a href="compañeroDePiso.php">Buscar compañero de piso</a></h2>
				<p>Aquí encontrarás los mejores candidatos para que sean tus compañeros de piso.</p>
			</div>

				<?php 
				}
				else {
				?>

			<div id="contenido-alojamiento" class="w3-container w3-card w3-third w3-margin-bottom w3-white">
				<h2>¿Quieres ver más?</h2>
				<p>¡Regístrate para descubrir este secreto!</p>
			</div>

			<?php
				}
			?>

			<div id="contenido-alojamiento" class="w3-container w3-card w3-third w3-margin-bottom w3-white">
				<h2><a href="https://www.idealista.com/">Vivir solo</a></h2>
				<p>Si prefieres vivir solo, aquí puedes encontrar pisos al mejor precio.</p>
			</div>
		</div>
		<?php 
			include("codesincss/includes/comun/pie.php"); 
		?>
		</div>
	</body>
</html>
