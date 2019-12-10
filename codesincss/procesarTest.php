
<?php
require_once "includes/config.php";

class procesarTest{


	public static function getTest($user) {
		$quedadasArray = array();
		$app = Aplicacion::getSingleton();
		$mysqli = $app->conexionBd();

	  	$sql = "SELECT Test FROM usuario WHERE ID_Usuario= '$user'";
		$result = mysqli_query($mysqli, $sql);
		$valor = mysqli_fetch_row($result);
	}

	public static function insertarTest($user){
		$app = Aplicacion::getSingleton();
		$mysqli = $app->conexionBd();
	    $sql = "INSERT INTO formulario(ID_Usuario,Perfil_Publico,Fecha_Inicio,Fecha_Fin,Presupuesto_Min,Presupuesto_Max,Mismo_Sexo_Companeros,Misma_Nacionalidad,Es_Fumador,No_Fumadores,No_Pet_Friendly,Solo_Centro,Le_Gusta_Fiesta,Busca_Tranquilidad,Se_Habla_Espanol,Se_Habla_Ingles,Idioma1,Idioma2,Idioma3,Idioma4) VALUES ($user,'0','2000-01-01','2000-01-01','0','0','0','0','0','0','0','0','0','0','0','0','null','null','null','null')";
	    $mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__));
	}

	public static function updateTest($user,$fechaIn,$fechaFin,$presMin,$presMax,$sexo,$nacionalidad,$fumador,$no_fumadores,$mascotas,$centro,$fiestas,$tranquilidad,$espanol,$ingles,$idioma1,$idioma2,$idioma3,$idioma4,$perfil_publico){
		$app = Aplicacion::getSingleton();
		$mysqli = $app->conexionBd();

	      $sql = "UPDATE formulario SET Fecha_Inicio = '$fechaIn' WHERE ID_Usuario = '$user'";
	      $mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__));


	      $sql = "UPDATE formulario SET Fecha_Fin = '$fechaFin' WHERE ID_Usuario = '$user'";
	      $mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__));


	      $sql = "UPDATE formulario SET Presupuesto_Min = '$presMin' WHERE ID_Usuario = '$user'";
	      $mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__));

	      $sql = "UPDATE formulario SET Presupuesto_Max = '$presMax' WHERE ID_Usuario = '$user'";
	      $mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__));

	    if($sexo == '1')
	      $sql = "UPDATE formulario SET Mismo_Sexo_Companeros = '1' WHERE ID_Usuario = '$user'";
	    else
	      $sql = "UPDATE formulario SET Mismo_Sexo_Companeros = '0' WHERE ID_Usuario = '$user'";
		  $mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__));

	    if($nacionalidad == '1')
	      $sql = "UPDATE formulario SET Misma_Nacionalidad = '1' WHERE ID_Usuario = '$user'";
	    else
	      $sql = "UPDATE formulario SET Misma_Nacionalidad = '0' WHERE ID_Usuario = '$user'";
	      $mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__));

	    if($fumador == '1')
	      $sql = "UPDATE formulario SET Es_Fumador = '1' WHERE ID_Usuario = '$user'";
	    else
	      $sql = "UPDATE formulario SET Es_Fumador = '0' WHERE ID_Usuario = '$user'";
	      $mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__));

	    if($no_fumadores == '1')
	      $sql = "UPDATE formulario SET No_Fumadores = '1' WHERE ID_Usuario = '$user'";
	    else
	      $sql = "UPDATE formulario SET No_Fumadores = '0' WHERE ID_Usuario = '$user'";
	      $mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__));

	    if($mascota == '1')
	      $sql = "UPDATE formulario SET No_Pet_Friendly = '1' WHERE ID_Usuario = '$user'";
	    else
	      $sql = "UPDATE formulario SET No_Pet_Friendly = '0' WHERE ID_Usuario = '$user'";
	      $mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__));

	    if($centro == '1')
	      $sql = "UPDATE formulario SET Solo_Centro = '1' WHERE ID_Usuario = '$user'";
	    else
	      $sql = "UPDATE formulario SET Solo_Centro = '0' WHERE ID_Usuario = '$user'";
	    $mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__));

	    if($fiestas == '1')
	      $sql = "UPDATE formulario SET Le_Gusta_Fiesta = '1' WHERE ID_Usuario = '$user'";
	    else
	      $sql = "UPDATE formulario SET Le_Gusta_Fiesta = '0' WHERE ID_Usuario = '$user'";
	    $mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__));

	    if($tranquilidad == '1')
	      $sql = "UPDATE formulario SET Busca_Tranquilidad = '1' WHERE ID_Usuario = '$user'";
	    else
	      $sql = "UPDATE formulario SET Busca_Tranquilidad = '0' WHERE ID_Usuario = '$user'";
	    $mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__));

	    if($espanol == '1')
	      $sql = "UPDATE formulario SET Se_Habla_Espanol = '1' WHERE ID_Usuario = '$user'";
	    else
	      $sql = "UPDATE formulario SET Se_Habla_Espanol = '0' WHERE ID_Usuario = '$user'";
	    $mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__));

	    if($ingles == '1')
	      $sql = "UPDATE formulario SET Se_Habla_Ingles = '1' WHERE ID_Usuario = '$user'";
	    else
	      $sql = "UPDATE formulario SET Se_Habla_Ingles = '0' WHERE ID_Usuario = '$user'";
	    $mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__));

	      if($idioma1==1)
	      	$sql = "UPDATE formulario SET Idioma1 = 'English' WHERE ID_Usuario = '$user'";
	      else if($idioma1=='2')
	      	$sql = "UPDATE formulario SET Idioma1 = 'Français' WHERE ID_Usuario = '$user'";
	      else if($idioma1=='3')
	      	$sql = "UPDATE formulario SET Idioma1 = 'Deutsch' WHERE ID_Usuario = '$user'";
	      else if($idioma1=='4')
	      	$sql = "UPDATE formulario SET Idioma1 = 'Portugues' WHERE ID_Usuario = '$user'";
	      else if($idioma1=='5')
	      	$sql = "UPDATE formulario SET Idioma1 = '中國' WHERE ID_Usuario = '$user'";
	      else if($idioma1=='6')
	      	$sql = "UPDATE formulario SET Idioma1 = '日本' WHERE ID_Usuario = '$user'";
	      else
	      	$sql = "UPDATE formulario SET Idioma1 = null WHERE ID_Usuario = '$user'";
	      $mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__));

	      if($idioma2=="1")
	      	$sql = "UPDATE formulario SET Idioma2 = 'English' WHERE ID_Usuario = '$user'";
	      else if($idioma2=='2')
	      	$sql = "UPDATE formulario SET Idioma2 = 'Français' WHERE ID_Usuario = '$user'";
	      else if($idioma2=='3')
	      	$sql = "UPDATE formulario SET Idioma2 = 'Deutsch' WHERE ID_Usuario = '$user'";
	      else if($idioma2=='4')
	      	$sql = "UPDATE formulario SET Idioma2 = 'Portugues' WHERE ID_Usuario = '$user'";
	      else if($idioma2=='5')
	      	$sql = "UPDATE formulario SET Idioma2 = '中國' WHERE ID_Usuario = '$user'";
	      else if($idioma2=='6')
	      	$sql = "UPDATE formulario SET Idioma2 = '日本' WHERE ID_Usuario = '$user'";
	      else
	      	$sql = "UPDATE formulario SET Idioma2 = null WHERE ID_Usuario = '$user'";
	      $mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__));


	      if($idioma3=='1')
	      	$sql = "UPDATE formulario SET Idioma3 = 'English' WHERE ID_Usuario = '$user'";
	      else if($idioma3=='2')
	      	$sql = "UPDATE formulario SET Idioma3 = 'Français' WHERE ID_Usuario = '$user'";
	      else if($idioma3=='3')
	      	$sql = "UPDATE formulario SET Idioma3 = 'Deutsch' WHERE ID_Usuario = '$user'";
	      else if($idioma3=='4')
	      	$sql = "UPDATE formulario SET Idioma3 = 'Portugues' WHERE ID_Usuario = '$user'";
	      else if($idioma3=='5')
	      	$sql = "UPDATE formulario SET Idioma3 = '中國' WHERE ID_Usuario = '$user'";
	      else if($idioma3=='6')
	      	$sql = "UPDATE formulario SET Idioma3 = '日本' WHERE ID_Usuario = '$user'";
	      else
	      	$sql = "UPDATE formulario SET Idioma3 = null WHERE ID_Usuario = '$user'";
	      $mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__));

	      if($idioma4=='1')
	      	$sql = "UPDATE formulario SET Idioma4 = 'English' WHERE ID_Usuario = '$user'";
	      else if($idioma4=='2')
	      	$sql = "UPDATE formulario SET Idioma4 = 'Français' WHERE ID_Usuario = '$user'";
	      else if($idioma4=='3')
	      	$sql = "UPDATE formulario SET Idioma4 = 'Deutsch' WHERE ID_Usuario = '$user'";
	      else if($idioma4=='4')
	      	$sql = "UPDATE formulario SET Idioma4 = 'Portugues' WHERE ID_Usuario = '$user'";
	      else if($idioma4=='5')
	      	$sql = "UPDATE formulario SET Idioma4 = '中國' WHERE ID_Usuario = '$user'";
	      else if($idioma4=='6')
	      	$sql = "UPDATE formulario SET Idioma4 = '日本' WHERE ID_Usuario = '$user'";
	      else
	      	$sql = "UPDATE formulario SET Idioma4 = null WHERE ID_Usuario = '$user'";
	      $mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__));


	      if($perfil_publico = '1')
	        $sql = "UPDATE formulario SET Perfil_Publico = '1' WHERE ID_Usuario = '$user'";
	      else
	        $sql = "UPDATE formulario SET Perfil_Publico = '0' WHERE ID_Usuario = '$user'";
	      $mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__));

	      $sql = "UPDATE usuario SET Test ='1' WHERE ID_Usuario='$user'";
	      $mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__));
	}
}

?>
