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
	}
	else {
		
		$samcount = sqlsrv_num_rows( $QueryResult );
		if($samcount>0)
		{
			$QueryResult1 = sqlsrv_query($conn, "UPDATE SAMStatus SET Status='Start',Result1='In Progress', Result2='In Progress',Result3='In Progress', Result4='In Progress' WHERE SAM='$SAM' ", array(), array( "Scrollable" => 'static' ));
			if (!$QueryResult1) {
				$response = array(
				'result' => 'Fail',
				'message' => 'An error occured here 1...'
				);
			}
			else{
				$response = array(
				'result' => 'Success',
				);
			}
		}
		else
		{
			$QueryResult1 = sqlsrv_query($conn, "INSERT INTO SAMStatus (SAM, Status, Result1, Result2, Result3, Result4, Result5) VALUES ('$SAM','Start','Waiting','Waiting','Waiting','Waiting','Waiting') ", array(), array( "Scrollable" => 'static' ));
			if (!$QueryResult1) {
				$response = array(
				'result' => 'Fail',
				'message' => 'An error occured here 2...'
				);
			}
			else{
				$response = array(
				'result' => 'Success',
				);
			}
		}
	}	
}
else{
	$response = array(
				'result' => 'Fail',
				'message' => 'An error occured here 3...'
				);
	}
echo json_encode($response);

?>