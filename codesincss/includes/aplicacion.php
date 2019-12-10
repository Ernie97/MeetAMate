<?php

/**
 * Clase que mantiene el estado global de la aplicación.
 */
class Aplicacion
{
	private static $instancia;
	
	/**
	 * Permite obtener una instancia de <code>Aplicacion</code>.
	 * 
	 * @return Applicacion Obtiene la única instancia de la <code>Aplicacion</code>
	 */
	public static function getSingleton() {
		if (  !self::$instancia instanceof self) {
			self::$instancia = new self;
		}
		return self::$instancia;
	}

	/**
	 * @var array Almacena los datos de configuración de la BD
	 */
	private $bdDatosConexion;
	
	/**
	 * Almacena si la Aplicacion ya ha sido inicializada.
	 * 
	 * @var boolean
	 */
	private $inicializada = false;
	
	/**
	 * @var \mysqli Conexión de BD.
	 */
	private $mysqli;
	
	/**
	 * Evita que se pueda instanciar la clase directamente.
	 */
	private function __construct() {
	}
	
	/**
	 * Evita que se pueda utilizar el operador clone.
	 */
	private function __clone()
	{
	    parent::__clone();
	}
	
	/**
	 * Evita que se pueda utilizar unserialize().
	 */
	private function __wakeup()
	{
	    return parent::__wakeup();
	}
	
	/**
	 * Inicializa la aplicación.
	 * 
	 * @param array $bdDatosConexion datos de configuración de la BD
	 */
	public function init($bdDatosConexion)
	{
        if ( ! $this->inicializada ) {
    	    $this->bdDatosConexion = $bdDatosConexion;
    		$this->inicializada = true;
        }
	}
	
	/**
	 * Cierre de la aplicación.
	 */
	public function shutdown()
	{
	    $this->compruebaInstanciaInicializada();
	    if ($this->mysqli !== null) {
	        $this->mysqli->close();
	    }
	}
	
	/**
	 * Comprueba si la aplicación está inicializada. Si no lo está muestra un mensaje y termina la ejecución.
	 */
	private function compruebaInstanciaInicializada()
	{
	    if (! $this->inicializada ) {
	        echo "Aplicacion no inicializa";
	        exit();
	    }
	}
	
	/**
	 * Devuelve una conexión a la BD. Se encarga de que exista como mucho una conexión a la BD por petición.
	 * 
	 * @return \mysqli Conexión a MySQL.
	 */
	public function conexionBd()
	{
	    $this->compruebaInstanciaInicializada();
		if (! $this->mysqli ) {
			$bdHost = $this->bdDatosConexion['host'];
			$bdUser = $this->bdDatosConexion['user'];
			$bdPass = $this->bdDatosConexion['pass'];
			$bd = $this->bdDatosConexion['bd'];
			
			$this->mysqli = new \mysqli($bdHost, $bdUser, $bdPass, $bd);
			if ( $this->mysqli->connect_errno ) {
				echo "Error de conexión a la BD: (" . $this->mysqli->connect_errno . ") " . utf8_encode($this->mysqli->connect_error);
				exit();
			}
			if ( ! $this->mysqli->set_charset("utf8mb4")) {
				echo "Error al configurar la codificación de la BD: (" . $this->mysqli->errno . ") " . utf8_encode($this->mysqli->error);
				exit();
			}
		}
		return $this->mysqli;
	}
}