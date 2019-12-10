
<?php
require_once "includes/config.php";

class procesarDiscos{

	public static function getDiscos() {
		$DiscosArray = array();
		$app = Aplicacion::getSingleton();
        $mysqli = $app->conexionBd();
		$i = 0;
		$sql = "SELECT * FROM discotecas, ocios WHERE ID_Disco = ID_Ocio";
		$resultado = $mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__‐1));
		while($fila = mysqli_fetch_assoc($resultado)) { 
			$DiscosArray[$i] = $fila;
			$i = $i + 1;
		} 
		return $DiscosArray;
	}

	public static function borrarDiscos($id){
		$app = Aplicacion::getSingleton();
		$mysqli = $app->conexionBd();
		$sql = "DELETE FROM discotecas where ID_Disco = '$id'";
		$mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__‐1));
	}

	public static function insertarDiscos($id_disco){
		$app = Aplicacion::getSingleton();
		$mysqli = $app->conexionBd();
		echo "$id_disco";
		$sql = "INSERT INTO discotecas(ID_Disco,Imagen_Perfil,Link) VALUES ($id_disco,'null','null')";
	    $mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__));
	}

	public static function updateDiscos($id_disco,$imagen,$link){
		$app = Aplicacion::getSingleton();
		$mysqli = $app->conexionBd();

		$sql = "UPDATE discotecas SET Imagen_Perfil = '$imagen' WHERE ID_Disco = '$id_disco'";
	    		$mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__));


		$sql = "UPDATE discotecas SET Link = '$link' WHERE ID_Disco = '$id_disco'";
		$mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__));
	}
	
}

?>