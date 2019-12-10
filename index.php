<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
	  	<meta charset="UTF-8">
	  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  	<script type="text/javascript" src="javascript/video.js" async="async"></script>
	  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="CSS/w3cssgeneral.css">
		<style>
		html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}
		</style>
	</head>

	<body class="color-fondo">
		<?php
			if (!isset($_SESSION["LogIn"]) && (!$_SESSION["LogIn"]===true)) {
		?>
		<video autoplay preload="none" muted loop id="video">
			<source src="img/video<?php echo rand(1,4);?>.mp4" type="video/mp4">
		</video>

		<div id="titulos">
			<div class="titulo_video1" id="titulo1">
			  	<h1>Conoce a nueva gente, vive con nuevos compañeros y comparte nuevas experiencias... </h1>
			</div>
			<div class="titulo_video2" id="titulo2">
			  	<p>Click en el video para continuar...</p>
			</div>
		</div>
		<?php
		}
		?>

		<div class="w3-content w3-sand">

		<?php 
			require("codesincss/includes/comun/cabecera.php"); 
		?>

		<div class = "w3-row-padding w3-margin-top" id="contenido">
			<div class="w3-center">
				<img id="logo-index" class="w3-circle" src="img/mam1.png" alt="Logo">
			</div>

			<div class="w3-center w3-margin-bottom" id="titulo"> 
				<h2> ¡Welcome to Meet a Mate! </h2>
				<div class="w3-margin-left" >
				<h4><i class= "fa fa-hand-o-down fa-fw w3-large w3-text-dark-blue"></i>¿Te aburres? Echa un vistazo a los planes que te ofrecemos hoy<i class= "fa fa-hand-o-down fa-fw w3-large w3-text-dark-blue"></i></h4>
				</div>
			</div>
			
			<?php 
			require("codesincss/procesarIndex.php"); 
			$eventos = new procesarIndex();
			$max = 5;
			$eventos->getIndex();
			$lista = $eventos->indexArray;
			shuffle($lista);
			if(count($lista)<5)
				$max = count($lista);
			if (!empty(current($lista))) {
				for ($i=0; $i < $max; $i++) {
					if($lista[$i] != null){
				    	$nombre = $lista[$i]['Nombre del evento'];
				    	$desc = $lista[$i]['Descripcion'];
					}
			    	?>

			    	<div class="w3-card w3-container w3-white w3-margin-top w3-margin-bottom" id="evento">
				    	<h3 class=""><?php echo $nombre; ?> </h3>
				    	<p><?php echo $desc; ?> </p>
			    	</div>
			<?php	
				}
			} else {
			?>
			    <p>No hemos encontrado resultados</p>

		<?php
			}
		?>
		</div> <!-- Fin del contenedor -->
	


		<?php 
			include("codesincss/includes/comun/pie.php"); 
		?>
	</div>
	</body>

</html>