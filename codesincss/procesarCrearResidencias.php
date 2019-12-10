<?php

  $mysqli = @mysqli_connect('localhost','root','','meetamate');

  if (!$mysqli)
    printf('Error %d: %s <br/>',mysqli_connect_errno(),mysqli_connect_error());

  else {

  	$mysqli->set_charset("utf8");
  	$residencia = $_REQUEST["ID_Resi"];
  	$sql = "SELECT ID_Resi FROM residencias WHERE ID_Resi= '$residencia'";
	$result = mysqli_query($mysqli, $sql);
	$valor = mysqli_fetch_row($result);
	
	if($valor[0] == 0){

   		if(null!==($mysqli->real_escape_string($_REQUEST['ID_Resi']))) {
		  	$sql = "INSERT INTO ocios(ID_Ocio,Categoria,Nombre_Ocio,Localizacion, Latitud, Longitud, Descripcion) VALUES ($residencia,'1','null','null','null','null','null')";
		  	$mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__));
        $sql = "UPDATE ocios  SET Categoria = 'residencias' WHERE ID_Ocio = '$residencia'";
        $mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__));
   		}
   		if(null!==($mysqli->real_escape_string($_REQUEST['Nombre_Ocio']))) {
    		$nombre_ocio = $_REQUEST['Nombre_Ocio'];
    		$sql = "UPDATE ocios SET Nombre_Ocio = '$nombre_ocio' WHERE ID_Ocio = '$residencia'";
    		$mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__));
   		}
   		if(null!==($mysqli->real_escape_string($_REQUEST['Localizacion']))) {
    		$localizacion = $_REQUEST['Localizacion'];
    		$sql = "UPDATE ocios SET Localizacion = '$localizacion' WHERE ID_Ocio = '$residencia'";
    		$mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__));
   		}
   		if(null!==($mysqli->real_escape_string($_REQUEST['Latitud']))) {
    		$latitud = $_REQUEST['Latitud'];
    		$sql = "UPDATE ocios SET Latitud = '$latitud' WHERE ID_Ocio = '$residencia'";
    		$mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__));
   		}
   		if(null!==($mysqli->real_escape_string($_REQUEST['Longitud']))) {
    		$longitud = $_REQUEST['Longitud'];
    		$sql = "UPDATE ocios SET Longitud = '$longitud' WHERE ID_Ocio = '$residencia'";
    		$mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__));
   		}
   		if(null!==($mysqli->real_escape_string($_REQUEST['Descripcion']))) {
    		$descripcion = $_REQUEST['Descripcion'];
    		$sql = "UPDATE ocios SET Descripcion = '$descripcion' WHERE ID_Ocio = '$residencia'";
    		$mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__));
   		}
   		if(null!==($mysqli->real_escape_string($_REQUEST['ID_Resi']))) {
		    $sql = "INSERT INTO residencias(ID_Resi,Imagen_Perfil,Galeria,Link) VALUES ('$residencia','null','null','null')";
		    $mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__));
		}
	    if(null!==($mysqli->real_escape_string($_REQUEST['Imagen']))) {
	      $imagen = $_REQUEST['Imagen'];
	      $sql = "UPDATE residencias SET Imagen_Perfil = '$imagen' WHERE ID_Resi = '$residencia'";
	      $mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__));
	    }
	    if(null!==($mysqli->real_escape_string($_REQUEST['Galeria']))) {
	      $galeria = $_REQUEST['Galeria'];
	      $sql = "UPDATE residencias SET Galeria = '$galeria' WHERE ID_Resi = '$residencia'";
	      $mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__));
	    }
	    if(null!==($mysqli->real_escape_string($_REQUEST['Link']))) {
	      $link = $_REQUEST['Link'];
	      $sql = "UPDATE residencias SET Link = '$link' WHERE ID_Resi = '$residencia'";
	      $mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__));
	    }
	    mysqli_close();
	    header("Location: ../residencias.php");
	}
	else
		header("Location: ../errorResidencia.php");
  }
  

?>