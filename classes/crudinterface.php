<?php

interface crudinterface{
	
	public function insert();
	public function select($datos);
	public function update($datos);
	public function delete();
}

?>