<?php


$mysqli = new mysqli('localhost', 'root', '', 'meetamate');
	
	if ( mysqli_connect_errno() ) {
		echo "Error de conexión a la BD: ".mysqli_connect_error();
		exit();
	}
	else{
		$mysqli->set_charset("utf8");
		$id1 = $_GET['id1'];
		$id2 = $_GET['id2'];
		$tipo = $_GET['tipo'];
		
		
		
		if($tipo==1){
			$sql = "INSERT INTO companieros (Usuario1, Usuario2, 1PuedeVer2, 2PuedeVer1)
				    VALUES ('$id1', '$id2', 0, 1)";

				$mysqli->query($sql);
				$mysqli->close();
				
			
			header("Location: ../index.php");
			}
		else if($tipo==2){
			$sql= "UPDATE companieros SET 1PuedeVer2 =1 WHERE  Usuario1 = '$id1' AND Usuario2='$id2'";
			$mysqli->query($sql);
			$mysqli->close();
			header("Location: ../peticion.php");

		}
		else if($tipo==3){
			$sql="DELETE FROM companieros WHERE Usuario1 = '$id1' AND Usuario2='$id2'";
			$mysqli->query($sql);
			$mysqli->close();
			header("Location: ../peticion.php");
		}
		else if($tipo==4){
			$sql= "UPDATE companieros SET 2PuedeVer1 =0 WHERE  Usuario1 = '$id1' AND Usuario2='$id2'";
			$mysqli->query($sql);
			$mysqli->close();
			header("Location: ../peticion.php");

		}
		
		
	

}
	?>