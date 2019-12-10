<?php

  $mysqli = @mysqli_connect('localhost','root','','meetamate');

  if (!$mysqli)
    printf('Error %d: %s <br/>',mysqli_connect_errno(),mysqli_connect_error());

  else {

      $mysqli->set_charset("utf8");


      $categoria = "quedadas";
      $nombre_ocio = $mysqli->real_escape_string($_REQUEST['Nombre_Ocio']);
      $localizacion = $mysqli->real_escape_string($_REQUEST['Localizacion']);
      $latitud = $mysqli->real_escape_string($_REQUEST['Latitud']);
      $longitud = $mysqli->real_escape_string($_REQUEST['Longitud']);
      $descripcion = $mysqli->real_escape_string($_REQUEST['Descripcion']);
      require("procesarQuedadas.php");
      $id = $mysqli->real_escape_string($_REQUEST["ID_Quedada"]);
      $fecha_ini = $mysqli->real_escape_string($_REQUEST['Fecha_Inicio']);
      $fecha_fin = $mysqli->real_escape_string($_REQUEST['Fecha_Fin']);
      $organizador = $mysqli->real_escape_string($_REQUEST['Organizador']);
      require("procesarOcio.php");

      if($id!==null){
        procesarQuedadas::updateIdQuedadas($id);
        procesarOcio::updateIdOcio($id);
      }
      else header("Location: ../errorCampos.php");

    if(($categoria!==null)&&($nombre_ocio!==null)&&($latitud!==null)&&($localizacion!==null)&&($longitud!==null)&&($descripcion!==null)&&($id!==null)) {
      procesarOcio::updateOcio($id,$nombre_ocio,$localizacion,$latitud,$longitud,$descripcion,$categoria);
    }
    else header("Location: ../errorCampos.php");

                  
      if(($id!==null)&&($fecha_ini!==null)&&($fecha_fin!==null)&&($organizador!==null)) {
        procesarQuedadas::updateQuedadas($id,$fecha_ini,$fecha_fin,$organizador);
      }
      else
        header("Location: ../errorCampos.php");
  }
       
    mysqli_close();
    header("Location: ../ocio.php");
?>