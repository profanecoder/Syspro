<?php  
  class db_conexion {

  	function __construct() {
  		$this->conectar();
  	}

  	function __destruct() {
  		$this->db_cerrar();
  	}

  	public function conectar() {
  		// importamos los parametros de la conexion.
  		require_once 'parametros.php';

        // Conexion con el drivers MYSQLI
  		$conexion = mysqli_connect(db_servidor,db_usuario,db_contrasena,db_base) 
  		or die ('sin conexion a la base de datos');

        // retornamos la conexion de la base de datos.
  		return $conexion;
  	}

  	public function db_cerrar() {
  		// cerrar la conexion de la base de datos
        mysqli_close($this->conectar());
  	}
  }
?>