<?php session_start(); 
$id = $_GET['id'];
$nombre_discoteca = $_GET['nombre'];
$descripcion = $_GET['descripcion'];
$localizacion = $_GET['localizacion'];
$link = $_GET['link'];
$tipo = 3;
$latitud = $_GET['latitud'];
$longitud = $_GET['longitud'];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="CSS/w3cssgeneral.css">
 	<link rel="stylesheet" type="text/css" href="CSS/estilo-ocio.css">
 	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>MEET A MATE</title>
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
    	var latitud = '<?php echo $latitud;?>';
    	var longitud = '<?php echo $longitud;?>';
		var uluru = {lat: Number(latitud), lng: Number(longitud)};
       	var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 17,
        center: uluru
        });
        var marker = new google.maps.Marker({
        position: uluru,
        map: map
        });
        marker.addListener("click", function(){
        	window.location =String('<?php echo $link;?>');
        });

     	}
	</script>

</head>

<body class="color-fondo">
	<div class="w3-content w3-sand">

	<?php
		
		
		require("codesincss/includes/comun/cabecera.php");
		 
	?>

	<div class="w3-margin-left w3-margin-right w3-margin-bottom" id="contenedor-general">

		<div class = "w3-container w3-white w3-card w3-row-padding" id="sel-residencia">
			<h2 class='subt'><?php echo "$nombre_discoteca"; ?></h2>
			<p><?php echo $descripcion ?></p>
			<p><i class="fa fa-map-marker fa-fw w3-large w3-text-dark-blue"></i><?php echo $localizacion; ?></p>
			<p><i class="fa fa-link fa-fw w3-large w3-text-dark-blue"></i><?php echo $link; ?></p>
			<div id="map" class="w3-margin-bottom" style="width:100%;height:400px;"></div>
		</div>


		<div class = "w3-container w3-white w3-card w3-row-padding w3-margin-top" id="coment-general">
		<h4>Comentarios</h4>
		<?php
		require("codesincss/procesarComentarios.php");
		$lista = procesarComentarios::getComentarios("$id", 3);
		if (!empty(current($lista))) {
			for ($i=0; $i < count($lista); $i++) {
				$comentario = $lista[$i]['Comentario'];
			    $valoracion = $lista[$i]['Valoracion'];
		    	?>
		    	<div class="comentarios">
				    <p class="w3-margin-left">Valoracion: <?php echo $valoracion; ?> </p>
					<p class="w3-margin-left" ><?php echo $comentario; ?> </p>
				</div>
				<?php
			}
		}
		?>
	</div>

	<?php 
		include("codesincss/includes/comun/comentario.php");
		if (isset($_SESSION["esAdmin"]) and  $_SESSION['esAdmin']){
		?>
		<div class='botones-admin'>
			<?php
				echo " <p><a class = 'boton-admin' href = 'modificarDiscoteca.php?id=$id'>Modificar evento</a></p>";
				echo " <p><a class = 'boton-admin' href = 'codesincss/borrarEvento.php?id=$id&tipo=$tipo'>Eliminar evento</a></p>";
			?>
		</div>
		<?php
		}
		 
		include("codesincss/includes/comun/pie.php"); 
	?>

</div> <!-- Fin del contenedor -->

</body>
</html>