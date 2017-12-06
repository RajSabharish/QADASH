<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
  <meta charset="utf-8">
  <title>QA DASHBOARD</title>
  <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no' />

  <!-- Dependencies -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.3.2/holder.min.js" type="text/javascript"></script>
  <script>
    Holder.add_theme("white", { background:"#fff", foreground:"#a7a7a7", size:10 });
	google.charts.load("current", {packages:["corechart"]});
  </script>

  <!-- Dashboard Style References-->
  <link rel="stylesheet" type="text/css" href="../assets/css/dashboards.css" />
  <link href="https://fonts.googleapis.com/css?family=Rokkitt" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">
  
  	<!-- Project Analytics -->
  <script type="text/javascript" src="../../assets/js/analytics.js"></script>
	
</head>
<body class="keen-dashboard" style="padding-top: 80px; " onload="mainstart()">
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
		</ul>
      </div>
    </div>
  </div>
  
  
  <!----------------------------- HIDDEN ACTIVITY DESCRIPTION OVERLAYS  --------------------------->
  
  
	<div id ="status-res1" style="display:none; position: relative;float: left;top: 50%;left: 50%;transform: translate(-50%, -50%);color: black;font-family: 'Rokkitt', serif; ">
		<font style="color:black">1.Verify connection between PDU and DSL</font> <font id="text-res-1.1"></font><br>
	</div>
	<div id ="status-res2" style="display:none; position: relative;float: left;top: 50%;left: 50%;transform: translate(-50%, -50%);color: black;font-family: 'Rokkitt', serif; ">
					<font style="color:black">1.Check if different Equipment Attributes are correct </font><font id="text-res-2.1"></font><br>
					<font style="color:black">2.Check correct Cabinet type has been installed and confirm against iPACT </font><font id="text-res-2.2"></font><br>
					<font style="color:black">3.Commscope Batteries - Check correct number of battery strings have been loaded </font><font id="text-res-2.3"></font><br>
	</div>
	<div id ="status-res4" style="display:none; position: relative;float: left;top: 50%;left: 50%;transform: translate(-50%, -50%);color: black;font-family: 'Rokkitt', serif; ">
					<font style="color:black">1.Run ISP and verify Asset capture </font><font id="text-res-4.1"></font><br>
	</div>
	<div id ="status-res5" style="display:none; position: relative;float: left;top: 50%;left: 50%;transform: translate(-50%, -50%);color: black;font-family: 'Rokkitt', serif; ">
					<font style="color:black">1.Cable is annotated under each duct </font><font id="text-res-5.1"></font><br>
					<font style="color:black">2.Cable is shown and has correct size </font><font id="text-res-5.2"></font><br>
					<font style="color:black">3.Cable labelled correctly </font><font id="text-res-5.3"></font><br>
					<font style="color:black">4.Cables are attached to support structures </font><font id="text-res-5.4"></font><br>
					<font style="color:black">5.Check cable attribute "Tie Cable:Y" for all cables </font><font id="text-res-5.5"></font><br>
					<font style="color:black">6.Check correctness of all CSS cable measurement attributes </font><font id="text-res-5.6"></font><br>
	</div>
	<div id ="status-res7" style="display:none; position: relative;float: left;top: 50%;left: 50%;transform: translate(-50%, -50%);color: black;font-family: 'Rokkitt', serif; ">
					<font style="color:black">1.Verify Asset capture has been loaded and is correct </font><font id="text-res-7.1"></font><br>
					<font style="color:black">2.Verify Asset capture is correct for existing network  </font><font id="text-res-7.2"></font><br>
					<font style="color:black">3.Manual - Verify batch numbers are loaded into PNI </font><font id="text-res-7.3"></font><br>
					<font style="color:black">4.Manual - Check IWR numbers have been loaded into PNI </font><font id="text-res-7.4"></font><br>
	</div>
	<div id ="status-res6" style="display:none; position: relative;float: left;top: 50%;left: 50%;transform: translate(-50%, -50%);color: black;font-family: 'Rokkitt', serif; ">
					<font style="color:black">1.Check Site Code, Node Name, Address and Object Status  are loaded in PNI </font><font id="text-res-6.1"></font><br>
					<font style="color:black">2.Manual - FNO detailed drawing can be opened </font><font id="text-res-6.2"></font><br>
					<font style="color:black">3.Logical name of each FNOs populated on each attribute </font><font id="text-res-6.3"></font><br>
					<font style="color:black">4.Manual - Splitter installation - 384 type cabinet splitters required </font><font id="text-res-6.4"></font><br>
					<font style="color:black">5.Splitter installation - Node jumpering template </font><font id="text-res-6.5"></font><br>
	</div>
	
	  <!----------------------------- HIDDEN RESULT OVERLAYS  --------------------------->
	  
	  
	<div id ="error-res" style="display:none; position: relative;float: left;top: 50%;left: 50%;transform: translate(-50%, -50%);color: black;font-family: 'Rokkitt', serif; ">
		<font style="color:black">Error - Improper input files / Source not found</font>
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
	
  <div id ="errorText" style="display:none; color: white; position: relative;float: left;top: 50%;left: 50%;transform: translate(-50%, -50%); font-family: 'Rokkitt', serif;">
  <p style="font-size: 200%;">ERROR - IMPROPER INPUT</p>
  </div>	
	
	
	<!----------------------------- DASHBOARD DIVISIONS --------------------------->

  <div class="container-fluid">
	<!----------------------------- DIVISION 1 -----------ACTIVITY5---------------->
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
		<!----------------------------- DIVISION 2 -----------ACTIVITY15---------------->
        <div class="row">
          <div class="col-sm-12">
            <div class="chart-wrapper">
              <div id="div-title2" class="chart-title" style="background: rgba(29, 220, 226, .6); font-weight: bold;">
                Activity 15 - Equipment Specifications
              </div>
              <div id ="div-res2" class="chart-stage" style="height: 120px; width: 100%; display: block; background: rgba(255, 199, 0, .6
			  );">
				<div id ="progressbar-res2" style="position: relative;float: left;top: 50%;left: 50%;transform: translate(-50%, -50%);color: white;font-family: 'Rokkitt', serif; ">
				<p style="font-size: 250%;">IN PROGRESS</p>
				<progress id="p1" style="font-size: 150%; margin-left: 2%;"></progress>
				</div>
			  </div>				
              <div id="div-notes2" class="chart-notes" style="height: 31px; width: 100%; display: block;">
					<div id ="notes-text2" style=" color: white; position: relative;float: left;top: 50%;left: 50%;transform: translate(-50%, -50%); font-family: 'Rokkitt', serif;">
					</div>
              </div>			  
            </div>
          </div>
        </div>
      </div>
	  <!----------------------------- GRAPH VIEW DIVISION--------------------------------------->
      <div class="col-sm-6">
        <div class="chart-wrapper">
          <div class="chart-title" style="background: rgba(29, 220, 226, .6); font-weight: bold;">
            Overall Status
          </div>
          <div class="chart-stage" style="height: 315px; width: 100%; display: block;">
			<button style="display:none;" id="report" onclick="createReport()">Generate Report</button>
            <div id="piechart_3d" style="width: 100%; height: 100%;"></div>			
          </div>
          <div class="chart-notes" style="height: 31px; width: 100%; display: block;">
            Displays the current state results of the tasks running.
          </div>
        </div>
      </div>
	  <!----------------------------- DIVISION 3 -----------ACTIVITY 1---------------->
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
		<!----------------------------- DIVISION 4 -----------ACTIVITY 17---------------->
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
	<!----------------------------- DIVISION 5 -----------ACTIVITY 5---------------->
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
	  <!----------------------------- DIVISION 6 -----------ACTIVITY 11---------------->
      <div class="col-sm-4">
        <div class="chart-wrapper">
          <div id="div-title6" class="chart-title" style="background: rgba(29, 220, 226, .6); font-weight: bold;">
            Activity 11 - Site Details
          </div>
          <div id ="div-res6" class="chart-stage" style="height: 120px; width: 100%; display: block; background: rgba(255, 199, 0, .6);">
				<div id ="progressbar-res6" style="position: relative;float: left;top: 50%;left: 50%;transform: translate(-50%, -50%);color: white;font-family: 'Rokkitt', serif; ">
					<p style="font-size: 250%;">IN PROGRESS</p>
					<progress id="p1" style="font-size: 150%; margin-left: 2%;"></progress>
				</div>				
              </div>
          <div id="div-notes6" class="chart-notes" style="height: 31px; width: 100%; display: block;">
				<div id ="notes-text6" style=" color: white; position: relative;float: left;top: 50%;left: 50%;transform: translate(-50%, -50%); font-family: 'Rokkitt', serif;">
				</div>
              </div>
        </div>
      </div>
	  <!----------------------------- DIVISION 7 -----------ACTIVITY 8---------------->
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
	<!----------------------------- DIVISION 8 -----------ACTIVITY ---------------->
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
	  <!----------------------------- DIVISION 9 -----------ACTIVITY ---------------->
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
	  <!----------------------------- DIVISION 10 -----------ACTIVITY ---------------->
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
  <script lang="text/javascript" src="js/complete.js"></script>    
</body>
</html>
