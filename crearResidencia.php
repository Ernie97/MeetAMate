<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <link rel="stylesheet" href="CSS/w3cssgeneral.css">
    <link rel="stylesheet" href="CSS/estilo-login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
	<title>MeetAMate: Creacion de residencia</title>
</head>
<body class="color-fondo">
    <div class="w3-content w3-sand">

	<?php 
		require("codesincss/includes/comun/cabecera.php"); 
	?>

	<div id="contenedor-login"> 
		<div class="w3-row-padding" id="contenedor-perfil">
			<div class="w3-container w3-margin-bottom w3-card w3-white">
				<form action="codesincss/procesarCrearResidencias.php" method="POST">
					<table>
						<th></th>
						<tr>
							<td><i class="fa fa-home fa-fw w3-large w3-text-dark-blue"></i>Nombre de la residencia:</td>
							<td><input class="form-control" type="text" name="Nombre_Ocio"></td>
						</tr>
						<tr>
							<td><i class="fa fa-map-marker fa-fw w3-large w3-text-dark-blue"></i>Localización:</td>
							<td><input class="form-control" type="text" name="Localizacion"></td>
						</tr>
						<tr>
							<td><i class="fa fa-road fa-fw w3-large w3-text-dark-blue"></i>Latitud:</td>
							<td><input class="form-control" type="text" name="Latitud"></td>
						</tr>
						<tr>
							<td><i class="fa fa-location-arrow fa-fw w3-large w3-text-dark-blue"></i>Longitud:</td>
						    <td><input class="form-control" type="text" name="Longitud"></td>
						</tr>
						<tr>
							<td><i class="fa fa-file-o fa-fw w3-large w3-text-dark-blue"></i>Descripción:</td>
						    <td><input class="form-control" type="text" name="Descripcion"></td>
						</tr>
						<tr>
							<td><i class="fa fa-tag fa-fw w3-large w3-text-dark-blue"></i>ID Residencia :</td>
						    <td><input class="form-control" type="text" name="ID_Resi"></td>
						</tr>
						<tr>
							<td><i class="fa fa-camera fa-fw w3-large w3-text-dark-blue"></i>Imagen:</td>
							<td><input class="form-control" type="text" name="Imagen"></td>
						</tr>
						<tr>
						    <td><i class="fa fa-photo fa-fw w3-large w3-text-dark-blue"></i>Galeria:</td>
						    <td><input class="form-control" type="text" name="Galeria"></td>
						</tr>
						<tr>
							<td><i class="fa fa-link fa-fw w3-large w3-text-dark-blue"></i>Link:</td>
							<td><input class="form-control" type="text" name="Link"></td>
						</tr>
					</table>
				  <div id="button-login" class="w3-margin-bottom w3-margin-top">
						<button class="w3-button w3-dark-blue">Crear</button>
				  </div>
				  
				</form> 
			</div>
		</div>
	</div>

		<?php
		require('codesincss/includes/comun/pie.php');
		?>

	</div>
	</body>
</html>
