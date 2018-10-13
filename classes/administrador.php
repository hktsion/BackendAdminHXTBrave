<?php

require_once( 'constantes.php' );
require_once( 'crudinterface.php' );
require_once( 'crud.php' );


class ADMINISTRADOR extends CRUD {

	public $user;
	public $pass;
	static protected $_instance;

	public function __construct($user, $pass){
		$this->user = $user;
		$this->pass = $pass;
	}

	static public function getInstance(){
		if(!isset(self::$_instance)){
			self::$_instance = new self($this->user, $this->pass);
		}
		return self::$_instance;
	}

	public function __destruct(){ }
	public function getNombre(){ return $this->user; }
	public function getPass(){ return $this->pass; }
	public function update($datos){ return null; }
	public function insert(){ return null; }
	public function delete(){ return null; }


	//Selecciona administrador por usuario y password
	public function select($null){
		$pdo = CRUD::get();		

		$st = $pdo->prepare(ADMIN_SELECT . " user =:user AND pass=:pass" .PHP_EOL);
		$st->execute( array( 
			':user'=>strtolower($this->user),
			':pass'=>strtolower($this->pass)
		));

		$fetch = $st->fetch(PDO::FETCH_ASSOC);	
		$rc = $st->rowCount();
		return array('numrows' => $rc, 'data' => $fetch);
	}


	//Selecciona todos los usuarios inscritos en la promoción(error + success)
	public function selectAll(){
		$pdo = CRUD::get();		
		$st = $pdo->prepare(SELECT_ALL_USERS.PHP_EOL );
		$st->execute();

		$fetch = $st->fetchAll(PDO::FETCH_ASSOC);	
		$rc = $st->rowCount();
		return array('numrows' => $rc, 'data' => $fetch);
	}


	//Recupera todos los usuarios para la paginación.
	public function selectAll_4paginator($inicio, $tamano_pagina){
		$pdo = CRUD::get();

		$sql = "SELECT * FROM usuarios LIMIT " . $inicio . ", " . $tamano_pagina .PHP_EOL;
		$st = $pdo->prepare($sql);
		$st->execute();

		$fetch = $st->fetchAll(PDO::FETCH_ASSOC);
		$rc = $st->rowCount();
		return array('numrows' => $rc, 'data' => $fetch);
	}


	//Recupera los usuarios fallidos
	public function getAllFailRegs(){
		$pdo = CRUD::get();

		$sql = "SELECT * FROM usuarios u, registros r WHERE u.id = r.idusuario" . PHP_EOL;
		$st = $pdo->prepare($sql);
		$st->execute();

		$fetch = $st->fetchAll(PDO::FETCH_ASSOC);
		$rc = $st->rowCount();
		return array('numrows' => $rc, 'data' => $fetch);
	}


	//Recupera los usuarios fallidos e incluye la paginación.
	public function selectAllFail_4paginator($inicio, $tamano_pagina){
		$pdo = CRUD::get();

		$sql = "SELECT * FROM usuarios u, registros r WHERE u.id = r.idusuario AND r.num_intentos >= 1 LIMIT " . $inicio . ", " . $tamano_pagina . PHP_EOL;
		$st = $pdo->prepare($sql);
		$st->execute();

		$fetch = $st->fetchAll(PDO::FETCH_ASSOC);
		$rc = $st->rowCount();
		return array('numrows' => $rc, 'data' => $fetch);
	}

	// Recupera el NÚMERO DE REGISTROS de usuarios (error + success)
	public function getTotalRegs(){
		$pdo = CRUD::get();

		$st = $pdo->prepare(TOTAL_REGS);
		$st->execute();
		return $st->fetch(PDO::FETCH_ASSOC);
	}


	// Recupera el NÚMERO DE REGISTROS FALLIDOS de usuarios (error + success)
	public function getTotalFailRegs(){
		$pdo = CRUD::get();

		$st = $pdo->prepare(TOTAL_FAIL_REGS.PHP_EOL);
		$st->execute();
		return $st->fetch(PDO::FETCH_ASSOC);
	}


	// Recupera el NÚMERO DE REGISTROS de usuarios (error + success) a partir de una fecha concreta (!IMPORTANT hay que cambiar la fecha a la fecha de inicio de la promo)
	public function getNewRegs(){
		$pdo = CRUD::get();

		$st = $pdo->prepare(NEW_REGS . "'2018-01-15'".PHP_EOL);
		$st->execute();
		return $st->fetch(PDO::FETCH_ASSOC);
	}


	//Selecciona USUARIO ADMINISTRADOR según la COOKIE que tenga acumulada (seguridad en la autenticación del usuario administrador)
	public function selectByCookie($cookie){
		$pdo = CRUD::get();

		$st = $pdo->prepare(SELECT_BY_COOKIE.PHP_EOL);
		$st->execute(array(
			':cookie' => $cookie['_w3rc'],
			':id' => $cookie['_w3uid']
		));
		
		$fetch = $st->fetch(PDO::FETCH_ASSOC);
		$rc = $st->rowCount();
		return array('numrows' => $rc, 'data' => $fetch);
	}


	//Actualiza la COOKIE del USUARIO ADMINISTRADOR (seguridad en la autenticación de usuario administrador)
	public function updateCookie($cookie, $id){
		$pdo = CRUD::get();
		
		$st = $pdo->prepare(UPDATE_COOKIE.PHP_EOL);
		$st->execute(array(
			':cookie' => $cookie,
			':id' => $id
		));
		
		$fetch = $st->fetch(PDO::FETCH_ASSOC);
		$rc = $st->rowCount();
		return array('numrows' => $rc, 'data' => $fetch);
	}
}

?>