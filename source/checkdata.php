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

$SAM = $_POST['SAM'];
if(strlen($SAM)>0)
{
	$QueryResult = sqlsrv_query($conn, "SELECT * FROM SAMStatus WHERE SAM = '$SAM' ", array(), array( "Scrollable" => 'static' ));
	$response = array();
	if (!$QueryResult) {
    $response = array(
		'result' => 'Fail',
        'message' => 'An error occured...'
    );
}else {
	$row = sqlsrv_fetch_array( $QueryResult, SQLSRV_FETCH_ASSOC);
    $response = array(
		'result' => 'Success',
        'status' => $row['Status'],
        'res1' => $row['Result1'],
		'res2' => $row['Result2'],
		'res3' => $row['Result3'],
		'res4' => $row['Result4'],
		'res5' => $row['Result5'],
		'res6' => $row['Result6'],
		'res7' => $row['Result7'],
		'res8' => $row['Result8'],
		'res9' => $row['Result9'],
		'res10' => $row['Result10'],
		'res11' => $row['Result11'],
		'res12' => $row['Result12'],
		'res13' => $row['Result13'],
		'res14' => $row['Result14'],
		'res15' => $row['Result15'],
		'res16' => $row['Result16'],
		'res17' => $row['Result17'],
		'res18' => $row['Result18'],
    );
}

	
}
echo json_encode($response);

?>