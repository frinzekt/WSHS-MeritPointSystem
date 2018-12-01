<!DOCTYPE html>

<html>

  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  </head>
    <title></title>
    <style type="text/css"> 
      /*<![CDATA[*/
      body {
		  overflow:hidden;
      }
      h1 {
        font-family: sans-serif;
        width: 75%;
		height:10%;
        top: -50px;
        font-size: 4vw;
        background-image: url('SchoolLogo.png');
        background-size: 17vw 8vw;
        background-position: -20px 30px;
        background-repeat: no-repeat;
        color: white;
        position: relative;
        padding: 40px 0px 30px 11%;
        left: 0;
        text-shadow: 10px 10px 20px black;
		z-index: 1;
		margin-bottom:-80px;
      }
      
      fieldset {
        border: 1px solid lightgrey
      }
	  
	  legend {cursor:pointer;}
      
      #teacherInput {
        background-image: url('SearchIcon.png');
        background-position: 5px 5px;
        background-repeat: no-repeat;
        background-size: 30px 30px;
        width: 75.5%;
        font-size: 16px;
        padding: 12px 20px 12px 40px;
        border: 1px solid #ddd;
        margin-bottom: 12px;
        margin-top: 140px;
        margin-left: 180px;
      }
      
      #teacherUL {
        list-style-type: none;
        padding: 0px;
        margin: 0px 0px 0px 180px;
        width: 81%;
        font-family: sans-serif;
        height: 420px;
        overflow: scroll;
        position: relative;
		background-color: white;
		top: -180px;
      }
	  
	  input:checked + label {
	      padding: 12px;
	      background-color: #aaf7e9
	  }
	  
	  label:hover + input:checked{
	      padding: 12px;
	      background-color: #aaf7e9
	  }

	  label {
	      padding: 12px;
	      background-color: #f6f6f6;
	  	  font-size: 18px;
	  }

	  p {
	      margin-top: 0px;
	      margin-bottom: 0px;
	  }
      
      #teacherUL p a {
		  border: 1px solid #ddd;
	      margin-top: -1px;
	      background-color: #f6f6f6;
	      text-decoration: none;
	      font-size: 18px;
	      color: black;
	      display: block
      }
      
      #teacherUL p a.header {
	      background-color: #e2e2e2;
	      cursor: default;
      }
      
      #teacherUL p a:hover:not(.header) {
          background-color: #eee;
      }
	  
	  #teacherUL p label:hover:not(.header) + input:not(:checked){
	      background-color: #eee;
	  }
	  
	  #studentOTW_UL {
	    	list-style-type: none;
	    	padding: 0px;
	    	margin: 0px 0px 0px 0px;
	    	width: 81%;
	    	font-family: sans-serif;
			font-size: 14px;
	    	max-height: 520px;
	    	overflow: scroll;
	    	background-color: white;
			position: relative;
			top: -100px;
	  }

	  #studentOTW_UL p a {
	    	border: 1px solid #ddd;
	    	margin-top: -1px;
	    	background-color: #f6f6f6;
	    	text-decoration: none;
	    	color: black;
	    	display: block
	  }

	  #studentOTW_UL p a.header {
	    	background-color: #e2e2e2;
	    	cursor: default;
	  		font-size: 18px;
	  }

	  #studentOTW_UL p a:hover:not(.header) {
	    	background-color: #eee;
	  }
	  #studentOTW_UL p label:hover:not(.header) + input:not(:checked){
	    	background-color: #eee;
	  }
	  
	  option[value=""][disabled] {
	    display: none;
	  }
      
      @-webkit-keyframes cf4FadeInOut {
        0% {
          opacity: 1;
        }
        17% {
          opacity: 1;
        }
        25% {
          opacity: 0;
        }
        92% {
          opacity: 0;
        }
        100% {
          opacity: 1;
        }
      }
      
      @-moz-keyframes cf4FadeInOut {
        0% {
          opacity: 1;
        }
        17% {
          opacity: 1;
        }
        25% {
          opacity: 0;
        }
        92% {
          opacity: 0;
        }
        100% {
          opacity: 1;
        }
      }
      
      @-o-keyframes cf4FadeInOut {
        0% {
          opacity: 1;
        }
        17% {
          opacity: 1;
        }
        25% {
          opacity: 0;
        }
        92% {
          opacity: 0;
        }
        100% {
          opacity: 1;
        }
      }
      
      @keyframes cf4FadeInOut {
        0% {
          opacity: 1;
        }
        17% {
          opacity: 1;
        }
        25% {
          opacity: 0;
        }
        92% {
          opacity: 0;
        }
        100% {
          opacity: 1;
        }
      }
      
      #cf4a {
        position: fixed;
        height: 100%;
        width: 100%;
        margin: 0;
        top: 0;
        z-index: -1;
      }
      
      #cf4a img {
        position: fixed;
        left: 0;
        height: 100%;
        width: 100%;
      }
      
      #cf4a img {
        -webkit-animation-name: cf4FadeInOut;
        -webkit-animation-timing-function: ease-in-out;
        -webkit-animation-iteration-count: infinite;
        -webkit-animation-duration: 32s;
        -moz-animation-name: cf4FadeInOut;
        -moz-animation-timing-function: ease-in-out;
        -moz-animation-iteration-count: infinite;
        -moz-animation-duration: 32s;
        -o-animation-name: cf4FadeInOut;
        -o-animation-timing-function: ease-in-out;
        -o-animation-iteration-count: infinite;
        -o-animation-duration: 32s;
        animation-name: cf4FadeInOut;
        animation-timing-function: ease-in-out;
        animation-iteration-count: infinite;
        animation-duration: 32s;
      }
      
      #cf4a img:nth-of-type(1) {
        -webkit-animation-delay: 24s;
        -moz-animation-delay: 24s;
        -o-animation-delay: 24s;
        animation-delay: 24s;
      }
      
      #cf4a img:nth-of-type(2) {
        -webkit-animation-delay: 16s;
        -moz-animation-delay: 16s;
        -o-animation-delay: 16s;
        animation-delay: 16s;
      }
      
      #cf4a img:nth-of-type(3) {
        -webkit-animation-delay: 8s;
        -moz-animation-delay: 8s;
        -o-animation-delay: 8s;
        animation-delay: 8s;
      }
      
      #cf4a img:nth-of-type(4) {
        -webkit-animation-delay: 0;
        -moz-animation-delay: 0;
        -o-animation-delay: 0;
        animation-delay: 0;
      }
      
      div2 {
        display: none;
      }
      /*]]>*/
	  a {
	      text-decoration: none;
	      font-size: 13px;
	      color: #818181;
	      display: block;
	      transition: 0.3s
	  }

	  /* When you mouse over the navigation links, change their color */
	  a:hover, .offcanvas a:focus{
	      color: #f1f1f1;
		  background-color:grey;
	  }
	  #ReplaceButton {
		  /*display:none;*/
	  }
    </style>

  <body>

    <body onload="onLoad()">
	<body onresize='resize("main")'>
		
      <h1>WILLETTON SENIOR HIGH SCHOOL</h1>

      <div id = "main" style="background-color: white; width: 80%; top:110px; margin-left:12%; padding-top : 1%; padding-left: 2%; padding-right:2%; font-family: Helvetica; height:75%; overflow: scroll; overflow-x:hidden; margin-top:2%; position: absolute">
        <h2 style="margin: 1%;padding-top: 1%; padding-left: 1%; font-family: Helvetica;color: dimGrey">
    Developer Settings<br />
    <br /></h2>
		
		<!-- Email SETTINGS-->
		 <fieldset id = "Settings" style="color:dimGrey;">
		           <legend class="hide">Email settings</legend>
		           <div2>
		 			<form action="EmailSettings.php">
		               <?php
						 $link = mysqli_connect("localhost", "root", "");
						 mysqli_select_db($link, "mPointsDB");
					   
						 $query = mysqli_query($link, "Select * FROM settings");
						 $result = mysqli_fetch_assoc($query);
		 	          ?>

		               <p style="color: black; position: fixed; font-weight:400; font-size:18px; position:relative">
		                 Capped number of merit points given from one class (0 if disabled)</p>
		               <input min="0" max="999" name="CapMerits" onkeypress='return event.charCode &gt;= 48 &amp;&amp; event.charCode &lt;= 57' placeholder="Enter a value (currently <?php echo $result['MeritCap'];?>)"
		               style="position:rel2ative; width: 180px; border: 1px solid Grey" type="number" />

		               <br /><p style="color: black; position: fixed; font-weight:400; font-size:18px; position:relative"><br />
		                 Default teacher email message for 0 merits given
		                 <br />
		                 <textarea cols="100" name="DefMsg0" placeholder="Current message for 0 merits given: <?php echo $result['DefMsg0']?>" rows="4"></textarea>
		                 <br />
		                 <br /> Default teacher email message for under
		                 <input min="0" id="Cap" name="NumBound" onChange="changefn()" onkeypress='return event.charCode &gt;= 48 &amp;&amp; event.charCode &lt;= 57' value="<?php echo $result['NumBound']?>" style="position:relative; width: 40px"
		                 title="Set the boundary on merits given" type="number" /> merits given
		                 <br />
		                 <textarea cols="100" name="DefMsgBelow" id="DefMsgBelow" rows="4" placeholder="Current message for under <?php echo $result['NumBound'];?> merit points given: <?php echo $result['DefMsgBelow']?>"></textarea>
						 
		               </p>
		               <br /><p id = "message" style="color: black; position: fixed; font-weight:400; font-size:18px; position:relative">Default teacher email message for over <?php echo $result['NumBound'];?> merits given<p/>
		               <textarea cols="100" name="DefMsgAbove" id= "DefMsgAbove" rows="4" placeholder="Current message for over <?php echo $result['NumBound'];?> merit points given: <?php echo $result['DefMsgAbove']?>"></textarea>
		 		      <input type="submit" name="submit" value="send" style = "margin:auto; display:block"/>
			  			<br />
		 			</form>
		           </div2>
		         </fieldset>
        <br />
		
		<!-- ADD TEACHER-->
        <!--<fieldset id = "Add" style="color:dimGrey;">
          <legend class="hide">Add teacher</legend>
          <div2>
			<form>
	            <input name="ID" placeholder="Teacher ID (e123456)" type="text" />
	            <input name="FName" placeholder="First name" type="text" />
	            <input name="LName" placeholder="Last name" type="text" />
	            <input name="Email" placeholder="Email address" type="text" />
	            <br />
	            <br />
	            <input name="Class1" placeholder="Class 1" type="text" />
	            <input name="Class2" placeholder="Class 2" type="text" />
	            <input name="Class3" placeholder="Class 3" type="text" />
	            <input name="Class4" placeholder="Class 4" type="text" />
	            <br />
	            <input name="Class5" placeholder="Class 5" type="text" />
	            <input name="Class6" placeholder="Class 6" type="text" />
	            <input name="Class7" placeholder="Class 7" type="text" />
	            <input name="Class8" placeholder="Class 8" type="text" />
	      	  	<input type="submit" name="submit" value="send" style = "margin:auto; display:block"></input>
	            <br />
			</form>
          </div2>
        </fieldset>
        <br />-->

		<!-- CHANGE TEACHER ROLE-->
        <fieldset id = "Change"style="color: dimGrey">
          <legend class="hide"> Change teacher role</legend>
          <div2>
			<form id="ChangeRole" action="ChangeTeacherRole.php?Role=Role">
            <select id = "selectRole" style="top:10px; height: 30px; width: 160px; position:relative" name = "Role" value="">
			  <option name = "Role" value="" disabled selected>Select your option</option>

              <option name = "Role" value="0">
                Standard
              </option>

              <option name = "Role" value="7">
                Year 7 Coordinator
              </option>
			  
              <option name = "Role" value="8">
                Year 8 Coordinator
              </option>
			  
              <option name = "Role" value="9">
                Year 9 Coordinator
              </option>
			  
              <option name = "Role" value="10">
                Year 10 Coordinator
              </option>

              <option name = "Role" value="1">
                Administrator
              </option>
            </select>
			<input type="submit" name="confirmChange" value="confirm role change" style = "display:block; top:20px; position:relative; width:160px; height:30px"/>
			<label style="width:700px; font-size:15px; display:inline-block; position:relative; top:-50px; background-color:white; left:180px">Please select a teacher's name from the list below and their new role from the dropdown list to the left and then click the confirm button</label>
            <input id="teacherInput" onkeyup="teacherFunction()" placeholder="Please select your name.." style="position:relative; top: -180px" title="Type in a name" type="text" />
			
			<ul id="teacherUL">
			<?php
				$headerNeeded = false;

				$link = mysqli_connect("localhost", "root", "");
				mysqli_select_db($link, "mPointsDB");

				$firstLetter = 0;
				$letterList = ".ABCDEFGHIJKLMNOPQRSTUVWXYZ";	
				$headerNeeded = true;
	
				$resultTeacher = mysqli_query($link, "select Status,UserIndex,FName,LName,Class1 FROM teacher ORDER BY LName ASC")
					or 
				die ("Failed to query database".mysqli_error($link));
	
				while($row = mysqli_fetch_assoc($resultTeacher)){
					if ($row['LName'][0] != $letterList[$firstLetter]) {
						while($row['LName'][0] != $letterList[$firstLetter]){
							$firstLetter ++;
						
							if ($firstLetter > 27) {
								die;
							}
						}
						echo"<p style=\"padding-bottom: 0px; margin-bottom: 0px; padding:12px; background-color:#e2e2e2\"><a class=\"header\" >&nbsp&nbsp{$letterList[$firstLetter]}</a></p>";
					}
					echo"<p><a><input type=\"radio\" name=\"changeTeacherRole[]\" value=\"{$row['UserIndex']}\" id=\"changeTeacherRole[{$row['UserIndex']}]\" style=\"display:none\">
						<label style=\"display:block\" for=\"changeTeacherRole[{$row['UserIndex']}]\">{$row['LName']}, {$row['FName']}</label></a></p>";
        
				}
    
			?>
		  </ul>
		  
	  		</form>
          </div2>
        </fieldset>
		<br>
		
		<!-- REMOVE TEACHER-->
       
	   <!-- <fieldset id = "RemoveT" style="color: dimGrey">
          <legend class="hide"> Remove teachers</legend>
          <div2>
			  <form>
		      <input type="submit" name="submit" value="send" style = "margin:auto; display:block"></input>
		  	  </form>
          </div2>
        </fieldset>
		<br>
		
		 EDIT TEACHERS
        <fieldset id = "EditT" style="color: dimGrey">
          <legend class="hide"> Edit teachers</legend>
          <div2>
			<form>
				PLEASE ADD CODE FOR CHECKLISTBOX HERE TOO PLEASE!!!!!!!!
			
			<div3 style = "display:none">
		        <input name="ID" placeholder="Teacher ID (e123456)" type="text" />
		        <input name="FName" placeholder="First name" type="text" />
		        <input name="LName" placeholder="Last name" type="text" />
		        <input name="Email" placeholder="Email address" type="text" />
		        <br />
		        <br />
		        <input name="Class1" placeholder="Class 1" type="text" />
		        <input name="Class2" placeholder="Class 2" type="text" />
		        <input name="Class3" placeholder="Class 3" type="text" />
		        <input name="Class4" placeholder="Class 4" type="text" />
		        <br />
		        <input name="Class5" placeholder="Class 5" type="text" />
		        <input name="Class6" placeholder="Class 6" type="text" />
		        <input name="Class7" placeholder="Class 7" type="text" />
		        <input name="Class8" placeholder="Class 8" type="text" />
		        <input id="EditTeacher" onclick="SaveTeacher()" style="position:relative;" title="Save edits to teacher" type="button" value="Save teacher" />
		        <br />
			</div3>
	      		<input type="submit" name="submit" value="send" style = "margin:auto; display:block"></input>
			</form>
          </div2>
        </fieldset>
		<br>
		
		ADD STUDENT
        <fieldset id = "AddS" style="color: dimGrey">
          <legend class="hide" id = "Add">Add students</legend>
          <div2>
	        <input name="FName" placeholder="First name" type="text" />
	        <input name="LName" placeholder="Last name" type="text" />
	        <input name="Email" placeholder="Email address" type="text" />
	        <input name="Year Group" placeholder="Year Group" type="Number" min = 8 max = "12" style = "width: 147px"/>
	        <br />	<br>																		
	        <input name="Class1" placeholder="Class 1" type="text" />
	        <input name="Class2" placeholder="Class 2" type="text" />
	        <input name="Class3" placeholder="Class 3" type="text" />
	        <input name="Class4" placeholder="Class 4" type="text" />
	        <br />
	        <input name="Class5" placeholder="Class 5" type="text" />
	        <input name="Class6" placeholder="Class 6" type="text" />
	        <input name="Class7" placeholder="Class 7" type="text" />
	        <input name="Class8" placeholder="Class 8" type="text" />
			<br>		
	        <input name="Class9" placeholder="Class 9" type="text" />
	        <input name="Class10" placeholder="Class 10" type="text" />
	        <input name="Class11" placeholder="Class 11" type="text" />
	        <input name="Class12" placeholder="Class 12" type="text" />
	        <input id="AddStudent" onclick="AddStudent()" style="position:relative;" title="Add new student" type="button" value="Add Student" />
	        <br />																							
          </div2>
        </fieldset>	
		<br>
		
		 EDIT STUDENT
        <fieldset id = "EditS"style="color: dimGrey">
          <legend class="hide"> Edit students</legend>
          <div2>
			<form>
			INPUT CHECK LISTBOX FOR STUDENTS HERE!!
			<div3 style = "display:none">
	  	        <input name="FName" placeholder="First name" type="text" />
	  	        <input name="LName" placeholder="Last name" type="text" />
	  	        <input name="Email" placeholder="Email address" type="text" />
	  	        <input name="Year Group" placeholder="Year Group" type="Number" min = 8 max = "12" style = "width: 147px"/>
	  	        <br />	<br>																		
	  	        <input name="Class1" placeholder="Class 1" type="text" />
	  	        <input name="Class2" placeholder="Class 2" type="text" />
	  	        <input name="Class3" placeholder="Class 3" type="text" />
	  	        <input name="Class4" placeholder="Class 4" type="text" />
	  	        <br />
	  	        <input name="Class5" placeholder="Class 5" type="text" />
	  	        <input name="Class6" placeholder="Class 6" type="text" />
	  	        <input name="Class7" placeholder="Class 7" type="text" />
	  	        <input name="Class8" placeholder="Class 8" type="text" />
	  			<br>		
	  	        <input name="Class9" placeholder="Class 9" type="text" />
	  	        <input name="Class10" placeholder="Class 10" type="text" />
	  	        <input name="Class11" placeholder="Class 11" type="text" />
	  	        <input name="Class12" placeholder="Class 12" type="text" />
	  	        <input id="EditStudent" onclick="SaveStudent()" style="position:relative;" title="Save edits to student" type="button" value="Save student" />
  	        <br />
			</div3>
	        <input type="submit" name="submit" value="send" style = "margin:auto; display:block"></input>
		  </form>
          </div2>
        </fieldset>
		<br>
		
	 REMOVE STUDENT
        <fieldset id = "RemoveS" style="color: dimGrey">
          <legend class="hide"> Remove students</legend>
          <div2>
			<form>
		  CHECK LIST BOX FOR TEACHERS AGAIN 
	      		<input type="submit" name="submit" value="send" style = "margin:auto; display:block"></input>
			</form>
          </div2>
        </fieldset>
		<br>
		-->
		
		<!--MERIT CERTIFICATES-->
		<fieldset id = "MeritCertificates" style="color: dimGrey">
          	<legend class="hide"> Merit certificates</legend>
          	<div2> 
  				<form id="CertificateForm" action="PrintCertificates.php" >
					
					<input type="submit" name="confirmCerts" value="Print Certificates" style = "display:block; top:20px; position:relative; width:160px; height:30px"/>
					<br>
					<br>
					<p style:"top:-50px">Date: <input value="01" min="01" max="31" id="Day" name="Day" onChange="changefn()" onkeypress='return event.charCode &gt;= 48 &amp;&amp; event.charCode &lt;= 57' placeholder="dd" style = "top:0px; position:relative; width:50px; height:15px" type="number" />
					<input value="01" min="01" max="12" id="Month" name="Month" onChange="changefn()" onkeypress='return event.charCode &gt;= 48 &amp;&amp; event.charCode &lt;= 57' placeholder="mm" style = "top:0px; position:relative; width:50px; height:15px" type="number" /></p>
					<label style="width:700px; height:100px; font-size:15px; display:inline-block; position:relative; top:-70px; background-color:white; left:180px">Please select a student from each year group to receive student of the week, students in bold have received student of the week before while others have not and the number after each name indicates the amount of merits achieved this week. Please also input the date that the week will finish in the boxes to the left.</label>
					
					<ul id = "studentOTW_UL">
					<?php
						$studentOTWQuery = mysqli_query($link, "select DISTINCT weeklyMerits, UserIndex, Year FROM student WHERE Year = 7 ORDER BY weeklyMerits DESC LIMIT 10")
							or
						die ("Failed to query database".mysqli_error($link));

						$studentOTWStr = NULL;
						$lowestMerit = 0;
		
						while($studentOTW = mysqli_fetch_assoc($studentOTWQuery)) {
							$lowestMerit = $studentOTW['weeklyMerits'];
						}
		
						$result7 = mysqli_query($link, "select DISTINCT UserIndex, FName, LName, weeklyMerits, ObtainedSOTW FROM student WHERE (weeklyMerits >= $lowestMerit) AND (Year = 7) ORDER BY weeklyMerits DESC, LName DESC, FName DESC")
							or
						die ("Failed to query database".mysqli_error($link));
						
						echo"<p style=\"padding-bottom: 0px; margin-bottom: 0px; padding:12px; background-color:#e2e2e2\"><a class=\"header\" >Student Of The Week Year 7</a></p>";
		
						while ($row = mysqli_fetch_assoc($result7)) {
							if($row['weeklyMerits'] >= 0) {
								if ($row['ObtainedSOTW'] == 1) {
									echo"<b><p><a><input type=\"radio\" name=\"SOTWCheck7[]\" value=\"{$row['UserIndex']}\" id=\"SOTWCheck7[{$row['UserIndex']}]\" style=\"display:none\">
										<label style = \"display:block\" for=\"SOTWCheck7[{$row['UserIndex']}]\">{$row['LName']}, {$row['FName']}, {$row['weeklyMerits']}</label></a></p></b>";
								} else {
									echo"<p><a><input type=\"radio\" name=\"SOTWCheck7[]\" value=\"{$row['UserIndex']}\" id=\"SOTWCheck7[{$row['UserIndex']}]\" style=\"display:none\">
										<label style = \"display:block\" for=\"SOTWCheck7[{$row['UserIndex']}]\">{$row['LName']}, {$row['FName']}, {$row['weeklyMerits']}</label></a></p>";
								}
							}
						}
					?>
					</ul>
					<br>
					 
					 <ul id = "studentOTW_UL">
 					<?php
 						$studentOTWQuery = mysqli_query($link, "select DISTINCT weeklyMerits, UserIndex, Year FROM student WHERE Year = 8 ORDER BY weeklyMerits DESC LIMIT 10")
 							or
 						die ("Failed to query database".mysqli_error($link));

 						$studentOTWStr = NULL;
 						$lowestMerit = 0;
		
 						while($studentOTW = mysqli_fetch_assoc($studentOTWQuery)) {
 							$lowestMerit = $studentOTW['weeklyMerits'];
 						}
		
 						$result8 = mysqli_query($link, "select DISTINCT UserIndex, FName, LName, weeklyMerits, ObtainedSOTW FROM student WHERE (weeklyMerits >= $lowestMerit) AND (Year = 8) ORDER BY weeklyMerits DESC, LName DESC, FName DESC")
 							or
 						die ("Failed to query database".mysqli_error($link));
						
						echo"<p style=\"padding-bottom: 0px; margin-bottom: 0px; padding:12px; background-color:#e2e2e2\"><a class=\"header\" >Student Of The Week Year 8</a></p>";
		
 						while ($row = mysqli_fetch_assoc($result8)) {
 							if($row['weeklyMerits'] >= 0) {
 								if ($row['ObtainedSOTW'] == 1) {
 									echo"<b><p><a><input type=\"radio\" name=\"SOTWCheck8[]\" value=\"{$row['UserIndex']}\" id=\"SOTWCheck8[{$row['UserIndex']}]\" style=\"display:none\">
 										<label style = \"display:block\" for=\"SOTWCheck8[{$row['UserIndex']}]\">{$row['LName']}, {$row['FName']}, {$row['weeklyMerits']}</label></a></p></b>";
 								} else {
 									echo"<p><a><input type=\"radio\" name=\"SOTWCheck8[]\" value=\"{$row['UserIndex']}\" id=\"SOTWCheck8[{$row['UserIndex']}]\" style=\"display:none\">
 										<label style = \"display:block\" for=\"SOTWCheck8[{$row['UserIndex']}]\">{$row['LName']}, {$row['FName']}, {$row['weeklyMerits']}</label></a></p>";
 								}
 							}
 						}
 					?>
					</ul>
					<br>
					 
					 <ul id = "studentOTW_UL">
 					<?php
 						$studentOTWQuery = mysqli_query($link, "select DISTINCT weeklyMerits, UserIndex, Year FROM student WHERE Year = 9 ORDER BY weeklyMerits DESC LIMIT 10")
 							or
 						die ("Failed to query database".mysqli_error($link));

 						$studentOTWStr = NULL;
 						$lowestMerit = 0;
		
 						while($studentOTW = mysqli_fetch_assoc($studentOTWQuery)) {
 							$lowestMerit = $studentOTW['weeklyMerits'];
 						}
		
 						$result9 = mysqli_query($link, "select DISTINCT UserIndex, FName, LName, weeklyMerits, ObtainedSOTW FROM student WHERE (weeklyMerits >= $lowestMerit) AND (Year = 9) ORDER BY weeklyMerits DESC, LName DESC, FName DESC")
 							or
 						die ("Failed to query database".mysqli_error($link));
						
						echo"<p style=\"padding-bottom: 0px; margin-bottom: 0px; padding:12px; background-color:#e2e2e2\"><a class=\"header\" >Student Of The Week Year 9</a></p>";
		
 						while ($row = mysqli_fetch_assoc($result9)) {
 							if($row['weeklyMerits'] >= 0) {
 								if ($row['ObtainedSOTW'] == 1) {
 									echo"<b><p><a><input type=\"radio\" name=\"SOTWCheck9[]\" value=\"{$row['UserIndex']}\" id=\"SOTWCheck9[{$row['UserIndex']}]\" style=\"display:none\">
 										<label style = \"display:block\" for=\"SOTWCheck9[{$row['UserIndex']}]\">{$row['LName']}, {$row['FName']}, {$row['weeklyMerits']}</label></a></p></b>";
 								} else {
 									echo"<p><a><input type=\"radio\" name=\"SOTWCheck9[]\" value=\"{$row['UserIndex']}\" id=\"SOTWCheck9[{$row['UserIndex']}]\" style=\"display:none\">
 										<label style = \"display:block\" for=\"SOTWCheck9[{$row['UserIndex']}]\">{$row['LName']}, {$row['FName']}, {$row['weeklyMerits']}</label></a></p>";
 								}
 							}
 						}
		
 					?>
					</ul>
					<br>
					 
				</form>
			</div2>
		</fieldset>
		<br>
		
		<!--PRINT TOP STUDENTS-->
        <fieldset id = "PrintTopStudents" style="color: dimGrey">
          <legend class="hide"> Print top students</legend>
          <div2> 
			<form id= "PrintTopStudentsForm" action= "PrintTopStudents.php">
				
            <br /> Select the top
            <input min="0" id="topStudentsInput" name="topStudentsCap" value="<?php echo $result['topStudentsCap'];?>"onkeypress='return event.charCode &gt;= 48 &amp;&amp; event.charCode &lt;= 57'
			style="position:relative; width: 40px" type="number" /> students from each year group
            <br />
			
			<input type="submit" name="printTopStudentsButton" value="Print Students" style = "display:block; top:20px; position:relative; width:160px; height:30px"/>
			<br>

			<br>
			</form>
          </div2>
        </fieldset>
		<br>
		
		<!--CHANGE PASSWORD-->
        <fieldset id = "ChangeP" style="color: dimGrey">
          <legend class="hide"> Change password</legend>
          <div2> 
			<form id="password" action="ChangePassword.php" >
				<p style = "font-size: 14px">
				<br>
				Enter username: <input type="text" name="username"><br>
				Enter current password: <input type="password" name="OldPassword"><br><br>
				Enter new password: <input type="password" name="NewPassword"><br>
				Re-enter new password: <input type="password" name="NewPasswordConfirm"><br>
				<br>
	      		<input type = "submit" name = "ConfirmChange" value = "Confirm">
				</p>
			</form>
          </div2>
        </fieldset>
		<br>
		
		<!--UPDATE-->
        <fieldset id = "Reset" style="color: dimGrey">
          <legend class="hide"> Update Database</legend>
          <div2> 
			<form id= "UpdateStudentForm" action= "updateStudents.php">
				<input type="submit" name="updateButton" value="Update Students" style = "display:block; top:20px; position:relative; width:160px; height:30px"/>
				<br>
			</form>
			<form id= "UpdateTeacherForm" action= "updateTeachers.php">
				<input type="submit" name="updateButton" value="Update Teachers" style = "display:block; top:20px; position:relative; width:160px; height:30px"/>
				<br>
			</form>
			<br>
          </div2>
        </fieldset>
		<br>
		
		<!--PRINT ACHIEVEMENTS-->
		<fieldset id = "Achievements" style="color: dimGrey">
          	<legend class="hide"> Print achievements</legend>
          	<div2> 
  				<form id="AchievementsForm" action="Print Achievements.php" >
					<input type="submit" name="achievementsButton" value="PrintAchievements" style = "display:block; top:20px; position:relative; width:160px; height:30px"/>
					<br>
					<br>
				</form>
			</div2>
		</fieldset>
		<br><br><br>
      </div>
	  <div id = "bar" style = "background-color: white; width: 8%; top:110px; margin-left:5px; padding-top: 1%; padding-left: 1%; padding-right:1%; font-family: Helvetica; height:75%; overflow: hidden; overflow-x:hidden; margin-top:2%; position: absolute"><br>
		 Go to: <br>
		<br><p><a href = "#Settings" onclick ='showelement("Settings")'>Settings </a></p>
		<!--<br><p><a href = "#Add">Add teacher </a></p>-->
		<br><p><a href = "#Change">Change teacher role </a></p>
		<br><p><a href = "#MeritCertificates">Merit Certificates </a></p>
		<!--
		<a href = "#RemoveT">Remove Teacher</a>
		<a href = "#EditT">Edit Teacher</a>
		<a href = "#AddS">Add student</a>
		<a href = "#EditS">Edit Student</a>
		<a href = "#RemoveS">Remove Student</a> -->
		<br><p><a href = "#PrintTopStudents">Print top students</a></p>
		<br><p><a href = "#ChangeP">Change password</a></p>
		<br><p><a href = "#Reset">Update </a></p>	
		<br><p><a href = "#Achievements">Print Achievements </a></p>
      <div id="cf4a"><img class="bottom" src=
 		   "/img/LoginBackground.jpg" /> <img class="top" src=
 		   "/img/LoginBackground2.jpg" /> <img class="middle" src=
 		   "/img/LoginBackground3.jpg" /> <img class="middle2" src=
 		   "/img/LoginBackground4.jpg" />
    	</div>

      <script type="text/javascript">
        //<![CDATA[
	function teacherFunction() {
	    var input, filter, form, p, a, i;
	    input = document.getElementById("teacherInput");
	    filter = input.value.toUpperCase();
	    form = document.getElementById("teacherUL");
	    p = form.getElementsByTagName("p");
	    for (i = 0; i < p.length; i++) {
	        a = p[i].getElementsByTagName("a")[0];
	        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
	            p[i].style.display = "";
	        } else {
	            p[i].style.display = "none";
	        }
	    }
	}

        function changefn() {

          //var num = document.getElementByName("NumBound").value;
          //document.getElementByName("DefMsgAbove")[0].placeholder = 'Current message for above ' + num + 'merits given out: ' + ': <?php //echo $result['
          //DefMsgAbove '];?>' + 'merits given out';
          //document.getElementByName("DefMsgBelow")[0].placeholder = 'Current message for below ' + num + 'merits given out: ' + ': <?php //echo $result['
         //DefMsgBelow '];?>' + 'merits given out';
          //document.getElementByName("MsgBelow").innerHTML = 'Current message for above ' + num + ' merits';

        }
        	$("#Cap").on("input", function() {
          var boundary = document.getElementById("Cap").value;

          document.getElementById("DefMsgAbove").placeholder = 'Current message for above ' + boundary + ' merits given out: ' + '<?php echo $result['DefMsgAbove'];?>';
          document.getElementById("DefMsgBelow").placeholder = 'Current message for below ' + boundary + ' merits given out: ' + '<?php echo $result['DefMsgBelow']?>';          
		  document.getElementById("message").innerHTML = 'Current message for above ' + boundary + ' merits';

          document.getElementById("MsgBelow").innerHTML = 'Current message for above ' + boundary + ' merits';
		  
        });

		function confirmDatabase() {
			if (document.getElementById("SelectDatabase").value == "Student database" || document.getElementById("SelectDatabase").value == "Teacher database") {
				var c = confirm("Are you sure you want to replace the current database? This will reset all student's merits. This action is irreversible");
				if (c == true) {
				    //open dialog box 
				} else {
					document.forms["Reset"].submit();
					alert('The database has been replaced.');
				}	
			}	
			else {
				alert("Please select the database to replace first!")
			}
			
		}
        $(function() {
            $('legend').click(function() {
              $(this).nextAll('div2').toggle("fast");
              $(this).hasClass('hide') ? ($(this).attr("class", "show")) : ($(this).attr("class", "hide"));
			  
  			  document.getElementById("ReplaceButton").style.display = 'none';			  
            });
          })
		  
		  
          //$( document ).ready(function() {
          //    $(.hide).hide;
          //});
		  function verify() {
			  if (document.getElementById("location").value == '') {
				  document.getElementById("ReplaceButton").style.display = 'none';
			  }
			  else {
				  document.getElementById("ReplaceButton").style.display = 'initial';
			  }
		  }  
        function readyFn(jQuery) {
            $("legend").hide; // Code to run when the document is ready.
			document.getElementById("ReplaceButton").style.display = 'none';
        }
		
		function showelement(el) {	
		    $("#Settings").show(fast);
		}
		
		function resize(el){
			el = el.getBoundingClientRect();
			document.getElementById("bar").style.top = el.top;
			document.getElementById("bar").style.height = document.getElementById("main").style.height;
		}
		
		function check(){
			if (document.getElementById("new").value == document.getElementById("new2").value && document.getElementById("new").value != ""){
				document.forms["password"].submit();
				alert('Your password has been changed');
			}
			else if (document.getElementById("new").value != document.getElementById("new2").value){
				alert('The new passwords do not match. Please re-enter them.');
				document.getElementById("new").value = "";
				document.getElementById("new2").value = "";
			}
			else {
				alert('Please enter a new password.')
			}
		}
        $(window).load(readyFn);
		function addTeacher(){};
		function RoleChange() {
			if (document.getElementById("selectRole").value != "") {
				var role = document.getElementById("selectRole").value;
				document.forms["ChangeRole"].submit();
				
				/* PUT CODE TO CHANGE ROLE HERE*/
			}
			else {
				alert("Please enter a role to change.");
			}
		};
        //]]>
		function hideElements(element){
			$("elm").show();
		}
		
		//SCROLL
		(function($) {
		  var $root = $('html, body');
		  $('a').click(function() {
		    var href = $.attr(this, 'href');
		    $root.animate({
		      scrollTop: $(href).offset().top
		    }, 500, function() {
		      window.location.hash = href;
		    });
		    var exp = $(href).parent();
		    exp.toggleClass('collapsed', 'expanded');

		    return false;
		  });

		}(jQuery));
		
      </script>


    </body>
	
</html>

