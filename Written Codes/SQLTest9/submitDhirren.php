<?php
	$link = mysqli_connect("localhost", "root", "");
	mysqli_select_db($link, "mPointsDB");
	
	session_start();
	
	ini_set("SMTP", "localhost");
ini_set("smtp_port", "25");
ini_set("sendmail_from", "frinzekt@gmail.com");
	
	$class=$_SESSION['Filter'];
	$Tindex=$_SESSION['TIndex'];
	$Status=$_SESSION['Status'];
    
    $mpinc = $_GET['mpinc'];
    $studentList = $_GET['list'];
	$studentList = $studentList.",";
	
	if (isset($_GET['listExtra'])) {
		$extracurricular = $_GET['listExtra'];
	} else {
		$extracurricular = array("");
	}
	
	$query = mysqli_query($link, "select * FROM student")
		or
	die ("Failed to query database".mysqli_error($link));
	$query = mysqli_fetch_assoc($query);
	
	$MaxStudents = mysqli_query($link, "select * FROM student")
		or
	die ("Failed to query database".mysqli_error($link));
    $MaxStudents = mysqli_num_rows($MaxStudents);
    
	$querySettings = mysqli_query($link, "select * FROM settings")
		or
	die ("Failed to query database".mysqli_error($link));
	$querySettings = mysqli_fetch_assoc($querySettings);
	
	$queryTeacher = mysqli_query($link, "select * FROM teacher WHERE UserIndex = $Tindex")
		or
	die ("Failed to query database".mysqli_error($link));
	$TData = mysqli_fetch_assoc($queryTeacher);
	
	$cap = $querySettings['MeritCap'];
   
	$offset = 0;
	$studentNumber = 0;
	$studentArray = array();
	$i1 = 0; // initial index (total later)
	$test = true;

	while ($test !== false){	
		$pos = strpos($studentList, ',', $offset);
		$length = $pos - $offset;
		$studentNumber = substr($studentList, $offset, $length);
		$offset = $pos + 1;
		$test = strpos($studentList, ',', $offset);
		
		$studentArray[$i1] = $studentNumber;
		
		$i1 = $i1 + 1;
	}
	
	
	
	
	$i = 0;
	while($i < $i1) {
		$Sindex = $studentArray[$i];					
		$queryS = mysqli_query($link, "select * FROM student WHERE UserIndex = $Sindex")
			or
		die ("Failed to query database".mysqli_error($link));																	
		$SData = mysqli_fetch_assoc($queryS);
		
		//ESTABLISHING MERIT ASSOCIATIVE ARRAY
		
		$awardedMerits = $SData['Merit'];
		$Teachers = $SData['Teacher'];
		$pos = 0;
		$offset = 0;
		if (null !== strpos($awardedMerits, ',', $offset)){
			$test = strpos($awardedMerits, ',', $offset);
		} else {
			$test = false;
		}
		
		$offsetS = 0;
		$offsetT = 0;
		$merit = 0;
		$teacherID = 0;
		$temparray = array();
	
		while ($test !== false){	
			$posS = strpos($awardedMerits, ',', $offsetS);
			$lengthS = $posS - $offsetS;
			$merit = substr($awardedMerits, $offsetS, $lengthS);
			$offsetS = $posS + 1;
			$test = strpos($awardedMerits, ',', $offsetS);
		
			$posT = strpos($Teachers, ',', $offsetT);
			$lengthT = $posT - $offsetT;
			$teacherID = substr($Teachers, $offsetT, $lengthT);
			$offsetT = $posT + 1;

			$query = mysqli_query($link, "SELECT * FROM teacher WHERE UserIndex = \"$teacherID\"")
				or
			die ("Failed to query database".mysqli_error($link));
			$query = mysqli_fetch_assoc($query);
			$TName = $query['Email'];  //replace 'NAME' with column that contains info of display name !=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=
			if (isset($temparray[$TName])) {
				$temparray[$TName] = $temparray[$TName] + $merit;
			} else {
				$temparray[$TName] = $merit;
			}
		}
		//END OF MERIT ARRAY CREATION, BEGINNING OF MERIT APPEND
		
		$PermTableQuery = mysqli_query($link, "SELECT * FROM permanent WHERE StudentEmail = \"{$SData['Email']}\"")
			or
		die ("Failed to query database".mysqli_error($link));
		$PermTable = mysqli_fetch_assoc($PermTableQuery);
		$year = '';
		
		if($mpinc == false){  // just in case
			$mpinc = 0;
		}
		
		if(!isset($temparray[$TData['Email']])){
			$temparray[$TData['Email']] = 0;
		}
		
		if(($temparray[$TData['Email']] + $mpinc) < $cap){  //cap check - test if working. replace 'NAME' with column that contains info for display name
			if(isset($mpinc)){  //checking if reason exists, if not normal submit
				$appendMerit = "{$SData['Merit']}"."$mpinc,";  //append to student Merit column with value of awarded merit
				mysqli_query($link, "UPDATE student SET Merit = \"$appendMerit\" WHERE UserIndex = $Sindex");  //append merit addition
		
				$appendTeacher = "{$SData['Teacher']}"."$Tindex,";
				mysqli_query($link, "UPDATE student SET Teacher = \"$appendTeacher\" WHERE UserIndex = $Sindex"); //append teacher to column
				
				if ($mpinc == 10) { //else of if - reason  -- if reason exists updates permtable
					$year = "{$PermTable['Year']}"."{$SData['Year']}".",";
					mysqli_query($link, "UPDATE permanent SET Year = \"$year\" WHERE StudentEmail = \"{$SData['Email']}\"");
					$reason2 = "{$PermTable['Reason']}"."{$extracurricular}".",";
					mysqli_query($link, "UPDATE permanent SET Reason = \"$reason2\" WHERE StudentEmail = \"{$SData['Email']}\"");
				}
			}
		
			//END OF MERIT APPEND, START OF TOTAL MERIT SUMMING
		
			$awardedMerits = $SData['Merit'];
			$offset = 0;
			$totalValue = 0;
			while (strpos($awardedMerits, ',', $offset) != false){
				$pos = strpos($awardedMerits, ',', $offset);
				$length = $pos - $offset;
				$value = substr($awardedMerits, $offset, $length);
				$totalValue = $totalValue + intval($value);	
				$offset = $pos + 1;
			}
			$totalValue = $totalValue + $mpinc;
			mysqli_query($link, "UPDATE student SET totalMerits = $totalValue WHERE UserIndex = $Sindex");
		
			$mpincT = $TData['mPoints'] + $mpinc;
			mysqli_query($link, "UPDATE teacher SET mPoints = $mpincT WHERE UserIndex = $Tindex");//in while loop; adds merits per student (2 students 3 merits = 6 merits
		
			$weeklyTotal = $SData['weeklyMerits'] + $mpinc;
			mysqli_query($link, "UPDATE student SET weeklyMerits = $weeklyTotal WHERE UserIndex = $Sindex");
		
			//END OF DATABASE MESSING, BEGINNING OF RECREATING MERIT ARRAY, AS IT HAS BEEN UPDATED
			$awardedMerits = $SData['Merit'];
			$Teachers = $SData['Teacher'];
			$pos = 0;
			$offset = 0;
			if (null !== strpos($awardedMerits, ',', $offset)){
				$test = strpos($awardedMerits, ',', $offset);
			} else {
				$test = false;
			}
			
			$offsetS = 0;
			$offsetT = 0;
			$merit = 0;
			$teacherID = 0;
			$temparray = array();
		
			while ($test !== false){	
				$posS = strpos($awardedMerits, ',', $offsetS);
				$lengthS = $posS - $offsetS;
				$merit = substr($awardedMerits, $offsetS, $lengthS);
				$offsetS = $posS + 1;
				$test = strpos($awardedMerits, ',', $offsetS);
			
				$posT = strpos($Teachers, ',', $offsetT);
				$lengthT = $posT - $offsetT;
				$teacherID = substr($Teachers, $offsetT, $lengthT);
				$offsetT = $posT + 1;
	
				$query = mysqli_query($link, "SELECT * FROM teacher WHERE UserIndex = \"$teacherID\"")
					or
				die ("Failed to query database".mysqli_error($link));
				$query = mysqli_fetch_assoc($query);
				$TName = $query['Email'];  //replace 'NAME' with column that contains info of display name !=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=
				if (isset($temparray[$TName])) {
					$temparray[$TName] = $temparray[$TName] + $merit;
				} else {
					$temparray[$TName] = $merit;
				}
			}
		} else { //else of if - over cap
			//DISPLAY ERROR HERE PLEASE !=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=========!+=!=!P!@#*)!@(#*@!)#(*@!)(*#)
			echo"<script type='text/javascript'>alert('Merits have exceeded the cap and will not be awarded')</script>";
		}
		
		//RE-ESTABLISHED MERIT ASSOCIATIVE ARRAY, BEGINNING OF EMAIL CONTENT
		$message = '';
		
		$message = "<html>
			<body>
				<h1 style=\"font-family: Helvetica; font-weight:200;width:100%;left:70px; color:DimGrey;\">
					<img style=\"height:50px;width:50px;\"src = 'https://www.bam.com.au/image.php?file=/art/rta/client_logos/willwttonshs.png&width=200&height=100&mode=fit'>
					WILLETTON SENIOR HIGH SCHOOL	<br>	
				</h1>
				<p style =\"font-family: Helvetica;font-size:18px;font-weight:300;padding-left: 15px\">
			";

		foreach($temparray as $x => $x_value) {
			$message .= "You were awarded " . $x_value . " merit points from " . $x . ". \n"; //$x is teacher, $x_value is merits {EMAIL CONTENTS}
		}
		$message .="</p>
			<table style=\"width:100%;font-family:Helvetica; border:1px solid DimGrey; border-collapse: collapse; padding-left: 10px\">
			<br>
			<p2 style=\"font-family: Helvetica; font-size:18px;font-weight:300;padding-left: 15px\">
				Your current total is ".$SData['totalMerits']." merit points.
			</p2>
			<br><br>	
			<p3 style = \"font-size:10px;font-family: Helvetica; font-weight:300; padding-left:15px\">
				<br><br><br>This is an automated email. Replies will not be monitored.<br>
			</p3>
				<h6 style = \"color: white;text-align:center;background-color: #253141;font-family:Helvetica;font-weight:200;height:100px;padding-top:30px; left:-20px; right:-20px\">
					<!-- ©2016 Willetton Senior High School --> 
					<h7>
						<p4 style = \"text-align: left; left:80%;position:absolute\">
							<b> Willetton Senior High School</b> <br>
							Pinetree Gully Rd, Willetton <br>
							Perth Western Australia 6155 <br><br>
							<b>Phone:</b> +61 (0)8 9334 7200 <br>
							<b>Fax:</b> +61 (0)8 9332 4907
							<a href=\"http://www.willettonshs.wa.edu.au/\">
							<img style=\"position: absolute; right:105%;width: 84px; height: 80px; top: -2px;  \"src = 'http://www.willettonshs.wa.edu.au/art/logo.png'>		
							</a>
						</p4>	
					</h7>
				</h6>
		
				<!-- ></h5> -->
			</body>
		</html>";
		$to = $SData['Email'];
	
		$subject = 'You received merits from {$TData[\'Title\']}';
	
		$headers = "From: ". "\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	
		mail("zircon726@gmail.com", $subject, $message, $headers);
		
		$i = $i + 1;	
	} //end student repeat
		
	// end stuff here - end of merit awarding

	echo "<script type='text/javascript'>alert('All emails have been successfully sent')</script>";
?>
<html>

<?php /*echo"<meta http-equiv=\"refresh\" content=\"0\"; URL='MainPage.php?index={$Tindex}&status={$Status}&filter={$class}&extraDropdown=NULL&reason=3'/>";*/?> 
    Refreshing ...
    
</html>