<?php
/**
* @global EL script recoge los datos de la promoción actual
**/
require_once '../classes/promo.php';

 /**
* @global :: DATOS DE LA PROMOCIÓN
* @param $promo >> datos de la promoción
**/
if(null != $_POST['update'] && null != $_POST['id']){
	$promocion = new PROMO();
	$promo = $promocion->select(null);
	if($promo['numrows'] > 0){

		$du = array(
			'id'					=> $_POST['id'],
			'nombre' 				=> $_POST['nombre'],
			'promo' 				=> $_POST['promo'],
			'descripcion' 			=> $_POST['descripcion'],
			'fecha_inicio' 			=> $_POST['fecha_inicio'],
			'fecha_fin' 			=> $_POST['fecha_fin'],
			'unidades_disponibles' 	=> $_POST['unidades_disponibles']
		);

		/**
		* Actualiza la base de datos;
		**/
		$nupdate = $promocion->update($du);
		if($nupdate > 0){
			/**
			* Devuelve los datos de la promo actualizados;
			**/
			$promo = $promocion->select(null);
			echo json_encode($promo['data']);	
		}
	}
}