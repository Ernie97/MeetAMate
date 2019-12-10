<?php

  $mysqli = @mysqli_connect('localhost','root','','meetamate');

  if (!$mysqli)
    printf('Error %d: %s <br/>',mysqli_connect_errno(),mysqli_connect_error());

  else {

	  	$mysqli->set_charset("utf8");

	  	$tipo_evento = $mysqli->real_escape_string($_REQUEST['Tipo_Evento']);
		if(null!==$tipo_evento) {
	      	if($tipo_evento=='fiesta'){
	      		$categoria = 2;
	      	}
	      	else if($tipo_evento=='discoteca'){
	      		$categoria = 1;
	      	}
	 		else if($tipo_evento=='quedada'){
	      		$categoria = 4;
	      	}
	      	else if($tipo_evento=='pub'){
	      		$categoria = 3;
	      	}
	      	else if($tipo_evento=='quedadaE'){
	      		$categoria = 4;
	      	}
	    }
	    $nombre_ocio = $mysqli->real_escape_string($_REQUEST['Nombre_Ocio']);
	  	$localizacion = $mysqli->real_escape_string($_REQUEST['Localizacion']);
		$latitud = $mysqli->real_escape_string($_REQUEST['Latitud']);
		$longitud = $mysqli->real_escape_string($_REQUEST['Longitud']);
		$descripcion = $mysqli->real_escape_string($_REQUEST['Descripcion']);

		require("procesarOcio.php");
		$id = procesarOcio::insertarOcio($categoria);

		if(($categoria!==null)&&($nombre_ocio!==null)&&($localizacion!==null)&&($id!==null)) {
			if ($latitud == null && $longitud == null) {
				$latitud = 40.41667;
				$longitud = -3.70389;
			}
			procesarOcio::updateOcio($id,$nombre_ocio,$localizacion,$latitud,$longitud,$descripcion,$categoria);
		}
		else {
			header("Location: ../errorCampos.php");
		}

	   	if($tipo_evento=='fiesta'){
	   		require("procesarFiestas.php");

			if (!isset($_FILES['Imagen']) || !is_uploaded_file($_FILES['Imagen']['tmp_name'])) {
	  			$imagen_name = "defecto.jpg";
			}

			else {
				$uploaddir = './../img_ocio/';
				$fichero_subido = $uploaddir.$nombre_ocio.".jpg";
				$imagen_name = $nombre_ocio.".jpg";
				$imagen_tmp = $_FILES['Imagen']['tmp_name'];

				if (!move_uploaded_file($imagen_tmp, $fichero_subido)) {
					header("Location: ../errorCampos.php");
				}
			}

		  	$id_fiesta = $id;
		  	$link = $mysqli->real_escape_string($_REQUEST['Link']);
		  	$fecha_ini = $mysqli->real_escape_string($_REQUEST['Fecha_Inicio']);
		  	$fecha_fin = $mysqli->real_escape_string($_REQUEST['Fecha_Fin']);
		  	$rrhh = $mysqli->real_escape_string($_REQUEST['RRHH']);

	   		if(null!==$id_fiesta) {
			  	procesarFiestas::insertarFiestas($id_fiesta);
	   		}
		    else {
		    	header("Location: ../errorCampos.php");		    
		    }
	   		if(($id_fiesta!==null)&&($imagen_name!==null)&&($link!==null)&&($fecha_ini!==null)&&($fecha_fin!==null)&&($rrhh!==null)) {
	   			procesarFiestas::updateFiestas($id_fiesta,$imagen_name,$link,$fecha_ini,$fecha_fin,$rrhh);
		    }
	    	else {
	    		header("Location: ../errorCampos.php");
	    	}
		}

	   	else if($tipo_evento=='discoteca'){
	    	require("procesarDiscos.php");

	    	if (!isset($_FILES['Imagen']) || !is_uploaded_file($_FILES['Imagen']['tmp_name'])) {
	  			$imagen_name = "defecto.jpg";  
			}

			else {
				$uploaddir = './../img_ocio/';
				$fichero_subido = $uploaddir.$nombre_ocio.".jpg";
				$imagen_name = $nombre_ocio.".jpg";
				$imagen_tmp = $_FILES['Imagen']['tmp_name'];

				if (!move_uploaded_file($imagen_tmp, $fichero_subido)) {
					header("Location: ../errorCampos.php");
				}
			}

			$id_disco=$id;

		  	$link = $mysqli->real_escape_string($_REQUEST['Link']);

	   		if(null!==$id_disco) {
			  	procesarDiscos::insertarDiscos($id_disco);
	   		}
		    else {
		    	header("Location: ../errorCampos.php");
		    }
			if(($id_disco!==null)&&($imagen_name!==null)&&($localizacion!==null)){
	    		procesarDiscos::updateDiscos($id_disco,$imagen_name,$link);
		    }
		    else {
	    		header("Location: ../errorCampos.php");
		    }
	    }
	      
	    else if($tipo_evento=='quedada'){
	    	require("procesarQuedadas.php");
	    	$id_quedada = $id;
		  	$fecha_ini = $mysqli->real_escape_string($_REQUEST['Fecha_Inicio']);
		  	$fecha_fin = $mysqli->real_escape_string($_REQUEST['Fecha_Fin']);
		  	$organizador = $mysqli->real_escape_string($_REQUEST['Organizador']);

	    	if(null!==$id_quedada) {
    		  	procesarQuedadas::insertarQuedadas($id_quedada);
	   		}
	    	if(($id_quedada!==null)&&($organizador!==null)&&($fecha_ini!==null)&&($localizacion!==null)) {

	    		procesarQuedadas::updateQuedadas($id_quedada,$fecha_ini,$fecha_fin,$organizador);
		    }
	    }

	    else if($tipo_evento=='pub'){
	    	require("procesarPubs.php");

	    	if (!isset($_FILES['Imagen']) || !is_uploaded_file($_FILES['Imagen']['tmp_name'])) {
	  			$imagen_name = "defecto.jpg";  
			}

			else {
				$uploaddir = './../img_ocio/';
				$fichero_subido = $uploaddir.$nombre_ocio.".jpg";
				$imagen_name = $nombre_ocio.".jpg";
				$imagen_tmp = $_FILES['Imagen']['tmp_name'];

				if (!move_uploaded_file($imagen_tmp, $fichero_subido)) {
					header("Location: ../errorCampos.php");
				}
			}

	    	$id_pub=$id;
		  	$link = $mysqli->real_escape_string($_REQUEST['Link']);

		  	echo "$link imagen_name";
	    	
	    	if(null!==$id_pub) {
	    		procesarPubs::insertarPubs($id_pub);

	   		}
			if(($id_pub!==null)&&($imagen_name!==null)&&($localizacion!==null)){
	    		procesarPubs::updatePubs($id_pub,$imagen_name,$link);
		    }
		    else {
	    		header("Location: ../errorCampos.php");
		    }
	    }
	      	
	    else{
	    	require("procesarQuedadas.php");
	    	$id_quedada = $mysqli->real_escape_string($_REQUEST["ID_Quedada"]);
		  	$fecha_ini = $mysqli->real_escape_string($_REQUEST['Fecha_Inicio']);
		  	$fecha_fin = $mysqli->real_escape_string($_REQUEST['Fecha_Fin']);
		  	$organizador = $mysqli->real_escape_string($_REQUEST['Organizador']);
		  	$idioma = $mysqli->real_escape_string($_REQUEST['Idioma']);

	    	if(null!==$id_quedada) {
    		  	procesarQuedadas::insertarQuedadas($id_quedada);
	   		}
	    	if(($id_quedada!==null)&&($organizador!==null)&&($idioma!==null)&&($fecha_ini!==null)) {

	    		procesarQuedadas::updateErasmus($id_quedada,$fecha_ini,$fecha_fin,$organizador,$idioma);
		    }
		    else {
	    		header("Location: ../errorCampos.php");
		    }	      	
	    }
	}
       
    mysqli_close();
    header("Location: ../ocio.php");
?>