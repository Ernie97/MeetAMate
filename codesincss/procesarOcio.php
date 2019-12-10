<?php
require_once "includes/config.php";
class procesarOcio{


	public static function getCategoriaOcio($id){
		$app = Aplicacion::getSingleton();
		$mysqli = $app->conexionBd();
	  	$sql = "SELECT Categoria FROM ocios WHERE ID_Ocio = $id";
	  	$resultado=$mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__));
	  	return $resultado;
	}
	public static function getNombreOcio($id){
		$app = Aplicacion::getSingleton();
		$mysqli = $app->conexionBd();
	  	$sql = "SELECT Categoria FROM ocios WHERE ID_Ocio = $id";
	  	$resultado=$mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__));
	  	return $resultado;
	}
	public static function getLocalizacionOcio($id){
		$app = Aplicacion::getSingleton();
		$mysqli = $app->conexionBd();
	  	$sql = "SELECT Localizacion FROM ocios WHERE ID_Ocio = $id";
	  	$resultado=$mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__));
	  	return $resultado;
	}
	public static function getLatitudOcio($id){
		$app = Aplicacion::getSingleton();
		$mysqli = $app->conexionBd();
	  	$sql = "SELECT Latitud FROM ocios WHERE ID_Ocio = $id";
	  	$resultado=$mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__));
	  	return $resultado;
	}
	public static function getLongitudOcio($id){
		$app = Aplicacion::getSingleton();
		$mysqli = $app->conexionBd();
	  	$sql = "SELECT Longitud FROM ocios WHERE ID_Ocio = $id";
	  	$resultado=$mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__));
	  	return $resultado;
	}
	public static function getDescripcionOcio($id){
		$app = Aplicacion::getSingleton();
		$mysqli = $app->conexionBd();
	  	$sql = "SELECT Descripcion FROM ocios WHERE ID_Ocio = $id";
	  	$resultado=$mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__));
	  	return $resultado;
	}
	public static function insertarOcio($categoria){
		$app = Aplicacion::getSingleton();
		$mysqli = $app->conexionBd();
	  	$sql = "INSERT INTO ocios(Categoria,Nombre_Ocio,Localizacion, Latitud, Longitud, Descripcion) VALUES ($categoria,'null','null','0.0','0.0','null')";
	  	$mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__));

		$sql = "SELECT ID_Ocio FROM ocios where ID_Ocio=(SELECT MAX(ID_Ocio) FROM ocios)";
	  	$resultado = $mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__));
	  	$id = mysqli_fetch_row($resultado);
	  	return $id[0];
	}

	public static function updateOcio($id,$nombre_ocio,$localizacion,$latitud,$longitud,$descripcion,$categoria){
		$app = Aplicacion::getSingleton();
		$mysqli = $app->conexionBd();
		$sql = "UPDATE ocios SET Nombre_Ocio = '$nombre_ocio' WHERE ID_Ocio = '$id'";
		$mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__));

		$sql = "UPDATE ocios SET Localizacion = '$localizacion' WHERE ID_Ocio = '$id'";
		$mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__));

		$sql = "UPDATE ocios SET Latitud = '$latitud' WHERE ID_Ocio = '$id'";
		$mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__));

		$sql = "UPDATE ocios SET Longitud = '$longitud' WHERE ID_Ocio = '$id'";
		$mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__));

		$sql = "UPDATE ocios SET Descripcion = '$descripcion' WHERE ID_Ocio = '$id'";
		$mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__));

		$sql = "UPDATE ocios SET Categoria = '$categoria' WHERE ID_Ocio = '$id'";		      
        $mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__));
	}
}

?>