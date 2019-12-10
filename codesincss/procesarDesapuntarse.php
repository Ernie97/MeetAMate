<?php
session_start();
require_once "includes/config.php";

		$app = Aplicacion::getSingleton();
        $mysqli = $app->conexionBd();

		$id = $_POST['idOcio'];
		 $rn = $_POST['idUser'];
		
		
		$sql = "DELETE FROM partecipantes WHERE ID_Ocio = '$id' AND ID_Usuario = '$rn'";
	    $mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__));
	
?>
