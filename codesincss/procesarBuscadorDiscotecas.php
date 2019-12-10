<?php
require_once "includes/config.php";
class procesarBuscadorDiscotecas{


	public static function getBusqueda($busqueda){
		$discosArray = array();
		$app = Aplicacion::getSingleton();
        $mysqli = $app->conexionBd();
		$busqueda = $mysqli->real_escape_string($busqueda);
		$i = 0;
		$sql = "SELECT * FROM discotecas, ocios WHERE ID_Ocio = ID_Disco and ID_Disco IN (SELECT ID_Ocio FROM hashtags WHERE Hashtag = '$busqueda' ORDER BY Hashtag)";
		$resultado = $mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__‐1));

		while($fila = mysqli_fetch_assoc($resultado)) { 
			$discosArray[$i] = $fila;
			$i = $i + 1;
		}
		return $discosArray;
	}
	
}