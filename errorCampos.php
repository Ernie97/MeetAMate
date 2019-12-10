<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="CSS/w3cssgeneral.css">
    <link rel="stylesheet" href="CSS/estilo-login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>MEET A MATE</title>
</head>

<body class="color-fondo">
	<div class="w3-content w3-sand">

	<?php 
		require("codesincss/includes/comun/cabecera.php"); 
		  
	?>

	<div class = "w3-row-padding w3-margin-top" id="contenedor-sel-general"> 
		<div class=" w3-center">
			<h4>Ha ocurrido un error en el crear evento.</h4>
		</div>
		<h5 class='w3-center w3-margin-top'><a class="w3-button w3-text-white w3-dark-blue w3-hover-dark-blue" href='crearEventos.php'>Inténtalo de nuevo</a></h5>

	</div>

	<?php 
		 
		include("codesincss/includes/comun/pie.php"); 
	?>

</div> <!-- Fin del contenedor -->

</body>
</html>