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
	<title>MeetAMate: Creacion de evento</title>
</head>
<body class="color-fondo">
    <div class="w3-content w3-sand">

	<?php 
		require("codesincss/includes/comun/cabecera.php"); 
	?>

	<div id="contenedor-login"> 
		<div class="w3-row-padding" id="contenedor-perfil">
			<div class="w3-center w3-margin-top w3-container w3-margin-bottom w3-card w3-white">
				<form method="POST">
					  <p> Selecciona el tipo de evento que quieres crear: </p>
		               <select id="buscar" class ="w3-sand" name="Tipo_Evento">
			                <option value="1">Fiestas</option> 
			                <option value="2">Discotecas</option> 
			                <option value="3">Quedadas</option>
			                <option value="4">Pubs</option> 
			                <option value="5">Erasmus</option>  
		              </select>
		              <input type="hidden" name="selected_text" id="selected_text" value="" />
					  <input class="w3-dark-blue w3-margin-bottom" id="boton-buscar" type="submit" name="search" value="Seleccionar"/>
					  <p> Los campos marcados con * son obligatorios.</p>
				</form>
			</div>
			<div class="w3-container w3-margin-bottom w3-card w3-white">
				<form action="codesincss/procesarCrearEventos.php" method="POST" enctype="multipart/form-data"> 
		              <?php
		              if (isset($_POST['search'])) {
                		if ($_POST['Tipo_Evento'] == 1) {
		              		$tipo="fiesta";
		              ?>
		              	<p style='display:none' id="nombres-form">Tipo: 
		              	<input style='display:none' class="form-control" type="text" name="Tipo_Evento" value=<?php echo $tipo?>></p>
						<p>Nombre de la fiesta*:
						<input class="form-control" type="text" name="Nombre_Ocio"></p>
						<p>Localización*:
						<input class="form-control" type="text" name="Localizacion"></p>
						<p>Latitud:
						<input class="form-control" type="text" name="Latitud"></p>
						<p>Longitud:
						<input class="form-control" type="text" name="Longitud"></p>
						<p>Descripción:
						<input class="form-control" type="textarea" name="Descripcion"></p>
						<p>Imagen*:
						<input class="form-control" type="file" name="Imagen"></p>
						<p>Link:
						<input class="form-control" type="text" name="Link"></p>
						<p><i class="fa fa-calendar fa-fw w3-large w3-text-dark-blue w3-margin-bottom"></i> Fecha de inicio de la fiesta* <br/>
                		<input class ="w3-dark-blue" type="date" name="Fecha_Inicio" value=2000-01-01></p>
                		<p><i class="fa fa-calendar fa-fw w3-large w3-text-dark-blue w3-margin-bottom"></i> Fecha de fin de la fiesta <br/>
               			<input class ="w3-dark-blue" type="date" name="Fecha_Fin" value=2000-01-01></p>
               			<p>RRHH:
						<input class="form-control" type="text" name="RRHH"></p>
					  <?php
		          	  }
		          	  else if ($_POST['Tipo_Evento'] == 2) {
		          	  	$tipo="discoteca";
		          	  ?>
		              	<p style='display:none'>Tipo:
						<input style='display:none' class="form-control" type="text" name="Tipo_Evento" value=<?php echo $tipo?>>          	  
						<p>Nombre de la discoteca*:
						<input class="form-control" type="text" name="Nombre_Ocio"></p>
						<p>Localización*:
						<input class="form-control" type="text" name="Localizacion"></p>
						<p>Latitud:
						<input class="form-control" type="text" name="Latitud"></p>
						<p>Longitud:
						<input class="form-control" type="text" name="Longitud"></p>
						<p>Descripción:
						<input class="form-control" type="textarea" name="Descripcion"></p>
						<p>Imagen*:
						<input class="form-control" type="file" name="Imagen"></p>
						<p>Link:
						<input class="form-control" type="text" name="Link"></p>
					  <?php
					  }
					  else if ($_POST['Tipo_Evento'] == 3) {
					  	$tipo="quedada";
					  ?>
		              	<p style='display:none'>Tipo:
						<input style='display:none' class="form-control" type="text" name="Tipo_Evento" value=<?php echo $tipo?>>				  
						<p>Nombre de la quedada*:
						<input class="form-control" type="text" name="Nombre_Ocio"></p>
						<p>Localización*:
						<input class="form-control" type="text" name="Localizacion"></p>
						<p>Latitud:
						<input class="form-control" type="text" name="Latitud"></p>
						<p>Longitud:
						<input class="form-control" type="text" name="Longitud"></p>
						<p>Descripción:
						<input class="form-control" type="textarea" name="Descripcion"></p>
						<p><i class="fa fa-calendar fa-fw w3-large w3-text-dark-blue w3-margin-bottom"></i> Fecha de inicio de la quedada* <br/>
                		<input class ="w3-dark-blue" type="date" name="Fecha_Inicio" value=2000-01-01></p>
                		<p><i class="fa fa-calendar fa-fw w3-large w3-text-dark-blue w3-margin-bottom"></i> Fecha de fin de la quedada <br/>
               			<input class ="w3-dark-blue" type="date" name="Fecha_Fin" value=2000-01-01></p>
               			<p>Organizador*:
						<input class="form-control" type="text" name="Organizador"></p>
               		  <?php
					  }
					  else if ($_POST['Tipo_Evento'] == 4) {
					  	$tipo="pub";
					  ?>
		              	<p style='display:none'>Tipo:
						<input style='display:none' class="form-control" type="text" name="Tipo_Evento" value=<?php echo $tipo?>>					  
						<p>Nombre del pub*:
						<input class="form-control" type="text" name="Nombre_Ocio"></p>
						<p>Localización*:
						<input class="form-control" type="text" name="Localizacion"></p>
						<p>Latitud:
						<input class="form-control" type="text" name="Latitud"></p>
						<p>Longitud:
						<input class="form-control" type="text" name="Longitud"></p>
						<p>Descripción:
						<input class="form-control" type="textarea" name="Descripcion"></p>
						<p>Imagen*:
						<input class="form-control" type="file" name="Imagen"></p>
						<p>Link:
						<input class="form-control" type="text" name="Link"></p>
					  <?php
					  }
					  else if($_POST['Tipo_Evento'] == 5){
					  	$tipo="quedadaE";
					  ?>
		              	<p style='display:none'>Tipo:
						<input style='display:none' class="form-control" type="text" name="Tipo_Evento" value=<?php echo $tipo?>>					  
						<p>Nombre de la quedada de erasmus*:
						<input class="form-control" type="text" name="Nombre_Ocio"></p>
						<p>Localización*:
						<input class="form-control" type="text" name="Localizacion"></p>
						<p>Latitud:
						<input class="form-control" type="text" name="Latitud"></p>
						<p>Longitud:
						<input class="form-control" type="text" name="Longitud"></p>
						<p>Descripción:
						<input class="form-control" type="textarea" name="Descripcion"></p>
						<p><i class="fa fa-calendar fa-fw w3-large w3-text-dark-blue w3-margin-bottom"></i> Fecha de inicio de la quedada* <br/>
                		<input class ="w3-dark-blue" type="date" name="Fecha_Inicio" value=2000-01-01></p>
                		<p><i class="fa fa-calendar fa-fw w3-large w3-text-dark-blue w3-margin-bottom"></i> Fecha de fin de la quedada <br/>
               			<input class ="w3-dark-blue" type="date" name="Fecha_Fin" value=2000-01-01></p>
               			<p>Organizador*:
						<input class="form-control" type="text" name="Organizador"></p>
               			<p>Idioma:
						<input class="form-control" type="text" name="Idioma"></p>
               		  <?php
					  }
					}
					?>
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
