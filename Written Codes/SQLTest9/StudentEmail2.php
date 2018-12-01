<?php
$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link, "mPointsDB");

if ($query = mysqli_query($link, "select email,TotalMerits FROM student WHERE UserIndex = $Sindex")){
	$email = $row['Email'];
	$message = "<html>
	<body>
		
	<h1 style=\"font-family: Helvetica; font-weight:200;width:100%;left:70px; color:DimGrey;\">
	<img style=\"height:50px;width:50px;\"src =\" https://www.bam.com.au/image.php?file=/art/rta/client_logos/willwttonshs.png&width=200&height=100&mode=fit\">WILLETTON SENIOR HIGH SCHOOL<br></h1>;
	<p style =\"font-family: Helvetica;font-size:18px;font-weight:300;padding-left: 15px\">	</p><br><p2 style=\"font-family: Helvetica; font-size:18px;font-weight:300;padding-left: 15px\">";
	if ($mpinc == 10){
		$message .= "Congratulations! You received 10 merit points for participating in $extraccuricular[0]";
	}	
	else {
		$message .= "Congratulations! You received $mpinc merit points from {$TData['Title']}";
	}
		$message .="</p>
						<table style=\"width:100%;font-family:Helvetica; border:1px solid DimGrey; border-collapse: collapse; padding-left: 10px\">
						<br>
						<p2 style=\"font-family: Helvetica; font-size:18px;font-weight:300;padding-left: 15px\">
							Your current total is ".$SData['TotalMerits']." merit points.";
	$message .= "<p3 style = \"font-size:10px;font-family: Helvetica; font-weight:300; padding-left:15px\">
	<br><br><br>This is an automated email. Replies will not be monitored.<br><br><br><br><br><br><br>
	</p3>
		<!-- ><h5 style=\"background-color: #253141; height: 100px;left:0px;right:0px\"> -->
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
			$to = $email;#$email;
			
			$subject = 'You received merits from {$TData[\'Title\']}';
			
			$headers = "From: ". "\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

            mail($to, $subject, $message, $headers);

		}
	
	else {	
die ("Failed to query database".mysqli_error($link));}
?>