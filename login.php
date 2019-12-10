<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
		<link rel="stylesheet" href="CSS/w3cssgeneral.css">
		<link rel="stylesheet" href="CSS/estilo-login.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
		<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
	<title>MeetAMate: Login</title>
</head>

<body class="color-fondo">
	<div class="w3-content w3-sand">

	<?php
		require("codesincss/includes/comun/cabecera.php"); 
	?>

			<div id="contenedor-login"> 
				<div class="w3-container w3-margin-bottom w3-card w3-white">
					<div class="w3-half ">
						<h1 class= "login100-form-title ">Acceso al sistema</h1>
						<img id="img-login" src= "img/mam1.png" alt="Logo"> 
					</div>

					<div class="w3-half">  
						<form action="codesincss/procesarLogin.php" method="POST">
								<h1 class="login100-form-title w3-margin w3-margin-bottom">Usuario y contraseña</h1>

								<div class="w3-margin-bottom validate-input" >
									<input class="input100 " type="text" name="username" placeholder="Nombre de usuario"> 
								</div>

								<input class="input100" type="password" name="password" placeholder="Contraseña">
								
										
								<div id="button-login" class="w3-margin-bottom w3-margin-top">
										<button class="w3-button w3-dark-blue">Login</button>
								</div>
							</form>
					</div>
				</div>
			</div>

	<?php
		include("codesincss/includes/comun/pie.php"); 
	?>

</div> <!-- Fin del contenedor -->

</body>
</html>