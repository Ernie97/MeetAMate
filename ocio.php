<?php
 	session_start();
 	$_SESSION['login'] = true;
 ?>
 
<!DOCTYPE html>
<html>
<head>
  	<meta charset="UTF-8">
  	<link rel="stylesheet" type="text/css" href="CSS/w3cssgeneral.css">
 	<link rel="stylesheet" type="text/css" href="CSS/estilo-ocio.css">
</head>

<body class="color-fondo">
	<div class="w3-content w3-sand">

	<?php 
		require("codesincss/includes/comun/cabecera.php"); 
	?>

	<div class="w3-row-padding" id="contenedor-ocio">
	<h2>Ocio</h2>
	<h4>Estas son nuestras ofertas de ocio</h4>

	    <div class="w3-container w3-margin-bottom w3-card w3-white w3-hover-dark-blue" id="contenido-ocio">
	      	<img src="img/fiesta.jpg" alt="party" class="w3-hover-opacity">
	     	<div class="w3-container">
        		<a href= "fiestas.php">Fiestas</a>
       		</div>
      	</div>
      	<div class="w3-container w3-margin-bottom w3-card w3-white w3-hover-dark-blue" id="contenido-ocio">
	      	<img src="img/disco.jpg" alt="disco" class="w3-hover-opacity">
	     	<div class="w3-container">
        		<a href= "discotecas.php">Discotecas</a>
       		</div>
      	</div>
      	<div class="w3-container w3-margin-bottom w3-card w3-white w3-hover-dark-blue" id="contenido-ocio">
	      	<img src="img/quedada.jpg" alt="quedada" class="w3-hover-opacity">
	     	<div class="w3-container">
        		<a href= "quedadas.php">Quedadas</a>
       		</div>
      	</div>
      	<div class="w3-container w3-margin-bottom w3-card w3-white w3-hover-dark-blue" id="contenido-ocio">
	      	<img src="img/pub.jpg" alt="pub" class="w3-hover-opacity">
	     	<div class="w3-container">
        		<a href= "pubs.php">Pubs</a>
       		</div>
      	</div>
      	<div class="w3-container w3-margin-bottom w3-card w3-white w3-hover-dark-blue" id="contenido-ocio">
	      	<img src="img/erasmus.jpeg" alt="erasmus" class="w3-hover-opacity">
	     	<div class="w3-container">
        		<a href= "erasmus.php">Erasmus</a>
       		</div>
      	</div>
	</div>
	<?php
		include("codesincss/includes/comun/pie.php"); 
	?>
</div
</body>
</html>