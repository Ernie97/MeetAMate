<?php
require_once "includes/config.php";
class procesarFiestas{

	public $fiestasArray = array();

	public static function getFiestas() {
		$fiestasArray = array();
		$app = Aplicacion::getSingleton();
        $mysqli = $app->conexionBd();
		$i = 0;
		$sql = "SELECT * FROM fiestas, ocios WHERE ID_Fiesta = ID_Ocio";
		$resultado = $mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__‐1));
		while($fila = mysqli_fetch_assoc($resultado)) { 
			$fiestasArray[$i] = $fila;
			$i = $i + 1;
		} 
		return $fiestasArray;
	}

	public static function borrarFiestas($id){
		$app = Aplicacion::getSingleton();
		$mysqli = $app->conexionBd();
		$sql = "DELETE FROM fiestas where ID_Fiesta = '$id'";
		$mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__‐1));

	}

	public static function insertarFiestas($id_fiesta){
		$app = Aplicacion::getSingleton();
		$mysqli = $app->conexionBd();
		$sql = "INSERT INTO fiestas(ID_Fiesta,Imagen_Perfil,Link, Fecha_Inicio, Fecha_Fin, RRHH) VALUES ($id_fiesta, 'NULL', 'NULL','2000-01-01','2000-01-01', 'NULL')";
	    $mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__‐1));
	}

	public static function updateFiestas($id_fiesta,$imagen,$link,$fecha_ini,$fecha_fin,$rrhh){
		$app = Aplicacion::getSingleton();
		$mysqli = $app->conexionBd();

		$sql = "UPDATE fiestas SET Imagen_Perfil = '$imagen' WHERE ID_Fiesta = '$id_fiesta'";
		$mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__‐1));

    	$sql = "UPDATE fiestas SET Link = '$link' WHERE ID_Fiesta = '$id_fiesta'";
    	$mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__‐1));

    	$sql = "UPDATE fiestas SET Fecha_Inicio = '$fecha_ini' WHERE ID_Fiesta = '$id_fiesta'";
    	$mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__‐1));

    	$sql = "UPDATE fiestas SET Fecha_Fin = '$fecha_fin' WHERE ID_Fiesta = '$id_fiesta'";
    	$mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__‐1));

    	$sql = "UPDATE fiestas SET RRHH = '$rrhh' WHERE ID_Fiesta = '$id_fiesta'";
    	$mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__‐1));
	}

}

?>