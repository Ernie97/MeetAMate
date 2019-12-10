
<?php

require_once "includes/config.php";

class procesarParticipantes{


	public static function getParticipantes($idO) {
		$participantesArray = array();
	
		$app = Aplicacion::getSingleton();
		$mysqli = $app->conexionBd();
		$i = 0;
			$sql = "SELECT ID_Usuario FROM partecipantes WHERE ID_Ocio = '$idO' ";
			$resultado = $mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__‐1));

			while($fila = mysqli_fetch_assoc($resultado)) { 
				$participantesArray[$i] = $fila;
				$i = $i + 1;
			} 
			return $participantesArray;
		}

	
	public static function getNombres($idO){
		$nombresArray = array();
		$app = Aplicacion::getSingleton();
		$mysqli = $app->conexionBd();
	
		$lista = procesarParticipantes::getParticipantes($idO);

		for($i=0; $i<count($lista); $i++){
			$id = $lista[$i]['ID_Usuario'];	
			$j = 0;
			$sql = "SELECT Nick_Name FROM usuario WHERE ID_Usuario='$id' ";
			$resultado = $mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__‐1));

			while($fila = mysqli_fetch_assoc($resultado)) { 
				$nombresArray[$i] = $fila;
				$j = $j + 1;
			} 
			
		}

return $nombresArray;

	}




	}
	?>
	