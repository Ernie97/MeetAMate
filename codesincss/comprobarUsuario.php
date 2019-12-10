<?php
session_start();
require_once "includes/config.php";
require_once "includes/usuario.php";

$username = $_GET['user'];
$usuario = Usuario::buscaUsuario($username);
if ($usuario)
	echo "Ese nombre de usuario ya existe.";
else
	echo "Nombre de usuario disponible.";
?>