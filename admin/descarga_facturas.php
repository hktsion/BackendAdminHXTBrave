<?php
/**
* @global >> reporte de errores
**/

// include_once '../classes/administrador.php';
// include_once '../classes/user.php';
// include_once '../controller/functions.php';


$file_names = array('iMUST Operating Manual V1.3a.pdf','iMUST Product Information Sheet.pdf');

//Archive name
$archive_file_name = $name.'iMUST_Products.zip';

//Download Files path
echo $_SERVER['DOCUMENT_ROOT'] . '/facturas/';
$file_path = $_SERVER['DOCUMENT_ROOT'].'/Harshal/files/';


zipFilesAndDownload($file_names, $archive_file_name, $file_path);

function zipFilesAndDownload($file_names, $archive_file_name, $file_path){

    //echo $file_path;die;
	$zip = new ZipArchive();

    //create the file and throw the error if unsuccessful
	if ($zip->open($archive_file_name, ZIPARCHIVE::CREATE )!==TRUE) {
		exit("No se ha podido crerar el archivo <$archive_file_name>\n");
	}
    //add each files of $file_name array to archive
	foreach($file_names as $files){
		$zip->addFile($file_path.$files,$files);
	}


	$zip->close();
    
    /**
    * @global Envía las cabeceras pasra forzar el download del ZIP con las facturas
    **/
	header("Content-type: application/zip"); 
	header("Content-Disposition: attachment; filename=$archive_file_name");
	header("Content-length: " . filesize($archive_file_name));
	header("Pragma: no-cache"); 
	header("Expires: 0"); 
	readfile("$archive_file_name");
	exit;
}?>