	  var inprogress;
	  var fin;
	  var failed;
	  var manual;
	  var result5=[0,0,0,0];
	  var result8=[0,0];
	  var result16=0;
	  var result17=0;
	  var mainresult = 0;
	  var tempvalue;
	  var params;
	 
	  //google.charts.setOnLoadCallback(drawChart);
      
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Status', 'Count'],
          ['In Progress',     inprogress],
		  ['Failed',  failed],
		  ['Manual',      manual],
          ['Success', fin],
		  ['Coming Soon', 4],
		  ['Error',error]
        ]);

        var options = {
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
	  
	  function modifydata()
	  {
		var prefix = "SAM=";
		var postfix = window.location.hash.substring(1);
		params = prefix.concat(postfix);
		document.getElementById("navbar").textContent=postfix;	
		inprogress=6;
		fin=0;
		failed=0;
		manual=3;
		error=0;
		google.charts.setOnLoadCallback(drawChart);
		
		//---------------------------Activity 5----------------Division 5-----------------------------------------------//
		
		var http5 = new XMLHttpRequest();
		http5.onload = function() {
		var resultArray = JSON.parse(this.responseText);						
		if((resultArray.result).localeCompare('Success') == 0)
		{
			document.getElementById("div-res5").style.background = "rgba(233, 255, 94, 0.3)";
			document.getElementById('progressbar-res5').innerHTML = document.getElementById('status-res5').innerHTML;
			document.getElementById("div-notes5").style.background = "rgba(0, 255, 0, 0.7)";
			document.getElementById('notes-text5').innerHTML = document.getElementById('completedText').innerHTML;
			document.getElementById('text-res-5.1').innerHTML = document.getElementById('mark-manual').innerHTML;
			document.getElementById('text-res-5.2').innerHTML = document.getElementById('mark-pass').innerHTML;
			document.getElementById('text-res-5.3').innerHTML = document.getElementById('mark-pass').innerHTML;
			document.getElementById('text-res-5.4').innerHTML = document.getElementById('mark-pass').innerHTML;			
			inprogress=inprogress-1;
			fin=fin+1;
			result5[0]=1;result5[1]=1;result5[2]=1;result5[3]=1;
		}
		else if((resultArray.result).localeCompare('Failed')==0)
		{
			document.getElementById("div-res5").style.background = "rgba(233, 255, 94, 0.3)";
			document.getElementById('progressbar-res5').innerHTML = document.getElementById('status-res5').innerHTML;
			document.getElementById("div-notes5").style.background = "rgba(255, 0, 0, 0.7)";
			document.getElementById('notes-text5').innerHTML = document.getElementById('failedText').innerHTML;
			document.getElementById('text-res-5.1').innerHTML = document.getElementById('mark-manual').innerHTML;
			document.getElementById('text-res-5.4').innerHTML = document.getElementById('mark-manual').innerHTML;
			document.getElementById('text-res-5.5').innerHTML = document.getElementById('mark-manual').innerHTML;
			if((resultArray.res1a).localeCompare('Failed')==0)
			{
				document.getElementById('text-res-5.2').innerHTML = document.getElementById('mark-fail').innerHTML;
			}
			else
			{
				document.getElementById('text-res-5.2').innerHTML = document.getElementById('mark-pass').innerHTML;
			}
			if((resultArray.res2a).localeCompare('Failed')==0)
			{
				document.getElementById('text-res-5.3').innerHTML = document.getElementById('mark-fail').innerHTML;
			}
			else
			{
				document.getElementById('text-res-5.3').innerHTML = document.getElementById('mark-pass').innerHTML;
			}
			if((resultArray.res3a).localeCompare('Failed')==0)
			{
				document.getElementById('text-res-5.6').innerHTML = document.getElementById('mark-fail').innerHTML;
			}
			else
			{
				document.getElementById('text-res-5.6').innerHTML = document.getElementById('mark-pass').innerHTML;
			}
			inprogress=inprogress-1;
			failed=failed+1;
		}
		else
		{
			document.getElementById("div-res5").style.background = "rgba(233, 255, 94, 0.3)";
			document.getElementById('progressbar-res5').innerHTML = document.getElementById('error-res').innerHTML;
			document.getElementById("div-notes5").style.background = "rgba(255, 0, 0, 0.7)";
			document.getElementById('notes-text5').innerHTML = document.getElementById('errorText').innerHTML;			
			inprogress=inprogress-1;
			error=error+1;
		}
		google.charts.setOnLoadCallback(drawChart);
		mainresult = mainresult + 1;
		};
					
		http5.open("POST", "php/Activity5.php", true);		
		http5.setRequestHeader("Content-type", "application/x-www-form-urlencoded");		
		http5.send(params);
		
		
		//---------------------------Activity 8---------------Division 7------------------------------------------------//
		
		var http8 = new XMLHttpRequest();
		http8.onload = function() {
		var resultArray = JSON.parse(this.responseText);						
		if((resultArray.result).localeCompare('Success') == 0)
		{
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
		else if((resultArray.result).localeCompare('Failed')==0)
		{
			document.getElementById("div-res7").style.background = "rgba(233, 255, 94, 0.3)";
			document.getElementById('progressbar-res7').innerHTML = document.getElementById('status-res7').innerHTML;
			document.getElementById("div-notes7").style.background = "rgba(255, 0, 0, 0.7)";
			document.getElementById('notes-text7').innerHTML = document.getElementById('failedText').innerHTML;
			document.getElementById('text-res-7.3').innerHTML = document.getElementById('mark-manual').innerHTML;
			document.getElementById('text-res-7.4').innerHTML = document.getElementById('mark-manual').innerHTML;
			if((resultArray.res1a).localeCompare('Failed')==0)
			{
				document.getElementById('text-res-7.1').innerHTML = document.getElementById('mark-fail').innerHTML;
			}
			else
			{
				document.getElementById('text-res-7.1').innerHTML = document.getElementById('mark-pass').innerHTML;
			}
			if((resultArray.res2a).localeCompare('Failed')==0)
			{
				document.getElementById('text-res-7.2').innerHTML = document.getElementById('mark-fail').innerHTML;
			}
			else
			{
				document.getElementById('text-res-7.2').innerHTML = document.getElementById('mark-pass').innerHTML;
			}
			inprogress=inprogress-1;
			failed=failed+1;
		}
		else
		{
			document.getElementById("div-res7").style.background = "rgba(233, 255, 94, 0.3)";
			document.getElementById('progressbar-res7').innerHTML = document.getElementById('error-res').innerHTML;
			document.getElementById("div-notes7").style.background = "rgba(255, 0, 0, 0.7)";
			document.getElementById('notes-text7').innerHTML = document.getElementById('errorText').innerHTML;			
			inprogress=inprogress-1;
			error=error+1;
		}
		google.charts.setOnLoadCallback(drawChart);
		mainresult = mainresult + 1;
		};
		http8.open("POST", "php/Activity8.php", true);		
		http8.setRequestHeader("Content-type", "application/x-www-form-urlencoded");		
		http8.send(params);
		
		
		//---------------------------Activity 11---------------Division 6------------------------------------------------//
		
		
		var http11 = new XMLHttpRequest();
		http11.onload = function() {
		var resultArray = JSON.parse(this.responseText);						
		if((resultArray.result).localeCompare('Success') == 0)
		{
			document.getElementById("div-res6").style.background = "rgba(233, 255, 94, 0.3)";
			document.getElementById('progressbar-res6').innerHTML = document.getElementById('status-res6').innerHTML;
			document.getElementById("div-notes6").style.background = "rgba(0, 255, 0, 0.7)";
			document.getElementById('notes-text6').innerHTML = document.getElementById('completedText').innerHTML;
			document.getElementById('text-res-6.1').innerHTML = document.getElementById('mark-pass').innerHTML;
			document.getElementById('text-res-6.2').innerHTML = document.getElementById('mark-manual').innerHTML;
			document.getElementById('text-res-6.3').innerHTML = document.getElementById('mark-pass').innerHTML;
			document.getElementById('text-res-6.4').innerHTML = document.getElementById('mark-manual').innerHTML;
			document.getElementById('text-res-6.5').innerHTML = document.getElementById('mark-pass').innerHTML;
			inprogress=inprogress-1;
			fin=fin+1;
		}
		else if((resultArray.result).localeCompare('Failed')==0)
		{
			document.getElementById("div-res6").style.background = "rgba(233, 255, 94, 0.3)";
			document.getElementById('progressbar-res6').innerHTML = document.getElementById('status-res6').innerHTML;
			document.getElementById("div-notes6").style.background = "rgba(255, 0, 0, 0.7)";
			document.getElementById('notes-text6').innerHTML = document.getElementById('failedText').innerHTML;
			document.getElementById('text-res-6.2').innerHTML = document.getElementById('mark-manual').innerHTML;
			document.getElementById('text-res-6.4').innerHTML = document.getElementById('mark-manual').innerHTML;
			if((resultArray.res1a).localeCompare('Failed')==0)
			{
				document.getElementById('text-res-6.1').innerHTML = document.getElementById('mark-fail').innerHTML;
			}
			else
			{
				document.getElementById('text-res-6.1').innerHTML = document.getElementById('mark-pass').innerHTML;
			}
			if((resultArray.res2a).localeCompare('Failed')==0)
			{
				document.getElementById('text-res-6.3').innerHTML = document.getElementById('mark-fail').innerHTML;
			}
			else
			{
				document.getElementById('text-res-6.3').innerHTML = document.getElementById('mark-pass').innerHTML;
			}
			if((resultArray.res3a).localeCompare('Failed')==0)
			{
				document.getElementById('text-res-6.5').innerHTML = document.getElementById('mark-fail').innerHTML;
			}
			else
			{
				document.getElementById('text-res-6.5').innerHTML = document.getElementById('mark-pass').innerHTML;
			}
			inprogress=inprogress-1;
			failed=failed+1;
		}
		else
		{
			document.getElementById("div-res6").style.background = "rgba(233, 255, 94, 0.3)";
			document.getElementById('progressbar-res6').innerHTML = document.getElementById('error-res').innerHTML;
			document.getElementById("div-notes6").style.background = "rgba(255, 0, 0, 0.7)";
			document.getElementById('notes-text6').innerHTML = document.getElementById('errorText').innerHTML;			
			inprogress=inprogress-1;
			error=error+1;
		}
		google.charts.setOnLoadCallback(drawChart);
		mainresult = mainresult + 1;
		};
		http11.open("POST", "php/Activity11.php", true);		
		http11.setRequestHeader("Content-type", "application/x-www-form-urlencoded");		
		http11.send(params);
		
		//---------------------------Activity 15---------------Division 2------------------------------------------------//
		
		var http15 = new XMLHttpRequest();
		http15.onload = function() {
		var resultArray = JSON.parse(this.responseText);						
		if((resultArray.result).localeCompare('Success') == 0)
		{
			document.getElementById("div-res2").style.background = "rgba(233, 255, 94, 0.3)";
			document.getElementById('progressbar-res2').innerHTML = document.getElementById('status-res2').innerHTML;
			document.getElementById("div-notes2").style.background = "rgba(0, 255, 0, 0.7)";
			document.getElementById('notes-text2').innerHTML = document.getElementById('completedText').innerHTML;
			document.getElementById('text-res-2.1').innerHTML = document.getElementById('mark-pass').innerHTML;
			document.getElementById('text-res-2.2').innerHTML = document.getElementById('mark-pass').innerHTML;
			document.getElementById('text-res-2.3').innerHTML = document.getElementById('mark-pass').innerHTML;
			inprogress=inprogress-1;
			fin=fin+1;
		}
		else if((resultArray.result).localeCompare('Failed')==0)
		{
			document.getElementById("div-res2").style.background = "rgba(233, 255, 94, 0.3)";
			document.getElementById('progressbar-res2').innerHTML = document.getElementById('status-res2').innerHTML;
			document.getElementById("div-notes2").style.background = "rgba(255, 0, 0, 0.7)";
			document.getElementById('notes-text2').innerHTML = document.getElementById('failedText').innerHTML;
			if((resultArray.res1a).localeCompare('Failed')==0)
			{
				document.getElementById('text-res-2.1').innerHTML = document.getElementById('mark-fail').innerHTML;
			}
			else
			{
				document.getElementById('text-res-2.1').innerHTML = document.getElementById('mark-pass').innerHTML;
			}
			if((resultArray.res2a).localeCompare('Failed')==0)
			{
				document.getElementById('text-res-2.2').innerHTML = document.getElementById('mark-fail').innerHTML;
			}
			else
			{
				document.getElementById('text-res-2.2').innerHTML = document.getElementById('mark-pass').innerHTML;
			}
			if((resultArray.res3a).localeCompare('Failed')==0)
			{
				document.getElementById('text-res-2.3').innerHTML = document.getElementById('mark-fail').innerHTML;
			}
			else
			{
				document.getElementById('text-res-2.3').innerHTML = document.getElementById('mark-pass').innerHTML;
			}
			inprogress=inprogress-1;
			failed=failed+1;
		}
		else
		{
			document.getElementById("div-res6").style.background = "rgba(233, 255, 94, 0.3)";
			document.getElementById('progressbar-res6').innerHTML = document.getElementById('error-res').innerHTML;
			document.getElementById("div-notes6").style.background = "rgba(255, 0, 0, 0.7)";
			document.getElementById('notes-text6').innerHTML = document.getElementById('errorText').innerHTML;			
			inprogress=inprogress-1;
			error=error+1;
		}
		google.charts.setOnLoadCallback(drawChart);
		mainresult = mainresult + 1;
		};
		http15.open("POST", "php/Activity15.php", true);		
		http15.setRequestHeader("Content-type", "application/x-www-form-urlencoded");		
		http15.send(params);
		
		//---------------------------Activity 16---------------Division 1------------------------------------------------//
		
		var http16 = new XMLHttpRequest();
		http16.onload = function() {
		var resultArray = JSON.parse(this.responseText);						
		if((resultArray.result).localeCompare('Success') == 0)
		{
			document.getElementById("div-res1").style.background = "rgba(233, 255, 94, 0.3)";
			document.getElementById('progressbar-res1').innerHTML = document.getElementById('status-res1').innerHTML;
			document.getElementById("div-notes1").style.background = "rgba(0, 255, 0, 0.7)";
			document.getElementById('notes-text1').innerHTML = document.getElementById('completedText').innerHTML;
			document.getElementById('text-res-1.1').innerHTML = document.getElementById('mark-pass').innerHTML;
			inprogress=inprogress-1;
			fin=fin+1;
			result16=1;
		}
		else if((resultArray.result).localeCompare('Failed')==0)
		{
			document.getElementById("div-res1").style.background = "rgba(233, 255, 94, 0.3)";
			document.getElementById('progressbar-res1').innerHTML = document.getElementById('status-res1').innerHTML;
			document.getElementById("div-notes1").style.background = "rgba(255, 0, 0, 0.7)";
			document.getElementById('notes-text1').innerHTML = document.getElementById('failedText').innerHTML;
			document.getElementById('text-res-1.1').innerHTML = document.getElementById('mark-fail').innerHTML;			
			inprogress=inprogress-1;
			failed=failed+1;
			result16=0;
		}
		else
		{
			document.getElementById("div-res1").style.background = "rgba(233, 255, 94, 0.3)";
			document.getElementById('progressbar-res1').innerHTML = document.getElementById('error-res').innerHTML;
			document.getElementById("div-notes1").style.background = "rgba(255, 0, 0, 0.7)";
			document.getElementById('notes-text1').innerHTML = document.getElementById('errorText').innerHTML;			
			inprogress=inprogress-1;
			error=error+1;
		}
		google.charts.setOnLoadCallback(drawChart);
		mainresult = mainresult + 1;
		};
		http16.open("POST", "php/Activity16.php", true);		
		http16.setRequestHeader("Content-type", "application/x-www-form-urlencoded");		
		http16.send(params);
		
		//---------------------------Activity 17---------------Division 4------------------------------------------------//
		
		var http17 = new XMLHttpRequest();
		http17.onload = function() {
		var resultArray = JSON.parse(this.responseText);						
		if((resultArray.result).localeCompare('Success') == 0)
		{
			document.getElementById("div-res4").style.background = "rgba(233, 255, 94, 0.3)";
			document.getElementById('progressbar-res4').innerHTML = document.getElementById('status-res4').innerHTML;					
			document.getElementById('div-notes4').style.background = "rgba(0, 255, 0, 0.7)";
			document.getElementById('notes-text4').innerHTML = document.getElementById('completedText').innerHTML;
			document.getElementById('text-res-4.1').innerHTML = document.getElementById('mark-pass').innerHTML;
			inprogress=inprogress-1;
			fin=fin+1;
			result17=1;
		}
		else if((resultArray.result).localeCompare('Failed')==0)
		{
			document.getElementById("div-res4").style.background = "rgba(233, 255, 94, 0.3)";
			document.getElementById('progressbar-res4').innerHTML = document.getElementById('status-res4').innerHTML;
			document.getElementById("div-notes4").style.background = "rgba(255, 0, 0, 0.7)";
			document.getElementById('notes-text4').innerHTML = document.getElementById('failedText').innerHTML;
			document.getElementById('text-res-4.1').innerHTML = document.getElementById('mark-fail').innerHTML;
			inprogress=inprogress-1;
			failed=failed+1;
			result17=0;
		}
		else
		{
			document.getElementById("div-res4").style.background = "rgba(233, 255, 94, 0.3)";
			document.getElementById('progressbar-res4').innerHTML = document.getElementById('error-res').innerHTML;
			document.getElementById("div-notes4").style.background = "rgba(255, 0, 0, 0.7)";
			document.getElementById('notes-text4').innerHTML = document.getElementById('errorText').innerHTML;			
			inprogress=inprogress-1;
			error=error+1;
		}
		google.charts.setOnLoadCallback(drawChart);
		mainresult = mainresult + 1;
		};
		http17.open("POST", "php/Activity17.php", true);		
		http17.setRequestHeader("Content-type", "application/x-www-form-urlencoded");		
		http17.send(params);
		google.charts.setOnLoadCallback(drawChart);
	}
	function checkall()
	{	
		if(mainresult == 6)
		{
			document.getElementById('report').style.display = "";			
			document.getElementById('progressbar-res1').innerHTML = document.getElementById('status-res1').innerHTML;
			document.getElementById('progressbar-res2').innerHTML = document.getElementById('status-res2').innerHTML;
			document.getElementById('progressbar-res4').innerHTML = document.getElementById('status-res4').innerHTML;
			document.getElementById('progressbar-res5').innerHTML = document.getElementById('status-res5').innerHTML;
			document.getElementById('progressbar-res6').innerHTML = document.getElementById('status-res6').innerHTML;
			document.getElementById('progressbar-res7').innerHTML = document.getElementById('status-res7').innerHTML;
			clearInterval(timer);
		}
			
	}
	
	function mainstart()
	{	
		modifydata();
		tempvalue = setInterval(checkall,6000);
	}
	
	function createReport()
	{
		var http_report = new XMLHttpRequest();
		http_report.onload = function() {
		var resultArray = JSON.parse(this.responseText);
			if((resultArray.result).localeCompare('Success') == 0)
			{
				alert("Report Generated Successfully");
			}
			else
			{
				alert("Report Generation Failure !!!");
			}
		}
		http_report.open("POST", "php/createReport.php", true);		
		http_report.setRequestHeader("Content-type", "application/x-www-form-urlencoded");		
		http_report.send(params);
	}