<?php

  $mysqli = @mysqli_connect('localhost','root','','meetamate');

  if (!$mysqli)
    printf('Error %d: %s <br/>',mysqli_connect_errno(),mysqli_connect_error());

  else {

	  	$mysqli->set_charset("utf8");


  		$categoria = "fiestas";
	    $nombre_ocio = $mysqli->real_escape_string($_REQUEST['Nombre_Ocio']);
	  	$localizacion = $mysqli->real_escape_string($_REQUEST['Localizacion']);
		$latitud = $mysqli->real_escape_string($_REQUEST['Latitud']);
		$longitud = $mysqli->real_escape_string($_REQUEST['Longitud']);
		$descripcion = $mysqli->real_escape_string($_REQUEST['Descripcion']);
   		require("procesarFiestas.php");
		$imagen = $mysqli->real_escape_string($_REQUEST['Imagen']);
	  	$id_fiesta = $mysqli->real_escape_string($_REQUEST["ID_Fiesta"]);
	  	$galeria = $mysqli->real_escape_string($_REQUEST['Galeria']);
	  	$link = $mysqli->real_escape_string($_REQUEST['Link']);
	  	$fecha_ini = $mysqli->real_escape_string($_REQUEST['Fecha_Inicio']);
	  	$fecha_fin = $mysqli->real_escape_string($_REQUEST['Fecha_Fin']);
	  	$rrhh = $mysqli->real_escape_string($_REQUEST['RRHH']);
	  	require("procesarOcio.php");

	  	if($id_fiesta!==null){
	  		procesarFiestas::updateIdFiestas($id_fiesta);
	  		procesarOcio::updateIdOcio($id_fiesta);
	  	}
	  	else header("Location: ../errorCampos.php");

		if(($categoria!==null)&&($nombre_ocio!==null)&&($latitud!==null)&&($localizacion!==null)&&($longitud!==null)&&($descripcion!==null)&&($id_fiesta!==null)) {
			procesarOcio::updateOcio($id_fiesta,$nombre_ocio,$localizacion,$latitud,$longitud,$descripcion,$categoria);
		}
		else header("Location: ../errorCampos.php");

      				    
   		if(($id_fiesta!==null)&&($galeria!==null)&&($imagen!==null)&&($link!==null)&&($fecha_ini!==null)&&($fecha_fin!==null)&&($rrhh!==null)) {
   			procesarFiestas::updateFiestas($id_fiesta,$imagen,$galeria,$link,$fecha_ini,$fecha_fin,$rrhh);
	    }
    	else
    		header("Location: ../errorCampos.php");
	}
       
    mysqli_close();
    header("Location: ../ocio.php");
?>