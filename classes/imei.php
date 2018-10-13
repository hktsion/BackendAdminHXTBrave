<?php

class IMEI extends CRUD{

	public $id_usuario;
	
	public function __construct($id){
		$this->id_usuario = $id;
	}	

	public function __destruct(){ }

	public function __toString(){
		return "IMEI INSTANCE =  { $this->id_usuario }";
	}

	public function selectIMEIsFromIDUser(){
		$pdo = CRUD::get();		

		$st = $pdo->prepare(SELECT_IMEIS_FROM_USER .PHP_EOL);
		
		$st->execute( array( ':id_usuario'=> $this->id_usuario ));
		$fetch = $st->fetchAll(PDO::FETCH_ASSOC);	
		
		$rc = $st->rowCount();
		$res = array('numrows' => $rc, 'data' => $fetch);
		
		return $res; 
	}
}


?>