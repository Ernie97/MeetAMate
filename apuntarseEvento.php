<?php


$mysqli = new mysqli('localhost', 'root', '', 'meetamate');
	
	if ( mysqli_connect_errno() ) {
		echo "Error de conexión a la BD: ".mysqli_connect_error();
		exit();
	}
	else{
		$mysqli->set_charset("utf8");
		$id_usuario = $_GET['id_usuario'];
		$id_evento = $_GET['id_evento'];
		$tipo = $_GET['tipo'];                // 0 por apuntarse, 1 por desapuntarse
		
		
		
		if($tipo==1){
			$sql = "DELETE FROM partecipantes WHERE ID_Usuario = $id_usuario AND ID_Ocio = $id_evento";
				$mysqli->query($sql);
				$mysqli->close();
			header("Location: perfil.php");
			}

}
	?>