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
	$QueryResult5 = sqlsrv_query($conn, "SELECT * FROM Activity5 WHERE SAM = '$SAM' ", array(), array( "Scrollable" => 'static' ));
	$QueryResult8 = sqlsrv_query($conn, "SELECT * FROM Activity8 WHERE SAM = '$SAM' ", array(), array( "Scrollable" => 'static' ));
	$response = array();
	if (!$QueryResult5 And !$QueryResult8) {
    $response = array(
		'result' => 'Fail',
        'message' => 'An error occured...'
    );
}else {
	$row5 = sqlsrv_fetch_array( $QueryResult5, SQLSRV_FETCH_ASSOC);
	$row8 = sqlsrv_fetch_array( $QueryResult8, SQLSRV_FETCH_ASSOC);
    $response = array(
		'result' => 'Success',
        'res1a' => $row5['Result1'],
		'res1b' => $row5['Result2'],
		'res1c' => $row5['Result3'],
		'res1d' => $row5['Result4'],
		'res1e' => $row5['Result5'],
		'res1f' => $row5['Result6'],
		'res2a' => $row8['Result1'],
		'res2b' => $row8['Result2'],
    );
}

	
}
echo json_encode($response);

?>