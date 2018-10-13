<?php
/**
* @global >> reporte de errores
**/
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/Madrid');

include_once '../classes/administrador.php';
include_once '../classes/user.php';
include_once '../controller/functions.php';
include_once '../classes/PHPExcel.php';

/**
* @global :: des-serialización de datos para la sesión.
**/
$contador = 0;
$fill = '#df0068';
$admin = $_SESSION["new_admin"]; 
$admin = unserialize($admin);
$php_excel = new PHPExcel();
$php_excel->getActiveSheet()->setTitle('USUARIOS PROMO HONOR7XTHEBRAVE');
$style = array( 'alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER), 'font'  => array( 'bold'  => true, 'color' => array('rgb' => 'FFFFFF'), 'size'  => 9, 'name'  => 'Ubuntu'));
$allValidUsers = $admin->selectAll(); //Con los que no tienen valor empty($allValidUsers['data'][1]['imei'])

/**
* @param $filterAllValidUsers >> recoge los usuarios que contienen un IMEI en la tabla USUARIOS;
**/
$filterAllValidUsers = array_filter($allValidUsers['data'], function ($a) {
	return (!empty($a['imei']));
});

while($contador < count($filterAllValidUsers)){
	$filterAllValidUsers[$contador]['id'] = $contador + 1;
	$contador++;
};

/**
* @global >> rellena los encabezados de la hoja de cálculo;
**/
$php_excel->setActiveSheetIndex(0)
->setCellValue('A1', 'REGISTRO')
->setCellValue('B1', 'NOMBRE')
->setCellValue('C1', 'APELLIDOS')
->setCellValue('D1', 'NIF')
->setCellValue('E1', 'DIRECCIÓN')
->setCellValue('F1', 'PROVINCIA')
->setCellValue('G1', 'POBLACIÓN')
->setCellValue('H1', 'CP')
->setCellValue('I1', 'EMAIL')
->setCellValue('J1', 'TELÉFONO')
->setCellValue('K1', 'IMEI')
->setCellValue('L1', 'F.NACIMIENTO')
->setCellValue('M1', 'FACTURA');

/**
* @global >> rellena la hoja de cálculo con los valores del array;
**/
$php_excel->getActiveSheet()->fromArray($filterAllValidUsers, null, 'A2');
$php_excel->getActiveSheet()->getStyle("A1:M1")->applyFromArray($style);

/**
* @global >> autosize para todas las columnas;
**/
$php_excel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
$php_excel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
$php_excel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
$php_excel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
$php_excel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
$php_excel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
$php_excel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
$php_excel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
$php_excel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
$php_excel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
$php_excel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
$php_excel->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
$php_excel->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);

/**
* @global >> ESTILO Y FORMATO DE LA CELDA DEL IMEI
**/
$php_excel->getActiveSheet()->getStyle('A1:M1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$php_excel->getActiveSheet()->getStyle('A1:M1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$php_excel->getActiveSheet()->getStyle('A1:M1')->getFill()->getStartColor()->setARGB('29bb04');
$php_excel->getActiveSheet()->getRowDimension('1')->setRowHeight(40);
$php_excel->getActiveSheet()->getStyle('K2:K9999')->getNumberFormat()->setFormatCode('###############');

/**
* @global añade los elementos a las celdas
*/
header('Content-Type: application/vnd.ms-excel');
$file_name = "usuarios_honor7xthebrave_".date("Y-m-d_H:i:s").".xls";
header("Content-Disposition: attachment; filename=$file_name");
header('Cache-Control: max-age=1'); // Cabecera IE9


/**
* @global saca el excell
**/
$writter = PHPExcel_IOFactory::createWriter($php_excel, 'Excel5');
$writter->save('php://output');




?>