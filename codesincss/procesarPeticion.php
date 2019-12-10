<?php

	class procesarPeticion{

	public $petEnviadasArray = array();
	public $petEnviadasArraySize=0;
	public $petRecibidas = array();
	public $petRecibidasArraySize =0;
	public $petRechazadas = array();
	public $petRechazadasArraySize =0;



public function getPeticiones($id){
	$mysqli = new mysqli('localhost', 'root', '', 'meetamate');
		if ( mysqli_connect_errno() ) {
			echo "Error de conexión a la BD: ".mysqli_connect_error();
			exit();
		}
		else{
			
			$mysqli->set_charset("utf8");
			$i = 0;
			$sql = "SELECT * FROM companieros WHERE Usuario1=$id AND 2PuedeVer1=1";
			$resultado = $mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__‐1));

			while($fila = mysqli_fetch_assoc($resultado)) { 
				$this->petEnviadasArray[$i] = $fila;
				$i = $i + 1;
				$this->petEnviadasArraySize = $this->petEnviadasArraySize + 1;
			
			} 
			$i=0;
			$sql2 = "SELECT * FROM companieros WHERE Usuario2=$id AND 2PuedeVer1=1";
			$resultado = $mysqli->query($sql2) or die ($mysqli->error. " en la línea ".(__LINE__‐1));

			while($fila = mysqli_fetch_assoc($resultado)) { 
				$this->petRecibidas[$i] = $fila;
				$i = $i + 1;
				$this->petRecibidasArraySize = $this->petRecibidasArraySize + 1;
			} 
			$i=0;
			$sql3 = "SELECT * FROM companieros WHERE Usuario1=$id AND 2PuedeVer1=0";
			$resultado = $mysqli->query($sql3) or die ($mysqli->error. " en la línea ".(__LINE__‐1));

			while($fila = mysqli_fetch_assoc($resultado)) { 
				$this->petRechazadas[$i] = $fila;
				$i = $i + 1;
				$this->petRechazadasArraySize = $this->petRechazadasArraySize + 1;
			} 

		}
		$mysqli->close();
	}

public function existePeticion($id1, $id2){
		$mysqli = new mysqli('localhost', 'root', '', 'meetamate');
		if ( mysqli_connect_errno() ) {
			echo "Error de conexión a la BD: ".mysqli_connect_error();
			exit();
		}
		else{
			
			$mysqli->set_charset("utf8");
			$sql = "SELECT * FROM companieros WHERE (Usuario1=$id1 AND Usuario2=$id2) OR (Usuario1=$id2 AND Usuario2=$id1)";
			$resultado = $mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__‐1));
			$num= mysqli_num_rows($resultado); 
			if($num==0)
				return 1;//no existe peticion
			else{
				$fila = mysqli_fetch_assoc($resultado);
				if($fila['Usuario1']==$id1 && $fila['1PuedeVer2']==0)
					return 0;//existe peticion -> no mostrar
				else if($fila['Usuario2']==$id1 && $fila['1PuedeVer2']==0 &&  $fila['2PuedeVer1']==1)
					return 2;//aceptar o rechazar
				return 0;
			}
			 


}


}


public function getName($id){
	$mysqli = new mysqli('localhost', 'root', '', 'meetamate');
		if ( mysqli_connect_errno() ) {
			echo "Error de conexión a la BD: ".mysqli_connect_error();
			exit();
		}
		else{
			$mysqli->set_charset("utf8");
			$idd=$id;
			$sql3="SELECT Nick_Name FROM usuario WHERE ID_Usuario=$idd";
			$resultado = $mysqli->query($sql3) or die ($mysqli->error. " en la línea ".(__LINE__‐1));
			$fila=mysqli_fetch_assoc($resultado);
			return $fila['Nick_Name'];
		}
}


}







	






?>