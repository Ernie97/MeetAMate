<?php session_start(); 
require("codesincss/procesarQuedadas.php");
$lista = procesarQuedadas::getQuedadas();
$size=count($lista);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="CSS/w3cssgeneral.css">
	<link rel="stylesheet" type="text/css" href="CSS/estilo-ocio.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>MeetAMate: Quedadas</title>
	<style>
       #map {
        height: 400px;
        width: 100%;
       }
    </style>
    <script async defer
    	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAaDg9BSfwSJ_wTvDH0KytRiqDbn2rFnng&callback=initMap">
    </script>
    <script>
      	function initMap() {
      		var tam = Number(<?php echo $size;?>);
      		var uluru ={lat: 40.4378698, lng: -3.8196221};
        	var map = new google.maps.Map(document.getElementById('map'), {
    	     	zoom: 10,
	          	center: uluru
        	});
   			var coordenadas = <?php echo json_encode($lista);?>;

        	for(var i=0; i < tam; i++){
        		var myLatLng = new google.maps.LatLng(coordenadas[i]['Latitud'], coordenadas[i]['Longitud']);
				var marker = new google.maps.Marker({
				position: myLatLng,
				map: map,
				});
				var direccion = "sel_quedada.php?nombre="+String(coordenadas[i]['Nombre_Ocio'])+"&desc="  + String(coordenadas[i]['Descripcion'])+"&local=" +String(coordenadas[i]['Localizacion'])+"&link="  +String(coordenadas[i]['Link'])+ "&id="  +String(coordenadas[i]['ID_Quedada']) +"&latitud="  +String(coordenadas[i]['Latitud'])+"&longitud=" +String(coordenadas[i]['Longitud'])+"&fini="+String(coordenadas[i]['Fecha_Inicio'])+"&org="+String(coordenadas[i]['Organizador']);
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
	
	<div class="w3-row-padding w3-margin-top" id='contenedor-general'>
		<h1>Quedadas</h1>
		<div class="buscador">
			<form id="buscador" name="buscador" method="post" action="buscadorQuedadas.php"> 
				<input id="buscar" name="buscar" type="search" placeholder="Por ejemplo 'futbol'" autofocus >
				<input id="boton-buscar" class="w3-dark-blue" type="submit" name="buscador" value="Buscar">
			</form>
		<?php
			if (isset($_SESSION["esAdmin"]) and  $_SESSION['esAdmin']){
				echo " <p><a id = 'detalles-general' href = 'crearEventos.php'>Crear evento</a></p>";
			}
		?>
		</div>
		<h4>¿Quieres conocer gente nueva? ¡Únete a una de nuestras quedadas!</h4>
		<div id="map" class="w3-margin-bottom" style="width:100%;height:400px;"></div>
		<?php 
			
			
			if (!empty(current($lista))) {
				for ($i=0; $i < count($lista); $i++) {
					$id = $lista[$i]['ID_Quedada'];
				    $nombre = $lista[$i]['Nombre_Ocio'];
				    $desc = $lista[$i]['Descripcion'];
				    $local = $lista[$i]['Localizacion'];
				    $fini = $lista[$i]['Fecha_Inicio'];
				    $org = $lista[$i]['Organizador'];
				    $latitud = $lista[$i]['Latitud'];
				    $longitud = $lista[$i]['Longitud'];
					?>

					<div class='w3-card w3-container w3-margin-bottom w3-white w3-margin-top'>
						<h3><?php echo $nombre ?></h3>
					       <p><?php echo $desc ?></p>
					       <p><i class="fa fa-map-marker fa-fw w3-large w3-text-dark-blue"></i><?php echo $local ?></p>
					       <p><i class="fa fa-calendar fa-fw w3-large w3-text-dark-blue"></i><?php echo $fini ?></p>
					       <p><i class="fa fa-link fa-fw w3-large w3-text-dark-blue"></i><?php echo $org ?></p>
					       <?php
					       echo "<p><a id='detalles-general' href='sel_quedada.php?nombre=$nombre&desc=$desc&local=$local&fini=$fini&org=$org&id=$id&latitud=$latitud&longitud=$longitud'>Ver detalles</a></p>";
					       ?>
					</div>
					<?php
				}
			} else {
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