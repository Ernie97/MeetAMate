<?php 
session_start();
include("codesincss/procesarPeticion.php");


$peticiones = new procesarPeticion();
$peticiones->getPeticiones($_SESSION['idUser']);
$id=$_SESSION['idUser'];
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="CSS/w3cssgeneral.css">
		<style>
		html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}
		</style>
		<title>MEET A Mate</title>
	</head>

	<body class="color-fondo">
	<div class="w3-content w3-sand">
		<?php
		require("codesincss/includes/comun/cabecera.php");
		 
	?>
		<div class = "w3-row-padding w3-margin-top" id="contenedor-sel-general">
			<div class="w3-card w3-container w3-white w3-margin-bottom">
				<h1>Peticiones enviadas</h1>
				<?php 
					if($peticiones->petEnviadasArraySize==0){
						?><p>No has enviado ninguna peticion</p>
					
					<?php
					}
					else{
					for($i=0; $i<$peticiones->petEnviadasArraySize; $i++){
						$id2=$peticiones->petEnviadasArray[$i]['Usuario2'];?>
						<div class="peticiones">
							<div class="w3-margin">
						<p><?php echo $peticiones->getName($id2);?> </p>
						<?php
						
						if($peticiones->petEnviadasArray[$i]['1PuedeVer2']==0) {
						 echo  "<a  id='cancelar-peticiones' href='codesincss/insertar_peticion.php?id1=$id&id2=$id2&tipo=3'>Cancelar petición</a>";
						}
						else {
							echo  "<a  id='detalles-peticiones' href='sel_compañero.php?id=$id2'>Ver detalles</a>";
							echo  "<a  id='cancelar-peticiones' href='codesincss/insertar_peticion.php?id1=$id&id2=$id2&tipo=3'>Cancelar petición</a>";
						}
						?>
					</div>
					</div>
					<?php

					}
						?>
					
					<?php
					
				}

				?>
			</div>
			<div class="w3-card w3-container w3-white w3-margin-top w3-margin-bottom">
				<h1>Peticiones recibidas</h1>
				<?php 
					if($peticiones->petRecibidasArraySize==0){
						?><p>No te han enviado ninguna petición</p>
					
					<?php
					}
					else{
					for($i=0; $i<$peticiones->petRecibidasArraySize; $i++){
						$id2=$peticiones->petRecibidas[$i]['Usuario2'];
						$id1=$peticiones->petRecibidas[$i]['Usuario1'];?>

						<div class="peticiones">
							<div class="w3-margin">
						<p><?php echo $peticiones->getName($id1);?> </p>
						<?php
						
						if($peticiones->petRecibidas[$i]['1PuedeVer2']==0){
						echo  "<a  id='cancelar-peticiones' href='codesincss/insertar_Peticion.php?id1=$id1&id2=$id2&tipo=4'>Rechazar petición</a>";
						echo "<a id='aceptar-peticiones' href='codesincss/insertar_Peticion.php?id1=$id1&id2=$id2&tipo=2'>Aceptar petición</a>";

					}
					else
						echo  "<a  id='detalles-peticiones' href='sel_compañero.php?id=$id1'>Ver detalles</a>";

						?>
						</div>
						</div>
						<?php
					}
				}


				?>
				</div>
				
				<div class="w3-card w3-container w3-white w3-margin-top w3-margin-bottom">
					<h1>Peticiones rechazadas</h1>
				<?php 
					if($peticiones->petRechazadasArraySize==0){
						?><p>No hay peticiones rechazadas</p>
					
					<?php
				}
					else{
					for($i=0; $i<$peticiones->petRechazadasArraySize; $i++){
						$id2=$peticiones->petRechazadas[$i]['Usuario2'];
						$id1=$peticiones->petRechazadas[$i]['Usuario1'];?>
						<p><?php echo $peticiones->getName($id2);?> Ha rechazado tu petición</p>
						<?php
						
						
						echo  "<a href='codesincss/insertar_Peticion.php?id1=$id1&id2=$id2&tipo=3'>OK</a>";
						
					}
				}

				?>
				</div>
	</div>

	<?php
	 
	include("codesincss/includes/comun/pie.php");
	?>
	</div>
	</body>
</html>