<?php
require_once "includes/config.php";

class procesarUsuarios{

	public $usuariosArray = array();
	public $usuariosArraySize = 0;
	public $infoUsuarios = array();
	public $infoUsuariosSize = 0;
	public $fiestasProx = array();
	public $fiestasProxSize = 0;
	public $fiestasPasadas = array();
	public $fiestasPasadasSize = 0;
	public $quedadasProx = array();
	public $quedadasProxSize = 0;
	public $quedadasPasadas = array();
	public $quedadasPasadasSize = 0;

	public function getUsuarios() {
		$app = Aplicacion::getSingleton();
        $mysqli = $app->conexionBd();
		$i = 0;
		$sql = "SELECT * FROM formulario";
		$resultado = $mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__‐1));

		while($fila = mysqli_fetch_assoc($resultado)) { 
			$this->usuariosArray[$i] = $fila;
			$i = $i + 1;
			$this->usuariosArraySize = $this->usuariosArraySize + 1;
		} 
		$j=0;
		$sql2 = "SELECT ID_Usuario, Nick_Name, Nombre_Usuario, Primer_Apellido, Segundo_Apellido, Imagen_Perfil, Fecha_Nacimiento, Correo, Telefono FROM usuario WHERE Test=1";
		$resultado = $mysqli->query($sql2) or die ($mysqli->error. " en la línea ".(__LINE__‐1));

		while($fila = mysqli_fetch_assoc($resultado)) { 
			$this->infoUsuarios[$j] = $fila;
			$j = $j + 1;
			$this->infoUsuariosSize = $this->infoUsuariosSize + 1;
		}
	}

	public function getEventos($id){
		$mysqli = new mysqli('localhost', 'root', '', 'meetamate');
			if ( mysqli_connect_errno() ) {
				echo "Error de conexión a la BD: ".mysqli_connect_error();
				exit();
			}
			else{
				
				$mysqli->set_charset("utf8");
				$sql = "SELECT * FROM partecipantes, fiestas, ocios WHERE ID_Usuario=$id AND partecipantes.ID_Ocio=ID_Fiesta AND ocios.ID_Ocio=ID_Fiesta AND Fecha_Inicio >= NOW()";
				$resultado = $mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__‐1));
				$sql1 = "SELECT * FROM partecipantes, quedadas, ocios WHERE ID_Usuario=$id AND partecipantes.ID_Ocio=ID_Quedada AND ocios.ID_Ocio=ID_Quedada AND Fecha_Inicio >= NOW()";
				$resultado1 = $mysqli->query($sql1) or die ($mysqli->error. " en la línea ".(__LINE__‐1));

				$i=0;
				while($fila = mysqli_fetch_assoc($resultado)) { 
					$this->fiestasProx[$i] = $fila;
					$i = $i + 1;
					$this->fiestasProxSize = $this->fiestasProxSize + 1;
				} 

				$i = 0;
				while($fila1 = mysqli_fetch_assoc($resultado1)) { 
					$this->quedadasProx[$i] = $fila1;
					$i = $i + 1;
					$this->quedadasProxSize = $this->quedadasProxSize + 1;
				} 

				$sql2 = "SELECT * FROM partecipantes, fiestas, ocios WHERE ID_Usuario=$id AND partecipantes.ID_Ocio=ID_Fiesta AND ocios.ID_Ocio=ID_Fiesta AND Fecha_Inicio < NOW()";
				$resultado2 = $mysqli->query($sql2) or die ($mysqli->error. " en la línea ".(__LINE__‐1));
				$sql3 = "SELECT * FROM partecipantes, quedadas, ocios WHERE ID_Usuario=$id AND partecipantes.ID_Ocio=ID_Quedada AND ocios.ID_Ocio=ID_Quedada AND Fecha_Inicio < NOW()";
				$resultado3 = $mysqli->query($sql3) or die ($mysqli->error. " en la línea ".(__LINE__‐1));

				$i=0;
				while($fila2 = mysqli_fetch_assoc($resultado2)) { 
					$this->fiestasPasadas[$i] = $fila2;
					$i = $i + 1;
					$this->fiestasPasadasSize = $this->fiestasPasadasSize + 1;
				} 

				$i = 0;
				while($fila3 = mysqli_fetch_assoc($resultado3)) { 
					$this->quedadasPasadas[$i] = $fila3;
					$i = $i + 1;
					$this->quedadasPasadasSize = $this->quedadasPasadasSize + 1;
				} 

			}
			$mysqli->close();
		}

}

?>