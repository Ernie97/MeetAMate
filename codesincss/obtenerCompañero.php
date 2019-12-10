<?php


class obtenerCompañero{


	public $datosTest = array();
	public $datosPersonales = array();


	public function obtenerDatos($id){

		$mysqli = new mysqli('localhost', 'root', '', 'meetamate');
		if ( mysqli_connect_errno() ) {
			echo "Error de conexión a la BD: ".mysqli_connect_error();
			exit();
		}
		else{
			$mysqli->set_charset("utf8");
			$i = 0;
			$sql = "SELECT * FROM formulario WHERE ID_Usuario=$id";
			$resultado = $mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__‐1));

			$fila = mysqli_fetch_assoc($resultado);
				$this->datosTest = $fila;
	
			} 
			$j=0;
			$sql2 = "SELECT ID_Usuario, Nick_Name, Nombre_Usuario, Primer_Apellido, Segundo_Apellido, Imagen_Perfil, Fecha_Nacimiento, Correo, Telefono FROM usuario WHERE ID_usuario=$id";
			$resultado = $mysqli->query($sql2) or die ($mysqli->error. " en la línea ".(__LINE__‐1));

			$fila = mysqli_fetch_assoc($resultado);
				$this->datosPersonales = $fila;
				$mysqli->close();
				
			} 

		
		
	



	}











 

?>