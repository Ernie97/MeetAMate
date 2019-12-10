<?php
require_once "includes/config.php";

class procesarPubs{

	public static function getPubs() {
		$pubsArray = array();
		$app = Aplicacion::getSingleton();
        $mysqli = $app->conexionBd();
		$i = 0;
		$sql = "SELECT * FROM pubs, ocios WHERE ID_Ocio = ID_Pub";
		$resultado = $mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__‐1));
		while($fila = mysqli_fetch_assoc($resultado)) { 
			$pubsArray[$i] = $fila;
			$i = $i + 1;
		}
		return $pubsArray;
	}

	public static function borrarPubs($id){
		$app = Aplicacion::getSingleton();
		$mysqli = $app->conexionBd();
		$sql = "DELETE FROM pubs where ID_Pub = '$id'";
		$mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__‐1));
	}

		public static function insertarPubs($id_pub){
		$app = Aplicacion::getSingleton();
		$mysqli = $app->conexionBd();
	  	$sql = "INSERT INTO pubs(ID_Pub,Imagen_Perfil,Link) VALUES ($id_pub,'null','null')";
	  	$mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__));
	}

	public static function updatePubs($id_pub,$imagen,$link){
		$app = Aplicacion::getSingleton();
		$mysqli = $app->conexionBd();

		$sql = "UPDATE pubs SET Imagen_Perfil = '$imagen' WHERE ID_Pub = '$id_pub'";
		$mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__));

    	$sql = "UPDATE pubs SET Link = '$link' WHERE ID_Pub = '$id_pub'";
    	$mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__));
	}
}


?>