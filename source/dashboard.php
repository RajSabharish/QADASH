<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Layouts &raquo; Split-Centered</title>
  <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no' />

  <!-- Demo Dependencies -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.3.2/holder.min.js" type="text/javascript"></script>
  <script>
    Holder.add_theme("white", { background:"#fff", foreground:"#a7a7a7", size:10 });
  </script>

  <!-- Dashboard -->
  <link rel="stylesheet" type="text/css" href="../assets/css/keen-dashboards.css" />
  <link href="https://fonts.googleapis.com/css?family=Rokkitt" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">
  
  	
	
</head>
<body class="keen-dashboard" style="padding-top: 80px; " onload="mainstart()">

<?php

function report($SAM)
{
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
$FileName = 'C:\Users\raj.a.natarajan\Desktop\QI_Reports\QA_Checklist_'.$SAM.'.xlsx';
$objWriter->save($FileName);
echo '<script type="text/javascript">alert("Report has been generated !");</script>';
}
if(isset($_POST['report'])){ //check if form was submitted
  $SAM = $_POST['sam_name']; //get input text
  report($SAM);
} 
 
?>

  <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="home.php">
          <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="navbar-brand" href="./"><text id="navbar"></text></a>
      </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-left">
          <li><a><span style="position:fixed;left:35%; font-family: 'Orbitron', sans-serif;font-size: 150%; color:white;">QUALITY ASSURANCE DASHBOARD</span></a></li>
        <!--  <li><a href="https://keen.io/team">Team</a></li>
          <li><a href="https://github.com/keenlabs/dashboards/tree/gh-pages/layouts/split-centered">Source</a></li>
          <li><a href="https://groups.google.com/forum/#!forum/keen-io-devs">Community</a></li><li><a href="http://stackoverflow.com/questions/tagged/keen-io?sort=newest&pageSize=15">Technical Support</a></li>
        -->
		</ul>
      </div>
    </div>
  </div>
  
  
  
  
  
	<div id ="status-res1" style="display:none; position: relative;float: left;top: 50%;left: 50%;transform: translate(-50%, -50%);color: black;font-family: 'Rokkitt', serif; ">
		<font style="color:black">1.Verify connection between PDU and DSL</font> <font id="text-res-1.1"></font><br>
	</div>
	<div id ="status-res4" style="display:none; position: relative;float: left;top: 50%;left: 50%;transform: translate(-50%, -50%);color: black;font-family: 'Rokkitt', serif; ">
					<font style="color:black">1.Run ISP and verify Asset capture </font><font id="text-res-4.1"></font><br>
	</div>
	<div id ="status-res5" style="display:none; position: relative;float: left;top: 50%;left: 50%;transform: translate(-50%, -50%);color: black;font-family: 'Rokkitt', serif; ">
					<font style="color:black">1.Cable is annotated under each duct </font><font id="text-res-5.1"></font><br>
					<font style="color:black">2.Cable is shown and has correct size </font><font id="text-res-5.2"></font><br>
					<font style="color:black">3.Cable labelled correctly </font><font id="text-res-5.3"></font><br>
					<font style="color:black">4.Cables are attached to support structures </font><font id="text-res-5.4"></font><br>					
	</div>
	<div id ="status-res7" style="display:none; position: relative;float: left;top: 50%;left: 50%;transform: translate(-50%, -50%);color: black;font-family: 'Rokkitt', serif; ">
					<font style="color:black">1.Verify Asset capture has been loaded and is correct </font><font id="text-res-7.1"></font><br>
					<font style="color:black">2.Verify Asset capture is correct for existing network  </font><font id="text-res-7.2"></font><br>
					<font style="color:black">3.Manual - Verify batch numbers are loaded into PNI </font><font id="text-res-7.3"></font><br>
					<font style="color:black">4.Manual - Check IWR numbers have been loaded into PNI </font><font id="text-res-7.4"></font><br>
	</div>
	
	<font style="display:none" id="mark-pass">&#9989;</font>
	<font style="display:none" id="mark-fail">&#10062;</font>
	<font style="display:none" id="mark-manual">&#10067;</font>
	
  <div id ="completedText" style="display:none; color: white; position: relative;float: left;top: 50%;left: 50%;transform: translate(-50%, -50%); font-family: 'Rokkitt', serif;">
	<p style="font-size: 200%;">SUCCESS</p>
	</div>
	
  <div id ="failedText" style="display:none; color: white; position: relative;float: left;top: 50%;left: 50%;transform: translate(-50%, -50%); font-family: 'Rokkitt', serif;">
	<p style="font-size: 200%;">FAILED</p>
	</div>
	
	
	
	
	
	
	
	
	

  <div class="container-fluid">

    <div class="row">
      <div class="col-sm-3">
        <div class="row">
          <div class="col-sm-12">
            <div class="chart-wrapper">
              <div id="div-title1" class="chart-title" style="background: rgba(29, 220, 226, .6); font-weight: bold; ">
                 Activity 16 - Alarm Management Patching 
              </div>
              <div id ="div-res1" class="chart-stage" style="height: 120px; width: 100%; display: block; background: rgba(255, 199, 0, .6);">
					<div id ="progressbar-res1" style="position: relative;float: left;top: 50%;left: 50%;transform: translate(-50%, -50%);color: white;font-family: 'Rokkitt', serif; ">
					<p style="font-size: 250%;">IN PROGRESS</p>
					<progress id="p1" style="font-size: 150%; margin-left: 2%;"></progress>
				</div>			
              </div>
              <div id="div-notes1" class="chart-notes" style="height: 31px; width: 100%; display: block;">
				<div id ="notes-text1" style=" color: white; position: relative;float: left;top: 50%;left: 50%;transform: translate(-50%, -50%); font-family: 'Rokkitt', serif;">
				</div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <div class="chart-wrapper">
              <div id="div-title2" class="chart-title" style="background: rgba(29, 220, 226, .6); font-weight: bold;">
                Activity 2 - Boundary validation
              </div>
              <div id ="div-res2" class="chart-stage" style="height: 120px; width: 100%; display: block; background: rgba(214, 214, 214, .8);">
				<div id ="progressbar-res2" style="position: relative;float: left;top: 50%;left: 50%;transform: translate(-50%, -50%);color: white;font-family: 'Rokkitt', serif; ">
					<p style="font-size: 250%;">COMING SOON</p>
				</div>				
              </div>
              <div class="chart-notes" style="height: 31px; width: 100%; display: block;">

              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="chart-wrapper">
          <div class="chart-title" style="background: rgba(29, 220, 226, .6); font-weight: bold;">
            Overall Status
          </div>
          <div class="chart-stage" style="height: 315px; width: 100%; display: block;">
		  <form method="post" action="">
			<input name="sam_name" id="sam_name" style="display:none;">
			<input style="display:none;" type="submit" name="report" id="report" value="Generate Report" /><br/>
			</form>
            <div id="piechart_3d" style="width: 100%; height: 100%;"></div>
			
          </div>
          <div class="chart-notes" style="height: 31px; width: 100%; display: block;">
            Displays the current state results of the tasks running.
          </div>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="row">
          <div class="col-sm-12">
            <div class="chart-wrapper">
              <div id="div-title3" class="chart-title" style="background: rgba(29, 220, 226, .6); font-weight: bold;">
                 Activity 1 - FNO to connectivity report
              </div>
              <div id ="div-res3" class="chart-stage" style="height: 120px; width: 100%; display: block; background: rgba(214, 214, 214, .6);">
				<div id ="progressbar-res3" style="position: relative;float: left;top: 50%;left: 50%;transform: translate(-50%, -50%);color: white;font-family: 'Rokkitt', serif; ">
					<p style="font-size: 250%;">COMING SOON</p>
				</div>				
              </div>
              <div class="chart-notes" style="height: 31px; width: 100%; display: block;">
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <div class="chart-wrapper">
              <div id="div-title4" class="chart-title" style="background: rgba(29, 220, 226, .6); font-weight: bold;">
                Activity 17 - ISP FNO validation
              </div>
              <div id ="div-res4" class="chart-stage" style="height: 120px; width: 100%; display: block; background: rgba(255, 199, 0, .6);">
				<div id ="progressbar-res4" style="position: relative;float: left;top: 50%;left: 50%;transform: translate(-50%, -50%);color: white;font-family: 'Rokkitt', serif; ">
					<p style="font-size: 250%;">IN PROGRESS</p>
					<progress id="p1" style="font-size: 150%; margin-left: 2%;"></progress>
				</div>				
              </div>
              <div id="div-notes4" class="chart-notes" style="height: 31px; width: 100%; display: block;">
				<div id ="notes-text4" style=" color: white; position: relative;float: left;top: 50%;left: 50%;transform: translate(-50%, -50%); font-family: 'Rokkitt', serif;">
				</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-4">
        <div class="chart-wrapper">
          <div id="div-title5" class="chart-title" style="background: rgba(29, 220, 226, .6); font-weight: bold;">
            Activity 5 - Cable validation
          </div>
          <div id ="div-res5" class="chart-stage" style="height: 120px; width: 100%; display: block; background: rgba(255, 199, 0, .6);">
				<div id ="progressbar-res5" style="position: relative;float: left;top: 50%;left: 50%;transform: translate(-50%, -50%);color: white;font-family: 'Rokkitt', serif; ">
					<p style="font-size: 250%;">IN PROGRESS</p>
					<progress id="p1" style="font-size: 150%; margin-left: 2%;"></progress>
				</div>				
              </div>
          <div id="div-notes5" class="chart-notes" style="height: 31px; width: 100%; display: block;">
				<div id ="notes-text5" style=" color: white; position: relative;float: left;top: 50%;left: 50%;transform: translate(-50%, -50%); font-family: 'Rokkitt', serif;">
				</div>
            </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="chart-wrapper">
          <div id="div-title6" class="chart-title" style="background: rgba(29, 220, 226, .6); font-weight: bold;">
            Activity 4 - Retrofit pillar validation
          </div>
          <div id ="div-res6" class="chart-stage" style="height: 120px; width: 100%; display: block; background: rgba(214, 214, 214, .6);">
				<div id ="progressbar-res6" style="position: relative;float: left;top: 50%;left: 50%;transform: translate(-50%, -50%);color: white;font-family: 'Rokkitt', serif; ">
					<p style="font-size: 250%;">COMING SOON</p>
				</div>				
              </div>
          <div id="div-notes6" class="chart-notes" style="height: 31px; width: 100%; display: block;">
				<div id ="notes-text6" style=" color: white; position: relative;float: left;top: 50%;left: 50%;transform: translate(-50%, -50%); font-family: 'Rokkitt', serif;">
				</div>
              </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="chart-wrapper">
          <div id="div-title7" class="chart-title" style="background: rgba(29, 220, 226, .6); font-weight: bold;">
            Activity 8 - Physical Network Inventory-OSP
          </div>
          <div id ="div-res7" class="chart-stage" style="height: 120px; width: 100%; display: block; background: rgba(255, 199, 0, .6);">
				<div id ="progressbar-res7" style="position: relative;float: left;top: 50%;left: 50%;transform: translate(-50%, -50%);color: white;font-family: 'Rokkitt', serif; ">
					<p style="font-size: 250%;">IN PROGRESS</p>
					<progress id="p1" style="font-size: 150%; margin-left: 2%;"></progress>
				</div>				
              </div>
          <div id="div-notes7" class="chart-notes" style="height: 31px; width: 100%; display: block;">
				<div id ="notes-text7" style=" color: white; position: relative;float: left;top: 50%;left: 50%;transform: translate(-50%, -50%); font-family: 'Rokkitt', serif;">
				</div>
              </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-4" >
        <div class="chart-wrapper">
          <div id="div-title8" class="chart-title" style="background: rgba(29, 220, 226, .6); font-weight: bold;">
            FNO/CSD to FAN Connectivity report
          </div>
          <div id ="div-res8" class="chart-stage" style="height: 120px; width: 100%; display: block; background: rgba(214, 214, 214, .6);">
				<div id ="progressbar-res8" style="position: relative;float: left;top: 50%;left: 50%;transform: translate(-50%, -50%);color: white;font-family: 'Rokkitt', serif; ">
					<p style="font-size: 250%;">COMING SOON</p>
				</div>				
              </div>
          <div id ="notes-text8" class="chart-notes" style="height: 31px; width: 100%; display: block;">
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="chart-wrapper" >
          <div id="div-title9" class="chart-title" style="background: rgba(29, 220, 226, .6); font-weight: bold;">
            Site Naming Convention check
          </div>
          <div id ="div-res9" class="chart-stage" style="height: 120px; width: 100%; display: block; background: rgba(214, 214, 214, .6);">
				<div id ="progressbar-res9" style="position: relative;float: left;top: 50%;left: 50%;transform: translate(-50%, -50%);color: white;font-family: 'Rokkitt', serif; ">
					<p style="font-size: 250%;">COMING SOON</p>
				</div>				
              </div>
          <div id ="notes-text9" class="chart-notes" style="height: 31px; width: 100%; display: block;">
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="chart-wrapper">
          <div id="div-title10" class="chart-title" style="background: rgba(29, 220, 226, .6); font-weight: bold;">
            Site Details check
          </div>
          <div id ="div-res10" class="chart-stage" style="height: 120px; width: 100%; display: block; background: rgba(214, 214, 214, .6);">
				<div id ="progressbar-res10" style="position: relative;float: left;top: 50%;left: 50%;transform: translate(-50%, -50%);color: white;font-family: 'Rokkitt', serif; ">
					<p style="font-size: 250%;">COMING SOON</p>
				</div>				
              </div>
          <div id ="notes-text10" class="chart-notes" style="height: 31px; width: 100%; display: block;">
          </div>
        </div>
      </div>
    </div>

  </div>

  <div class="container-fluid">
    <p class="small text-muted">Built with &#9829; by <a href="https://keen.io">Keen IO</a></p>
  </div>

  <!-- Project Analytics -->
  <script type="text/javascript" src="../../assets/js/keen-analytics.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
	
	
      google.charts.load("current", {packages:["corechart"]});
	  var inprogress;
	  var fin;
	  var failed;
	  var manual;
	  
	 
	  //google.charts.setOnLoadCallback(drawChart);
      
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Status', 'Count'],
          ['In Progress',     inprogress],
		  ['Failed',  failed],
		  ['Manual',      manual],
          ['Success', fin],
		  ['Coming Soon', 4]
        ]);

        var options = {
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
	  
	  function modifydata()
	  {
		
		var http = new XMLHttpRequest();
		var url = "checkdata.php";
		var prefix = "SAM=";
		var postfix = window.location.hash.substring(1);
		var params = prefix.concat(postfix);
		var urlsub = "checksubdata.php";
		document.getElementById("navbar").textContent=postfix;
		
		http.onload = function() {
			
			inprogress=4;
			fin=0;
			failed=0;
			manual=3;			
			//google.charts.setOnLoadCallback(drawChart);			
			var resultArray = JSON.parse(this.responseText);
			if((resultArray.result).localeCompare('Success')==0)
			{
				if((resultArray.res1).localeCompare('Pass')==0)
				{
					//document.getElementById("div-title1").style.background = "rgba(0, 255, 0, 0.6)";
					document.getElementById("div-res1").style.background = "rgba(233, 255, 94, 0.3)";
					document.getElementById('progressbar-res1').innerHTML = document.getElementById('status-res1').innerHTML;
					document.getElementById("div-notes1").style.background = "rgba(0, 255, 0, 0.7)";
					document.getElementById('notes-text1').innerHTML = document.getElementById('completedText').innerHTML;
					document.getElementById('text-res-1.1').innerHTML = document.getElementById('mark-pass').innerHTML;
					inprogress=inprogress-1;
					fin=fin+1;
				}
				else if((resultArray.res1).localeCompare('Failed')==0)
				{
					//document.getElementById("div-title1").style.background = "rgba(255, 0, 0, 0.5)";
					document.getElementById("div-res1").style.background = "rgba(233, 255, 94, 0.3)";
					document.getElementById('progressbar-res1').innerHTML = document.getElementById('status-res1').innerHTML;
					document.getElementById("div-notes1").style.background = "rgba(255, 0, 0, 0.7)";
					document.getElementById('notes-text1').innerHTML = document.getElementById('failedText').innerHTML;
					document.getElementById('text-res-1.1').innerHTML = document.getElementById('mark-fail').innerHTML;
					
					inprogress=inprogress-1;
					failed=failed+1;
				}
				
				if((resultArray.res2).localeCompare('Pass')==0)
				{
					
					//document.getElementById("div-title4").style.background = "rgba(0, 255, 0, 0.6)";
					document.getElementById("div-res4").style.background = "rgba(233, 255, 94, 0.3)";
					document.getElementById('progressbar-res4').innerHTML = document.getElementById('status-res4').innerHTML;					
					document.getElementById('div-notes4').style.background = "rgba(0, 255, 0, 0.7)";
					document.getElementById('notes-text4').innerHTML = document.getElementById('completedText').innerHTML;
					document.getElementById('text-res-4.1').innerHTML = document.getElementById('mark-pass').innerHTML;
					inprogress=inprogress-1;
					fin=fin+1;
					
				}
				else if((resultArray.res2).localeCompare('Failed')==0)
				{
					//document.getElementById("div-title4").style.background = "rgba(255, 0, 0, 0.5)";
					document.getElementById("div-res4").style.background = "rgba(233, 255, 94, 0.3)";
					document.getElementById('progressbar-res4').innerHTML = document.getElementById('status-res4').innerHTML;
					document.getElementById("div-notes4").style.background = "rgba(255, 0, 0, 0.7)";
					document.getElementById('notes-text4').innerHTML = document.getElementById('failedText').innerHTML;
					document.getElementById('text-res-4.1').innerHTML = document.getElementById('mark-fail').innerHTML;
					inprogress=inprogress-1;
					failed=failed+1;
				}
				
				if((resultArray.res3).localeCompare('Pass')==0)
				{
					
					//document.getElementById("div-title5").style.background = "rgba(0, 255, 0, 0.6)";
					document.getElementById("div-res5").style.background = "rgba(233, 255, 94, 0.3)";
					document.getElementById('progressbar-res5').innerHTML = document.getElementById('status-res5').innerHTML;
					document.getElementById("div-notes5").style.background = "rgba(0, 255, 0, 0.7)";
					document.getElementById('notes-text5').innerHTML = document.getElementById('completedText').innerHTML;
					document.getElementById('text-res-5.1').innerHTML = document.getElementById('mark-pass').innerHTML;
					document.getElementById('text-res-5.2').innerHTML = document.getElementById('mark-pass').innerHTML;
					document.getElementById('text-res-5.3').innerHTML = document.getElementById('mark-pass').innerHTML;
					document.getElementById('text-res-5.4').innerHTML = document.getElementById('mark-pass').innerHTML;
					inprogress=inprogress-1;
					fin=fin+1;
				}
				else if((resultArray.res3).localeCompare('Failed')==0)
				{
					//document.getElementById("div-title5").style.background = "rgba(255, 0, 0, 0.5)";
					document.getElementById("div-res5").style.background = "rgba(233, 255, 94, 0.3)";
					document.getElementById('progressbar-res5').innerHTML = document.getElementById('status-res5').innerHTML;
					document.getElementById("div-notes5").style.background = "rgba(255, 0, 0, 0.7)";
					document.getElementById('notes-text5').innerHTML = document.getElementById('failedText').innerHTML;
					
					var http5 = new XMLHttpRequest();
					http5.onload = function() {
						var resultArray1 = JSON.parse(this.responseText);						
						if((resultArray1.result).localeCompare('Success') == 0)
						{
							if((resultArray1.res1a).localeCompare('Failed')==0)
							{
								document.getElementById('text-res-5.1').innerHTML = document.getElementById('mark-fail').innerHTML;
							}
							else
							{
								document.getElementById('text-res-5.1').innerHTML = document.getElementById('mark-pass').innerHTML;
							}
							if((resultArray1.res1b).localeCompare('Failed')==0)
							{
								document.getElementById('text-res-5.2').innerHTML = document.getElementById('mark-fail').innerHTML;
							}
							else
							{
								document.getElementById('text-res-5.2').innerHTML = document.getElementById('mark-pass').innerHTML;
							}
							if((resultArray1.res1c).localeCompare('Failed')==0)
							{
								document.getElementById('text-res-5.3').innerHTML = document.getElementById('mark-fail').innerHTML;
							}
							else
							{
								document.getElementById('text-res-5.3').innerHTML = document.getElementById('mark-pass').innerHTML;
							}
							if((resultArray1.res1d).localeCompare('Failed')==0)
							{
								document.getElementById('text-res-5.4').innerHTML = document.getElementById('mark-fail').innerHTML;
							}
							else
							{
								document.getElementById('text-res-5.4').innerHTML = document.getElementById('mark-pass').innerHTML;
							}
							if((resultArray1.res1e).localeCompare('Failed')==0)
							{
								document.getElementById('text-res-5.5').innerHTML = document.getElementById('mark-fail').innerHTML;
							}
							else
							{
								document.getElementById('text-res-5.5').innerHTML = document.getElementById('mark-pass').innerHTML;
							}
							if((resultArray1.res1f).localeCompare('Failed')==0)
							{
								document.getElementById('text-res-5.6').innerHTML = document.getElementById('mark-fail').innerHTML;
							}
							else
							{
								document.getElementById('text-res-5.6').innerHTML = document.getElementById('mark-pass').innerHTML;
							}
						}
						else
						{
							alert("Fail");
						}
					};
					http5.open("POST", urlsub, true);		
					http5.setRequestHeader("Content-type", "application/x-www-form-urlencoded");		
					http5.send(params);			
					
					inprogress=inprogress-1;
					failed=failed+1;
				}
				
				if((resultArray.res4).localeCompare('Pass')==0)
				{
					//document.getElementById("div-title7").style.background = "rgba(0, 255, 0, 0.6)";
					document.getElementById("div-res7").style.background = "rgba(233, 255, 94, 0.3)";
					document.getElementById('progressbar-res7').innerHTML = document.getElementById('status-res7').innerHTML;
					document.getElementById("div-notes7").style.background = "rgba(0, 255, 0, 0.7)";
					document.getElementById('notes-text7').innerHTML = document.getElementById('completedText').innerHTML;
					document.getElementById('text-res-7.1').innerHTML = document.getElementById('mark-pass').innerHTML;
					document.getElementById('text-res-7.2').innerHTML = document.getElementById('mark-pass').innerHTML;
					document.getElementById('text-res-7.3').innerHTML = document.getElementById('mark-manual').innerHTML;
					document.getElementById('text-res-7.4').innerHTML = document.getElementById('mark-manual').innerHTML;
					inprogress=inprogress-1;
					fin=fin+1;
				}
				else if((resultArray.res4).localeCompare('Failed')==0)
				{
				
					document.getElementById("div-res7").style.background = "rgba(233, 255, 94, 0.3)";
					document.getElementById('progressbar-res7').innerHTML = document.getElementById('status-res7').innerHTML;
					document.getElementById("div-notes7").style.background = "rgba(255, 0, 0, 0.7)";
					document.getElementById('notes-text7').innerHTML = document.getElementById('failedText').innerHTML;
					document.getElementById('text-res-7.4').innerHTML = document.getElementById('mark-manual').innerHTML;
					document.getElementById('text-res-7.4').innerHTML = document.getElementById('mark-manual').innerHTML;
					
					var http7 = new XMLHttpRequest();
					http7.onload = function() {
						var resultArray2 = JSON.parse(this.responseText);
						if((resultArray2.result).localeCompare('Success') == 0)
						{
							if((resultArray2.res2a).localeCompare('Failed')==0)
							{
								document.getElementById('text-res-7.1').innerHTML = document.getElementById('mark-fail').innerHTML;
							}
							else
							{
								document.getElementById('text-res-7.1').innerHTML = document.getElementById('mark-pass').innerHTML;
							}
							if((resultArray2.res2b).localeCompare('Failed')==0)
							{
								document.getElementById('text-res-7.2').innerHTML = document.getElementById('mark-fail').innerHTML;
							}
							else
							{
								document.getElementById('text-res-7.2').innerHTML = document.getElementById('mark-pass').innerHTML;
							}							
						}
						else
						{
							alert("Fail");
						}
					};
					http7.open("POST", urlsub, true);		
					http7.setRequestHeader("Content-type", "application/x-www-form-urlencoded");		
					http7.send(params);
					inprogress=inprogress-1;
					failed=failed+1;
				}
				if((resultArray.status).localeCompare('Finished')==0)
				{
					document.getElementById('sam_name').value=postfix;
					document.getElementById('report').style.display = "";
				}
			}
			else
			{
				alert('Fail');
			}
			google.charts.setOnLoadCallback(drawChart);
		};
				
		http.open("POST", url, true);
		
		//Send the proper header information along with the request
		http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		
		http.send(params);
	  }
	  
	  function mainstart(){
			modifydata();
			var tempvalue = setInterval(modifydata,6000);
			}
    </script>
</body>
</html>
