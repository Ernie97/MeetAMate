<?php
session_start();
require_once "includes/config.php";

		$app = Aplicacion::getSingleton();
        $mysqli = $app->conexionBd();

		 $id = $_POST['idOcio'];
		 $rn = $_POST['idUser'];
		
		
		$sql = "INSERT INTO partecipantes (ID_Ocio, ID_Usuario, Nombre_Publico)
				    VALUES ('$id', '$rn', '1')";
	   // $mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__));
		//header('Location: ../ocio.php');
		if($mysqli->query($sql)) echo "Successfully Inserted";
		else
		  echo "Insertion Failed";


		//header('Location: /ocio.php');
?>
