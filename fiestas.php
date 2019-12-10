<?php session_start(); 
require("codesincss/procesarFiestas.php");
$lista_fiestas = procesarFiestas::getFiestas();
$size=count($lista_fiestas);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="CSS/w3cssgeneral.css">
 	<link rel="stylesheet" type="text/css" href="CSS/estilo-ocio.css">
 	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>MeetAMate: Fiestas</title>
	<style>
       #map {
        height: 400px;
        width: 100%;
       }
    </style>
	 <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAaDg9BSfwSJ_wTvDH0KytRiqDbn2rFnng&callback=initMap">
    </script>
    <script>
      	function initMap() {
      		var tam = Number(<?php echo $size;?>);
      		var uluru ={lat: 40.4378698, lng: -3.8196221};
        	var map = new google.maps.Map(document.getElementById('map'), {
    	     	zoom: 10,
	          	center: uluru
        	});
   			var coordenadas = <?php echo json_encode($lista_fiestas);?>;

        	for(var i=0; i < tam; i++){
        		var myLatLng = new google.maps.LatLng(coordenadas[i]['Latitud'], coordenadas[i]['Longitud']);
				var marker = new google.maps.Marker({
				position: myLatLng,
				map: map,
				});
				var direccion = "sel_fiesta.php?nombre="+String(coordenadas[i]['Nombre_Ocio'])+"&descripcion="  + String(coordenadas[i]['Descripcion'])+"&localizacion=" +String(coordenadas[i]['Localizacion'])+"&link="  +String(coordenadas[i]['Link'])+ "&id="  +String(coordenadas[i]['ID_Ocio']) +"&latitud="  +String(coordenadas[i]['Latitud'])+"&longitud=" +String(coordenadas[i]['Longitud'])+"&fecha="+String(coordenadas[i]['Fecha_Inicio']);
				marker.addListener("click", function(){
        		window.location =direccion;
        		});

      			}
      		}
    			</script>
</head>

<body class="color-fondo">
	<div class="w3-content w3-sand">
	<?php 
		require("codesincss/includes/comun/cabecera.php"); 
	?>
	<div class="w3-row-padding w3-margin-top" id='contenedor-sel-general'>
		<h2>Fiestas</h2>
		<div class="buscador">
		<form name="buscador" method="post" action="buscadorFiestas.php"> 
			<input id="buscar" name="buscar" type="search" placeholder="Por ejemplo 'gente'" autofocus >
			<input id="boton-buscar" class="w3-dark-blue" type="submit" name="buscador" value="Buscar">
		</form>
		<?php
			if (isset($_SESSION["esAdmin"]) and  $_SESSION['esAdmin']){
				echo " <p><a class='evento' href = 'crearEventos.php'>Crear evento</a></p>";
			}
		?>
		</div>
		<h4>¡Las mejores fiestas de Madrid!</h4>
		<div id="map" class="w3-margin-bottom" style="width:100%;height:400px;"></div>

		<?php 
			
			
				
			if (!empty(current($lista_fiestas))){
				for ($i = 0; $i < count($lista_fiestas); $i++){
					$id = $lista_fiestas[$i]['ID_Fiesta'];
					$ImagenPerfil = $lista_fiestas[$i]['Imagen_Perfil'];
					$nombre_fiesta = $lista_fiestas[$i]['Nombre_Ocio'];
					$descripcion = $lista_fiestas[$i]['Descripcion'];
					$localizacion = $lista_fiestas[$i]['Localizacion'];
					$fecha_inicio = $lista_fiestas[$i]['Fecha_Inicio'];
					$link = $lista_fiestas[$i]['Link'];
					$latitud=$lista_fiestas[$i]['Latitud'];
					$longitud=$lista_fiestas[$i]['Longitud'];

					?>
						<div class='w3-card w3-container w3-margin-bottom w3-white w3-margin-top'>
						<h3><?php echo $nombre_fiesta ?></h3>
						<?php echo "<img style='display: block; margin-left: auto; margin-right: auto;' src='img_ocio/" . $ImagenPerfil . "'>";?>
					       <p><?php echo $descripcion ?></p>
					       <p><i class="fa fa-map-marker fa-fw w3-large w3-text-dark-blue"></i><?php echo $localizacion ?></p>
					       <p><i class="fa fa-calendar fa-fw w3-large w3-text-dark-blue"></i><?php echo $fecha_inicio ?></p>
					       <p><i class="fa fa-link fa-fw w3-large w3-text-dark-blue"></i><?php echo $link ?></p>

					       <?php
					       echo "<p><a id='detalles-general' href='sel_fiesta.php?id=$id&nombre=$nombre_fiesta&descripcion=$descripcion&localizacion=$localizacion&fecha=$fecha_inicio&link=$link&latitud=$latitud&longitud=$longitud'>Ver detalles</a></p>"
					       ?>
					    </div>
					<?php
				}
			}
			else{
				echo "<div class='alto'><p>No hemos encontrado resultados</p></div>";
			}
		?>
	</div>
	
	<?php 
		include("codesincss/includes/comun/pie.php"); 
	?>
	</div>
</body>
</html>