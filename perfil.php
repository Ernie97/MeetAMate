<?php session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="CSS/w3cssgeneral.css">
		<link rel="stylesheet" href="CSS/estilo-login.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		
	<meta charset="utf-8">
	<title>MEET A MATE</title>
</head>

<body class="color-fondo">
<div class="w3-content w3-sand">

	<?php 
		require("codesincss/includes/comun/cabecera.php"); 
		 
	?>

	<div id="contenedor-login"> 
		<div class="w3-row-padding" id="contenedor-perfil">
			
				<?php
					if (!isset($_SESSION["LogIn"])) {  //Usuario incorrecto
						echo "<h1>Usuario no registrado!</h1>";
						echo "<p>Debes iniciar sesión para ver el contenido.</p>";
			        }
			else { 

				?>

				
				<h2 class = "w3-center"> ¡Bienvenido, <?php echo $_SESSION["username"]; ?>! </h2>

				<div class="w3-container w3-margin-bottom w3-card w3-white">
				
					<div class="w3-container">
						<h4 class = "w3-center">Información personal del usuario</h4>
						<p><?php echo "<img style='display: block; margin-left: auto; margin-right: auto;' src='img_usuario/" . $_SESSION["imagenPerfil"] . "'>";?></p>
						<p><i class="fa fa-user fa-fw w3-large w3-text-dark-blue"></i>Nombre: <?php echo $_SESSION["nombre"];?></p>
						<p><i class="fa fa-address-card fa-fw w3-large w3-text-dark-blue"></i>Primer Apellido: <?php echo $_SESSION["primerApellido"];?></p>
						<p><i class="fa fa-address-card fa-fw w3-large w3-text-dark-blue"></i>Segundo Apellido: <?php echo $_SESSION["segundoApellido"];?></p>
						<p><i class="fa fa-calendar fa-fw w3-large w3-text-dark-blue"></i>Fecha Nacimiento: <?php echo $_SESSION["fechaNacimiento"];?></p>
						<p><i class="fa fa-envelope-square fa-fw w3-large w3-text-dark-blue"></i>Correo: <?php echo $_SESSION["email"];?></p>
						<p><i class="fa fa-phone fa-fw w3-large w3-text-dark-blue"></i>Teléfono: <?php echo $_SESSION["telefono"];?></p>
						<p><i class="fa fa-wrench fa-fw w3-large w3-text-dark-blue"></i>Admin:
				
						<?php 
							if(!isset($_SESSION["esAdmin"])){
								echo "No eres administrador";
							}
							else echo "Eres administrador";
						?></p>

						<?php

							if($_SESSION["testCompletado"] == FALSE) {
								echo "<h5>¿Sabes que aún puedes encontrar tu compañero de piso ideal si realizas nuestro sencillo test?</h5>";
								?>
								<h5 class='w3-center w3-margin-top'><a class="w3-button w3-text-white w3-dark-blue w3-hover-dark-blue" href=test.php>Hacer el test ahora</a></h5>
								<?php
							}
							else {
								echo "<h5>¡Es genial que hayas realizado nuestro test! Sigue <a href='compañeroDePiso.php'>este enlace</a> para encontrar a tu compañero ideal, o</h5>";
								?>
								<h5 class='w3-center w3-margin-top'><a class="w3-button w3-text-white w3-dark-blue w3-hover-dark-blue" href=testRepe.php>Volver a hacer el test</a></h5>
								<?php
							}
						?>		
				
					</div>
				</div>
		<?php
			
			}
		?>

		<?php

		    require("codesincss/procesarUsuarios.php");
		    $usuario = new procesarUsuarios();
			$usuario->getEventos($_SESSION['idUser']);
			$id=$_SESSION['idUser'];

		?>

			<div class="w3-container w3-margin-bottom w3-card w3-white">
				
				<div class="w3-container">
				<h3>Eventos a los que asistirás</h3>
				<?php 
				 
					if($usuario->fiestasProxSize==0 && $usuario->quedadasProxSize==0){
						?><p>No estás apuntado a ningun evento próximo.</p>
					
					<?php
					}
					else{
					for($i=0; $i<$usuario->fiestasProxSize; $i++){
						?>
						<div class="peticiones">
							<div class="w3-margin">
								<?php 
								    
									$fiestasProx = $usuario->fiestasProx;
										
									if (!empty(current($fiestasProx))){
										for ($i = 0; $i < count($fiestasProx); $i++){
											$id_ocio = $fiestasProx[$i]['ID_Fiesta'];
											$nombre_fiesta = $fiestasProx[$i]['Nombre_Ocio'];
											$descripcion = $fiestasProx[$i]['Descripcion'];
											$localizacion = $fiestasProx[$i]['Localizacion'];
											$fecha_inicio = $fiestasProx[$i]['Fecha_Inicio'];
											$link = $fiestasProx[$i]['Link'];

											echo "<p><a href='sel_fiesta.php?id=$id&nombre=$nombre_fiesta&descripcion=$descripcion&localizacion=$localizacion&fecha=$fecha_inicio&link=$link'>".$fiestasProx[$i]['Nombre_Ocio']." ".$fiestasProx[$i]['Fecha_Inicio']."</a></p>";
						
						
                            				echo  "<a id='cancelar-peticiones' href='apuntarseEvento.php?id_usuario=$id&id_evento=$id_ocio&tipo=1'>Desapuntarse</a>";
										}
									}
								?>

							</div>
						</div>
					<?php

									}

					for($i=0; $i<$usuario->quedadasProxSize; $i++){
						?>
						<div class="peticiones">
							<div class="w3-margin">
								<?php 

									$quedadasProx = $usuario->quedadasProx;

									if (!empty(current($quedadasProx))) {
										for ($i=0; $i < count($quedadasProx); $i++) {
											$id_ocio = $quedadasProx[$i]['ID_Quedada'];
										    $nombre = $quedadasProx[$i]['Nombre_Ocio'];
										    $desc = $quedadasProx[$i]['Descripcion'];
										    $local = $quedadasProx[$i]['Localizacion'];
										    $fini = $quedadasProx[$i]['Fecha_Inicio'];
										    $org = $quedadasProx[$i]['Organizador'];

										    echo "<p><a href='sel_quedada.php?nombre=$nombre&desc=$desc&local=$local&fini=$fini&org=$org&id=$id_ocio'>".$quedadasProx[$i]['Nombre_Ocio']." ".$quedadasProx[$i]['Fecha_Inicio']."</a></p>";

										    echo  "<a id='cancelar-peticiones' href='apuntarseEvento.php?id_usuario=$id&id_evento=$id_ocio&tipo=1'>Desapuntarse</a>";
						       
										}
									}
								?>
							</div>
						</div>

				<?php

					}
				}

				?>
				</div>

				
			    <div class="w3-container">
				    <h3>Tus eventos pasados</h3>

				    <?php

                    if($usuario->fiestasPasadasSize==0&&$usuario->quedadasPasadasSize==0){
						?><p>No has partecipado a algun evento pasado.</p>
					
					<?php
					}
					else{
					for($i=0; $i<$usuario->fiestasPasadasSize; $i++){
						?>
						<div class="peticiones">
							<div class="w3-margin">
								<?php 

								    $fiestasPasadas = $usuario->fiestasPasadas;
										
									if (!empty(current($fiestasPasadas))){
										for ($i = 0; $i < count($fiestasPasadas); $i++){
											$id_ocio = $fiestasPasadas[$i]['ID_Fiesta'];
											$nombre_fiesta = $fiestasPasadas[$i]['Nombre_Ocio'];
											$descripcion = $fiestasPasadas[$i]['Descripcion'];
											$localizacion = $fiestasPasadas[$i]['Localizacion'];
											$fecha_inicio = $fiestasPasadas[$i]['Fecha_Inicio'];
											$link = $fiestasPasadas[$i]['Link'];

											echo "<p><a href='sel_fiesta.php?id=$id&nombre=$nombre_fiesta&descripcion=$descripcion&localizacion=$localizacion&fecha=$fecha_inicio&link=$link'>".$fiestasPasadas[$i]['Nombre_Ocio']." ".$fiestasPasadas[$i]['Fecha_Inicio']."</a></p>";
										}
									}
					?>

							</div>
						</div>
					<?php

				    }

				    for($i=0; $i<$usuario->quedadasPasadasSize; $i++){
						?>
						<div class="peticiones">
							<div class="w3-margin">
								<?php 

									$quedadasPasadas = $usuario->quedadasPasadas;

									if (!empty(current($quedadasPasadas))) {
										for ($i=0; $i < count($quedadasPasadas); $i++) {
											$id_ocio = $quedadasPasadas[$i]['ID_Quedada'];
										    $nombre = $quedadasPasadas[$i]['Nombre_Ocio'];
										    $desc = $quedadasPasadas[$i]['Descripcion'];
										    $local = $quedadasPasadas[$i]['Localizacion'];
										    $fini = $quedadasPasadas[$i]['Fecha_Inicio'];
										    $org = $quedadasPasadas[$i]['Organizador'];

										    echo "<p><a href='sel_quedada.php?nombre=$nombre&desc=$desc&local=$local&fini=$fini&org=$org&id=$id_ocio'>".$quedadasPasadas[$i]['Nombre_Ocio']." ".$quedadasPasadas[$i]['Fecha_Inicio']."</a></p>";
						       
										}
									}
								?>
							</div>
						</div>

				<?php

					}
				    }

						?>
	
				
				</div>
			</div>
				
        </div>

	</div>

	<?php 
		include("codesincss/includes/comun/sidebarDer.php");
		include("codesincss/includes/comun/pie.php"); 
	?>

</div> <!-- Fin del contenedor -->

</body>
</html>