<?php session_start(); 
require("codesincss/procesarDiscos.php");
$lista_discotecas = procesarDiscos::getDiscos();
$size=count($lista_discotecas);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="CSS/w3cssgeneral.css">
 	<link rel="stylesheet" type="text/css" href="CSS/estilo-ocio.css">
 	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>MeetAMate: Discotecas</title>
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
   			var coordenadas = <?php echo json_encode($lista_discotecas);?>;

        	for(var i=0; i < tam; i++){
        		var myLatLng = new google.maps.LatLng(coordenadas[i]['Latitud'], coordenadas[i]['Longitud']);
				var marker = new google.maps.Marker({
				position: myLatLng,
				map: map,
				});
				var direccion = "sel_discoteca.php?nombre="+String(coordenadas[i]['Nombre_Ocio'])+"&descripcion="  + String(coordenadas[i]['Descripcion'])+"&localizacion=" +String(coordenadas[i]['Localizacion'])+"&link="  +String(coordenadas[i]['Link'])+ "&id="  +String(coordenadas[i]['ID_Ocio']) +"&latitud="  +String(coordenadas[i]['Latitud'])+"&longitud=" +String(coordenadas[i]['Longitud']);
				marker.addListener("click", function(){
        		window.location =direccion;
        		});

      			}
      		}
    			</script>

<body class="color-fondo">
	<div class="w3-content w3-sand">
	
	<?php 
		require("codesincss/includes/comun/cabecera.php"); 
	?>

	<div class="w3-row-padding w3-margin-top" id='contenedor-general'>
		<h1>Discotecas</h1>
		<div class="buscador">
			<form name="buscador" method="post" action="buscadorDiscotecas.php"> 
				<input id="buscar" name="buscar" type="search" placeholder="Por ejemplo 'pop'" autofocus >
				<input id="boton-buscar" class="w3-dark-blue" type="submit" name="buscador" value="Buscar">
			</form>
			<?php
			if (isset($_SESSION["esAdmin"]) and  $_SESSION['esAdmin']){
				echo " <p><a id = 'detalles-general' href = 'crearEventos.php'>Crear evento</a></p>";
			}
			?>
		</div>
		<h4>Discotecas a tu gusto</h4>
		<div id="map" class="w3-margin-bottom" style="width:100%;height:400px;"></div>
		<?php 
			
				
			if (!empty(current($lista_discotecas))){
				for ($i = 0; $i < count($lista_discotecas); $i++){
					$id = $lista_discotecas[$i]['ID_Disco'];
					$nombre_discoteca = $lista_discotecas[$i]['Nombre_Ocio'];
					$descripcion = $lista_discotecas[$i]['Descripcion'];
					$localizacion = $lista_discotecas[$i]['Localizacion'];
					$link = $lista_discotecas[$i]['Link'];

					?>

					<div class='w3-card w3-container w3-margin-bottom w3-white w3-margin-top'>
						<h3><?php echo $nombre_discoteca ?></h3>
					       <p><?php echo $descripcion ?></p>
					       <p><i class="fa fa-map-marker fa-fw w3-large w3-text-dark-blue"></i><?php echo $localizacion ?></p>
					       <p><i class="fa fa-link fa-fw w3-large w3-text-dark-blue"></i><?php echo $link ?></p>
					       <?php
					   		echo "<p><a id='detalles-general' href='sel_discoteca.php?id=$id&nombre=$nombre_discoteca&descripcion=$descripcion&localizacion=$localizacion&link=$link&latitud=$latitud&longitud=$longitud'>Ver detalles</a></p>";
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