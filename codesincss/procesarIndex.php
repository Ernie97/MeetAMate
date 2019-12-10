<?php
require_once "includes/config.php";

class procesarIndex{

	public $indexArray = array();

	public function getIndex() {
		$app = Aplicacion::getSingleton();
        $mysqli = $app->conexionBd();

		$i = 0;
		$sql = "SELECT Nombre_Ocio as 'Nombre del evento', Descripcion FROM quedadas, ocios WHERE ID_Ocio = ID_Quedada order by RAND() LIMIT 2";

		$resultado = $mysqli->query($sql);

		while($fila = mysqli_fetch_assoc($resultado)) { 
			$this->indexArray[$i] = $fila;
			$i = $i + 1;
		}

		$sql1 = "SELECT Nombre_Ocio as 'Nombre del evento', Descripcion FROM pubs, ocios WHERE ID_Ocio = ID_Pub order by RAND() LIMIT 2";

		$resultado1 = $mysqli->query($sql1);

		while($fila1 = mysqli_fetch_assoc($resultado1)) { 
			$this->indexArray[$i] = $fila1;
			$i = $i + 1;
		}

		$sql3 = "SELECT Nombre_Ocio as 'Nombre del evento', Descripcion FROM discotecas, ocios WHERE ID_Ocio = ID_Disco order by RAND() LIMIT 2";	

		$resultado3 = $mysqli->query($sql3);

		while($fila3 = mysqli_fetch_assoc($resultado3)) { 
			$this->indexArray[$i] = $fila3;
			$i = $i + 1;
		}

			
		$sql4 = "SELECT Nombre_Ocio as 'Nombre del evento', Descripcion FROM fiestas, ocios WHERE ID_Ocio = ID_Fiesta order by RAND() LIMIT 2";

		$resultado4 = $mysqli->query($sql4);

		while($fila4 = mysqli_fetch_assoc($resultado4)) { 
			$this->indexArray[$i] = $fila4;
			$i = $i + 1;
		}

	}
}

?>
