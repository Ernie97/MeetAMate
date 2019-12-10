<?php

  session_start();
  require_once "includes/config.php";

	$app = Aplicacion::getSingleton();
    $mysqli = $app->conexionBd();
  	$user = $mysqli->real_escape_string($_SESSION["idUser"]);
  	require("procesarTest.php");

  	procesarTest::getTest($user);

	
	if($valor[0] == 0){

		if($user!==null)
			procesarTest::insertarTest($user);
		else
			header("Location: ../errorTest.php");

		$fechaIn = $mysqli->real_escape_string($_REQUEST['fecha_inicio']);	    
		$fechaFin = $mysqli->real_escape_string($_REQUEST['fecha_fin']);
	    $presMin = $mysqli->real_escape_string($_REQUEST['presupuesto_min']);
	    $presMax = $mysqli->real_escape_string($_REQUEST['presupuesto_max']);
	    $sexo = $mysqli->real_escape_string($_REQUEST['sexo']);
	    $nacionalidad = $mysqli->real_escape_string($_REQUEST['nacionalidad']);
	    $fumador = $mysqli->real_escape_string($_REQUEST['fumador']);
	    $no_fumadores = $mysqli->real_escape_string($_REQUEST['no_fumadores']);
	    $mascotas = $mysqli->real_escape_string($_REQUEST['mascotas']);
	    $centro = $mysqli->real_escape_string($_REQUEST['centro']);
	    $fiestas = $mysqli->real_escape_string($_REQUEST['fiestas']);
	    $tranquilidad = $mysqli->real_escape_string($_REQUEST['tranquilidad']);
	    $espanol = $mysqli->real_escape_string($_REQUEST['espanol']);
	    $ingles = $mysqli->real_escape_string($_REQUEST['ingles']);
	    $idioma1 = $mysqli->real_escape_string($_REQUEST['Idioma1']);
	    $idioma2 = $mysqli->real_escape_string($_REQUEST['Idioma2']);
	    $idioma3 = $mysqli->real_escape_string($_REQUEST['Idioma3']);
	    $idioma4 = $mysqli->real_escape_string($_REQUEST['Idioma4']);
	    $perfil_publico = $mysqli->real_escape_string( $_REQUEST['perfil_publico']);

	   	procesarTest::updateTest($user,$fechaIn,$fechaFin,$presMin,$presMax,$sexo,$nacionalidad,$fumador,$no_fumadores,$mascotas,$centro,$fiestas,$tranquilidad,$espanol,$ingles,$idioma1,$idioma2,$idioma3,$idioma4,$perfil_publico);
    
	    mysqli_close();

	    $_SESSION['testCompletado'] = TRUE;

	    header("Location: ../index.php");
	}
	else
		header("Location: ../errorTest.php");

?>