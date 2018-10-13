<?php

require_once 'constantes.php' ;
require_once 'crudinterface.php';
require_once 'pdoconn.php';

abstract class CRUD implements crudinterface{

	static private $pdo;
	public static function get(){ return self::$pdo = PDOCONN::getInstance(); }

	public function select($datos){}
	public function delete(){}
	public function insert(){}
	public function __destruct(){}
	public function __wakeup(){ CRUD::get(); }


	//Selecciona un usuario por su EMAIL (para ver si existe o no)
	public function existeMAIL($foo){

		$conn = self::get();
		$st = $conn->prepare(CRUD__SELECT_MAIL . " =:email".PHP_EOL);
		$st->execute( array( ':email'=>$foo ));
		
		$fetch = $st->fetch(PDO::FETCH_ASSOC);	
		$rc = $st->rowCount();
		return array('numrows' => $rc, 'data' => $fetch);
	}


	//Evalúa si el IMEI existe en la base de datos;
	public function existeIMEI($foo){

		$conn = self::get();
		$st = $conn->prepare(CRUD__SELECT_IMEI . " =:imei".PHP_EOL);
		$st->execute( array( ':imei'=>$foo ));
		
		$fetch = $st->fetch(PDO::FETCH_ASSOC);	
		$rc = $st->rowCount();
		return array('numrows' => $rc, 'data' => $fetch);
	}


	//Inserta el error del usuario en la tabla de registros;
	public function insert_error($data){

		$conn = self::get();
		$sql = "INSERT INTO registros VALUES (null, " . $data[0] . ", ". $data[1] . ", '" .$data[2]. "', " . $data[3]. ", '" . $data[4] . "', '" . $data[5] . "');";		

		$st = $conn->prepare($sql);
		$st->execute();		
		return $st->rowCount();
	}


	//Hace el update de la TABLA DE IMEIS cambiando el estado del IMEI
	public function update($data){
		$pdo = self::get();	

		$st = $pdo->prepare(UPDATE_IMEI.PHP_EOL);
		$st->execute( array( 
			':id_usuario'=> $data['id'],
			':estado' => 1,
			':imei' => $data['imei']
		));		

		return $st->rowCount();
	}

	function seleccionar_errores($idusuario){
		$pdo = self::get();	
		$st = $pdo->prepare(SELECT_ERRORES_BY_ID.PHP_EOL);
		$st->execute( array(':idusuario'=> $idusuario));

		$fetch = $st->fetch(PDO::FETCH_ASSOC);	
		$rc = $st->rowCount();
		return array('numrows' => $rc, 'data' => $fetch);
	}

	function update_errores($data){
		$pdo = self::get();	
		$st = $pdo->prepare(UPDATE_NUMERO_ERRORES.PHP_EOL);
		$st->execute(array(
			':num_intentos' => $data['num_intentos'],
			':idusuario'=> $data['idusuario']
		));

		$fetch = $st->fetch(PDO::FETCH_ASSOC);	
		$rc = $st->rowCount();
		return array('numrows' => $rc, 'data' => $fetch);
	}
}

?>