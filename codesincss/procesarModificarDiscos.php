<?php

  $mysqli = @mysqli_connect('localhost','root','','meetamate');

  if (!$mysqli)
    printf('Error %d: %s <br/>',mysqli_connect_errno(),mysqli_connect_error());

  else {

  	$mysqli->set_charset("utf8");

    $id = $_GET['id'];

    require("procesarOcio.php");
    require("procesarDiscos.php");
    $id = $mysqli->real_escape_string($_REQUEST["ID_Disco"]);
   	$nombre_ocio = $mysqli->real_escape_string($_REQUEST['Nombre_Ocio']);
    $localizacion = $mysqli->real_escape_string($_REQUEST['Localizacion']);
    $latitud = $mysqli->real_escape_string($_REQUEST['Latitud']);
    $longitud = $mysqli->real_escape_string($_REQUEST['Longitud']);
    $descripcion = $mysqli->real_escape_string($_REQUEST['Descripcion']);
    $categoria=1;

    if ($latitud == null && $longitud == null) {
        $latitud = 40.41667;
        $longitud = -3.70389;
    }

    procesarOcio::updateOcio($id,$nombre_ocio,$localizacion,$latitud,$longitud,$descripcion,$categoria);

    $imagen = $mysqli->real_escape_string($_REQUEST['Imagen']);
    $link = $mysqli->real_escape_string($_REQUEST['Link']);

    procesarDiscos::updateDiscos($id,$imagen,$link);

	   mysqli_close();
	  header("Location: ../discotecas.php");*/
	}

  

?>