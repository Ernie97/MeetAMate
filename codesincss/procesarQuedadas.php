
<?php
require_once "includes/config.php";

class procesarQuedadas{


	public static function getQuedadas() {
		$quedadasArray = array();
		$app = Aplicacion::getSingleton();
		$mysqli = $app->conexionBd();
		$i = 0;
		$sql = "SELECT * FROM quedadas, ocios WHERE ID_Ocio = ID_Quedada";
		$resultado = $mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__‐1));
		while($fila = mysqli_fetch_assoc($resultado)) { 
			$quedadasArray[$i] = $fila;
			$i = $i + 1;
		}
		return $quedadasArray;
	}

	public static function borrarQuedadas($id){
		$app = Aplicacion::getSingleton();
		$mysqli = $app->conexionBd();
		$sql = "DELETE FROM quedadas where ID_Quedada = '$id'";
		$mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__‐1));

	}
		public static function insertarQuedadas($id_quedada){
		$app = Aplicacion::getSingleton();
		$mysqli = $app->conexionBd();
	  	$sql = "INSERT INTO quedadas(ID_Quedada,Fecha_Inicio,Fecha_Fin,Organizador,Idioma) VALUES ($id_quedada,'2000-01-01','2000-01-01','null','null')";
	  	$mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__));
	}

	public static function updateQuedadas($id_quedada,$fecha_ini,$fecha_fin,$organizador){
		$app = Aplicacion::getSingleton();
		$mysqli = $app->conexionBd();

    	$sql = "UPDATE quedadas SET Fecha_Inicio = '$fecha_ini' WHERE ID_Quedada = '$id_quedada'";
    	$mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__));

    	$sql = "UPDATE quedadas SET Fecha_Fin = '$fecha_fin' WHERE ID_Quedada = '$id_quedada'";
    	$mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__));
    
    	$sql = "UPDATE quedadas SET Organizador = '$organizador' WHERE ID_Quedada = '$id_quedada'";
    	$mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__));

	}
	public static function updateErasmus($id_quedada,$fecha_ini,$fecha_fin,$organizador,$idioma){
		$app = Aplicacion::getSingleton();
		$mysqli = $app->conexionBd();

    	$sql = "UPDATE quedadas SET Fecha_Inicio = '$fecha_ini' WHERE ID_Quedada = '$id_quedada'";
    	$mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__));

    	$sql = "UPDATE quedadas SET Fecha_Fin = '$fecha_fin' WHERE ID_Quedada = '$id_quedada'";
    	$mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__));
    
    	$sql = "UPDATE quedadas SET Organizador = '$organizador' WHERE ID_Quedada = '$id_quedada'";
    	$mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__));

    	$sql = "UPDATE quedadas SET Idioma = '$idioma' WHERE ID_Quedada = '$id_quedada'";
    	$mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__));

	}
}

?>
