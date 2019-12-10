<?php

  $mysqli = @mysqli_connect('localhost','root','','meetamate');

  if (!$mysqli)
    printf('Error %d: %s <br/>',mysqli_connect_errno(),mysqli_connect_error());

  else {

  	$mysqli->set_charset("utf8");

    require("procesarOcio.php");
    require("procesarPubs.php");
    $id = $mysqli->real_escape_string($_REQUEST["ID_Pub"]);
   	$nombre_ocio = $mysqli->real_escape_string($_REQUEST['Nombre_Ocio']);
    $localizacion = $mysqli->real_escape_string($_REQUEST['Localizacion']);
    $latitud = $mysqli->real_escape_string($_REQUEST['Latitud']);
    $longitud = $mysqli->real_escape_string($_REQUEST['Longitud']);
    $descripcion = $mysqli->real_escape_string($_REQUEST['Descripcion']);
    $categoria="pubs";

    if($id!==null){
      procesarPubs::updateIdPubs($id);
      procesarOcio::updateIdOcio($id);
    }

    if(($categoria!==null)&&($nombre_ocio!==null)&&($latitud!==null)&&($localizacion!==null)&&($longitud!==null)&&($descripcion!==null)&&($id!==null)) {
      procesarOcio::updateOcio($id,$nombre_ocio,$localizacion,$latitud,$longitud,$descripcion,$categoria);
    }
    else header("Location: ../errorCampos.php");

    $imagen = $mysqli->real_escape_string($_REQUEST['Imagen']);
    $galeria = $mysqli->real_escape_string($_REQUEST['Galeria']);
    $link = $mysqli->real_escape_string($_REQUEST['Link']);

      if(($id!==null)&&($galeria!==null)&&($imagen!==null)&&($link!==null)){
        procesarPubs::updatePubs($id,$imagen,$galeria,$link);
	    }
      else header("Location: ../errorCampos.php");
	    mysqli_close();
	    header("Location: ../pubs.php");
	}

  

?>