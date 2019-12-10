<?php
require_once "includes/config.php";

class procesarBuscadorQuedadas{


	public static function getBusqueda($busqueda){
		$quedadasArray = array();
		$app = Aplicacion::getSingleton();
        $mysqli = $app->conexionBd();
		$i = 0;
		$sql = "SELECT * FROM quedadas, ocios WHERE ID_Ocio = ID_Quedada and ID_Quedada IN (SELECT ID_Ocio FROM hashtags WHERE Hashtag = '$busqueda' ORDER BY Hashtag)";
		$resultado = $mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__‐1));

		while($fila = mysqli_fetch_assoc($resultado)) { 
			$quedadasArray[$i] = $fila;
			$i = $i + 1;
		}
		return $quedadasArray;
	}
	
}