<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <link rel="stylesheet" href="CSS/w3cssgeneral.css">
    <link rel="stylesheet" href="CSS/estilo-login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
	<title>MeetAMate: Modificacion de residencia</title>
</head>
<body class="color-fondo">
    <div class="w3-content w3-sand">

	<?php 
		require("codesincss/includes/comun/cabecera.php"); 
		  
		$id = $_GET['id'];
		require("codesincss/procesarOcio.php");
		require("codesincss/procesarResidencias.php");
	?>

	<div id="contenedor-login"> 
		<div class="w3-row-padding" id="contenedor-perfil">
			<div class="w3-container w3-margin-bottom w3-card w3-white">
				<form action="codesincss/procesarModificarResidencias.php" method="POST">
					  <p>Nombre de la residencia:
					  <input type="text" name="Nombre_Ocio" value=<?php procesarOcio::getNombreOcio($id)?>></p>
					  <p>Localización:
					  <input type="text" name="Localizacion" value=<?php procesarOcio::getLocalizacionOcio($id)?>></p>
					  <p>Latitud:
					  <input type="text" name="Latitud" value=<?php procesarOcio::getLatitudOcio($id)?>></p>
					  <p>Longitud:
					  <input type="text" name="Longitud" value=<?php procesarOcio::getLongitudOcio($id)?>></p>
					  <p>Descripción:
					  <input type="text" name="Descripcion" value=<?php procesarOcio::getDescripcionOcio($id)?>></p>
					  <p>ID Residencia :
					  <input type="text" name="ID_Resi" value=<?php procesarResidencias::getIdResidencia($id)?>></p>
					  <p>Imagen:
					  <input type="text" name="Imagen" value=<?php procesarResidencias::getImagenResidencia($id)?>></p>
					  <p>Galeria:
					  <input type="text" name="Galeria" value=<?php procesarResidencias::getGaleriaResidencia($id)?>></p>
					  <p>Link:
					  <input type="text" name="Link" value=<?php procesarResidencias::getLinkResidencia($id)?>></p>
					  <div id="button-login" class="w3-margin-bottom w3-margin-top">
							<button class="w3-button w3-dark-blue">Modificar</button>
					  </div>
					  
				</form> 
			</div>
		</div>
	</div>

		<?php
		require('codesincss/includes/comun/sideBarDer.php');
		require('codesincss/includes/comun/pie.php');
		?>

	</div>
	</body>
</html>
