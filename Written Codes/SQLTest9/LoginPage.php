<!DOCTYPE html>
<html>
	<head>

		<link rel="stylesheet" href="24.css">
	</head>
	<body>

		<h1>WILLETTON SENIOR HIGH SCHOOL</h1>
		<title>Login Page </title>

		<div style="margin:auto; width:75.5%; min-width:700px;">
			<p>
				<input type="text" id="teacherInput" onkeyup="teacherFunction()" placeholder="Please select your name.." title="Type in a name">
			</p>

			<ul id="teacherUL">
				<?php
					session_start();
					$_SESSION['VistCount'] = 0;
					$headerNeeded = false;
	
					$link = mysqli_connect("localhost", "root", "");
					mysqli_select_db($link, "mPointsDB");

					$firstLetter = 0;
					$letterList = ".ABCDEFGHIJKLMNOPQRSTUVWXYZ";	
					$headerNeeded = true;
	
					$result = mysqli_query($link, "select Status,UserIndex,FName,LName,Class1 FROM teacher ORDER BY LName, FName ASC")
						or 
					die ("Failed to query database".mysqli_error($link));
	
					while($row = mysqli_fetch_assoc($result)){
						if ($row['LName'][0] != $letterList[$firstLetter]) {
							while($row['LName'][0] != $letterList[$firstLetter]){
								$firstLetter ++;
						
								if ($firstLetter > 27) {
									die;
								}
							}
							echo"<li><a href=\"#\" class=\"header\" >$letterList[$firstLetter]</a></li>";
						}
						echo"<li><a href=\"MainPage.php?index={$row['UserIndex']}&status={$row['Status']}&filter=taught&extraDropdown=NULL&reason=3\">{$row['LName']}, {$row['FName']}</a></li>";
        
					}
				?>

			</ul>
			<form action="LoginDeveloper.php">
    			<input id="devbutton" type="submit" value="Developer" />
			</form>
		</div>

		<div id="cf4a"><img class="bottom" src=
 		   "/img/LoginBackground.jpg" /> <img class="top" src=
 		   "/img/LoginBackground2.jpg" /> <img class="middle" src=
 		   "/img/LoginBackground3.jpg" /> <img class="middle2" src=
 		   "/img/LoginBackground4.jpg" />
    	</div>
		<script>
			function teacherFunction() {
   			var input, filter, ul, li, a, i;
   		  		input = document.getElementById("teacherInput");
   			 	filter = input.value.toUpperCase();
  			  	ul = document.getElementById("teacherUL");
  			  	li = ul.getElementsByTagName("li");
  			  	for (i = 0; i < li.length; i++) {
     			   a = li[i].getElementsByTagName("a")[0];
      			   if (a.textContent.toUpperCase().indexOf(filter) > -1) {
            		   li[i].style.display = "";
        		   } else {
           			   li[i].style.display = "none";

       			   }
    		   }
		   }

		   function teacherLogin() {
		   var teacherStatus;
		   href()
	   	   }
	  </script>

	</body>
</html>