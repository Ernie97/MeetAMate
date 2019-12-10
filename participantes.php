<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="CSS/w3cssgeneral.css">
	<link rel="stylesheet" type="text/css" href="CSS/estilo-ocio.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>MeetAMate: Quedadas</title>
</head>

	<body class="w3-content w3-sand">

			<?php 

			$id = $_GET['id'];
			
			require("codesincss/procesarParticipantes.php");
			
			$lista = procesarParticipantes::getNombres($id);
			
			echo(count($lista));
			if (!empty(current($lista))) {
				for ($i=0; $i < count($lista); $i++) {
					$nombreU = $lista[$i]['Nick_Name'];
					?>
					       <p><i class="fa fa-user-circle fa-fw w3-large w3-text-dark-blue"></i><?php echo $nombreU ?></p>
				
					<?php
				}
			} else {
			    echo "<h4 class='w3-center w3-margin-top'>No hemos encontrado resultados</h4>";
			}
			?>
	</body>
</html>
