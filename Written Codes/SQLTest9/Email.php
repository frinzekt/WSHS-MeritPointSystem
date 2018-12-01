<?php
    $link = mysqli_connect("localhost", "root", "");
	mysqli_select_db($link, "mPointsDB");

	$y = 1;
	$query = mysqli_query($link, "select * FROM student");
	$query = mysqli_fetch_assoc($query);
	$MaxStudents = mysqli_query($link, "select * FROM student");
    $MaxStudents = mysqli_num_rows($MaxStudents);

	$querySettings = mysqli_query($link, "select * FROM settings");
		$querySettings = mysqli_fetch_assoc($querySettings);
	

	for($x = 1; $x <= $MaxStudents; $x++) {																										
		
		$queryS = mysqli_query($link, "select * FROM student WHERE UserIndex = {$x}");
		$SData = mysqli_fetch_assoc($queryS);
		
		$i = 0;
		$a = $querySettings['DefMsgStudent1A'] . "\r\n";
        $TotalMerits = 0;
		for($i = 0; $i <= 12; $i++) {														 
			$classLocation = "Class$i";
			$mpLocation = "ClassMerit$i";
			if(!empty($SData[$classLocation])) {
				$a .= $SData[$classLocation].' = '.$SData[$mpLocation]."\r\n";
                $TotalMerits += $SData[$mpLocation];
			}
		}	//end subject repeat
        $a .= 'Merits obtained outside of class = ' . $SData['ClassMerit13'] . "\r\n";
        $TotalMerits += $SData['ClassMerit13'];
        $a .= 'Total merits = ' . $TotalMerits;
		
		$pos1 = 0;
		$pos2 = 0;
		$pos3 = 0;
		$Date = "";
		$String = "";
		$mPoints = 0;
		$i = 0;
		$offset = 0;
		$search = ",";
		$final = "|";
		$length = 0;
		$reason = $SData['DateReasonMP'];
		$b = $querySettings['DefMsgStudent2A'] . "\r\n";
        $test = strpos($reason, ',', $offset);
		
		while($test !== false){
			$pos1 = strpos($reason, ',', $offset);
            $length = $pos1;
            if($pos3 > 0) {
                $length = $pos1 - $pos3 - 1;
            }
            $Date = substr($reason, $offset, $length);

		    $offset = $pos1 + 1;

            $pos2 = strpos($reason, ',', $offset);
            $length = $pos2 - $pos1 - 1;
            $String = substr($reason, $offset, $length);

			$offset = $pos2 + 1;

            $pos3 = strpos($reason, '|', $offset);
            $length = $pos3 - $pos2 - 1;
            $mPoints = substr($reason, $offset, $length);

			$offset = $pos3 + 1;
            $test = strpos($reason, ',', $offset);

			$b .= 'You were awarded ' . $mPoints . ' merit points on ' . $Date . ' for ' . $String . '.' . "\r\n";
			}	//end reason loop per student 
		$c = $a . "\r\n\r\n" . $b . "\r\n" ;
		$email = $SData['Email'];
		
		//WRITE PROCEDURE TO SEND EMAIL TO PARTICULAR STUDENT, this repeats automatically for each student. The email address for the student would be $email,.
		echo nl2br("$c");
		echo "<script type='text/javascript'>alert('An email has been sent.')</script>";
	} //end student repeat
	echo "<script type='text/javascript'>alert('All emails have been successfully sent')</script>";

?>
<html>
<meta http-equiv="refresh" content="0; URL=' <?php echo"Developer%202.php";?>'"/>
    Refreshing ...
</html>