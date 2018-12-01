<?php
$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link, "mPointsDB");
if ($query = mysqli_query($link, "select NumBound, DefMsg0, DefMsgBelow, DefMsgAbove FROM settings ")){
	$var = mysqli_fetch_assoc($query);
	$MeritCap = $var['NumBound'];
	$Message0 = $var['DefMsg0'];
	$Messageunder = $var['DefMsgBelow'];
	$Messageabove = $var['DefMsgAbove'];
}
else {die ("Failed to query Settings".mysqli_error());}

if ($query = mysqli_query($link, "select Email, mPoints FROM teacher")){
	while ($row = mysqli_fetch_assoc($query)) { 
		$email = $row['Email'];
		$numberMerits = $row['mPoints'];
		$message = '<html>
			<body>
		
			<h1 style="font-family: Helvetica; font-weight:200;width:100%;left:70px; color:DimGrey;">
				<img style="height:50px;width:50px;"src =';
		$message .= " 'https://www.bam.com.au/image.php?file=/art/rta/client_logos/willwttonshs.png&width=200&height=100&mode=fit'>WILLETTON SENIOR HIGH SCHOOL<br></h1>";
		$message .= '<p style ="font-family: Helvetica;font-size:18px;font-weight:300;padding-left: 15px">	</p><br><p2 style="font-family: Helvetica; font-size:18px;font-weight:300;padding-left: 15px">';
		if ($numberMerits = 0) {
			$message .= $Message0;
		}
		else if ($numberMerits < $MeritCap) {
			$message .= $Messageunder;
		}
		else {
			$message .= $Messageabove;
		}
		$message .= '<p3 style = "font-size:10px;font-family: Helvetica; font-weight:300; padding-left:15px">
		<br><br><br>This is an automated email. Replies will not be monitored.<br><br><br><br><br><br><br>
		</p3>
		<!-- ><h5 style="background-color: #253141; height: 100px;left:0px;right:0px"> -->
			<h6 style = "color: white;text-align:center;background-color: #253141;font-family:Helvetica;font-weight:200;height:100px;padding-top:30px; left:-20px; right:-20px">
				<!-- ©2016 Willetton Senior High School --> 
				<h7>
					<p4 style = "text-align: left; left:80%;position:absolute">
						<b> Willetton Senior High School</b> <br>
						Pinetree Gully Rd, Willetton <br>
						Perth Western Australia 6155 <br><br>
						<b>Phone:</b> +61 (0)8 9334 7200 <br>
						<b>Fax:</b> +61 (0)8 9332 4907
						<a href="http://www.willettonshs.wa.edu.au/">
						<img style="position: absolute; right:105%;width: 84px; height: 80px; top: -2px;  "src = 
						';
				$message .= " 'http://www.willettonshs.wa.edu.au/art/logo.png'>		
						</a>
					</p4>	
				</h7>
			</h6>
					
			<!-- ></h5> -->
	</body>
</html>";
			$to = '$email';#$email;
			
			$subject = 'Teacher Merit Email';
			
			$headers = "From: ". "\r\n";
			$headers .= "Reply-To: ".  "\r\n"; //stxrip_tags($_POST['req-email']) .
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

            if (mail($to, $subject, $message, $headers)){
            	echo 'Email sent successfully!';
            } else {
            	echo 'Email error!';
            }

		}
	}
	else {	
die ("Failed to query database".mysqli_error());}
?>