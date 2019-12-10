<?php
require_once "includes/config.php";
$id = $_GET['id'];
$tipo = $_GET['tipo'];
$app = Aplicacion::getSingleton();
$mysqli = $app->conexionBd();
switch($tipo){
			case 0: {
				require("procesarQuedadas.php");
				procesarQuedadas::borrarQuedadas($id);

			};break;
			case 1: {
				require("procesarPubs.php");
				procesarPubs::borrarPubs($id);

			};break;
			case 2: {
				require("procesarFiestas.php");
				procesarFiestas::borrarFiestas($id);

			};break;
			case 3:{
				require("procesarDiscos.php");
				procesarDiscos::borrarDiscos($id);

			};break;
			default:{
				require("procesarResidencias.php");
				procesarResidencias::borrarResidencias($id);

			};
}
header('Location: ../eventoBorrado.php');
?>