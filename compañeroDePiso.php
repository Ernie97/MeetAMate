<?php 
session_start();
include("codesincss/procesarCompanieros.php");
include("codesincss/procesarPeticion.php");

$procesar=new procesarPeticion();
?>
<!DOCTYPE html>
<html>
	<head>
	  	<meta charset="UTF-8">
		<link rel="stylesheet" href="CSS/w3cssgeneral.css">
		<link rel="stylesheet" href="CSS/estilo-compañeropiso.css">
		<style>
		html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}
		</style>
	</head>

	<body class="color-fondo">
		<div class="w3-content w3-sand">
		<?php
			require("codesincss/includes/comun/cabecera.php");
		?>
		
			<div id="contenedor-compañero">
				<?php
			
				if(isset($_SESSION['LogIn']) && $_SESSION['testCompletado']){
					$compis = new procesarCompanieros();
					$compis->procesar();
					if($compis->tam==0)
						echo "<h4 class='w3-center w3-margin-top'>No se han encontrado compañeros para ti. Más suerte la próxima vez.</h4>";
					else{
						$mostrado=0;

						for($i=0; $i<$compis->tam && $i<6; $i++){
							$compatibilidad=$compis->arrayElegidos[$i]['Compatibilidad'];
							$nick=$compis->arrayElegidos[$i]['Nick_Name'];
							$id2=$compis->arrayElegidos[$i]['ID_Usuario'];
							$id1= $_SESSION['idUser'];
							$peticionYaEnviada=$procesar->existePeticion($id1, $id2);

							if($peticionYaEnviada==1||$peticionYaEnviada==2){
							?>
							<div class="w3-margin w3-card w3-white">
								<div class="w3-margin">
							 
								<h2 class="w3-text-grey"><?php echo "$nick";?></h2>
								<div id="info_usuario">
									<p id="compatibilidad" class="w3-dark-blue"><?php echo "Compatibilidad: $compatibilidad ";?>% </p>

									<?php
									if($peticionYaEnviada==1){	
														
			                        echo "<a id='detalles' class='w3-dark-blue' href='codesincss/insertar_peticion.php?id1=$id1&id2=$id2&tipo=1'> Enviar petición</a>"; 

			                        $mostrado=1;
			                    	}
			                    	else{ 
			                    		?>
			                    		<p class="w3-text-grey">Este usuario te ha enviado una petición</p>
			                    		<?php 

			                    		echo "<a id='cancelar-peticiones' href='codesincss/insertar_Peticion.php?id1=$id1&id2=$id2&tipo=4'>Rechazar petición</a>";
			                    		echo "<a id='aceptar-peticiones' href='codesincss/insertar_Peticion.php?id1=$id1&id2=$id2&tipo=2'>Aceptar peticion</a>";
			                    		$mostrado=1;

			                    	}

			                    	?>
			                    </div>
								</div>
			               	</div>
			                    <?php
			                    }

			                    ?>

			                    <?php
			                }

			            ?>
			            
			               
			            <?php

						if($mostrado==0){ 
							echo "<h4 class='w3-center w3-margin-top'>No disponemos de más compañeros para mostrarte. Espera a que tus solicitudes sean aprobadas.</h4>";
												
						}
					} 
					?>
					 	</div>
					 <?php
					}

				
				else{

					if(isset($_SESSION['LogIn'])) {
					?>

					<h4 class='w3-center w3-margin-top'>Para acceder a esta sección es obligatorio hacer el test primero.</h4>
					
					<h5 class='w3-center w3-margin-top'><a class="w3-button w3-text-white w3-dark-blue w3-hover-dark-blue" href=test.php> Hacer el test ahora</a></h5>


					<?php
					}
					else{
						echo "<h4 class='w3-center w3-margin-top'>Para acceder a esta sección es tienes que iniciar sesion.</h4>";
					}
				}?>
			</div>

		<?php
		include("codesincss/includes/comun/pie.php");
		?>

		</div>
	</div>
</body>


</html>
