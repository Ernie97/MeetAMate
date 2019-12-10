<?php
require_once "includes/config.php";

class procesarComentarios{

	public static function getComentarios($id, $tipo) {
		$arrayComentarios = array();
		$app = Aplicacion::getSingleton();
        $mysqli = $app->conexionBd();
		$i = 0;
		switch($tipo){
			case 0: $sql = "SELECT * FROM comentarios, quedadas where ID_Quedada = '$id' and ID_Quedada = ID_Ocio limit 4";break;
			case 1: $sql = "SELECT * FROM comentarios, pubs where ID_Pub = '$id' and ID_Pub = ID_Ocio limit 4";break;
			case 2: $sql = "SELECT * FROM comentarios, fiestas where ID_Fiesta = '$id' and ID_Fiesta = ID_Ocio limit 4";break;
			case 3: $sql = "SELECT * FROM comentarios, discotecas where ID_Disco = '$id' and ID_Disco = ID_Ocio limit 4";break;
			default: $sql = "SELECT * FROM comentarios, residencias where ID_Resi = '$id' and ID_Resi = ID_Ocio limit 4";

		}
		$resultado = $mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__‐1));
		while($fila = mysqli_fetch_assoc($resultado)) { 
			$arrayComentarios[$i] = $fila;
			$i = $i + 1;
		}
		return $arrayComentarios;

	}

}

?>