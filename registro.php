<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <link rel="stylesheet" href="CSS/w3cssgeneral.css">
    <link rel="stylesheet" href="CSS/estilo-login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	<script type="text/javascript" src="javascript/comprobarValidez.js">
	</script>
   
	<title>MeetAMate: Registro</title>
</head>
<body class="color-fondo">
    <div class="w3-content w3-sand">

	<?php 
		require("codesincss/includes/comun/cabecera.php"); 
	?>

	<div id="contenedor-login"> 
		<div class="w3-row-padding" id="contenedor-perfil">
			<h2 class = "w3-center">A continuación vas a formar parte de Meet A Mate!</h2>
				<div class="w3-container w3-margin-bottom w3-card w3-white">
					<form enctype="multipart/form-data" action="codesincss/procesarRegistro.php" method="POST">
						<table id = "t1" >
							<th></th>
							<tr>
							<td id="nombres-form"><input placeholder="Selecciona la iamgen de perfil..." type="hidden" name="MAX_FILE_SIZE" value="300000000">
						    <i class="fa fa-photo fa-fw w3-large w3-text-dark-blue"></i>Imagen de perfil en formato .jpg: 
							<td><input name="imagen_perfil" type="file"></td>
						    </tr>

							<tr>
							<td id="nombres-form"><i class="fa fa-user fa-fw w3-large w3-text-dark-blue"></i>Usuario:</td>
							<td><input class="form-control" id = "username" type="text" placeholder="Nombre de usuario..." name="usuario">
							<i class="fa fa-remove fa-fw w3-large w3-text-red img-registro" id="noNickName">
							</td>
							</tr>
							
							<tr>
							<td id="nombres-form"><i class="fa fa-lock fa-fw w3-large w3-text-dark-blue"></i>Contraseña:</td>
							<td><input class="form-control" id = "password" type="password" name="password" placeholder="Contraseña del perfil..."></td>
							<td>
							<i class="fa fa-check fa-fw w3-large w3-text-green img-registro" id="okPass"></i>
							<i class="fa fa-remove fa-fw w3-large w3-text-red img-registro" id="noPass"></i>
							</td>
							</tr>
						  
							<tr>
							<td id="nombres-form" ><i class="fa fa-user-circle fa-fw w3-large w3-text-dark-blue"></i>Nombre:</td>
							<td><input class="form-control" id = "nomReg" type="text" name="nomReg" placeholder="Nombre..."></td>
							<td>
							<i class="fa fa-check fa-fw w3-large w3-text-green img-registro" id="okNombre"></i>
							<i class="fa fa-remove fa-fw w3-large w3-text-red img-registro" id="noNombre"></i>
							</td>
							</tr>
							
							<tr>
							<td id="nombres-form"><i class="fa fa-address-card fa-fw w3-large w3-text-dark-blue"></i>Primer Apellido:</td>
							<td><input class="form-control" id = "ape1Reg" type="text" name="ape1Reg" placeholder="Primer apellido..."></td>
							<td>
							<i class="fa fa-check fa-fw w3-large w3-text-green img-registro" id="okApe"></i>
							<i class="fa fa-remove fa-fw w3-large w3-text-red img-registro" id="noApe"></i>
							</td>
							</tr>
						  
							<tr>
							<td id="nombres-form"><i class="fa fa-address-card fa-fw w3-large w3-text-dark-blue"></i>Segundo Apellido:</td>
							<td><input class="form-control" type="text" name="ape2Reg" placeholder="Segundo apellido..."></td>
							</tr>
						 
							<tr>
							<td id="nombres-form"><i class="fa fa-calendar fa-fw w3-large w3-text-dark-blue"></i>Fecha de nacimiento:</td>
							<td><input class="form-control" type="date" name="birthdate" value=2000-01-01 placeholder="Fecha de nacimiento..."></td>
							</tr>
							
							<tr>
							<td id="nombres-form"><i class="fa fa-envelope-square fa-fw w3-large w3-text-dark-blue"></i>Correo:</td>
							<td><input class="form-control" id  = "correo" type="email" name="mail" placeholder="Correo electrónico..."></td>
							<td>
							<i class="fa fa-check fa-fw w3-large w3-text-green img-registro" id="okCorreo"></i>
							<i class="fa fa-remove fa-fw w3-large w3-text-red img-registro" id="noCorreo"></i>
							</td>
							</tr>
							
							<tr>
							<td id="nombres-form"><i class="fa fa-phone fa-fw w3-large w3-text-dark-blue"></i>Teléfono:</td>
							<td><input class="form-control" type="number" name="mobile" placeholder="Teléfono de contacto..."></td>
							</tr>
						</table>
						<div id="button-login" class="w3-margin-bottom w3-margin-top">
							<button class="w3-button w3-dark-blue" id = "buttonRegist">Registrarse</button>
						</div>
					</form> 
			</div>
		</div>
	</div>
	<script>
		esconder($("#okCorreo"), $("#noCorreo"), $("#okPass"), $("#noPass"), $("#okNombre"), $("#noNombre"), $("#okApe"), $("#noApe"), $("#noNickName"));
		comprobar($("#correo"), $("#okCorreo"), $("#noCorreo"));
		comprobarAjaX($("#username"), $("#noNickName"));
		comprobarVacio($("#password"), $("#okPass"), $("#noPass"));
		comprobarVacio($("#nomReg"), $("#okNombre"), $("#noNombre"));
		comprobarVacio($("#ape1Reg"), $("#okApe"), $("#noApe"));
		comprobarInfor($("#t1"),$("#buttonRegist"),$("#password"),$("#nomReg"),$("#ape1Reg"));
	</script>

		<?php
		require('codesincss/includes/comun/pie.php');
		?>

	</div>
	</body>
</html>
