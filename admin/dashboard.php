<?php session_start(); 

include("../classes/administrador.php");

if(isset($_SESSION["new_admin"]) && $_SESSION['new_admin'] != ''){
	
	include("../classes/user.php"); 
	include("../classes/promo.php");
	include_once '../controller/vars.php';
	include_once '../controller/functions.php';
	include_once '../controller/controller.admin-dashboard.php';


	/**
	* @global :: des-serialización de datos para la sesión.
	**/
	$admin = $_SESSION["new_admin"]; 
	$admin = unserialize($admin);
	$ctrl = 'controller.dashboard.php';
	$myNewCtrl = '../controller/controller.dashboard.php';


	/**
	* @param $pagina >> enchufa una u otra plantilla: Dashboard, Inscripciones-erroneas, etc. 
	**/
	if(isset($_GET['page']) && !empty($_GET['page'])){

		/**
		* @global El controlador muestra una u otra vista dependiendo del parámetro GET que se le pase, siempre y cuando el archivo exista en el directorio de los controladores;
		**/
		$ctrl = 'controller.' . trim($_GET['page']) . '.php';	
		$dir = '../controller';
		$files  = scandir($dir, 1);


		/**
		* @param Evalúa si existe un controlador con el parámetro que se le pasa por la URL, si existe, lleva a ese controlador que devuelve la vista, si no, vuelve a la vista principal del ademinsitrador (evalúa si existe la cookie o no);
		**/
		for ($i=0; $i <  count($files); $i++) { 
			if (strcmp(strval(trim($files[$i])), strval(trim($ctrl))) == 0) {
				$myNewCtrl = '../controller/' . $ctrl;
				break; //rompe el for

			}else{
				$myNewCtrl = '../controller/controller.dashboard.php';
				//header('Location: http://dashboard.introworkshop.com/admin/'); exit();
			}
		}

		/**
		* @param incluye el controlador que se le pase por la url
		**/
		include_once $myNewCtrl;

	}else{
		/**
		* @global no hay peticiones GET. Se añade el controlador principal para el panel de administración;
		**/
		include_once '../controller/controller.dashboard.php';
	}
	
}else{
	/** 
	* @global Lleva a la página principal => da igual si tienes Cookies o no; **/
	header('Location: http://dashboard.introworkshop.com/admin/');
}
?>