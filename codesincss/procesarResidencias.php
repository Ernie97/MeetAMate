<?php
require_once "includes/config.php";

class procesarResidencias{


	public static function getResidencias() {
		$residenciasArray = array();

		$app = Aplicacion::getSingleton();
        $mysqli = $app->conexionBd();
		$i = 0;
		$sql = "SELECT * FROM residencias, ocios WHERE ID_Ocio = ID_Resi";
		$resultado = $mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__‐1));

		while($fila = mysqli_fetch_assoc($resultado)) { 
			$residenciasArray[$i] = $fila;
			$i = $i + 1;
		}

		return $residenciasArray;
	}

	public static function borrarResidencias($id){
		$app = Aplicacion::getSingleton();
		$mysqli = $app->conexionBd();
		$sql = "DELETE FROM residencias where ID_Resi = '$id'";
		$mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__‐1));
	}
}

?>