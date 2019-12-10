<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="CSS/w3cssgeneral.css">
		<link rel="stylesheet" href="CSS/estilo-login.css">
		<link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah" rel="stylesheet">
	<title>MEET A MATE</title>
</head>

<body class="color-fondo">
    	<div class="w3-content w3-sand">

	<?php 
		require("codesincss/includes/comun/cabecera.php"); 
		  
	?>

	<div class = "w3-row-padding w3-margin-top" id="contenedor-sel-general">
		<img src="img/pulpo.png" alt="pulpo">
		<div class=" w3-center">
		<h4>Hasta este pulpo es capaz de escribir bien su cuenta de usuario</h4>
		</div>
		
		<h5 class='w3-center w3-margin-top'><a class="w3-button w3-text-white w3-dark-blue w3-hover-dark-blue" href='login.php'>Inténtalo de nuevo</a></h5>
		

	</div>

	<?php 
		 
		include("codesincss/includes/comun/pie.php"); 
	?>

</div> <!-- Fin del contenedor -->

</body>
</html>