<?php
require_once "includes/config.php";

class procesarHashtags{

	public $arrayHashtags = array();
	public $id;

	public function __construct($id) {
		$this->id = $id;
	}

	public function getHashtags() {
		$app = Aplicacion::getSingleton();
        $mysqli = $app->conexionBd();
		$i = 0;
		$sql = "SELECT * FROM hashtags  where ID_Ocio = '$this->id'";
		$resultado = $mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__‐1));
		while($fila = mysqli_fetch_assoc($resultado)) { 
			$this->arrayHashtags[$i] = $fila;
			$i = $i + 1;
		}
	}

}

?>