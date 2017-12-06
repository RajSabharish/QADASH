<?php

$SAM = $_POST['SAM'];
$response = array();
ini_set('max_execution_time', 300);
if(strlen($SAM)>0)
{
	exec("Generatereport.py ".$SAM,$output);
	if($output[0]==='Success' or $output[0]==='Failed')
	{
		if($output[0]==='Success')
			{
				$res='Success';
			}
			else
			{
				$res='Failed';
			}
		$response = array(
			'result' => $res,			
		);
	}
	else
	{
		$response = array(
			'result' => 'Error',
			'res1a' => $output[0]
		);
	}
			
}
	
echo json_encode($response);

?>