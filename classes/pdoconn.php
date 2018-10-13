<?php
require_once 'constantes.php';

class PDOCONN extends PDO{

	static protected $_instance;

	public function __construct(){
		return parent::__construct(DSN, USERNAME, PASSWORD);
	}

	static public function getInstance(){
		if(!isset(self::$_instance)){
			self::$_instance = new self(DSN, USERNAME, PASSWORD);
		}
		return self::$_instance;
	}

	public function __destruct(){}
}


?>