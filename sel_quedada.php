<?php session_start(); 
$nombre = $_GET['nombre'];
$desc = $_GET['desc'];
$local = $_GET['local'];
$fini = $_GET['fini'];
$org = $_GET['org'];
$id = $_GET['id'];
if(isset($_SESSION["idUser"]))
	$rn = $_SESSION["idUser"];
$tipo = 0;
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
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 	<script type="text/javascript" src="javascript/apuntarse.js" async="async"></script>
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
     	}


	</script>

</head>

<body class="color-fondo">
	<div class="w3-content w3-sand">

	<?php 
		require("codesincss/includes/comun/cabecera.php"); 
		require("codesincss/procesarParticipantes.php");
			
		
	?>

	<div class="w3-row-padding w3-margin-top" id="contenedor-general">
			<div class="w3-card w3-container w3-white" id="sel-residencia">
				<h2 class='subt'><?php echo $nombre ?></h2>
				<p><?php echo $desc ?></p>
				<p><i class="fa fa-map-marker fa-fw w3-large w3-text-dark-blue"></i><?php echo $local; ?></p>
			 	<p><i class="fa fa-calendar fa-fw w3-large w3-text-dark-blue"></i><?php echo $fini; ?></p>
				<p><i class="fa fa-link fa-fw w3-large w3-text-dark-blue"></i><?php echo $org; ?></p>

				<div class ="w3-margin-bottom">

					<?php
					if (isset($_SESSION["LogIn"]) && ($_SESSION["LogIn"]===true)) {
					?>
	
				<button type="submit" id="apuntarse" class='w3-button w3-dark-blue' onclick="apuntarse(<?php echo $id; ?>,<?php echo $rn; ?>)">Apuntarse</button> 

  			   <button type="submit" id="desapuntarse" class='w3-button w3-dark-blue' onclick="desapuntarse(<?php echo $id; ?>,<?php echo $rn; ?>)">Desapuntarse</button> 
					
				<p><a href="participantes.php?id=<?php echo $id;?>" target="_blank" onClick="window.open(this.href, this.target, 'width=300,height=400'); return false;"> <i class="fa fa-users fa-fw w3-large w3-text-dark-blue" ></i>Participantes</a></p>
				<?php
						}
					?>
				</div>

				<div id="map" class="w3-margin-bottom" style="width:100%;height:400px;"></div>
			</div>

		<div class = "w3-container w3-white w3-card w3-row-padding w3-margin-top" id="coment-residencia">
			<h4>Comentarios</h4>
				<?php
				require("codesincss/procesarComentarios.php");
				$lista = procesarComentarios::getComentarios("$id", 0);
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
				echo "<p><a class = 'boton-admin' href = 'modificarQuedada.php?id=$id'>Modificar Quedada</a></p>";
				echo "<p><a class='boton-admin' href = 'codesincss/borrarEvento.php?id=$id&tipo=$tipo'>Eliminar Quedada</a></p>";
			?>
		</div>

		<?php
		}
		 
		include("codesincss/includes/comun/pie.php"); 
		?>
	</div>

</body>
</html>