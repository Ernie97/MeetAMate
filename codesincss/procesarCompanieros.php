<?php 
include("procesarUsuarios.php");
class procesarCompanieros{
	private $obtenerDatos;
	public $arrayElegidos= array();
	public $tam=0;

	function procesar(){
		$this->obtenerDatos = new procesarUsuarios();
		$this->obtenerDatos->getUsuarios();
		$MismoSexoCompañeros;
		$MismaNacionalidad;
		$NoPetFriendly;
		$SoloCentro;
		$LeGustaLaFiesta;
		$BuscaTranquilidad;
		$HablaEspañol;
		$HablaIngles;
		$EsFumador;
		//obteber datos propios
		for ($i=0; $i<$this->obtenerDatos->usuariosArraySize; $i++){
			if($this->obtenerDatos->usuariosArray[$i]['ID_Usuario'] == $_SESSION['idUser']){
				$MismoSexoCompañeros=$this->obtenerDatos->usuariosArray[$i]['Mismo_Sexo_Companeros'];
				$MismaNacionalidad=$this->obtenerDatos->usuariosArray[$i]['Misma_Nacionalidad'];
				$NoPetFriendly=$this->obtenerDatos->usuariosArray[$i]['No_Pet_Friendly'];
				$SoloCentro=$this->obtenerDatos->usuariosArray[$i]['Solo_Centro'];
				$LeGustaLaFiesta=$this->obtenerDatos->usuariosArray[$i]['Le_Gusta_Fiesta'];
				$BuscaTranquilidad=$this->obtenerDatos->usuariosArray[$i]['Busca_Tranquilidad'];
				$HablaEspañol=$this->obtenerDatos->usuariosArray[$i]['Se_Habla_Espanol'];
				$HablaIngles=$this->obtenerDatos->usuariosArray[$i]['Se_Habla_Ingles'];
				$EsFumador=$this->obtenerDatos->usuariosArray[$i]['Es_Fumador'];
				$NoFumadores=$this->obtenerDatos->usuariosArray[$i]['No_Fumadores'];
				break;
			}
			
		}
		$arrayElegidos2=array();
		$contadorArrayElegidos=0;
		//calificar datos del resto
		for ($i=0; $i<$this->obtenerDatos->usuariosArraySize; $i++){
			$compatibilidad=0;
			if($this->obtenerDatos->usuariosArray[$i]['ID_Usuario'] != $_SESSION['idUser']){
				if($MismoSexoCompañeros==$this->obtenerDatos->usuariosArray[$i]['Mismo_Sexo_Companeros'])
					$compatibilidad=$compatibilidad+1;
				if($MismaNacionalidad==$this->obtenerDatos->usuariosArray[$i]['Misma_Nacionalidad'])
					$compatibilidad=$compatibilidad+1;
				if($NoPetFriendly==$this->obtenerDatos->usuariosArray[$i]['No_Pet_Friendly'])
					$compatibilidad=$compatibilidad+1;
				if($SoloCentro==$this->obtenerDatos->usuariosArray[$i]['Solo_Centro'])
					$compatibilidad=$compatibilidad+1;
				if($LeGustaLaFiesta==$this->obtenerDatos->usuariosArray[$i]['Le_Gusta_Fiesta'])
					$compatibilidad=$compatibilidad+1;
				if($BuscaTranquilidad==$this->obtenerDatos->usuariosArray[$i]['Busca_Tranquilidad'])
					$compatibilidad=$compatibilidad+1;
				if($HablaEspañol==$this->obtenerDatos->usuariosArray[$i]['Se_Habla_Espanol'])
					$compatibilidad=$compatibilidad+1;
				if($HablaIngles==$this->obtenerDatos->usuariosArray[$i]['Se_Habla_Ingles'])
					$compatibilidad=$compatibilidad+1;
				if($EsFumador==$this->obtenerDatos->usuariosArray[$i]['Es_Fumador'])
					$compatibilidad=$compatibilidad+1;
				if($NoFumadores==$this->obtenerDatos->usuariosArray[$i]['No_Fumadores'])
					$compatibilidad=$compatibilidad+1;
				if($compatibilidad>5){
					$arrayElegidos2[$contadorArrayElegidos]['ID_Usuario']=$this->obtenerDatos->usuariosArray[$i]['ID_Usuario'];
					$arrayElegidos2[$contadorArrayElegidos]['Mismo_Sexo_Companeros']=$this->obtenerDatos->usuariosArray[$i]['Mismo_Sexo_Companeros'];
					$arrayElegidos2[$contadorArrayElegidos]['Misma_Nacionalidad']=$this->obtenerDatos->usuariosArray[$i]['Misma_Nacionalidad'];
					$arrayElegidos2[$contadorArrayElegidos]['No_Pet_Friendly']=$this->obtenerDatos->usuariosArray[$i]['No_Pet_Friendly'];
					$arrayElegidos2[$contadorArrayElegidos]['Solo_Centro']=$this->obtenerDatos->usuariosArray[$i]['Solo_Centro'];
					$arrayElegidos2[$contadorArrayElegidos]['Le_Gusta_Fiesta']=$this->obtenerDatos->usuariosArray[$i]['Le_Gusta_Fiesta'];
					$arrayElegidos2[$contadorArrayElegidos]['Busca_Tranquilidad']=$this->obtenerDatos->usuariosArray[$i]['Busca_Tranquilidad'];
					$arrayElegidos2[$contadorArrayElegidos]['Se_Habla_Espanol']=$this->obtenerDatos->usuariosArray[$i]['Se_Habla_Espanol'];
					$arrayElegidos2[$contadorArrayElegidos]['Se_Habla_Ingles']=$this->obtenerDatos->usuariosArray[$i]['Se_Habla_Ingles'];
					$arrayElegidos2[$contadorArrayElegidos]['Es_Fumador']=$this->obtenerDatos->usuariosArray[$i]['Es_Fumador'];
					$arrayElegidos2[$contadorArrayElegidos]['Perfil_Publico']=$this->obtenerDatos->usuariosArray[$i]['Perfil_Publico'];
					$arrayElegidos2[$contadorArrayElegidos]['Compatibilidad']=$compatibilidad*100/10;
					$arrayElegidos2[$contadorArrayElegidos]['No_Fumadores']=$this->obtenerDatos->usuariosArray[$i]['No_Fumadores'];
					$arrayElegidos2[$contadorArrayElegidos]['Presupuesto_Max']=$this->obtenerDatos->usuariosArray[$i]['Presupuesto_Max'];

					for($j=0; $j<$this->obtenerDatos->infoUsuariosSize; $j++){
						
						if(isset($this->obtenerDatos->infoUsuarios[$j]['ID_Usuario'])){
						if($arrayElegidos2[$contadorArrayElegidos]['ID_Usuario']==$this->obtenerDatos->infoUsuarios[$j]['ID_Usuario']){

							$arrayElegidos2[$contadorArrayElegidos]['Nick_Name']=$this->obtenerDatos->infoUsuarios[$j]['Nick_Name'];
							$arrayElegidos2[$contadorArrayElegidos]['Nombre_Usuario']=$this->obtenerDatos->infoUsuarios[$j]['Nombre_Usuario'];
							$arrayElegidos2[$contadorArrayElegidos]['Primer_Apellido']=$this->obtenerDatos->infoUsuarios[$j]['Primer_Apellido'];
							$arrayElegidos2[$contadorArrayElegidos]['Segundo_Apellido']=$this->obtenerDatos->infoUsuarios[$j]['Segundo_Apellido'];
							$arrayElegidos2[$contadorArrayElegidos]['Imagen_Perfil']=$this->obtenerDatos->infoUsuarios[$j]['Imagen_Perfil'];
							$arrayElegidos2[$contadorArrayElegidos]['Fecha_Nacimiento']=$this->obtenerDatos->infoUsuarios[$j]['Fecha_Nacimiento'];
							$arrayElegidos2[$contadorArrayElegidos]['Correo']=$this->obtenerDatos->infoUsuarios[$j]['Correo'];
							$arrayElegidos2[$contadorArrayElegidos]['Telefono']=$this->obtenerDatos->infoUsuarios[$j]['Telefono'];
							break;
						}
						}
					}
					$contadorArrayElegidos=$contadorArrayElegidos+1;

				}
			}
		}
		$contadorSeleccionados=0;
		if($contadorArrayElegidos>0){
		$arraySeleccionados=array();
		
		for($compatibilidad=9; ((100*$compatibilidad/10)>(100*5/10)) && $contadorSeleccionados<6; $compatibilidad--){
			for($i=0; $i<$contadorArrayElegidos && $contadorSeleccionados<6; $i++){
			
				if($arrayElegidos2[$i]['Compatibilidad']==(100*$compatibilidad/10)){
					$arraySeleccionados[$contadorSeleccionados]=$arrayElegidos2[$i];
					$contadorSeleccionados=$contadorSeleccionados+1;

				}
					
			}

		}
		}
		if($contadorSeleccionados>0)
		$this->arrayElegidos=$arraySeleccionados;
		$this->tam=$contadorSeleccionados;

	}

}


?>