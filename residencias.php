<?php session_start();
	require("codesincss/procesarResidencias.php");
	$listaResidencias = procesarResidencias::getResidencias();
	$size=count($listaResidencias);
	

?>
<!DOCTYPE html>
<html>
	<head>
  	<meta charset="UTF-8">
  	<link rel="stylesheet" href="CSS/w3cssgeneral.css">
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
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
   			var coordenadas = <?php echo json_encode($listaResidencias);?>;

        	for(var i=0; i < tam; i++){
        		var myLatLng = new google.maps.LatLng(coordenadas[i]['Latitud'], coordenadas[i]['Longitud']);
				var marker = new google.maps.Marker({
				position: myLatLng,
				map: map,
				});
				var direccion = "sel_residencia.php?nombre="+String(coordenadas[i]['Nombre_Ocio'])+"&descripcion="  + String(coordenadas[i]['Descripcion'])+"&localizacion=" +String(coordenadas[i]['Localizacion'])+"&imagen="  +String(coordenadas[i]['Imagen_Perfil'])+"&link="  +String(coordenadas[i]['Link'])+ "&id="  +String(coordenadas[i]['ID_Resi']) +"&latitud="  +String(coordenadas[i]['Latitud'])+"&longitud=" +String(coordenadas[i]['Longitud']);
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

			<div class = "w3-row-padding w3-margin-top" id="contenedor-sel-general">
				<h2>Residencias</h2>
				<div class="buscador">
				<?php
					if (isset($_SESSION["esAdmin"]) and  $_SESSION['esAdmin']){
						echo " <p><a id = 'detalles-general' href = 'crearResidencia.php'>Crear Residencia</a></p>";
					}
				?>
				</div>
				<h4> Las mejores residencias de Madrid </h4>

				<div id="map"></div>
				<?php
				
					if(!empty(current($listaResidencias))){
						for($i=0; $i<count($listaResidencias); $i++){
							$id = $listaResidencias[$i]['ID_Resi'];
							$NombreResidencia=$listaResidencias[$i]['Nombre_Ocio'];
							$Localizacion=$listaResidencias[$i]['Localizacion'];
							$ImagenPerfil=$listaResidencias[$i]['Imagen_Perfil'];
							$Link=$listaResidencias[$i]['Link'];
							$Descripcion=$listaResidencias[$i]['Descripcion'];
							$latitud=$listaResidencias[$i]['Latitud'];
							$longitud=$listaResidencias[$i]['Longitud'];
				?>
							<div class="w3-card w3-container w3-white w3-margin-top w3-margin-bottom">
							<h3><?php echo $NombreResidencia; ?> </h3>
							<?php echo "<img style='display: block; margin-left: auto; margin-right: auto;' src='img_ocio/" . $ImagenPerfil . ".jpg'>";?>
							<p><?php echo "<p>$Descripcion</p>"; ?></p>
							<p> <?php echo "<a id='detalles-general' href='sel_residencia.php?nombre=$NombreResidencia&descripcion=$Descripcion&localizacion=$Localizacion&imagen=$ImagenPerfil&link=$Link&id=$id&latitud=$latitud&longitud=$longitud'>
								Ver Detalles  </a>"; ?></p>
							</div>

				<?php	
					}
				} else {
				?>
					 <p>No se han encontrado residencias registradas en este momento</p>
				
				<?php
				}

				?>
				</div>
			
			<?php 
				include("codesincss/includes/comun/pie.php"); 
			?>
			</div>
		</div> 
	</body>
</html>
				



