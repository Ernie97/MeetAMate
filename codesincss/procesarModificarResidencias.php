<?php

  $mysqli = @mysqli_connect('localhost','root','','meetamate');

  if (!$mysqli)
    printf('Error %d: %s <br/>',mysqli_connect_errno(),mysqli_connect_error());

  else {

  	$mysqli->set_charset("utf8");

    require("procesarOcio.php");
    require("procesarResidencias.php");
    $residencia = $mysqli->real_escape_string($_REQUEST["ID_Resi"]);
   	$nombre_ocio = $mysqli->real_escape_string($_REQUEST['Nombre_Ocio']);
    $localizacion = $mysqli->real_escape_string($_REQUEST['Localizacion']);
    $latitud = $mysqli->real_escape_string($_REQUEST['Latitud']);
    $longitud = $mysqli->real_escape_string($_REQUEST['Longitud']);
    $descripcion = $mysqli->real_escape_string($_REQUEST['Descripcion']);
    $categoria="residencias";

    if($residencia!==null){
      procesarResidencias::updateIdResidencias($residencia);
      procesarOcio::updateIdOcio($residencia);
    }

    if(($categoria!==null)&&($nombre_ocio!==null)&&($latitud!==null)&&($localizacion!==null)&&($longitud!==null)&&($descripcion!==null)&&($residencia!==null)) {
      procesarOcio::updateOcio($residencia,$nombre_ocio,$localizacion,$latitud,$longitud,$descripcion,$categoria);
    }
    else header("Location: ../errorCampos.php");

    $residencia=$mysqli->real_escape_string($_REQUEST['ID_Resi']);
    $imagen = $mysqli->real_escape_string($_REQUEST['Imagen']);
    $galeria = $mysqli->real_escape_string($_REQUEST['Galeria']);
    $link = $mysqli->real_escape_string($_REQUEST['Link']);

      if(($residencia!==null)&&($galeria!==null)&&($imagen!==null)&&($link!==null)){
        procesarResidencias::updateResidencias($residencia,$imagen,$galeria,$link);
	    }
      else header("Location: ../errorCampos.php");
	    mysqli_close();
	    header("Location: ../residencias.php");
	}

  

?>