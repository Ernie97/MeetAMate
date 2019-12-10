
<?php
require_once "includes/config.php";

class procesarErasmus{


	public static function getErasmus() {
		$ErasmusArray = array();
		$app = Aplicacion::getSingleton();
        $mysqli = $app->conexionBd();
		$i = 0;
		$sql = "SELECT * FROM quedadas, ocios WHERE ID_Quedada = ID_Ocio AND idioma!=''";
		$resultado = $mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__‐1));
		while($fila = mysqli_fetch_assoc($resultado)) { 
			$ErasmusArray[$i] = $fila;
			$i = $i + 1;
		} 
		return $ErasmusArray;
	}
}

?>