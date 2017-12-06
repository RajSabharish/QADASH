<?php

$SAM = $_POST['SAM'];
$response = array();
ini_set('max_execution_time', 300);
if(strlen($SAM)>0)
{
	exec("Activity17.py ".$SAM,$output);
	if($output[0]==='Pass' or $output[0]==='Failed')
	{
		if($output[1]==='Success')
			{
				$res='Success';
			}
			else
			{
				$res='Failed';
			}
		$response = array(
			'result' => $res,
			'res1a' => $output[0]		
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