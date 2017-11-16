<html>
  <head>
    <meta charset="utf-8">
    <title>Sign Up For Beta Form</title>
    <link rel="stylesheet" href="css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
	<style>
		
body {
  background: #F8A434;
  font-family: 'Lato', sans-serif;
  color: #FDFCFB;
  width: 450px;
  margin: 17% auto;
}


form {
  width: 450px;
  margin: 17% auto;
}


.header {
  font-size: 35px;
  text-transform: uppercase;
  letter-spacing: 5px;
}


.description {
  font-size: 14px;
  letter-spacing: 1px;
  line-height: 1.3em;
  margin: -2px 0 45px;
}


.input {
  display: flex;
  align-items: center;
}


.button {
  height: 44px;
  border: none;
}

  
#sam {
  width: 75%;
  background: #FDFCFB;
  font-family: inherit;
  color: #737373;
  letter-spacing: 1px;
  text-indent: 5%;
  border-radius: 5px 0 0 5px;
}


#submit {
  width: 25%;
  height: 46px;
  background: #E86C8D;
  font-family: inherit;
  font-weight: bold;
  color: inherit;
  letter-spacing: 1px;
  border-radius: 0 5px 5px 0;
  cursor: pointer;
  transition: background .3s ease-in-out;
}
  

#submit:hover {
  background: #d45d7d;
}
  

input:focus {
  outline: none;
  outline: 2px solid #E86C8D;
  box-shadow: 0 0 2px #E86C8D;
}
	</style>
  </head>
  <body>
      <div class="header">
         <p>Robotic Quality Assurance PLatform</p>
      </div>
      <div class="description">
        <p>Please enter the SAM ID to perform the Quality checks.</p>
      </div>
      <div class="input">
        <input type="text" class="button" id="sam" name="email" placeholder="EXAMPLE:1AAA-01">
        <button class="button" id="submit" onclick="startprocess()">SUBMIT</button>
      </div>
	
	<script type="text/javascript">
		function startprocess(){
			
			var SAM = document.getElementById("sam").value;
			var http = new XMLHttpRequest();
			var url = "beginsam.php";
			var prefix = "SAM=";
			var params = prefix.concat(SAM);
						
			http.onload = function() {
				var resultArray = JSON.parse(this.responseText);				
				if((resultArray.result).localeCompare('Success')==0)
				{	
					window.location.href = 'dashboard.php' + '#' + SAM;
				}
				else
				{
					alert('FAIL');
				}
			};
			http.open("POST", url, true);
			http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");		
			http.send(params);
		}
	</script>
  </body>
</html>