<?php 
	session_start(); 

	unset($_SESSION);

	session_destroy(); 
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="CSS/w3cssgeneral.css">
		<link rel="stylesheet" href="CSS/estilo-login.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
		<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
	<title>MEET A MATE</title>
</head>

<body class="color-fondo">
	<div class="w3-content w3-sand">
		

	<?php 
		require("codesincss/includes/comun/cabecera.php"); 
	?>

	<div id="contenedor-login"> 

		<h1 class = "w3-center w3-margin right">¡Hasta pronto!</h1>
		<img src = "img/tenor.gif">

	</div>

	<?php 
		include("codesincss/includes/comun/pie.php"); 
	?>

</div>
</div> <!-- Fin del contenedor -->

</body>
</html>