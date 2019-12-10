<?php
require_once "includes/config.php";

class procesarBuscadorFiestas{


	public static function getBusqueda($busqueda){
		$fiestasArray = array();
		$app = Aplicacion::getSingleton();
        $mysqli = $app->conexionBd();
		$i = 0;
		$sql = "SELECT * FROM fiestas, ocios WHERE ID_Ocio = ID_Fiesta and ID_Fiesta IN (SELECT ID_Ocio FROM hashtags WHERE Hashtag = '$busqueda' ORDER BY Hashtag)";
		$resultado = $mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__‐1));

		while($fila = mysqli_fetch_assoc($resultado)) { 
			$fiestasArray[$i] = $fila;
			$i = $i + 1;
		}
		return $fiestasArray;
	}
	
}