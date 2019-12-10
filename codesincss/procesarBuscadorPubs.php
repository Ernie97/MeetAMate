<?php
require_once "includes/config.php";

class procesarBuscadorPubs{


	public static function getBusqueda($busqueda){
		$pubsArray = array();
		$app = Aplicacion::getSingleton();
        $mysqli = $app->conexionBd();
		$i = 0;
		$sql = "SELECT * FROM pubs, ocios WHERE ID_Ocio = ID_Pub and ID_Pub IN (SELECT ID_Ocio FROM hashtags WHERE Hashtag = '$busqueda' ORDER BY Hashtag)";
		$resultado = $mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__‐1));

		while($fila = mysqli_fetch_assoc($resultado)) { 
			$pubsArray[$i] = $fila;
			$i = $i + 1;
		}

		return $pubsArray;
	}
	
}