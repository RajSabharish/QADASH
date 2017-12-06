<?php

$SAM = $_POST['SAM'];
$response = array();
ini_set('max_execution_time', 300);
if(strlen($SAM)>0)
{
	exec("Activity8.py ".$SAM,$output);
	if($output[0]==='Pass' or $output[0]==='Failed')
	{
		if($output[2]==='Success')
			{
				$res='Success';
			}
			else
			{
				$res='Failed';
			}
		$response = array(
			'result' => $res,
			'res1a' => $output[0],
			'res2a' => $output[1],		
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