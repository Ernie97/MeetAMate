<?php session_start()?>

<?php
	include("codesincss/obtenerCompañero.php");
	$id=$_GET['id'];
	$obtener= new obtenerCompañero();
	$obtener->obtenerDatos($id);
	$scomp=$obtener->datosTest['Mismo_Sexo_Companeros'];
	$ncomp=$obtener->datosTest['Misma_Nacionalidad'];
	$pcomp=$obtener->datosTest['No_Pet_Friendly'];
	$lcomp=$obtener->datosTest['Solo_Centro'];
	$fcomp=$obtener->datosTest['Le_Gusta_Fiesta'];
	$tcomp=$obtener->datosTest['Busca_Tranquilidad'];
	$spspanish=$obtener->datosTest['Se_Habla_Espanol'];
	$spenglish=$obtener->datosTest['Se_Habla_Ingles'];
	$smoke=$obtener->datosTest['Es_Fumador'];
	$nickname=$obtener->datosPersonales['Nick_Name'];
	$name=$obtener->datosPersonales['Nombre_Usuario'];
	$surname1=$obtener->datosPersonales['Primer_Apellido'];
	$surname2=$obtener->datosPersonales['Segundo_Apellido'];
	$photo=$obtener->datosPersonales['Imagen_Perfil'];
	$birthdate=$obtener->datosPersonales['Fecha_Nacimiento'];
	$email=$obtener->datosPersonales['Correo'];
	$cnumber=$obtener->datosPersonales['Telefono'];
	$maxPres=$obtener->datosTest['Presupuesto_Max'];
	$noSmoke=$obtener->datosTest['No_Fumadores'];
	$publicp=$obtener->datosTest['Perfil_Publico'];

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="CSS/w3cssgeneral.css">
		<link rel="stylesheet" href="CSS/estilo-compañeropiso.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<style>
		html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}
		</style>
	</head>

	<body class="color-fondo">
	<div class="w3-content w3-sand">
	<?php
		require("codesincss/includes/comun/cabecera.php");
		 
	?>

		<div id="sel-companero" class="w3-margin-top w3-margin-right">
			<?php
				

					if(!$publicp){
						?>
						<div class="w3-container">
						<h2><?php echo "$nickname";?></h2>
						<h4>Este usuario no desea que su información sea pública, pero puedes contactar con él a través del siguiente email: <?php echo "$email";?> </h4>
						</div>
					<?php
					}
					else{
					?>

					<div class="w3-row-padding w3-third">
					    <div id="perfil-companero" class="w3-white w3-text-grey w3-card-4">
					        <div class="w3-display-container">
					        	<?php echo "<img src='disco.jpg' style='width:100%' alt='Avatar'>"?>
					          	<div class="w3-display-bottomleft w3-container w3-text-white">
					            	<h2><?php echo "$nickname";?></h2>
					          	</div>
							</div>
							<div class="w3-display-container w3-margin-top w3-margin-botton">
								<h4><?php echo "$name" . " $surname1";?></h4>
								<p><i class="fa fa-calendar fa-fw w3-large w3-text-dark-blue"></i><?php echo " $birthdate";?></p>
								<p><i class="fa fa-envelope fa-fw w3-large w3-text-dark-blue"></i><?php echo " $email";?></p>
								<p><i class="fa fa-phone fa-fw w3-large w3-text-dark-blue "></i><?php echo " $cnumber";?></p>
							</div>
						</div>
					</div>
					<div class="w3-twothird">
    
     					<div id="compatible-companero" class="w3-container w3-card w3-white w3-margin-bottom">
								<h3 class="w3-text-grey w3-padding-16">¿Seréis compatibles?</h3>
								<p><i class="fa fa-user-plus fa-fw w3-large w3-text-dark-blue"></i> ¿Busca compañero del mismo sexo? <strong><?php if($scomp) echo "Si"; else echo "Le da igual";?></strong></p>
								<p><i class="fa fa-globe fa-fw w3-large w3-text-dark-blue"></i> ¿Busca compañero de la misma nacionalidad? <strong><?php if($ncomp) echo "Si"; else echo "Le da igual";?></strong></p>
								<p><i class="fa fa-paw fa-fw w3-large w3-text-dark-blue"></i> ¿Admite animales? <strong><?php if($pcomp) echo "Si"; else echo "No";?></strong></p>
								<p><i class="fa fa-bullseye fa-fw w3-large w3-text-dark-blue"></i> Desea que el piso este localizado en el centro: <strong><?php if($lcomp) echo "Si"; else echo "Le da igual";?></strong></p>
								<p><i class="fa fa-users fa-fw w3-large w3-text-dark-blue"></i> No desea que se hagan fiestas en el piso: <strong><?php if($fcomp) echo "Si"; else echo "Le da igual";?></strong></p>
								<p><i class="fa fa-tree fa-fw w3-large w3-text-dark-blue"></i> ¿Quiere vivir con gente tranquila? <strong><?php if($tcomp) echo "Si"; else echo "Le da igual";?></strong></p>
								<p><i class="fa fa-language fa-fw w3-large w3-text-dark-blue"></i> ¿Quiere vivir con gente que hable español? <strong><?php if($spspanish) echo "Si"; else echo "Le da igual";?></strong></p>
								<p><i class="fa fa-language fa-fw w3-large w3-text-dark-blue"></i> ¿Quiere vivir con gente que hable ingles? <strong><?php if($spenglish) echo "Si"; else echo "Le da igual";?></strong></p>
								<p><i class="fa fa-leaf fa-fw w3-large w3-text-dark-blue"></i> ¿Es fumador? <strong><?php if($smoke) echo "Si"; else echo "No";?></strong></p>
								<p><i class="fa fa-leaf fa-fw w3-large w3-text-dark-blue"></i> ¿Admite compañeros fumadores? <strong><?php if($noSmoke) echo "Si"; else echo "No";?></strong></p>
								<p><i class="fa fa-money fa-fw w3-large w3-text-dark-blue"></i> Presupuesto máximo: <strong><?php echo "$maxPres";?></strong></p>
							<?php
								}
							?>
							
					</div>
			</div>
	</div>
		<?php
				include("codesincss/includes/comun/sidebarDer.php");
				include("codesincss/includes/comun/pie.php");
			?>

	</div>
	</body>
</html>