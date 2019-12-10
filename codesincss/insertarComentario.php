<?php
	session_start();
	$mysqli = new mysqli('localhost', 'root', '', 'meetamate');
	
	if ( mysqli_connect_errno() ) {
		echo "Error de conexión a la BD: ".mysqli_connect_error();
		exit();
	}
	else{
		$mysqli->set_charset("utf8");
		$valoracion = $mysqli->real_escape_string($_POST["valoracion"]);
		$comentario = $mysqli->real_escape_string($_POST["comment"]);
		$id = $_GET['id'];
		$idUsuario = $_SESSION['idUser'];
		$tipo = $_GET['tipo'];
		
		if(empty($valoracion))
			header("Location: ../errorComentario.php");
		else{
			if ($comentario=="Pon aquí tu comentario...")
				$comentario = NULL;
			$sql = "INSERT INTO comentarios (ID_Ocio, ID_Usuario, Valoracion, Comentario)
				    VALUES ('$id', '$idUsuario', '$valoracion', '$comentario')";
				
			if(!$mysqli->query($sql)) {
				header("Location: ../errorComentario.php");
			}
			else{
				header("Location: ../index.php");
			}
		}
		
		$mysqli->close();
	}
?>