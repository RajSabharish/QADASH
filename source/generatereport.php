<?php
$db_hostname = getenv('RDS_HOSTNAME');
$db_username = getenv('RDS_USERNAME');
$db_password = getenv('RDS_PASSWORD');
$db_port = getenv('RDS_PORT');
$prodDbName = 'QISAMStatus';

$serverName = $db_hostname.','.$db_port;

$connectioninfo = array("Database"=>"$prodDbName","UID"=>"$db_username","PWD"=>"$db_password");   
$conn = sqlsrv_connect( $serverName, $connectioninfo);
if( !$conn ) {
	echo "A database connection could not be established. Please contact your administrator<br />";
	die( print_r( sqlsrv_errors(), true));
} 

//$SAM = '1AAA-01';

$Activity5 = sqlsrv_query( $conn, "SELECT [Result1],[Description1],[Result2],[Description2],[Result3],[Description3],[Result4],[Description4],[Result5],[Description5],[Result6],[Description6] FROM [Activity5] WHERE [SAM]='$SAM'");
$Activity8 = sqlsrv_query( $conn, "SELECT [Result1],[Description1],[Result2],[Description2] FROM [Activity8] WHERE [SAM]='$SAM'");
$Activity16 = sqlsrv_query( $conn, "SELECT [Result1],[Description1] FROM [Activity16] WHERE [SAM]='$SAM'");
$Activity17 = sqlsrv_query( $conn, "SELECT [Result1],[Description1] FROM [Activity17] WHERE [SAM]='$SAM'");
$row5 = sqlsrv_fetch_array( $Activity5, SQLSRV_FETCH_ASSOC);
$row8 = sqlsrv_fetch_array( $Activity8, SQLSRV_FETCH_ASSOC);
$row16 = sqlsrv_fetch_array( $Activity16, SQLSRV_FETCH_ASSOC);
$row17 = sqlsrv_fetch_array( $Activity17, SQLSRV_FETCH_ASSOC);

require_once 'Classes/PHPExcel/IOFactory.php';
require_once 'Classes/PHPExcel.php';

$excel2 = PHPExcel_IOFactory::createReader('Excel2007');
$excel2 = $excel2->load('QA_Checklist.xlsx'); 
$excel2->setActiveSheetIndex(0);
$excel2->getActiveSheet()->setCellValue('C28', $row5['Result1'] )
    ->setCellValue('D28', $row5['Description1'])
    ->setCellValue('C29', $row5['Result2'])       
    ->setCellValue('D29', $row5['Description2'])
	->setCellValue('C30', $row5['Result3'] )
	->setCellValue('D30', $row5['Description3'])
	->setCellValue('C31', $row5['Result4'])
	->setCellValue('D31', $row5['Description4'])
	->setCellValue('C32', $row5['Result5'])
	->setCellValue('D32', $row5['Description5'])
	->setCellValue('C33', $row5['Result6'])
	->setCellValue('D33', $row5['Description6'])
	->setCellValue('C62', $row8['Result1'])
	->setCellValue('D62', $row8['Description1'])
	->setCellValue('C63', $row8['Result2'])
	->setCellValue('D63', $row8['Description2'])
	->setCellValue('C99', $row16['Result1'])
	->setCellValue('D99', $row16['Description1'])
	->setCellValue('C101', $row17['Result1'])
	->setCellValue('D101', $row17['Description1']);
	
$objWriter = PHPExcel_IOFactory::createWriter($excel2, 'Excel2007');
$FileName = 'QA_Checklist_'.$SAM.'.xlsx';
$objWriter->save($FileName);

?>